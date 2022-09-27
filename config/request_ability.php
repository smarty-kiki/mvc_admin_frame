<?php

return [
    'no_login' => [
        '/login' => [
            'GET' => true,
            'POST' => true,
        ],
    ],

    'logined' => [
        '/' => [
            'GET' => '*',
        ],
        '/logout' => [
            'POST' => '*',
        ],

        '/roles' => [
            'GET' => 'role_setting.role_list',
        ],
        '/roles/detail/*' => [
            'GET' => 'role_setting.role_detail',
        ],
        '/roles/add' => [
            'GET' => 'role_setting.role_add',
            'POST' => 'role_setting.role_add',
        ],
        '/roles/update/*' => [
            'GET' => 'role_setting.role_update',
            'POST' => 'role_setting.role_update',
        ],
        '/roles/accounts/update/*' => [
            'GET' => 'role_setting.role_account',
            'POST' => 'role_setting.role_account',
        ],
        '/roles/delete/*' => [
            'POST' => 'role_setting.role_delete',
        ],

        '/accounts' => [
            'GET' => 'account_setting.account_list',
        ],
        '/accounts/detail/*' => [
            'GET' => 'account_setting.account_detail',
        ],
        '/accounts/add' => [
            'GET' => 'account_setting.account_add',
            'POST' => 'account_setting.account_add',
        ],
        '/accounts/update/*' => [
            'GET' => 'account_setting.account_update',
            'POST' => 'account_setting.account_update',
        ],
        '/accounts/delete/*' => [
            'POST' => 'account_setting.account_delete',
        ],
        '/accounts/roles/update/*' => [
            'GET' => 'account_setting.role_account',
            'POST' => 'account_setting.role_account',
        ],
        '/accounts/logout/*' => [
            'POST' => 'account_setting.account_logout',
        ],
        '/accounts/update/mine_info' => [
            'GET' => '*',
            'POST' => '*',
        ],
        '/accounts/update/mine_password' => [
            'GET' => '*',
            'POST' => '*',
        ],

        /* generated {{ $entity_name }} start */
        /* generated {{ $entity_name }} end */

        //more
    ],
];