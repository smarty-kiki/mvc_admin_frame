<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>mvc_admin_frame</title>
    <style>
        html,body {
            height: 100%;
            margin: 0;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }
        .box {
            width: 250px;
            height: 70px;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box">
        <form action="/login" method="POST" ajax="true">
        <input type="hidden" name="refer_url" value="{{ $refer_url }}">
        邮箱: <input type="text" name="email" value="{{ $email }}"><br>
        密码: <input type="password" name="password">
        <input type="submit" value=" 登录 "><br>
        <span class="error">{{ $error_message? '错误: '.$error_message: '' }}</span>
        </form>
        </div>
    </div>
    <script src="/js/zepto.min.js"></script>
    <script src="/js/mvc_admin.lib.js"></script>
</body>
</html>
