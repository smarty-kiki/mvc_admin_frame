<?php

class account extends entity
{
    /* generated code start */
    public $structs = [
        'name' => '',
        'email' => '',
        'password' => '',
        'last_login_ip' => '',
        'is_admin' => '',
    ];

    public static $struct_data_types = [
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'last_login_ip' => 'string',
        'is_admin' => 'enum',
    ];

    public static $struct_display_names = [
        'name' => '姓名',
        'email' => '电子邮箱',
        'password' => '密码',
        'last_login_ip' => '最后登陆IP',
        'is_admin' => '管理员',
    ];


    const IS_ADMIN_1 = '1';
    const IS_ADMIN_ = '';

    const IS_ADMIN_MAPS = [
        self::IS_ADMIN_1 => '是',
        self::IS_ADMIN_ => '否',
    ];

    public static $struct_is_required = [
        'name' => true,
        'email' => true,
        'password' => true,
        'last_login_ip' => false,
        'is_admin' => true,
    ];

    public function __construct()
    {/*{{{*/
        $this->has_many('account_roles', 'account_role');
    }/*}}}*/

    public static function create($name, $email, $password, $is_admin)
    {/*{{{*/
        $account = parent::init();

        $account->name = $name;
        $account->email = $email;
        $account->password = $password;
        $account->is_admin = $is_admin;

        return $account;
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
            'email' => [
                [
                    'reg' => '/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/',
                    'failed_message' => '不是有效的电子邮箱格式',
                ],
            ],
            'password' => [
                [
                    'function' => function ($value) {
                        return mb_strlen($value) <= 100;
                    },
                    'failed_message' => '不能超过 100 个字符',
                ],
                [
                    'function' => function ($value) {
                        return mb_strlen($value) >= 8;
                    },
                    'failed_message' => '不能少于 8 个字符',
                ],
                [
                    'reg' => '/^(?=(?:.*?\d){1})(?=.*[a-z])(?=(?:.*?[A-Z]){1})(?=(?:.*?[!@#$%*()_+^&}{:;?.]){1})(?!.*\s)[0-9a-zA-Z!@#$%*()_+^&]*$/',
                    'failed_message' => '包含至少 1 个特殊字符，1 个数字，1 个大写字母和 1 个小写字母',
                ],
            ],
            'last_login_ip' => [
                [
                    'reg' => '/^(25[0-5]|2[0-4]\d|[0-1]?\d?\d)(\.(25[0-5]|2[0-4]\d|[0-1]?\d?\d)){3}$/',
                    'failed_message' => '不是有效的 IP 格式',
                ],
            ],
            'is_admin' => self::IS_ADMIN_MAPS,
        ];

        return $validators[$property] ?? false;
    }/*}}}*/

    public function get_is_admin_description()
    {/*{{{*/
        return self::IS_ADMIN_MAPS[$this->is_admin];
    }/*}}}*/

    public function is_admin_is_1()
    {/*{{{*/
        return $this->is_admin === self::IS_ADMIN_1;
    }/*}}}*/

    public function set_is_admin_1()
    {/*{{{*/
        return $this->is_admin = self::IS_ADMIN_1;
    }/*}}}*/

    public function is_admin_is_()
    {/*{{{*/
        return $this->is_admin === self::IS_ADMIN_;
    }/*}}}*/

    public function set_is_admin_()
    {/*{{{*/
        return $this->is_admin = self::IS_ADMIN_;
    }/*}}}*/

    public function delete()
    {/*{{{*/
        foreach ($this->account_roles as $account_role) {
            if ($account_role->account_id === $this->id) {
                $account_role->delete();
            }
        }

        parent::delete();
    }/*}}}*/

    public function display_for_account_roles_account()
    {/*{{{*/
        return $this->id;
    }/*}}}*/
    /* generated code end */
}
