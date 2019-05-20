<?php
/**
 * input
 * @param $name name
 * @param $value 默认值 如：HkingCMS
 * @param $required  是否为必填项 默认false
 * @param $width  宽度 如：100
 */
    $string = '<input class="input-text" ';
    if($width) $string .= ' style="width:'.$width.'px" ';
    if($required) $string .= ' required="required" ';
    $string .= ' name="'.$name.'" id="'.$name.'" ';
    $string .= ' type="text" value="'.$val.'">';
    return $string;
?>