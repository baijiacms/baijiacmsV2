<?php

			$code=$_GP['code'];
			 mysqld_update('dispatch',array('enabled' => 0) , array('code' => $code));
			 	message('关闭成功！','refresh','success');