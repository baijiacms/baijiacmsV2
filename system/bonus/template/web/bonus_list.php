<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<h3 class="header smaller lighter blue">优惠券管理&nbsp;&nbsp;&nbsp;<a href="<?php  echo web_url('bonus', array('do'=>'bonus','op'=>'post'));?>" class="btn btn-primary">添加优惠券</a></h3>
<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
		 <th class="text-center" >优惠券名称</th>
    <th class="text-center"  >发放类型</th>
    <th class="text-center" width="100px">优惠券金额</th>
    <th class="text-center" >最小订单金额</th>
    <th class="text-center" >发放数量</th>
      <th class="text-center">使用数量</th>
    <th class="text-center">操作</th>
				</tr>
			</thead>
		<?php  if(is_array($bonus_list)) { foreach($bonus_list as $item) { ?>
				<tr>
					<td class="text-center"><?php echo $item['type_name']; ?></td>
          <td class="text-center">
          	<?php echo $item['send_type']==0?'按用户发放':''; ?>
          	<?php echo $item['send_type']==1?'按商品发放':''; ?>
          	<?php echo $item['send_type']==2?'按订单金额发放':''; ?>
          	<?php echo $item['send_type']==3?'线下发放的优惠券':''; ?></td>
           <td class="text-center"><?php echo $item['type_money']; ?></td>
          <td class="text-center"><?php echo $item['min_goods_amount']; ?> </td>
          <td class="text-center"><?php echo $item['sendcount']; ?></td>
          <td class="text-center"><?php echo $item['usercount']; ?></td>
         <td class="text-center">
    			<a class="btn btn-xs btn-info"  href="<?php  echo create_url('site', array('name' => 'bonus','do' => 'bonusview','op'=>'post','id'=>$item['type_id']))?>"><i class="icon-zoom-out"></i>查看发放记录</a> 
                    	&nbsp;&nbsp;	       
                    	  	<?php if($item['send_type']!=2){?>
                                             	<a class="btn btn-xs btn-info"  href="<?php  echo create_url('site', array('name' => 'bonus','do' => 'sendbonus','op'=>'post','id'=>$item['type_id']))?>"><i class="icon-tasks"></i>&nbsp;发&nbsp;放&nbsp;</a> 
                    	&nbsp;&nbsp;	  	<?php } ?>                       	<a class="btn btn-xs btn-info"  href="<?php  echo create_url('site', array('name' => 'bonus','do' => 'bonus','op'=>'post','id'=>$item['type_id']))?>"><i class="icon-edit"></i>&nbsp;修&nbsp;改&nbsp;</a> 
                    	&nbsp;&nbsp;	<a class="btn btn-xs btn-info" onclick="return confirm('此操作不可恢复，确认删除？');return false;"  href="<?php  echo create_url('site', array('name' => 'bonus','do' => 'bonus','op'=>'delete','id'=>$item['type_id']))?>"><i class="icon-edit"></i>&nbsp;删&nbsp;除&nbsp;</a> </td>
                                </td>
				</tr>
				<?php  } } ?>
		</table>

<?php  include page('footer');?>
								