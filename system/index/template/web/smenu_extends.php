<?php defined('SYSTEM_IN') or exit('Access Denied');?>
  <?php  if(is_array($modulelist)) { foreach($modulelist as $module) { 
                                   	if(($module['name']=='bj_hx'))
                                   	{
                                   	if($module['icon']=='yingxiao'||$module['name']=='addon2'||$module['name']=='addon3'||$module['name']=='addon4'||$module['name']=='addon10'||$module['name']=='addon12'||$module['name']=='addon13'||$module['name']=='addon14'||$module['name']=='addon15'){
                                   		?>
                                   		<?php
                                   	}else
                                   	{
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
  
                                       <li>
                                          <a href="<?php  echo $menu['href'] ?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        <?php  echo $menu['title'] ?>                                    
                                    </a>
                                </li>
                                               
                                               
                                            <?php  } ?>  
                                                        </ul>
                                                    </li>
                     <?php }  }}} ?>    
                         <li class="open active">
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-gift"></i>
                        <span class="menu-text"> 互相营销管理 </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                                       <?php $showdownload=true; if(is_array($modulelist)) { foreach($modulelist as $module) { 
                                   	if($module['icon']=='yingxiao'||$module['name']=='addon2'||$module['name']=='addon3'||$module['name']=='addon4'||$module['name']=='addon10'||$module['name']=='addon12'||$module['name']=='addon13'||$module['name']=='addon14'||$module['name']=='addon15'){
                                   	$showdownload=false;	?>
                                   		
                                   		
                                   		  <li class="open">
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
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
                        
                                
                                   		
                                   		<?php
                                   	}}}?>     
                                   	
                                   	
                                             <?php  if($showdownload) { ?>
                                   	      <li>
                                   	      	   <a onclick="navtoggle('互相营销管理 - > ')" href="" target="_blank" >     
                                         <i class="icon-double-angle-right"></i>
                                        	没有安装模块                        
                                    </a>
                                </li>
                                
                                
                           
                                
                                            <?php  } ?>  
                                         </ul>
														
								                  </li>
								                  
								                  
								                     <?php  if(is_array($modulelist)) { foreach($modulelist as $module) { 
                                   	if(($module['name']!='bj_tbk'&&$module['name']!='addon16'&&$module['name']!='addon11'&&$module['name']!='bj_hx'&&$module['name']!='addon6'&&$module['name']!='addon7'&&$module['name']!='addon8'&&$module['name']!='addon9'))
                                   	{
                                   	if($module['icon']=='yingxiao'||$module['name']=='addon2'||$module['name']=='addon3'||$module['name']=='addon4'||$module['name']=='addon10'||$module['name']=='addon12'||$module['name']=='addon13'||$module['name']=='addon14'||$module['name']=='addon15'){
                                   		?>
                                   		<?php
                                   	}else
                                   	{
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
  
                                       <li>
                                          <a href="<?php  echo $menu['href'] ?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        <?php  echo $menu['title'] ?>                                    
                                    </a>
                                </li>
                                               
                                               
                                            <?php  } ?>  
                                                        </ul>
                                                    </li>
                     <?php }  }}} ?>     
                              
                                   <?php $baijia_addons=array('addon6'=>array('title'=>'数据报表','icon'=>'icon-bar-chart'),
                                   'addon7'=>array('title'=>'积分兑换','icon'=>'icon-money'),
                                   'addon8'=>array('title'=>'微文章','icon'=>'icon-edit'),
                                   'addon9'=>array('title'=>'微单页','icon'=>'icon-list-alt')); if(is_array($modulelist)) { foreach($modulelist as $module) { 
                                   	if($module['name']=='addon7'||$module['name']=='addon8'||$module['name']=='addon9')
                                   	{
                                   		$baijia_addons[$module['name']]='';
                                   	?>
  
  
    <li >
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="<?php  echo (empty($module['icon'])||$module['icon']=='icon-flag')?'icon-sitemap':$module['icon'] ?>"></i>
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
                     <?php }  }}
                     
                      ?>     