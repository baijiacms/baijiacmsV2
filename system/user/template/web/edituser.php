<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
 <form action="" method="post" class="form-horizontal" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="<?php  echo $account['id'];?>" />
					<h3 class="header smaller lighter blue"><?php   if(empty($account['id'])){ ?>新增<?php  }else{ ?>编辑<?php  } ?>用户</h3>
        <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 用户名：</label>

										<div class="col-sm-9">
											 <input type="text" name="username"  class="col-xs-10 col-sm-2" value="<?php  echo $account['username'];?>" />
										</div>
									</div>
											  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 账户类型：</label>

										<div class="col-sm-9">
											
											 <input name="is_admin" value="1" id="is_admin" type="radio" <?php   if(empty($account['id'])){echo "checked";}else{ echo !empty($account['is_admin'])?"checked":"";} ?> />系统管理员，<input name="is_admin" value="0" id="is_admin" type="radio" <?php   if(empty($account['id'])){}else{ echo !empty($account['is_admin'])?"":"checked";} ?>>普通用户
										 	
<span class="help-block">系统管理员拥有所有权限，无需另行设置权限。普通用户需设置权限才能访问</span>
										</div>
									</div>
									
									
												  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 所属用户组：</label>

										<div class="col-sm-9">
											
						<select name="groupid" id="groupid">
						<option value="0">请选择所属用户组</option>
						
						
				<?php  if(is_array($user_group_list)) { foreach($user_group_list as $item) { ?>
				<option value="<?php echo $item['id'];?>"><?php echo $item['groupName'];?></option>
								<?php  } } ?>
											</select>
											<span class="help-block">分配用户所属用户组后，该用户会自动拥有此用户组内的操作权限</span>
										</div>
									</div>
									<script>
										<?php   if(!empty($account['groupid'])){ ?>
											document.getElementById("groupid").value="<?php echo $account['groupid'];?>";
										<?php   } ?>
										</script>
												<?php   if(empty($account['id'])){ ?>
									    <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" for="form-field-1"> 新密码：</label>

										<div class="col-sm-9">
											   <input type="password"  name="newpassword"  class="col-xs-10 col-sm-2" />
										</div>
									</div>
									
									  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" for="form-field-1"> 确认密码：</label>

										<div class="col-sm-9">
											<input type="password"  name="confirmpassword" class="col-xs-10 col-sm-2"  />
										</div>
									</div>
										<?php   } ?>
								  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" for="form-field-1"> </label>

										<div class="col-sm-9">
										<input name="submit" type="submit" value=" 提 交 " class="btn btn-info"/>
										
										</div>
									</div>

    </form>

<?php  include page('footer');?>