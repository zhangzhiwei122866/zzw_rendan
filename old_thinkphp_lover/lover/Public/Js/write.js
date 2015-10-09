
function sc1(){
	document.getElementById("Javascript.Div1").style.top=(document.documentElement.scrollTop)+"px";
	document.getElementById("Javascript.Div1").style.left=(document.documentElement.scrollLeft)+"px";
}
function scall(){
	sc1();
}
window.onscroll=scall;
window.onresize=scall;
window.onload=scall;



