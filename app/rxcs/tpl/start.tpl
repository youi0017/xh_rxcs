<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<title>河南新华电脑学院-新生入学测试系统</title>
<base href="/<?=APP_NAME;?>/" target="_blank">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--<link rel="stylesheet" type="text/css" href="/pub/css/bootstrap.min.css"/>-->
<style type="text/css">
*{padding: 0px; margin: 0px;}
/*body{min-width: px;}*/
body{font-size: 14px; min-width: 1160px;}
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
.max_box{background:url(img/00.jpg) no-repeat center; height:943px; overflow: hidden; position: relative;}
.conter_box{width: 1175px;margin: 30px auto 0 auto; position: relative;}
.logo{width: 398px; height: 75px; position: relative; left: -88px;}
.logo img{max-width: 100%;}
.title{ background: linear-gradient(to top, #b5e4fb, #ffffff); -webkit-background-clip: text;color: transparent; font-size: 60px; text-align: center; font-family: 'mini'; -webkit-text-stroke: 2px #4c83e4;margin-top: 70px;}
.content_box{width: 779px; height: 472px; background: rgba(255,255,255,0.89); margin: 83px auto 0 auto; overflow: hidden;border-radius: 5px;}
.content_box .box_top,.box_center,.box_bottom{overflow: hidden;}
.title_a{float: left;width: 197px; height: 96px;font-size: 28px; font-family: "微软雅黑"; display:table; color: #fff;}
.title_a span{display: table-cell; vertical-align:middle; text-align:center;}
/*.denglu{width:570px; margin: 0 auto;}*/


.denglu{width:570px; margin:73px auto 52px auto; list-style-type:none;}
.denglu li{overflow:hidden; margin:50px 0;}


.denglu img{width:74px; height:70px; background:#4bb6f5;}
/*#img{margin-top: 20px;}*/
/*.denglu input{width: 480px;height:70px;color:#888888 ;font-size:25px;border:1px solid #dcdcdc; box-sizing: border-box;}*/

.input{padding:0 7px; width:480px; height:70px; color:#888888; font-size:25px; border:1px solid #dcdcdc; box-sizing:border-box;}

#xingming{padding-left:90px; background:#FFF url("./img/iptName.jpg") no-repeat left center;}

/*.xueli{width: 805px;height:70px;color: #888888;font-size: 25px;border: 1px solid #dcdcdc; box-sizing: border-box;}*/
.butt{margin: 50px auto 0 auto; width:510px; overflow: hidden;}
.return{background:#fbc201; float: left;}
.begin{background:#99b546; float: right;}
.but{border: none;color: #fff; width: 166px; padding: 14px 0; font-size: 24px; border-radius: 10px;}
.huan{width: 343px;height: 415px;position: absolute; left: -305px; bottom: -132px;}
.huan img{max-width: 100%;}
.ying{width: 364px; height: 420px;position: absolute; right: -330px;bottom: -137px;}
.ying img{max-width: 100%;}

.text-center{text-align:center;}
.pointer{cursor:pointer;}
.float-left{float:left;}
</style>
<title>新华管理系统</title>
</head>
<body>
	<div class="max_box">
		<div class="conter_box">
			<div class="logo">
				<a href="/" target="_self"><img src="img/logo.png"/></a>
			</div>
			<p class="title">新生入学测试系统</p>
			<div class="content_box">
				<ul class="denglu">
					<li>
		 				<img class="float-left" id="img" src="img/xingming.png"/>
		 				<input class="float-left input" type="text" name="radio" id="xingming" />
					</li>
					<li>
		 				<img class="float-left" src="img/xueli.png"/>
						<select class="float-left input"  name="xueli" id="xueli">
							<option value="">请选择</option>
							<option value="初中">初中</option>
							<option value="高中">高中</option>
							<option value="大学">大学</option>
					    </select>
					</li>
					
	 				
 				</ul>
 				<div class="butt">
 					<a href="/" class="return but text-center">返回</a>
 					<button  id="sbt" class="begin but pointer">开始</button>
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
<script type="text/javascript" src="/pub/js/jquery.min.js" ></script>
<script type="text/javascript" src="/pub/js/jqui.vtp.js" ></script>
<script type="text/javascript">
function F(){}
F.id=function(id){ return document.getElementById(id); }
F.ctl="/<?=CTL;?>";
F.zy="<?=$zyEN;?>"

//执行
F.exc=function()
{
	F.id("sbt").onclick=function()
	{
		F.sbt();
	}
	
	
}();

//提交
F.sbt=function()
{
	//alert("okkk");
	//验证填入信息
	var xingming=$.trim(F.id("xingming").value), xueli=$("#xueli").val();
	//console.log(xingming+" + "+xueli);
	if(!xingming || xingming.length<2  ){alert("请输入不少于2位的姓名");return;}
	if(!xueli){alert("请选择您的学历");return;}

	$.msg.freeze(true);
	$.ajax({
		"url":F.ctl+"-ajx_start"
		,"data":{"xm":xingming, "xl":xueli, "zy":F.zy}
		,"type":"get"
		,"dataType":"json"
		,"success":function(jn)
		{
			if(jn.status>0)
			{
				F.id("xingming").value="";
				$("#xueli").val("");
				
				location.href=F.ctl+"-ti";
			}
			else
			{
				alert("系统错误，请联系管理员解决！");
			}
			
		}


		
	})

	
	
	
	
}




</script>	
</body>
</html>