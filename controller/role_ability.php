<?php

if_get('/role_abilities', function ()
{/*{{{*/
    $inputs = [];

    list(
        $inputs['role_id'], $inputs['ability_id']
    ) = input_list(
        'role_id', 'ability_id'
    );

    $inputs = array_filter($inputs, 'not_null');

    return render('role_ability/list', [
        'role_abilities' => dao('role_ability')->find_all_by_column($inputs),
    ]);
});/*}}}*/

if_get('/role_abilities/add', function ()
{/*{{{*/
    return render('role_ability/add', [
        'roles' => dao('role')->find_all(),
        'abilities' => dao('ability')->find_all(),
    ]);
});/*}}}*/

if_post('/role_abilities/add', function ()
{/*{{{*/
    $role_ability = role_ability::create(
        input_entity('role', 'role_id', true),
        input_entity('ability', 'ability_id', true)
    );

    return redirect(input('refer_url', '/role_abilities'));
});/*}}}*/

if_get('/role_abilities/detail/*', function ($role_ability_id)
{/*{{{*/
    $role_ability = dao('role_ability')->find($role_ability_id);
    otherwise_error_code('ROLE_ABILITY_NOT_FOUND', $role_ability->is_not_null());

    return render('role_ability/detail', [
        'role_ability' => $role_ability,
    ]);
});/*}}}*/

if_get('/role_abilities/update/*', function ($role_ability_id)
{/*{{{*/
    $role_ability = dao('role_ability')->find($role_ability_id);
    otherwise($role_ability->is_not_null(), 'role_ability 不存在');

    return render('role_ability/update', [
        'role_ability' => $role_ability,
        'roles' => dao('role')->find_all(),
        'abilities' => dao('ability')->find_all(),
    ]);
});/*}}}*/

if_post('/role_abilities/update/*', function ($role_ability_id)
{/*{{{*/
    $role_ability = dao('role_ability')->find($role_ability_id);
    otherwise_error_code('ROLE_ABILITY_NOT_FOUND', $role_ability->is_not_null());

    $role_ability->role = input_entity('role', 'role_id', true);

    $role_ability->ability = input_entity('ability', 'ability_id', true);


    return redirect('/role_abilities');
});/*}}}*/

if_post('/role_abilities/delete/*', function ($role_ability_id)
{/*{{{*/
    $role_ability = dao('role_ability')->find($role_ability_id);
    otherwise_error_code('ROLE_ABILITY_NOT_FOUND', $role_ability->is_not_null());

    $role_ability->delete();

    return redirect('/role_abilities');
});/*}}}*/
