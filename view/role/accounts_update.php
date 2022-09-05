<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>角色[{{ $role->name }}]账户</title>
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
     table td {
         border-width: 0px;
         padding: 8px;
         background-color: #ffffff;
         text-align: left;
     }
     td:first-child {
        width: 100px;
        text-align: right;
     }
     .error {
         color: red;
         margin-left: 10px;
     }
    </style>
</head>
<body>

    <form action='' method='POST' ajax="true">
    <input type="hidden" name="refer_url" value="{{ $refer_url }}">
<table>
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
    <tr>
        <td>账户</td>
        <td>
@foreach ($accounts as $account)
            <input id="account-{{ $account->id }}" type="checkbox" name="accounts[{{ $account->id }}]" {{ array_key_exists($account->id, $accounts_by_role)? 'checked': '' }}><label for="account-{{ $account->id }}">{{ $account->name }}</label>
@endforeach
        </td>
        </span>
    </tr>
    <tr>
        <td>
            <a href='javascript:window.history.back(-1);'>取消</a>
        </td>
        <td>
            <input type='submit' value='保存'><span class="error"></span>
        </td>
    </tr>

</tbody>
</table>
    </form>
    <script src="/js/zepto.min.js"></script>
    <script src="/js/mvc_admin.lib.js"></script>
</body>
<script>
</script>
</html>
