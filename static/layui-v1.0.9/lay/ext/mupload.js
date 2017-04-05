layui.define(['element', 'jquery', 'layer'] , function(exports){
	"use strict";

var element = layui.element(),
 	$ = layui.jquery;

var msgConf = {
	icon: 2
	,shift: 6
};

function guid() {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = Math.random()*16|0, v = c == 'x' ? r : (r&0x3|0x8);
        return v.toString(16);
    });
}

var MUpload = function(options){
	this.options = {
		//上传路径
		url:'',
		//服务器接收的名称
		file_name:'file',
		//容器名称
		container:'',
		//回调函数
		complete:function(){},
	};
	//存储当前需要上传的文件
	this.fileobj = {};
	//存储上传后服务器返回的结果
	this.ress = [];
	
	this._attr = {
		////记录上传完毕的文件份数（不管文件是否上传成功）
		upload_count:0,
	};
	//设置参数
	for(var k in this.options){
		options[k] && (this.options[k] = options[k]);
	}
};

function delFile(mpdobj, key){
	if (!mpdobj) {return;}
	//若没有key，则删除所有的file
	if (!key) {
		for(var k in mpdobj.fileobj){
			delete mpdobj.fileobj[k];
		}
		change_del_btn(mpdobj.options.container+' .layui-mupload-submit', 0);
		return;
	}
	if(!(key in mpdobj.fileobj)){return;}
	delete mpdobj.fileobj[key];
	$('#'+key).remove();
	change_del_btn(mpdobj.options.container+' .layui-mupload-submit', Object.keys(mpdobj.fileobj).length);
}

function addFile(mpdobj, flist){
	if (!flist) {return;}
	var options = mpdobj.options,
		len = Object.keys(mpdobj.fileobj).length;
	
	if(len == 0){$(options.container + ' tbody').empty();}
	for (var i = 0; i < flist.length; i++) {
		var key = guid();
		mpdobj.fileobj[key] = flist[i];
		add_file_item(options.container, key, mpdobj.fileobj[key].name);
	}

	change_del_btn(options.container+' .layui-mupload-submit', Object.keys(mpdobj.fileobj).length);
}

function change_del_btn(obj, index){
		index && $(obj).removeClass('layui-btn-disabled') || $(obj).addClass('layui-btn-disabled');
	}

function add_file_item(container, key, name){
	var tr=[];
		tr.push('<tr id="'+key+'">');
		tr.push('<td>'+ name + '</td>');
		tr.push('<span>'+name+'</span>');
		tr.push('<td><div class="layui-progress" lay-filter="'+key+'">');
		tr.push('<div class="layui-progress-bar" lay-percent="0%"></div>');
		tr.push('</div></td>');
		tr.push('<td class="layui-icon-status">');
		tr.push('<i class="layui-icon layui-item-wait" style="font-size: 20px;color: #808080;">...</i>');
		tr.push('<i class="layui-icon layui-item-going" style="font-size: 20px;display:none;color: #808080;">&#xe63d;</i>');
		tr.push('<i class="layui-icon layui-item-success" style="font-size: 20px;display:none;color: #5FB878;">&#xe610;</i>');
		tr.push('<i class="layui-icon layui-item-error" style="font-size: 20px;display:none;color: #FF5722;">&#x1007;</i>');
		tr.push('</td>');
		tr.push('<td><a id="del-item-'+key+'" class="layui-btn layui-btn-primary layui-btn-mini del-item" data-itemid="'+key+'"><i class="layui-icon">&#xe640;</i></a></td>');
		tr.push('</tr>');
		$(container + ' tbody').append(tr.join(''));
}
function changeIconCss(key,item, st){
		$('#'+key+' .layui-icon-status i').css({'display':'none'});
		$('#'+key+' .layui-icon-status .layui-item-'+item).css({'display':'block'});
		st && st == 1 && $('#' + key + ' .layui-progress-bar').addClass('layui-bg-red');
	}


MUpload.prototype.upload = function(formobj, key){
	var stop = 1,
		that = this,
		options = that.options;

	function s(res){
		if(typeof res.code && res.code == 0){
			changeIconCss(key,'success');
		}else{
			changeIconCss(key,'error', 1);
		}
		that.ress.push(res);
		complete();
	}
	function complete(){
		stop = 0;
		element.progress(key, '100%');
		that._attr.upload_count++;
	}
	function e(xhr, error, obj){
		changeIconCss(key,'error', 1);
		complete();
	}
	var settings = {
	  url: options.url,
	  type:'post',
	  data: formobj,
	  success: s,
	  processData:false,
	  contentType:false,
	  dataType: 'json',
	  error:e,
	}
	var n = 0, timer = setInterval(function(){
		//等待上传
		if(stop){
			n = n + Math.random()*10|0;
			if (n>96) {
				clearInterval(timer);
				n = 96;
			}
			element.progress(key, n+'%');
		}
		else{
			clearInterval(timer);
		}
	},30);
	$.ajax(settings);
}

function initTable(otableid){
	var thead = [];
		thead.push('<thead>');
		thead.push('<tr><th class="layui-elip">');
		thead.push('<span>文件名</span>');
		thead.push('<div class="layui-box layui-upload-button layui-upload-button-small">');
		thead.push('<input class="layui-mupload-file" name="" value="" lay-title="批量上传" multiple="multiple" type="file">');
		thead.push('<span class="layui-upload-icon"><i class="layui-icon">&#xe608;</i>添加文件</span>');
		thead.push('</div>');
		thead.push('&nbsp;<a class="layui-btn layui-btn-disabled layui-upload-button-small layui-mupload-submit"><i class="layui-icon">&#xe62f;</i>上传文件</a>');
		thead.push('</th>');
		thead.push('<th>进度条</th>');
		thead.push('<th>状态</th>');
		thead.push('<th>操作</th>');
		thead.push('</tr></thead>');
	$(otableid).append(thead.join(''));
	$(otableid).append('<tbody></tbody>');
}

MUpload.prototype.action = function(){
	var that = this,
		fileobj = that.fileobj,
		options = that.options;
	that.ress = [];
	that._attr.upload_count = 0;

	var timer = setInterval(function(){
		//判断所有文件是否已上传完毕
		if (that._attr.upload_count == Object.keys(fileobj).length) {
			clearInterval(timer);
			delFile(that);
			//所有文件上传操作完毕后，执行回调函数
			typeof options.complete === 'function' && options.complete(that.ress);
		}	
	}, 10);
	
	var uForm = new FormData(),
		file_name = options.file_name;

	for(var key in that.fileobj){
		uForm.append(file_name, fileobj[key]);
		change_del_btn('#del-item-'+key, 0);
		changeIconCss(key,'going');
		that.upload(uForm, key);
	}
}

MUpload.prototype.init = function(){
 	if(!$(this.options.container)[0]){
 		layer.msg('container 不存在', msgConf);
 		return;
 	}
	var that = this, options = that.options;
	initTable(options.container);

	//删除文件
	$(options.container).on('click', '.del-item', function(e){
		var key = $(this).data('itemid');
		delFile(that, key);
	});

	//添加文件
	$(options.container).on('change','.layui-mupload-file', function(e){
		if(!this.files || this.files.length == 0){
			return;
		}
		addFile(that, this.files);
	});

	//上传文件
	$(options.container).on('click', '.layui-mupload-submit', function(){
		if (!Object.keys(that.fileobj).length) {return;}
		change_del_btn(this,0);
		that.action();
	});
 }
	//暴露接口
  exports('mupload', function(options){
    var mupload = new MUpload(options = options || {});
    mupload.init();
  });
})