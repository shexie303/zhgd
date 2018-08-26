<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>电力控制</title>
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
						<table class="monitor-info-table">
							<thead>
								<tr>
									<th width="300">
										<div class="clip-path">
											<b>类别</b>
											<em>名称</em>
										</div>
									</th>
									<th>电压</th>
									<th>电流</th>
									<th>有功功率</th>
									<th>无功功率</th>
								</tr>
							</thead>
							<tbody>
								<tr class="electric_second">
									<td>工作区设备1</td>
									<td>406V</td>
									<td>0A</td>
									<td>0W</td>
									<td>0W</td>
								</tr>
								<tr class="electric_second">
									<td>工作区设备2</td>
									<td>0V</td>
                                    <td>0A</td>
                                    <td>0W</td>
                                    <td>0W</td>
								</tr>
								<tr class="electric_second">
									<td>工作区设备3</td>
									<td>413.9V</td>
                                    <td>0A</td>
                                    <td>0W</td>
                                    <td>0W</td>
								</tr>
								<tr class="electric_second">
									<td>工作区设备4</td>
									<td>0V</td>
                                    <td>0A</td>
                                    <td>0W</td>
                                    <td>0W</td>
								</tr>
                                <tr class="electric_second">
                                    <td>生活区设备1</td>
                                    <td>0V</td>
                                    <td>0A</td>
                                    <td>0W</td>
                                    <td>0W</td>
                                </tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="{{ URL::asset('src/static/js/jquery.js') }}"></script>
	<script type="text/javascript">
		var unit = ['','V','A','W','W'];
		if ("WebSocket" in window) {
			var ws_electric = new WebSocket('ws://118.190.137.205:8282');
			ws_electric.onopen = function (evt) {
				//初始连接要传的参数
				var msg = {"type": "electric_second"};
				ws_electric.send(JSON.stringify(msg));
			};
			ws_electric.onmessage = function (evt) {
				var res = eval("(" + evt.data + ")");
				// console.log(res);
				$('.electric_second').each(function(index){
					$(this).find('td').each(function(i){
						$(this).html(res.data[index][i]+unit[i]);
					});
				});
			};
			ws_electric.onclose = function (evt) {
			};
		}
	</script>
</body>
</html>
