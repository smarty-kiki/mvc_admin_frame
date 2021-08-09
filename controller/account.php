<?php

if_get('/accounts', function ()
{/*{{{*/
    $inputs = [];

    list(
        $inputs['name'], $inputs['email'], $inputs['password'], $inputs['last_login_ip'], $inputs['is_admin']
    ) = input_list(
        'name', 'email', 'password', 'last_login_ip', 'is_admin'
    );

    $inputs = array_filter($inputs, 'not_null');

    return render('account/list', [
        'accounts' => dao('account')->find_all_by_column($inputs),
    ]);
});/*}}}*/

if_get('/accounts/add', function ()
{/*{{{*/
    return render('account/add', [
    ]);
});/*}}}*/

if_post('/accounts/add', function ()
{/*{{{*/
    $name = input('name');
    otherwise_error_code('ACCOUNT_REQUIRE_NAME', not_null($name));

    $email = input('email');
    otherwise_error_code('ACCOUNT_REQUIRE_EMAIL', not_null($email));

    $password = input('password');
    otherwise_error_code('ACCOUNT_REQUIRE_PASSWORD', not_null($password));

    $is_admin = input('is_admin');
    otherwise_error_code('ACCOUNT_REQUIRE_IS_ADMIN', not_null($is_admin));

    list($last_login_ip) = input_list('last_login_ip');

    $account = account::create(
        $name,
        $email,
        $password,
        $is_admin
    );

    if (not_null($last_login_ip)) { $account->last_login_ip = $last_login_ip; }
    return redirect(input('refer_url', '/accounts'));
});/*}}}*/

if_get('/accounts/detail/*', function ($account_id)
{/*{{{*/
    $account = dao('account')->find($account_id);
    otherwise_error_code('ACCOUNT_NOT_FOUND', $account->is_not_null());

    return render('account/detail', [
        'account' => $account,
    ]);
});/*}}}*/

if_get('/accounts/update/*', function ($account_id)
{/*{{{*/
    $account = dao('account')->find($account_id);
    otherwise($account->is_not_null(), 'account 不存在');

    return render('account/update', [
        'account' => $account,
    ]);
});/*}}}*/

if_post('/accounts/update/*', function ($account_id)
{/*{{{*/
    list($name, $email, $password, $last_login_ip, $is_admin) = input_list('name', 'email', 'password', 'last_login_ip', 'is_admin');

    $account = dao('account')->find($account_id);
    otherwise_error_code('ACCOUNT_NOT_FOUND', $account->is_not_null());

    if (not_null($name)) { $account->name = $name; }
    if (not_null($email)) { $account->email = $email; }
    if (not_null($password)) { $account->password = $password; }
    if (not_null($last_login_ip)) { $account->last_login_ip = $last_login_ip; }
    if (not_null($is_admin)) { $account->is_admin = $is_admin; }

    return redirect('/accounts');
});/*}}}*/

if_post('/accounts/delete/*', function ($account_id)
{/*{{{*/
    $account = dao('account')->find($account_id);
    otherwise_error_code('ACCOUNT_NOT_FOUND', $account->is_not_null());

    $account->delete();

    return redirect('/accounts');
});/*}}}*/
