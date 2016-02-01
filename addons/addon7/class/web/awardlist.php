<?php
  $awardlist = mysqld_selectall("select * FROM " . table('addon7_award')." where deleted=0");


 include addons_page('awardlist');