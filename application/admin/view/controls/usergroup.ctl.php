<?php
/**
 * 单选框
 *
 * @param $name name
 * @param $val 默认选中值 如：1
 * @param $array 一维数组 如：array('交易成功', '交易失败', '交易结果未知');
 */

$member_group = get_groupinfo();
        $string='<span class="select-box"  style="width:265px">';
$string.='<select id="select" name="'.$name.'" class="select">';
$string.='<option value="0">开放浏览</option>';
				foreach($member_group as $val){
                    $string.= '<option value="'.$val['groupid'].'">'.$val['name'].'</option>';
                }
$string.='</select></span>';
return $string;
?>