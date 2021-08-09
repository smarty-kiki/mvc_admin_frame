<?php

if_get('/roles', function ()
{/*{{{*/
    $inputs = [];

    list(
        $inputs['name'], $inputs['key']
    ) = input_list(
        'name', 'key'
    );

    $inputs = array_filter($inputs, 'not_null');

    return render('role/list', [
        'roles' => dao('role')->find_all_by_column($inputs),
    ]);
});/*}}}*/

if_get('/roles/add', function ()
{/*{{{*/
    return render('role/add', [
    ]);
});/*}}}*/

if_post('/roles/add', function ()
{/*{{{*/
    $name = input('name');
    otherwise_error_code('ROLE_REQUIRE_NAME', not_null($name));

    $key = input('key');
    otherwise_error_code('ROLE_REQUIRE_KEY', not_null($key));

    $role = role::create(
        $name,
        $key
    );

    return redirect(input('refer_url', '/roles'));
});/*}}}*/

if_get('/roles/detail/*', function ($role_id)
{/*{{{*/
    $role = dao('role')->find($role_id);
    otherwise_error_code('ROLE_NOT_FOUND', $role->is_not_null());

    return render('role/detail', [
        'role' => $role,
    ]);
});/*}}}*/

if_get('/roles/update/*', function ($role_id)
{/*{{{*/
    $role = dao('role')->find($role_id);
    otherwise($role->is_not_null(), 'role 不存在');

    return render('role/update', [
        'role' => $role,
    ]);
});/*}}}*/

if_post('/roles/update/*', function ($role_id)
{/*{{{*/
    list($name, $key) = input_list('name', 'key');

    $role = dao('role')->find($role_id);
    otherwise_error_code('ROLE_NOT_FOUND', $role->is_not_null());

    if (not_null($name)) { $role->name = $name; }
    if (not_null($key)) { $role->key = $key; }

    return redirect('/roles');
});/*}}}*/

if_post('/roles/delete/*', function ($role_id)
{/*{{{*/
    $role = dao('role')->find($role_id);
    otherwise_error_code('ROLE_NOT_FOUND', $role->is_not_null());

    $role->delete();

    return redirect('/roles');
});/*}}}*/
