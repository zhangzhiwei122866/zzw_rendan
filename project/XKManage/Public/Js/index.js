/**
 * 初始化设置
 * 
 * @author dxk
 * @date 2011-10-22
 */
$(function() {
	/* 初始化工作区窗口大小 */
	setWorkspace();
	$('#workspace').show();
	$(window).resize(setWorkspace);
	var curnav = $('#nav .actived').attr('id');
	$('#' + curnav + '_0').show();
	$('#' + curnav + '_0 dd').eq(0).addClass('selected');

	/* 全选操作 */
	$('.checkall').click(function() {
		$('.checkitem').attr('checked', this.checked);
	});
	/* 批量操作按钮 */
	if ($('#batchAction').length == 1) {
		$('.batchButton').click(
				function() {
					/* 是否有选择 */
					if ($('.checkitem:checked').length == 0) { // 没有选择
						return false;
					}
					/* 运行presubmit */
					if ($(this).attr('presubmit')) {
						if (!eval($(this).attr('presubmit'))) {
							return false;
						}
					}
					/* 获取选中的项 */
					var items = '';
					$('.checkitem:checked').each(function() {
						items += this.value + ',';
					});
					items = items.substr(0, (items.length - 1));
					/* 将选中的项通过GET方式提交给指定的URI */
					var uri = $(this).attr('uri');
					window.location = uri + '&' + $(this).attr('name')
							+ '=' + items;
				});
	}
});

/**
 * 设置工作区窗口大小
 * 
 * @author dxk
 * @date 2011-10-22
 */
var setWorkspace = function() {
	var wWidth = $(window).width();
	var wHeight = $(window).height();
	$('#workspace').width(
			wWidth - $('#left').width()
					- parseInt($('#left').css('margin-right')));
	$('#workspace').height(wHeight - $('#head').height());

};

/**
 * 后台主导航控制
 * 
 * @author dxk
 * @date 2011-10-22
 */
$('#nav .link').click(function() {
	$('#nav .actived').removeClass('actived');
	$(this).addClass('actived');
	var tid = this.id;
	$('.submenu').hide();
	$('#' + tid + '_0').show();
	$('.submenu .selected').removeClass('selected');
	$('#' + tid + '_0 dd').eq(0).addClass('selected');
	var whref = $('#leftMenus .selected a').attr('href');
	$('#workspace').attr('src', whref);
});

/**
 * 后台导航下拉菜单
 * 
 * @author dxk
 * @date 2011-10-22
 */
$('#back_btn').click(function() {
	$('.back_nav').fadeIn();
});
$('.close_float').click(function() {
	$('.back_nav').fadeOut();
});

/**
 * 删除操作提示框
 * 
 * @author dxk
 * @date 2011-11-29
 */
var drop_confirm = function(msg, url) {
	if (confirm(msg)) {
		if (url == undefined) {
			return true;
		}
		window.location = url;
	} else {
		if (url == undefined) {
			return false;
		}
	}
};
/**
 * 编辑操作
 * 
 * @author dxk
 * @date 2011-11-29
 */
var edit = function(obj, name, id, uri) {
	var tag = obj.firstChild.tagName;
	if (typeof (tag) != "undefined" && tag.toLowerCase() == "input") {
		return;
	}
	var oldvalue = obj.innerHTML;
	var txt = document.createElement("input");
	txt.value = oldvalue;
	// 设置input的宽度
	txt.style.width = (obj.offsetWidth + 12) + "px";
	// 隐藏对象中的内容，并将输入框加入到对象中
	obj.innerHTML = "";
	obj.appendChild(txt);
	txt.focus();
	// 编辑区失去焦点的处理函数
	txt.onblur = function() {
		var newvalue = txt.value;
		if ($.trim(newvalue) == $.trim(oldvalue)) {
			obj.innerHTML = oldvalue;
			return;
		}
		$.ajax({
			url : uri,
			type : "GET",
			dataType : "json",
			data : {
				name : name,
				id : id,
				value : newvalue
			},
			error : function() {
				alert('系统错误');
			},
			success : function(data) {
				if (data['status']) {
					obj.innerHTML = data['data'];
				} else {
					alert(data['info']);
				}
			}
		});
	};
};
/**
 * 改变状态操作
 * 
 * @author dxk
 * @date 2011-11-29
 */
var changeStatus = function(obj, name, id, uri) {
	if (obj.src.match(/loader.gif/i)) {
		return false;
	}
	var value = (obj.src.match(/yes.gif/i)) ? 0 : 1;
	$.ajax({
		url : uri,
		type : "GET",
		dataType : "json",
		global : false,
		data : {
			name : name,
			id : id,
			value : value
		},
		beforeSend : function() {
			obj.src = "/Public/Images/icon/loader.gif";
		},
		error : function() {
			alert('系统错误');
		},
		success : function(data) {
			if (data['status']) {
				obj.src = (value == 0) ? "/Public/Images/icon/no.gif"
						: "/Public/Images/icon/yes.gif";
			} else {
				alert('系统错误');
			}
		}
	});
};