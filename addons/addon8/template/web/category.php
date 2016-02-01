<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>

<h3 class="header smaller lighter blue"><?php  if(!empty($category['id'])) { ?>编辑<?php  }else{ ?>新增<?php  } ?>分类</h3>
<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" >
	
	<input type="hidden" name="parentid" value="<?php  echo $parent['id'];?>" />
	  		<?php  if(!empty($parentid)) { ?>
	   <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 上级分类</label>

										<div class="col-sm-9">
														<?php  echo $parent['name'];?>
										</div>
									</div>
		<?php  } ?>
		 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 图标</label>

										<div class="col-sm-9">
													<input type="text" name="icon" id="icon" class="col-xs-10 col-sm-2" readonly="readonly" value="<?php echo $category['icon'];?>" />&nbsp;&nbsp;&nbsp;<a  data-toggle="modal" data-target="#icon-list-modal" href="javascript:;">选择图标</a>

										</div>
									</div>
		
		   <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 排序</label>

										<div class="col-sm-9">
														<input type="text" name="displayorder" class="col-xs-10 col-sm-2" value="<?php  echo $category['displayorder'];?>" /><div class="help-block">越大越前</div>
										</div>
									</div>
	
			   <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 分类名称</label>

										<div class="col-sm-9">
												
									<input type="text" name="catename" class="col-xs-10 col-sm-2" value="<?php  echo $category['name'];?>" />
										</div>
									</div>
									
	
									
											 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > </label>

										<div class="col-sm-9">
                       
					<input name="submit" type="submit" value="提交" class="btn btn-primary span3">
												</div>
									</div>
									
										<?php  include page('icon-list-modal');?>
</form>
<?php  include page('footer');?>
