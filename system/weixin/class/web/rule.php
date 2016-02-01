<?php
defined('SYSTEM_IN') or exit('Access Denied');
			hasrule('weixin','weixin');
        $operation = !empty($_GP['op']) ? $_GP['op'] : 'display';
           
        if($operation=='detail')
        {
        	
        	if(!empty($_GP['id']))
        	{
        	$rule = mysqld_select('SELECT * FROM '.table('weixin_rule')." WHERE  id = :id" , array(':id' =>intval($_GP['id'])));
        	}
        	
                
    			if(checksubmit())
    			{
    	
    				if(empty($_GP['id']))
    				{
    								$count = mysqld_selectcolumn('SELECT count(id) FROM '.table('weixin_rule')." WHERE  keywords = :keywords" , array(':keywords' =>$_GP['keywords']));
					if($count>0)
					{
						message('触发关键字'.$_GP['keywords']."已存在！");
					}
    				 	if (!empty($_FILES['thumb']['tmp_name'])) {
                    file_delete($_GP['thumb_old']);
                    $upload = file_upload($_FILES['thumb']);
                    if (is_error($upload)) {
                        message($upload['message'], '', 'error');
                    }
                    $thumb = $upload['path'];
                }
    				
    					$data=array('title'=>$_GP['title'],'ruletype'=>$_GP['ruletype'],'keywords'=>$_GP['keywords'],'thumb'=>$thumb,'description'=>$_GP['description'],'url'=>$_GP['url']);
          	 mysqld_insert('weixin_rule', $data);
    					message('保存成功！', 'refresh', 'success');
    				}else
    				{
    					if($rule['keywords']!=$_GP['keywords'])
    					{
    									$count = mysqld_selectcolumn('SELECT count(id) FROM '.table('weixin_rule')." WHERE  keywords = :keywords" , array(':keywords' =>$_GP['keywords']));
					if($count>0)
					{
						message('触发关键字'.$_GP['keywords']."已存在！");
					}
    						
    					}
    					
    					 	if (!empty($_FILES['thumb']['tmp_name'])) {
                    file_delete($_GP['thumb_old']);
                    $upload = file_upload($_FILES['thumb']);
                    if (is_error($upload)) {
                        message($upload['message'], '', 'error');
                    }
                    $thumb = $upload['path'];
                }
    						$data=array('title'=>$_GP['title'],'ruletype'=>$_GP['ruletype'],'keywords'=>$_GP['keywords'],'description'=>$_GP['description'],'url'=>$_GP['url']);
          	
          	if(!empty($thumb))
          	{
          		$data['thumb']=$thumb;
          		
          	}
          	 mysqld_update('weixin_rule', $data, array('id' => $_GP['id']));
    					
    					message('修改成功！', 'refresh', 'success');
    				}
    			}
    				include page('rule_detail');
    				exit;
        }
        if($operation=='delete'&&!empty($_GP['id']))
        {
        		
        	 mysqld_delete('weixin_rule', array('id'=>$_GP['id']));
        	 message('删除成功！', 'refresh', 'success');
        }
        
				 
        $list=mysqld_selectall('SELECT * FROM '.table('weixin_rule'));
			include page('rule');