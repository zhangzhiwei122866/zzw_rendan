var secs =5; //倒计时的秒数     
var URL ;     
function Load(url){     
URL =url;     
for(var i=secs;i>=0;i--)     
{     
window.setTimeout('doUpdate(' + i + ')', (secs-i) * 1000);     
}     
}     
function doUpdate(num)     
{     
document.getElementById('ShowDiv').innerHTML = '系统将在'   +num+    '秒后自动跳转到' ;     
if(num == 0) { window.location=URL; }     
}     
Load("../index/__PUBLIC__/login"); //要跳转到的页面  