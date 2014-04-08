<?php
		require 'conf.php';
		$netpic=$_POST['netpic'];
@		$myfile=$_POST['myfile'];
		$path="./pic";
		if ($_POST['netpic']==NULL && is_uploaded_file($_FILES['myfile']['tmp_name']))  //如果是本地上传图片
		{
			$filename=$_FILES['myfile']['name'];
			if (is_uploaded_file($_FILES['myfile']['tmp_name']))
			{
				if (!move_uploaded_file($_FILES['myfile']['tmp_name'], $path."/".$filename))
				{
					echo '文件移动失败！';
				}
				else  
				{
					$stmt=$dbh->query("TRUNCATE TABLE picmessage");
					$stmt->execute();
					$query="INSERT INTO picmessage values (:nickname,:picadd)";
					$stmt=$dbh->prepare($query);
					$stmt->bindParam(':nickname', $nickname);
					$stmt->bindParam(':picadd', $picadd);
					$nickname=$_POST['nickname'];
					$picadd="$path/$filename";
					$stmt->execute();
				}
			}
			else 
			{
				echo '文件不存在！';
			}
		header("Location:my.php");
		}
		elseif (isset($_POST['netpic']) && is_uploaded_file($_FILES['myfile']['tmp_name'])==NULL)		//如果是网络图片
		{
			$stmt=$dbh->query("TRUNCATE TABLE picmessage");
			$stmt->execute();
			$query="INSERT INTO picmessage values (:nickname,:picadd)";
			$stmt=$dbh->prepare($query);
			$stmt->bindParam(':nickname', $nickname);
			$stmt->bindParam(':picadd', $picadd);
			$nickname=$_POST['nickname'];
			$picadd=$_POST['netpic'];
			$stmt->execute();
			header("Location:my.php");
		}
		
		elseif($_POST['netpic']==NULL && is_uploaded_file($_FILES['myfile']['tmp_name'])==NULL)     //如果两个都不是
		{
			echo "操作错误！";
			header("Location:my.php");
		}