<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"><title>天津市津房置业有限公司宝坻项目群管理平台 -- 首页</title>
    <title>天津市津房置业有限公司宝坻项目群管理平台 -- 登录</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .main___2jCiI {
            width: 368px;
            margin: 0 auto
        }
        .ant-btn {
            line-height: 1.5;
            display: inline-block;
            font-weight: 400;
            text-align: center;
            cursor: pointer;
            background-image: none;
            border: 1px solid #d9d9d9;
            white-space: nowrap;
            padding: 0 15px;
            font-size: 14px;
            border-radius: 4px;
            height: 32px;
            -webkit-user-select: none;
            user-select: none;
            -webkit-transition: all .3s cubic-bezier(.645, .045, .355, 1);
            transition: all .3s cubic-bezier(.645, .045, .355, 1);
            position: relative;
            color: rgba(0, 0, 0, .65);
            background-color: #fff;
        }
        .ant-btn,
        .ant-btn:active,
        .ant-btn:focus {
            outline: 0
        }
        .ant-btn:not([disabled]):hover {
            text-decoration: none
        }
        .ant-btn:not([disabled]):active {
            outline: 0;
            -webkit-transition: none;
            transition: none
        }
        .ant-btn-primary {
            width: 100%;
            margin-top: 24px;
            height: 40px;
            color: #fff;
            background-color: #1890ff;
            border-color: #1890ff
        }
        .ant-btn-primary:focus,
        .ant-btn-primary:hover {
            color: #fff;
            background-color: #40a9ff;
            border-color: #40a9ff
        }
    </style>
</head>
<body>
    <div class="main___2jCiI">
        <form action="/auth/login" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="account">User Name</label>
                <input type="text" class="form-control" id="account" name="account" placeholder="Enter UserName">
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="selectPart">Select</label>
                <select class="form-control" id="selectPart" name="cons">
                    <option value="1">金玉六园</option>
                    <option value="2">金玉七园</option>
                    <option value="3">金玉八园</option>
                </select>
            </div>
            <button type="submit" class="ant-btn submit___22B-v ant-btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $("form").submit(function(){
                var self = $(this);
                if($('input[name=account]').val().length == 0){
                    alert('请输入账号');
                    return false;
                }
                if($('input[name=pass]').val().length == 0){
                    alert('请输入密码');
                    return false;
                }
                $.post(self.attr("action"), self.serialize(), success, "json");
                return false;

                function success(e){
                    if(e.code == 0){
                        window.location.href = '/menu';
                    } else {
                        alert(e.message);
                    }
                }
            });
        });
    </script>
</body>
</html>
