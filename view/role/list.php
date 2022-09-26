<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>角色</title>
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
        <th>名称</th>
        <th>标识</th>
        <th>账户数量</th>
        <th>权限数量</th>
        <th>创建时间</th>
        <th>
            @if (role_ability_need('role_setting.role_add')) <a href='/roles/add'>添加</a> @endif
        </th>
    </tr>
</thead>
    @foreach ($roles as $id => $role)
    <tr>
        <td>{{ $id }}</td>
        <td>
            {{ $role->name }}
        </td>
        <td>
            {{ $role->key }}
        </td>
        <td>
            {{ count($role->account_roles) }}
        </td>
        <td>
            {{ count($role->role_abilities, COUNT_RECURSIVE) - count($role->role_abilities) }}
        </td>
        <td>
            {{ $role->create_time }}
        </td>
        <td>
            @if (role_ability_need('role_setting.role_detail')) <a href='/roles/detail/{{ $role->id }}'>详情</a> @endif
            @if (role_ability_need('role_setting.role_account')) <a href='/roles/accounts/update/{{ $role->id }}'>账户</a> @endif
            @if (role_ability_need('role_setting.role_update')) <a href='/roles/update/{{ $role->id }}'>修改</a> @endif
            @if (role_ability_need('role_setting.role_delete')) <a href='javascript:delete_{{ $role->id }}.submit();'>删除</a> @endif
            <form id='delete_{{ $role->id }}' action='/roles/delete/{{ $role->id }}' method='POST'></form>
        </td>
    </tr>
    @endforeach
<tbody>
</tbody>
</table>
</body>
</html>
