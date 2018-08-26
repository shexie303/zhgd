<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>人员信息</title>
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
									<td>吴工</td>
									<td>0001</td>
									<td>后端工程师</td>
									<td>技术部</td>
									<td>男</td>
									<td>河北</td>
									<td>2018-08-27 13:30:00</td>
									<td>-</td>
								</tr>
								<tr>
									<td>陈工</td>
									<td>0002</td>
									<td>后端工程师</td>
									<td>技术部</td>
									<td>男</td>
									<td>河北</td>
									<td>2018-08-27 13:30:00</td>
									<td>-</td>
								</tr>
								<tr>
									<td>路工</td>
									<td>0003</td>
									<td>后端工程师</td>
									<td>技术部</td>
									<td>男</td>
									<td>河北</td>
									<td>2018-08-27 13:30:00</td>
									<td>-</td>
								</tr>
								<tr>
									<td>刘工</td>
									<td>0004</td>
									<td>前端工程师</td>
									<td>技术部</td>
									<td>男</td>
									<td>河北</td>
									<td>2018-08-27 13:30:00</td>
									<td>-</td>
								</tr>
								<tr>
									<td>赵工</td>
									<td>0005</td>
									<td>首席设计师</td>
									<td>技术部</td>
									<td>女</td>
									<td>河北</td>
									<td>2018-08-27 13:30:00</td>
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
