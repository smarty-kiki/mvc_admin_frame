<?php

class role_ability extends entity
{
    /* generated code start */
    public $structs = [
        'role_id' => 0,
        'ability_id' => 0,
    ];

    public static $struct_data_types = [
        'role_id' => 'number',
        'ability_id' => 'number',
    ];

    public static $struct_display_names = [
        'role_id' => '角色ID',
        'ability_id' => '能力ID',
    ];


    public static $struct_is_required = [
        'role_id' => true,
        'ability_id' => true,
    ];

    public function __construct()
    {/*{{{*/
        $this->belongs_to('role');
        $this->belongs_to('ability');
    }/*}}}*/

    public static function create(role $role, ability $ability)
    {/*{{{*/
        $role_ability = parent::init();

        $role_ability->role = $role;
        $role_ability->ability = $ability;

        return $role_ability;
    }/*}}}*/

    public static function struct_validators($property)
    {/*{{{*/
        $validators = [
        ];

        return $validators[$property] ?? false;
    }/*}}}*/

    public function belongs_to_role(role $role)
    {/*{{{*/
        return $this->role_id == $role->id;
    }/*}}}*/

    public function belongs_to_ability(ability $ability)
    {/*{{{*/
        return $this->ability_id == $ability->id;
    }/*}}}*/

    public function display_for_role_role_abilities()
    {/*{{{*/
        return $this->id;
    }/*}}}*/

    public function display_for_ability_role_abilities()
    {/*{{{*/
        return $this->id;
    }/*}}}*/
    /* generated code end */
}
