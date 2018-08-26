<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>天津市津房置业有限公司宝坻项目群管理平台 -- 视频监控</title>
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/common.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/video.css') }}">
</head>
<body>
	<div id="page" class="main-cate-bg">
		@include('default/common/header')
		<div class="area-monitor-list">
			<a href="javascript:void(0);">周界区域报警：<span class="red">5</span>个</a>
			<a href="javascript:void(0);">加工区域报警：<span class="red">8</span>个</a>
			<a href="javascript:void(0);">生活区域报警：<span class="red">12</span>个</a>
			<a href="javascript:void(0);">出入区域报警：<span class="red">2</span>个</a>
		</div>
		<div class="category-tab-content">
			<ul class="normal-nav">
				<li class="nav-item">
					<div class="line-body"></div>
					<div class="navItem-text">周界区域</div>
				</li>
				<li class="nav-item current">
					<div class="line-body"></div>
					<div class="navItem-text">周界区域</div>
				</li>
				<li class="nav-item">
					<div class="line-body"></div>
					<div class="navItem-text">周界区域</div>
				</li>
				<li class="nav-item police">
					<div class="line-body"></div>
					<div class="navItem-text">周界区域</div>
				</li>
			</ul>
		</div>
		<div class="main-content">
			<div class="video-monitor-con">
				<div class="videoMonitor-inner-con">
					<div class="videoMonitor-border">
						<div class="main-video-list">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="{{ URL::asset('src/static/js/jquery.js') }}"></script>
	<script>
		if ("WebSocket" in window) {
			var ws_video = new WebSocket('ws://118.190.137.205:8282');
			ws_video.onopen = function () {
				var data = {'type': 'video_list'};
				ws_video.send(JSON.stringify(data));
			};
			ws_video.onmessage = function (evt) {
				var res = eval("(" + evt.data + ")");
				// console.log(res);
				if (res.state === 'success') {
					var $video_list = res.data.report_list;
					var $html;
					$('.main-video-list').empty();
					$.each($video_list, function (k, v) {
						$html = '<div class="video-item">'
											+ '<img src="' + v["pic_url"] + '" alt="">'
											+ '<div class="video-item-title">' + v["name"] + '</div>'
							'</div>'
						$('.main-video-list').append($html);
					});
				}
			}
			ws_video.onclose = function () {
			}
		}
	</script>
</body>
</html>