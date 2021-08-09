<?php

if_get('/', function ()
{
    return render('index/index', [
        'title' => 'hello world',
        'url_infos' => [
            [ 'name' => '账号管理', 'key' => 'account', 'href' => '/accounts', ],
            [ 'name' => '角色能力关系管理', 'key' => 'role_ability', 'href' => '/role_abilities', ],
            [ 'name' => '角色管理', 'key' => 'role', 'href' => '/roles', ],
            [ 'name' => '账号角色关系管理', 'key' => 'account_role', 'href' => '/account_roles', ],
            [ 'name' => '能力分组管理', 'key' => 'ability_group', 'href' => '/ability_groups', ],
            [ 'name' => '能力管理', 'key' => 'ability', 'href' => '/abilities', ],
        ],
    ]);
});

if_get('/health_check', function ()
{
    return 'ok';
});

if_get('/error_code_maps', function ()
{
    return config('error_code');
});
