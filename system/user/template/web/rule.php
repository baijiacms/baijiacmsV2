<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data" >
    	    <input type="hidden" value="<?php echo $id ?>"  name="id"  />
					<h3 class="header smaller lighter blue">权限设置</h3>
        <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 用户名：</label>

										<div class="col-sm-9">
										 <?php echo $username ?>
										</div>
									</div>
									
									  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" for="form-field-1"> 权限：</label>

										<div class="col-sm-9">
											       <?php $index=1; foreach($allrule as $item){?>
			                	 <input id="s<?php echo $index;$index++?>" type="checkbox" name="<?php echo $item['modname'].'-'.$item['moddo'] ?>" value="1" <?php echo $item['check']==true?"checked":""?> ><?php echo $item['moddescription'] ?>
			                      <br/>	<?php }?>
			                      <script>
			                      function checkrule(ischecked)
			                      {
			                      	for(var i=1;i<<?php echo $index;?>;i++)
			                      	{
			                      	document.getElementById("s"+i).checked=ischecked;
			                      	
			                      	}
			                      
			                     	}</script>
			                      <strong><a href="javascript:;" onclick="checkrule(true)">全选</a>，<a href="javascript:;"  onclick="checkrule(false)">全否</a></strong>
			                	
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