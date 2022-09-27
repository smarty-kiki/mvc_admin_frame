<?php

class account extends entity
{
    /* generated code start */
    public $structs = [
        'name' => '',
        'email' => '',
        'password' => '',
        'login_sign' => '',
        'last_login_ip' => '',
        'is_admin' => '',
    ];

    public static $struct_data_types = [
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'login_sign' => 'string',
        'last_login_ip' => 'string',
        'is_admin' => 'enum',
    ];

    public static $struct_display_names = [
        'name' => '姓名',
        'email' => '邮箱',
        'password' => '密码',
        'login_sign' => '登录标识',
        'last_login_ip' => '最后登陆IP',
        'is_admin' => '管理员',
    ];


    const IS_ADMIN_YES = 'YES';
    const IS_ADMIN_NO = 'NO';

    const IS_ADMIN_MAPS = [
        self::IS_ADMIN_YES => '是',
        self::IS_ADMIN_NO => '否',
    ];

    public static $struct_is_required = [
        'name' => true,
        'email' => true,
        'password' => true,
        'login_sign' => false,
        'last_login_ip' => false,
        'is_admin' => true,
    ];

    public function __construct()
    {/*{{{*/
        $this->has_many('account_roles', 'account_role');
    }/*}}}*/

    public static function create($name, $email, $password, $is_admin): account
    {/*{{{*/
        $account = parent::init();

        $account->name = $name;
        $account->email = $email;
        $account->is_admin = $is_admin;

        $account->change_password($password);

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
                    'failed_message' => '不是有效的邮箱格式',
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

    public function get_is_admin_description(): string
    {/*{{{*/
        return self::IS_ADMIN_MAPS[$this->is_admin];
    }/*}}}*/

    public function is_admin_is_yes(): bool
    {/*{{{*/
        return $this->is_admin === self::IS_ADMIN_YES;
    }/*}}}*/

    public function set_is_admin_yes(): string
    {/*{{{*/
        return $this->is_admin = self::IS_ADMIN_YES;
    }/*}}}*/

    public function is_admin_is_no(): bool
    {/*{{{*/
        return $this->is_admin === self::IS_ADMIN_NO;
    }/*}}}*/

    public function set_is_admin_no(): string
    {/*{{{*/
        return $this->is_admin = self::IS_ADMIN_NO;
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

    public static function encrypt_password($password): string
    {/*{{{*/
        return md5($password);
    }/*}}}*/

    public function login($last_login_ip)
    {/*{{{*/
        $this->last_login_ip = $last_login_ip;
        $this->login_sign = md5($this->id.'|'.$last_login_ip.'|'.$this->password);
    }/*}}}*/

    public function password_is_right($password): bool
    {/*{{{*/
        return self::encrypt_password($password) === $this->password;
    }/*}}}*/

    public function change_password($password)
    {/*{{{*/
        $this->password = self::encrypt_password($password);
    }/*}}}*/

    public function logout()
    {/*{{{*/
        $this->login_sign = '';
    }/*}}}*/
}
