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
	<div id="page">
		<div class="main-header--box">
			<div class="main-header">
				<div class="sn-home-link"></div>
				<div class="logo">宝坻欣鼎智慧工地物联网综合管理平台（金玉六园）</div>
				<ul class="sn-quick-menu">
					<li class="sn-bell"></li>
					<li class="sn-profile">
						<div class="sn-menu">
							<div class="menu-hd"></div>
							<div class="menu-bd">
								<div class="menu-bd-panel">
									<a href="javascript:void(0);">syh156254</a>
									<a href="/auth/logout">退出</a>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="area-monitor-list">
			<a href="javascript:void(0);">周界区域报警：<span class="red">5</span>个</a>
			<a href="javascript:void(0);">加工区域报警：<span class="red">8</span>个</a>
			<a href="javascript:void(0);">生活区域报警：<span class="red">12</span>个</a>
			<a href="javascript:void(0);">出入区域报警：<span class="red">2</span>个</a>
		</div>
	</div>
	@include('default/common/header')
	<p><a href="/auth/logout">退出</a></p>
</body>
</html>
