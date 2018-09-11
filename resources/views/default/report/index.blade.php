<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>天津市津房置业有限公司宝坻项目群管理平台 -- 消息中心</title>
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/common.css') }}">
	<style>
		.ant-btn {
			line-height: 1.5;
			display: inline-block;
			font-weight: 400;
			text-align: center;
			-ms-touch-action: manipulation;
			touch-action: manipulation;
			cursor: pointer;
			background-image: none;
			border: 0 none;
			white-space: nowrap;
			padding: 0 32px;
			font-size: 1.5rem;
			border-radius: 6px;
			height: 42px;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			-webkit-transition: all 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
			transition: all 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
			position: relative;
		}
		.ant-btn-handle {
			-webkit-box-shadow: 0 0 1px rgba(41, 223, 233, 0.75), 0 1px 3px rgba(2, 46, 49, .75), 0 0 6px rgba(5, 192, 202, .75) inset;
			box-shadow: 0 0 1px rgba(41, 223, 233, 0.75), 0 1px 3px rgba(2, 46, 49, .75), 0 0 6px rgba(5, 192, 202, .75) inset;
			color: #3ed8e0;
			background: linear-gradient(#166975, #092a34);
			/*color: #3ed8e0;*/
			/*background-color: #1890ff;*/
			/*border-color: #1890ff;*/
			text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.12);
			/*-webkit-box-shadow: 0 2px 0 rgba(0, 0, 0, 0.035);*/
			/*box-shadow: 0 2px 0 rgba(0, 0, 0, 0.035);*/
		}
		.ant-btn-handle:hover{
			background: #166975;
			color: #fff;
		}
		.ant-btn[disabled]{
			cursor: not-allowed;
			color: #76999f;
			background: linear-gradient(#3a4b4d, #182326);
			-webkit-box-shadow: 0 0 1px rgba(127, 171, 171, 0.75), 0 0 6px rgba(84, 116, 118, .75) inset;
			box-shadow: 0 0 1px rgba(127, 171, 171, 0.75), 0 0 6px rgba(84, 116, 118, .75) inset;
		}
	</style>
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
						    @foreach ($list as $value)
							<tr>
								<td>报警信息</td>
								<td>{{$value['event_name']}}</td>
								<td>{{$value['event_msg']}}</td>
								<td>{{$value['created_at']}}</td>
								@if ($value['event_state'] == '1')
								    <td>未处理</td>
								    <td>
								        <button type="button" class="ant-btn ant-btn-handle"><span>处理</span></button>
									    <button type="button" class="ant-btn ant-btn-ignore"><span>忽略</span></button>
								    </td>
								@elseif ($value['event_state'] == '2')
								    <td>处理中</td>
								    <td>
								        <button type="button" class="ant-btn ant-btn-handle"><span>完成</span></button>
									    <button disabled type="button" class="ant-btn ant-btn-ignore"><span>忽略</span></button>
								    </td>
								@elseif ($value['event_state'] == '3')
								    <td>已完成</td>
								    <td>
								        <button disabled type="button" class="ant-btn ant-btn-handle"><span>处理</span></button>
									    <button disabled type="button" class="ant-btn ant-btn-ignore"><span>忽略</span></button>
								    </td>
								@elseif ($value['event_state'] == '4')
								    <td>已忽略</td>
								    <td>
								        <button disabled type="button" class="ant-btn ant-btn-handle"><span>处理</span></button>
									    <button disabled type="button" class="ant-btn ant-btn-ignore"><span>忽略</span></button>
								    </td>
								@else
								    <td>未定义</td>
								    <td>
								        <button type="button" class="ant-btn ant-btn-handle"><span>处理</span></button>
									    <button type="button" class="ant-btn ant-btn-ignore"><span>忽略</span></button>
								    </td>
								@endif
							</tr>
						    @endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<script src="{{ URL::asset('src/static/js/jquery.js') }}"></script>
<script>
	$(function () {
		function getMessageList() {
			$.ajax({
				type: "POST",
				dataType: "json",
				async: false,
				url: 'http://118.190.137.205'
			})
		}
	})
</script>
</body>
</html>
