<?php

function get_logined_account()
{/*{{{*/
    static $container = null;

    if (is_null($container)) {

        $login_sign = cookie('sign');

        $account = dao('account')->find_by_login_sign($login_sign);

        $container = $account;
    }

    return $container;
}/*}}}*/