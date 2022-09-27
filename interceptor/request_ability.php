<?php

function role_ability_request_can_access()
{
    $rule = matched_rule();
    $method = request_method();
    $request_abilities = config('request_ability');
    $need_ability = array_get($request_abilities, $rule.'.'.$method);
    $can_access = true;

    if (not_null($need_ability)) {
        $can_access = role_ability_need($need_ability);
    }

    return $can_access;
}