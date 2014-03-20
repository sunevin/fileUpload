<?php
 class Aticle{
 	private $subject;
 	private $message;
 	
	function __construct($subject="",$message="",$parse=array()){
	if (!empty($parse))
	{
		foreach ($parse as $value)
		{
			switch ($value){
			case 1:"使用表情";
				$message=$this->parseSmiles($message);break;
			case 2:"使用换行符";
				$message=$this->nltobr($message);break;
			}		
		}	
	}
	$this->message=$message;
	}
	
	function parseSmiles($message){
		$pattern=array(
			'/\/wx|微笑/',
			'/\/fn|发怒/',
			'/\/gx|高兴/');
		$replace=array(
			"<img src='weixiao.jpg'>",
			"<img src='fennu.jpg'>",
			"<img src='gaoxing.jpg'>");
		return preg_replace($pattern, $replace, $message);
	}
	
	function nltobr($message){
		return nl2br($message);
	}
	
	function getMessage(){
		return $this->message;
	}
 	function getSubject(){
		return $this->subject;
	}
 }