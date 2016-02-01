<?php
defined('SYSTEM_IN') or exit('Access Denied');
class modulesAddons  extends BjSystemModule {
	
	
	public function do_unionpay_front_url()
	{		
			   		global $_GP;
			   		if(!empty($_GP['tfans']))
			   		{
			   			   	message('支付成功！',WEBSITE_ROOT.'index.php?mod=mobile&name=shopwap&do=fansindex','success');
			   		}else
			   		{
			   	message('支付成功！',WEBSITE_ROOT.'index.php?mod=mobile&name=shopwap&do=myorder&status=1','success');
			  }
	}
		public function do_unionpay_return_url()
	{		
		global $_CMS;
					include_once("plugin/payment/unionpay/unionpay_return_url.php");
					exit;
	}
	public function do_weixin_notify()
	{		
		global $_CMS;
					include_once("plugin/payment/weixin/notify_url.php");
					exit;
	}
		public function do_weixin_native_notify()
	{		
		global $_CMS;
					include_once("plugin/payment/weixin/weixin_native_notify.php");
					exit;
	}
		public function do_alipay_notify()
	{		
		global $_CMS;
					include_once("plugin/payment/alipay/alipay_notify.php");
					exit;
	}
		public function do_alipay_return_url()
	{		
		global $_CMS;
					include_once("plugin/payment/alipay/alipay_return_url.php");
					exit;
	}
		
}


