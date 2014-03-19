<?php
	$allowtype=array("gif","png","jpg");
	$size=1000000;
	$path="./img/";
	
	if ($_FILES["myfile"]["error"]>0)
	{
		echo '上传错误';
	}
	else 
	{
	switch ($_FILES["myfile"]["error"])
	{
		case 1 : die("上传文件超出了PHP约定值");
		case 2 : die("上传文件大小超出了表单中约定值");
		case 3 : die("文件只能部分被上传");
		case 4 : die("没有上传任何文件");
	
		default:die("未知错误");
	}
	}
	
	$hz=array_pop(explode(".", $_FILES["myfile"]["name"]));
	if (!in_array($hz, $allowtype))
	{
		die("这个后缀名不是允许的文件类型！");
	}
	
	if ($_FILES["myfile"]["size"]>size)
	{
		die("超过了文件允许的大小！");
	}
	
	$filename=date("Y-m-d H:m:s");
	
	if (is_uploaded_file($_FILES["myfile"]["tmp_name"]))
	{
		if (!move_uploaded_file($_FILES["myfile"]["tmp_name"],$path))
		{
			die("文件不能移动到指定的目录！");
		}
		else 
		{
			die("未知错误！");
		}
		
	}
