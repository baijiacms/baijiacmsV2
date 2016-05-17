<?php defined('SYSTEM_IN') or exit('Access Denied');?>
				   <?php if($_CMS['addons_bj_tbk']) { ?>  
				   	   <?php if($cfg['bj_tbk_protimes']>0) { ?>
				   	   
				   	   
				   	   <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left"> 佣金金额</label>

										<div class="col-sm-9">
												
          	<input type="radio" name="customCommission" value="0" id="customCommission"  onClick="changecommissiondiv(0)" <?php  if($bj_tbk_good_commission['customCommission'] == 0) { ?>checked="true"<?php  } ?>> 整站佣金
            &nbsp;&nbsp;
          <input type="radio" name="customCommission" value="1" id="customCommission" onClick="changecommissiondiv(1)" <?php  if($bj_tbk_good_commission['customCommission'] == 1) { ?>checked="true"<?php  } ?>> 自定义佣金
       
										</div>
		</div>
		

				   	     <span id="commission_div" style="display:none">
		  <div class="form-group">
	<label class="col-sm-2 control-label no-padding-left" > 分佣方式：</label>
										<div class="col-sm-9">
											
            			<script>
            				var type1=true;
            				var type2=false;
            				</script>
				<input <?php  echo empty($bj_tbk_good_commission['customCommissionType'])?'checked':'';?> type="radio" id="commissionType1" name="customCommissionType" value="0" onchange="type2=false;if(type1==true){type1=false;return;}if(confirm('分佣模式即将改变成【普通模式】，数据变动较大，是否确认更改')){document.getElementById('commissionType2').checked=false;document.getElementById('commissionType1').checked=true;}else{document.getElementById('commissionType1').checked=false;document.getElementById('commissionType2').checked=true;}" > 普通模式 ，
			<input <?php  echo $bj_tbk_good_commission['customCommissionType']==1?'checked':'';?> type="radio" id="commissionType2" name="customCommissionType" value="1" onchange="type1=false;if(type2==true){type2=false;return;}if(confirm('分佣模式即将改变成【省钱模式】，数据变动较大，是否确认更改')){document.getElementById('commissionType1').checked=false;document.getElementById('commissionType2').checked=true;}else{document.getElementById('commissionType2').checked=false;document.getElementById('commissionType1').checked=true;}"> 省钱模式
						
				
									</div>
									</div>
		
		
		
			<div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 1级佣金：</label>

										<div class="col-sm-9">
												
          	 <input type="text" name="bj_tbk_commission" id="bj_tbk_commission" value="<?php  echo (empty($item['id'])&&empty($bj_tbk_good_commission['commission1']))?$cfg['bj_tbk_globalCommission']:$bj_tbk_good_commission['commission1'];?>" /> %
										</div>
		</div>
		
		
		<?php 
		
			$clevel=intval($cfg['bj_tbk_globalCommissionLevel']);
				for($tlevel=2;$tlevel<=$clevel;$tlevel++)
				{
					?>
						<div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" >  <?php echo $tlevel;?>级佣金：</label>

										<div class="col-sm-9">
												
          	 <input type="text" name="bj_tbk_commission<?php echo $tlevel;?>" id="bj_tbk_commission<?php echo $tlevel;?>" value="<?php  echo (empty($item['id'])&&empty($bj_tbk_good_commission['commission'.$tlevel]))?$cfg['bj_tbk_globalCommission'.$tlevel]:$bj_tbk_good_commission['commission'.$tlevel];?>" />  %
										</div>
		</div>	
					
					
					<?php
				}
		
		?>
		</span>
			<script>
							function changecommissiondiv(selects)
							{
										
								if(selects==1)
								{
									document.getElementById('commission_div').style.display="block";
								}else
									{
										document.getElementById('commission_div').style.display="none";
										}
								
								
								
								
							}
				 changecommissiondiv("<?php  echo empty($bj_tbk_good_commission['customCommission'])?0:$bj_tbk_good_commission['customCommission'] ;?>");
						
							</script>
			   <?php } ?>  
		      <?php }?>
		  		<?php 
				  if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/common/extends/class/shop/template/web/goods_2.php'))
			{
  			require(CUSTOM_ROOT.'/common/extends/class/shop/template/web/goods_2.php');
				}
				
				?>
				