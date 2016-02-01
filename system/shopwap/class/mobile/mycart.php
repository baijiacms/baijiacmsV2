<?php

			$member=get_member_account(false);
			$openid = $member['openid'];
        $op = $_GP['op'];
        if ($op == 'add') {
            $goodsid = intval($_GP['id']);
            $total = intval($_GP['total']);
            $total = empty($total) ? 1 : $total;
            $optionid = intval($_GP['optionid']);
            $goods = mysqld_select("SELECT id, type, total,marketprice,isverify FROM " . table('shop_goods') . " WHERE id = :id and deleted=0 and status=1", array(':id' => $goodsid));
            if (empty($goods)) {
                $result['message'] = '抱歉，该商品不存在或是已经被删除！';
                message($result, '', 'ajax');
            }
                if (!empty($goods['isverify'])) {
                $result['message'] = '抱歉，核销商品不能加入购物车，请自己点击购买！';
                message($result, '', 'ajax');
            }
            $marketprice = $goods['marketprice'];
            $goodsOptionStock=0;
            $goodsOptionStock=$goods['total'];
            if (!empty($optionid)) {
                $option = mysqld_select("select marketprice,stock from " . table('shop_goods_option') . " where id=:id limit 1", array(":id" => $optionid));
                if (!empty($option)) {
                    $marketprice = $option['marketprice'];
                    $goodsOptionStock=$option['stock'];
                }
            }
            
					if($goodsOptionStock<$total&&$goodsOptionStock!=-1)
					{
						   $result = array(
                'result' => 0,
                'maxbuy' => $goodsOptionStock
            );
             die(json_encode($result));
             exit;
					}

            $row = mysqld_select("SELECT id, total FROM " . table('shop_cart') . " WHERE session_id = :session_id  AND goodsid = :goodsid  and optionid=:optionid", array(':session_id' => $openid, ':goodsid' => $goodsid,':optionid'=>$optionid));
            if ($row == false) {
                //不存在
                $data = array(
                    'goodsid' => $goodsid,
                    'goodstype' => $goods['type'],
                    'marketprice' => $marketprice,
                    'session_id' => $openid,
                    'total' => $total,
                    'optionid' => $optionid
                );
                mysqld_insert('shop_cart', $data);
            } else {
                //累加最多限制购买数量
                $t = $total + $row['total'];
              
                //存在
                $data = array(
                    'marketprice' => $marketprice,
                    'total' => $t,
                    'optionid' => $optionid
                );
                mysqld_update('shop_cart', $data, array('id' => $row['id']));
            }

            //返回数据
            $carttotal = $this->getCartTotal();

            $result = array(
                'result' => 1,
                'total' => $carttotal
            ); 
            die(json_encode($result));
        } else if ($op == 'clear') {
            mysqld_delete('shop_cart', array('session_id' => $openid));
            die(json_encode(array("result" => 1)));
        } else if ($op == 'remove') {
            $id = intval($_GP['id']);
            mysqld_delete('shop_cart', array('session_id' => $openid, 'id' => $id));
            die(json_encode(array("result" => 1, "cartid" => $id)));
        } else if ($op == 'update') {
            $id = intval($_GP['id']);
            $num = intval($_GP['num']);
            mysqld_query("update " . table('shop_cart') . " set total=$num where id=:id", array(":id" => $id));
            die(json_encode(array("result" => 1)));
        } else {
            $list = mysqld_selectall("SELECT * FROM " . table('shop_cart') . " WHERE   session_id = '".$openid."'");
            $totalprice = 0;
            if (!empty($list)) {
                foreach ($list as &$item) {
                    $goods = mysqld_select("SELECT  title, thumb, marketprice, total FROM " . table('shop_goods') . " WHERE id=:id limit 1", array(":id" => $item['goodsid']));
                    //属性
                    $option = mysqld_select("select title,marketprice,stock from " . table("shop_goods_option") . " where id=:id limit 1", array(":id" => $item['optionid']));
                    if ($option) {
                        $goods['title'] = $goods['title'];
                        $goods['optionname'] = $option['title'];
                        $goods['marketprice'] = $option['marketprice'];
                        $goods['total'] = $option['stock'];
                    }
                    $item['goods'] = $goods;
                    $item['totalprice'] = (floatval($goods['marketprice']) * intval($item['total']));
                    $totalprice += $item['totalprice'];
                }
                unset($item);
            }
            include themePage('cart');
        }