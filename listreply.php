<?php
	require 'conf.php';
	function screen($id)
	{
		header("Content-type: text/html; charset=utf-8");
		$string;		//正则匹配出留言标题得到变量$str
		$pattern='!([\S\s]*?)</v>!';
	@	preg_match_all($pattern,$string,$arr);								
			for ($i=0;$i<=count($arr[0])-1;$i++)		//将留言提取出来处理插入数据库中
			{	
		@		$newarr[$i+1]=$arr[1][$i];
				$key=$i+1;
				$reply=$key.":".$arr[1][$i]."</v>";
				$str=$reply+$str;			//1:这是第一篇文章的第一条回复</v>2:这是第一篇文章第二条回复
			}										
				$dbh=new PDO('mysql:dbname=pro;host=localhost','root','920416wgn');			
	@			$query=("INSERT INTO replymessage (reply) values $str ");	//一起插入replymessage表里面id=1
				$stmt=$dbh->query($query);									//第一篇文章的评论
	@			$stmt->execute();
				header("Location:search.php");
	}	
		