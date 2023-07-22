<?php

if_get('/accounts', function ()
{/*{{{*/
    $current_account = get_logined_account();

    return render('account/list', [
        'accounts' => dao('account')->find_all_order_by_id_desc(),
        'current_account' => $current_account,
    ]);
});/*}}}*/

if_get('/accounts/add', function ()
{/*{{{*/
    $refer_url = refer_uri();

    return render('account/add', [
        'refer_url' => $refer_url,
    ]);
});/*}}}*/

if_post('/accounts/add', function ()
{/*{{{*/
    $name = input('name');
    otherwise_error_code('ACCOUNT_REQUIRE_NAME', $name);

    $email = input('email');
    otherwise_error_code('ACCOUNT_REQUIRE_EMAIL', $email);

    $password = input('password');
    otherwise_error_code('ACCOUNT_REQUIRE_PASSWORD', $password);

    $password_repeat = input('password_repeat');
    otherwise_error_code('ACCOUNT_REQUIRE_PASSWORD_REPEAT', $password_repeat);
    otherwise_error_code('ACCOUNT_REQUIRE_PASSWORD_REPEAT_NOT_SAME', $password_repeat === $password);

    $is_admin = input('is_admin');
    otherwise_error_code('ACCOUNT_REQUIRE_IS_ADMIN', $is_admin);

    $another_account = dao('account')->find_by_email($email);
    otherwise_error_code('ACCOUNT_SAME_EMAIL', $another_account->is_null(), [':account_id' => $another_account->id]);

    $new_account = account::create(
        $name,
        $email,
        $password,
        $is_admin
    );

    return [
        'id' => $new_account->id,
    ];
});/*}}}*/

if_get('/accounts/detail/*', function ($account_id)
{/*{{{*/
    $account = dao('account')->find($account_id);
    otherwise_error_code('ACCOUNT_NOT_FOUND', $account->is_not_null());

    return render('account/detail', [
        'account' => $account,
    ]);
});/*}}}*/

if_get('/accounts/update/mine_info', function ()
{/*{{{*/
    $current_account = get_logined_account();

    return render('account/update_mine_info', [
        'refer_url'     => uri(),
        'account'       => $current_account,
    ]);
});/*}}}*/

if_post('/accounts/update/mine_info', function ()
{/*{{{*/
    $current_account = get_logined_account();

    $email = input('email');
    $name  = input('name');

    $another_account = dao('account')->find_by_email($email);
    otherwise_error_code('ACCOUNT_SAME_EMAIL',
        $another_account->is_null() || $another_account->id === $current_account->id,
        [':account_id' => $another_account->id]
    );

    $current_account->email = $email;
    $current_account->name  = $name;

    return [];
});/*}}}*/

if_get('/accounts/update/mine_password', function ()
{/*{{{*/
    $current_account = get_logined_account();

    return render('account/update_mine_password', [
        'refer_url' => uri(),
        'account' => $current_account,
    ]);
});/*}}}*/

if_post('/accounts/update/mine_password', function ()
{/*{{{*/
    $current_account = get_logined_account();

    $old_password = input('old_password');
    $new_password = input('new_password');
    $new_password_repeat = input('new_password_repeat');

    otherwise_error_code('ACCOUNT_CHANGE_PASSWORD_NEED_OLD_AND_NEW',
        not_empty($old_password) && not_empty($new_password) && not_empty($new_password_repeat)
    );

    otherwise_error_code('ACCOUNT_CHANGE_PASSWORD_OLD_WRONG', $current_account->password_is_right($old_password));
    otherwise_error_code('ACCOUNT_CHANGE_PASSWORD_NEW_NOT_SAME', $new_password === $new_password_repeat);

    $current_account->change_password($new_password);

    return [];
});/*}}}*/

if_get('/accounts/update/*', function ($account_id)
{/*{{{*/
    $current_account = get_logined_account();
    $refer_url = refer_uri();

    $account = dao('account')->find($account_id);
    otherwise_error_code('ACCOUNT_NOT_FOUND', $account->is_not_null());

    return render('account/update', [
        'account' => $account,
        'current_account' => $current_account,
        'refer_url' => $refer_url,
    ]);
});/*}}}*/

if_post('/accounts/update/*', function ($account_id)
{/*{{{*/
    list($name, $email, $new_password, $is_admin) = input_list('name', 'email', 'new_password', 'is_admin');

    $account = dao('account')->find($account_id);
    otherwise_error_code('ACCOUNT_NOT_FOUND', $account->is_not_null());

    otherwise_error_code('ACCOUNT_REQUIRE_NAME', $name);
    $account->name = $name;

    otherwise_error_code('ACCOUNT_REQUIRE_EMAIL', $email);

    $another_account = dao('account')->find_by_email($email);
    otherwise_error_code('ACCOUNT_SAME_EMAIL',
        $another_account->is_null() || $another_account->id === $account->id,
        [':account_id' => $another_account->id]
    );
    $account->email = $email;

    if (not_empty($new_password)) { $account->change_password($new_password); }
    if (not_empty($is_admin)) { $account->is_admin = $is_admin; }

    return [];
});/*}}}*/

if_post('/accounts/delete/*', function ($account_id)
{/*{{{*/
    $account = dao('account')->find($account_id);
    otherwise_error_code('ACCOUNT_NOT_FOUND', $account->is_not_null());

    $account->delete();

    return redirect('/accounts');
});/*}}}*/

if_post('/accounts/logout/*', function ($account_id)
{/*{{{*/
    $account = dao('account')->find($account_id);
    otherwise_error_code('ACCOUNT_NOT_FOUND', $account->is_not_null());

    $account->logout();

    return redirect('/accounts');
});/*}}}*/

if_get('/accounts/roles/update/*', function ($account_id)
{/*{{{*/
    $current_account = get_logined_account();

    $refer_url = refer_uri();

    $account = dao('account')->find($account_id);
    otherwise_error_code('ACCOUNT_NOT_FOUND', $account->is_not_null());

    $roles_by_account = relationship_batch_load($account->account_roles, 'role');

    $roles = dao('role')->find_all_order_by_id_desc();

    return render('account/roles_update', [
        'account' => $account,
        'current_account' => $current_account,
        'refer_url' => $refer_url,
        'roles' => $roles,
        'roles_by_account' => $roles_by_account,
    ]);
});/*}}}*/

if_post('/accounts/roles/update/*', function ($account_id)
{/*{{{*/
    $account = dao('account')->find($account_id);
    otherwise_error_code('ACCOUNT_NOT_FOUND', $account->is_not_null());

    $roles = input('roles', []);

    foreach ($account->account_roles as $account_role) {
        if (array_get($roles, $account_role->role_id) === 'false') {
            $account_role->delete();
        }
        unset($roles[$account_role->role_id]);
    }

    foreach ($roles as $role_id => $res) {
        $role = dao('role')->find($role_id);
        account_role::create($account, $role);
    }

    return [];
});/*}}}*/
