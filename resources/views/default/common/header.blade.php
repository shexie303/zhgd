<script type="text/javascript">
    var ws_domain = 'ws://60.28.24.227:8282';
</script>
<div class="main-header--box">
	<div class="main-header">
		<a href="/" class="sn-home-link" title="首页">首页</a>
		<div class="logo">智慧工地物联网安全管理平台</div>
		<ul class="sn-quick-menu">
			<li class="menu-item sn-bell">
				<a href="/report" title="消息中心">5</a>
			</li>
			<li class="menu-item sn-profile">
				<div class="sn-menu">
					<a href="javascript:void(0);" title="个人中心" class="menu-hd">个人中心</a>
					<div class="menu-bd">
						<div class="menu-bd-panel">
							<a href="javascript:void(0);">{{$site_user->username}}</a>
							<a href="/auth/logout">退出</a>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</div>
<script>
	report_sum
	var ws_sum = new WebSocket(ws_domain);
	ws_sum.onopen = function (evt) {
		//初始连接要传的参数
		var msg = {type: 'report_sum'};
		ws_video.send(JSON.stringify(msg));
	};
	ws_sum.onmessage = function (evt) {
		var res = eval("(" + evt.data + ")");
		$('.sn-bell a').text(res.data.report_sum ? res.data.report_sum : 0)
	};
	ws_sum.onclose = function (evt) {
	};
</script>
