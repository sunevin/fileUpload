<?php 
	require 'conf.php';					//输出标题下文章的内容
	require 'session.php';
	echo '<table align="center" width="80% border="1" >';
  @	$id = $_GET['id'];
 	mysql_query("set names 'utf-8'");
	$stmt=$dbh->query("select texttext from textmessage where textno=$id");
	$arr=($stmt->fetch(PDO::FETCH_ASSOC));
	echo ($arr['texttext']);
	echo '</table>';
	echo '<hr/>';
	
	//输出评论
	
	