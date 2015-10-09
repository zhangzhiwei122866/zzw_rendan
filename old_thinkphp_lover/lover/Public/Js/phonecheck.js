function pe()
  {  
	  var regu1=/^1[358][0-9]{9}$/;
	  var str1 = document.myform.phone.value;
	  var r1 = str1.match(regu1);	
	  if(document.myform.phone.value!="")
	  {
		 if(r1 == null)
		 {
		  document.getElementById("phone").innerHTML="请正确的输入手机号格式"; 
		 }else{
		  document.getElementById("phone").innerHTML="格式正确";
		 }
	  }else{
		  document.getElementById("phone").innerHTML="手机号不能为空";
	  }
  }
function pwd()
{  
	  var regu=/^[A-Za-z0-9]{6,100}$/;
	  var str = document.myform.password.value;
	  var r = str.match(regu);	
	  if(document.myform.password.value!="")
	  {
		  if(r == null)
		  {
			 document.getElementById("password").innerHTML="只能为数字或字母且不少于六位";
		  }else{
		  	 document.getElementById("password").innerHTML="格式正确";
		  }
	  }else{
	  		 document.getElementById("password").innerHTML="密码不能为空";
	  }
}
  function types(obj)
  {
	  if(obj=="phone")
	    document.getElementById("phone").innerHTML="";
	  if(obj=="password")
	    document.getElementById("password").innerHTML="";
	  
  }
  function register1()
  {
	 if(document.getElementById("phone").innerHTML!="格式正确" || document.getElementById("password").innerHTML!="格式正确")
		   {
		 alert("您输入的信息有误，请重新填写");
		 		return false;
		   }else{
			    return true;}
  }