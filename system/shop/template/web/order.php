<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>

<h3 class="header smaller lighter blue">订单基本信息</h3>

<form action="" target="_blank">
	<input type="hidden" name="name" value="addon16" />
	<input type="hidden" name="do"  value="print" />
	<input type="hidden" name="op"  value="normal_print" />
		<input type="hidden" name="mod"  value="site" />
	
	<input type="hidden" name="print_orderid" id="print_orderid" value="" />
		<div id="modal-normalprint" class="modal  fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">快递单打印</h4>
      </div>
      <div class="modal-body">
      	
      		  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 打印模板：</label>

										<div class="col-sm-9">
														<select name="print_modle_id"  >
																	<?php  foreach($normal_order_list as $item){?>
										<option value="<?php echo $item['id'];?>" data-name=""><?php echo $item['name'];?></option>
										
													<?php } ?>
                                        </select>
										</div>
									</div>
      	
      	
      	  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > </label>

										<div class="col-sm-9">
      								</div>
									</div>
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-primary" name="do_normal_print" value="yes">打印</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭窗口</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
</form>

<form action="" target="_blank">
		<input type="hidden" name="name" value="addon16" />
	<input type="hidden" name="do"  value="print" />
	<input type="hidden" name="op"  value="express_print" />
			<input type="hidden" name="mod"  value="site" />
	<input type="hidden" name="print_express_orderid" id="print_express_orderid" value="" />
		<div  id="modal-expressprint"  class="modal  fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">发货单打印</h4>
      </div>
      <div class="modal-body">
      	
      		  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 打印模板：</label>

										<div class="col-sm-9">
														<select name="print_modle_id"  >
																	<?php  foreach($express_order_list as $item){?>
										<option value="<?php echo $item['id'];?>" data-name=""><?php echo $item['name'];?></option>
										
													<?php } ?>
                                        </select>
										</div>
									</div>
									
									  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > </label>

										<div class="col-sm-9">
      								</div>
									</div>
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-primary" name="do_normal_print" value="yes">打印</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭窗口</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
</form>
	
	
<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" >
<input type="hidden" name="id" value="<?php  echo $order['id'];?>">
		<table class="table">
			<tr>
			<th style="width:150px"><label for="">订单编号:</label></th>
				<td >
					<?php  echo $order['ordersn']?>
				</td>
			<th style="width:150px"><label for="">订单状态:</label></th>
				<td >
														<?php  if($order['status'] == 0) { ?><span class="label label-warning" >待付款</span><?php  } ?>
						<?php  if($order['status'] == 1) { ?><span class="label label-danger" >待发货</span><?php  } ?>
						<?php  if($order['status'] == 2) { ?><span class="label label-warning">待收货</span><?php  } ?>
						<?php  if($order['status'] == 3) { ?><span class="label label-success" >已完成</span><?php  } ?>
						<?php  if($order['status'] == -1) { ?><span class="label label-success">已关闭</span><?php  } ?>
						<?php  if($order['status'] == -2) { ?><span class="label label-danger">退款中</span><?php  } ?>
						<?php  if($order['status'] == -3) { ?><span class="label label-danger">换货中</span><?php  } ?>
						<?php  if($order['status'] == -4) { ?><span class="label label-danger">退货中</span><?php  } ?>
						<?php  if($order['status'] == -5) { ?><span class="label label-success">已退货</span><?php  } ?>
						<?php  if($order['status'] == -6) { ?><span class="label label-success">已退款</span><?php  } ?>
				</td>
			</tr>
			<tr>
			<th ><label for="">下单时间:</label></th>
				<td >
									<?php  echo date('Y-m-d H:i:s', $order['createtime'])?>
				</td>
				<th ><label for="">总金额:</label></th>
				<td >
						<?php  echo $order['price']?>
				</td>
			</tr>
			<tr>
				<th ><label for="">支付方式:</label></th>
				<td >
					<?php  echo $order['paytypename'];?>
				</td>
				<th ><label for="">配送方式:</label></th>
				<td >
												<?php  if(empty($order['isverify'])){?>
						<?php  echo $dispatchdata[$order['dispatch']]['dispatchname'];?>
							<?php  }else{ ?> 线下核销	<?php  } ?>
				</td>
			</tr>
						<?php  if(!empty($order['isverify'])){?>
					<?php  if($_CMS['addons_bj_hx']){?>
			<tr>
				<th ><label for="">核销门店:</label></th>
				<td >
					<?php  echo $order['verify_name'];?>
				</td>
				<th ><label for="">核销员:</label></th>
				<td >
										
						<?php  $vmember=member_get($order['verify_openid']); if(!empty($vmember['realname'])){echo $vmember['realname'];}else{ if(!empty($vmember['mobile'])){echo $vmember['mobile'];}else{ if(!empty($vmember['openid'])){echo "<a href=".web_url('detail',array('name'=>'member','openid' => $vmember['openid'])).">点击查看核销员信息</a>";}}}?>
						
				</td>
			</tr>	<?php  } ?>
				<?php  } ?>
			<?php  if($order['hasbonus']>0) { ?>
			<tr>
				<th ><label for="">	优惠卷抵消金额：</label></th>
				<td >
						<?php  echo $order['bonusprice']?>
				</td>
				<th ><label for="">优惠卷编号：</label></th>
				<td>
				<?php  
				foreach ($bonuslist as $bonus) {
				echo $bonus['type_name']."(".$bonus['bonus_sn'].")<br/>";
			}?>
				</td>
			</tr>
			<?php  } ?>
			
						<?php  if($order['status']>=2) { ?>
			<tr>
				<th ><label for="">	寄送方式：</label></th>
				<td >
							<?php  include page('expressdata');?>
						<?php   if(!empty($order['express'])&&$order['express']!="-1"){ echo $expressarray[$order['express']];}?>
				</td>
				<th ><label for="">快递编号：</label></th>
				<td>
						<?php  echo $order['expresssn']?>		<?php  if(!empty($order['express'])&&$order['express']!="-1"){?>
					<a target="_blank" href="http://m.kuaidi100.com/index_all.html?type=<?php  echo $order['express']?>&postid=<?php  echo $order['expresssn']?>#input"  >
			[查看物流信息]<?php } ?>
				</td>
			</tr>
			<?php  } ?>
			</table>
			<h3 class="header smaller lighter blue">收货人信息</h3>
		
			<table class="table ">
					<tr>
				<th style="width:150px"><label for="">收货人姓名:</label></th>
				<td  style="width:250px">
					<?php  echo $order['address_realname']?>
				</td>
				<th ><label for="">收货地址:</label></th>
				<td >
		<?php  echo $order['address_province'];?><?php  echo $order['address_city'];?><?php  echo $order['address_area'];?><?php  echo $order['address_address'];?>
				</td>
			</tr>
				<tr>
								<th  style="width:150px"><label for="">联系电话:</label></th>
				<td >
						<?php  echo $order['address_mobile']?>
				</td>
				<th ><label for="">订单备注:</label></th>
				<td >
	<textarea readonly="readonly" style='width:300px;border: none;' type="text"><?php  echo $order['remark'];?></textarea>
				</td>
			</tr>
					<?php   if(!empty($weixin_wxfans)||!empty($alipay_alifans)) {?>
			<tr>
						<th  style="width:150px"><label for="">微信账户:</label></th>
				<td >
						<?php foreach($weixin_wxfans as $wxfans) { ?>
						<?php echo $wxfans['nickname']; ?>
						<?php  }?>
				</td>
						<th  style="width:150px"><label for="">支付宝账户:</label></th>
				<td >
						<?php foreach($alipay_alifans as $alifans) { ?>
						<?php echo $alifans['nickname']; ?> 
						<?php  }?>
				</td>
			</tr>
			<?php  } ?>

			<?php  if($order['status'] <=-2) { ?>
			<tr>
				<th ><label for="">	<?php  if($order['status'] == -2||$order['status'] == -6) { ?>退款<?php  } ?><?php  if($order['status'] == -3) { ?>换货<?php  } ?><?php  if($order['status'] == -4||$order['status'] == -5) { ?>退货<?php  } ?>原因</label></th>
				<td >
					<textarea readonly="readonly" style='width:300px;border: none;' type="text"><?php  echo $order['rsreson'];?></textarea>		
				</td>
				<th ></th>
				<td>
		
				</td>
			</tr>
			<?php  } ?>
		</table>
		
<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th style="width:50px;">序号</th>
					<th >商品标题</th>
            <th >商品规格</th>
					<th >货号</th>
					
          <th style="color:red;">成交价</th>
					<th >数量</th>
				
				</tr>
			</thead>
			<?php  $i=1;?>
			<?php  if(is_array($order['goods'])) { foreach($order['goods'] as $goods) { ?>
			<tr>
				<td><?php  echo $i;$i++?></td>
				<td><?php  echo $goods['title'];?>
                                </td>
                                <td> <?php  if(!empty($goods['optionname'])) { ?><?php  echo $goods['optionname'];?><?php  } ?></td>
				<td><?php  echo $goods['goodssn'];?></td>

         <td style='color:red;font-weight:bold;'><?php  echo $goods['orderprice'];?></td>
				<td><?php  echo $goods['total'];?></td>
				
			</tr>
			<?php  } } ?>
		</table>
				<table class="table table-hover">
		<tr>
				<td >订单备注：</td>
				<td>
					<textarea style="height:150px;" class="span7" name="remark" cols="70"><?php  echo $order['remark']?></textarea>
				</td>	
					</table>
		<table class="table" >
			<tr>
				<th  style="width:50px"></th>
				<td>
					<?php  if($order['status']==0) { ?>
						<button type="submit" class="btn btn-danger span2" onclick="return confirm('确认付款此订单吗？'); return false;" name="confrimpay" value="confrimpay">确认付款</button>
					<?php  } ?>
					
					<?php if($order['status'] == 1&&empty($order['isverify'])) { ?>
						<button type="button" class="btn btn-primary span2" name="confirmsend" data-toggle="modal" data-target="#modal-confirmsend" value="confirmsend">确认发货</button>
					
					<?php  } ?>
						 
					<?php  if($order['status'] == 2) { ?>
						<button type="submit" class="btn btn-danger span2" name="cancelsend" onclick="return confirm('取消发货此订单吗？'); return false;" value="cancelsend">取消发货</button>
         <?php  } ?>
							<?php if($order['status'] == 1&&!empty($order['isverify'])) { ?>
								<button type="submit" class="btn btn-success span2" onclick="return confirm('确认完成此订单吗？'); return false;" name="finish" value="finish">完成订单</button>
				
								<?php  } ?>
						 
							
					
					<?php  if($order['status'] ==2) { ?>
					<button type="submit" class="btn btn-success span2" onclick="return confirm('确认完成此订单吗？'); return false;" name="finish" value="finish">完成订单</button>
				<?php  } ?>
					
							<?php  if(($order['status']==-2||$order['status']==1)&&$order['paytype']!=3) { ?>
						<button type="submit" class="btn btn-danger span2" onclick="return confirm('确认退款此订单吗？'); return false;" name="returnpay" value="returnpay">确认退款</button>
					<?php  } ?>
					
						<?php  if($order['status']==-3) { ?>
						<button type="button" class="btn btn-danger span2" data-toggle="modal" data-target="#modal-confirmsend" name="resend" value="resend">确认换货</button>
					<?php  } ?>
						<?php  if($order['status']==-4) { ?>
						<button type="submit" class="btn btn-danger span2" onclick="return confirm('确认退货此订单吗？'); return false;" name="returngood" value="returngood">确认退货</button>
					<?php  } ?>
							<?php if ($order['status']==-2||$order['status']==-3||$order['status']==-4){ ?>
					<button type="submit" class="btn span2" name="cancelreturn" onclick="return confirm('此订单要退回申请吗？'); return false;" value="cancelreturn">退回申请</button>
					<?php  } ?>
					<?php  if($order['status']==0||$order['status']==1||$order['status']==2||($order['status']<-1&&$order['status']>-5)) { ?>
					<button type="submit" class="btn span2" name="close" onclick="return confirm('永久关闭此订单吗？'); return false;" value="close">关闭订单</button>
					<?php  } ?>
					
								<?php  if($hasaddon16) { ?>
						&nbsp;<a onclick="document.getElementById('print_orderid').value='<?php  echo $order['id']?>';$('#modal-normalprint').modal()" href="javascript:;">发货单打印</a>
						&nbsp;
						<a    onclick="document.getElementById('print_express_orderid').value='<?php  echo $order['id']?>';$('#modal-expressprint').modal()" href="javascript:;">快递单打印</a>
					<?php  } ?>
				</td>
			</tr>
		</table>
		<div id="modal-confirmsend" class="modal  fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">快递信息</h4>
      </div>
      <div class="modal-body">
      	
      		  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 快递公司：</label>

										<div class="col-sm-9">
													<select name="express" id='express'>
															<option value="-1" data-name="">无需快递</option>
					                  <?php   foreach($dispatchlist as $dispatchitem) { ?>
			 			<option value="<?php echo $dispatchitem['code'];?>" data-name="<?php echo $dispatchitem['name'];?>"><?php echo $dispatchitem['name'];?></option>
			 					<?php   } ?>
													</select>
                                       <input type='hidden' class='input span3' name='expresscom' id='expresscom'  />
										</div>
									</div>
      	
      		  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 快递单号：</label>

										<div class="col-sm-9">
											
												<input type="text" name="expresssn" class="span5" />
											</div>
									</div>
      	
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-primary" name="confirmsend" value="yes">确认发货</button>
      	
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭窗口</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
	</form>
<script language='javascript'>
	function jsSelectIsExitItem(objSelect,objItemValue)   
{   
     var isExit = false ;   
     for ( var i=0;objSelect.length>i;i++)   
     {   
         if (objSelect.options[i].value == objItemValue)   
         {   
             isExit = true ;   
             break ;   
         }   
     }        
     return isExit;   
}
				if(jsSelectIsExitItem(document.getElementById("express"),"<?php  echo $order['dispatchexpress'];?>"))
				{
			document.getElementById("express").value='<?php  echo $order['dispatchexpress'];?>';	
				}
     $(function(){
         <?php  if(!empty($express)) { ?>
             $("#express").val("<?php  echo $express['express_url'];?>");
             $("#expresscom").val(  $("#express").find("option:selected").attr("data-name"));
         <?php  } ?>
             
        $("#express").change(function(){
          
            var obj = $(this);  
            var sel =obj.find("option:selected").attr("data-name");
            $("#expresscom").val(  sel.val() );
        });
      
    })
    
</script>