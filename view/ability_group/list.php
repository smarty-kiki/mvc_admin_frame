<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>能力分组</title>
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
        <th>名称</th>
        <th>
            <a href='/ability_groups/add'>添加</a>
        </th>
    </tr>
</thead>
    @foreach ($ability_groups as $id => $ability_group)
    <tr>
        <td>{{ $id }}</td>
        <td>
            {{ $ability_group->name }}
        </td>
        <td>
            <a href='/ability_groups/detail/{{ $ability_group->id }}'>详情</a>
            <a href='/ability_groups/update/{{ $ability_group->id }}'>修改</a>
            <a href='javascript:delete_{{ $ability_group->id }}.submit();'>删除</a>
            <form id='delete_{{ $ability_group->id }}' action='/ability_groups/delete/{{ $ability_group->id }}' method='POST'></form>
        </td>
    </tr>
    @endforeach
<tbody>
</tbody>
</table>
</body>
</html>
