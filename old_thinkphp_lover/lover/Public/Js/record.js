

function inputTipText(){

	$("input[class*=grayTips]") //所有样式名中含有grayTips的input
.each(function(){
   var oldVal=$(this).val();     //默认的提示性文本
   $(this)
   .css({"color":"#888"})     //灰色
   .focus(function(){
    if($(this).val()!=oldVal){$(this).css({"color":"#e95e95"})}else{$(this).val("").css({"color":"#888"})}
   })
   .blur(function(){
    if($(this).val()==""){$(this).val(oldVal).css({"color":"#888"})}
   })
   .keydown(function(){$(this).css({"color":"#e95e95"})})
  
})
}
$(function(){
inputTipText();    // OK，效果出来了
})


function sc1(){
	document.getElementById("Javascript.Div1").style.top=(document.documentElement.scrollTop)+"px";
	document.getElementById("Javascript.Div1").style.left=(document.documentElement.scrollLeft)+"px";
}
function scall(){
	sc1();sc2();sc3();sc4();sc5();
}
window.onscroll=scall;
window.onresize=scall;
window.onload=scall;

function setTab(m,n){
	var tli=document.getElementById("menu"+m).getElementsByTagName("li");
	var mli=document.getElementById("main"+m).getElementsByTagName("ul");
	for(i=0;i<tli.length;i++){
	   tli[i].className=i==n?"hover":"";
	   mli[i].style.display=i==n?"block":"none";
	}
	}







function changeOnline(num) {
	if (isNaN(num) && num == "")
		return;
	for (var i = 1; i <=6 ; i++)
	{
		if (i == num)
		{
			document.getElementById("onlineSort" + i).className = "online_bar expand";
			document.getElementById("onlineType" + i).style.display = "block";
		}
		else
		{
			document.getElementById("onlineSort" + i).className = "online_bar collapse";
			document.getElementById("onlineType" + i).style.display = "none";
		}
	}
}

$(document).ready(function(){
  $("#floatShow").bind("click",function(){
    $('#onlineService').animate({width: 'show', opacity: 'show'}, 'normal',function(){ $('#onlineService').show(); });$('#floatShow').attr('style','display:none');$('#floatHide').attr('style','display:block');
	return false;
  });
  $("#floatHide").bind("click",function(){
	$('#onlineService').animate({width: 'hide', opacity: 'hide'}, 'normal',function(){ $('#onlineService').hide(); });$('#floatShow').attr('style','display:block');$('#floatHide').attr('style','display:none');
  });
  $(document).bind("click",function(event){
	if ($(event.target).isChildOf("#online_qq_layer") == false)
	{
	 $('#onlineService').animate({width: 'hide', opacity: 'hide'}, 'normal',function(){ $('#onlineService').hide(); });$('#floatShow').attr('style','display:block');$('#floatHide').attr('style','display:none');
	}
  });
jQuery.fn.isChildAndSelfOf = function(b){
    return (this.closest(b).length > 0);
};
jQuery.fn.isChildOf = function(b){
    return (this.parents(b).length > 0);
};
  //$(window).scroll(function(){ 
	//$('#online_qq_layer').stop().animate({top:$(document).scrollTop() + $("#online_qq_layer").height()}, 100) 
  //}); 
});

