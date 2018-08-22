<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>天津市津房置业有限公司宝坻项目群管理平台 -- 首页</title>
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/common.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/index.css') }}">
</head>
<body>
<div id="page">
	<div class="main-header--box">
		<div class="main-header">
			<div class="sn-home-link"></div>
			<div class="logo">宝坻欣鼎智慧工地物联网综合管理平台（金玉六园）</div>
			<ul class="sn-quick-menu">
				<li class="sn-bell"></li>
				<li class="sn-profile">
					<div class="sn-menu">
						<div class="menu-hd"></div>
						<div class="menu-bd">
							<div class="menu-bd-panel">
								<a href="javascript:void(0);">syh156254</a>
								<a href="/auth/logout">退出</a>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>

	<div class="electric-monitor--box">
		<a href="/electric">
			<div class="monitor--title">电力监控</div>
			<div class="electric-monitor--content">
				<div class="vertical-line vertical-line-large"></div>
				<div class="current-monitor">
					<div class="electric-monitor--subTitle">电流</div>
					<div class="analysis-main">
						<div class="progress-outer">
							<div class="progress-inner">
								<div class="progress-bg"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="voltage-monitor">
					<div class="electric-monitor--subTitle">电压</div>
					<div class="analysis-main">
						<div class="progress-outer">
							<div class="progress-inner">
								<div class="progress-bg progress-bg2"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="active-monitor">
					<div class="electric-monitor--subTitle">有功功率</div>
					<div class="analysis-main">
						<div class="progress-outer">
							<div class="progress-inner">
								<div class="progress-bg progress-bg3"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="reactive-monitor">
					<div class="electric-monitor--subTitle">无功功率</div>
					<div class="analysis-main">
						<div class="progress-outer">
							<div class="progress-inner">
								<div class="progress-bg progress-bg4"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="second-col">
					<div class="short-monitor">
						<div class="electric-monitor--subTitle">断流</div>
						<div class="switch-main">
							<span class="switch-on active">ON</span>
							<span class="switch-off">OFF</span>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<div class="message-box">
		<div class="message-list">
		</div>
	</div>
	<div class="right-fix">
		<div class="towerElevator-monitor">
			<div class="monitor--title larger">塔吊&升降机</div>
			<div class="towerElevator-monitor--content">
				<div class="vertical-line vertical-line-middle" style="height: 265px;"></div>
				<div class="tower-monitor">
					<a href="/tower_crane">
						<div class="img-model">
							<span class="arrow-sign">塔吊</span>
							<img src="./src/static/img/tower.png" alt="">
						</div>
						<div class="equipment-info">
							<div class="equipment-amount">设备总数：8</div>
							<div class="equipment-status-list">
								<div class="status-item status-green">5</div>
								<div class="status-item status-red">0</div>
								<div class="status-item status-yellow">3</div>
							</div>
						</div>
					</a>
				</div>
				<div class="elevator-monitor">
					<a href="/elevator">
						<div class="img-model">
							<span class="arrow-sign">升降机</span>
							<img src="./src/static/img/elevator.png" alt="">
						</div>
						<div class="equipment-info">
							<div class="equipment-amount">设备总数：8</div>
							<div class="equipment-status-list">
								<div class="status-item status-green">5</div>
								<div class="status-item status-red">0</div>
								<div class="status-item status-yellow">3</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="personnel-monitor">
			<a href="/userinfo">
				<div class="monitor--title">人员信息</div>
				<div class="personnel-monitor--content">
					<div class="vertical-line vertical-line-middle"></div>
					<div class="curr-police">
						<h3><span class="red" id="user_info_sum">12</span></h3>
						<span>当前报警</span>
					</div>
					<div class="police-details">
						<p>越界报警：<span class="red" id="user_info_yuejie">5</span>人</p>
						<p>掉线提示：<span class="red" id="user_info_diaoxian">4</span>人</p>
						<p>低电提示：<span class="red" id="user_info_didian">1</span>人</p>
						<p>长时间静止：<span class="red" id="user_info_stop">2</span>人</p>
					</div>
					<div class="personnel-item staff">
						<div class="t">上岗人员</div>
						<div class="list">
							<p class="">1.F002 张三</p>
							<p class="">1.F002 张家三</p>
							<p class="">1.F002 张方三</p>
						</div>
					</div>
					<div class="personnel-item temporary">
						<div class="t">临时人员</div>
						<div class="list">
							<p class="">1.F002 张三</p>
							<p class="">1.F002 李后</p>
							<p class="">1.F002 武汉关</p>
						</div>
					</div>
				</div>
			</a>
		</div>
	</div>
	<div class="bottom-fix">
		<div class="video-monitor">
			<a href="/video">
				<div class="monitor--title">视频监控</div>
				<div class="video-monitor--content">
					<div class="vertical-line vertical-line-small"></div>
					<div class="monitor-item">
						<div class="monitor-item-control">
							<span>周界区域</span>
						</div>
						<div class="monitor-item-main">
							<span class="equip-no">01</span>
						</div>
					</div>
					<div class="monitor-item">
						<div class="monitor-item-control">
							<span>加工区域</span>
						</div>
						<div class="monitor-item-main">
							<span class="equip-no">01</span>
						</div>
					</div>
					<div class="monitor-item">
						<div class="monitor-item-control">
							<span>生活区域</span>
						</div>
						<div class="monitor-item-main">
							<span class="equip-no">01</span>
						</div>
					</div>
					<div class="monitor-item">
						<div class="monitor-item-control">
							<span>出入区域</span>
						</div>
						<div class="monitor-item-main">
							<span class="equip-no">01</span>
						</div>
					</div>
				</div>
			</a>
		</div>
		<div class="door-monitor">
			<a href="/door">
				<div class="monitor--title">门禁管控</div>
				<div class="door-monitor--content">
					<div class="vertical-line vertical-line-small"></div>
					<div class="door-info-panel"></div>
					<div class="door-item manager">
						<div class="t">管理人员</div>
						<div class="num">2875人</div>
					</div>
					<div class="door-item supervisor">
						<div class="t">监理人员</div>
						<div class="num">2875人</div>
					</div>
					<div class="door-item incoming">
						<div class="t">进场人数</div>
						<div class="num">2875人</div>
					</div>
					<div class="door-item constructors">
						<div class="t">施工人员</div>
						<div class="num">2875人</div>
					</div>
				</div>
			</a>
		</div>
		<div class="env-monitor">
			<a href="/env">
				<div class="monitor--title">环境监控</div>
				<div class="env-monitor--content">
					<div class="vertical-line vertical-line-small"></div>
					<div class="env-item">
						<div class="env-info env-info-lg">
							<span class="num">126</span>
							<span class="unit">μg/m³</span>
						</div>
						<div class="env-type">
							<span class="">PM10</span>
						</div>
					</div>
					<div class="env-item">
						<div class="env-info">
							<span class="num">50</span>
							<span class="unit">级</span>
						</div>
						<div class="env-type">
							<span class="">风力</span>
						</div>
					</div>
					<div class="env-item">
						<div class="env-info">
							<span class="num">30</span>
							<span class="unit">℃</span>
						</div>
						<div class="env-type">
							<span class="">温度</span>
						</div>
					</div>
					<div class="env-item">
						<div class="env-info">
							<span class="num">60</span>
							<span class="unit">%</span>
						</div>
						<div class="env-type">
							<span class="">湿度</span>
						</div>
					</div>
				</div>
			</a>
		</div>
	</div>
	<div id="building__canvas--box"></div>
</div>
<script type="text/javascript" src="{{ URL::asset('src/static/js/jquery.js') }}"></script>
<script type="text/javascript">
	if ("WebSocket" in window) {
		var ws_video = new WebSocket('ws://118.190.137.205:8282');
		ws_video.onopen = function (evt) {
			//初始连接要传的参数
			var msg = {"type": "video"};
			ws_video.send(JSON.stringify(msg));
		};
		ws_video.onmessage = function (evt) {
			var res = eval("(" + evt.data + ")");
			if (res.data.report == 1) {
				var messageInfo = '<p>' + res.data.report_msg + '</p>';
				var messageItem = '<div class="message-item">' + messageInfo + '</div>';
				$('.monitor-item:eq(2)').addClass('monitor-item-bell');
				$('.message-box .message-list').append(messageItem);
				$('.message-box').show();
			} else {
				$('.monitor-item:eq(2)').removeClass('monitor-item-bell');
			}
		};
		ws_video.onclose = function (evt) {
		};

		var ws_electric = new WebSocket('ws://118.190.137.205:8282');
		ws_electric.onopen = function (evt) {
			//初始连接要传的参数
			var msg = {"type": "electric"};
			ws_electric.send(JSON.stringify(msg));
		};
		ws_electric.onmessage = function (evt) {
			var res = eval("(" + evt.data + ")");
			$('.current-monitor').find('.progress-bg').css('width', res.data[0]);
			$('.voltage-monitor').find('.progress-bg').css('width', res.data[1]);
			$('.active-monitor').find('.progress-bg').css('width', res.data[2]);
			$('.reactive-monitor').find('.progress-bg').css('width', res.data[3]);
		};
		ws_electric.onclose = function (evt) {
		};

		var ws_user_info = new WebSocket('ws://118.190.137.205:8282');
		ws_user_info.onopen = function (evt) {
			//初始连接要传的参数
			var msg = {"type": "user_info"};
			ws_user_info.send(JSON.stringify(msg));
		};
		ws_user_info.onmessage = function (evt) {
			var res = eval("(" + evt.data + ")");
			$('#user_info_diaoxian').html(res.data.diaoxian);
			$('#user_info_didian').html(res.data.didian);
			$('#user_info_stop').html(res.data.stop);
			$('#user_info_sum').html(res.data.sum);
			$('#user_info_yuejie').html(res.data.yuejie);
		};
		ws_user_info.onclose = function (evt) {
		};

		var ws_env = new WebSocket('ws://118.190.137.205:8282');
		ws_env.onopen = function (evt) {
			//初始连接要传的参数
			var msg = {"type": "env"};
			ws_env.send(JSON.stringify(msg));
		};
		ws_env.onmessage = function (evt) {
			var res = eval("(" + evt.data + ")");
			$('.env-item').each(function (index) {
				$(this).find('.num').html(res.data[index]);
			})
		};
		ws_env.onclose = function (evt) {
		};
	}
</script>
<script type="text/javascript" src="{{ URL::asset('src/static/js/three.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('src/static/js/OrbitControls.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('src/static/js/JDLoader.min.js') }}"></script>
<script type="text/javascript">
	var meshes = [], mixers = [], hemisphereLight, pointLight, camera, scene, renderer, controls;
	var clock = new THREE.Clock;

	// init();
	// animate();

	function init() {
		container = document.getElementById('building__canvas--box');
		document.getElementById('page').appendChild(container);
		scene = new THREE.Scene();

		renderer = new THREE.WebGLRenderer({
			// 在 css 中设置背景色透明显示渐变色
			alpha: true,
			// 开启抗锯齿，但这样会降低性能。
			// 不过，由于我们的项目基于低多边形的，那还好 :)
			// antialias: true
		});
		renderer.setPixelRatio(window.devicePixelRatio);
		renderer.setSize(window.innerWidth, window.innerHeight);

		container.appendChild(renderer.domElement);

		window.addEventListener('resize', onWindowResize, false);

		var loader = new THREE.JDLoader();
		loader.load("./src/static/jd06.30.JD",
			function (data) {
				//循环得到加载文件的所有模型，并针对每个模型进行处理
				for (var i = 0; i < data.objects.length; ++i) {
					//alert(data.objects[i].type);
					if (data.objects[i].type == "Mesh" || data.objects[i].type == "SkinnedMesh") {
						var mesh = null;
						var matArray = createWfjMaterials(data);
						if (data.objects[i].type == "SkinnedMesh") {
							mesh = new THREE.SkinnedMesh(data.objects[i].geometry, matArray);
						} else {    // Mesh
							mesh = new THREE.Mesh(data.objects[i].geometry, matArray);
						}
						scene.add(mesh);
						edges = new THREE.EdgesHelper(mesh, 0x4ee4f2);//设置边框，可以旋转
						scene.add(edges);
						if (mesh && mesh.geometry.animations) {
							var mixer = new THREE.AnimationMixer(mesh);
							mixers.push(mixer);
							var action = mixer.clipAction(mesh.geometry.animations[0]);
							action.play();
						}
					} else if (data.objects[i].type == "Line") {
						var jd_color = data.objects[i].jd_object.color;
						var color1 = new THREE.Color(jd_color[0] / 255, jd_color[1] / 255, jd_color[2] / 255);
						var material = new THREE.LineBasicMaterial({color: color1}); //{ color: new THREE.Color( 0xff0000 ) }
						var line = new THREE.Line(data.objects[i].geometry, material);
						scene.add(line);

						if (line.geometry.animations) {
							var mixer = new THREE.AnimationMixer(line);
							mixers.push(mixer);
							var action = mixer.clipAction(line.geometry.animations[0]);
							action.play();
						}
					}
				}

				var near = 1, far = 10 * data.boundingSphere.radius;
				camera = new THREE.PerspectiveCamera(15, window.innerWidth / window.innerHeight, near, far);
				camera.position.x = data.boundingSphere.center.x + 5 * data.boundingSphere.radius;
				camera.position.y = data.boundingSphere.center.y + 1 * data.boundingSphere.radius;
				camera.position.z = data.boundingSphere.center.z + 5 * data.boundingSphere.radius;
				camera.lookAt(data.boundingSphere.center);
				camera.add(new THREE.DirectionalLight(0xFFFFFF, 1));
				scene.add(camera);

				if (!controls)
					controls = new THREE.OrbitControls(camera, renderer.domElement);
				controls.target.copy(data.boundingSphere.center);
			}
		);
	}

	function createMaterials(data) {
		var matArray = [];
		for (var j = 0; j < data.materials.length; ++j) {
			var mat = new THREE.MeshPhongMaterial({});
			mat.copy(data.materials[j]);
			matArray.push(mat);
		}
		return matArray;
	}

	function createWfjMaterials(data) {
		var matArray = [];
		var mat = new THREE.MeshBasicMaterial({
			color: 0x33ccff,
			wireframe: true, //以网格显示
			opacity: 0.35,
			transparent: true, //透明
		});
		for (var j = 0; j < data.materials.length; ++j) {
			matArray.push(mat);
		}
		return matArray;
	}

	function animate() {
		var delta = clock.getDelta();
		for (var i = 0; i < mixers.length; ++i)
			mixers[i].update(delta);

		if (controls) controls.update();
		if (camera) renderer.render(scene, camera);

		requestAnimationFrame(animate);
	}

	function onWindowResize() {
		if (camera) {
			camera.aspect = window.innerWidth / window.innerHeight;
			camera.updateProjectionMatrix();
		}
		renderer.setSize(window.innerWidth, window.innerHeight);
	}
</script>
{{--@include('default/common/header')--}}
{{--<p><a href="/auth/logout">退出</a></p>--}}
{{--<p><a href="/electric">电力监控二级页面</a></p>--}}
{{--<p><a href="/tower_crane">塔吊二级页面</a></p>--}}
{{--<p><a href="/elevator">升降机二级页面</a></p>--}}
{{--<p><a href="/userinfo">人员信息二级页面</a></p>--}}
{{--<p><a href="/video">视频监控二级页面</a></p>--}}
{{--<p><a href="/door">门禁管控二级页面</a></p>--}}
{{--<p><a href="/env">环境监测二级页面</a></p>--}}
</body>
</html>
