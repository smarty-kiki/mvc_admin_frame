<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>账号角色关系[{{ $account_role->id }}]修改</title>
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
        <td>账号</td>
        <td>
            <select name='account_id'>
            @foreach ($accounts as $id => $account)
                <option value='{{ $id }}' {{ $id === $account_role->account_id?'selected':'' }}>{{ $account->display_for_account_roles_account() }}</option>
            @endforeach
            </select>
        </td>
    </tr>
    <tr>
        <td>角色</td>
        <td>
            <select name='role_id'>
            @foreach ($roles as $id => $role)
                <option value='{{ $id }}' {{ $id === $account_role->role_id?'selected':'' }}>{{ $role->display_for_account_roles_role() }}</option>
            @endforeach
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
