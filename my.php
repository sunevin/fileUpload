<?php
		require 'conf.php';
		require 'session.php';
		echo '<table align="center" width="80% border="1" >';
		$stmt=$dbh->query("select picadd from picmessage");   //查询图片的地址
		$picname=$stmt->fetch(PDO::FETCH_NUM);
		$add=$picname[0];
		$stmt=$dbh->query("select nickname from picmessage");   //查询昵称
		$nickname=$stmt->fetch(PDO::FETCH_NUM);
		$nick=$nickname[0];
		if ($add==NULL)
		{
			echo "<tr><td>".$nick."</td>";
			echo "<a href='./myinsert.html'>修改信息</a>";
		}
		else 
		{
			echo "<tr><td>".$nick."</td>";
			echo "<td><img src=\"".$add."\"></td></tr>";
			echo "<a href='./myinsert.html'>修改信息</a>";
		}