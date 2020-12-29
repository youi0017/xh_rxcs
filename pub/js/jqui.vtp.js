/*
	jquery-vtp-ui
	20180717
*/

jQuery.extend(
{
	//基础信息框 20180717
	msg:
	{
		freeze:function(iscover, msg)
		{
			var cvr=document.getElementById("__cover");
			if(!cvr)
			{
				cvr=document.createElement("div");
				cvr.style.cssText="position:fixed; left:0; top:0; width:100%; height:100%; background-color:rgba(30, 30, 30, 0.7); display:none; align-items:center; justify-content:center; z-index:1000;";
				
				cvr.id="__cover";
				cvr.innerHTML="<div id='__cvrbox'></div>";

				document.body.appendChild(cvr);
			}

			if(iscover)
			{
				cvr.style.display = "flex";
				if(!msg) msg="<div style='padding: 10px 20px; border-radius: 5px;color: #856404; background-color: #fff3cd;border-color: #ffeeba;'>正在处理，请稍后...</div>";
				document.getElementById("__cvrbox").innerHTML=msg;
			}
			else
			{
				cvr.style.display = "none";
			}
			
		}

		
	}



	
	
});