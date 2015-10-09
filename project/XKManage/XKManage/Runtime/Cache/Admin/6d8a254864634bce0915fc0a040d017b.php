<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<script type="Text/Javascript" language="JavaScript">
<!--
var pic = new Image();
pic.src="images/arrow_right.gif";
function toggleMenu()
{
frmBody = parent.document.getElementById('frame-body');
imgArrow = document.getElementById('img');
if (frmBody.cols == "0, 10, *")
{
frmBody.cols="270, 10, *";
imgArrow.src = "images/arrow_left.gif";
}
else
{
frmBody.cols="0, 10, *";
imgArrow.src = "images/arrow_right.gif";
}
}
var orgX = 0;
document.onmousedown = function(e)
{
var evt = Utils.fixEvent(e);
orgX = evt.clientX;
if (Browser.isIE) document.getElementById('tbl').setCapture();
}
document.onmouseup = function(e)
{
var evt = Utils.fixEvent(e);
frmBody = parent.document.getElementById('frame-body');
frmWidth = frmBody.cols.substr(0, frmBody.cols.indexOf(','));
frmWidth = (parseInt(frmWidth) + (evt.clientX - orgX));
frmBody.cols = frmWidth + ", 10, *";
if (Browser.isIE) document.releaseCapture();
}
var Browser = new Object();
Browser.isMozilla = (typeof document.implementation != 'undefined') && (typeof document.implementation.createDocument != 'undefined') && (typeof HTMLDocument != 'undefined');
Browser.isIE = window.ActiveXObject ? true : false;
Browser.isFirefox = (navigator.userAgent.toLowerCase().indexOf("firefox") != - 1);
Browser.isSafari = (navigator.userAgent.toLowerCase().indexOf("safari") != - 1);
Browser.isOpera = (navigator.userAgent.toLowerCase().indexOf("opera") != - 1);
var Utils = new Object();
Utils.fixEvent = function(e)
{
var evt = (typeof e == "undefined") ? window.event : e;
return evt;
}
//--> 
</script>
<style type="text/css"> 
body{margin:0px;padding:0px;height:400px;background:#7AB9F0;}
</style>
</head>
<body>
<table id="tbl" cellspacing="0" cellpadding="0" height="100%">
<tr>
<td>
<a href="javascript:toggleMenu();">
<img id="img" border="0" width="10" height="30" src="images/arrow_left.gif">
</a>
</td>
</tr>
</table>
</body>
</html>