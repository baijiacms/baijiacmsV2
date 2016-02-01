<?php defined('SYSTEM_IN') or exit('Access Denied');?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=10" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php  echo empty($settings['shop_title'])?'百家CMS开源版':$settings['shop_title'];?></title>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		<meta name="description" content="<?php  echo empty($settings['shop_description'])?'百家CMS开源版':$settings['shop_description'];?>" />
		<meta name="keywords" content="<?php  echo empty($settings['shop_keyword'])?'百家CMS开源版':$settings['shop_keyword'];?>">
     <link href="<?php echo RESOURCE_ROOT;?>/addons/common/bootstrap3/css/bootstrap.min.css" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="<?php echo RESOURCE_ROOT;?>/addons/common/fontawesome3/css/font-awesome.min.css" />
    <script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>/addons/common/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>/addons/common/bootstrap3/js/bootstrap.min.js"></script>

    <script src="<?php echo RESOURCE_ROOT;?>/addons/index/js/ace/ace-elements.min.js"></script>
    <script src="<?php echo RESOURCE_ROOT;?>/addons/index/js/ace/ace.min.js"></script>
   <link rel="stylesheet" href="<?php echo RESOURCE_ROOT;?>/addons/index/css/ace/ace.min.css" />
    <link rel="stylesheet" href="<?php echo RESOURCE_ROOT;?>/addons/index/css/ace/ace-rtl.min.css" />
    <link rel="stylesheet" href="<?php echo RESOURCE_ROOT;?>/addons/index/css/ace/ace-skins.min.css" />

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="<?php echo RESOURCE_ROOT;?>/addons/index/css/ace/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="<?php echo RESOURCE_ROOT;?>/addons/index/js/ace/ace-extra.min.js"></script>
    <!--[if IE 7]>
    <link rel="stylesheet" href="<?php echo RESOURCE_ROOT;?>/addons/common/fontawesome3/font-awesome-ie7.min.css">
    <![endif]-->


    <style>
        body{background-color: #F8FAFC;}
    </style>
    <script type="text/javascript">
    	function navtoggle(stitle)
    	{
    		if(stitle=='')
    		{
    		stitle='控制台';	
    		}
    		document.getElementById('activeworker').innerText=stitle;
    	}
    try{ace.settings.check('navbar' , 'fixed')}catch(e){}
</script>
</head>
<body scrolling="no" style="overflow:visible;">
<div class="navbar navbar-default" id="navbar">
<div class="navbar-container" id="navbar-container">
<div class="navbar-header pull-left">
    <a href="#" class="navbar-brand">
        <small>
            <i class="icon-leaf"></i>
            <span id='accountname'><?php  echo empty($settings['shop_title'])?'百家CMS开源版':$settings['shop_title'];?></span>
        </small>
    </a><!-- /.brand -->
</div><!-- /.navbar-header -->

<div class="navbar-header pull-right" role="navigation">
<ul class="nav ace-nav" style="height:45px">
	<li class="Larger">
    <a class="dropdown-toggle"  href="http://bbs.baijiacms.com" target="_blank">
        <i class="icon-globe"></i>
        <span>官方论坛</span>
    </a> 
</li>
<li class="Larger">
    <a class="dropdown-toggle"  href="<?php  echo WEBSITE_ROOT.'index.php';?>" target="_blank">
        <i class="icon-mobile-phone"></i>
        <span>商城首页</span>
    </a> 
</li>

<li class="Larger">
    <a class="dropdown-toggle" onclick="navtoggle('修改密码')" href="<?php  echo create_url('site',array('name' => 'index','do' => 'changepwd'))?>" target="main">
        <i class="icon-user"></i>
        <span>修改密码</span>
    </a> 
</li>
<li class="Larger">
    <a class="dropdown-toggle" onclick="navtoggle('退出系统')" href="<?php  echo create_url('site',array('name' => 'public','do' => 'logout'))?>" >
        <i class="icon-off"></i>
        <span>退出系统</span>
    </a> 
</li>


<li class="light-blue">
    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
       				<span class="user-info">
									<small>欢迎光临,</small>
									<?php echo $username ?>								</span>

        <i class="icon-caret-down"></i>
    </a>

    <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

        <li>
            <a onclick="navtoggle('退出系统')" href="<?php  echo create_url('site',array('name' => 'public','do' => 'logout'))?>">
                <i class="icon-off"></i>
                退出
            </a>
        </li>
    </ul>
</li>
</ul><!-- /.ace-nav -->
</div><!-- /.navbar-header -->
</div><!-- /.container -->
</div>
<!-- 头部 end -->

<div class="main-container" id="main-container">
    <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>

    <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
            <span class="menu-text"></span>
        </a>
        <div class="sidebar" id="sidebar">
            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
            </script>
            <div class="sidebar-shortcuts" id="sidebar-shortcuts">
              
                <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                    <span class="btn btn-success"></span>

                    <span class="btn btn-info"></span>

                    <span class="btn btn-warning"></span>

                    <span class="btn btn-danger"></span>
                </div>
            </div><!-- #sidebar-shortcuts -->

          <ul class="nav nav-list">
                                            
                      <?php if (in_array("shop-category",$menurule)||in_array("shop-goods",$menurule)) { ?>  
                                     <li>
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-shopping-cart"></i>
                        <span class="menu-text"> 商品管理</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                                <?php if (in_array("shop-goods",$menurule)) { ?>                 <!-- 子菜单 第二级-->
                        <li> <a  onclick="navtoggle('商品管理 - > 商品列表')"  href="<?php  echo create_url('site', array('name' => 'shop','do' => 'goods','op'=>'display'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    商品列表                                  
                                </a>   </li>
                                  <li> <a onclick="navtoggle('商品管理 - > 添加新商品')" href="<?php  echo create_url('site', array('name' => 'shop','do' => 'goods','op'=>'post'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    添加新商品                                  
                                </a>   </li>
                                
                              <?php }?>
                                 <?php if (in_array("shop-category",$menurule)) { ?>   
                                  <li> <a onclick="navtoggle('商品管理 - > 管理分类')" href="<?php  echo create_url('site', array('name' => 'shop','do' => 'category','op'=>'display'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    管理分类                              
                                </a>   </li>
                                    <?php }?>
                                      <?php    if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/index/template/web/main_1.php'))
			{
		
								include_once  CUSTOM_ROOT.'/index/template/web/main_1.php';
			}
                     ?> 
                              
                                            </ul>
                                    </li>
                                       <?php }?>
                                    
                                    
                                    
                              <?php if (in_array("shop-order",$menurule)||in_array("shop-orderbat",$menurule)) { ?>  
                           
                                                 <li>
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-tasks"></i>
                        <span class="menu-text"> 订单管理</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                    	 <?php if (in_array("shop-order",$menurule)) { ?>   
                                                <!-- 子菜单 第二级-->
                        <li> <a  onclick="navtoggle('订单管理 - > 所有订单')"  href="<?php  echo create_url('site',  array('name' => 'shop','do'=>'order','op' => 'display', 'status' => -99))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    所有订单                                  
                                </a>   </li>
                                   <?php }?>
                                    <?php if (in_array("shop-orderbat",$menurule)) { ?>  
		                                  <li> <a onclick="navtoggle('订单管理 - > 批量发货')" href="<?php  echo create_url('site', array('name' => 'shop','do'=>'orderbat','op' => 'display'))?>" target="main">
		                                    <i class="icon-double-angle-right"></i>
		                                    批量发货                                  
		                                </a>   </li>        
		                                 <?php }?>
		                                 
		                                   <li> <a onclick="navtoggle('订单管理 - > 评论管理')" href="<?php  echo create_url('site', array('name' => 'shop','do'=>'goods_comment','op' => 'display'))?>" target="main">
		                                    <i class="icon-double-angle-right"></i>
		                                    评论管理                                  
		                                </a>   </li> 
		                                
		                                
		                                   <?php    if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/index/template/web/main_2.php'))
			{
								include_once  CUSTOM_ROOT.'/index/template/web/main_2.php';
			}
                     ?> 
                     
                     
                     
                     
                     
                     <?php  if(is_array($modulelist)) { foreach($modulelist as $module) { 
                                   	if($module['name']=='addon16'||$module['name']=='addon11')
                                   	{
                                   	if($module['icon']=='yingxiao'||$module['name']=='addon2'||$module['name']=='addon3'||$module['name']=='addon4'||$module['name']=='addon10'||$module['name']=='addon12'||$module['name']=='addon13'||$module['name']=='addon14'||$module['name']=='addon15'){
                                   		?>
                                   		<?php
                                   	}else
                                   	{
                                   	?>
  
  
    <li  class="open">
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                         <i class="icon-double-angle-right"></i>
                        <span class="menu-text"> <?php  echo $module['title'] ?></span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                                           
                                             <?php  foreach($module['menus'] as $menu) { ?>
  
                                       <li>
                                          <a href="<?php  echo $menu['href'] ?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        <?php  echo $menu['title'] ?>                                    
                                    </a>
                                </li>
                                               
                                               
                                            <?php  } ?>  
                                                        </ul>
                                                    </li>
                     <?php }  }}} ?>     
                                    
                     
                     
                                    </ul>
                                    </li>
                                          
                                        <?php }?>
                                     
                                      <?php  if(is_array($modulelist)) { foreach($modulelist as $module) { 
                                   	if(($module['name']=='bj_hx'))
                                   	{
                                   	if($module['icon']=='yingxiao'||$module['name']=='addon2'||$module['name']=='addon3'||$module['name']=='addon4'||$module['name']=='addon10'||$module['name']=='addon12'||$module['name']=='addon13'||$module['name']=='addon14'||$module['name']=='addon15'){
                                   		?>
                                   		<?php
                                   	}else
                                   	{
                                   	?>
  
  
    <li>
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="<?php  echo (empty($module['icon'])||$module['icon']=='icon-flag')?'icon-sitemap':$module['icon'] ?>"></i>
                        <span class="menu-text"> <?php  echo $module['title'] ?></span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                                           
                                             <?php  foreach($module['menus'] as $menu) { ?>
  
                                       <li>
                                          <a href="<?php  echo $menu['href'] ?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        <?php  echo $menu['title'] ?>                                    
                                    </a>
                                </li>
                                               
                                               
                                            <?php  } ?>  
                                                        </ul>
                                                    </li>
                     <?php }  }}} ?>     
                                     
  <?php if (in_array("member-list",$menurule)) { ?> 
    <li>
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-group"></i>
                        <span class="menu-text"> 会员管理</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                                           
                                               
                                       <li>
                                          <a onclick="navtoggle('会员管理 - > 会员管理 ')"  href="<?php  echo create_url('site', array('name' => 'member','do' => 'list'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        会员管理                                
                                    </a>
                                </li>
                                               
                                           <li>
                                          <a onclick="navtoggle('会员管理 - > 会员等级管理 ')"  href="<?php  echo create_url('site', array('name' => 'member','do' => 'rank'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        会员等级                                
                                    </a>
                                </li>    
                                
                                        <li>
                                          <a onclick="navtoggle('会员管理 - > 余额提现申请 ')"  href="<?php  echo create_url('site', array('name' => 'member','do' => 'outchargegold'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        审核余额提现操作                                
                                    </a>
                                </li>    
                                              
                                              
                                               <?php    if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/index/template/web/main_3.php'))
			{
								include_once  CUSTOM_ROOT.'/index/template/web/main_3.php';
			}
                     ?> 
                                              
                                                        </ul>
                                                    </li>
                              <?php }?>
                              
                              
                                    
                                         <?php if (in_array("bonus-bonus",$menurule)) { ?>  
                                 <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-gift"></i>
                        <span class="menu-text"> 促销管理</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                        <li> <a  onclick="navtoggle('促销管理 - > 优惠券管理')"  href="<?php  echo create_url('site', array('name' => 'bonus','do' => 'bonus','op'=>'display'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    优惠券管理                                  
                                </a>   </li>
                                 
                                 
                                     <li> <a  onclick="navtoggle('促销管理 - > 促销免运费')"  href="<?php  echo create_url('site', array('name' => 'promotion','do' => 'promotion','op'=>'display'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    促销免运费                                 
                                </a>   </li>
                              
                     <?php    if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/index/template/web/main_4.php'))
			{
								include_once  CUSTOM_ROOT.'/index/template/web/main_4.php';
			}
                     ?> 
                                            </ul>
                                    </li>
                                       <?php }?>
                                    
                                    
                                  
                                   
                         <li>
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-gift"></i>
                        <span class="menu-text"> 互相营销管理 </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                                       <?php $showdownload=true; if(is_array($modulelist)) { foreach($modulelist as $module) { 
                                   	if($module['icon']=='yingxiao'||$module['name']=='addon2'||$module['name']=='addon3'||$module['name']=='addon4'||$module['name']=='addon10'||$module['name']=='addon12'||$module['name']=='addon13'||$module['name']=='addon14'||$module['name']=='addon15'){
                                   	$showdownload=false;	?>
                                   		
                                   		
                                   		  <li class="open">
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <span class="menu-text"> <?php  echo $module['title'] ?></span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                                           
                                             <?php  foreach($module['menus'] as $menu) { ?>
  
                                       <li>
                                          <a href="<?php  echo $menu['href'] ?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        <?php  echo $menu['title'] ?>                                    
                                    </a>
                                </li>
                                               
                                               
                                            <?php  } ?>  
                                                        </ul>
                                                    </li>
                        
                                
                                   		
                                   		<?php
                                   	}}}?>     
                                   	
                                   	
                                             <?php  if($showdownload) { ?>
                                   	      <li>
                                   	      	   <a onclick="navtoggle('互相营销管理 - > 点击下载互动插件')" href="http://addons.baijiacms.com/" target="_blank" >     
                                         <i class="icon-double-angle-right"></i>
                                        	点击下载互动插件                             
                                    </a>
                                </li>
                                
                                
                           
                                
                                            <?php  } ?>  
                                         </ul>
														
								                  </li>
								                  
								                  
								                  
                                     
             <?php if (in_array("shop-config",$menurule)||in_array("shop-adv",$menurule)||in_array("shop-themes",$menurule)||in_array("shop-payment",$menurule)||in_array("shop-thirdlogin",$menurule)||in_array("shop-dispatch",$menurule)) { ?>  
                          
                                          <li>
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-cogs"></i>
                        <span class="menu-text"> 商城配置</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                                <?php if (in_array("shop-config",$menurule)) { ?>  
		                               
                        <li> <a  onclick="navtoggle('商城配置 - > 商城基础设置')"  href="<?php  echo create_url('site', array('name' => 'shop','do' => 'config'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    商城基础设置                                  
                                </a>   </li>
                                
                                
                                   <li> <a  onclick="navtoggle('商城配置 - > 新订单邮件提醒')"  href="<?php  echo create_url('site', array('name' => 'shop','do' => 'noticemail'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    新订单邮件提醒                                  
                                </a>   </li>
                                
                                  <?php }?>
                                       <?php if (in_array("shop-adv",$menurule)) { ?>  
                                  <li> <a  onclick="navtoggle('商城配置 - > 首页广告')"  href="<?php  echo create_url('site', array('name' => 'shop','do' => 'adv','op'=>'display'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    首页广告                                  
                                </a>   </li> <?php }?>
                                <?php if (in_array("shop-themes",$menurule)) { ?>  
                                
                                <li class="open">
								                                    								                                    <a href="#" class="dropdown-toggle">
								                                        <i class="icon-double-angle-right"></i>
								                                          模板设置 							                                        <b class="arrow icon-angle-down"></b>
								                                    </a>
								                                    								                                    <!-- 第四级 -->
								                                   <ul class="submenu" style="overflow: hidden; display: block;">
								                                       <li> <a  onclick="navtoggle('商城配置 - > 模板设置')"  href="<?php  echo create_url('site', array('name' => 'shopwap','do' => 'themes','op'=>'display'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    商城主题模板                                  
                                </a>    </li>
                                            <li> <a  onclick="navtoggle('商城配置 - > 个人中心菜单')"  href="<?php  echo create_url('site', array('name' => 'shopwap','do' => 'fansindex_menu','op'=>'display'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    个人中心菜单                                  
                                </a>    </li>
                                         
                                         
                                         
                                    
                                         
								                                    </ul>
								
								
								                                    								
								                                </li>
                                <?php }?>
                                
                                
                                
                                <?php if (in_array("modules-payment",$menurule)) { ?> 
                                  <li> <a onclick="navtoggle('商城配置 - > 支付方式')" href="<?php  echo create_url('site', array('name' => 'modules','do' => 'payment','op'=>'list'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    支付方式                                  
                                </a>   </li><?php }?>  <?php if (in_array("modules-thirdlogin",$menurule)) { ?> 
                                    <li> <a onclick="navtoggle('商城配置 - > 快捷登录')" href="<?php  echo create_url('site', array('name' => 'modules','do' => 'thirdlogin'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    快捷登录                                  
                                </a>   </li><?php }?> 
                               
                                  <?php if (in_array("shop-dispatch",$menurule)) { ?> 
                                  <li> <a onclick="navtoggle('模块 - > 配送方式')" href="<?php  echo create_url('site', array('name' => 'modules','do' => 'dispatch','op'=>'display'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    配送方式                                  
                                </a>   </li><?php }?>
                                 
                             <?php    if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/index/template/web/main_5.php'))
			{
								include_once  CUSTOM_ROOT.'/index/template/web/main_5.php';
			}
                     ?> 
                     
                     
                     
                     
                     
								                  
              <?php if (in_array("weixin-weixin",$menurule)) { ?>          
                      <li class="open" >
                    <a href="#" class="dropdown-toggle">
                       <i class="icon-double-angle-right"></i>
                        <span class="menu-text"> 微信设置</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                                           
                                               
                                       <li>
                                          <a onclick="navtoggle('微信设置 - > 微信号设置 ')"  href="<?php  echo create_url('site', array('name' => 'weixin','do' => 'setting'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        微信号设置                                
                                    </a>
                                </li>
                                               
                                               
                                              
                                       <li>
                                          <a onclick="navtoggle('微信设置 - > 菜单管理 ')"  href="<?php  echo create_url('site', array('name' => 'weixin','do' => 'designer'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        菜单管理                                
                                    </a>
                                </li>
                                               
                                               
                                              
                                       <li>
                                          <a onclick="navtoggle('微信设置 - > 自定义回复 ')"  href="<?php  echo create_url('site', array('name' => 'weixin','do' => 'rule'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        自定义回复                                
                                    </a>
                                </li>
                                            <li>
                                          <a onclick="navtoggle('微信设置 - > 快速关注设置 ')"  href="<?php  echo create_url('site', array('name' => 'weixin','do' => 'guanzhu'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        快速关注设置                                
                                    </a>
                                </li>        
                                                
                                              
                                                        </ul>
                                                    </li>
                       <?php }?>
                       
                       
                       
                       <?php if (in_array("alipay-alipay",$menurule)) { ?>          
                      <li class="open" >
                    <a href="#" class="dropdown-toggle">
                  <i class="icon-double-angle-right"></i>
                        <span class="menu-text"> 支付宝服务窗</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                                           
                                               
                                       <li>
                                          <a onclick="navtoggle('支付宝服务窗 - > 服务窗设置 ')"  href="<?php  echo create_url('site', array('name' => 'alipay','do' => 'setting'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        服务窗设置                                
                                    </a>
                                </li>
                                               
                                               
                                              
                                       <li>
                                          <a onclick="navtoggle('支付宝服务窗 - > 菜单管理 ')"  href="<?php  echo create_url('site', array('name' => 'alipay','do' => 'designer'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        菜单管理                                
                                    </a>
                                </li>
                                               
                                               
                                              
                                       <li>
                                          <a onclick="navtoggle('支付宝服务窗 - > 自定义回复 ')"  href="<?php  echo create_url('site', array('name' => 'alipay','do' => 'rule'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        自定义回复                                
                                    </a>
                                </li>
                                            <li>
                                          <a onclick="navtoggle('支付宝服务窗 - > 快速关注设置 ')"  href="<?php  echo create_url('site', array('name' => 'alipay','do' => 'guanzhu'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        快速关注设置                                
                                    </a>
                                </li>        
                                                
                                              
                                                        </ul>
                                                    </li>
                       <?php }?>
                       
                       
                     
                     
                                            </ul>
                                    </li>
                                      <?php }?>
                                    
								                  
								                  
								                  
								                  
								                  
								                  
                              
                              
                                   <?php $baijia_addons=array('addon6'=>array('title'=>'数据报表','icon'=>'icon-bar-chart'),
                                   'addon7'=>array('title'=>'积分兑换','icon'=>'icon-money'),
                                   'addon8'=>array('title'=>'微文章','icon'=>'icon-edit'),
                                   'addon9'=>array('title'=>'微单页','icon'=>'icon-list-alt')); if(is_array($modulelist)) { foreach($modulelist as $module) { 
                                   	if($module['name']=='addon6'||$module['name']=='addon7'||$module['name']=='addon8'||$module['name']=='addon9')
                                   	{
                                   		$baijia_addons[$module['name']]='';
                                   	?>
  
  
    <li>
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="<?php  echo (empty($module['icon'])||$module['icon']=='icon-flag')?'icon-sitemap':$module['icon'] ?>"></i>
                        <span class="menu-text"> <?php  echo $module['title'] ?></span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                                           
                                             <?php  foreach($module['menus'] as $menu) { ?>
  
                                       <li>
                                          <a href="<?php  echo $menu['href'] ?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        <?php  echo $menu['title'] ?>                                    
                                    </a>
                                </li>
                                               
                                               
                                            <?php  } ?>  
                                                        </ul>
                                                    </li>
                     <?php }  }}
                     
                     if(is_array($baijia_addons)) { foreach($baijia_addons as $index=>$module) { 
                     if(!empty($module)){
                      ?>     
                                     <li>
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="<?php  echo (empty($module['icon'])||$module['icon']=='icon-flag')?'icon-sitemap':$module['icon'] ?>"></i>
                        <span class="menu-text"> <?php  echo $module['title'] ?></span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                                           
                                          <li>
                                   	      	   <a onclick="navtoggle('互相营销管理 - > 点击下载互动插件')" href="http://addons.baijiacms.com/" target="_blank" >     
                                         <i class="icon-double-angle-right"></i>
                                        	点击下载互动插件                             
                                    </a>
                                </li>
                                                        </ul>
                                                    </li>
                           <?php  }  }}
                     
                      ?>        
  <?php if (in_array("user-user",$menurule)) { ?> 
    <li>
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-info-sign"></i>
                        <span class="menu-text"> 权限管理</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                                           
                                               
                                       <li>
                                          <a onclick="navtoggle('权限管理 - > 新增用户 ')"  href="<?php  echo create_url('site', array('name' => 'user','do' => 'user','op' => 'adduser'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        新增用户                                
                                    </a>
                                </li>
                                               
                                               
                                              
                                       <li>
                                          <a onclick="navtoggle('权限管理 - > 管理员列表 ')"  href="<?php  echo create_url('site', array('name' => 'user','do' => 'user','op' => 'listuser'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        管理员列表                                
                                    </a>
                                </li>
                                               
                                               
                                              
                                                        </ul>
                                                    </li>
                                <?php }?>
                                    
                                       
                                   <?php  if(is_array($modulelist)) { foreach($modulelist as $module) { 
                                   	if(($module['name']!='addon16'&&$module['name']!='addon11'&&$module['name']!='bj_hx'&&$module['name']!='addon6'&&$module['name']!='addon7'&&$module['name']!='addon8'&&$module['name']!='addon9'))
                                   	{
                                   	if($module['icon']=='yingxiao'||$module['name']=='addon2'||$module['name']=='addon3'||$module['name']=='addon4'||$module['name']=='addon10'||$module['name']=='addon12'||$module['name']=='addon13'||$module['name']=='addon14'||$module['name']=='addon15'){
                                   		?>
                                   		<?php
                                   	}else
                                   	{
                                   	?>
  
  
    <li>
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="<?php  echo (empty($module['icon'])||$module['icon']=='icon-flag')?'icon-sitemap':$module['icon'] ?>"></i>
                        <span class="menu-text"> <?php  echo $module['title'] ?></span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                                           
                                             <?php  foreach($module['menus'] as $menu) { ?>
  
                                       <li>
                                          <a href="<?php  echo $menu['href'] ?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        <?php  echo $menu['title'] ?>                                    
                                    </a>
                                </li>
                                               
                                               
                                            <?php  } ?>  
                                                        </ul>
                                                    </li>
                     <?php }  }}} ?>     
                                    
                                    
                                    
                                    
                                      <?php if (in_array("modules-update",$menurule)) { ?> 
                                          <li>
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-cloud"></i>
                        <span class="menu-text">云服务</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                                           
                                                 <li>
                                          <a onclick="navtoggle('系统管理 - > 系统维护')" href="<?php  echo create_url('site', array('name' => 'modules','do' => 'update'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        系统维护                                      
                                    </a>
                                </li>
                                    <!--  <li>
                                          <a onclick="navtoggle('系统管理 - > 插件扩展')" href="http://addons.baijiacms.com/" target="_blank" >                              
                                        <i class="icon-double-angle-right"></i>
                                        插件扩展                                      
                                    </a>
                                </li>  -->   <li>
                                          <a onclick="navtoggle('系统管理 - > 插件扩展')" href="<?php  echo create_url('site', array('name' => 'modules','do' => 'modules'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        插件扩展                                      
                                    </a>
                                </li>
                                                          
                                                        </ul>
                                                    </li>
                                          <?php }?>
                
            </ul>
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
            </div>

            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
            </script>
        </div>

        <div class="main-content">
            <div class="breadcrumbs" id="breadcrumbs">
                <script type="text/javascript">
                    try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                </script>

                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home home-icon"></i>
                        <a  onclick="navtoggle('首页')" href="<?php  echo create_url('site', array('name' => 'index','do' => 'center'))?>" target="main">首页</a>
                    </li>
                    <li class="active"><span id="activeworker">首页</span></li>
                </ul><!-- .breadcrumb -->

                <div class="nav-search" id="nav-search">

                </div><!-- #nav-search -->
            </div>

            <div class="page-content" style="padding: 1px 13px 24px;">

	 <iframe  scrolling="yes" frameborder="0" style="width:100%;min-height: 1000px; overflow:visible; height:100%;" name="main" id="main" src="<?php  echo create_url('site', array('name' => 'index','do' => 'center'))?>"></iframe>

            </div>
        </div>


    </div><!-- /.main-container-inner -->

</div>
</body>
</html>