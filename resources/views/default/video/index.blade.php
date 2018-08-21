<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<style>
		.area-monitor-list{
			background: url("./src/static/img/list_bg.png") no-repeat;
			width: 1528px;
			height: 94px;
			margin: 40px 0 0 220px;
			padding: 28px 0 0 30px;
		}
		.area-monitor-list a{
			padding: 0 50px;
			font-size: 1.625rem;
			color: #66cccc;
			border-right: 1px solid #214955;
			line-height: 36px;
			height: 36px;
			float: left;
		}
		.area-monitor-list a:last-child{
			border-right: 0 none;
		}
		.category-tab-content{
			margin-left: 125px;
			margin-top: 90px;
			width: 345px;
			float: left;
		}
		.normal-nav{
		}
		.nav-item{
			position: relative;
			margin-top: 80px;
			cursor: pointer;
		}
		.line-body{
			position: absolute;
			background: #57a7aa;
			width: 130px;
			height: 1px;
			margin-top: 26px;
			transition: all .5s ease;
		}
		.navItem-text{
			position: relative;
			background-image: url("./src/static/img/tb.png");
			background-repeat: no-repeat;
			width: 156px;
			height: 54px;
			line-height: 54px;
			font-size: 1.5rem;
			color: #8dd8ff;
			text-align: center;
			margin-left: 120px;
			transition: all .5s ease;
		}
		.nav-item:hover .line-body, .nav-item.current .line-body{
			width: 190px;
		}
		.nav-item:hover .navItem-text, .nav-item.current .navItem-text{
			margin-left: 180px;
		}
		.nav-item.police .line-body{
			background: #f92801;
		}
		.nav-item.police .navItem-text{
			background-image: url("./src/static/img/tb_red.png");
			color: #f92801;
		}
		.main-content{
			float: right;
			margin-right: 210px;
			margin-top: 35px;
		}
		.video-monitor-con{
			width: 1165px;
			height: 715px;
			background: url("./src/static/img/border.png") no-repeat;
			overflow: hidden;
		}
		.videoMonitor-inner-con{
			border: 2px solid #038f95;
			border-radius: 6px;
			width: 1084px;
			height: 560px;
			margin: 78px 0 0 40px;
			padding: 1px;
		}
		.videoMonitor-border{
			border: 4px solid #03686c;
			box-shadow: 0 0 4px #039aa1 inset;
			border-radius: 4px;
			width: 1078px;
			height: 554px;
			overflow-y: auto;
		}
		.videoMonitor-border::-webkit-scrollbar {/*滚动条整体样式*/
			width: 12px;     /*高宽分别对应横竖滚动条的尺寸*/
			height: 1px;
		}
		.videoMonitor-border::-webkit-scrollbar-thumb {/*滚动条里面小方块*/
			border-radius: 10px;
			background: linear-gradient(to right, #04676c, #0c2935);
		}
		.videoMonitor-border::-webkit-scrollbar-track {/*滚动条里面轨道*/
			box-shadow: 0 0 4px rgba(27, 81, 91, .75);
			background: #0c2028;
			border-radius: 2px;
			width: 16px;
		}
	</style>
	<title>天津市津房置业有限公司宝坻项目群管理平台 -- 视频监控</title>
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('src/static/css/common.css') }}">
</head>
<body>
	<div id="page" class="main-cate-bg">
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
						<pre>
							1
							1
							1

							1
							1

							1
							1
							1
							1

							1
							1
							1

							1
							1
							1
							1
							1
							1

							1
							1
							1
							1

							1
							1
							1
							1
							1
							1

							1
							1
							1
							1
							1
							1
							1

							1
							1
							1
						</pre>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>