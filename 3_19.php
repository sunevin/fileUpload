<?php
/*
 * preg_match()		进行正则表达式匹配
 * preg_match_all()	进行全局正则表达式匹配
 * preg_replace()	执行正则表达式的搜索和替换
 * preg_split()		用正则表达式分割字符串
 * preg_grep()		返回与模式匹配数组单元
 * preg_replace_callback()		用毁掉函数执行正则表达式的搜索和替换
 * 
 * 定界符: ! | # {}
 * 
 * 原子:	 普通字符、特殊字符和元字符（\转义字符）
 * 一些非打印字符作为原子\n 匹配一个换行符   \r 匹配一个回车符
 * 通用字符类型\d 匹配一个是进制数字 \D 匹配一个除十进制数字以外的字符  \s 匹配一个任意空白字符
 * \S 匹配一个任何除空白字符以外的字符  \w 匹配任何一个数字、字母、下划线以外的任意一个字符 \W....
 * 自定义原子表作为原子
 * 
 * 元字符
 * 限定符：+ * ？ {m} {m,} {m,n}
 * 边界值：^ $ \b必须为边界  \B不能为边界  .可以匹配任何字符除了换行符
 * 模式选择符： |
 * 模式单元：多个原子组成一个大原子
 * 后向引用
 * 
 * 模式修正符： i m s x e U D
 */
//	$pattern='/php\<br\/\>/';
//	$content="123php<br/>";
/*	$pattern='/^\w+@\w+(\.\w+){0,3}$/';
	$content="sun_evin@163.com";
	function match($pattern, $content)
	{		
		if(preg_match($pattern, $content))
		{
			echo "匹配成功！";
		}
		else 
		{
			echo "匹配失败！";
		}
	}	
	match($pattern, $content);

	$pattern='/(http?):\/\/(www)\.([^\.$]+)\.(com|cn)/i';
	$content="http://www.baidu.com";
	if(preg_match($pattern, $content,$matches))
	{
		var_dump($matches);
	}
	else 
	{
		echo "匹配失败！";
	}

	preg_match_all($pattern, $subject, $matches);


	$array=array("wang","wang1"."1");
	$version=preg_grep("/^[r-x]+(\d)+$/i", $array);
	print_r($version);
*/

/*
 *字符串处理函数
 *strstr()搜索一个字符串在另一个字符串中第一次出现，该函数但会字符串的其余部分，未找到则返回False，对大小写敏感
 *strrpos()最后一次出现的位置，对大小写敏感。
 *preg_replace()执行正则表达式的搜索和替换
*/
// 	echo strstr("swedadssdw", s);
// 	echo strrpos("asdjhnlksldsd", l);
/* 	function getFileName($url)
 	{
 		$localtion=strrpos($url, "/")+1;
 		$return=substr($url, $localtion);
 		return $return;
 	}
 	
 	echo getFileName("http://www.baidu.com/index.php")."<br>";
 	echo getFileName("C:/windows/system32/xxx.exe");
*/
	$pattern="/(/d{2})\/(d{2})\/(d{4})/";
	$test="今年国庆节放假日期是01/10/2014到09/10/2014共9天。";
	echo preg_replace($pattern, "/\\3-\\2-\\1/", $test);
/*
 * str_replace();
 * preg_split();
 */
//	$str="今天是2014/3/9星期一，今天天气很好，今天天气风和日丽，今天天气阳光明媚。";
//	echo str_replace("今天", "昨天", $str, $count);
//	echo "修改了".$count."次。";
	
	$array=array('a','b','c');
	echo str_replace($array, "--", "afbfcf");
	
