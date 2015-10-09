function pe()
  {  
	  var regu=/^1[358][0-9]{9}$/;
	  var str = document.myform.phone.value;
	  var r = str.match(regu);	
	  if(document.myform.phone.value!="")
	  {
		 if(r == null)
			 document.getElementById("phone").innerHTML="* 请正确的 输入 手机号 格式"; 
		 else
			 document.getElementById("phone").innerHTML="格式正确";
		 	
	  }else
	  	   {
			document.getElementById("phone").innerHTML="* 手机号 不能 为空";
		   }
  }
function Fpe()
{  
	  var regu1=/^1[358][0-9]{9}$/;
	  var str1 = document.myform.Fphone.value;
	  var r1 = str1.match(regu1);	
	  if(document.myform.Fphone.value!="")
	  {
		 if(r1 == null)
			 document.getElementById("Fphone").innerHTML="* 请正确的 输入 手机号 格式"; 
		 else
		 	 document.getElementById("Fphone").innerHTML="格式正确";
		 	
	  }
	  else
	  		{
			document.getElementById("Fphone").innerHTML="* 手机号 不能 为空";
			}
}
function na()
{  
	  var regu2=/^(?!_)(?!.*?_$)[a-zA-Z0-9_\u4e00-\u9fa5]+$/;
	  var str2 = document.myform.username.value;
	  var r2 = str2.match(regu2);	
	  if(document.myform.username.value!="")
	  {
		 if(r2 == null)
			 document.getElementById("username").innerHTML="* 以汉字、数字、字母、下划线 不能<br/>&nbsp;&nbsp;&nbsp;以下划线 开头 和结尾 组成"; 
		 else
		 	 document.getElementById("username").innerHTML="格式正确";
		 	
	  }
	  else
	  		{
			 document.getElementById("username").innerHTML="* 昵称 不能 为空";
			}
}
function pwd()
{  
	  var regu3=/^[A-Za-z0-9]{6,100}$/;
	  var str3 = document.myform.password.value;
	  var r3 = str3.match(regu3);	
	  if(document.myform.password.value!="")
	  {
		  if(r3 == null)
			    document.getElementById("password").innerHTML="* 只能为 数字 或 字母 且 不少于 六位";
		  else
		  		document.getElementById("password").innerHTML="格式正确"; 
	  }
	  else
		  {
		   document.getElementById("password").innerHTML="* 密码 不能 为空";
		  }
}
function repwd()
{  
	  var regu4=/^[A-Za-z0-9]{6,100}$/;
	  var str4 = document.myform.repassword.value;
	  var r4 = str4.match(regu4);	
	  if(document.myform.repassword.value!="")
	  {
		  if(r4 == null)
		  {
			   document.getElementById("repassword").innerHTML="* 只能为 数字 或 字母 且 不少于 六位";
		  }else{		 
		     if(document.myform.repassword.value==document.myform.password.value){
				  document.getElementById("repassword").innerHTML="两次密码一致";
		     }else{
			  	  document.getElementById("repassword").innerHTML="* 两次 密码 不一致";}
		  }
	  	}
	  else
	  {
	  	document.getElementById("repassword").innerHTML="* 密码 不能 为空";
	  }
}
function mal()
{
	var regu5=/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
	  var str5 = document.myform.mail.value;
	  var r5 = str5.match(regu5);	
	  if(document.myform.mail.value!="")
	  {
		  if(r5 == null)
			    document.getElementById("mail").innerHTML="* 请正确填写邮箱格式";
		  	else
		  		document.getElementById("mail").innerHTML="格式正确"; 
	  }
	  else
	  {
	  		  document.getElementById("mail").innerHTML="* 邮箱不能为空";
	  }
}
  function types(obj)
  {
	  if(obj=="username")
		    document.getElementById("username").innerHTML="";
	  if(obj=="phone")
	    document.getElementById("phone").innerHTML="";
	  if(obj=="Fphone")
		    document.getElementById("Fphone").innerHTML="";
	  if(obj=="password")
	    document.getElementById("password").innerHTML="";
	  if(obj=="repassword")
		    document.getElementById("repassword").innerHTML="";
	  if(obj=="mail")
		    document.getElementById("mail").innerHTML="";
  }
  function register()
  {
	 if(document.getElementById("username").innerHTML!="格式正确" || document.getElementById("mail").innerHTML!="格式正确" || document.getElementById("repassword").innerHTML!="两次密码一致" || document.getElementById("phone").innerHTML!="格式正确" || document.getElementById("Fphone").innerHTML!="格式正确" || document.getElementById("password").innerHTML!="格式正确")
		   {
		 		alert("您输入的信息有误，请重新填写");
		 		return false;}
	 else
			    return true;
  }