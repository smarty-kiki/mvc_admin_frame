<?php

if_get('/roles', function ()
{/*{{{*/
    $current_account = get_logined_account();

    $roles = dao('role')->find_all_order_by_id_desc();

    relationship_batch_load($roles, 'account_roles');

    return render('role/list', [
        'roles' => $roles,
    ]);
});/*}}}*/

if_get('/roles/add', function ()
{/*{{{*/
    $current_account = get_logined_account();

    $ability_configs = config('ability');

    $refer_url = refer_uri();

    return render('role/add', [
        'ability_configs' => $ability_configs,
        'refer_url' => $refer_url,
    ]);
});/*}}}*/

if_post('/roles/add', function ()
{/*{{{*/
    $current_account = get_logined_account();

    $ability_configs = config('ability');

    $role_abilities = [];
    foreach ($ability_configs as $model_key => $abilities) 
    {
        $role_ability = input($model_key, []);

        foreach ($role_ability as $role_key => $value) {
            if ($value === 'false') {
                unset($role_ability[$role_key]);
            }
        }

        $role_abilities[$model_key] = $role_ability;
    }

    $name = input('name');
    otherwise_error_code('ROLE_REQUIRE_NAME', not_empty($name));

    $key = input('key');
    otherwise_error_code('ROLE_REQUIRE_KEY', not_empty($key));

    $role = role::create(
        $name,
        $key,
        $role_abilities
    );

    return [
        'id' => $role->id,
    ];
});/*}}}*/

if_get('/roles/detail/*', function ($role_id)
{/*{{{*/
    $current_account = get_logined_account();

    $ability_configs = config('ability');

    $role = dao('role')->find($role_id);
    otherwise_error_code('ROLE_NOT_FOUND', $role->is_not_null());

    return render('role/detail', [
        'ability_configs' => $ability_configs,
        'role' => $role,
    ]);
});/*}}}*/

if_get('/roles/update/*', function ($role_id)
{/*{{{*/
    $current_account = get_logined_account();

    $ability_configs = config('ability');

    $refer_url = refer_uri();

    $role = dao('role')->find($role_id);
    otherwise_error_code('ROLE_NOT_FOUND', $role->is_not_null());

    return render('role/update', [
        'role' => $role,
        'ability_configs' => $ability_configs,
        'refer_url' => $refer_url,
    ]);
});/*}}}*/

if_post('/roles/update/*', function ($role_id)
{/*{{{*/
    list($name, $key) = input_list('name', 'key');

    otherwise_error_code('ROLE_REQUIRE_NAME', not_empty($name));
    otherwise_error_code('ROLE_REQUIRE_KEY', not_empty($key));

    $ability_configs = config('ability');

    $role_abilities = [];
    foreach ($ability_configs as $model_key => $abilities) 
    {
        $role_ability = input($model_key, []);

        foreach ($role_ability as $role_key => $value) {
            if ($value === 'false') {
                unset($role_ability[$role_key]);
            }
        }

        $role_abilities[$model_key] = $role_ability;
    }

    $role = dao('role')->find($role_id);
    otherwise_error_code('ROLE_NOT_FOUND', $role->is_not_null());

    $role->name = $name;
    $role->key = $key;
    $role->set_role_abilities($role_abilities);

    return [
        'id' => $role->id,
    ];
});/*}}}*/

if_post('/roles/delete/*', function ($role_id)
{/*{{{*/
    $current_account = get_logined_account();

    $role = dao('role')->find($role_id);
    otherwise_error_code('ROLE_NOT_FOUND', $role->is_not_null());

    $role->delete();

    return redirect('/roles');
});/*}}}*/
