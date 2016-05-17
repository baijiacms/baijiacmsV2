<?php defined('SYSTEM_IN') or exit('Access Denied');?>
                             <?php if(checkrule('shop','config')||checkrule('shop','noticemail')||checkrule('shop','setting')||checkrule('modules','payment')||checkrule('modules','thirdlogin')||checkrule('modules','dispatch')){ ?>   
                                          <li class="open active">
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-cogs"></i>
                        <span class="menu-text"> 基础配置</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
		                                  <?php if(checkrule('shop','config')){ ?>     
                        <li> <a  onclick="navtoggle('商城配置 - > 商城基础设置')"  href="<?php  echo create_url('site', array('name' => 'shop','do' => 'config'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    商城基础设置                                  
                                </a>   </li>
                                
                                <?php  } ?> 
                                    <?php if(checkrule('shop','noticemail')){ ?>     
                                   <li> <a  onclick="navtoggle('商城配置 - > 新订单邮件提醒')"  href="<?php  echo create_url('site', array('name' => 'shop','do' => 'noticemail'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    新订单邮件提醒                                  
                                </a>   </li>
                                  <?php  } ?> 
                     
                                
                                  <?php if(checkrule('modules','payment')){ ?>  
                                  <li> <a onclick="navtoggle('商城配置 - > 支付方式')" href="<?php  echo create_url('site', array('name' => 'modules','do' => 'payment','op'=>'list'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    支付方式                                  
                                </a>   </li>
                                     <?php  } ?> 
                                          <?php if(checkrule('modules','thirdlogin')){ ?> 
                                    <li> <a onclick="navtoggle('商城配置 - > 快捷登录')" href="<?php  echo create_url('site', array('name' => 'modules','do' => 'thirdlogin'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    快捷登录                                  
                                </a>   </li>  <?php  } ?> 
                                      <?php if(checkrule('modules','dispatch')){ ?> 
                                  <li> <a onclick="navtoggle('模块 - > 配送方式')" href="<?php  echo create_url('site', array('name' => 'modules','do' => 'dispatch','op'=>'display'))?>" target="main">
                                    <i class="icon-double-angle-right"></i>
                                    配送方式                                  
                                </a>   </li>  <?php  } ?> 
                                 
                    
                     
                                            </ul>
                                    </li>
                                          <?php  } ?> 
                                    
                                    
                         
                             <?php if(checkrule('weixin','ALL')){ ?> 
                                <li class="open active">
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-cogs"></i>
                        <span class="menu-text"> 微信设置</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                    
                                       <li>
                                          <a onclick="navtoggle('微信设置 - > 微信号设置 ')"  href="<?php  echo create_url('site', array('name' => 'weixin','do' => 'setting'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        微信号设置                                
                                    </a>
                                </li>
                                              
                                       <li>
                                          <a onclick="navtoggle('微信设置 - > 菜单管理 ')"  href="<?php  echo create_url('site', array('name' => 'weixin','do' => 'designer'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        菜单管理                                
                                    </a>
                                </li>
                                               
                                               
                                              
                                       <li>
                                          <a onclick="navtoggle('微信设置 - > 自定义回复 ')"  href="<?php  echo create_url('site', array('name' => 'weixin','do' => 'rule'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        自定义回复                                
                                    </a>
                                </li>
                                           
                                                
                    </ul>
                  </li>
                          
                           <?php  } ?> 
                       
                          
                          
                               
                          
                          
                          
                          
                                      
                                         <?php if(checkrule('alipay','ALL')){ ?> 
                                      
                                <li>
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-cogs"></i>
                        <span class="menu-text"> 支付宝服务窗</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                                     
                                       <li>
                                          <a onclick="navtoggle('支付宝服务窗 - > 服务窗设置 ')"  href="<?php  echo create_url('site', array('name' => 'alipay','do' => 'setting'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        服务窗设置                                
                                    </a>
                                </li>
                                               
                                               
                                              
                                       <li>
                                          <a onclick="navtoggle('支付宝服务窗 - > 菜单管理 ')"  href="<?php  echo create_url('site', array('name' => 'alipay','do' => 'designer'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        菜单管理                                
                                    </a>
                                </li>
                                               
                                               
                                              
                                       <li>
                                          <a onclick="navtoggle('支付宝服务窗 - > 自定义回复 ')"  href="<?php  echo create_url('site', array('name' => 'alipay','do' => 'rule'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        自定义回复                                
                                    </a>
                                </li>
                                          
                                                
                                                
                    </ul>
                  </li>
                            <?php  } ?> 
                              <?php if(checkrule('user','ALL')){ ?> 
    <li>
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-info-sign"></i>
                        <span class="menu-text"> 多用户管理</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                                           
                                               
                                       <li>
                                          <a onclick="navtoggle('多用户管理 - > 新增用户 ')"  href="<?php  echo create_url('site', array('name' => 'user','do' => 'user','op' => 'adduser'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        新增用户                                
                                    </a>
                                </li>
                                               
                                               
                                              
                                       <li>
                                          <a onclick="navtoggle('多用户管理 - > 用户列表 ')"  href="<?php  echo create_url('site', array('name' => 'user','do' => 'user','op' => 'listuser'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        用户列表                                
                                    </a>
                                </li>
                                
                                <li>
                                          <a onclick="navtoggle('多用户管理 - > 会员组 ')"  href="<?php  echo create_url('site', array('name' => 'user','do' => 'usergroup','op' => 'listgroup'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        会员组                                
                                    </a>
                                </li>
                                               
                                               
                                              
                                                        </ul>
                                                    </li>
                                    
                                          <?php  } ?> 
                                    
                                    
                                         <?php if(!empty($account['is_admin'])){ ?> 
                                          <li>
                    <!-- 导航第一级 -->
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-cloud"></i>
                        <span class="menu-text">基础维护</span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    
                    <ul class="submenu">
                                           
                                                 <li>
                                          <a onclick="navtoggle('系统管理 - > 系统维护')" href="<?php  echo create_url('site', array('name' => 'modules','do' => 'update'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        系统维护                                      
                                    </a>
                                </li>
                                    <!--  <li>
                                          <a onclick="navtoggle('系统管理 - > 插件扩展')" href="http://addons.baijiacms.com/" target="_blank" >                              
                                        <i class="icon-double-angle-right"></i>
                                        插件扩展                                      
                                    </a>
                                </li>  -->   <li>
                                          <a onclick="navtoggle('系统管理 - > 插件扩展')" href="<?php  echo create_url('site', array('name' => 'modules','do' => 'modules'))?>" target="main" >                              
                                        <i class="icon-double-angle-right"></i>
                                        插件扩展                                      
                                    </a>
                                </li>
                                                          
                                                        </ul>
                                                    </li>
                                                    
                                                      <?php  } ?> 