<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<h3 class="header smaller lighter blue">余额配置</h3>
<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
      <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 支付方式名称：</label>

										<div class="col-sm-9">
													<?php  echo $item['name'];?>
										</div>
									</div>
		
		 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 支付方式描述：</label>

										<div class="col-sm-9">
													  <?php  echo $item['desc'];?>
										</div>
									</div>
									
											 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 支付方式描述：</label>

										<div class="col-sm-9">
													<textarea name="gold_pay_desc" id="gold_pay_desc" cols="60" rows="8"><?php  echo $configs['gold_pay_desc'];?></textarea>
										</div>
									</div>


												 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 排序优先级：</label>

										<div class="col-sm-9">
													  <input type="text" class="col-xs-10 col-sm-2" name="pay_order" value="<?php  echo $item['order'];?>" />
                   <p class="help-block">越大支付时候显示越前</p>
										</div>
									</div>
									
									
											 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 是否货到付款：</label>

										<div class="col-sm-9">
													    <?php if(empty($item['iscod'])||$item['iscod']==0){?>
         										否<?php }else{ ?>
                                是
                                 <?php }?> 
										</div>
									</div>
									
										 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 是否在线支付：</label>

										<div class="col-sm-9">
													     <?php if(empty($item['online'])||$item['online']==0){?>
         	否<?php }else{ ?>
                                是
                                 <?php }?> 
										</div>
									</div>
									
									
												  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" for="form-field-1"> </label>

										<div class="col-sm-9">
										<input name="submit" type="submit" value=" 提 交 " class="btn btn-info"/>
										
										</div>
									</div>
		</form>

	<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>addons/common/ueditor/ueditor.config.js?x=1211"></script>
<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>addons/common/ueditor/ueditor.all.min.js?x=141"></script>
<script type="text/javascript">var ue = UE.getEditor('gold_pay_desc');</script>