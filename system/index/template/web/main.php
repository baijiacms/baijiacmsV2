<?php defined('SYSTEM_IN') or exit('Access Denied');?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=10" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php  echo empty($settings['shop_title'])?'百家cms开源版':$settings['shop_title'];?></title>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		<meta name="description" content="<?php  echo empty($settings['shop_description'])?'百家cms开源版':$settings['shop_description'];?>" />
		<meta name="keywords" content="<?php  echo empty($settings['shop_keyword'])?'百家cms开源版':$settings['shop_keyword'];?>">
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
<body scrolling="no" style="overflow:auto;">
<div class="navbar navbar-default" id="navbar">
<div  id="navbar-container">
	
<div class="navbar-header pull-left">
    <a href="#" class="navbar-brand" style="height:45px">
        <small>
            <i class="icon-leaf"></i>
            <span id='accountname'>百家cms开源版</span>
        </small>
    </a><!-- /.brand -->
</div>
<div class="navbar-header pull-left">
  <ul class="nav ace-nav" style="height:45px">
	<li class="light-blue">
    <a class="dropdown-toggle"  href="<?php  echo create_url('site',array('name' => 'index','do' => 'main','smenu'=>'home'))?>">
        <i class="icon-home"></i>
        <span>&nbsp;首&nbsp;页&nbsp;</span>
    </a> 
    
</li> 

<li class="light-blue">
    <a class="dropdown-toggle"  href="<?php  echo create_url('site',array('name' => 'index','do' => 'main','smenu'=>'shop'))?>" >
        <i class=" icon-shopping-cart"></i>
        <span>&nbsp;商&nbsp;城&nbsp;</span>
    </a> 
</li> 

     <?php 
                                   if(is_array($modulelist)) { foreach($modulelist as $module) { 
                                   	if($module['name']=='addon6'&&checkrule('addon6','ALL'))
                                   	{ 	?>
<li class="light-blue">
    <a class="dropdown-toggle"  href="<?php  echo create_url('site',array('name' => 'index','do' => 'main','smenu'=>'statistical'))?>">
        <i class="icon-book"></i>
        <span>&nbsp;统&nbsp;计&nbsp;</span>
    </a> 
</li>  <?php  } } }?>  
<li class="light-blue">
    <a class="dropdown-toggle"  href="<?php  echo create_url('site',array('name' => 'index','do' => 'main','smenu'=>'extends'))?>" >
        <i class="icon-cloud"></i>
        <span>&nbsp;扩&nbsp;展&nbsp;</span>
    </a> 
</li> 
<li class="light-blue">
    <a class="dropdown-toggle"  href="<?php  echo create_url('site',array('name' => 'index','do' => 'main','smenu'=>'setting'))?>" >
        <i class="icon-gear"></i>
        <span>&nbsp;系统配置&nbsp;</span>
    </a> 
</li> 
 </ul>
</div><!-- /.navbar-header -->

<div class="navbar-header pull-right" role="navigation">
<ul class="nav ace-nav" style="height:45px">
<li class="Larger">
    <a class="dropdown-toggle"  href="<?php  echo WEBSITE_ROOT.'index_pc.php';?>" target="_blank">
        <i class="icon-mobile-phone"></i>
        <span>PC端商城首页</span>
    </a> 
</li>
<li class="Larger">
    <a class="dropdown-toggle"  href="<?php  echo WEBSITE_ROOT.'index.php';?>" target="_blank">
        <i class="icon-mobile-phone"></i>
        <span>手机端商城首页</span>
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
            <a onclick="navtoggle('修改密码')" href="<?php  echo create_url('site',array('name' => 'index','do' => 'changepwd'))?>" target="main">
                <i class="icon-info-sign"></i>
                修改密码
            </a>
        </li>
        <li>
            <a onclick="navtoggle('退出系统')" href="<?php  echo create_url('site',array('name' => 'public','do' => 'logout'))?>">
                <i class="icon-off"></i>
                退出系统
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
          	<?php if(empty($_GP['smenu'])||"home"==$_GP['smenu']){ ?>
          	  <?php   require "smenu_home.php";?> 
          	  <?php   }?> 
          	
          	  	<?php if("shop"==$_GP['smenu']){ ?>
          	  <?php   require "smenu_shop.php";?> 
          	  <?php   }?> 
          	  
          	  	<?php if("statistical"==$_GP['smenu']){ ?>
          	  <?php   require "smenu_statistical.php";?> 
          	  <?php   }?> 
          	  
          
          	  	<?php if("setting"==$_GP['smenu']){ ?>
          	  <?php   require "smenu_setting.php";?> 
          	  <?php   }?> 
          	  
          	  <?php if("extends"==$_GP['smenu']){ ?>
          	  <?php   require "smenu_extends.php";?> 
          	  <?php   }?> 
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

	 <iframe  scrolling="yes"  frameborder="0" style="width:100%;;min-height:600px;overflow:visible; height:100%;"   name="main" id="iframepage" src="<?php  echo create_url('site', array('name' => 'index','do' => 'center'))?>"></iframe>

            </div>
        </div>


    </div><!-- /.main-container-inner -->
<script language="javascript">
    function frameresize(){
        var winheight = $(window).height();
        var iframeheight = winheight;
        $('#iframepage').css('height', iframeheight-100 + 'px');
    };
                                      
    if(window.attachEvent){
        document.getElementById("iframepage").attachEvent('onload', frameresize);
    }
    else{
        document.getElementById("iframepage").addEventListener('load', frameresize, false);
    } 
                                      
    $(window).resize(frameresize);
    frameresize();
</script>
</div>
</body>
</html>