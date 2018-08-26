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
		@include('default/common/header')
		<div class="module-body">
			@foreach($menu as $key => $val)
			<div class="module-item J_Menu {{$val[1] == 0 ? 'no-permission' : ''}}" title="{{$val[1] == 0 ? '没有相关权限，请联系管理员！' : ''}}" data-url="/{{$key}}" data-allow="{{$val[1]}}">
				<div class="module-title">{{$val[0]}}</div>
				@if($key == 'electric')
					<div class="module-item-con">
						<div class="module-item-border">
							<div class="module-sign icon-electric"></div>
							<div class="module-separator"></div>
							<div class="module-info">对电流、电压、有功功率、无功功率、断流进行监控</div>
						</div>
					</div>
				@elseif($key == 'video')
					<div class="module-item-con">
						<div class="module-item-border">
							<div class="module-sign icon-video"></div>
							<div class="module-separator"></div>
							<div class="module-info">周界报警、人员定位越界报警、出入口图像对比报警；录像回放</div>
						</div>
					</div>
				@elseif($key == 'door')
					<div class="module-item-con">
						<div class="module-item-border">
							<div class="module-sign icon-door"></div>
							<div class="module-separator"></div>
							<div class="module-info">控制出入口人员、录入人员信息、考勤统计</div>
						</div>
					</div>
				@elseif($key == 'env')
					<div class="module-item-con">
						<div class="module-item-border">
							<div class="module-sign icon-env"></div>
							<div class="module-separator"></div>
							<div class="module-info">对实时监测风速、温度、湿度、PM10、  PM2.5等</div>
						</div>
					</div>
				@elseif($key == 'userinfo')
					<div class="module-item-con">
						<div class="module-item-border">
							<div class="module-sign icon-card"></div>
							<div class="module-separator"></div>
							<div class="module-info">对电流自建2D地图、划定越界范围、提供人员越界报警</div>
						</div>
					</div>
				@elseif($key == 'elevator')
					<div class="module-item-con">
						<div class="module-item-border">
							<div class="module-sign icon-tower"></div>
							<div class="module-separator"></div>
							<div class="module-info">对塔吊和升降机进行承重量、风速、倾角、回转角度等监测报警</div>
						</div>
					</div>
				@endif
			</div>
			@endforeach
		</div>
		<script src="{{ URL::asset('src/static/js/jquery.js') }}"></script>
		<script type="text/javascript">
			$(function () {
				$('.J_Menu').click(function () {
					var allow = $(this).data('allow');
					if (allow == 1) {
						window.location.href = $(this).data('url');
					}
				});
			});
		</script>
	</div>
</body>
</html>
