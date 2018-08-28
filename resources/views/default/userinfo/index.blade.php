<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>天津市津房置业有限公司宝坻项目群管理平台 -- 人员定位</title>
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/common.css') }}">
</head>
<body>
	<div id="page" class="main-cate-bg">
		@include('default/common/header')
		<div class="main-grid-table">
			<div class="monitor-con">
				<div class="monitor-inner-con">
					<div class="monitor-border">
						<iframe src="http://120.27.31.232:6036/hg/getMonitor.do?username=data&password=123456" width="1579" height="100%"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
