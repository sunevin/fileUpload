<?php
	session_start();
	if (isset($_POST["sub"]))
	{
		$stmt=$pdo->prepare("SELECT id,username FROM user WHERE username=? and userpwd=?");
		$stmt->execuse(array($_POST['username'],md5($_POST['password'])));
		if ($stmt->rowCount()>0)
		{
			$_SESSION=$stmt->fetch(PDO::FETCH_ASSOC);
			$_SESSION['isLogin']=1;
			header("Location:index.php");
		}
		else 
		{
			echo '<font color="red">用户名密码错误！</font>';
		}
	}
?>
<html>
<head><title>邮件登录系统</title></head>
<form action="login.php" method="post">
用户名:<input type="text",name="username"><br>
密	码:<input type="password" name="password"><br>
<input type="submit" name="sub" value="登陆">
</form>
</body>
</html>
