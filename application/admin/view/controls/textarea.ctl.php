<?php
/**
 * textarea
 * @param $name name
 * @param $value 默认值 如：HkingCMS
 * @param $required  是否为必填项 默认false
 * @param $width  宽度 如：100
 */
    $string = '<textarea name="'.$name.'" id="'.$name.'" ';
    $string.=' class="textarea"  datatype="*10-100" dragonfly="true" ';
    if($width) $string .= ' width="'.$width.'px" ';
    if($required) $string .= ' required="required" ';
    $string .= '>'.$value.'</textarea>';
    return $string;


?>

