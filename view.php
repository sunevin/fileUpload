<?php
		session_start();
		require 'conf.php';
		header("Content-type: text/html; charset=utf-8");
		echo @ "您好<a href='my.php'>".$_SESSION['username']."</a>"."<a href='./logout.php'>退出</a>";
		echo '<table align="center" width="80% border="1" >';
		echo '<caption><h1>新闻</h1></caption>';
		echo '<th>序号</th><th>新闻标题</th>';
		$stmt=$dbh->query("select textno,texttitle from textmessage");
		while (list($textno,$texttitle)=$stmt->fetch(PDO::FETCH_NUM))
		{
			echo '<tr>';
			echo '<td>'.$textno.'</td>';
			echo "<td><a href=./search.php?id=$textno>".$texttitle.'</td>';
			echo '</tr>';
		}
		echo '</table>';
	