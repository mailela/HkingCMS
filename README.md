HkingCMS V5.1 正式版
===============
HkingCMS是一款轻量级开源内容管理系统，它采用OOP（面向对象）方式自主开发的框架。基于PHP+Mysql架构，并采用MVC框架式开发的一款高效开源的内容管理系统，可运行在Linux、Windows、MacOSX、Solaris等各种平台上。

它可以让您不需要任何专业技术轻松搭建您需要的网站，操作简单，很容易上手，快捷方便的后台操作让您10分钟就会建立自己的爱站。在同类产品的比较中，HkingCMS更是凸显出了体积轻巧、功能强大、源码简洁、系统安全等特点，无论你是做企业网站、新闻网站、个人博客、门户网站、行业网站、电子商城等，它都能完全胜任，而且还提供了非常方便的二次开发体系，是一款全能型的建站系统！

## 官网网站
www.hkingcms.cn

## 系统特点

### 源码简洁
因为HkingCMS是由一人独自开发完成，所以系统所有源码风格全部统一，源码非常干净、无冗余代码！

### 开发灵活
HkingCMS系统采用MVC框架式开发，增加了程序的维护性、可扩展性，并采用模块化开发设计，使二次开发变得简单、容易。

### 100%开源
HkingCMS系统是100%开源的PHP程序，保证系统的代码更健壮和更安全。

### 轻量级
HkingCMS系统在保持强大的功能前提下，整体压缩包仅不到5MB，比同类CMS至少缩小一倍，是您可以快速了解和研究它！


标签说明

###模板路径
{TPL} //模板路径

###常用变量
{$site[site_name]}
{$site[site_url]}
{$site[site_keyword]}
{$site[site_description]}
{$site[site_copyright]}
{$site[site_filing]}
{$site[site_code]}
{$site[site_theme]}
{$site[site_logo]}
{$site[url_rule]}
{$site[is_words]}
{$site[upload_maxsize]}
{$site[upload_types]}
{$site[ishtml5]}
{$site[watermark_enable]}
{$site[watermark_name]}
{$site[watermark_position]}
{$site[mail_server]}
{$site[mail_port]}
{$site[mail_from]}
{$site[mail_auth]}
{$site[mail_user]}
{$site[mail_pass]}
{$site[mail_inbox]}
{$site[admin_log]}
{$site[admin_prohibit_ip]}
{$site[prohibit_words]}
{$site[comment_check]}
{$site[comment_tourist]}
{$site[is_link]}
{$site[member_register]}
{$site[member_email]}
{$site[member_check]}
{$site[member_point]}
{$site[member_hg]}
{$site[rmb_point_rate]}
{$site[login_point]}
{$site[comment_point]}
{$site[publish_point]}
{$site[qq_app_id]}
{$site[qq_app_key]}
{$site[wx_appid]}
{$site[wx_secret]}
{$site[wx_token]}
{$site[wx_encodingaeskey]}
{$site[wx_relation_model]}
{$site[advertise]}

可用php语言var_dump($site);

引用模板
{m:include 'index','header'} //引用模板index目录下 header.html模板

###栏目列表 顶层栏目
 {m:nav field="catid,catname,arrchildid,pclink" where="parentid=0" limit="20"}
            {loop $data $v}
            <li>
                <a{if isset($catid) && $v['catid']==$catid} class="active" {/if} href="{$v[pclink]}"><span>{$v[catname]}</span></a>
            </li>
            {/loop}

###栏目子栏目
            {php $data = get_childcat($catid);}
			 {loop $data $k=>$v}
			 <div class="category_list{if $k%2!=0} mr_0{/if}">
				<h3 class="cat_title"><a href="{$v[pclink]}"  class="gengduo">更多>></a>{$v[catname]}</h3>
			 </div>
			{/loop}

###获取栏目下信息列表
 {m:lists field="title,inputtime,url" catid="$v['catid']" limit="10"}
				  {loop $data $v}
				   <li><span>{date('m-d',$v['inputtime'])}</span><a href="{$v[url]}" title="{$v[title]}">{str_cut($v['title'], 69)}</a></li>
				  {/loop}