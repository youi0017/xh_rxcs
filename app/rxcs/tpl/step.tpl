<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<title>河南新华电脑学院-新生入学测试系统</title>
<base href="/<?=APP_NAME;?>/" target="_blank">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--<link rel="stylesheet" type="text/css" href="/pub/css/bootstrap.min.css"/>-->
<style type="text/css">
*{margin:0; padding:0; font-size: 20px;}

dl{color:#646263;}
dd{display:none; margin-left:35px;}
ol{
	list-style-type: upper-alpha;
	list-style-position: inside;
}

.xz {overflow:hidden; margin-top:20px; height:25px; /*margin-left:35px;*/}
.xz li{float:left; margin-right:20px;}
.xz input{width:20px; height:20px;}

.xx{margin-top:20px; overflow: hidden; /*margin-left:35px;*/}
.xx li{
    /*float: left;*/
    /*width: 25%;*/
    /*margin-right: 100px;*/
    line-height: 30px;	
}


.grpTit b{color:#F00; margin:0 5px;}
/*  other write */
/*ol,ul,li { list-style:none; }*/
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
body{
	/*min-width: 1200px;*/
    background:#319bfe url(img/00.jpg) no-repeat center bottom;
    height: 943px;
    position: relative;	
    background-size:100% 100%;
}

.max_box{overflow:hidden;}
.outBox{ width: 1175px;margin: 30px auto 0 auto; position: relative;}
.logo{width: 398px; height: 75px; position: relative; left: -88px;}
.logo img{max-width: 100%;}
.title{ font-size: 60px; text-align: center; font-family: 'mini'; color:#fff;margin-top: 70px;}
.content_box{position:relative;width:1175px; min-height:515px; padding:30px 65px; background: rgba(255,255,255,0.95); margin:65px auto;border-radius:5px; box-sizing: border-box;}
	
.next{
    position: absolute;
    bottom: 20px;
    width: 1060px;
    height: 100px;
}

#a1{float: left;background: url("img/shang.png") center center no-repeat;}
#a2{
	float: right;
	background:url("img/xia.png") center center no-repeat;
}
#a3{
	float: right;
	background:url("img/tijiao.png") center center no-repeat;
}

.btn{
	width: 160px;
	height: 130px;
	border: none;
}		 		
.tiPicBox{
	/*width:1065px;*/
	/*text-align:center;*/
	margin-top:20px;
	/*margin-left:35px;*/
} 

/*.tiPicBox img{min-width:760px; max-height:350px;}*/
.tiPicBox img{
	max-width:1000px;
	max-height:190px;
	min-height: 100px;
	cursor:pointer;
}
h2{
	font-weight: normal;
	text-align: center;
	color:#fff;
	margin-top:100px;
	font-size: 50px;
	font-family:'mini';

}
h4{
    font-family: 'fangzheng';
    height: 25px;
    line-height: 25px;
    overflow: hidden;
    /*font-size: 20px;*/
	/*padding-top: 30px;*/
	/*color: #626262;*/
	/*margin-left: 65px;*/
}

h5{	font-family:'fangzheng';
	/*font-size: 20px;*/
	padding-top: 30px;
	/*color: #646263;*/
	font-weight: 500;
	/*margin-left: 100px;*/

}

.huan{width: 343px;height: 415px;position: absolute; left: -305px; bottom: -50px;}
.huan img{max-width: 100%;}
.ying{width: 364px; height: 420px;position: absolute; right: -330px;bottom: -50px;}
.ying img{max-width: 100%;}
.hide{display:none;}
.pointer{cursor:pointer; outline:none;}
#tiBox{height:335px; overflow-y:auto;}
</style>
</head>
<body>
	<div class="max_box">
		<div class="outBox">
			<div class="logo">
				<a href="/" target="_self">
					<img src="img/logo.png"/>
				</a>
			</div>
			<p class="title"><?=$zy;?>入学测试题</p>
			<div  class="content_box">
				<h4 class="grpTit">
					<span id="grpTit_0">一、请保持轻松愉快的心情，认真回答以下<b id="c_0"></b>个问题，让我们一起解读一下你的性格优势吧！</span>
					<span id="grpTit_1">二、请认真回答以下<b id="c_1"></b>个问题，我们一起来发现你的潜质吧！</span>
				</h4>
				<dl id="tiBox">
					<dd data-sn="" data-filled="">

						<h5> 1.若有块地市养老用的房子，你会盖在哪？</h5>
						<ol class="xz"></ol>
						<div class="tiPicBox">
							<img id="tiPic" />
						</div>
					</dd>
				</dl>
			
				<div class="next">
					<button id="a1" class="pointer btn"></button>
					<button id="a2" class="pointer btn"></button>
					<button id="a3" class="pointer btn"></button>
				</div>
				<div class="huan">
					<img src="img/huan.png"/>
				</div>
				<div class="ying">
					<img src="img/ying.png"/>
				</div>
			</div>
			
		</div>
	</div>


<?php include FR_APP.APP_NAME.'/tpl/_bgmusic.tpl'; ?>

<script type="text/javascript" src="/pub/js/jquery.min.js" ></script>
<script type="text/javascript" src="/pub/js/jqui.vtp.js" ></script>
<script type="text/javascript">
function F(){}
F.id=function(id){return document.getElementById(id);}
F.ctl="/<?=CTL;?>";

F.idx_1;//上一个处理题的索引号
F.idx=0;//当前处理题的索引号

F.R={'t0':[], 't1':[]};

//设置切换
F.setChg=function()
{
	//上一题 
	F.id("a1").onclick=function()
	{
		//if(F._getData(F.idx));
		
		F.idx_1=F.idx--;
		F.show();
	}
	
	//下一题 
	F.id("a2").onclick=function()
	{
		if(F._getData(F.idx))
		{
			F.idx_1=F.idx++;
			F.show();
		}
		
	}
}

F.data=function(){

	return <?php echo $tis;?>;
	return [
		{
			'c':2,
			'tis':[
				{
					'tm':'吃西餐最先动那一道?',
					'img':'t0_2.jpg',
					'xx':[],
					'da':[1,2,3,4]
				}
				,{
					'tm':'如果你可以化为天空的一隅,希望自己成为什么呢? ',
					'img':'t0_3.jpg',
					'xx':[],
					'da':[1,2,3,4]
				}

			]
			
		}
		,{
			'c':2,
			'tis':[
				{	
					'tm':'以下哪个不是我国互联网服务提供商? ',
					'img':'t1_yun_0.jpg',
					'da':[0,1,0,0]
				}
				,
				{	
					'tm':'网络不可以使用的传输介质是？',
					'xx':['网线','光纤','绳子'],
					'da':[0,0,1],
				}
			]
			
		}


		
	];	
	
}

//生成题目 20181023
F.setTi=function()
{

	/*
	 * 生成题目
	 * index 题组索引：性格为0，专业题为1
	 * 
	 */
	var set_grpTi=function(data, index)
	{
		var i,j,html="",obj;
		//data=F.data();

		console.log(i);
		
		for(i=0; i<data[index]["c"]; i++)
		{
			obj=data[index]["tis"][i];//取回单元数据

			//标题 id='t"+i+"'
			html += "<dd data-grp='"+index+"' data-sn='"+i+"'><h5>"+(i+1)+". "+obj.tm+"</h5><ol class='xz'>";
			
			//选择项
			for(j=0; j<obj.da.length; j++)
			{
				html += "<label><li><input value='"+obj.da[j]+"' type='radio' name='t0_"+i+"'></li></label>";
			}
			html += "</ol>";

			//备选项
			if(obj.xx)
			{
				  html += "<ol class='xx'>";
				  for(j=0; j<obj.xx.length; j++ )
				  {
						html += "<li>"+obj.xx[j]+"</li>";
				  }
				  html += "</ol>";
			}

			//图片
			if(obj.img) html += "<div class='tiPicBox'><img data-_src='./img/tiImg/"+obj.img+"' onclick='F.big(this.src)' title='点击放大图片' /></div>";

			html += "</dd>";

		}

		return html;

	}

	$.msg.freeze(true, '正在生成数据，请稍等！');
	var data=F.data(), html="";
	html+=set_grpTi(data, 0);
	html+=set_grpTi(data, 1);

	
	F.id("c_0").innerHTML=data[0]['c'];
	F.id("c_1").innerHTML=data[1]['c'];

	F.id("tiBox").innerHTML=html;
	$.msg.freeze();

}

//取得做题的结果
F._getData=function(Fidx)
{
	var ti= F.id("tiBox").getElementsByTagName("dd")[Fidx]
	,ipts=ti.getElementsByTagName("ol")[0].getElementsByTagName('input')
	,val
	,bool=false
	,grp="t"+ti.getAttribute('data-grp')//数据组名
	,grpSn=ti.getAttribute("data-sn");//取得组内的序号
	
	for(var i=0; i<ipts.length; i++)
	{
		if(ipts[i].checked)
		{
			val=ipts[i].value;
			bool=true;
			break;
		}
	}
	
	if(bool==false){alert("请选择答案！");return;}

	F.R[grp][grpSn]=val;

	console.log(F.R);

	return true;
}


//控制显示20181023
F.show=function()
{
	//console.log(F.idx_1,F.idx);

	var tiLi=F.id("tiBox").getElementsByTagName("dd");
	
	//关闭上一个题的显示
	if(F.idx_1>=0)
		tiLi[F.idx_1].style.display="none";

	//控制当前大类的显示
	tiLi[F.idx].style.display="block";
	F.id("grpTit_0").style.display=tiLi[F.idx].getAttribute("data-grp")=="0"?"block":"none";

	//控制当前图片的加载
	var img = tiLi[F.idx].getElementsByTagName("img")[0];
	if(img && img.getAttribute("data-_src"))
	{
		img.src=img.getAttribute("data-_src");
		img.removeAttribute("data-_src");
	}
		
	//第一个题，关闭 上一题 按钮
	F.id("a1").style.display= F.idx<1 ? "none" : "block";
	 
	//最后一个题，关闭 下一题 按钮
	F.id("a2").style.display=(F.idx>(F.data()[0]['c']+F.data()[1]['c'])-2) ? "none" : "block";

	//最后一个题，关闭 下一题 按钮,开启 提交按钮
	if(F.idx>(F.data()[0]['c']+F.data()[1]['c'])-2)
	{
		F.id("a2").style.display="none";
		F.id("a3").style.display="block";
	}
	else
	{
		F.id("a2").style.display="block";
		F.id("a3").style.display="none";
	}

}

//提交数据 20181026
F.submit=function()
{
	F.id("a3").onclick=function()
	{
		if(F._getData(F.idx)==false){return;}
		if(confirm("您确定要提交测试数据吗？"))
		{
			$.msg.freeze(true);
			$.ajax({
				"url": F.ctl+"-ajx_tisSbt"
				,"data":F.R
				,"type":'post'
				,"dataType":'json'
				,"success":function(jn)
				{
					console.log(jn);
					//return;
					if(jn.status>0)
					{
						location=F.ctl+"-jieguo";
					}
					else
					{
						alert(jn.msg);
					}
					
				}
			})
			

			
		}
		
	}
	
}

//试题图片的最大化
F.big=function(src)
{
	var obj = document.getElementById("imgbox"),
		bigImg=document.getElementById("_bigPic");

	if(!obj)
	{
		obj=document.createElement("div");
		obj=document.body.appendChild(obj);
		obj.id="imgbox";
		obj.innerHTML="<img id='_bigPic' title='点击关闭' />";// onclick='F.big(false)'
		obj.onclick=function(){return F.big(false);};
		obj.style.cssText ="position:fixed;left: 0;top: 0;width: 100%;height: 100%;text-align:center; background: #000 no-repeat center center;background-size: contain;z-index: 99999; display: none;justify-content: center; align-items:center;";

		bigImg=document.getElementById("_bigPic");
		bigImg.style.cssText ="min-width:900px; max-width:80%; max-height:80%;";
	}

	
	
	if(src) {
		//obj.style.backgroundImage = "url("+src+")";
		bigImg.src=src;
		obj.style.display = "flex";
	} else {
		obj.style.display = "none";
	}
}






F.exc=function()
{
	F.setTi();
	F.show();
	F.setChg();
	F.submit();
}();

</script>
</body>
</html>
