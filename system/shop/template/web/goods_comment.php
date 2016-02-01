<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>

<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>/addons/common/js/jquery-ui-1.10.3.min.js"></script>
<h3 class="header smaller lighter blue">评论管理</h3>

	<table class="table table-striped table-bordered table-hover">
  <tr >
 <th class="text-center" >序号</th>
      <th class="text-center">评论人昵称/手机号</th>
     <th class="text-center">订单编号</th>
          <th class="text-center">商品名称</th>
  <th class="text-center">评级</th>
    <th class="text-center">评论</th>
    <th class="text-center" >操作</th>
  </tr>

		<?php $index=0; if(is_array($list)) { $index=$index+1; foreach($list as $item) { ?>
				<tr>
				 <td style="text-align:center;"><?php echo  $index ?></td>

                                     
											
											      	<td style="text-align:center;"><?php  echo empty($item['realname'])?$item['mobile']:$item['realname'];?></td>
										                 	<td style="text-align:center;"><?php  echo $item['ordersn'];?></td>
											      	   	<td style="text-align:center;"><?php  echo $item['title'].(empty($item['optionname'])?'':'['.$item['optionname'].']'); ?></td>
												<td style="text-align:center;"><?php  echo empty($item['rate'])?'差评':($item['rate']==2?'好评':'中评');?></td>
                                        	<td style="text-align:center;"><?php  echo $item['comment'];?></td>
										<td style="text-align:center;">
						<a  class="btn btn-xs btn-info" href="<?php  echo web_url('goods_comment', array('id' => $item['id'], 'op' => 'delete'))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;"><i class="icon-edit"></i>&nbsp;删&nbsp;除&nbsp;</a></a>
				
					
					</td>
				</tr>
				<?php  } } ?>
 	
		</table>
		<?php  echo $pager;?>

<?php  include page('footer');?>
