 function isempty()
  {
	  if(document.registerf.password.value=="")
		  document.getElementById("pwd").innerHTML="原密码不能为空";
  }
  function isemp()
  {   
	  var regu=/^[A-Za-z0-9]{6,100}$/;
	  var str = document.registerf.repassword.value;
	  var r = str.match(regu);	
	  if(r == null)
		  document.getElementById("repwd").innerHTML="只能为数字或字母且不少于六位"; 
  }
 
  function isUsername()
  {
	  if(document.registerf.account_name.value=="")
	     document.getElementById("name").innerHTML="用户名不能为空";
  }
  function types(obj)
  {
	  if(obj=="name")
	    document.getElementById("name").innerHTML="";
	  if(obj=="pwd")
	    document.getElementById("pwd").innerHTML="";
	  if(obj=="repwd")
		 document.getElementById("repwd").innerHTML="";
  }
  function register()
  {
	 if(document.getElementById("name").innerHTML!="" || document.getElementById("pwd").innerHTML!="" || document.getElementById("repwd").innerHTML!="")
		   {alert("信息有误,请重新输入");
		   return false;}
		   else
			   return true;
  }