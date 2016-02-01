<?php defined('SYSTEM_IN') or exit('Access Denied');?>
		
		<?php  if($_CMS['addons_bj_hx']) { ?>
		 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 线下核销：</label>

										<div class="col-sm-9">
												 <input type="radio" name="isverify"  onchange="changeverifyshopdiv(1)" id="isverify" value="1" <?php  if($item['isverify'] == 1) { ?>checked="true"<?php  } ?> /> 开启  &nbsp;&nbsp;
             <input type="radio" name="isverify" id="isverify"  onchange="changeverifyshopdiv(0)"  value="0"  <?php  if(empty($item['isverify'])) { ?>checked="true"<?php  } ?> /> 关闭
										</div>
		</div>
		 <div class="form-group" id="verifyshopdiv">
										<label class="col-sm-2 control-label no-padding-left" > 适用门店</label>

										<div class="col-sm-9">
												 <select style="margin-right:15px;" id="verifyshop" name="verifyshop">
												 	 <option value="" title="">请选择门店</option>
           <?php  if(is_array($verifylist)) { foreach($verifylist as $row) { ?>
              <option value="<?php  echo $row['id'];?>"  label="<?php  echo $row['vname'];?>" title="<?php  echo $row['vname'];?>"><?php  echo $row['vname'];?></option>
           	<?php  } } ?>
                                                                            </select><input name="addbtn" type="button" value="+" class="btn btn-info" onclick="addShop()">
                                                                            
                                                                            已添加门店：<span id="verifyshopspan"><?php if(is_array($bj_hx_verify_goods)) { foreach($bj_hx_verify_goods as $verify_good){?>
	<input type='checkbox' name='verifyshop_cb[]' value="<?php echo  $verify_good['verifyid']?>" checked='true' /> <?php echo  $verify_good['vname']?>
<?php } } ?></span>
										</div>
		</div>
			<?php  } ?>
			
				<?php 
				  if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/common/extends/class/shop/template/web/goods_1.php'))
			{
  			require(CUSTOM_ROOT.'/common/extends/class/shop/template/web/goods_1.php');
				}
				
				?>
			