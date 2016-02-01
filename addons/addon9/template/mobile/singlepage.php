<?php defined('SYSTEM_IN') or exit('Access Denied');?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $singlepage['title'];?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no">
    </head>
    <style>
    	@charset "UTF-8";
*{
	-webkit-tap-highlight-color:rgba(0, 0, 0, 0);
	outline:0
	}
	
body,h1,h2,h3,h4,h5,h6,hr,p,blockquote,dl,dt,dd,ul,ol,li,pre,form,fieldset,legend,button,input,textarea,th,td{
	margin:0;
	padding:0;
	vertical-align:baseline
	}
	
img{
	border:0 none;
	vertical-align:top
	}
	
i,em{
	font-style:normal
	}
	
ol,ul{
	list-style:none
	}
	
input,select,button,h1,h2,h3,h4,h5,h6{
	font-size:100%;
	font-family:inherit
	}
	
table{
	border-collapse:collapse;
	border-spacing:0
	}
	
a,a:visited{
	text-decoration:none;
	color:#333
	}
	
body{
	margin:0 auto;
	min-width:320px;
	max-width:640px;
	height:100%;
	background:#FFF;
	font-size:14px;
	font-family:Helvetica,STHeiti STXihei, Microsoft JhengHei, Microsoft YaHei, Arial;
	line-height:1.5;
	color:#666;
	-webkit-text-size-adjust:100% !important;
	-webkit-user-select:none;
	-moz-user-select:none;
	-ms-user-select:none;
	user-select:none
	}
	
.hide,.h{
	display:none !important
	}
	
.show{
	display:block !important
	}
	.zidingyi img{
	max-width: 100%;
	height: auto;
	width: auto\9;
	vertical-align:bottom;
	vertical-align:top;
	} 	</style>
<body style=" margin:0 auto;">
	<div class="zidingyi">
<?php echo $singlepage['content'];?>
</div>
<?php if(!empty($singlepage['open_footer'])){?>
<?php include themePage('footer');?>
<?php }?>
</body>
</html>
