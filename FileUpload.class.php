<?php
class FileUpload{
	private $path="./upload";		//文件上传路径
	private $allowtype=array("jpg","gif","png");		//文件上传的类型
	private $allowsize=100000000;		//闲置文件上传的大小
	private $israndname=true;		//设置文件上传是或否自动命名
	
	private $originName;		//原文件名
	private $tmpFileName;		//临时文件名
	private $fileType;		//文件类型
	private $fileSize;		//文件大小
	private $newFileName;		//新文件名
	private $erroeNumber;		//错误号码
	private $errorMess;		//错误信息
	
	function set($key,$val)
	{
		$key=strtolower($key);		//字符串转化为小写
		if (array_key_exists($key, get_class_vars(get_class($this))))
		{
			$this->setOption($key,$val);
		}
		return $this;
	}
	
	function upload($fieldField)
	{
		$return=ture;
		if (!$this->checkFilePath())		//检查路径是否违法
		{
			$this->errorMess=$this->getError();
			return false;
		}
		//文件上传信息复制给变量
		$name=$_FILES["fileField"]['name'];
		$tmp_name=$_FILES["fileField"]['tmp_name'];
		$size=$_FILES["fileField"]["size"];
		$error=$_FILES["fileField"]["error"];
		
		if (is_Array($name)) {
			$error=array();
		for ($i=0;$i<count($name);$i++)
		{
		if ($this->checkFileSize()||!$this->checkFileType())
		{
			$errors[]=$this->getError();
			$return=false;
		}
		if (!$return)
		{
			$this->setFiles();
		}
		}
		}
		}
		
		
		
		
}