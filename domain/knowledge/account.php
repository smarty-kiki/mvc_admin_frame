<?php

function account_login_cookie_set(account $account)
{/*{{{*/
    otherwise($account->login_sign, '需登录才可以设置登陆 cookie');

    setcookie('sign', $account->login_sign, time() + 3600 * 24 * 30, '/');
}/*}}}*/
