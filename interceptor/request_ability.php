<?php

function role_ability_request_can_access()
{
    $rule = matched_rule();
    $method = request_method();
    $request_abilities = config('request_ability');

    $need_ability = array_get($request_abilities['logined'], $rule.'.'.$method);

    if (not_null(($need_ability))) {

        $account = get_logined_account();
        if ($account->is_null()) {
            trigger_redirect('/login?refer_url='.uri());
        } else {
            return role_ability_need($need_ability);
        }
    } else {
        otherwise_error_code(
            'RULE_NOT_FOUND_IN_REQUEST_ABILITY_CONFIG',
            array_get($request_abilities['no_login'], $rule.'.'.$method),
            [':rule' => $rule, ':method' => $method]
        );

        return true;
    }
}