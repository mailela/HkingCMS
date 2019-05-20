<?php
/**
 * 日期时间控件
 *
 * @param $name name
 * @param $val 默认值
 * @param $isdatetime 是否显示时分秒
 * @param $loadjs 是否重复加载js，防止页面程序加载不规则导致的控件无法显示
 * @param $str 其他字符串，可加样式等
 */
    $string = '';
    if($loadjs || !defined('DATETIME')) {
        if(!defined("DATETIME")) define('DATETIME', 1);
        $string .= '<script type="text/javascript" src="'.STATIC_URL.'plugin/laydate/1.1/laydate.js"></script>';
    }
    if($isdatetime){
        if(!empty($val)) {$val=date("Y/m/d H:i:s",$val);}
    }
    $string .= '<input class="laydate-icon date"  value="'.$val.'" name="'.$name.'" id="'.$name.'" '.$str.' readonly="readonly">';
    $string .= '<script type="text/javascript"> laydate({elem: "#'.$name.'",';
    if($isdatetime) $string .= 'istime: true,format: "YYYY-MM-DD hh:mm:ss",';
    $string .= '});</script>';
    return $string;
?>