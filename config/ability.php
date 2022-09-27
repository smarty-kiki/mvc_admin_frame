<?php

return [

    'role_setting' => [
        'name' => '角色管理',
        'role' => [
            'read' => [
                'role_list' => '角色列表',
                'role_detail' => '角色详情',
            ],
            'write' => [
                'role_add' => '角色添加',
                'role_update' => '角色修改',
                'role_account' => '账户绑定',
                'role_delete' => '角色删除',
            ],
        ],
    ],

    'account_setting' => [
        'name' => '账户管理',
        'role' => [
            'read' => [
                'account_list' => '账户管理',
                'account_detail' => '账户详情',
            ],
            'write' => [
                'account_add' => '账户添加',
                'account_logout' => '账户登出',
                'account_update' => '账户修改',
                'role_account' => '角色绑定',
                'account_delete' => '账户删除',
            ],
        ],
    ],

    /* generated {{ $entity_name }} start */
    /* generated {{ $entity_name }} end */

    //more

];
