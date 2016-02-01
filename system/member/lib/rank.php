<?php
defined('SYSTEM_IN') or exit('Access Denied');

function member_rank_model($experience)
{
			$rank = mysqld_select("SELECT * FROM " . table('rank_model')." where experience<='".intval($experience)."' order by rank_level desc limit 1 " );
			if(empty($rank))
			{
				return array('rank_name'=>'普通会员','rank_level'=>'','experience'=>'');
			}else
			{
				return $rank;
			}
			  
}


