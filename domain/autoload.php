<?php

spl_autoload_register(function ($class_name) {

    $class_maps = [
        'account_dao' => 'dao/account.php',
        'account_role_dao' => 'dao/account_role.php',
        'role_dao' => 'dao/role.php',
        'account' => 'entity/account.php',
        'account_role' => 'entity/account_role.php',
        'role' => 'entity/role.php',
    ];

    if (isset($class_maps[$class_name])) {
        include __DIR__.'/'.$class_maps[$class_name];
    }
});
