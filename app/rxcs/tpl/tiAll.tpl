<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<title>新生入学测试系统试题及答案</title>
<base href="/<?=APP_NAME;?>/" target="_blank">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/pub/css/bootstrap.min.css"/>
<style type="text/css">
body{ background-color:#F3F3F3;}
#tby{max-width:720px; margin:0px auto; padding:15px; background-color:#FFF;}
ul{margin:20px 0; padding:15px 0; background-color: #FFF;}
li{
    line-height: 3.5;
    list-style-type: none;
    /*list-style-position: inside;*/
    font-size: 18px;
	
}
li:nth-child(odd){background-color: #F5F5F5;}
li a{display: block;}
li a:hover{color:#F00; text-decoration:none;}

.f_r{float:right;}
</style>
</head>
<body>
<div id="tby">
<!--<h3 class="text-center">河南新华电脑学院</h4>-->
<h4 class="text-center">新生入学测试系统试题及答案</h4>
	<ul>
		<?php if(!empty($zys)){ ?>
			<?php $i=1; foreach( $zys as $k => $v ){ ?>	
				<li>
					<a href="/<?=CTL;?>-x?tkey=<?=$k;?>">
						<?php echo $i.'. '.$v; ?>
						<b class="f_r">》</b>
					</a>
				</li>
			<?php $i++; } ?>	
		<?php } ?>

	</ul>
</div>




<script type="text/javascript" src="/pub/js/jquery.min.js" ></script>
<script type="text/javascript" src="/pub/js/jqui.vtp.js" ></script>
<script type="text/javascript">
function F(){}
F.id=function(id){ return document.getElementById(id); }
F.ctl="/<?=CTL;?>";





</script>	
</body>
</html>