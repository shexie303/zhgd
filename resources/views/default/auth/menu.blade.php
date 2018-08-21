<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>天津市津房置业有限公司宝坻项目群管理平台 -- 菜单</title>
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/common.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/menu.css') }}">
</head>
<body>
	<div id="page" class="main-menu-bg">
		<div class="main-header--box">
			<div class="main-header">
				<a href="javascript:void(0);" class="sn-home-link"></a>
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
		<div class="module-body">
			@foreach($menu as $key => $val)
			<div class="module-item J_Menu" data-url="/{{$key}}" data-allow="{{$val[1]}}">
				<div class="module-title">{{$val[0]}}</div>
				<div class="module-item-con">
					<div class="module-item-border">
					</div>
				</div>
			</div>
			@endforeach
		</div>
		{{--@include('default/common/header')--}}
		{{--<p><a href="/auth/logout">退出</a></p>--}}
		{{--@foreach($menu as $key => $val)--}}
			{{--<p><a class="menu" href="javascript:///" data-url="/{{$key}}" data-allow="{{$val[1]}}">{{$val[0]}}</a></p>--}}
		{{--@endforeach--}}
		<script src="{{ URL::asset('src/static/js/jquery.js') }}"></script>
		<script type="text/javascript">
			$(function () {
				$('.J_Menu').click(function () {
					var allow = $(this).data('allow');
					if (allow == 1) {
						window.location.href = $(this).data('url');
					} else {
						alert('no permission');
					}
				});
			});
		</script>
	</div>
</body>
</html>
