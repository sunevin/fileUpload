<?php
/*	setcookie("name","wang",time()+60*60*1,'./upload','.wgn.com',1);
	setcookie("email","sun_evin@163.com");
	setcookie("password",md5(123456));
	print_r($_COOKIE);
	echo "<br/>";
	foreach ($_COOKIE as $key=>$value)
	{
		echo $key.".".$value."<br>";
	}
	setcookie("isLogin","",time()-1);
	print_r($_COOKIE);	*/
/*	function clearCookies(){
	setcookie("username","",time()-1);
		if($_GET["action"]=="login")
			{
			clearCookies();
			if ($_POST["username"]="admin"&&$_POST["password"]=="123456")
			{
				setcookie('username',$_POST['username'],time()+60*60*24*7);
				setcookie("isLogin",'1',time()+60*60*24*7);
				header("Location:index.php");
			}
			else
			{
				die("用户名密码错误！");
			}
		}
		elseif ($_GET["action"]=="Logout") 
		{
			clearCookies();	
		}
	}
*/	
	if (!isset($_COOKIE['isLogin'] && $_COOKIE['isLogin']=='1''))
	{
	header("Location:login.php");
	exit;		
	}	
<html>
<head><title>主页面</title></head>
<body>
<?php
	echo "你好"$_COOKIE["username"];
	<a href="login.php?action=logout>退出</a> 
	?>
</body>
</html>