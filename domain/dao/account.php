<?php

class account_dao extends dao
{
    protected $table_name = 'account';
    protected $db_config_key = 'default';

    /* generated code start */
    /* generated code end */

    public function find_by_login_sign($login_sign)
    {/*{{{*/
        if (! $login_sign) {
            return null_entity::create('account');
        }

        return $this->find_by_column([
            'login_sign' => $login_sign,
        ]);
    }/*}}}*/

    public function find_by_email_and_password($email, $password)
    {/*{{{*/
        if (is_null($email) || is_null($password)) {
            return null_entity::create('account');
        }

        return $this->find_by_column([
            'email' => $email,
            'password' => account::encrypt_password($password),
        ]);
    }/*}}}*/

    public function find_by_email($email)
    {/*{{{*/
        if (is_null($email)) {
            return null_entity::create('account');
        }

        return $this->find_by_column([
            'email' => $email,
        ]);
    }/*}}}*/
}
