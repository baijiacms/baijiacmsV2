<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
 <form action="" method="post" class="form-horizontal" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="<?php  echo $usergroup['id'];?>" />
					<h3 class="header smaller lighter blue">用户组</h3>
        <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 用户组名称：</label>

										<div class="col-sm-9">
											 <input type="text" name="groupName"  class="col-xs-10 col-sm-2"  value="<?php  echo $usergroup['groupName'];?>"  />
										</div>
									</div>
									
								  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" for="form-field-1"> </label>

										<div class="col-sm-9">
										<input name="submit" type="submit" value=" 提 交 " class="btn btn-info"/>
										
										</div>
									</div>

    </form>

<?php  include page('footer');?>