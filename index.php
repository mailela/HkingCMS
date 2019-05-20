<?php
/**
 * index.php 文件单一入口
 *
 * @author           麦乐
 * @license          http://www.hkingcms.cn
 * @lastmodify       2018-05-12
 */

 
//调试模式：开发阶段设为开启true，部署阶段设为关闭false。
define('APP_DEBUG', true);
define('ISROOT_TEMPLATE',true);//开启根目录templates模板模式
//define('ISROOT_TEMPLATE',false);//开启根目录templates模板模式
//define('APP_DEBUG', false);

//URL模式: 0=>mca兼容模式，1=>s兼容模式，2=>REWRITE模式，3=>SEO模式。
define('URL_MODEL', '3');

//hkingphp根路径
define('HKINGPHP_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR);

//加载hkingphp框架的入口文件
require(HKINGPHP_PATH.'hkingphp'.DIRECTORY_SEPARATOR.'hkingphp.php');

//创建应用
hg_base::creat_app();