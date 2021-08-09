<?php

class role extends entity
{
    /* generated code start */
    public $structs = [
        'name' => '',
        'key' => '',
    ];

    public static $struct_data_types = [
        'name' => 'string',
        'key' => 'string',
    ];

    public static $struct_display_names = [
        'name' => '名称',
        'key' => '标识',
    ];


    public static $struct_is_required = [
        'name' => true,
        'key' => true,
    ];

    public function __construct()
    {/*{{{*/
        $this->has_many('account_roles', 'account_role');
        $this->has_many('role_abilities', 'role_ability');
    }/*}}}*/

    public static function create($name, $key)
    {/*{{{*/
        $role = parent::init();

        $role->name = $name;
        $role->key = $key;

        return $role;
    }/*}}}*/

    public static function struct_validators($property)
    {/*{{{*/
        $validators = [
            'name' => [
                [
                    'function' => function ($value) {
                        return mb_strlen($value) <= 30;
                    },
                    'failed_message' => '不能超过 30 字',
                ],
            ],
            'key' => [
                [
                    'function' => function ($value) {
                        return mb_strlen($value) <= 30;
                    },
                    'failed_message' => '不能超过 30 字',
                ],
            ],
        ];

        return $validators[$property] ?? false;
    }/*}}}*/

    public function delete()
    {/*{{{*/
        foreach ($this->account_roles as $account_role) {
            if ($account_role->role_id === $this->id) {
                $account_role->delete();
            }
        }
        foreach ($this->role_abilities as $role_ability) {
            if ($role_ability->role_id === $this->id) {
                $role_ability->delete();
            }
        }

        parent::delete();
    }/*}}}*/

    public function display_for_account_roles_role()
    {/*{{{*/
        return $this->id;
    }/*}}}*/

    public function display_for_role_abilities_role()
    {/*{{{*/
        return $this->id;
    }/*}}}*/
    /* generated code end */
}
