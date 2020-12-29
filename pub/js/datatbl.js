/**
 * 生成datagrid的方法封装
 * @param target obj|string dgtbl盒子对象
 * @param url string 请求数据URL
 * //@param _key string 数据主键key(数据索引) 20170721 取消
 * @param _sn number 分页的显示条数
 * @param _fun function 回调函数(ajax取数据的回调函数)
 * 
 * 
 	示例：
	 	var tbl = new datatbl($("#p"), "./json/myjn1.json");
		tbl.setConf({
			"title": "my datatbl"
			, "singleSelect": false//单行选择(on)
			, "pagination": true//页码控件（off）
			, "columns": [[
				{field:'itemid',title:'itemid2',width:80, },    
	        	{field:'productid',title:'productid2',width:100},    
	        	{field:'attr1',title:'attr12',width:250, editor:"text"}
			]]
		});
		tbl.setTbl();
 * 
 * 20160922 chy
 */

function datatbl(target, url, _sn, _fun)
{
	this.target = typeof(target)=="object" ? target : $("#"+target);
	this.url = url;
	this.sn = _sn || 5;
	this.pn = 1;
	this._fun = _fun;

	/*当前编辑的行号*/
	this.edit_index = undefined;

	//Tbl默认配置
	this.cnf = {
		//"data": data_json,//数据
		//columns: []//列配置
		
		"striped": true//斑马线效果(on)
		, "rownumbers": true//显示行号(on)
		, "singleSelect": true//单行选择(on)
		, "pagination": false//页码控件（off）

		, "fitColumns": false//列宽自动适应(off)
		, "autoRowHeight": false//行高自动适应(off)
		, "nowrap": true//同行中显示数据(on)

		//,"collapsible": true//可折叠
		//,"closable": true//可关闭

		/*注意：ctrlSelect:true时singleSelect:false将无效*/
		, "ctrlSelect": true
		, "loadMsg":"正在加载数据..."
	};
	
}


/**
 * 设置 或 取得 编辑行索引
 * @edtIdx 行索引 如有则设置，否则反回值
 * 20170515
 */
datatbl.prototype.rowEdtIdx = function(edtIdx)
{
	this.endEdit();//20171024加入
	if(edtIdx!=undefined) this.edit_index=edtIdx;
	return this.edit_index;
}

/*
 * 生成表格配置
 * 20160921
 */
datatbl.prototype.setConf = function(_cnf)
{
	var _this = this;
	
	//配置转换
	for(var k in _cnf){_this.cnf[k]=_cnf[k];}
	//console.log(_this.cnf);

	//20160511 chy 默认单元格双击事件=>编辑
	if(!_cnf["onDblClickRow"])
	{
		_this.cnf["onDblClickRow"]=function(index, field, value)
	    {
		    _this.endEdit();
		    _this.target.datagrid('beginEdit', index);
	        //_this.edit_index=index;
	        _this.rowEdtIdx(index);
		}
	}

	//生成配置的表格(此时无数据)
	_this.target.datagrid(_this.cnf);

	//esc关闭编辑20161004
	$(window).keydown(function(evt)
	{
		var code = evt.keyCode || evt.which;
		if(code-0==27) _this.endEdit()
	});

}




/**
 * 公共方法：生成datatbl公共方法
 * 用于生成初始的datatbl数据表
 * @param json cols_json columns配置数据,与easyui的columns要求相同，例如下：
		cols_json=[[
				{field:'checkbox',width:50,checkbox:true},
				{field:'id',title:'调研ID',width:50},
				{field:'promoter',title:'表创建者',width:70},
				{field:'start_dtime',title:'开始日期',width:100},
		]];

 * 
 */
datatbl.prototype.setTbl = function(_data)
{
	//_data：直接加载数据
	if(typeof(_data)=="object")
	{
		this.target.datagrid('loadData', _data);
		return;
	}

	//ajx请求数据
	this.setPtbl(this.sn, this.pn);
	if(this.cnf.pagination) this._setpager();
}


//结束(单元格)编辑 is_refresh_last_row
// TRUE：上次编辑的将不保存，用于ESC的效果
// FALSE: 不刷新将临时保存编辑的内容，提交后写入数据库生效，用于Enter和点击行效果
datatbl.prototype.endEdit =function(is_refresh_last_row)
{
	//console.log(this.edit_index);
	if( this.edit_index==undefined ) return;
    
    //刷新上次编辑行
    if(is_refresh_last_row) this.target.datagrid("refreshRow", this.edit_index);
    
    //结束上次编辑行的编辑状态
    //console.log(this.target);//用于测试实例化后是否冲突
    this.target.datagrid("endEdit", this.edit_index);
    this.edit_index = undefined;
}


/*
 * 设置分页信息
 * $param void
 * $return void
 * 
 * 20160414 chy
*/
datatbl.prototype._setpager = function()
{
	var _this=this;
	var pager = _this.target.datagrid().datagrid('getPager');
	$(pager).pagination(
	{
        "pageSize": _this.sn,//每页显示的记录条数，默认为5 
        "pageList": [_this.sn*1,_this.sn*2,_this.sn*3],//可以设置每页记录条数的列表 
        "beforePageText": '第',//页数文本框前显示的汉字 
        "afterPageText": '页，共 {pages} 页', 
        "displayMsg": '当前显示 {from} - {to} 条记录，共 {total} 条记录', 
		//定义"显示记录条数"和"页码"的事件，用于分页
        "onSelectPage": function(pn, sn)
        {
	        if(console) console.info("转到：第["+pn+"]页，显示["+sn+"]条");
			//发送"页数"和"显示页数"从数据库中查询数据，并更新到datagrid
			_this.setPtbl(sn, pn);
        }
    });
}

/*
 * 取得分页数据
 * $param int sn 页码数
 * $param int pn 显示页数
 * $return void
 * 
 * 20160921 chy
*/
datatbl.prototype.setPtbl = function(sn, pn)
{
	if(!this.url || !sn || !pn ) return;
	//私用对象
	var _this = this;
	this.pn = pn;
	var urlMk= _this.url.indexOf("?")==-1 ? "?" : "&";
	//console.log(_this.url);

	//$.messager.progress(); 
	datatbl.freeze(true);//return;
	$.ajax({
		"type": "get"
		, "dataType": "json"
		, "async": true
		//, "async": false
		//, "data": "pn="+pn+"&sn="+sn
		, "url": _this.url+urlMk+"pn="+pn+"&sn="+sn
		, "success": function(jn)
		{
			//console.log(jn);
			//$.messager.progress("close"); 
			if(jn.status<1){top.alert(jn.msg);return;}


			datatbl.freeze();

			_this.target.datagrid('loadData', (jn.data || []) );

			//启用回调函数
			//if(typeof _this._fun=="function") _this._fun.call(_this);
			//if(typeof _this._fun=="function") _this._fun.apply(_this, jn.data);
			if(typeof _this._fun=="function") _this._fun(jn.data);
		}
	});
}


//重载数据
datatbl.prototype.reload =function()
{
	//this.target.datagrid('reload');
	this.setPtbl(this.sn, this.pn);
}




//所有被选中的行，当没有记录被选中的时候将返回一个空数组
datatbl.prototype.getSelects =function()
{
	var rows = this.target.datagrid("getSelections");
	if(rows.length<1)
	{
		alert("请先选择数据，再执行操作！");
		return;
	}
	
	return rows;
}



//返回当前JQ对象 20170808
datatbl.prototype.getJQ =function(){return this.target;}


//删除选中行
//返回key的集合，如id1,id2,id3
datatbl.prototype.delSelects =function(pk)
{
	//设定主键
	if(!pk) pk="id";

	var rows = this.getSelects();
	if(!rows) return;
	//console.log(rows);

	//存储选择行ID的数组
	var i=0,lth=rows.length,rowIdxs=[];
	for(;i<lth;i++)
	{
		this.target.datagrid("deleteRow", this.target.datagrid("getRowIndex", rows[i]));
		if(rows[i][pk]) rowIdxs.push(rows[i][pk]);
	}

	//console.log(rowIdxs);
	return rowIdxs.length<1 ? '' : rowIdxs.join(",");
}


//接受更改：保存数据
datatbl.prototype.accChg =function()
{
	this.target.datagrid("acceptChanges");
}

//重做
datatbl.prototype.redo =function()
{
	this.target.datagrid("rejectChanges");
}


//取得更改的行
/**
 * @param type string 改变行的类型: 为false类值，取出全部，否则输入：inserted,deleted,updated
 * @param alert bool 控制输出打印信息
 * @return false || rows
 * 20170616
 */
datatbl.prototype.getChanges =function(type, isAlert)
{
	if(!type) type=undefined;
	this.endEdit();
	var rows = this.target.datagrid("getChanges", type);

	if(rows.length<1)
	{
		if(isAlert) alert("没有数据被更改，操作被禁止！");
		return false;
	}
	
	//console.log(rows);
	return rows;
}


//增加一行
datatbl.prototype.addrow =function(row)
{
	//新加行的索引
	var i = this.target.datagrid("getRows").length;
	console.info("增加一行，行号："+i);

	//增加行
	this.target.datagrid("insertRow", {
		"index": i
		, "row": row
	});

	//关闭原有编辑行，开启新行的编辑
	this.endEdit();
	this.target.datagrid('beginEdit', i);
	this.edit_index = i;
}

//遮盖层 20180723
datatbl.freeze=function(iscover, msg)
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
		if(!msg) msg="<div class='alert alert-warning'>正在请求数据，请稍后...</div>";
		document.getElementById("__cvrbox").innerHTML=msg;
	}
	else
	{
		cvr.style.display = "none";
	}
	
}


