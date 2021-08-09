<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>角色能力关系[{{ $role_ability->id }}]修改</title>
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
        <td>角色</td>
        <td>
            {{ $role_ability->role->display_for_role_abilities_role() }}
        </td>
    </tr>
    <tr>
        <td>能力</td>
        <td>
            {{ $role_ability->ability->display_for_role_abilities_ability() }}
        </td>
    </tr>
</tbody>
</table>
</body>
<script>
</script>
</html>
