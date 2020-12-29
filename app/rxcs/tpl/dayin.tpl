<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?=$ld['xm'],'测试结果';?>-河南新华电脑学院</title>
<base href="/<?=APP_NAME;?>/" target="_self">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link type="text/css" href="/pub/css/bootstrap.min.css" rel="stylesheet" />
<style type="text/css">
/**{margin:0; padding:0;}*/
ul{list-style-type:none; margin: 0; padding:0;}

body{/*background-color: #999;*/ font-size:15px;}

#tby {
	margin: 0 auto;
	width: 800px;
	height: 1132px;
	background:url("img/cszBg.jpg") no-repeat 0 0;
	
	/*margin:100px 60px;*/
	/*background-color: #DDD;*/

	/* 
	background-size: 100%;
	border: 1px solid red; 
	overflow: hidden;
	max-height: 1133px;
	*/
}

#cntBox{
    padding: 100px;
	height: 1132px;
    /*background-color: #999;*/
}

#bianhao{position:absolute; top:-50px; left:0; font-weight:600; text-shadow: 1px 1px 1px #ddd;}



#hder{position:relative; margin:70px 0px 60px; text-align:center;}
#csjg{margin:25px 0; letter-spacing: 5px;}
.instr{line-height:1.5;}

#xgfx{margin-top:30px;}
#xgfx h5{font-weight:bold;}
#xgfx li{margin:5px 0; text-indent:25px;}

.indent25{text-indent:25px;}

.red {color:red;}

#zyjg{
	overflow:hidden;
	height:120px;
}
#zyjg div{float:left; width:50%; height:100%;}
/*zyL中背景图片的高度为100*/
#zyL{background:url("./img/zyt/<?=$zyEN;?>.png") no-repeat right center;}
#zyR{
	padding-left:15px;
	display: flex;
	align-items:center;
	/*justify-content: center;*/
}

#qianming{
	position: relative;
	margin-top:20px;
    height: 160px;
}
/*#qianming ul{float:left;}*/

#qmL{
    position: absolute;
    bottom: 0;
    width: 60%;
}	

#qmR{
    position: absolute;
    right: 0;
    bottom: 0;
    width: 40%;
    height: 160px;}

#jiyu{
    margin:5px 0;
    font-weight: 600;
    font-size: 16px;
}
#luokuan{position:absolute; bottom:-1rem;}

#qianzi{
	    position: absolute;
    right: 15px;
    bottom: 20px;
    width: 150px;
}
#qianzhang{
	position: absolute;
    left: 20px;
    bottom: -50px;
}

.utext{padding:0 7px; border-bottom:1px solid #000;}
.redtext{color:red;}


#itsBox{overflow:hidden;}
#zyimgBox{
	width: 300px;
    height: 90px;
    float: right;
    margin-top: 50px;
    background:url("./img/zyt/zyt.png") no-repeat center bottom;
    background-size: contain;
    /*
    height: 130px;
    border: 5px solid #FFF;
    outline: 2px solid #999;
    */
}
#zyimgBox img{
	width:300px;
}
#zymBox{
    margin-top: -20px;
	font-size: 16px;
    
    text-align: center;
    text-shadow: #FFF 1px 0 0,#FFF 0 1px 0,#FFF -1px 0 0,#FFF 0 -1px 0;
}
#zymBox *{font-weight:600 !important;}
/*#its{float:left; margin-left:50px;}*/
#its li{margin:20px 0;}
#its b{display:block; float:left; width:130px;}

</style>
</head>
<body>
<div id="tby">
	<div id="cntBox">
		<div id="hder">
			<div id="bianhao" class="h5">证书编号：<span class="red"><?php echo time();?></span></div>
			<h2>河南新华电脑学院入学测评单</h2>
			<p >Hennan Xinhua Computer College Admission Evaluation Of Single</p>
		</div>

		<div id="itsBox">
			<div id="zyimgBox">
					<div id="zymBox">
				<?php if(empty($ld['tj'])){?>
					<!--<img src="./img/zyt/<?=$zyEN;?>.png">-->
						<b>
						<h3><?=$zys[$zyEN];?></h3>
						<h5>专业匹配度：<?=$ld['r']['t1'];?>%</h5>
						</b>
				<?php }else{ ?>
				<?php foreach($ld['tj'] as $k){ echo $zys[$k].'<br/>';} ?>
				<?php } ?>
					</div>
			</div>
			<ul id="its" class="h5">
				<li><b>测试者：</b><?=$ld['xm'];?></li>
				<!--<li><b>专 业：</b><?=$zyZH;?></li>-->
				<!--
				<?php if(empty($ld['tj'])){?>
				<li><b>专业匹配度：</b><?=$ld['r']['t1'];?>%</li>
				<?php }?>
				-->
				<li><b>性格测评：</b><?=$xg[0];?></li>
				<li><b>测评日期：</b><?php echo date('Y年m月j日');?></li>
			</ul>
		</div>
		
		<ul id="xgfx">
			<!--<h5>性格测评：<?=$xg[0];?></h5>-->
			
			<?=$xg[1];?>
		</ul>
		

<!--
		<div id="csjg">
			<div class="instr h5 indent25">
				<span class="utext"><?=$ld['xm'];?></span> <span class="redtext">同学，恭喜你于2018年10月29日通过我院入学测评！</span><span class="redtext">经测试：你的性格为</span><span class="utext"><?=$xg[0];?></span>
			</div>
		</div>

		
		<ul id="xgfx">
			<?=$xg[1];?>
		</ul>

		<div id="zyjg">
			<div id="zyL"></div>
			<div id="zyR">
				<?=$zyZH;?><br/>专业匹配度为<?=$ld['r']['t1'];?>%
			</div>
		</div>
-->

		<div id="qianming">
			<ul id="qmL">
				<li id="jiyu">新华爱的寄语：</li>
				<!--<li>我们认为：</li>-->
				<li class="red">我们每个人都是生命的杰作，你是未来的胜利者！</li>
				<li class="red">放弃是获得的开始，选择是机遇的重生！</li>
				<li class="red">只有撑起脊梁的人，才会赢得未来！</li>
				<!--<li class="indent25">河南新华电脑学院欢迎您！</li>-->
				<li>河南新华电脑学院始终专注IT教育</li>

			</ul>

			<div id="qmR">
				<img id="qianzhang" src="img/yz.png" />
				<img id="qianzi" src="img/yzqm.png" />
				<div id="luokuan" class="h5">
					<p>院长签字 </p>
					<p>河南新华电脑学院</p>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript"> 
function F(){}
F.id=function(id){ return document.getElementById(id);}
F.ctl="/<?=CTL;?>";

//自动关闭页面
F.close=function()
{
	setTimeout(function(){
		self.close();
	}, 10000*60*3);
	
}

F.exc=function()
{
	F.close();
}()



</script>

</body>
</html>