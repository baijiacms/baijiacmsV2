<?php defined('SYSTEM_IN') or exit('Access Denied');?>

          <?php if(checkrule('shop','order')||checkrule('shop','orderbat')||checkrule('shop','goods_comment')){ ?>
  	 <li class="open active">
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-tasks"></i>
                        <span class="menu-text"> 订单管理</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu" >
                    <?php if(checkrule('shop','order')){ ?>
                        <li> <a  onclick="navtoggle('订单管理 - > 所有订单')"  href="<?php  echo create_url('site',  array('name' => 'shop','do'=>'order','op' => 'display', 'status' => -99))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    所有订单                                  
                                </a>   </li>
                                    <?php }?>
                                       <?php if(checkrule('shop','orderbat')){ ?>
		                                  <li> <a onclick="navtoggle('订单管理 - > 批量发货')" href="<?php  echo create_url('site', array('name' => 'shop','do'=>'orderbat','op' => 'display'))?>" target="main">
		                                    <i class="icon-double-angle-right"></i>
		                                    批量发货                                  
		                                </a>   </li>        
		                                     <?php }?>
		                                        <?php if(checkrule('shop','goods_comment')){ ?>
		                                   <li> <a onclick="navtoggle('订单管理 - > 评论管理')" href="<?php  echo create_url('site', array('name' => 'shop','do'=>'goods_comment','op' => 'display'))?>" target="main">
		                                    <i class="icon-double-angle-right"></i>
		                                    评论管理                                  
		                                </a>   </li>   <?php }?>
		                                
		                                
                                    </ul>
                                    </li> <?php }?>
                                    
                                    
                                      <?php if(checkrule('shop','goods')||checkrule('shop','category')){ ?> 
                                      <li class="open active">
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-shopping-cart"></i>
                        <span class="menu-text"> 商品管理</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">              <?php if(checkrule('shop','goods')){ ?>
                        <li> <a  onclick="navtoggle('商品管理 - > 商品列表')"  href="<?php  echo create_url('site', array('name' => 'shop','do' => 'goods','op'=>'display'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    商品列表                                  
                                </a>   </li>       
                                  <li> <a onclick="navtoggle('商品管理 - > 添加新商品')" href="<?php  echo create_url('site', array('name' => 'shop','do' => 'goods','op'=>'post'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    添加新商品                                  
                                </a>   </li><?php }?>
                                 <?php if(checkrule('shop','category')){ ?>
                                  <li> <a onclick="navtoggle('商品管理 - > 管理分类')" href="<?php  echo create_url('site', array('name' => 'shop','do' => 'category','op'=>'display'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    管理分类                              
                                </a>   </li><?php }?>
                                 
                              
                                            </ul>
                                    </li>
                                    <?php }?>
                                    
  <?php  if(is_array($modulelist)) { foreach($modulelist as $module) { 
                              
                                   	if($module['name']=='bj_tbk'){
                                   
                                   	?>
  
  
    <li class="open active">
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="<?php  echo (empty($module['icon'])||$module['icon']=='icon-flag')?'icon-sitemap':$module['icon'] ?>"></i>
                        <span class="menu-text"> <?php  echo $module['title'] ?></span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                                           
                                             <?php  foreach($module['menus'] as $menu) { ?>
   <?php $t_url_array=parse_url($menu['href']); parse_str($t_url_array['query'],$t_url_array);  if(checkrule($module['name'],$t_url_array['do'])){ ?>
                                       <li>
                                          <a href="<?php  echo $menu['href'] ?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        <?php  echo $menu['title'] ?>                                    
                                    </a>
                                </li>
                                          <?php }?>     
                                               
                                            <?php  } ?>  
                                                        </ul>
                                                    </li>
                     <?php   }}} ?>    
          	       
          	       