<?php
/**
* 编辑器-Mini版
*
	 * @param $name name
* @param $val 默认值
* @param $style 样式
* @param $isload 是否加载js,当该页面加载过编辑器js后，无需重复加载
*/
    $style = $style ? $style : 'width:100%;height:400px';
    $string = '';
    if($isload) {
        $string .= '<script type="text/javascript" charset="utf-8" src="'.STATIC_URL.'plugin/ueditor/1.4.3.3/ueditor.config.js"></script>
			<script type="text/javascript" charset="utf-8" src="'.STATIC_URL.'plugin/ueditor/1.4.3.3/ueditor.all.min.js"> </script>
			<script type="text/javascript" charset="utf-8" src="'.STATIC_URL.'plugin/ueditor/1.4.3.3/lang/zh-cn/zh-cn.js"></script>';
    }
    $string .= '<script id="'.$name.'" type="text/plain" style="'.$style.'" name="'.$name.'">'.$val.'</script>
			<script type="text/javascript"> var ue = UE.getEditor("'.$name.'",{
            toolbars:[[ "fullscreen","source","|","undo","redo","|",
            "bold","italic","underline","blockquote","forecolor","|","fontfamily","fontsize","|","simpleupload","link","unlink","emotion","date","time","drafts"]],
            //关闭字数统计
            wordCount:false,
            //关闭elementPath
            elementPathEnabled:false,
            //默认的编辑区域高度
            initialFrameHeight:300
        }); </script>';

    return $string;

?>