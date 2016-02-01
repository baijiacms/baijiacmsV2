<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
    <form method="post" class="form-horizontal" enctype="multipart/form-data" >
		<h3 class="header smaller lighter blue">系统维护</h3>
        <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 授权状态：</label>

										<div class="col-sm-9">
										  	Apache Licence2 开源协议
										</div>
									</div>
									
									  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 本地版本：</label>

										<div class="col-sm-9">
											    <?php echo $localversion ?>
										</div>
									</div>
									       <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 检查修复：</label>

										<div class="col-sm-9">
										<strong>  <a  href="<?php  echo create_url('site', array('name' => 'modules','do' => 'checkupdate','act'=>'toupdate'))?>" target="parent" >                              
                                        数据库检查修复</a></strong>
										</div>
									</div>
								
									
							 
						 </form>			
								
<?php  include page('footer');?>