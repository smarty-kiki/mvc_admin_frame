<?php

function role_ability_need($need_ability)
{
    if ($need_ability === '*') {
        return true;
    }

    $account = get_logined_account();
    if ($account->is_null()) {
        return false;
    }

    $roles = relationship_batch_load($account, 'account_roles.role');
    $can_access = false;

    foreach ($roles as $role) {
        $role_abilities = $role->role_abilities;
        if (array_get($role_abilities, $need_ability)) {
            $can_access = true;
            break;
        }
    }

    if ($account->is_admin_is_yes()) {
        $role_abilities = config('admin_ability');
        if (array_get($role_abilities, $need_ability)) {
            $can_access = true;
        }
    }

    return $can_access;
}