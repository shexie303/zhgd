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
					<p id="elevator_height">{{$data->height}}</p>
				</div>
			</div>
			<div class="list-item">
				<div class="cell-header">
					<h3>幅度m（Range）</h3>
				</div>
				<div class="cell-body">
					<p id="elevator_range">{{$data->range}}</p>
				</div>
			</div>
			<div class="list-item">
				<div class="cell-header">
					<h3>力矩%（Moment）</h3>
				</div>
				<div class="cell-body">
					<p id="elevator_moment">{{$data->moment}}</p>
				</div>
			</div>
			<div class="list-item">
				<div class="cell-header">
					<h3>承重量t（Weight）</h3>
				</div>
				<div class="cell-body">
					<p id="elevator_weight">{{$data->weight}}</p>
				</div>
			</div>
			<div class="list-item">
				<div class="cell-header">
					<h3>风速m/s（Wind）</h3>
				</div>
				<div class="cell-body">
					<p id="elevator_wind_speed">{{$data->wind_speed}}</p>
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
					<p class="roll-text" id="elevator_angle">{{$data->angle}}</p>
				</div>
			</div>
			<div class="list-item">
				<div class="cell-header">
					<h3>倾角 °（Dip）</h3>
				</div>
				<div class="cell-body">
					<p id="elevator_dip_angle">{{$data->dip_angle}}</p>
				</div>
			</div>
			<div class="list-item">
				<div class="cell-header">
					<h3>是否在线（Online or not ）</h3>
				</div>
				<div class="cell-body">
					<p id="elevator_online" @if($data->online == 2) class="red" @endif>{{$data->online == 1 ? '在线' : '离线'}}</p>
				</div>
			</div>
		</div>
		<div class="slide-content">
			<div class="slide-controls left-controls"></div>
			<div class="slide-controls right-controls"></div>
			<div class="slide-panel">
				@foreach($devices as $val)
					<div class="slide-item @if($val->current == 1) current @endif">
						<div class="dt-line"></div>
						<div class="slideItem-text" data-url="{{$val->url}}">{{$val->name}}</div>
					</div>
				@endforeach
			</div>
		</div>
		<didv id="building__canvas--elevator"></didv>
	</div>
	<script src="{{ URL::asset('src/static/js/jquery.js') }}"></script>
	<script src="{{ URL::asset('src/static/js/bootstrap.js') }}"></script>
	<script>
		$(function () {
			$('.slideItem-text').click(function () {
				window.location.href = $(this).data('url');
			});
			var ws_tower = new WebSocket(ws_domain);
			ws_tower.onopen = function (evt) {
				//初始连接要传的参数
				var msg = {"type": "elevator_second", "number": "{{$ws['number']}}", "device_type": "{{$ws['type']}}"};
				ws_tower.send(JSON.stringify(msg));
			};
			ws_tower.onmessage = function (evt) {
				var res = eval("(" + evt.data + ")");
				if (res.state == 'success') {
					var obj = $('.cell-body').find('p');
					obj.each(function () {
						var field = this.id.substr(9);
						if (field == 'online') {
							if (res.data.online == 1) {
								$(this).html('在线').removeClass('red');
							} else {
								$(this).html('离线').addClass('red');
							}
						} else {
							var field_w = field + '_warning';
							$(this).html(res.data[field]);
							if (res.data[field_w] == 1) {
								$(this).addClass('red');
							} else {
								$(this).removeClass('red');
							}
						}
					});
				}
			};
			ws_tower.onclose = function (evt) {
			};
		})
	</script>
</body>
</html>
