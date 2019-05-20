<?php

/**
 * 验证码
 * @param string $id   验证码ID
 */
    return '<img src="'.U('api/index/code/').'" id="'.$id.'" onclick="this.src=this.src+\'?\'" style="cursor:pointer;" title="看不清？点击更换">';
?>