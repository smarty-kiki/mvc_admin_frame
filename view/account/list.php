<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>账号</title>
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
        <th>姓名</th>
        <th>电子邮箱</th>
        <th>密码</th>
        <th>最后登陆IP</th>
        <th>管理员</th>
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
            {{ $account->password }}
        </td>
        <td>
            {{ $account->last_login_ip }}
        </td>
        <td>
            {{ $account->get_is_admin_description() }}
        </td>
        <td>
            <a href='/accounts/detail/{{ $account->id }}'>详情</a>
            <a href='/accounts/update/{{ $account->id }}'>修改</a>
            <a href='javascript:delete_{{ $account->id }}.submit();'>删除</a>
            <form id='delete_{{ $account->id }}' action='/accounts/delete/{{ $account->id }}' method='POST'></form>
        </td>
    </tr>
    @endforeach
<tbody>
</tbody>
</table>
</body>
</html>
