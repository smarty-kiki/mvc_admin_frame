<?php

if_get('/abilities', function ()
{/*{{{*/
    $inputs = [];

    list(
        $inputs['name'], $inputs['key'], $inputs['ability_group_id']
    ) = input_list(
        'name', 'key', 'ability_group_id'
    );

    $inputs = array_filter($inputs, 'not_null');

    return render('ability/list', [
        'abilities' => dao('ability')->find_all_by_column($inputs),
    ]);
});/*}}}*/

if_get('/abilities/add', function ()
{/*{{{*/
    return render('ability/add', [
        'ability_groups' => dao('ability_group')->find_all(),
    ]);
});/*}}}*/

if_post('/abilities/add', function ()
{/*{{{*/
    $name = input('name');
    otherwise_error_code('ABILITY_REQUIRE_NAME', not_null($name));

    $key = input('key');
    otherwise_error_code('ABILITY_REQUIRE_KEY', not_null($key));

    $ability = ability::create(
        input_entity('ability_group', 'ability_group_id', true),
        $name,
        $key
    );

    return redirect(input('refer_url', '/abilities'));
});/*}}}*/

if_get('/abilities/detail/*', function ($ability_id)
{/*{{{*/
    $ability = dao('ability')->find($ability_id);
    otherwise_error_code('ABILITY_NOT_FOUND', $ability->is_not_null());

    return render('ability/detail', [
        'ability' => $ability,
    ]);
});/*}}}*/

if_get('/abilities/update/*', function ($ability_id)
{/*{{{*/
    $ability = dao('ability')->find($ability_id);
    otherwise($ability->is_not_null(), 'ability 不存在');

    return render('ability/update', [
        'ability' => $ability,
        'ability_groups' => dao('ability_group')->find_all(),
    ]);
});/*}}}*/

if_post('/abilities/update/*', function ($ability_id)
{/*{{{*/
    list($name, $key) = input_list('name', 'key');

    $ability = dao('ability')->find($ability_id);
    otherwise_error_code('ABILITY_NOT_FOUND', $ability->is_not_null());

    $ability->ability_group = input_entity('ability_group', 'ability_group_id', true);

    if (not_null($name)) { $ability->name = $name; }
    if (not_null($key)) { $ability->key = $key; }

    return redirect('/abilities');
});/*}}}*/

if_post('/abilities/delete/*', function ($ability_id)
{/*{{{*/
    $ability = dao('ability')->find($ability_id);
    otherwise_error_code('ABILITY_NOT_FOUND', $ability->is_not_null());

    $ability->delete();

    return redirect('/abilities');
});/*}}}*/
