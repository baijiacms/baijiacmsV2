<?php defined('SYSTEM_IN') or exit('Access Denied');?>
<?php  include page('header');?>
     <form method="post" class="form-horizontal" enctype="multipart/form-data" >
		<h3 class="header smaller lighter blue">短信设置</h3>

			
												<div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 短信验证手机号</label>

										<div class="col-sm-9">
													   <input type="radio" name="regsiter_usesms" value="0" id="regsiter_usesms" <?php  if($settings['regsiter_usesms'] == 0) { ?>checked="true"<?php  } ?> /> 关闭  &nbsp;&nbsp;
             
              		  <input type="radio" name="regsiter_usesms" value="1" id="regsiter_usesms"  <?php  if($settings['regsiter_usesms'] == 1) { ?>checked="true"<?php  } ?> /> 开启
             
											</div>
									</div>
		  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 短信key：</label>

										<div class="col-sm-9">
										     <input type="text" name="sms_key" class="col-xs-10 col-sm-4" value="<?php  echo $settings['sms_key'];?>" />
										</div>
									</div>
									
									 
									
									  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 短信Secret：</label>

										<div class="col-sm-9">
                          <input type="text" name="sms_secret" class="col-xs-10 col-sm-4" value="<?php  echo $settings['sms_secret'];?>"/>
										</div>
									</div>
									
									  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 短信过期时间：(秒)</label>

										<div class="col-sm-9">
                          <input type="text" name="sms_secret_sec" class="col-xs-10 col-sm-4" value="<?php  echo $settings['sms_secret_sec'];?>"/>
										</div>
									</div>
										  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 短信多久可重发：(秒)</label>

										<div class="col-sm-9">
                          <input type="text" name="sms_secret_resec" class="col-xs-10 col-sm-4" value="<?php  echo $settings['sms_secret_resec'];?>"/>
										</div>
									</div>
									
									
									  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 一天同一个业务最多发送多少条短信：<br/>默认5条</label>

										<div class="col-sm-9">
                          <input type="text" name="sms_secret_count" class="col-xs-10 col-sm-4" value="<?php  echo $settings['sms_secret_count'];?>"/>
										</div>
									</div>
									
									
									  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" ></label>

										<div class="col-sm-9">
                        
									<input name="submit" id="submit" type="submit" value="保存设置" class="btn btn-primary span3" />
										</div>
									</div>
              
				<h3 class="header smaller lighter blue">短信测试</h3>
		
		  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 测试手机号：</label>

										<div class="col-sm-9">
										     <input type="text" name="sms_test_tell" class="col-xs-10 col-sm-4" value="" />
										</div>
									</div>
									
										  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" ></label>

										<div class="col-sm-9">
                        
									<input name="smstest" id="submit" type="submit" value="发送测试" class="btn btn-primary span3" />
										</div>
									</div>

    </form>
 
<?php  include page('footer');?>