<?php
/**
 * 图像裁剪
 *
 * @param $cid 		原图所在input的id
 * @param $spec  	裁剪规则，1：3*2, 2:4*3, 3:1*1
 */
    $string = '<a href="javascript:;" onclick="hg_img_cropper(\''.$cid.'\', \''.U('attachment/api/img_cropper', array('spec'=>$spec)).'\')" class="btn btn-secondary radius upload-btn"><i class="Hui-iconfont">&#xe6bc;</i> 裁剪图片</a>';
    return $string;
?>