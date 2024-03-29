<?php

header('Access-Control-Allow-Origin: *');

// init
include __DIR__.'/../bootstrap.php';
include FRAME_DIR.'/http/php_fpm/application.php';
include FRAME_DIR.'/view_compiler/blade.php';

view_path(VIEW_DIR.'/');
view_compiler(blade_view_compiler_generate());

set_error_handler('http_err_action', E_ALL);
set_exception_handler('http_ex_action');
register_shutdown_function('http_fatal_err_action');

if_has_exception(function ($ex) {

    $error_info = otherwise_get_error_info($ex);

    if ($ex instanceof business_exception) {
        log_module('business_exception', $error_info['message']);
    } else {
        log_exception($ex);
    }

    if (is_ajax()) {

        header('Content-type: application/json');
        return json([
            'code' => $error_info['code'],
            'msg' => $error_info['message'],
            'data' => [],
        ]);
    } else {

        header('Content-type: text/html');
        return
            '<span style="color: red;">'.$error_info['message'].'</span>'.
            '<span style="color: gray;">'.$error_info['code'].'</span>';
    }
});

if_verify(function ($action, $args) {

    return unit_of_work(function () use ($action, $args) {

        otherwise_error_code('ACCOUNT_ROLE_NEED_REQUEST_ABILITY', role_ability_request_can_access());

        $data = call_user_func_array($action, $args);

        if (is_array($data)) {

            header('Content-type: application/json');

            return json([
                'code' => 0,
                'msg'  => '',
                'data' => $data,
            ]);

        } else {

            header('Content-type: text/html');

            return $data;
        }
    });
});

// init interceptor
include INTERCEPTOR_DIR.'/account.php';
include INTERCEPTOR_DIR.'/request_ability.php';

// init 404 handler
if_not_found(function () {
    return 404;
});

// init controller
include CONTROLLER_DIR.'/account.php';
include CONTROLLER_DIR.'/role.php';
include CONTROLLER_DIR.'/index.php';

// fix
not_found();
