<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>角色[{{ $role->id }}]修改</title>
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
        <td><span style="color:red;">*</span>名称</td>
        <td>
            <input type='text' name='name' value='{{ $role->name }}'>
        </td>
    </tr>
    <tr>
        <td><span style="color:red;">*</span>标识</td>
        <td>
            <input type='text' name='key' value='{{ $role->key }}'>
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
