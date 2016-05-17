<?php defined('SYSTEM_IN') or exit('Access Denied');?>
                                   <?php $baijia_addons=array('addon6'=>array('title'=>'数据报表','icon'=>'icon-bar-chart')); 
                                   $has_addon6=false;
                                   if(is_array($modulelist)) { foreach($modulelist as $module) { 
                                   	if($module['name']=='addon6'&&checkrule('addon6','ALL'))
                                   	{
                                   		$has_addon6=true;
                                   		$baijia_addons[$module['name']]='';
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
          	       <?php  } }  }
          	       if($has_addon6==false)
          	       {
          	       
          	       ?>  
          	       
          	           <li class="open active">
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-bar-chart"></i>
                        <span class="menu-text"> 数据报表</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                    	 	      <li>   <a target="main" >  
                                   	      <i class="icon-double-angle-right"></i>
                                        	没有找到数据报表模块   </a>
                                </li>
                                               </ul>
          	
          	          </li>
          	       
          	         <?php  } ?>  
          	       
          	       
          	       