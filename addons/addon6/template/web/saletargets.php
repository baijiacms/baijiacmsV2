<?php 
// +----------------------------------------------------------------------
// | WE CAN DO IT JUST FREE
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 百家威信 <QQ:2752555327> <http://www.baijiacms.com>
// +----------------------------------------------------------------------
defined('SYSTEM_IN') or exit('Access Denied');?>
<?php  include page('header');?>
<h3 class="header smaller lighter blue">销售指标分析</h3>
		<div class="alert alert-info" style="margin:10px 0; width:auto;">
			<i class="icon-lightbulb"></i> 查询网店的销售指标(注：其中订单数指完成的订单数；订单总金额指完成的订单总金额。)
		</div>

			<form action="">
							<input type="hidden" name="mod" value="site" />
				<input type="hidden" name="name" value="addon6" />
				<input type="hidden" name="do" value="saletargets" />
				
		
		
			
	<h4 class="sub-title">平均每位客户订单金额</h4>
						<table class="table table-striped table-bordered table-hover">
											<thead >
										<tr>
											<th class="row-hover" style="width:200px">订单总金额</th>
											<th class="row-hover" style="width:200px">总会员数</th>
											<th class="row-hover" style="width:200px">平均每位客户订单金额</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td style="text-align: center;"><?php  echo $allorderprice;?>
											</td>
											<td style="text-align: center;width:200px"><?php  echo $allmembercount;?>
											</td>
											<td style="text-align: center;"><?php echo empty($allmembercount)?0:round(($allorderprice/$allmembercount),2);?>%
											</td>
										</tr>
									</tbody>
						</table>
		
				
				
			<h4 class="sub-title">平均每次访问订单金额</h4>
								<table  class="table table-striped table-bordered table-hover">
													<thead >
										<tr>
											<th class="row-hover" style="width:200px">订单总金额</th>
											<th class="row-hover" style="width:200px">总访问次数</th>
											<th class="row-hover" style="width:200px">平均每次访问订单金额</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td style="text-align: center;"><?php  echo $allorderprice;?>
											</td>
											<td style="text-align: center;width:200px"><?php  echo $allorderviewcount;?>
											</td>
											<td style="text-align: center;"><?php echo empty($allorderviewcount)?0:round(($allorderprice/($allorderviewcount)),2);?>%
											</td>
										</tr>
									</tbody>
								</table>
						
						
			<h4 class="sub-title">订单转化率</h4>
								<table  class="table table-striped table-bordered table-hover">
											<thead >
										<tr>
											<th class="row-hover"  style="width:200px">总订单数</th>
											<th class="row-hover" style="width:200px">总访问次数</th>
											<th class="row-hover"  style="width:200px">订单转化率</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td style="text-align: center;"><?php  echo $allordercount;?>
											</td>
											<td style="text-align: center;width:200px"><?php  echo $allorderviewcount;?>
											</td>
											<td style="text-align: center;"><?php  echo empty($allorderviewcount)?0:round(($allordercount/$allorderviewcount)*100,2);?>%
											</td>
										
								
										</tr>
									</tbody>
								</table>
						
						
			<h4 class="sub-title">注册会员购买率</h4>
								<table class="table table-striped table-bordered table-hover">
											<thead class="navbar-inner">
										<tr>
											<th class="row-hover"  style="width:200px">有过订单的会员</th>
											<th class="row-hover" style="width:200px">总会员数</th>
											<th class="row-hover"  style="width:200px">注册会员购买率</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td style="text-align: center;"  ><?php  echo $haveordermembercount;?>
											</td>
											<td style="text-align: center;width:200px"><?php  echo $allmembercount;?>
											</td>
											<td style="text-align: center;"  ><?php echo empty($allmembercount)?0:round(($haveordermembercount/($allmembercount))*100,2);?>%
											</td>
										
								
										</tr>
									</tbody>
								</table>
						
						
			<h4 class="sub-title">平均会员订单量</h4>
							<div class="sub-content">
								<table class="table table-striped table-bordered table-hover">
									<thead class="navbar-inner">
										<tr>
											<th class="row-hover"  style="width:200px">总订单数</th>
											<th class="row-hover" style="width:200px">总会员数</th>
											<th class="row-hover"  style="width:200px">平均会员订单量</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td style="text-align: center;"><?php  echo $allordercount;?>
											</td>
											<td style="text-align: center;width:200px"><?php  echo $allmembercount;?>
											</td>
											<td style="text-align: center;"><?php echo  empty($allmembercount)?0:round(($allordercount/($allmembercount))*100,2);?>%
											</td>
										
								
										</tr>
									</tbody>
								</table>
    	</form>
<?php  include page('footer');?>