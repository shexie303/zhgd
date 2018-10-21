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
					<img src="{{ URL::asset('src/static/img/roll_img.png') }}" alt="" class="roll-img">
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
					<h3>危险预警（Danger warning）</h3>
				</div>
				<div class="cell-body">
					<p style="font-size: 1.5rem;line-height: 48px;">倒塌危险区域内有<span class="red">6</span>人</p>
					<p style="font-size: 1.5rem;line-height: 48px;">吊臂危险区域内有<span class="red">2</span>人</p>
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
		<div class="scan-content">
			<div class="circle-bg">
				<span class="blink-dot dot-1"></span>
				<span class="blink-dot dot-2"></span>
				<span class="blink-dot dot-3"></span>
				<span class="blink-dot dot-4"></span>
				<span class="blink-dot dot-5"></span>
				<span class="blink-dot dot-6"></span>
			</div>
			<div class="dync-fan">
				<div class="fan-insed"></div>
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
		{{--<didv id="building__canvas--elevator"></didv>--}}
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

			setInterval(function () {
				var random = Math.ceil(Math.random() * 6)
				$('.blink-dot').removeClass('animated');
				$('.circle-bg').find('.dot-' + random).addClass('animated');
			}, 5000)
		})
	</script>
	{{--<script type="text/javascript" src="{{ URL::asset('src/static/js/three.min.js') }}"></script>--}}
	{{--<script type="text/javascript" src="{{ URL::asset('src/static/js/OrbitControls.js') }}"></script>--}}
	{{--<script type="text/javascript" src="{{ URL::asset('src/static/js/JDLoader.min.js') }}"></script>--}}
	{{--<script type="text/javascript">--}}
		{{--var meshes = [], mixers = [], hemisphereLight, pointLight, camera, scene, renderer, controls;--}}
		{{--var clock = new THREE.Clock;--}}

		{{--init();--}}
		{{--animate();--}}

		{{--function init() {--}}
			{{--container = document.getElementById('building__canvas--elevator');--}}
			{{--document.getElementById('page').appendChild(container);--}}
			{{--scene = new THREE.Scene();--}}

			{{--renderer = new THREE.WebGLRenderer({--}}
				{{--// 在 css 中设置背景色透明显示渐变色--}}
				{{--alpha: true,--}}
				{{--// 开启抗锯齿，但这样会降低性能。--}}
				{{--// 不过，由于我们的项目基于低多边形的，那还好 :)--}}
				{{--// antialias: true--}}
			{{--});--}}
			{{--renderer.setPixelRatio(window.devicePixelRatio);--}}
			{{--//renderer.setSize(window.innerWidth, window.innerHeight);--}}
			{{--renderer.setSize(container.offsetWidth, container.offsetHeight);--}}

			{{--container.appendChild(renderer.domElement);--}}

			{{--window.addEventListener('resize', onWindowResize, false);--}}

			{{--var loader = new THREE.JDLoader();--}}
			{{--loader.load("./src/static/td.JD",--}}
				{{--function (data) {--}}
					{{--//循环得到加载文件的所有模型，并针对每个模型进行处理--}}
					{{--for (var i = 0; i < data.objects.length; ++i) {--}}
						{{--//alert(data.objects[i].type);--}}
						{{--if (data.objects[i].type == "Mesh" || data.objects[i].type == "SkinnedMesh") {--}}
							{{--var mesh = null;--}}
							{{--var matArray = createWfjMaterials(data);--}}
							{{--if (data.objects[i].type == "SkinnedMesh") {--}}
								{{--mesh = new THREE.SkinnedMesh(data.objects[i].geometry, matArray);--}}
							{{--} else {    // Mesh--}}
								{{--mesh = new THREE.Mesh(data.objects[i].geometry, matArray);--}}
							{{--}--}}
							{{--scene.add(mesh);--}}
							{{--edges = new THREE.EdgesHelper(mesh, 0x4ee4f2);//设置边框，可以旋转--}}
							{{--scene.add(edges);--}}
							{{--if (mesh && mesh.geometry.animations) {--}}
								{{--var mixer = new THREE.AnimationMixer(mesh);--}}
								{{--mixers.push(mixer);--}}
								{{--var action = mixer.clipAction(mesh.geometry.animations[0]);--}}
								{{--action.play();--}}
							{{--}--}}
						{{--} else if (data.objects[i].type == "Line") {--}}
							{{--var jd_color = data.objects[i].jd_object.color;--}}
							{{--var color1 = new THREE.Color(jd_color[0] / 255, jd_color[1] / 255, jd_color[2] / 255);--}}
							{{--var material = new THREE.LineBasicMaterial({color: color1}); //{ color: new THREE.Color( 0xff0000 ) }--}}
							{{--var line = new THREE.Line(data.objects[i].geometry, material);--}}
							{{--scene.add(line);--}}

							{{--if (line.geometry.animations) {--}}
								{{--var mixer = new THREE.AnimationMixer(line);--}}
								{{--mixers.push(mixer);--}}
								{{--var action = mixer.clipAction(line.geometry.animations[0]);--}}
								{{--action.play();--}}
							{{--}--}}
						{{--}--}}
					{{--}--}}

					{{--var near = 1, far = 10 * data.boundingSphere.radius;--}}
					{{--camera = new THREE.PerspectiveCamera(11, container.offsetWidth / container.offsetHeight, near, far);--}}
					{{--camera.position.x = data.boundingSphere.center.x + 5 * data.boundingSphere.radius;--}}
					{{--camera.position.y = data.boundingSphere.center.y + 1 * data.boundingSphere.radius;--}}
					{{--camera.position.z = data.boundingSphere.center.z + 5 * data.boundingSphere.radius;--}}
					{{--camera.lookAt(data.boundingSphere.center);--}}
					{{--camera.add(new THREE.DirectionalLight(0xFFFFFF, 1));--}}
					{{--scene.add(camera);--}}

					{{--if (!controls)--}}
						{{--controls = new THREE.OrbitControls(camera, renderer.domElement);--}}
					{{--controls.target.copy(data.boundingSphere.center);--}}
				{{--}--}}
			{{--);--}}
		{{--}--}}

		{{--function createMaterials(data) {--}}
			{{--var matArray = [];--}}
			{{--for (var j = 0; j < data.materials.length; ++j) {--}}
				{{--var mat = new THREE.MeshPhongMaterial({});--}}
				{{--mat.copy(data.materials[j]);--}}
				{{--matArray.push(mat);--}}
			{{--}--}}
			{{--return matArray;--}}
		{{--}--}}

		{{--function createWfjMaterials(data) {--}}
			{{--var matArray = [];--}}
			{{--var mat = new THREE.MeshBasicMaterial({--}}
				{{--color: 0x33ccff,--}}
				{{--wireframe: true, //以网格显示--}}
				{{--opacity: 0.35,--}}
				{{--transparent: true, //透明--}}
			{{--});--}}
			{{--for (var j = 0; j < data.materials.length; ++j) {--}}
				{{--matArray.push(mat);--}}
			{{--}--}}
			{{--return matArray;--}}
		{{--}--}}

		{{--function animate() {--}}
			{{--var delta = clock.getDelta();--}}
			{{--for (var i = 0; i < mixers.length; ++i)--}}
				{{--mixers[i].update(delta);--}}

			{{--if (controls) controls.update();--}}
			{{--if (camera) renderer.render(scene, camera);--}}

			{{--requestAnimationFrame(animate);--}}
		{{--}--}}

		{{--function onWindowResize() {--}}
			{{--if (camera) {--}}
				{{--camera.aspect = container.offsetWidth / container.offsetHeight;--}}
				{{--camera.updateProjectionMatrix();--}}
			{{--}--}}
			{{--//renderer.setSize(window.innerWidth, window.innerHeight);--}}
			{{--renderer.setSize(container.offsetWidth, container.offsetHeight);--}}
		{{--}--}}
	{{--</script>--}}
</body>
</html>
