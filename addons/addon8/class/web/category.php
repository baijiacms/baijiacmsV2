<?php

		$operation = !empty($_GP['op']) ? $_GP['op'] : 'display';
        if ($operation == 'display') {
            if (!empty($_GP['displayorder'])) {
                foreach ($_GP['displayorder'] as $id => $displayorder) {
                    mysqld_update('addon8_article_category', array('displayorder' => $displayorder), array('id' => $id));
                }
                message('分类排序更新成功！', web_url('category', array('op' => 'display')), 'success');
            }
            $children = array();
            $category = mysqld_selectall("SELECT * FROM " . table('addon8_article_category') . "  where deleted=0  ORDER BY parentid ASC, displayorder DESC");
            foreach ($category as $index => $row) {
                if (!empty($row['parentid'])) {
                    $children[$row['parentid']][] = $row;
                    unset($category[$index]);
                }
            }
            include addons_page('category_list');
        } elseif ($operation == 'post') {
            $parentid = intval($_GP['parentid']);
            $id = intval($_GP['id']);
            if (!empty($id)) {
                $category = mysqld_select("SELECT * FROM " . table('addon8_article_category') . " WHERE id = '$id'");
            } else {
                $category = array(
                    'displayorder' => 0,
                );
            }
            if (!empty($parentid)) {
                $parent = mysqld_select("SELECT id, name FROM " . table('addon8_article_category') . " WHERE id = '$parentid'");
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
                    'deleted' => 0,
                    'displayorder' => intval($_GP['displayorder']),
                    'icon' => $_GP['icon'],
                    'parentid' => intval($parentid),
                );
                
                if (!empty($id)) {
                    unset($data['parentid']);
                    mysqld_update('addon8_article_category', $data, array('id' => $id));
                } else {
                    mysqld_insert('addon8_article_category', $data);
                    $id = mysqld_insertid();
                }
                message('更新分类成功！', web_url('category', array('op' => 'display')), 'success');
            }
            include addons_page('category');
        } elseif ($operation == 'delete') {
            $id = intval($_GP['id']);
            $category = mysqld_select("SELECT id, parentid FROM " . table('addon8_article_category') . " WHERE id = '$id' and deleted=0 ");
            if (empty($category)) {
                message('抱歉，分类不存在或是已经被删除！', web_url('category', array('op' => 'display')), 'error');
            }
            mysqld_update('addon8_article_category', array('deleted' => 1), array('id' => $id, 'parentid' => $id), 'OR');
            message('分类删除成功！', web_url('category', array('op' => 'display')), 'success');
        }
