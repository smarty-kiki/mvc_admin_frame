<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>账户[{{ $account->name }}]修改</title>
    <style>
        table {
            font-family: verdana,arial,sans-serif;
            font-size: 11px;
            color: #333333;
            border-width: 1px;
            border-color: #666666;
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
        table td {
            border-width: 0px;
            padding: 8px;
            background-color: #ffffff;
            text-align: left;
        }
        td:first-child {
            width: 100px;
            text-align: right;
        }
        .error {
            color: red;
            margin-left: 10px;
        }
    </style>
</head>
<body>

    <form action='' method='POST' ajax="true">
        <input type="hidden" name="refer_url" value="{{ $refer_url }}">
        <table>
            <tbody>
                <tr>
                    <td><span style="color:red;">*</span>姓名</td>
                    <td><input type='text' name='name' value='{{ $account->name }}'></td>
                </tr>
                <tr>
                    <td><span style="color:red;">*</span>邮箱</td>
                    <td><input type='text' name='email' value='{{ $account->email }}'></td>
                </tr>
                <tr>
                    <td>新密码</td>
                    <td><input type='text' name='new_password' value=''></td>
                </tr>
@if ($current_account->is_admin_is_yes())
                <tr>
                    <td><span style="color:red;">*</span>管理员</td>
                    <td>
                        <select name='is_admin'>
                            <option value='{{ account::IS_ADMIN_YES }}' {{ $account->is_admin_is_yes()? 'selected': '' }}>{{ account::IS_ADMIN_MAPS[account::IS_ADMIN_YES] }}</option>
                            <option value='{{ account::IS_ADMIN_NO }}' {{ $account->is_admin_is_no()? 'selected': '' }}>{{ account::IS_ADMIN_MAPS[account::IS_ADMIN_NO] }}</option>
                        </select>
                    </td>
                </tr>
@endif
                <tr>
                    <td><a href='javascript:window.history.back(-1);'>取消</a></td>
                    <td><input type='submit' value='保存'><span class="error"></span></td>
                </tr>
            </tbody>
        </table>
    </form>
    <script src="/js/zepto.min.js"></script>
    <script src="/js/mvc_admin.lib.js"></script>

</body>
</html>