<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>天津市津房置业有限公司宝坻项目群管理平台 -- 消息中心</title>
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/common.css') }}">
</head>
<body>
	<div id="page" class="main-cate-bg">
		@include('default/common/header')
		<div class="monitor-con">
			<div class="monitor-inner-con">
				<div class="monitor-border">
					<table class="monitor-info-table">
						<thead>
						<tr>
							<th>类别</th>
							<th>名称</th>
							<th>报警内容</th>
							<th>报警时间</th>
							<th>状态</th>
							<th>操作</th>
						</tr>
						</thead>
						<tbody>
							<tr>
								<td>报警信息</td>
								<td>电力监控</td>
								<td>电压超过3000V</td>
								<td>2018-08-27 13:30:00</td>
								<td>未处理</td>
								<td>
									<a href="javascript:void(0);" class="">处理</a>
									<a href="javascript:void(0);" class="">忽略</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
