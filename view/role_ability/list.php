<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>角色能力关系</title>
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
        <th>角色</th>
        <th>能力</th>
        <th>
            <a href='/role_abilities/add'>添加</a>
        </th>
    </tr>
</thead>
    @foreach ($role_abilities as $id => $role_ability)
    <tr>
        <td>{{ $id }}</td>
        <td>{{ $role_ability->role->display_for_role_abilities_role() }}</td>
        <td>{{ $role_ability->ability->display_for_role_abilities_ability() }}</td>
        <td>
            <a href='/role_abilities/detail/{{ $role_ability->id }}'>详情</a>
            <a href='/role_abilities/update/{{ $role_ability->id }}'>修改</a>
            <a href='javascript:delete_{{ $role_ability->id }}.submit();'>删除</a>
            <form id='delete_{{ $role_ability->id }}' action='/role_abilities/delete/{{ $role_ability->id }}' method='POST'></form>
        </td>
    </tr>
    @endforeach
<tbody>
</tbody>
</table>
</body>
</html>
