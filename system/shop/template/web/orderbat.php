<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>

<script>
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
	</script>
	<h3 class="header smaller lighter blue">批量发货</h3>
<form action="" method="post" class="form-horizontal">
				
				   <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 批量设置快递公司：</label>

										<div class="col-sm-9">
													<select  name="expressall" id="expressall" >
														<option value="-2" >请选择</option>
			 	<option value="-1" data-name="">无需快递</option>
			 			<?php   foreach($dispatchlist as $dispatchitem) { ?>
			 			<option value="<?php echo $dispatchitem['code'];?>" data-name="<?php echo $dispatchitem['name'];?>"><?php echo $dispatchitem['name'];?></option>
			 					<?php   } ?>
								</select>
										</div>
									</div>
				
								  <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" for="form-field-1">	<button type="submit"  name="sendbatexpress" value="sendbatexpress" class="btn btn-warning">批量发货</button>
								 </label>

										<div class="col-sm-9">
										
										</div>
									</div>
					
				
 
	<h3 class="blue">	<span style="font-size:18px;"><strong>订单总数：<?php echo $total ?></strong></span></h3>

	<table class="table table-striped table-bordered table-hover">
			<thead >
				<tr>
							<th style="width:30px;"> <input type="checkbox" class="check_all" /></th>
				<th style="width:100px;" id="expressno">快递公司</th>      
					<th style="width:120px;">快递单号</th>
					<th style="width:120px;">订单编号</th>
							<th style="width:100px;">收货人姓名</th>
					<th style="width:80px;">联系电话</th>
					<th style="width:80px;">支付方式</th>
					<th style="width:80px;">配送方式</th>
					<th style="width:50px;">运费</th>
					<th style="width:50px;">总价</th>         
					<th style="width:50px;">状态</th>
					<th style="width:150px;">下单时间</th>
				
				</tr>
			</thead>
			<tbody id="allorders">
				
								<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
								<td class="with-checkbox">  <input type="checkbox" onchange="onchangcheckbox();" name="check[]" value="<?php  echo $item['id'];?>"></td>
							<td  ><select onchange="onchangcheckbox();" name="express<?php  echo $item['id'];?>" id="express<?php  echo $item['id'];?>" >
								<option value="-1" data-name="">无需快递</option>
									<?php   foreach($dispatchlist as $dispatchitem) { ?>
			 			<option value="<?php echo $dispatchitem['code'];?>" data-name="<?php echo $dispatchitem['name'];?>"><?php echo $dispatchitem['name'];?></option>
			 					<?php   } ?>
								</select> <input type='hidden'  name='expresscom<?php  echo $item['id'];?>' id='expresscom<?php  echo $item['id'];?>'  />
							<script>
								if(jsSelectIsExitItem(document.getElementById("express<?php  echo $item['id'];?>"),"<?php  echo $item['dispatchexpress'];?>"))
				{
			document.getElementById("express<?php  echo $item['id'];?>").value='<?php  echo $item['dispatchexpress'];?>';	
				}
								</script>	</td>
			<td><input type="text" id="expressno<?php  echo $item['id'];?>" name="expressno<?php  echo $item['id'];?>"  placeholder="请输入快递单号"  value="">
								</td>
					<td><?php  echo $item['ordersn'];?></td>
					<td><?php  echo $item['address_realname'];?></td>
					<td><?php  echo $item['address_mobile'];?></td>
					<td>
							<?php  echo $item['paytypename'];?>
						</td>
				
					<td>
						<?php  echo $dispatchdata[$item['dispatch']]['dispatchname'];?>
						</td>
           <td><?php  echo $item['dispatchprice'];?></td>
			
					<td><?php  echo $item['price'];?> 元</td>
					<td>
															<?php  if($item['status'] == 0) { ?><span class="label label-warning" >待付款</span><?php  } ?>
						<?php  if($item['status'] == 1) { ?><span class="label label-danger" >待发货</span><?php  } ?>
						<?php  if($item['status'] == 2) { ?><span class="label label-warning">待收货</span><?php  } ?>
						<?php  if($item['status'] == 3) { ?><span class="label label-success" >已完成</span><?php  } ?>
						<?php  if($item['status'] == -1) { ?><span class="label label-success">已关闭</span><?php  } ?>
						<?php  if($item['status'] == -2) { ?><span class="label label-danger">退款中</span><?php  } ?>
						<?php  if($item['status'] == -3) { ?><span class="label label-danger">换货中</span><?php  } ?>
						<?php  if($item['status'] == -4) { ?><span class="label label-danger">退货中</span><?php  } ?>
						<?php  if($item['status'] == -5) { ?><span class="label label-success">已退货</span><?php  } ?>
						<?php  if($item['status'] == -6) { ?><span class="label  label-success">已退款</span><?php  } ?>
						
						</td>
					<td><?php  echo date('Y-m-d H:i:s', $item['createtime'])?></td>
		
				</tr>
				<?php  } } ?>
			</tbody>
			
		</table>
			</form>

<script>
	function onchangcheckbox()
	{
		
                 
                    $("input[name='check[]']").each(function(){ 
          
            var obj = $("#express"+$(this).val());  
            var sel =obj.find("option:selected").attr("data-name");
        
            $("#expresscom"+$(this).val()).val(  sel );
										}); 
											
		
	}
	onchangcheckbox();
     $(function(){
                  $("#expressall").change(function(){
          var obj = $(this);
          var target_val =obj.find("option:selected").val();
          if(target_val==-2)
          {
          	return false;
          }
          $("#allorders select").each(function() {
            var obj = $(this);
            console.log(obj);
            obj.val(target_val);
          });
          	onchangcheckbox();
        });
            $(".check_all").click(function(){
            var checked = $(this).get(0).checked;
                    $("input[type=checkbox]").prop("checked", checked);
                    
            });
             });
	</script>
<?php  include page('footer');?>
