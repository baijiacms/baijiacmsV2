<?php
			$operation = !empty($_GP['op']) ? $_GP['op'] : 'display';
			if($operation=='delete')
			{
					mysqld_delete('addon8_article',array("id"=>intval($_GP['id'])));
						message("删除成功！","refresh","success");
			}
			if($operation=='post')
			{
				$category = mysqld_selectall("SELECT * FROM " . table('addon8_article_category') . "  where deleted=0  ORDER BY parentid ASC, displayorder DESC",array(), 'id');
               if (!empty($category)) {
            $children = '';
            foreach ($category as $cid => $cate) {
                if (!empty($cate['parentid'])) {
                    $children[$cate['parentid']][$cate['id']] = array($cate['id'], $cate['name']);
                }
            }
        }
        
					$article = mysqld_select("SELECT * FROM " . table('addon8_article')." where id='".intval($_GP['id'])."' " );
  	   if (checksubmit('submit')) {
					  if(	empty($article['id']))
					   {
					   	
				$data=array('createtime'=>
				time(),'pcate'=>
				intval($_GP['pcate'])
				,'ccate'=>
				intval($_GP['ccate']),'iscommend'=>
				intval($_GP['iscommend']),'ishot'=>
				intval($_GP['ishot']),'mobileTheme'=>
				intval($_GP['mobileTheme']),'title'=>
				$_GP['title'],'readcount'=>
				intval($_GP['readcount']),'description'=>
				$_GP['description'],'content'=>
				htmlspecialchars_decode($_GP['content']),'displayorder'=>
				intval($_GP['displayorder']));
				   
				    if (!empty($_GP['thumb_del'])) {
                	$data['thumb'] = '';
                }
		   if (!empty($_FILES['thumb']['tmp_name'])) {
                    file_delete($_GP['thumb_old']);
                    $upload = file_upload($_FILES['thumb']);
                    if (is_error($upload)) {
                        message($upload['message'], '', 'error');
                    }
                    $data['thumb'] = $upload['path'];
                }
            
				
				mysqld_insert('addon8_article',$data);
				message("添加成功",create_url('site', array('name' => 'addon8','do' => 'article','op'=>'post','id'=>mysqld_insertid())),"success");
					}else
					{
				$data=array('createtime'=>
				time(),'pcate'=>
				intval($_GP['pcate'])
				,'ccate'=>
				intval($_GP['ccate']),'iscommend'=>
				intval($_GP['iscommend']),'ishot'=>
				intval($_GP['ishot']),'mobileTheme'=>
				intval($_GP['mobileTheme']),'title'=>
				$_GP['title'],'readcount'=>
				intval($_GP['readcount']),'description'=>
				$_GP['description'],'content'=>
				htmlspecialchars_decode($_GP['content']),'displayorder'=>
				intval($_GP['displayorder']));
				 
				  if (!empty($_GP['thumb_del'])) {
                	$data['thumb'] = '';
                }
		   if (!empty($_FILES['thumb']['tmp_name'])) {
                    file_delete($_GP['thumb_old']);
                    $upload = file_upload($_FILES['thumb']);
                    if (is_error($upload)) {
                        message($upload['message'], '', 'error');
                    }
                    $data['thumb'] = $upload['path'];
                }
              
                
				mysqld_update('addon8_article',$data,array('id'=>$_GP['id']));
				
				message("修改成功","refresh","success");
					}
				}
				   
				    	include addons_page('article');
				    	exit;
			}
		$article_list = mysqld_selectall("SELECT * FROM " . table('addon8_article')." order by displayorder desc" );
    $category_pcate = mysqld_selectall("SELECT * FROM " . table('addon8_article_category') . "  where parentid=0 ",array(), 'id');
    $category_ccate = mysqld_selectall("SELECT * FROM " . table('addon8_article_category') . "  where parentid!=0 ",array(), 'id');

        	include addons_page('article_list');