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
    <input type='hidden' name='refer_url' value='{{ $refer_url }}'>
<table>
<tbody>
    <tr>
        <td><span style="color:red;">*</span>姓名</td>
        <td>
            <input type='text' name='name' value=''>
        </td>
    </tr>
    <tr>
        <td><span style="color:red;">*</span>邮箱</td>
        <td>
            <input type='text' name='email' value=''>
        </td>
    </tr>
    <tr>
        <td><span style="color:red;">*</span>密码</td>
        <td>
            <input type='password' name='password' value=''>
        </td>
    </tr>
    <tr>
        <td><span style="color:red;">*</span>密码重复</td>
        <td>
            <input type='password' name='password_repeat' value=''>
        </td>
    </tr>
    <tr>
        <td><span style="color:red;">*</span>管理员</td>
        <td>
            <select name='is_admin'>
                <option value='{{ account::IS_ADMIN_NO }}'>{{ account::IS_ADMIN_MAPS[account::IS_ADMIN_NO] }}</option>
                <option value='{{ account::IS_ADMIN_YES }}'>{{ account::IS_ADMIN_MAPS[account::IS_ADMIN_YES] }}</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>
            <a href='javascript:window.history.back(-1);'>取消</a>
        </td>
        <td>
            <input type='submit' value='保存'><span class="error"></span>
        </td>
    </tr>
</tbody>
</table>
    </form>
    <script src="/js/zepto.min.js"></script>
    <script src="/js/mvc_admin.lib.js"></script>
</body>
<script>
</script>
</html>
