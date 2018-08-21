<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"><title>天津市津房置业有限公司宝坻项目群管理平台 -- 首页</title>
    <title>天津市津房置业有限公司宝坻项目群管理平台 -- 菜单</title>
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
    @include('default/common/header')
    <p><a href="/auth/logout">退出</a></p>
    @foreach($menu as $key => $val)
        <p><a class="menu" href="javascript:///" data-url="/{{$key}}" data-allow="{{$val[1]}}">{{$val[0]}}</a></p>
    @endforeach
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $('.menu').click(function(){
                var allow = $(this).data('allow');
                if(allow == 1){
                    window.location.href = $(this).data('url');
                }else{
                    alert('no permission');
                }
            });
        });
    </script>
</body>
</html>
