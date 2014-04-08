<?php
	try {
		$dbh=new PDO('mysql:dbname=pro;host=localhost','root','920416wgn');
	}catch (PDOException $e)
	{
		echo '数据库连接失败！'.$e->getMessage();
	}
	