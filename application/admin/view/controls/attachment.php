<?php
/**
 * 附件上传
 *
 * @param $name name
 * @param $val 默认值
 * @param $style 样式
 */
    $string = '<input class="input-text uploadfile" type="text" name="'.$name.'"  value="'.$val.'"  id="'.$name.'" style="'.$style.'" > <a href="javascript:;" onclick="hg_upload_att(\''.U('attachment/api/upload_box', array('module'=>ROUTE_M, 'pid'=>$name, 't'=>2)).'\')" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>';

    return $string;
