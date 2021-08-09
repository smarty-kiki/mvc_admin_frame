<?php

class ability_group extends entity
{
    /* generated code start */
    public $structs = [
        'name' => '',
    ];

    public static $struct_data_types = [
        'name' => 'string',
    ];

    public static $struct_display_names = [
        'name' => '名称',
    ];


    public static $struct_is_required = [
        'name' => true,
    ];

    public function __construct()
    {/*{{{*/
        $this->has_many('abilities', 'ability');
    }/*}}}*/

    public static function create($name)
    {/*{{{*/
        $ability_group = parent::init();

        $ability_group->name = $name;

        return $ability_group;
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
        ];

        return $validators[$property] ?? false;
    }/*}}}*/

    public function delete()
    {/*{{{*/
        foreach ($this->abilities as $ability) {
            if ($ability->ability_group_id === $this->id) {
                $ability->delete();
            }
        }

        parent::delete();
    }/*}}}*/

    public function display_for_abilities_ability_group()
    {/*{{{*/
        return $this->id;
    }/*}}}*/
    /* generated code end */
}
