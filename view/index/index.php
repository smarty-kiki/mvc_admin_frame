<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>mvc_admin_frame</title>
    <style>
        html,body {
            height: 100%;
            margin: 0px;
        }
        a {
            text-decoration: none;
            color: black;
        }
        .left-container {
            width: 8%;
            height: 100%;
            margin: 0px;
            float: left;
            box-shadow: inset 0 0 1px gray;
        }
        .menu-container {
            width: 100%;
            height: 88%;
            margin: 0px;
        }
        .menu-container ul {
            list-style-type: none;
            margin: 0px;
            padding: 20px;
        }
        .menu-container li {
            font-size: 14px;
        }
        .base-container {
            width: 100%;
            height: 12%;
            margin: 0px;
        }
        .base-container ul {
            list-style-type: none;
            margin: 0px;
            padding: 20px;
        }
        .base-container li {
            font-size: 14px;
        }
        .right-container {
            width: 92%;
            height: 100%;
            margin: 0px;
            float: left;
        }
        .right-container iframe {
            width: 100%;
            height: 100%;
            margin: 0px;
        }
    </style>
</head>
<body>
    <div class="left-container">
        <div class="menu-container">
            <ul>
                <li><a target="right" href="/accounts">账户管理</a></li>
                <li><a target="right" href="/roles">角色管理</a></li>
            </ul>
        </div>
        <div class="base-container">
            <ul>
                <li><a target="right" href="/accounts/update/mine_info">修改信息</a></li>
                <li><a target="right" href="/accounts/update/mine_password">修改密码</a></li>
                <li> <form id="logout" action="/logout" method="POST"></form> <a href="###" onclick="logout.submit()">登出 "{{ $account->name }}"</a> </li>
            </ul>
        </div>
    </div>
    <div class="right-container">
        <iframe src="/" name="right" frameborder="0"></iframe>
    </div>
</body>
</html>
