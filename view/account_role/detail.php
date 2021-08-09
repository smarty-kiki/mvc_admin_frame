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

    <tr>
        <td>账号</td>
        <td>
            {{ $account_role->account->display_for_account_roles_account() }}
        </td>
    </tr>
    <tr>
        <td>角色</td>
        <td>
            {{ $account_role->role->display_for_account_roles_role() }}
        </td>
    </tr>
</tbody>
</table>
</body>
<script>
</script>
</html>
