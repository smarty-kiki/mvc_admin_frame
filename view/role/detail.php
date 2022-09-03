<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>角色[{{ $role->name }}]修改</title>
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
     table.main_table td {
         border-width: 0px;
         padding: 8px;
         background-color: #ffffff;
         text-align: left;
     }
     table.main_table td:first-child {
        width: 100px;
        text-align: right;
     }
     table.sub_table td {
         border-width: 1px;
         padding: 8px;
         border-style: solid;
         border-color: #666666;
         background-color: #ffffff;
         text-align: left;
     }
     table.sub_table td:first-child {
        width: 100px;
        text-align: center;
     }
    </style>
</head>
<body>

<table class='main_table'>
<tbody>

    <tr>
        <td><span style="color:red;">*</span>名称</td>
        <td>
            {{ $role->name }}
        </td>
    </tr>
    <tr>
        <td><span style="color:red;">*</span>标识</td>
        <td>
            {{ $role->key }}
        </td>
    </tr>
</tbody>
</table>


<table class="sub_table">
<thead>
    <tr>
        <th>模块</th>
        <th>读权限</th>
        <th>写权限</th>
    </tr>
</thead>
<tbody>
@foreach ($ability_configs as $model_key => $ability_config)
    <tr model-key="{{ $model_key }}">
        <td>{{ $ability_config['name'] }}</td>
        <td>
@foreach ($ability_config['role']['read'] as $read_key => $read_name)
            <span><input onclick="return false" type="checkbox" {{ array_get($role->role_abilities, $model_key.'.'.$read_key)? 'checked': '' }}>{{ $read_name }}</span>
@endforeach
        </td>
        <td>
@foreach ($ability_config['role']['write'] as $write_key => $write_name)
            <span><input onclick="return false" type="checkbox" {{ array_get($role->role_abilities, $model_key.'.'.$write_key)? 'checked': '' }}>{{ $write_name }}</span>
@endforeach
        </td>
    </tr>
@endforeach
</tbody>
</table>

<table class='main_table'>
<tbody>
    <tr>
        <td>
            <a href='javascript:window.history.back(-1);'>取消</a>
        </td>
        <td>
        </td>
    </tr>
</tbody>
</table>

</body>
<script src="/js/zepto.min.js"></script>
<script src="/js/mvc_admin.lib.js"></script>
</html>
