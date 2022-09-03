<?php

if_get('/', function ()
{/*{{{*/
    $current_account = get_logined_account();

    return render('index/index', [
        'account' => $current_account,
    ]);
});/*}}}*/

if_get('/login', function ()
{/*{{{*/
    $error_message = input('error_message', '');
    $refer_url     = input('refer_url', '/');
    $email         = input('email', '');

    $current_account = get_logined_account(false);
    if ($current_account->is_not_null()) {
        return redirect($refer_url);
    }

    return render('index/login', [
        'error_message' => $error_message,
        'refer_url'     => $refer_url,
        'email'         => $email,
    ]);
});/*}}}*/

if_post('/login', function ()
{/*{{{*/
    list($email, $password, $refer_url) = input_list('email', 'password', 'refer_url');
    otherwise_error_code('LOGIN_FAILED_EMAIL_EMPTY', not_empty($email));
    otherwise_error_code('LOGIN_FAILED_PASSWORD_EMPTY', not_empty($password));

    $account = dao('account')->find_by_email_and_password($email, $password);
    otherwise_error_code('LOGIN_FAILED_EMAIL_PASSWORD_NOT_FIT', $account->is_not_null());

    $account->login(ip());

    account_login_cookie_set($account);

    return [];
});/*}}}*/

if_post('/logout', function ()
{/*{{{*/
    $account = get_logined_account();

    $account->logout();

    return redirect('/');
});/*}}}*/

if_get('/health_check', function ()
{/*{{{*/
    return 'ok';
});/*}}}*/

if_get('/error_code_maps', function ()
{/*{{{*/
    return config('error_code');
});/*}}}*/
