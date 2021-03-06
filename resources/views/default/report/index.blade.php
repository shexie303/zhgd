<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>智慧工地物联网安全管理平台 -- 消息中心</title>
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/common.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/report.css') }}">
</head>
<body>
<div id="page" class="main-cate-bg">
	@include('default/common/header')
	<div class="monitor-con">
		<div class="monitor-inner-con">
			<div id="report-list" class="monitor-border">
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
							<td id="id-{{$value['id']}}">报警信息</td>
							<td>{{$value['event_name']}}</td>
							<td>{{$value['event_msg']}}</td>
							<td>{{$value['created_at']}}</td>
							@if ($value['event_state'] == '1')
								<td>未处理</td>
								<td>
									<button type="button" class="ant-btn ant-btn-handle" data-toggle="modal" data-target="#sendMessageModal" data-whatever="{{$value['id']}}"><span>处理</span></button>
									<button type="button" class="ant-btn ant-btn-ignore"><span>忽略</span></button>
								</td>
							@elseif ($value['event_state'] == '2')
								<td>处理中</td>
								<td>
									<button type="button" class="ant-btn ant-btn-handle" data-toggle="modal" data-target="#sendMessageModal" data-whatever="{{$value['id']}}"><span>完成</span></button>
									<button disabled type="button" class="ant-btn ant-btn-ignore"><span>忽略</span></button>
								</td>
							@elseif ($value['event_state'] == '3')
								<td>已完成</td>
								<td>
									<button disabled type="button" class="ant-btn ant-btn-handle"><span>完成</span></button>
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
									<button type="button" class="ant-btn ant-btn-handle" data-toggle="modal" data-target="#sendMessageModal" data-whatever="{{$value['id']}}"><span>处理</span></button>
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
<div id="sendMessageModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="sendMessageModalLabel"
     aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h4 class="modal-title" id="myModalLabel">请选择发送短信组（可多选）</h4>
				<input type="hidden" id="reportId">
				<div class="user-group">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="J_SendMessage" class="ant-btn ant-btn-primary">
					发送短信
				</button>
			</div>
		</div>
	</div>
</div>
<script src="{{ URL::asset('src/static/js/jquery.js') }}"></script>
<script src="{{ URL::asset('src/static/js/bootstrap.js') }}"></script>
<script>
	$(function () {
		$('#sendMessageModal').on('show.bs.modal', function (e) {
			var button = $(e.relatedTarget);
			var recipient = button.data('whatever');
			var modal = $(this);

			modal.find('.modal-body input#reportId').val(recipient);
			$.ajax({
				type: 'GET',
				url: 'http://60.28.24.227/api/get_report_groups',
				dataType: 'json',
				data: {
					event_id: recipient
				},
				success: function (data) {
					$('.user-group div.custom-control').remove();
					$('.modal-footer button').prop('disabled', false);
					if(data.state == 'success') {
    					$.each(data.data, function (k, v) {
    						$('.user-group').append('<div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="customCheck' + k + '">' +
    							'<label class="custom-control-label" for="customCheck' + k + '">' + v + '</label></div>');
    					})
					} else {
						$('.modal-footer button').prop('disabled', true);
						$('.user-group').append('<div class="custom-control custom-checkbox">' + '<label class="custom-control-label" for="customCheck0">' + data.message + '</label></div>');
					}
				},
				error: function (data) {
					$('.user-group').empty();
					$('.user-group').append('<p>暂无可以发送的用户组</p>');
					$('.modal-footer button').prop('disabled', true);
				}
			})
		});

		$('#J_SendMessage').on('click', function (e) {
			var $reportId = $('#reportId').val();
			var roleArr = [];
			var $roleGroupsValue = $('.custom-control-input:checked');
			$.each($roleGroupsValue, function (k, v) {
				roleArr.push(v.id);
			});
			$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
			$.ajax({
				type: 'POST',
				url: '',
				data: {
					reportId: $reportId,
					roleArr: roleArr
				},
				success: function (data) {
					if (data.state == 'success') {
						window.location.href = '/report';
					} else {
						alert(data.message);
					}
					console.log('发送成功');
				}
			})
		});

		//锚点定位
		var anchors = "#id-"+{{$anchors}};
		$("#report-list").animate({scrollTop: $(anchors).offset().top - 260}, 1000);
	})
</script>
</body>
</html>
