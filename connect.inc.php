<?php
	$connect=mysql_connect("localhost","root","920416wgn") or die("数据库连接失败！");
	mysql_select_db("mail",$connect) or die("数据库选择失败！");