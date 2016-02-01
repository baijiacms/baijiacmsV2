<?php
   
        $operation = !empty($_GP['op']) ? $_GP['op'] : 'display';
        if ($operation == 'display') {
        	 $pindex = max(1, intval($_GP['page']));
            $psize = 20;
            $condition = '';
           $id = intval($_GP['id']);

            $list = mysqld_selectall("SELECT comment.*,member.realname,member.mobile,shop_goods.title FROM " . table('shop_goods_comment') . " comment  left join " . table('member') . " member on comment.openid=member.openid   left join " . table('shop_goods') . " shop_goods on shop_goods.id=comment.goodsid  ORDER BY comment.createtime DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize);
            $total = mysqld_selectcolumn('SELECT COUNT(*) FROM ' . table('shop_goods_comment') );
            $pager = pagination($total, $pindex, $psize);
             include page('goods_comment');
        
        } elseif ($operation == 'delete') {
            $id = intval($_GP['id']);
            $row = mysqld_select("SELECT * FROM " . table('shop_goods_comment') . " WHERE id = :id", array(':id' => $id));
            if (empty($row)) {
                message('抱歉，评论不存在或是已经被删除！');
            }
            //修改成不直接删除，而设置deleted=1
            mysqld_delete("shop_goods_comment",  array('id' => $id));

            message('删除成功！', 'refresh', 'success');
        }