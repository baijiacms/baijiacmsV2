<?php
		$settings=globaSetting();
		$op= $operation = $_GP['op']?$_GP['op']:'display';
		$operation = !empty($_GP['op']) ? $_GP['op'] : 'display';
        if ($operation == 'display') {
            if (!empty($_GP['displayorder'])) {
                foreach ($_GP['displayorder'] as $id => $displayorder) {
                    mysqld_update('shop_category', array('displayorder' => $displayorder), array('id' => $id));
                }
                message('分类排序更新成功！', web_url('category', array('op' => 'display')), 'success');
            }
            $children = array();
            $category = mysqld_selectall("SELECT * FROM " . table('shop_category') . "  where deleted=0  ORDER BY parentid ASC, displayorder DESC");
            foreach ($category as $index => $row) {
                if (!empty($row['parentid'])) {
                    $children[$row['parentid']][] = $row;
                    unset($category[$index]);
                }
            }
            include page('category_list');
        } elseif ($operation == 'post') {
            $parentid = intval($_GP['parentid']);
            $id = intval($_GP['id']);
            if (!empty($id)) {
                $category = mysqld_select("SELECT * FROM " . table('shop_category') . " WHERE id = '$id'");
            } else {
                $category = array(
                    'displayorder' => 0,
                );
            }
            if (!empty($parentid)) {
                $parent = mysqld_select("SELECT id, name FROM " . table('shop_category') . " WHERE id = '$parentid'");
                if (empty($parent)) {
                    message('抱歉，上级分类不存在或是已经被删除！', web_url('post'), 'error');
                }
            }
            if (checksubmit('submit')) {
                if (empty($_GP['catename'])) {
                    message('抱歉，请输入分类名称！');
                }
                $data = array(
                    'name' => $_GP['catename'],
                    'enabled' => intval($_GP['enabled']),
                     'thumbadvurl' => $_GP['thumbadvurl'],
                    'displayorder' => intval($_GP['displayorder']),
                    'isrecommand' => intval($_GP['isrecommand']),
                    'description' => $_GP['description'],
                    'parentid' => intval($parentid),
                );
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
              if (!empty($_FILES['thumbadv']['tmp_name'])) {
                    file_delete($_GP['thumbadv_old']);
                    $upload = file_upload($_FILES['thumbadv']);
                    if (is_error($upload)) {
                        message($upload['message'], '', 'error');
                    }
                    $data['thumbadv'] = $upload['path'];
                }
                if (!empty($id)) {
                    unset($data['parentid']);
                    mysqld_update('shop_category', $data, array('id' => $id));
                } else {
                    mysqld_insert('shop_category', $data);
                    $id = mysqld_insertid();
                }
                message('更新分类成功！', web_url('category', array('op' => 'display')), 'success');
            }
            include page('category');
        } elseif ($operation == 'delete') {
            $id = intval($_GP['id']);
            $category = mysqld_select("SELECT id, parentid FROM " . table('shop_category') . " WHERE id = '$id' and deleted=0 ");
            if (empty($category)) {
                message('抱歉，分类不存在或是已经被删除！', web_url('category', array('op' => 'display')), 'error');
            }
            mysqld_update('shop_category', array('deleted' => 1), array('id' => $id, 'parentid' => $id), 'OR');
            message('分类删除成功！', web_url('category', array('op' => 'display')), 'success');
        } elseif ($operation == 'changestyle') {
        
             $cfg = array(
                'shop_category_style' => intval($_GP['shop_category_style'])
            );
                       
          	refreshSetting($cfg);
          	$categorytxt='文字分类';
          	if(!empty($_GP['shop_category_style']))
          	{
          		$categorytxt='图文分类';
          	}
          	
          	message('前台分类页切换到'.$categorytxt, web_url('category', array('op' => 'display')), 'success');
        }
