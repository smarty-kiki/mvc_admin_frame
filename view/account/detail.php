<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>账号[{{ $account->id }}]修改</title>
    <style>
     table {
         font-family: verdana,arial,sans-serif;
         font-size:11px;
         color:#333333;
         border-width: 1px;
         border-color: #666666;
         border-collapse: collapse;
         width: 100%;
     }
     table th {
         border-width: 1px;
         padding: 8px;
         border-style: solid;
         border-color: #666666;
         background-color: #dedede;
         text-align: center;
     }
     table td {
         border-width: 1px;
         padding: 8px;
         border-style: solid;
         border-color: #666666;
         background-color: #ffffff;
         text-align: center;
     }
    </style>
</head>
<body>
<table>
<tbody>

    <tr>
        <td><span style="color:red;">*</span>姓名</td>
        <td>
            {{ $account->name }}
        </td>
    </tr>
    <tr>
        <td><span style="color:red;">*</span>电子邮箱</td>
        <td>
            {{ $account->email }}
        </td>
    </tr>
    <tr>
        <td><span style="color:red;">*</span>密码</td>
        <td>
            {{ $account->password }}
        </td>
    </tr>
    <tr>
        <td>最后登陆IP</td>
        <td>
            {{ $account->last_login_ip }}
        </td>
    </tr>
    <tr>
        <td><span style="color:red;">*</span>管理员</td>
        <td>
                {{ $account->get_is_admin_description() }}
        </td>
    </tr>
</tbody>
</table>
</body>
<script>
</script>
</html>
