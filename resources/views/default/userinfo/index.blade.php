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
			<div class="monitor-con-squar">
				<div class="monitor-inner-con">
					<div class="monitor-border">
						<img src="{{ URL::asset('src/static/img/info_monitor.png') }}" alt="">
						{{--<iframe src="http://120.27.31.232:6036/hg/getMonitor.do?username=data&password=123456" width="1280" height="800"></iframe>--}}
						<span class="info-dot dot-1"></span>
						<span class="info-dot dot-2"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="{{ URL::asset('src/static/js/jquery.js') }}"></script>
	<script>
		$(function () {
			setInterval(function () {
				var randomX = Math.ceil(Math.random() * 1280) - 32;
				var randomY = Math.ceil(Math.random() * 800) - 41;
				var random = Math.ceil(Math.random() * 2);
				$('.monitor-border').find('.dot-' + random).css({
					left: randomX,
					top: randomY
				})
			}, 1000 * 60  * 3)
		})
	</script>
</body>
</html>
