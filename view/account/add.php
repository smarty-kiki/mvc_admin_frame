<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>账号添加</title>
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

    <form action='' method='POST'>
    <tr>
        <td><span style="color:red;">*</span>姓名</td>
        <td>
            <input type='text' name='name'>
        </td>
    </tr>
    <tr>
        <td><span style="color:red;">*</span>电子邮箱</td>
        <td>
            <input type='text' name='email'>
        </td>
    </tr>
    <tr>
        <td><span style="color:red;">*</span>密码</td>
        <td>
            <input type='text' name='password'>
        </td>
    </tr>
    <tr>
        <td>最后登陆IP</td>
        <td>
            <input type='text' name='last_login_ip'>
        </td>
    </tr>
    <tr>
        <td><span style="color:red;">*</span>管理员</td>
        <td>
            <select name='is_admin'>
    <option value='{{ account::IS_ADMIN_1 }}'>{{ account::IS_ADMIN_MAPS[account::IS_ADMIN_1] }}</option>
    <option value='{{ account::IS_ADMIN_ }}'>{{ account::IS_ADMIN_MAPS[account::IS_ADMIN_] }}</option>
</select>
        </td>
    </tr>
    <tr>
        <td>
            <a href='javascript:window.history.back(-1);'>取消</a>
        </td>
        <td>
            <input type='submit' value='保存'>
        </td>
    </tr>
    </form>
</tbody>
</table>
</body>
<script>
</script>
</html>
