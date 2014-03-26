<?php
	session_start();
	$username=$_SESSION["username"];
	$_SESSION=array();
	if (isset($_COOKIE[session_name()])){
		setcookie(session_name(),'',time()-3600);
	}
	session_destroy();
?>
<html>
<head><title>退出系统</title></head>
<body>
	<p><?php echo $username ?> 再见</p>
	<p><a href="login.php">重新登陆系统</a></p>
</body>
</html>