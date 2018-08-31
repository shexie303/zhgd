<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>天津市津房置业有限公司宝坻项目群管理平台 -- 塔吊</title>
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/common.css') }}">
</head>
<body>
	<div id="page" class="main-simple-bg">
		@include('default/common/header')
		<div class="aside-content left-side">
			<div class="list-item">
				<div class="cell-header">
					<h3>高度m（Height）</h3>
				</div>
				<div class="cell-body">
					<p class="red">36</p>
				</div>
			</div>
			<div class="list-item">
				<div class="cell-header">
					<h3>幅度m（Range）</h3>
				</div>
				<div class="cell-body">
					<p>28</p>
				</div>
			</div>
			<div class="list-item">
				<div class="cell-header">
					<h3>力矩%（Moment）</h3>
				</div>
				<div class="cell-body">
					<p>0.0</p>
				</div>
			</div>
			<div class="list-item">
				<div class="cell-header">
					<h3>承重量t（Weight）</h3>
				</div>
				<div class="cell-body">
					<p>0.0</p>
				</div>
			</div>
			<div class="list-item">
				<div class="cell-header">
					<h3>风速m/s（Wind）</h3>
				</div>
				<div class="cell-body">
					<p>0.3</p>
				</div>
			</div>
		</div>
		<div class="message-box tower-message">
			<div class="message-list">
				<div class="message-item bell">
					<div class="decorate-line"></div>
					<span class="tria-tl"></span>
					<span class="tria-tr"></span>
					<span class="tria-br"></span>
					<span class="tria-bl"></span>
				</div>
			</div>
		</div>
		<div class="aside-content right-side">
			<div class="list-item">
				<div class="cell-header">
					<h3>回转角度 °（Rotation）</h3>
				</div>
				<div class="cell-body">
					<img src="{{ URL::asset('src/static/img/rotation.png') }}" alt="" class="roll-img">
					<p class="roll-text">347.4</p>
				</div>
			</div>
			<div class="list-item">
				<div class="cell-header">
					<h3>倾角 °（Dip）</h3>
				</div>
				<div class="cell-body">
					<p>77.6</p>
				</div>
			</div>
			<div class="list-item">
				<div class="cell-header">
					<h3>是否在线（Online or not ）</h3>
				</div>
				<div class="cell-body">
					<p>在线</p>
				</div>
			</div>
		</div>
		<div class="slide-content">
			<div class="slide-controls left-controls"></div>
			<div class="slide-controls right-controls"></div>
			<div class="slide-panel">
				<div class="slide-item">
					<div class="dt-line"></div>
					<div class="slideItem-text">1号塔</div>
				</div>
				<div class="slide-item current">
					<div class="dt-line"></div>
					<div class="slideItem-text">2号塔</div>
				</div>
				<div class="slide-item">
					<div class="dt-line"></div>
					<div class="slideItem-text">3号塔</div>
				</div>
				<div class="slide-item">
					<div class="dt-line"></div>
					<div class="slideItem-text">4号塔</div>
				</div>
				<div class="slide-item red">
					<div class="dt-line"></div>
					<div class="slideItem-text">5号塔</div>
				</div>
				<div class="slide-item">
					<div class="dt-line"></div>
					<div class="slideItem-text">6号塔</div>
				</div>
				<div class="slide-item">
					<div class="dt-line"></div>
					<div class="slideItem-text">7号塔</div>
				</div>
				<div class="slide-item">
				<div class="dt-line"></div>
				<div class="slideItem-text">8号塔</div>
			</div>
			</div>
			<div class="slide-panel" style="display: none">
				<div class="slide-item">
					<div class="dt-line"></div>
					<div class="slideItem-text">9号塔</div>
				</div>
				<div class="slide-item">
					<div class="dt-line"></div>
					<div class="slideItem-text">10号塔</div>
				</div>
			</div>
		</div>
	</div>
	<script src="{{ URL::asset('src/static/js/jquery.js') }}"></script>
	<script src="{{ URL::asset('src/static/js/bootstrap.js') }}"></script>
	<script>
		$(function () {
		})
	</script>
</body>
</html>
