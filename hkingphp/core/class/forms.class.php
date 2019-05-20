<?php
/**
 * form.class.php  form类
 *
 * @author           麦乐
 * @license          http://www.hkingcms.cn
 * @lastmodify       2016-12-10 
 */

class forms {


	
	

	public static function other($_name = 'content', $_val = '',$args)
	{
		$width="0";
		$required=$args["isrequired"];
		$value=$args["defaultvalue"];
		$iscropper=false;
		$loadjs=false;
		$isdatetime=true;
		$str="";

		$style=$args["css"];
		$isload="";
		$name=$args["field"];
		$val=$_val;
		$array=string2array2($args["setting"]);
//		var_dump($array);
//		extract($args);
		return include(common::control_path($_name));
	}



	
}
