<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>智慧工地物联网安全管理平台 -- 登录</title>
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/common.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/login.css') }}">
</head>
<body>
	<div id="page" class="main-cate-bg">
		<div class="main-header--box">
			<div class="main-header">
				<div class="sn-home-link"></div>
				<div class="logo">智慧工地物联网安全管理平台</div>
			</div>
		</div>
		<div class="main___2jCiI">
			<div class="main___2jCiI-con">
				<div class="main___2jCiI-border">
					<form action="/auth/login" method="post">
						{{csrf_field()}}
						<div class="form-group">
							<label for="account" class="icon-profile">User Name</label>
							<input type="text" class="form-control" id="account" name="account" placeholder="请输入用户名">
						</div>
						<div class="form-group">
							<label for="pass" class="icon-lock">Password</label>
							<input type="password" class="form-control" id="pass" name="pass" placeholder="请输入密码">
						</div>
						<div class="form-group">
							<label for="selectPart">项目</label>
							<select class="form-control" id="selectPart" name="cons">
								<option value="1">金玉六园</option>
								<option value="2">金玉七园</option>
								<option value="3">金玉八园</option>
							</select>
						</div>
						<button type="submit" class="ant-btn submit___22B-v ant-btn-primary">登录</button>
					</form>
				</div>
			</div>
		</div>
	</div>
<script src="{{ URL::asset('src/static/js/jquery.js') }}"></script>
<script type="text/javascript">
	$(function () {
		$("form").submit(function () {
			var self = $(this);
			if ($('input[name=account]').val().length == 0) {
				alert('请输入账号');
				return false;
			}
			if ($('input[name=pass]').val().length == 0) {
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
