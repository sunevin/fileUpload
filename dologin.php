<?php
	session_start();
	require 'conf.php';
	header("Content-type: text/html; charset=utf-8");
	$username=$_POST['username'];
	$password=$_POST['password'];
	if(isset($username))
	{
		$stmt=$dbh->prepare("SELECT username,password from usermessage where username=? and password=?");
		$stmt->execute(array($username,$password));
		if ($stmt->rowCount()>0)
		{
			$_SESSION=$stmt->fetch(PDO::FETCH_ASSOC);
			$_SESSION['islogin']='1';
			echo "登陆成功！";
			$stmt=$dbh->prepare("INSERT INTO picmessage(nickname) values (:nickname)");
			$stmt->bindParam(':nickname', $_SESSION['username']);
			$stmt->execute();
			header("Location:on.html");
		}
		else 
		{
			echo "用户名密码错误！";
		}
	}