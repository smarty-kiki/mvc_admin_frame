<?php

function get_logined_account($redirect = true)
{/*{{{*/
    static $container = null;

    if (is_null($container)) {

        $login_sign = cookie('sign');

        $account = dao('account')->find_by_login_sign($login_sign);

        if ($account->is_null() && $redirect) {

            redirect('/login?refer_url='.uri());
        }

        $container = $account;
    }

    return $container;
}/*}}}*/