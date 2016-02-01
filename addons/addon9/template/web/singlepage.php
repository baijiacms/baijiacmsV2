<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<h3 class="header smaller lighter blue">编辑单页&nbsp;&nbsp;&nbsp;</h3>
<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
		<input type="hidden" name="id" class="col-xs-10 col-sm-2" value="<?php echo $singlepage['id'];?>" />
		 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 链接</label>

										<div class="col-sm-9">
											<?php if(!empty($singlepage['id'])){?>
													<input readonly="readlony" type="text"  name="mobile_url" class="col-xs-10 col-sm-6" value="<?php echo WEBSITE_ROOT;?><?php  echo create_url('mobile',array('name' => 'addon9','do' => 'singlepage','id'=>$singlepage['id']))?>" /> &nbsp;&nbsp;&nbsp;<a target="_blank" href="<?php echo WEBSITE_ROOT;?><?php  echo create_url('mobile',array('name' => 'addon9','do' => 'singlepage','id'=>$singlepage['id']))?>">预览</a>
													<?php }else{?>
													提交后生成链接
														<?php }?>
										</div>
									</div>
									
									
								
									
  
		 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 名称</label>

										<div class="col-sm-9">
													<input type="text" name="title" class="col-xs-10 col-sm-3" value="<?php echo $singlepage['title'];?>" />
										</div>
									</div>
									
												 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" >底部导航 </label>

									<div class="col-sm-9">
												   <input type="radio" name="open_footer" value="0" <?php echo empty($singlepage['open_footer'])?"checked=\"true\"":"";?>> 关闭  &nbsp;&nbsp;
             
              		  <input type="radio" name="open_footer" value="1" id="open_footer" <?php echo !empty($singlepage['open_footer'])?"checked=\"true\"":"";?>> 开启
             
										</div>
									</div>
									
										
																 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" >内容</label>

										<div class="col-sm-9">
													<textarea name="content" style="width:100px;height:200px;" class="span7"  id="content"   cols="70"><?php echo $singlepage['content'];?></textarea>
										</div>
									</div>	
									

									
												  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" for="form-field-1"> </label>

										<div class="col-sm-9">
										<input name="submit" type="submit" value=" 提 交 " class="btn btn-info"/>
										
										</div>
									</div>
		</form>
		
		<script>


			KindEditor.ready(function(K) {
				var editor;
			
					if (editor) {
						editor.remove();
						editor = null;
					}
					editor = K.create('textarea[name="content"]', {
						allowFileManager : false,
						height:'400px',
						 filterMode: false,
						 
						 formatUploadUrl:false,
		uploadJson : "<?php echo WEBSITE_ROOT.mobile_url('keupload',array('name'=>'shop'));?>",
						newlineTag : 'br',
								items : [
						'source','fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist', '|', 'emoticons', 'image',  'multiimage','insertfile','link']
					});
			
				
			});


</script>

<?php  include page('footer');?>
