<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
    <form method="post" class="form-horizontal" enctype="multipart/form-data" >
		<h3 class="header smaller lighter blue">关于系统</h3>
        <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 系统版本：</label>

										<div class="col-sm-9">
										  开源版
										</div>
									</div>
									   
									
									  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 版本号：</label>

										<div class="col-sm-9">
											    <?php echo $localversion ?>
										</div>
									</div>
									   <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 开发模式：<br/>(关闭提升性能)</label>

										<div class="col-sm-9">
										  <?php  if($core_development== 1) { ?>开启&nbsp;&nbsp;&nbsp; <a  href="<?php  echo create_url('site', array('name' => 'modules','do' => 'update','act'=>'development','status'=>0))?>"  >                              
                                        点此关闭</a><?php  } ?> <?php  if($core_development== 0) { ?>关闭&nbsp;&nbsp;&nbsp; <a  href="<?php  echo create_url('site', array('name' => 'modules','do' => 'update','act'=>'development','status'=>1))?>"  >                              
                                        点此开启</a><?php  } ?>
										</div>
									</div>
									       <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 版本检查升级：</label>

										<div class="col-sm-9">
										<strong>  <a  href="<?php  echo create_url('site', array('name' => 'modules','do' => 'checkupdate','act'=>'toupdate'))?>" target="_parent" >                              
                                        版本检查升级</a></strong>
										</div>
									</div>
								
									
							 
						 </form>			
								
<?php  include page('footer');?>