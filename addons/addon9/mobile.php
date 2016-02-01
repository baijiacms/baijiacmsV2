<?php
defined('SYSTEM_IN') or exit('Access Denied');
class addon9Addons  extends BjModule {
			public function do_shopindex() {
				
					header("Location:".create_url('mobile',array('name' => 'shopwap','do' => 'shopindex','act' => 'module')));
			}
			public function do_listCategory() {
				
				header("Location:".create_url('mobile',array('name' => 'shopwap','do' => 'listCategory','act' => 'module')));
			}
			public function do_mycart() {
				
				header("Location:".create_url('mobile',array('name' => 'shopwap','do' => 'mycart','act' => 'module')));
			}
			public function do_fansindex() {
				
					header("Location:".create_url('mobile',array('name' => 'shopwap','do' => 'fansindex','act' => 'module')));
			}
			public function do_singlepage() {
				
					$this->__mobile(__FUNCTION__);
			}



}


