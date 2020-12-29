/*
	示例：
	$.msg.html(true, '出错了');
	$.msg.process(true);

*/
jQuery.extend(
{
	//信息框
	"msg": 
	{
		//内容
		"html": function(isOpen, html)
		{
			if(!html) html="<h3>正中执行中 ...</h3>";
			var __cover = document.getElementById("__cover");
			
			if(!__cover)
			{
				var _new = document.createElement("div");
				_new.id = "__cover";
				
				//_new.style.height = document.body.scrollHeight+"px";
				_new.innerHTML='<div id="__freeze"></div><div id="__msg">'+html+'</div>';
				__cover = document.body.appendChild(_new);
			}
			else
			{
				document.getElementById("__msg").innerHTML=html;
			}

			__cover.style.display = isOpen ? "flex" : "none";
		}		
		//进度条
		,"process": function(isOpen)
		{
			this.html(isOpen, "<img src='/pub/pic/doing.gif'>");
			
		}
	}
}); 
