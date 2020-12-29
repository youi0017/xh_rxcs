<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<title>河南新华电脑学院-新生入学测试系统</title>
<base href="/<?=APP_NAME;?>/" target="_self">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/pub/css/bootstrap.min.css"/>
<style type="text/css">
*{padding: 0px; margin: 0px;}
/*body{min-width: px;}*/
body{font-size: 14px; min-width: 1200px;}
ol,ul,li { list-style:none; }
span{display: block;}
img{border: none;}
a { color:#555; text-decoration:none; display: block;}
a:hover { text-decoration:none; /*transform: translate(0,0);transition:all 0.2s linear 0s;*/}
em{font-style: normal;}
.clear{clear: both;}
/*怪异盒子兼容*/ /*-moz-box-sizing: border-box;  -webkit-box-sizing: border-box; -o-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;*/
/*圆角兼容*/ /*-moz-border-radius-topleft:4px;-moz- border- radius-topright:4px;-moz-border-radius-bottomleft:4px;-moz- border- radius- bottomright:4px;*/
/*透明度兼容*/ /*filter:alpha(opacity=50);*/
@font-face {
	font-family:'fangzheng';
	src: url(font/fzlt.TTF);
}
@font-face {
	font-family:'mini';
	src: url(font/mnjh.TTF);
}
/*最大的DIV*/
.max_box{background:url(img/background.jpg) no-repeat center; height:943px; overflow: hidden; position: relative;}
.conter_box{width: 1175px;margin: 30px auto 0 auto; position: relative;}
.logo{width: 398px; height: 75px; position: relative; left: -88px;}
.logo img{max-width: 100%;}
.title{ background: linear-gradient(to top, #b5e4fb, #ffffff); -webkit-background-clip: text;color: transparent; font-size: 60px; text-align: center; font-family: 'mini'; -webkit-text-stroke: 2px #4c83e4;margin-top: 70px;}
.content_box{width: 1175px; height: 472px; background: rgba(255,255,255,0.89); margin: 65px auto 0 auto; overflow: hidden;border-radius: 5px;}
.content_box .box_top,.box_center,.box_bottom{overflow: hidden;}
.title_a{float: left;width:197px; height:96px;font-size:28px; font-family: "微软雅黑"; display:table; color: #fff;}
.title_a span{display: table-cell; vertical-align:middle; text-align:center;}
.content_box .box_top{margin:42px auto 0 auto; width: 870px;}
.box_top a{margin-right:27px;}
#tagBox a:hover{color:#FFF; text-shadow:#555 1px 1px 2px;}

.box_top a:last-child{margin-right: 0;}
.content_box .box_center{margin:52px auto 45px auto; width: 1098px;}
.box_center a{margin-right: 27px;}
.box_center a:last-child{margin-right: 0;}
.box_bottom{margin:0 auto 0 auto; width: 870px;}
.box_bottom a{margin-right: 27px;}
.box_bottom a:last-child{margin-right: 0;}
.zhcs{background-color: #2891ff;}
.ysdm{background-color: #8643ff;}
.ui{background-color: #c14ffa;}
.kjcy{background-color: #ff6a22;}
.web{background-color: #f626d5;}
.yun{background-color: #0ea969;}
.dzjj{background-color: #ff523c;}
.yds{background-color: #258eff;}
.rgzn{background-color: #93b416;}
.dsj{background-color: #ff3737;}


.dsp{background-color: #5a850f;}
.wrj{background-color: #ff6014;}
.yxkf{background-color: #c04efa;}
.yycy{background-color: #2855ff;}
.jzzs{background-color: #00ced1;}



/*.app{background-color: #ff6014;}*/
/*.cw{background-color: #5a850f;}*/
/*.hz{background-color: #c04efa;}*/
/*.yxyg{background-color: #c04efa;}*/



.huan{    width: 343px;height: 415px;position: absolute; left: -305px; bottom: -132px;}
.huan img{max-width: 100%;}
.ying{    width: 364px; height: 420px;position: absolute; right: -330px;bottom: -137px;}
.ying img{max-width: 100%;}
	</style>
	<title>新华管理系统</title>
</head>
<body>
	
	<div class="max_box">
		<div class="conter_box">
			<div class="logo">
				<img src="img/logo.png"/>
			</div>
			<p class="title">新生入学测试系统</p>
			<div id="tagBox" class="content_box">
				<div class="box_center"><!--box_top-->
					<a href="javascript:" class="title_a rgzn"><span>人工智能</span></a>
					<a href="javascript:" class="title_a zhcs"><span>综合测试</span></a>
					<a href="javascript:" class="title_a kjcy"><span>VR空间<br/>创意设计师</span></a>
					<a href="javascript:" class="title_a yun"><span>云计算<br/>网络工程师</span></a>
				</div>
				<div class="box_center">
					<a href="javascript:" class="title_a dzjj"><span>电子竞技<br/>运管精英</span></a>
					<a href="javascript:" class="title_a app"><span>移动APP软件<br/>开发工程师</span></a>
					<a href="javascript:" class="title_a ysdm"><span>VR影视<br/>动漫设计师</span></a>
					<a href="javascript:" class="title_a ui"><span>新媒体UI<br/>创意设计师</span></a>
					<a href="javascript:" class="title_a cwgl"><span>互联网<br/>财务管理</span></a>
				</div>
				<div class="box_center"><!--box_bottom-->
					<a href="javascript:" class="title_a hz"><span>互联网+会展</span></a>
					<a href="javascript:" class="title_a dsj"><span>大数据<br/>应用工程师</span></a>
					<a href="javascript:" class="title_a yds"><span>云电子<br/>商务运营</span></a>
					<a href="javascript:" class="title_a web"><span>互联网平台<br/>开发工程师</span></a>
				</div>
			</div>
			<div class="huan">
				<img src="img/huan.png"/>
			</div>
			<div class="ying">
				<img src="img/ying.png"/>
			</div>
		</div>
	</div>


<?php include FR_APP.APP_NAME.'/tpl/_bgmusic.tpl'; ?>
<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
<script type="text/javascript">
(function(){
	//return;
	$.ajax({
		"url":"/index-ajx_getZY"
		,"dataType":"json"
		,"success":function(jn)
		{
			if(jn.status>0)
			{
				var i=0,k,lis={'a':[], 'b':[], 'c':[]},str='',br;
				for(k in jn.data)
				{
					str=jn['data'][k];
					
					if(str.length>4)
					{
						br= (i==8 || i==7) ? 6 : ( (i==2) ? 5 : 4);
						str=str.slice(0,br)+'<br/>'+str.slice(br);
					}
					
					if(i<=4)
					{
						lis['a'].push("<a href='/step-start?zy="+k+"' class='title_a "+k+"'><span>"+str+"</span></a>");
					}
					else if(i<=9)
					{
						lis['b'].push("<a data-k='"+i+"' href='/step-start?zy="+k+"' class='title_a "+k+"'><span>"+str+"</span></a>");
					}
					else
					{
						lis['c'].push("<a href='/step-start?zy="+k+"' class='title_a "+k+"'><span>"+str+"</span></a>");
					}

					i++;
				}

				var html='<div id="tagBox" class="box_center">'+lis['a'].join("")+'</div><div class="box_center">'+lis['b'].join("")+'</div><div class="box_center">'+lis['c'].join("")+'</div>';

			    $('#tagBox').html(html);				
			}
		}
	})

})()

</script>
</body>
</html>