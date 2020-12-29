<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<title><?=$zys[$tkey];?>试题及答案-新生入学测试系统</title>
<base href="/<?=APP_NAME;?>/" target="_blank">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/pub/css/bootstrap.min.css"/>
<style type="text/css">
#tby{max-width:720px; margin:0 auto; padding:15px; background-color:#FDFDFD;}
dl{margin:20px 0; padding:15px 10px; border:1px dashed #FFF; border-bottom:1px dashed #888; box-sizing:border-box; }
dl:hover{border-color:red; cursor:pointer;}
.da{display:block; margin-top:15px; color:red; }
dl img{display: block; max-width:100%; max-height:350px;}
</style>
<title><?=$zys[$tkey];?>专业 试题及答案</title>
</head>
<body>
<div id="tby">
<h4 class="text-center"><?=$zys[$tkey];?>专业 试题及答案</h4>
<?php $i=1; $A=65; foreach( $dArr as $row ){ ?>	
	<dl>
		<dt class="h5"><?=$i.'. '.$row['tm'];?></dt>
		<?php if(!empty($row['xx'])){ ?>
			<?php $j=0; foreach( $row['xx'] as $v ){ ?>	
				<dd><?php echo chr($A+$j).'. '.$v; $j++;?></dd>
			<?php } ?>	
		<?php } ?>

		<?php if(!empty($row['img'])){ ?>
			<img src="./img/tiImg/<?=$row['img'];?>" />
		<?php } ?>

		<dd>
			<b class="da">答案是：<?php echo chr($A+$da($row['da']));?></b>
		</dd>

	</dl>
<?php $i++; } ?>
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