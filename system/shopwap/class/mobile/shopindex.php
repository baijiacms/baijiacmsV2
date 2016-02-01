<?php	
			$settings=globaSetting();
			$advs = mysqld_selectall("select * from " . table('shop_adv') . " where enabled=1  order by displayorder desc");
     
	    $allgoods = mysqld_selectcolumn("SELECT count(*) FROM " . table('shop_goods') . " WHERE deleted =0");
			 $children_category=array();
	 $category = mysqld_selectall("SELECT *,'' as list FROM " . table('shop_category') . " WHERE isrecommand=1 and enabled=1 and deleted=0 ORDER BY parentid ASC, displayorder DESC", array(), 'id');
        foreach ($category as $index => $row) {
            if (!empty($row['parentid'])) {
                $children_category[$row['parentid']][$row['id']] = $row;
                unset($category[$index]);
            }
        }
 			$first_good_list=array();
        $recommandcategory = array();
        foreach ($category as &$c) {
            if ($c['isrecommand'] == 1) {
                $c['list'] = mysqld_selectall("SELECT * FROM " . table('shop_goods') . " WHERE  isrecommand=1 and deleted=0 AND status = 1  and pcate='{$c['id']}'  ORDER BY displayorder DESC, sales" );
               
               foreach ($c['list'] as &$c1goods) {
                    if ($c1goods['isrecommand'] == 1&&$c1goods['isfirst'] == 1) {
                       $first_good_list[] = $c1goods;
                    }
                }
                $recommandcategory[] = $c;
            }
            if (!empty($children_category[$c['id']])) {
                foreach ($children_category[$c['id']] as &$child) {
                    if ($child['isrecommand'] == 1) {
                        $child['list'] = mysqld_selectall("SELECT * FROM " . table('shop_goods') . " WHERE  isrecommand=1 and deleted=0 AND status = 1  and pcate='{$c['id']}' and ccate='{$child['id']}'  ORDER BY displayorder DESC, sales DESC " );
                       	  foreach ($child['list'] as &$c2goods) {
				                    if ($c2goods['isrecommand'] == 1&&$c2goods['isfirst'] == 1) {
				                       $first_good_list[] = $c2goods;
				                    }
				                }
                       
                        $recommandcategory[] = $child;
                    }
                }
                unset($child);
            }
        }
         $isdzd=false;
       
      	require(WEB_ROOT.'/system/common/extends/class/shopwap/class/mobile/shopindex_1.php');
			
       if($isdzd==false)
			{
				
        include themePage('shopindex');	
      }

		require(WEB_ROOT.'/system/common/extends/class/shopwap/class/mobile/shopindex_2.php');
			