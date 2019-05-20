<?php
/**
 * 复选框
 *
 * @param $name name
 * @param $val 默认选中值，多个用 '逗号'分割 如：'1,2'
 * @param $array 一维数组 如：array('交易成功', '交易失败', '交易结果未知');
 */
    $string = '';
    $val = trim($val);
    if($val != '') $val = strpos($val, ',') ? explode(',', $val) : array($val);

    foreach($array as $k=>$v) {
        $value = trim($v);
        $checked = ($val && in_array($k, $val)) ? 'checked' : '';
        $string .= '<label class="option_label option_box" >';
        $string .= '<input type="checkbox" name="'.$name.'[]" id="'.$name.'_'.$k.'" '.$checked.' value="'.$k.'">'.$value;
        $string .= '</label>';
    }
    return $string;
?>

