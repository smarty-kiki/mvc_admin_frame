<?php

command('account:add', '添加账户', function ()
{/*{{{*/
    $name = command_paramater('name');
    $email = command_paramater('email');
    $password = command_paramater('password');
    $is_admin = command_paramater('is_admin', account::IS_ADMIN_NO);

    unit_of_work(function () use ($name, $email, $password, $is_admin) {
        try {
            $another_account = dao('account')->find_by_email($email);
            otherwise($another_account->is_null(), '该邮箱已有账户存在，ID: '.$another_account->id);

            $account = account::create($name, $email, $password, $is_admin);
            echo 'ID: '.$account->id."\n";
        } catch (exception $ex) {
            echo $ex->getMessage()."\n";
        }
    });
});/*}}}*/
