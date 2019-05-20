<?php defined('IN_HKINGPHP') or exit('No permission resources.'); ?><!DOCTYPE HTML>
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	  <meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0, user-scalable=no">
	  <title><?php echo $seo_title;?></title>
	  <link href="<?php echo STATIC_URL;?>css/mobile_index.css" rel="stylesheet" type="text/css" />
	  <script type="text/javascript" src="<?php echo STATIC_URL;?>js/jquery-1.8.2.min.js"></script>
      <script type="text/javascript" src="<?php echo STATIC_URL;?>js/mobile_scroll.js"></script>
	  <script type="text/javascript" src="<?php echo STATIC_URL;?>js/mobile_scrollload.js"></script>	  
	  <meta name="keywords" content="<?php echo $keywords;?>" />
	  <meta name="description" content="<?php echo $description;?>" />
  </head>
  <body>
    <!--网站容器-->
    <div id="container">
	    <!--网站头部-->
	    <div id="header" name="top"><?php echo $site['site_name'];?></div>
		<!--导航条-->
		<nav id="nav">
		  <ul>
			<li><a href="<?php echo $site['site_url'];?>index.php?m=mobile" class="nav_current">网站首页</a></li>
			<?php $tag = hg_base::load_sys_class('hg_tag');if(method_exists($tag, 'nav')) {$nav_data = $tag->nav(array('field'=>'mobname,catid,type,pclink','where'=>"parentid=0",'limit'=>'20','return'=>'nav_data',));}?>
			<?php if(is_array($nav_data)) foreach($nav_data as $v) { ?>
			<li><a href="<?php if($v['type']!=2) { ?><?php echo $site['site_url'];?>index.php?m=mobile&c=index&a=lists&catid=<?php echo $v['catid'];?><?php } else { ?><?php echo $v['pclink'];?><?php } ?>"><?php echo $v['mobname'];?></a></li>
			<?php } ?>	
		  </ul>
		</nav>
        <div class="clearfix"></div>		
		<!--焦点图-->
		<div class="topPic">
			<div class="imgSlideMain">
				<div id="imgSlide" class="imgSlide">
				<ul>
				<?php $tag = hg_base::load_sys_class('hg_tag');if(method_exists($tag, 'lists')) {$data = $tag->lists(array('field'=>'id,catid,title,thumb','modelid'=>'1','thumb'=>'1','limit'=>'3',));}?>
				<?php if(is_array($data)) foreach($data as $v) { ?>
				<li><a href="<?php echo $site['site_url'];?>index.php?m=mobile&c=index&a=show&catid=<?php echo $v['catid'];?>&id=<?php echo $v['id'];?>"><img src="<?php echo $v['thumb'];?>" alt="<?php echo $v['title'];?>" title="<?php echo $v['title'];?>"></a><p><?php echo $v['title'];?></p></li>
				<?php } ?>							
				</ul>
				</div>
				<ul class="navSlide"><li class="i_point"><li class="i_point"><li class="i_point active"></ul>
	        </div>
        </div>			
		<!--主要内容-->
		<div id="main">	
		 <div class="list_news">
		  <h3 class='tit'>【最近更新】</h3>
		  <ul>
		  <!-- 这里只做演示，选择modelid为1的最近更新，您可以根据自己的需求进行更改 -->
		  <?php $tag = hg_base::load_sys_class('hg_tag');if(method_exists($tag, 'lists')) {$data = $tag->lists(array('field'=>'id,catid,title,url','modelid'=>'1','limit'=>'20',));}?>
		   <?php if(is_array($data)) foreach($data as $v) { ?>
		   <li><a href="<?php echo $site['site_url'];?>index.php?m=mobile&c=index&a=show&catid=<?php echo $v['catid'];?>&id=<?php echo $v['id'];?>" title="<?php echo $v['title'];?>"><?php echo $v['title'];?></a></li>
		  <?php } ?>		  	 
		  </ul>		 
		 </div>
		 <div class="list_news">
		  <h3 class='tit'>【特别推荐】</h3>
		  <ul>
		   <!-- 这里只做演示，选择modelid为1的最近更新，您可以根据自己的需求进行更改 -->
		  <?php $tag = hg_base::load_sys_class('hg_tag');if(method_exists($tag, 'lists')) {$data = $tag->lists(array('field'=>'id,catid,title,inputtime','modelid'=>'1','flag'=>'3','limit'=>'5',));}?>
		   <?php if(is_array($data)) foreach($data as $v) { ?>
		   <li><a href="<?php echo $site['site_url'];?>index.php?m=mobile&c=index&a=show&catid=<?php echo $v['catid'];?>&id=<?php echo $v['id'];?>" title="<?php echo $v['title'];?>"><?php echo $v['title'];?></a></li>
		  <?php } ?>		  	 
		  </ul>		 
		 </div>
		 <div class="img_news">
		  <h3 class='tit'>【图文资讯】</h3>
		  <ul>
		   <!-- 这里只做演示，选择modelid为1的最近更新，您可以根据自己的需求进行更改 -->
			<?php $tag = hg_base::load_sys_class('hg_tag');if(method_exists($tag, 'lists')) {$data = $tag->lists(array('field'=>'id,catid,title,thumb','modelid'=>'1','thumb'=>'1','limit'=>'6',));}?>
			<?php if(is_array($data)) foreach($data as $k=>$v) { ?>
			<li><a href="<?php echo $site['site_url'];?>index.php?m=mobile&c=index&a=show&catid=<?php echo $v['catid'];?>&id=<?php echo $v['id'];?>"><img src="<?php echo $v['thumb'];?>" alt="<?php echo $v['title'];?>" title="<?php echo $v['title'];?>"><p><?php echo $v['title'];?></p></a></li>
			<?php } ?>			  			 
		  </ul>		 
		 </div>	 		 
		</div>
<?php include template("mobile","footer"); ?>