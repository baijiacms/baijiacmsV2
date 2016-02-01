<?php
defined('SYSTEM_IN') or exit('Access Denied');

class publicAddons  extends BjSystemModule {
	function do_install()
	{		
		$this->__web(__FUNCTION__);
	}
	public function do_Verify()
	{
		$this->__web(__FUNCTION__);
	}
	public function do_Index()
	{
		$this->__web(__FUNCTION__);
	}
	public function do_Logout()
	{
		$this->__web(__FUNCTION__);
	}
		public function do_Login()
	{
			$this->__web(__FUNCTION__);
	}
	public function check_verify($verify)
	{
		
		if(strtolower($_SESSION["VerifyCode"])==strtolower($verify))
		{
			unset($_SESSION["VerifyCode"]);
			return true;
		}
		return false;
	}

}


