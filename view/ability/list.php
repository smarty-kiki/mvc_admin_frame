<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>能力</title>
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
        <th>能力分组</th>
        <th>名称</th>
        <th>标识</th>
        <th>
            <a href='/abilities/add'>添加</a>
        </th>
    </tr>
</thead>
    @foreach ($abilities as $id => $ability)
    <tr>
        <td>{{ $id }}</td>
        <td>{{ $ability->ability_group->display_for_abilities_ability_group() }}</td>
        <td>
            {{ $ability->name }}
        </td>
        <td>
            {{ $ability->key }}
        </td>
        <td>
            <a href='/abilities/detail/{{ $ability->id }}'>详情</a>
            <a href='/abilities/update/{{ $ability->id }}'>修改</a>
            <a href='javascript:delete_{{ $ability->id }}.submit();'>删除</a>
            <form id='delete_{{ $ability->id }}' action='/abilities/delete/{{ $ability->id }}' method='POST'></form>
        </td>
    </tr>
    @endforeach
<tbody>
</tbody>
</table>
</body>
</html>
