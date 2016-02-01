<?php defined('SYSTEM_IN') or exit('Access Denied');?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<title> <?php  echo empty($settings['shop_title'])?'':$settings['shop_title'];?></title>
<meta name="description" content="<?php  echo empty($settings['shop_description'])?'':$settings['shop_description'];?>" />
<meta name="keywords" content="<?php  echo empty($settings['shop_keyword'])?'':$settings['shop_keyword'];?>">
<link rel="stylesheet" href="<?php echo RESOURCE_ROOT;?>/addons/public/component-min.css">
<link rel="stylesheet" href="<?php echo RESOURCE_ROOT;?>/addons/public/jbox-min.css">
<link rel="stylesheet" href="<?php echo RESOURCE_ROOT;?>/addons/public/common_login_reg.css">

</head>
<body>
		<form method='post' target="_parent" name="login" id="login-form" action="<?php  echo web_url('login',array('name'=>'public'))?>">
	<div class="login">
		<a href="/" class="logo"></a>
		<div class="login-inner">
			<h1 class="login-title"><?php  echo empty($settings['shop_title'])?'':$settings['shop_title'];?></h1>
			<div class="login-item mgb20">
				<input type="text" class="clearError"  name="username"  id="ipt_account" placeholder="请输入登录账号" tabindex="1">
				<a href="javascript:;" class="clearIpt j-clearIpt"><i class="gicon-remove"></i></a>
			</div>
			<div class="login-item mgb20">
				<input type="password" class="clearError" name="password" id="ipt_pwd" placeholder="请输入密码" tabindex="2">
				<a href="javascript:;" class="clearIpt j-clearIpt"><i class="gicon-remove"></i></a>
			</div>
			<div class="login-item mgb20">
					<input type="text" class="clearError" name="verify" id="ipt_code" placeholder="验证码" data-autohide="1" tabindex="3">
					<a href="javascript:;" class="clearIpt j-clearIpt"><i class="gicon-remove"></i></a>
			</div>
			<div class="mgb20">
					<img id="verifyimg" onClick="fleshVerify()"  alt="点击切换" src="<?php  echo web_url('verify',array('name'=>'public'))?>" style="cursor:pointer;width:265px;height:70px"/>
			</div>
		<!--	<div class="checkbox-group clearfix mgb20">
				<label class="fl"><input type="checkbox" id="rd_remember" checked>记住密码</label>
				<a href="/Public/forget" class="fr login-forgetlink">忘记密码？</a>
			</div>-->
			<div>
				       <button type="submit"  class="login-btn"  >登 陆</button>	
				   </div>
			 
		</div>
		<p class="copyright"> <a href="http://bbs.baijiacms.com" target="_blank">&copy;百家cms微商城</a> </p>
	</div>
	<!-- end login -->
   </form>
	<div class="tooltips" data-origin="ipt_account" data-currentleft="0">
		<span class="tooltips-arrow tooltips-arrow-left"><em>◆</em><i>◆</i></span>
		<span class="tooltips-content">请输入手机号码或邮箱</span>
	</div>

	<div class="tooltips" data-origin="ipt_pwd" data-currentleft="0">
		<span class="tooltips-arrow tooltips-arrow-left"><em>◆</em><i>◆</i></span>
		<span class="tooltips-content">请输入密码</span>
	</div>

	<div class="tooltips" data-origin="ipt_code" data-currentleft="0">
		<span class="tooltips-arrow tooltips-arrow-left"><em>◆</em><i>◆</i></span>
		<span class="tooltips-content">请输入验证码</span>
	</div>
	<!-- end tooltips -->


	<script type="text/j-template" id="tpl_hint">
		<div class="hint hint-<%= type %>"><%= content %></div>
	</script>
	<!-- end hint -->
	<script src="<?php echo RESOURCE_ROOT;?>/addons/public/lib-min.js"></script>
	<script src="<?php echo RESOURCE_ROOT;?>/addons/public/jquery.jbox-min.js"></script>
	<script src="<?php echo RESOURCE_ROOT;?>/addons/public/component-min.js"></script>
	<script src="<?php echo RESOURCE_ROOT;?>/addons/public/common_login_reg.js"></script>
	<!--[if lt IE 10]>
		<script src="<?php echo RESOURCE_ROOT;?>/addons/public/jquery.placeholder-min.js"></script>
		<script>
		$(function(){
			//修复IE下的placeholder
			$('input').placeholder();
		});
		</script>
	<![endif]-->

	<script>
			document.onkeydown   =ieHandler; 
		function   ieHandler(){ 
			if(window.event.keyCode==13)
				{
				dologin();
				}
		}
			function dologin()
		{

			var pw = $("#ipt_pwd");
			var idname = $("#ipt_account");
				var verifycode = $("#ipt_code");
			if(idname.val() == "") {
				LoginShowError(idname,"请输入用户名!");
				return false;
			}
			if (pw.val() == "" ){
							LoginShowError(pw,"请输入密码!");
				return false;
			}
				if (verifycode.val() == "" ){
								LoginShowError(verifycode,"请输入验证码!");
				return false;
			}

		
			return true;
		}
		
    	$("form").submit(function(){
    		if(dologin()==false)
    		{
    		return false;	
    		}
    		return true;

    	
    	});
    	
    	
			function fleshVerify(){
	var verifyimg = $("#verifyimg").attr("src");
	if( verifyimg.indexOf('?')>0){
                    $("#verifyimg").attr("src", verifyimg+'&random='+Math.random());
                }else{
                    $("#verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
                }
	}
	$(function(){
                        	});
	</script>
	<!-- end session hint -->
</body>
</html>