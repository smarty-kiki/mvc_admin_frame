<?php

if_get('/ability_groups', function ()
{/*{{{*/
    $inputs = [];

    list(
        $inputs['name']
    ) = input_list(
        'name'
    );

    $inputs = array_filter($inputs, 'not_null');

    return render('ability_group/list', [
        'ability_groups' => dao('ability_group')->find_all_by_column($inputs),
    ]);
});/*}}}*/

if_get('/ability_groups/add', function ()
{/*{{{*/
    return render('ability_group/add', [
    ]);
});/*}}}*/

if_post('/ability_groups/add', function ()
{/*{{{*/
    $name = input('name');
    otherwise_error_code('ABILITY_GROUP_REQUIRE_NAME', not_null($name));

    $ability_group = ability_group::create(
        $name
    );

    return redirect(input('refer_url', '/ability_groups'));
});/*}}}*/

if_get('/ability_groups/detail/*', function ($ability_group_id)
{/*{{{*/
    $ability_group = dao('ability_group')->find($ability_group_id);
    otherwise_error_code('ABILITY_GROUP_NOT_FOUND', $ability_group->is_not_null());

    return render('ability_group/detail', [
        'ability_group' => $ability_group,
    ]);
});/*}}}*/

if_get('/ability_groups/update/*', function ($ability_group_id)
{/*{{{*/
    $ability_group = dao('ability_group')->find($ability_group_id);
    otherwise($ability_group->is_not_null(), 'ability_group 不存在');

    return render('ability_group/update', [
        'ability_group' => $ability_group,
    ]);
});/*}}}*/

if_post('/ability_groups/update/*', function ($ability_group_id)
{/*{{{*/
    list($name) = input_list('name');

    $ability_group = dao('ability_group')->find($ability_group_id);
    otherwise_error_code('ABILITY_GROUP_NOT_FOUND', $ability_group->is_not_null());

    if (not_null($name)) { $ability_group->name = $name; }

    return redirect('/ability_groups');
});/*}}}*/

if_post('/ability_groups/delete/*', function ($ability_group_id)
{/*{{{*/
    $ability_group = dao('ability_group')->find($ability_group_id);
    otherwise_error_code('ABILITY_GROUP_NOT_FOUND', $ability_group->is_not_null());

    $ability_group->delete();

    return redirect('/ability_groups');
});/*}}}*/
