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
    </style>
</head>
<body>
    <table>
        <tbody>
            <tr>
                <td><span style="color:red;">*</span>姓名</td>
                <td>{{ $account->name }}</td>
            </tr>
            <tr>
                <td><span style="color:red;">*</span>邮箱</td>
                <td>{{ $account->email }}</td>
            </tr>
            <tr>
                <td>最后登陆IP</td>
                <td>{{ $account->last_login_ip }}</td>
            </tr>
            <tr>
                <td><span style="color:red;">*</span>管理员</td>
                <td>{{ $account->get_is_admin_description() }}</td>
            </tr>
            <tr>
                <td><a href='javascript:window.history.back(-1);'>取消</a></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>
</html>