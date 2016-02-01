<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<h3 class="header smaller lighter blue">优惠券发放管理</h3>
<form action="<?php  echo create_url('site', array('name' => 'bonus','do' => 'bonusview','op'=>'delete','id'=>$item['bonus_id']))?>" method="post"  class="form-horizontal" >
<table class="table table-striped table-bordered table-hover" >
			<thead>
				<tr>
					
		 <th class="text-center" ><input type="checkbox" class="check_all" />
		 	<input name="submit" type="submit" value="批量删除" class="btn btn-primary span3" onclick="return confirm('此操作不可恢复，确认删除？');return false;"></th>
		 <th class="text-center" >编号</th>
    <th class="text-center">订单号</th>
    <th class="text-center" >发放会员</th>
    <th class="text-center" >使用时间</th>
    <th class="text-center" >发放时间</th>
    <th class="text-center">操作</th>
				</tr>
			</thead>
		<?php  if(is_array($bonus_user_list)) { foreach($bonus_user_list as $item) { ?>
				<tr>
					
					<td class="text-center"><input value="<?php echo $item['bonus_id']; ?>" name="check[]" type="checkbox"></td>
					<td class="text-center"><?php echo $item['bonus_sn']; ?></td>
          <td class="text-center"><?php echo $item['ordersn']; ?></td>
           <td class="text-center"><?php echo $item['mobile']; ?>&nbsp;<?php echo $item['realname']; ?></td>
          <td class="text-center"><?php  if(empty($item['isuse'])||empty($item['used_time'])){echo '未使用';}else{ echo  date('Y-m-d H:i:s', $item['used_time']);} ?> </td>
          <td class="text-center"><?php echo date('Y-m-d H:i:s', $item['createtime']); ?></td>
         <td class="text-center">
						<a class="btn btn-xs btn-info" onclick="return confirm('此操作不可恢复，确认删除？');return false;"  href="<?php  echo create_url('site', array('name' => 'bonus','do' => 'bonusview','op'=>'delete','id'=>$item['bonus_id']))?>"><i class="icon-edit"></i>&nbsp;删&nbsp;除&nbsp;</a> </td>
                                </td>
				</tr>
				<?php  } } ?>
		</table>
		<?php  echo $pager;?>
		</form> 
<script>
	     $(function(){
            $(".check_all").click(function(){
          
            var checked = $(this).get(0).checked;
                    $("input[type=checkbox]").prop("checked", checked);
                    
            });
             });
	</script>
<?php  include page('footer');?>
								