<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>门禁管控</title>
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
									<th>姓名</th>
									<th>工号</th>
									<th>工种</th>
									<th>所属</th>
									<th>性别</th>
									<th>籍贯</th>
									<th>入场时间</th>
									<th>离场时间</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>李程林</td>
									<td>0001</td>
									<td>建设单位</td>
									<td>建设单位</td>
									<td>男</td>
									<td>河北</td>
									<td>2018-08-27 13:30:00</td>
									<td>-</td>
								</tr>
								<tr>
									<td>刘立明</td>
									<td>0002</td>
									<td>施工单位</td>
									<td>施工单位</td>
									<td>男</td>
									<td>河北</td>
									<td>2018-08-27 13:30:00</td>
									<td>-</td>
								</tr>
								<tr>
									<td>鹿志勇</td>
									<td>0003</td>
									<td>施工单位</td>
									<td>施工单位</td>
									<td>男</td>
									<td>河北</td>
									<td>2018-08-27 15:30:48</td>
									<td>-</td>
								</tr>
								<tr>
									<td>杨秋生</td>
									<td>0004</td>
									<td>监理</td>
									<td>监理</td>
									<td>男</td>
									<td>河北</td>
									<td>2018-10-27 09:12:08</td>
									<td>-</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
