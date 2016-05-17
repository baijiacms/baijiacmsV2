<?php defined('SYSTEM_IN') or exit('Access Denied');?>
    <?php if(checkrule('member','list')||checkrule('member','rank')||checkrule('member','outchargegold')){ ?>    
         <li class="open active">
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-group"></i>
                        <span class="menu-text"> 会员管理</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                                           
                                          <?php if(checkrule('member','list')){ ?>       
                                       <li>
                                          <a onclick="navtoggle('会员管理 - > 会员管理 ')"  href="<?php  echo create_url('site', array('name' => 'member','do' => 'list'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        会员管理                                
                                    </a>
                                </li><?php }?>
                                                <?php if(checkrule('member','rank')){ ?>   
                                           <li>
                                          <a onclick="navtoggle('会员管理 - > 会员等级管理 ')"  href="<?php  echo create_url('site', array('name' => 'member','do' => 'rank'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        会员等级                                
                                    </a>
                                </li>    <?php }?>
                                 <?php if(checkrule('member','outchargegold')){ ?>   
                                        <li>
                                          <a onclick="navtoggle('会员管理 - > 余额提现申请 ')"  href="<?php  echo create_url('site', array('name' => 'member','do' => 'outchargegold'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        余额提现审核                              
                                    </a>
                                </li>       <?php }?>
                                
                                
                                            </ul>
                                    </li>
                                    
                                     <?php }?>
                                    
                                    
                                            <?php if(checkrule('shop','goods')||checkrule('shop','category')){ ?> 
                                    
                                      <li class="open active">
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-shopping-cart"></i>
                        <span class="menu-text"> 商品管理</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">              <!-- 子菜单 第二级-->
                   
                   
                         <?php if(checkrule('shop','goods')){ ?>
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
		                                
		                                
		                                
		                                
		                                    <?php  if(is_array($modulelist)) { foreach($modulelist as $module) { 
                                   	if($module['name']=='addon16'||$module['name']=='addon11')
                                   	{
                                   		?>
                                  
  
  
    <li  class="open">
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                         <i class="icon-double-angle-right"></i>
                        <span class="menu-text"> <?php  echo $module['title'] ?></span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                                           
                                             <?php  foreach($module['menus'] as $menu) { ?>
  
                                       <li>
                                          <a href="<?php  echo $menu['href'] ?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        <?php  echo $menu['title'] ?>                                    
                                    </a>
                                </li>
                                               
                                               
                                            <?php  } ?>  
                                                        </ul>
                                                    </li>
                     <?php   }}} ?>     
		                                
		                                
		                                
		                                
                                    </ul>
                                    </li>
                                    
                                    <?php }?>
                                    
                             
                                
                                       <?php if(checkrule('bonus','bonus')||checkrule('promotion','promotion')){ ?>
                                 <li class="open active">
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-gift"></i>
                        <span class="menu-text"> 促销管理</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                    	   <?php if(checkrule('bonus','bonus')){ ?>
                        <li> <a  onclick="navtoggle('促销管理 - > 优惠券管理')"  href="<?php  echo create_url('site', array('name' => 'bonus','do' => 'bonus','op'=>'display'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    优惠券管理                                  
                                </a>   </li>
                                 
                                     <?php  } ?> 
                                       <?php if(checkrule('promotion','promotion')){ ?>
                                     <li> <a  onclick="navtoggle('促销管理 - > 促销免运费')"  href="<?php  echo create_url('site', array('name' => 'promotion','do' => 'promotion','op'=>'display'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    促销免运费                                 
                                </a>   </li>
                                   <?php  } ?> 
               
                                            </ul>
                                    </li>
                                     <?php  } ?>
                                    
                                    	   <?php if(checkrule('shopwap','themes')||checkrule('shopwap','fansindex_menu')||checkrule('shop','adv')){ ?>
                                       <li class="open active">
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-cogs"></i>
                        <span class="menu-text"> 商城模板</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                    	    	   <?php if(checkrule('shopwap','themes')){ ?>
                    	 <li> <a  onclick="navtoggle('商城配置 - > 模板设置')"  href="<?php  echo create_url('site', array('name' => 'shopwap','do' => 'themes','op'=>'display'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    商城主题模板                                  
                                </a>    </li>     <?php  } ?> 
                                	   <?php if(checkrule('shopwap','fansindex_menu')){ ?>
                                            <li> <a  onclick="navtoggle('商城配置 - > 个人中心菜单')"  href="<?php  echo create_url('site', array('name' => 'shopwap','do' => 'fansindex_menu','op'=>'display'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    个人中心菜单                                  
                                </a>    </li><?php  } ?> 
                                  <?php if(checkrule('shop','adv')){ ?>
                                  <li> <a  onclick="navtoggle('商城配置 - > 首页广告')"  href="<?php  echo create_url('site', array('name' => 'shop','do' => 'adv','op'=>'display'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    首页广告                                  
                                </a>   </li><?php  } ?> 
                                
                    </ul>
                  </li>
                          <?php  } ?> 