<?php
/**
 * 多图上传
 *
 * @param $name name
 * @param $val 默认值
 * @param $n 上传数量
 */
    $string = '';
    $string .= '<fieldset class="fieldset_list"><legend>图片列表</legend><div class="fieldset_tip">您最多可以同时上传 <span style="color:red">'.$n.'</span> 个文件</div>
					<ul id="'.$name.'" class="file_ul">';
    if($val){
        $arr = string2array($val);
        foreach($arr as $key => $val){
            $string .= '<li>文件：<input type="text" name="'.$name.'[url][]" value="'.$val['url'].'" id="'.$name.'_'.$key.'" onmouseover="hg_img_preview(\''.$name.'_'.$key.'\', this.value)" onmouseout="layer.closeAll();" class="input-text w_300"> 描述：<input type="text" name="'.$name.'[alt][]" value="'.$val['alt'].'" class="input-text w_200"><a href="javascript:;" onclick="remove_li(this);">删除</a></li>';
        }
    }
    $string .= 	'</ul></fieldset>
				<a href="javascript:;" onclick="hg_upload_att(\''.U('attachment/api/upload_box', array('module'=>ROUTE_M, 'pid'=>$name, 'n'=>$n)).'\')" class="btn btn-primary radius upload-btn mt-5"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>';

    return $string;
?>