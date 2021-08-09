<?php

class ability extends entity
{
    /* generated code start */
    public $structs = [
        'ability_group_id' => 0,
        'name' => '',
        'key' => '',
    ];

    public static $struct_data_types = [
        'ability_group_id' => 'number',
        'name' => 'string',
        'key' => 'string',
    ];

    public static $struct_display_names = [
        'ability_group_id' => '能力分组ID',
        'name' => '名称',
        'key' => '标识',
    ];


    public static $struct_is_required = [
        'ability_group_id' => true,
        'name' => true,
        'key' => true,
    ];

    public function __construct()
    {/*{{{*/
        $this->has_many('role_abilities', 'role_ability');
        $this->belongs_to('ability_group');
    }/*}}}*/

    public static function create(ability_group $ability_group, $name, $key)
    {/*{{{*/
        $ability = parent::init();

        $ability->ability_group = $ability_group;
        $ability->name = $name;
        $ability->key = $key;

        return $ability;
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

    public function belongs_to_ability_group(ability_group $ability_group)
    {/*{{{*/
        return $this->ability_group_id == $ability_group->id;
    }/*}}}*/

    public function delete()
    {/*{{{*/
        foreach ($this->role_abilities as $role_ability) {
            if ($role_ability->ability_id === $this->id) {
                $role_ability->delete();
            }
        }

        parent::delete();
    }/*}}}*/

    public function display_for_role_abilities_ability()
    {/*{{{*/
        return $this->id;
    }/*}}}*/

    public function display_for_ability_group_abilities()
    {/*{{{*/
        return $this->id;
    }/*}}}*/
    /* generated code end */
}
