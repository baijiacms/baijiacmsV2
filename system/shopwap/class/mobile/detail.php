<?php
		$settings=globaSetting();
        $goodsid = intval($_GP['id']);
        $goods = mysqld_select("SELECT * FROM " . table('shop_goods') . " WHERE id = :id", array(':id' => $goodsid));
          $comments = mysqld_selectall("SELECT comment.*,member.realname,member.mobile FROM " . table('shop_goods_comment') . " comment  left join " . table('member') . " member on comment.openid=member.openid WHERE comment.goodsid=:goodsid ORDER BY comment.createtime desc", array(':goodsid' => $goodsid));
      
        require(WEB_ROOT.'/system/common/extends/class/shopwap/class/mobile/detail_1.php');
				
         $ccategoods = mysqld_selectall("SELECT * FROM " . table('shop_goods') . " WHERE pcate = :pcate", array(':pcate' => $goods['pcate']));
         $allgoods = mysqld_selectcolumn("SELECT count(*) FROM " . table('shop_goods') . " WHERE deleted =0");
       
        $bonus_type= mysqld_selectall("select bonus_type.* from " . table("bonus_good")." bonus_good left join " . table("bonus_type")." bonus_type on bonus_type.type_id=bonus_good.bonus_type_id where bonus_good.good_id=:good_id ",array(":good_id"=>$goods['id']));
  			
                   $arr = $this->time_tran($goods['timeend']);
                $goods['timelaststr'] = $arr[0];
                $goods['timelast'] = $arr[1];
        
		$ccate = intval($goods['ccate']);
	      if (empty($goods)) {
            message('抱歉，商品不存在或是已经被删除！');
        }
        
        
         if ($goods['totalcnf']!=2 && empty($goods['total'])) {
        	message('抱歉，商品库存不足！');;
        }
        if ($goods['istime'] == 1) {
            if (time() < $goods['timestart']) {
                message('抱歉，还未到购买时间, 暂时无法购物哦~', refresh(), "error");
            }
            if (time() > $goods['timeend']) {
                message('抱歉，商品限购时间已到，不能购买了哦~', refresh(), "error");
            }
        }
        
        mysqld_update('shop_goods',array('viewcount'=>$goods['viewcount']+1),array('id'=>$goodsid));
        //浏览量
        $piclist = array();
        $piclist[]=array("attachment" => $goods['thumb']);
        
        $goods_piclist = mysqld_selectall("SELECT * FROM " . table('shop_goods_piclist') . " WHERE goodid = :goodid", array(':goodid' => $goodsid));
       $goods_piclist_count = mysqld_selectcolumn("SELECT count(*) FROM " . table('shop_goods_piclist') . " WHERE goodid = :goodid", array(':goodid' => $goodsid));
      	if($goods_piclist_count>0)
      	{
      
      	 foreach ($goods_piclist as &$item) {
        
        			$piclist[]=array("attachment" =>$item['picurl']);
           }
      	
      		
      	}
       
      
      
        $marketprice = $goods['marketprice'];
        $productprice= $goods['productprice'];
        $stock = $goods['total'];

      
        //规格及规格项
           $allspecs = mysqld_selectall("select * from " . table('shop_goods_spec') . " where goodsid=:id order by displayorder asc", array(':id' => $goodsid));
           foreach ($allspecs as &$s) {
                 $s['items'] = mysqld_selectall("select * from " . table('shop_goods_spec_item') . " where  `show`=1 and specid=:specid order by displayorder asc", array(":specid" => $s['id']));
           }
           unset($s);
          
           //处理规格项
           $options = mysqld_selectall("select id,title,thumb,marketprice,productprice, stock,weight,specs from " . table('shop_goods_option') . " where goodsid=:id order by id asc", array(':id' => $goodsid));

           //排序好的specs
          $specs = array();
                //找出数据库存储的排列顺序
          if (count($options) > 0) {
                    $specitemids = explode("_", $options[0]['specs'] );
                    foreach($specitemids as $itemid){
                        foreach($allspecs as $ss){
                             $items=  $ss['items'];
                             foreach($items as $it){
                                 if($it['id']==$itemid){
                                     $specs[] = $ss;
                                     break;
                                 }
                             }
                        }
         }
        }
		
 
   
          require(WEB_ROOT.'/system/common/extends/class/shopwap/class/mobile/detail_2.php');
			
	
			include themePage('detail');
			 require(WEB_ROOT.'/system/common/extends/class/shopwap/class/mobile/detail_3.php');
			
