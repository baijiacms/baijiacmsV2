<?php
		$settings=globaSetting();
	if(empty($settings['shop_category_style']))
			{
					$category = mysqld_selectall("SELECT * FROM " . table('shop_category') . " WHERE deleted=0 and enabled=1 ORDER BY parentid ASC, displayorder DESC");
        foreach ($category as $index => $row) {
            if (!empty($row['parentid'])) {
                $children[$row['parentid']][$row['id']] = $row;
                unset($category[$index]);
            }
        }
        
		
        include themePage('list_category');
      }else
      {
      			$categoryparent = mysqld_selectall("SELECT * FROM " . table('shop_category') . " WHERE deleted=0 and enabled=1 and parentid=0 ORDER BY parentid ASC, displayorder DESC");
     $ppcateid=$_GP['ppcateid'];
      if(empty($ppcateid))
      {
      	if(!empty($categoryparent)&&is_array($categoryparent)&&count($categoryparent)>0)
      	{
      		$ppcateid=$categoryparent[0]['id'];
       }
      }
      if(!empty($ppcateid))
      {
      	   			$categorypitem = mysqld_select("SELECT * FROM " . table('shop_category') . " WHERE deleted=0 and enabled=1 and id=:id ORDER BY parentid ASC, displayorder DESC",   array(":id"=> intval($ppcateid)));
   
      			$categoryson = mysqld_selectall("SELECT * FROM " . table('shop_category') . " WHERE deleted=0 and enabled=1 and parentid=:parentid ORDER BY parentid ASC, displayorder DESC",   array(":parentid"=> intval($ppcateid)));
  		}
    
      	include themePage('list_category_pic');
      }
		