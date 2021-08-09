<?php

if_get('/account_roles', function ()
{/*{{{*/
    $inputs = [];

    list(
        $inputs['account_id'], $inputs['role_id']
    ) = input_list(
        'account_id', 'role_id'
    );

    $inputs = array_filter($inputs, 'not_null');

    return render('account_role/list', [
        'account_roles' => dao('account_role')->find_all_by_column($inputs),
    ]);
});/*}}}*/

if_get('/account_roles/add', function ()
{/*{{{*/
    return render('account_role/add', [
        'accounts' => dao('account')->find_all(),
        'roles' => dao('role')->find_all(),
    ]);
});/*}}}*/

if_post('/account_roles/add', function ()
{/*{{{*/
    $account_role = account_role::create(
        input_entity('account', 'account_id', true),
        input_entity('role', 'role_id', true)
    );

    return redirect(input('refer_url', '/account_roles'));
});/*}}}*/

if_get('/account_roles/detail/*', function ($account_role_id)
{/*{{{*/
    $account_role = dao('account_role')->find($account_role_id);
    otherwise_error_code('ACCOUNT_ROLE_NOT_FOUND', $account_role->is_not_null());

    return render('account_role/detail', [
        'account_role' => $account_role,
    ]);
});/*}}}*/

if_get('/account_roles/update/*', function ($account_role_id)
{/*{{{*/
    $account_role = dao('account_role')->find($account_role_id);
    otherwise($account_role->is_not_null(), 'account_role 不存在');

    return render('account_role/update', [
        'account_role' => $account_role,
        'accounts' => dao('account')->find_all(),
        'roles' => dao('role')->find_all(),
    ]);
});/*}}}*/

if_post('/account_roles/update/*', function ($account_role_id)
{/*{{{*/
    $account_role = dao('account_role')->find($account_role_id);
    otherwise_error_code('ACCOUNT_ROLE_NOT_FOUND', $account_role->is_not_null());

    $account_role->account = input_entity('account', 'account_id', true);

    $account_role->role = input_entity('role', 'role_id', true);


    return redirect('/account_roles');
});/*}}}*/

if_post('/account_roles/delete/*', function ($account_role_id)
{/*{{{*/
    $account_role = dao('account_role')->find($account_role_id);
    otherwise_error_code('ACCOUNT_ROLE_NOT_FOUND', $account_role->is_not_null());

    $account_role->delete();

    return redirect('/account_roles');
});/*}}}*/
