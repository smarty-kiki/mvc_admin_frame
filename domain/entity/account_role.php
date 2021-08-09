<?php

class account_role extends entity
{
    /* generated code start */
    public $structs = [
        'account_id' => 0,
        'role_id' => 0,
    ];

    public static $struct_data_types = [
        'account_id' => 'number',
        'role_id' => 'number',
    ];

    public static $struct_display_names = [
        'account_id' => '账号ID',
        'role_id' => '角色ID',
    ];


    public static $struct_is_required = [
        'account_id' => true,
        'role_id' => true,
    ];

    public function __construct()
    {/*{{{*/
        $this->belongs_to('account');
        $this->belongs_to('role');
    }/*}}}*/

    public static function create(account $account, role $role)
    {/*{{{*/
        $account_role = parent::init();

        $account_role->account = $account;
        $account_role->role = $role;

        return $account_role;
    }/*}}}*/

    public static function struct_validators($property)
    {/*{{{*/
        $validators = [
        ];

        return $validators[$property] ?? false;
    }/*}}}*/

    public function belongs_to_account(account $account)
    {/*{{{*/
        return $this->account_id == $account->id;
    }/*}}}*/

    public function belongs_to_role(role $role)
    {/*{{{*/
        return $this->role_id == $role->id;
    }/*}}}*/

    public function display_for_account_account_roles()
    {/*{{{*/
        return $this->id;
    }/*}}}*/

    public function display_for_role_account_roles()
    {/*{{{*/
        return $this->id;
    }/*}}}*/
    /* generated code end */
}
