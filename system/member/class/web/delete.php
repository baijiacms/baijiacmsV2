<?php
	mysqld_update('member', array('status' => intval($_GP['status'])), array('openid' => $_GP['openid']));
      message('操作成功！', 'refresh', 'success');
	