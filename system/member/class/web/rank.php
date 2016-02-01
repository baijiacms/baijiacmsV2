<?php
					$operation = !empty($_GP['op']) ? $_GP['op'] : 'display';
			if($operation=='del')
			{
					mysqld_delete('rank_model',array("rank_level"=>intval($_GP['rank_level'])));
						message("删除成功！","refresh","success");
			}
			if($operation=='detail')
			{
				$condition=' and 1=2 ';
				if($_GP['rank_level']!='')
				{
					$condition=' and rank_level='.intval($_GP['rank_level']);
				}
					$rank = mysqld_select("SELECT * FROM " . table('rank_model')." where 1=1 $condition " );
		$rank_level_all = mysqld_selectall("SELECT * FROM " . table('rank_model'), array(), 'rank_level');
	
  	     if (checksubmit('submit')) {
  	     				if(empty($_GP['rank_name']))
				{
					message("等级名称不能空");
				}
					 if(	empty($rank))
					   {
					   	$data=array('rank_level'=>
				intval($_GP['rank_level']),'rank_name'=>
				$_GP['rank_name'],'experience'=>
				intval($_GP['experience']));
					   	 mysqld_insert('rank_model', $data);
					   	  
					  }else
					  {
					  		$data=array('rank_name'=>
				$_GP['rank_name'],'experience'=>
				intval($_GP['experience']));
					  mysqld_update('rank_model', $data,array('rank_level'=>
				$rank['rank_level']));
					  }
					   message('操作成功！', web_url('rank'), 'success');
					}
  	  
			include page('rank');
			exit;
			}
			$list = mysqld_selectall('SELECT * FROM '.table('rank_model')." order by rank_level");
	
			include page('rank_list');