<?php	 
$list = mysqld_selectall("select * from " . table('user'));

include page('listuser');