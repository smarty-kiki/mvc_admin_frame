<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>账户</title>
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
        <th>姓名</th>
        <th>邮箱</th>
        <th>管理员</th>
        <th>最后登陆IP</th>
        <th>创建时间</th>
        <th>修改时间</th>
        <th>
            <a href='/accounts/add'>添加</a>
        </th>
    </tr>
</thead>
    @foreach ($accounts as $id => $account)
    <tr>
        <td>{{ $id }}</td>
        <td>
            {{ $account->name }}
        </td>
        <td>
            {{ $account->email }}
        </td>
        <td>
            {{ $account->get_is_admin_description() }}
        </td>
        <td>
            {{ $account->last_login_ip }}
        </td>
        <td>
            {{ $account->create_time }}
        </td>
        <td>
            {{ $account->update_time }}
        </td>
        <td>
            <a href='/accounts/detail/{{ $account->id }}'>详情</a>
            <a href='/accounts/roles/update/{{ $account->id }}'>角色</a>
            <a href='javascript:logout_{{ $account->id }}.submit();'>登出</a>
            <a href='/accounts/update/{{ $account->id }}'>修改</a>
            <a href='javascript:delete_{{ $account->id }}.submit();'>删除</a>
            <form id='logout_{{ $account->id }}' action='/accounts/logout/{{ $account->id }}' method='POST'></form>
            <form id='delete_{{ $account->id }}' action='/accounts/delete/{{ $account->id }}' method='POST'></form>
        </td>
    </tr>
    @endforeach
<tbody>
</tbody>
</table>
</body>
</html>
