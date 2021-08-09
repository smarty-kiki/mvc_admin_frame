<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>账号角色关系</title>
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
<thead>
    <tr>
        <th>ID</th>
        <th>账号</th>
        <th>角色</th>
        <th>
            <a href='/account_roles/add'>添加</a>
        </th>
    </tr>
</thead>
    @foreach ($account_roles as $id => $account_role)
    <tr>
        <td>{{ $id }}</td>
        <td>{{ $account_role->account->display_for_account_roles_account() }}</td>
        <td>{{ $account_role->role->display_for_account_roles_role() }}</td>
        <td>
            <a href='/account_roles/detail/{{ $account_role->id }}'>详情</a>
            <a href='/account_roles/update/{{ $account_role->id }}'>修改</a>
            <a href='javascript:delete_{{ $account_role->id }}.submit();'>删除</a>
            <form id='delete_{{ $account_role->id }}' action='/account_roles/delete/{{ $account_role->id }}' method='POST'></form>
        </td>
    </tr>
    @endforeach
<tbody>
</tbody>
</table>
</body>
</html>
