<?php
/**
 * 单选框
 *
 * @param $name name
 * @param $val 默认选中值 如：1
 * @param $array 一维数组 如：array('交易成功', '交易失败', '交易结果未知');
 */
    $string = '';
    foreach($array as $k=>$value) {
        $checked = trim($val)==trim($k) ? 'checked' : '';
        $string .= '<label class="option_label option_radio" >';
        $string .= '<input type="radio" name="'.$name.'" class="'.$name.'" id="'.$name.'_'.$k.'" '.$checked.' value="'.$k.'">'.$value;
        $string .= '</label>';
    }
    return $string;
?>