<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"><title>天津市津房置业有限公司宝坻项目群管理平台 -- 首页</title>
    <link rel="stylesheet" href="{{ URL::asset('src/static/css/bootstrap.css') }}">

    <style type="text/css">
        body{background-color: #000}
        a:hover{text-decoration: none;}
        #building__canvas--box{
            position: absolute;
            width: 1920px;
            height: 1080px;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            background: linear-gradient( #000101,#0c222b, #091c23, #000101);
            z-index: 1;
        }
        #building__canvas--box::before,
        #building__canvas--box::after {
            position: absolute;
            z-index: 99;
            width: 1920px;
            content: '';
            left: 0;
            right: 0;
        }
        #building__canvas--box::before{
            background: url("./src/static/img/top.png") no-repeat;
            height: 247px;
            top: 0;
        }
        #building__canvas--box::after{
            background: url("./src/static/img/bottom.png") no-repeat;
            height: 266px;
            bottom: 0;
        }
        #page{
            width: 1920px;
            height: 1080px;
            position: relative;
            z-index: 100;
        }
        .main-header--box{
            position: relative;
            width: 1920px;
            height: 123px;
            background: url("./src/static/img/logo_decorate.png") no-repeat center bottom;
            text-align: center;
            z-index: 1010;
        }
        .main-header {
            padding: 2rem 0;
            line-height: 3rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .logo{
            font-size: 3rem;
            color: #bbd9e0;
        }
        .electric-monitor--box{
            position: absolute;
            left: 40px;
            top: 135px;
            height: 460px;
            z-index: 1020;
        }
        .monitor--title{
            background: url("./src/static/img/title_bg.png") no-repeat;
            width: 132px;
            height: 47px;
            font-size: 1.25rem;
            color: #8dd8ff;
            text-align: center;
            line-height: 48px;
            margin-bottom: 12px;
        }
        .monitor--title.larger{
            background: url("./src/static/img/title_bg_larger.png") no-repeat;
            width: 168px;
        }
        .electric-monitor--content{
            position: relative;
            width: 300px;
            height: 460px;
            border-top: 1px solid #57a7aa;
            border-bottom: 1px solid #57a7aa;
        }
        .electric-monitor--subTitle{
            background: url("./src/static/img/subtitle_bg.png") no-repeat;
            font-size: 1.125rem;
            color: #73c0cb;
            width: 107px;
            height: 21px;
            line-height: 20px;
            padding-left: 22px;
            margin-bottom: 11px;
            margin-top: 20px;
        }
        .analysis-main{
            position: relative;
            background: url("./src/static/img/rulers.png") no-repeat;
            width: 280px;
            height: 34px
        }
        .switch-main {
            background: url("./src/static/img/switch_bg.png") no-repeat;
            width: 125px;
            height: 40px;
        }
        .switch-main span[class^="switch-"]{
            float: left;
            line-height: 40px;
            color: #239bb3;
            font-size: 1.125rem;
            text-shadow: 1px 1px 0 rgba(10, 50, 58, 0.75);
        }
        .switch-main .switch-on{
            margin: 0 0 0 20px;
        }
        .switch-main .switch-off{
            margin: 0 0 0 24px;
        }
        .switch-main .switch-on.active{
            color: #08c055;
            text-shadow: 0 0 4px rgba(8, 192, 85, 0.5);
        }
        .switch-main .switch-off.active{
            color: #f92801;
            text-shadow: 0 0 4px rgba(249, 40, 1, 0.5);
        }
        .short-monitor{
            float: left;
        }
        .breaker-monitor{
            float: left;
            margin-left: 40px;
        }


        .progress-outer{
            position: absolute;
            left: 5px;
            top: 6px;
        }
        .progress-bg{
            background: -webkit-linear-gradient(left, #0296ac, #109886, #eac100, #f91403);
            background: linear-gradient(to right, #0296ac, #109886, #eac100, #f91403);
            -webkit-transition: all .4s cubic-bezier(.08,.82,.17,1) 0s;
            transition: all .4s cubic-bezier(.08,.82,.17,1) 0s;
            position: relative;
            width: 270px;
            height: 10px;
            border-radius: 2px;
            border: 1px solid #086475
        }
        .progress-bg::before{
            content: "";
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: #fff;
            border-radius: 10px;
            -webkit-animation: progress-active 2.4s cubic-bezier(.23,1,.32,1) infinite;
            animation: progress-active 2.4s cubic-bezier(.23,1,.32,1) infinite
        }
        .progress-bg2::before{
            -webkit-animation: progress-active2 2.4s cubic-bezier(.23,1,.32,1) infinite;
            animation: progress-active2 2.4s cubic-bezier(.23,1,.32,1) infinite
        }
        .progress-bg3::before{
            -webkit-animation: progress-active3 2.4s cubic-bezier(.23,1,.32,1) infinite;
            animation: progress-active3 2.4s cubic-bezier(.23,1,.32,1) infinite
        }
        .progress-bg4::before{
            -webkit-animation: progress-active4 2.4s cubic-bezier(.23,1,.32,1) infinite;
            animation: progress-active4 2.4s cubic-bezier(.23,1,.32,1) infinite
        }
        @-webkit-keyframes progress-active {
            0% {
                opacity: .1;
                width: 0
            }
            20% {
                opacity: .5;
                width: 0
            }
            to {
                opacity: 0;
                width: 100%
            }
        }
        @keyframes progress-active {
            0% {
                opacity: .1;
                width: 0
            }
            20% {
                opacity: .5;
                width: 0
            }
            to {
                opacity: 0;
                width: 100%
            }
        }
        @-webkit-keyframes progress-active2 {
            0% {
                opacity: .1;
                width: 0
            }
            18% {
                opacity: .5;
                width: 0
            }
            to {
                opacity: 0;
                width: 80%
            }
        }
        @keyframes progress-active2 {
            0% {
                opacity: .1;
                width: 0
            }
            18% {
                opacity: .5;
                width: 0
            }
            to {
                opacity: 0;
                width: 80%
            }
        }@-webkit-keyframes progress-active3 {
             0% {
                 opacity: .1;
                 width: 0
             }
             10% {
                 opacity: .5;
                 width: 0
             }
             to {
                 opacity: 0;
                 width: 58%
             }
         }
        @keyframes progress-active3 {
            0% {
                opacity: .1;
                width: 0
            }
            10% {
                opacity: .5;
                width: 0
            }
            to {
                opacity: 0;
                width: 58%
            }
        }
        @-webkit-keyframes progress-active4 {
             0% {
                 opacity: .1;
                 width: 0
             }
             5% {
                 opacity: .5;
                 width: 0
             }
             to {
                 opacity: 0;
                 width: 20%
             }
         }
        @keyframes progress-active4 {
            0% {
                opacity: .1;
                width: 0
            }
            5% {
                opacity: .5;
                width: 0
            }
            to {
                opacity: 0;
                width: 20%
            }
        }

        .right-fix{
            position: absolute;
            right: 20px;
            top: 120px;
            z-index: 1030;
        }
        .towerElevator-monitor{
            width: 305px;
        }
        .towerElevator-monitor--content{
            position: relative;
            height: 260px;
            border-top: 1px solid #57a7aa;
            border-bottom: 1px solid #57a7aa;
        }
        .tower-monitor{
            border: 2px solid #367d86;
            width: 290px;
            height: 110px;
            margin: 12px 0 0 10px;
        }
        .elevator-monitor{
            border: 2px solid #367d86;
            width: 290px;
            height: 110px;
            margin: 12px 0 0 10px;
        }
        .img-model{
            border-right: 2px solid #367d86;
            float: left;
            width: 172px;
            height: 106px;
            position: relative;
            background: url("./src/static/img/arrow.png") no-repeat left top;
            overflow: hidden;
        }
        .img-model img{
            position: absolute;
            bottom: 0;
            transition: all .34s ease 0s;
        }
        .img-model:hover img{
            transform: scale(1.1);
        }
        .arrow-sign{
            position: absolute;
            width: 50px;
            height: 50px;
            transform: rotate(-45deg);
            font-size: 0.875rem;
            text-align: center;
            color: #0c212a;
            left: 0;
            top: 0;
        }
        .tower-monitor img{
            left: 30px;
        }
        .elevator-monitor img{
            left: 75px;
        }
        .personnel-monitor{
            width: 305px;
            margin-top: 25px;
        }
        .personnel-monitor--content{
            position: relative;
            height: 256px;
            border-top: 1px solid #57a7aa;
            border-bottom: 1px solid #57a7aa;
            padding-top: 18px;
            padding-left: 18px;
        }
        .vertical-line{
            position: absolute;
            width: 15px;
            left: -28px;
            top: -2px;
        }
        .vertical-line-large{
            background: url("./src/static/img/line_big.png") no-repeat;
            height: 460px;
        }
        .vertical-line-middle{
            background: url("./src/static/img/line_middle.png") no-repeat;
            height: 252px;
        }
        .vertical-line-small{
            background: url("./src/static/img/line_small.png") no-repeat;
            height: 209px;
        }
        .curr-police{
            float: left;
            width: 90px;
            height: 90px;
            border: 2px solid #48707a;
            background-color: #143c4b;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-flow: column nowrap;
            color: #9fc1cb;
        }
        .police-details{
            float: left;
            background-color: #10313c;
            margin-left: 10px;
            width: 178px;
            padding: 0;
            height: 90px;
            display: flex;
            flex-flow: column nowrap;
            justify-content: center;
        }
        .police-details p{
            font-size: 0.875rem;
            color: #6f96a1;
            padding: 0 0 0 8px;
            margin: 0;
        }
        .police-details .red{
            margin-right: 3px;
        }
        .red{
            color: #f92801;
        }

        .equipment-amount{
            color: #9fc1cb;
            font-size: 1.125rem;
            text-align: center;
            height: 50px;
            line-height: 50px;
        }
        .equipment-status-list{
            display: flex;
        }
        .status-item{
            border-top: 2px solid transparent;
            font-size: 1.625rem;
            flex: 1;
            text-align: center;
            height: 54px;
            line-height: 54px;
            margin-right: 3px;
            transition: border-top-width .2s ease-in;
        }
        .status-item:last-child{
            margin-right: 0;
        }
        .status-item:hover{
            border-top-width: 4px;
        }
        .status-green{
            color: #08c055;
            text-shadow: 0 0 4px rgba(12, 129, 61, 0.5);
            border-top-color: #08c055;
        }
        .status-red{
            color: #f92801;
            text-shadow: 0 0 4px rgba(159, 3, 6, 0.5);
            border-top-color: #f92801;
        }
        .status-yellow{
            color: #ffde01;
            text-shadow: 0 0 4px rgba(116, 98, 3, 0.5);
            border-top-color: #ffde01;
        }
        .personnel-item{
            width: 134px;
            height: 115px;
            background-color: #173037;
            margin: 12px 8px 0 0;
            float: left;
            color: #9fc1cb;
        }
        .personnel-item .t{
            background-color: #0a4251;
            height: 26px;
            text-align: center;
            line-height: 26px;
        }
        .personnel-item .list{
            padding: 10px 0 0 10px;
        }
        .personnel-item .list p{
            margin: 0;
            padding: 0;
            font-size: 1rem;
        }

        .bottom-fix{
            position: absolute;
            width: 1920px;
            bottom: 20px;
            left: 0;
            z-index: 1040;
        }
        .video-monitor{
            width: 668px;
            float: left;
            margin-left: 40px;
        }
        .video-monitor--content{
            position: relative;
            height: 205px;
            border-top: 1px solid #57a7aa;
            border-bottom: 1px solid #57a7aa;
            padding-top: 25px;
        }
        .door-monitor{
            float: left;
            width: 508px;
            margin-left: 62px;
        }
        .door-monitor--content{
            position: relative;
            height: 205px;
            border-top: 1px solid #57a7aa;
            border-bottom: 1px solid #57a7aa;
        }
        .env-monitor{
            float: left;
            width: 536px;
            margin-left: 73px;
        }
        .env-monitor--content{
            position: relative;
            height: 205px;
            padding-top: 25px;
            border-top: 1px solid #57a7aa;
            border-bottom: 1px solid #57a7aa;
        }
        .monitor-item{
            float: left;
            margin-left: 24px;
        }
        .monitor-item:first-child{
            margin-left: 14px;
        }
        .monitor-item-control{
            background-color: rgba(2, 71, 86, 0.8);
            color: #9fc1cb;
            font-size: 1.25rem;
            width: 26px;
            height: 92px;
            padding-top: 4px;
            text-align: center;
            line-height: 1.1;
            position: relative;
            float: left;
        }
        .monitor-item-control::before{
            position: absolute;
            content: '';
            border: 1px solid rgba(8, 88, 99, 0.8);
            width: 16px;
            height: 100px;
            z-index: 1;
            left: -4px;
            top: -4px;
        }
        .monitor-item-control span{
            position: relative;
            z-index: 2;
        }
        .monitor-item-main{
            width: 127px;
            height: 138px;
            background-image: url("./src/static/img/monitor_normal.png");
            background-repeat: no-repeat;
            position: relative;
            margin-left: 12px;
            -webkit-transition: all .2s cubic-bezier(0.68, 0.4, 1, 1);
            transition: all .2s cubic-bezier(0.68, 0.4, 1, 1)
        }
        .monitor-item-bell .monitor-item-main{
            /*background-image: url("./src/static/img/monitor_red.png");*/
        }
        .monitor-item-bell .equip-no{
            /*color: #f92801;*/
        }
        .monitor-item-main:hover{
            transform: translate3d(2px, 2px, 0);
        }
        .monitor-item-main:hover .equip-no{
            transform: scale(1, 1.1);
        }
        .equip-no{
            font-size: 2rem;
            color: #a3c2d0;
            position: absolute;
            right: 10px;
            bottom: 10px;
            line-height: 40px;
        }
        .env-item{
            float: left;
            margin-left: 15px;
        }
        .env-item:first-child{
            margin-left: 12px;
        }
        .env-info{
            background: url("./src/static/img/cycle.png") no-repeat;
            width: 117px;
            height: 117px;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
            transform-origin: 95% 40%;
            transition: all 0.3s ease-in-out;
        }
        .env-info:hover{
            transform: rotate(-10deg);
        }
        .env-info-lg{
            flex-flow: column nowrap;
        }
        .env-info .num{
            color: #a2c5d2;
            font-size: 1.5rem;
        }
        .env-info .unit{
            color: #a3c2d0;
            font-size: 0.625rem;
            margin: 8px 0 0;
        }
        .env-info-lg .unit{
            margin: 2px 0 0;
        }
        .env-type{
            border-bottom: 2px solid #458192;
            width: 44px;
            text-align: center;
            margin: 12px auto 0;
            color: #5690a1;
            font-size: 1rem;
            display: block;
            cursor: pointer;
            -webkit-transition: all .3s cubic-bezier(.645,.045,.355,1);
            transition: all .3s cubic-bezier(.645,.045,.355,1);
        }
        .env-type:hover{
            border-bottom-width: 4px;
        }

        div[class$="-monitor--content"]::before,
        div[class$="-monitor--content"]::after{
            content: '';
            position: absolute;
            width: 3px;
            height: 3px;
            background-color: #2fa5ba;
            border-radius: 3px;
            left: 100%;

            -webkit-animation: dott-te 2.3s cubic-bezier(.645,.045,.355,1);
            animation: dott-te 2.3s cubic-bezier(.645,.045,.355,1);

        }
        div[class$="-monitor--content"]::before{
            top: -2px;
        }
        div[class$="-monitor--content"]::after {
            bottom: -2px;
        }

        @-webkit-keyframes dott-te {
            0% {
                left: 0;
                opacity: .1;
            }
            40% {
                left: 0;
                opacity: .5;
            }
            to {
                left: 100%;
                opacity: 1;
            }
        }
        @keyframes dott-te {
            0% {
                left: 0;
                opacity: .1;
            }
            40% {
                left: 0;
                opacity: .5;
            }
            to {
                left: 100%;
                opacity: 1;
            }
        }
        .door-info-panel{
            position: absolute;
            width: 450px;
            height: 167px;
            background: url("./src/static/img/door.png") no-repeat;
            left: 35px;
            top: 25px;
        }
        .door-item{
            position: absolute;
        }
        .door-item .t{
            color: #06adcb;
            font-size: 1.125rem;
        }
        .door-item .num{
            color: #78e7ff;
            font-size: 1.375rem;
        }
        .door-item.manager,.door-item.supervisor{
            left: 55px;
            top: 30px;
        }
        .door-item.manager .t,.door-item.supervisor .t{
            margin-left: 14px;
        }
        .door-item.manager .num,.door-item.supervisor .num{
            margin-top: 6px;
        }
        .door-item.supervisor{
            top: 124px;
        }
        .door-item.supervisor .t{
            margin-left: 18px;
        }
        .door-item.supervisor .num{
            margin-left: 8px;
        }
        .door-item.incoming, .door-item.constructors{
            left: 380px;
            top: 26px;
        }
        .door-item.incoming .num,.door-item.constructors .num{
            margin: 6px 0 0 8px;
        }
        .door-item.constructors{
            top: 122px;
        }
    </style>
</head>
<body>
    <div id="page">
        <div class="main-header--box">
            <div class="main-header">
                <div class="logo">天津市津房置业有限公司宝坻项目群管理平台</div>
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
                            <div class="electric-monitor--subTitle">短路</div>
                            <div class="switch-main">
                                <span class="switch-on active">ON</span>
                                <span class="switch-off">OFF</span>
                            </div>
                        </div>
                        <div class="breaker-monitor">
                            <div class="electric-monitor--subTitle">断路</div>
                            <div class="switch-main">
                                <span class="switch-on">ON</span>
                                <span class="switch-off active">OFF</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
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
                            <h3><span class="red">12</span></h3>
                            <span>当前报警</span>
                        </div>
                        <div class="police-details">
                            <p>越界报警：<span class="red">5</span>人</p>
                            <p>掉线提示：<span class="red">4</span>人</p>
                            <p>低电提示：<span class="red">1</span>人</p>
                            <p>长时间静止：<span class="red">2</span>人</p>
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
                        <div class="monitor-item monitor-item-bell">
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
                            <div class="env-info env-info-lg">
                                <span class="num">50</span>
                                <span class="unit">分贝</span>
                            </div>
                            <div class="env-type">
                                <span class="">噪声</span>
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
        if("WebSocket" in window){
            var ws = new WebSocket('ws://60.28.24.227:8282');
            ws.onopen = function(evt) {
                //初始连接要传的参数 先传一个工地的id吧
                var msg = {"type":"say_to_one","to_client_id":100,"content":"hello"};
                ws.send(JSON.stringify(msg));
            };

            ws.onmessage = function(e) {
                var data = eval("("+e.data+")");
                console.log(data);
                $('.current-monitor').find('.progress-bg').css('width',data.electric[0]);
                $('.voltage-monitor').find('.progress-bg').css('width',data.electric[1]);
                $('.active-monitor').find('.progress-bg').css('width',data.electric[2]);
                $('.reactive-monitor').find('.progress-bg').css('width',data.electric[3]);
            };

            ws.onclose = function(evt) {
                console.log("Connection closed.");
            };
        }else{

        }
    </script>
    <script type="text/javascript" src="{{ URL::asset('src/static/js/three.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('src/static/js/OrbitControls.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('src/static/js/JDLoader.min.js') }}"></script>
    <script type="text/javascript">
        var meshes = [], mixers = [], hemisphereLight, pointLight, camera, scene, renderer, controls;
        var clock = new THREE.Clock;

        init();
        animate();

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
                            edges = new THREE.EdgesHelper( mesh, 0x4ee4f2 );//设置边框，可以旋转
                            scene.add( edges );
                            if (mesh && mesh.geometry.animations) {
                                var mixer = new THREE.AnimationMixer(mesh);
                                mixers.push(mixer);
                                var action = mixer.clipAction( mesh.geometry.animations[0] );
                                action.play();
                            }
                        } else if (data.objects[i].type == "Line") {
                            var jd_color = data.objects[i].jd_object.color;
                            var color1 = new THREE.Color( jd_color[0] / 255, jd_color[1] / 255, jd_color[2] / 255 );
                            var material = new THREE.LineBasicMaterial({ color: color1}); //{ color: new THREE.Color( 0xff0000 ) }
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
                color : 0x33ccff,
                wireframe : true, //以网格显示
                opacity: 0.35,
                transparent : true, //透明
            });
            for (var j =0; j < data.materials.length; ++j) {
                matArray.push(mat);
            }
            return  matArray;
        }

        function animate() {
            var delta = clock.getDelta();
            for (var i = 0; i < mixers.length; ++i)
                mixers[i].update(delta);

            if (controls) controls.update();
            if (camera)  renderer.render(scene, camera);

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
    <!-- @include('default/common/header')
    <p><a href="/auth/logout">退出</a></p>
    <p><a href="/electric">电力监控二级页面</a></p>
    <p><a href="/tower_crane">塔吊二级页面</a></p>
    <p><a href="/elevator">升降机二级页面</a></p>
    <p><a href="/userinfo">人员信息二级页面</a></p>
    <p><a href="/video">视频监控二级页面</a></p>
    <p><a href="/door">门禁管控二级页面</a></p>
    <p><a href="/env">环境监测二级页面</a></p> -->
</body>
</html>
