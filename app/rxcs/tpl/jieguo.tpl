<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<title><?=$ld['xm'],'测试结果';?>-河南新华电脑学院新生入学测试系统</title>
<base href="/<?=APP_NAME;?>/" target="_blank">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
* {
padding: 0;
margin: 0;
box-sizing: border-box;
font-family: 微软雅黑;
}

@font-face {
font-family: hanyi;
src: url("./font/mnjh.TTF");
}

body{
max-width: 1920px;
min-height: 943px;
background: url("./img/00.jpg") no-repeat center;
background-size: auto;
 overflow-x:hidden;
}
#tby{margin:0 auto; width:1175px;}

#loge{margin-top:40px; margin-left:-70px; height:70px;}
.title{
	font-size: 50px;
	color: white;
	font-family: hanyi;
	margin-top: 50px;
	text-align: center;
	height:70px;
	font-weight:500;
}

#cntBox{
position:relative;
margin-top:20px;
height: 590px;/*573*/
background: #f7fafd;
border-radius: 10px;
padding: 40px 70px;
/*transform: translate(-50%, 0);*/
}

#csjg{list-style-type:none;}
#csjg li{
	text-indent: 2em;
	font-size: 16px;
	line-height: 26px;
	color: #646769;
	margin-bottom: 26px;

	
}

#title2{
	line-height:1.8;
	color: #eb038a;
	text-align: center;
-webkit-box-reflect: below 1px -webkit-gradient(linear, 0 0, 0 100%, from(transparent), color-stop(.5, transparent), to(rgba(36, 34, 34, 0.2)));
}

#title3{
	font-size: 25px;
	margin-top: 31px;
	color: #6d6d6d;
	text-align: center;
}
#dayin{
	border: 0 none;
	width: 150px;
	border-radius: 20px;
	position: absolute;
	right: 85px;
	bottom: 10px
	outline: 0 none;
	cursor:pointer;
	
}
.huanying{
	position:absolute;
	bottom:-70px;	
}

#huan{
	left:-335px;
	
}

#ying{
	right:-339px;
}
</style>
</head>

<body>
	<div id="tby">
		 <a href="/" target="_self">
		 	<img id="loge" src="./img/logo.png">
		 </a>
		 <h1 class="title">恭喜 "<?=$ld['xm'];?>" 完成入学测试，你是<?=$xg[0];?>！</h1>
		 <div id="cntBox">
		 	<ul id="csjg">
		 		<?=$xg[1];?>
		 	</ul>
		 	<h1 id="title2" class="title">专业测试结果</h1>

<?php if(empty($ld['tj'])){?>
	        <h2 id="title3">专业测试题共<?=count($ld['t1']);?>道，您与本专业匹配的成功度为<?=$ld['r']['t1']?>%</h2>
<?php }else{?>
	        <h2 id="title3">测试题共<?=count($ld['t1']);?>道，与您匹配度较高的专业是：<br/>
	        <?php
	        $zys=\ctl\index::zys();
	        $zy=[];
	        foreach($ld['tj'] as $k)
	        {
		        $zy[]=$zys[$k];
	        }
	        echo implode('，', $zy);
	        ?>
	        </h2>
<?php } ?>

	        <img id="dayin" class="btn active" src="./img/dayin.png" />	 	
	        <img id="huan" class="huanying" src="./img/huan.png">
	    	<img id="ying" class="huanying" src="./img/ying.png">
		 </div>
	
	</div>
<script type="text/javascript" src="/pub/js/jquery.min.js" ></script>
<script type="text/javascript" src="/pub/js/jqui.vtp.js" ></script>
<script type="text/javascript"> 
function F(){}
F.id=function(id){ return document.getElementById(id);}
F.ctl="/<?=CTL;?>";
F.timeout=10;//自动打开的时间
F.timer;


//打开结果：打印页
F.open_dayin=function()
{
	//alert('to');
	//location.href=F.ctl+"-dayin";
	window.open(F.ctl+"-dayin");
	//location.href=F.ctl+"-dayin";
	return;
	
	clearInterval(F.timer);
	F.id("secdBox").innerHTML="";
	
	
	
}

//转向主页:3分钟
F.to_home=function()
{
	setTimeout(function(){
		location.href="/";
	}, 1000*60*5);
}



F.exc=function()
{
	//自动回主页
	F.to_home();
	
	//点击转向
	F.id("dayin").onclick=F.open_dayin;
	return;

	//自动转向
	F.timer=setInterval(function()
	{
		if(F.timeout<=1)
		{
			F.open_dayin();
		}
		else
		{
			//console.log(F.timeout);
			F.id("autoSecd").innerHTML = --F.timeout;
		}
	}, 1000);
}

F.exc();



</script>        
</body>
</html>