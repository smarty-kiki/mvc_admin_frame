<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>角色能力关系添加</title>
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
        <td>角色</td>
        <td>
            <select name='role_id'>
            @foreach ($roles as $id => $role)
                <option value='{{ $id }}'>{{ $role->display_for_role_abilities_role() }}</option>
            @endforeach
            </select>
            <a href="/roles/add?refer_url=/role_abilities/add">添加</a>
        </td>
    </tr>
    <tr>
        <td>能力</td>
        <td>
            <select name='ability_id'>
            @foreach ($abilities as $id => $ability)
                <option value='{{ $id }}'>{{ $ability->display_for_role_abilities_ability() }}</option>
            @endforeach
            </select>
            <a href="/abilities/add?refer_url=/role_abilities/add">添加</a>
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
