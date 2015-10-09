function confirm()
{
	var a=document.getElementById("user").value;
	var b=document.getElementById("op").value;
	if(a=="")
	{
		alert("用户名不能为空！");
		return false;
	}else if(b=="")
	{
		alert("研究方向不能为空！");
		return false;
	}
}