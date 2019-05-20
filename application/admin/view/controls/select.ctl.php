<?php
/**
 * 下拉选择框
 * @param $name name
 * @param $val 默认选中值 如：1
 * @param $array 一维数组 如：array('交易成功', '交易失败', '交易结果未知');
 * @param $default_option 提示词 如：请选择交易
 */
    $string = '<select name="'.$name.'" id="'.$name.'" class="select">';
    if($default_option) $string .= "<option value=''>$default_option</option>";

    if(!is_array($array) || count($array)== 0) return false;
    $ids = array();

    if(isset($val)) $ids = explode(',', $val);
    foreach($array as $value) {
        $selected = in_array($value, $ids) ? 'selected' : '';
        $string .= '<option value="'.$value.'" '.$selected.'>'.$value.'</option>';
    }
    $string .= '</select>';
    return $string;
?>