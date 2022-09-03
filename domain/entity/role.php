<?php

class role extends entity
{
    /* generated code start */
    public $structs = [
        'name' => '',
        'key' => '',
        'role_abilities_json' => '',
    ];

    public static $struct_data_types = [
        'name' => 'string',
        'key' => 'string',
        'role_abilities_json' => 'string',
    ];

    public static $struct_display_names = [
        'name' => '名称',
        'key' => '标识',
        'role_abilities_json' => '角色权限JSON',
    ];


    public static $struct_is_required = [
        'name' => true,
        'key' => true,
        'role_abilities_json' => true,
    ];

    public function __construct()
    {/*{{{*/
        $this->has_many('account_roles', 'account_role');
    }/*}}}*/

    public static function create($name, $key, array $role_abilities)
    {/*{{{*/
        $role = parent::init();

        $role->name = $name;
        $role->key = $key;
        $role->set_role_abilities($role_abilities);

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

        parent::delete();
    }/*}}}*/

    public function display_for_account_roles_role()
    {/*{{{*/
        return $this->id;
    }/*}}}*/
    /* generated code end */

    public function get_role_abilities()
    {/*{{{*/
        return json_decode($this->role_abilities_json, true);
    }/*}}}*/

    public function set_role_abilities(array $role_abilities)
    {/*{{{*/
        $this->role_abilities_json = json($role_abilities);
    }/*}}}*/
}
