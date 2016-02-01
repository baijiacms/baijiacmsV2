<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<h3 class="header smaller lighter blue">优惠券管理</h3>

	<link type="text/css" rel="stylesheet" href="<?php echo RESOURCE_ROOT;?>/addons/common/css/datetimepicker.css" />
		<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>/addons/common/js/datetimepicker.js"></script>
<form action="" method="post" class="form-horizontal" >
	
	<input type="hidden" name="id" value="<?php  echo $bonus['type_id'];?>" />
	  	  
			   <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 类型名称</label>

										<div class="col-sm-9">
												
									<input type="text" name="type_name" class="col-xs-10 col-sm-2" value="<?php  echo $bonus['type_name'];?>" />
										</div>
									</div>
									
									
									   <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 优惠券金额</label>

										<div class="col-sm-9">
												
									<input type="text" name="type_money" class="col-xs-10 col-sm-2" value="<?php  echo $bonus['type_money'];?>" />
									<div class="help-block">此类型的优惠券可以抵销的金额</div>
										</div>
									</div>
									
									
									   <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 最小订单金额</label>

										<div class="col-sm-9">
												
												<input type="text" name="min_goods_amount" class="col-xs-10 col-sm-2" value="<?php  echo $bonus['min_goods_amount'];?>" />
										<p class="help-block">只有商品总金额达到这个数的订单才能使用这种优惠券</p>
										</div>
									</div>
									
										   <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 如何发放此类型优惠券</label>

										<div class="col-sm-9">
												
      									<input type="radio" name="send_type" value="0"  <?php  echo empty($bonus['send_type'])?"checked=\"true\"":"";?> onclick="showunit(0)">按用户发放      <input type="radio" name="send_type" value="1" onclick="showunit(1)" <?php  echo $bonus['send_type']==1?"checked=\"true\"":"";?>>按商品发放      <input type="radio" name="send_type" value="2" onclick="showunit(2)" <?php  echo $bonus['send_type']==2?"checked=\"true\"":"";?>>按订单金额发放      <input type="radio" name="send_type" value="3" onclick="showunit(3)" <?php  echo $bonus['send_type']==3?"checked=\"true\"":"";?>>线下发放的优惠券 
										</div>
									</div>
									 
									 
									 
									    <div class="form-group" id="1" style="display:none">
										<label class="col-sm-2 control-label no-padding-left" > 订单下限</label>

										<div class="col-sm-9">
												
   										  <input type="text" name="min_amount" class="col-xs-10 col-sm-2" value="<?php  echo $bonus['min_amount'];?>" />
									<p class="help-block">只要订单金额达到该数值，就会发放优惠券给用户</p>
     							</div>
									</div>
									
								
									
									    <div class="form-group" id="sel1">
										<label class="col-sm-2 control-label no-padding-left" > 发放起始日期</label>

										<div class="col-sm-9">
												
   										 	  <input type="text" readonly="readonly" name="send_start_date" id="send_start_date" class="col-xs-10 col-sm-2" value="<?php  echo date('Y-m-d H:i',empty($bonus['send_start_date'])?time():$bonus['send_start_date']);?>" />
										<div class="help-block">只有当前时间介于起始日期和截止日期之间时，此类型的优惠券才可以发放</div>
     							</div>
									</div>
									
									
									 <div class="form-group" id="sel2">
										<label class="col-sm-2 control-label no-padding-left" > 发放结束日期</label>

										<div class="col-sm-9">
												
   										 	  <input type="text" readonly="readonly" name="send_end_date" id="send_end_date" class="col-xs-10 col-sm-2" value="<?php  echo date('Y-m-d H:i',empty($bonus['send_end_date'])?time():$bonus['send_end_date']);?>" />
								
     							</div>
									</div>
										
										 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 使用起始日期</label>

										<div class="col-sm-9">
												
   										 	  <input type="text" readonly="readonly" name="use_start_date" id="use_start_date" class="col-xs-10 col-sm-2" value="<?php  echo date('Y-m-d H:i',empty($bonus['use_start_date'])?time():$bonus['use_start_date']);?>" />
									<div class="help-block">只有当前时间介于起始日期和截止日期之间时，此类型的优惠券才可以使用</div>
     							</div>
									</div>
									
										 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > 使用结束日期</label>

										<div class="col-sm-9">
												
   										 	  <input type="text" readonly="readonly" name="use_end_date" id="use_end_date" class="col-xs-10 col-sm-2" value="<?php  echo date('Y-m-d H:i',empty($bonus['use_end_date'])?time():$bonus['use_end_date']);?>" />
								
     							</div>
									</div>
									
									
									
											 <div class="form-group">
										<label class="col-sm-2 control-label no-padding-left" > </label>

										<div class="col-sm-9">
                       
					<input name="submit" type="submit" value="提交" class="btn btn-primary span3">
												</div>
									</div>
</form>   
<script>
		$("#send_start_date").datetimepicker({
			format: "yyyy-mm-dd hh:ii",
			minView: "0",
			//pickerPosition: "top-right",
			autoclose: true
		});
		$("#send_end_date").datetimepicker({
			format: "yyyy-mm-dd hh:ii",
			minView: "0",
			autoclose: true
		});
		$("#use_start_date").datetimepicker({
			format: "yyyy-mm-dd hh:ii",
			minView: "0",
			autoclose: true
		});
		$("#use_end_date").datetimepicker({
			format: "yyyy-mm-dd hh:ii",
			minView: "0",
			autoclose: true
		});
	function gObj(obj)
{
  var theObj;
  if (document.getElementById)
  {
    if (typeof obj=="string") {
      return document.getElementById(obj);
    } else {
      return obj.style;
    }
  }
  return null;
}

function showunit(get_value)
{
  gObj("1").style.display =  (get_value == 2) ? "" : "none";
  if((get_value != 1 && get_value != 2))
  {
  document.getElementById('sel1').style.display  =  "none";
  document.getElementById('sel2').style.display  =  "none";
}else
	{
		 document.getElementById('sel1').style.display  =  "block";
		 
		 document.getElementById('sel2').style.display  =  "block";
		
		}
  return;
}
showunit(<?php  echo intval($bonus['send_type'])?>);
	</script>
<?php  include page('footer');?>
