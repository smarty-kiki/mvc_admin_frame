<?php

spl_autoload_register(function ($class_name) {

    $class_maps = [
        'ability_dao' => 'dao/ability.php',
        'ability_group_dao' => 'dao/ability_group.php',
        'account_dao' => 'dao/account.php',
        'account_role_dao' => 'dao/account_role.php',
        'role_dao' => 'dao/role.php',
        'role_ability_dao' => 'dao/role_ability.php',
        'ability' => 'entity/ability.php',
        'ability_group' => 'entity/ability_group.php',
        'account' => 'entity/account.php',
        'account_role' => 'entity/account_role.php',
        'role' => 'entity/role.php',
        'role_ability' => 'entity/role_ability.php',
    ];

    if (isset($class_maps[$class_name])) {
        include __DIR__.'/'.$class_maps[$class_name];
    }
});
