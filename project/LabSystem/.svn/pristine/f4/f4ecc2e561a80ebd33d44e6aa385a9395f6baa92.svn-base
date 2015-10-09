/**
 * 初始化设置
 * 
 * @author hjq
 * @date 2013-4-14
 */
$(function() {
	/* 初始化工作区窗口大小 */
	setWorkspace();
	$('#workspace').show();
	$(window).resize(setWorkspace);
	var curnav = $('#nav .actived').attr('id');
	$('#' + curnav + '_0').show();
	$('#' + curnav + '_0 dd').eq(0).addClass('selected');

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
 * @author hjq
 * @date 2013-4-14
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
 * @author hjq
 * @date 2013-4-14
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
 * @author hjq
 * @date 2013-4-14
 */
$('#back_btn').click(function() {
	$('.back_nav').fadeIn();
});
$('.close_float').click(function() {
	$('.back_nav').fadeOut();
});