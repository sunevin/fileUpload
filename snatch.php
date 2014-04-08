<?php
	require 'conf.php'; //数据库连接
	require 'session.php';
	//匹配页面中的标题     //插入数据库   //匹配每个标题的内容  //插入数据库
	function getMessage($webset)
	{
		header("Content-type: text/html; charset=utf-8");
		for ($per=0;$per<12;$per++)
 		{
			$ch=curl_init();
 			curl_setopt($ch, CURLOPT_URL, $webset);
  			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  			$str=curl_exec($ch);
  			$contents=htmlspecialchars($str);
  			curl_close($ch);
			$pattern='!<div class="title"><a href="([\S\s]*?)" target="([\S\s]*?)">([\S\s]*?)</a></div>!';
			preg_match_all($pattern,$str,$arr);
			$str2="$webset".$arr[1][$per];
			$ch1=curl_init();
 			curl_setopt($ch1, CURLOPT_URL, "$str2");
  			curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
  			$str1=curl_exec($ch1);
  			$contents=htmlspecialchars($str1);
  			$pattern='!<div class="(introduction|content)">([\S\s]*?)<p>([\S\s]*?)</p></div>!';
			preg_match_all($pattern,$str1,$arr1);

			$newstr=$arr1[2][0]."<br/>".$arr1[3][0];

			$dbh=new PDO('mysql:dbname=pro;host=localhost','root','920416wgn');
			mysql_query("set names 'utf-8'");
			$query=("insert into textmessage (textno,texttitle,texttext)values(?,?,?)");
			$stmt=$dbh->prepare($query);
			$stmt->bindParam(1, $sno);
			$stmt->bindParam(2, $texttitle);
			$stmt->bindParam(3, $texttext);
			$no=$per;
			$texttitle=$arr[3][$per];
			$texttext=$newstr;
			$stmt->execute();  
 		}
		
} 
		



	getMessage("http://www.cnbeta.com/");
	header("Location:view.php");
	
	