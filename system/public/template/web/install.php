<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>百家CMS安装程序</title>
<link href="<?php echo RESOURCE_ROOT;?>/addons/modules/install.css?x=20150530_1" rel="stylesheet" />
</head>
<body>
	<?php if( $op=="display"){?>
<table width="830" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td align="center">〓 许可协议 〓</td>
  </tr>
  <tr>
    <td>
	<div class="pact">
            <p>百家cms微商城遵循Apache2开源协议发布，并提供免费使用。</p>
            <p>百家CMS（微商城） 商标和著作权所有者为福州百家威信信息技术有限责任公司</p>
            <p>Apache Licence是著名的非盈利开源组织Apache采用的协议。</p>
            <p>该协议和BSD类似，鼓励代码共享和尊重原作者的著作权，允许代码修改，再作为开源或商业软件发布。</p>
            <h4><strong>需要满足的条件： </strong></h4>
            <ol>
              <p>1． 需要给代码的用户一份Apache Licence；</p>
              <p>2． 如果你修改了代码，需要在被修改的文件中说明；</p>
              <p>3． 在延伸的代码中（修改和有源代码衍生的代码中）需要带有原来代码中的协议，商标，专利声明和其他原来作者规定需要包含的说明；</p>
              <p>4． 如果再发布的产品中包含一个Notice文件，则在Notice文件中需要带有本协议内容。你可以在Notice中增加自己的许可，但不可以表现为对Apache Licence构成更改。</p>
 <p>具体的协议参考：http://www.apache.org/licenses/LICENSE-2.0</p>
 	</div>
	</td>
  </tr>
  <tr>
    <td>
<div class="readpact boxcenter">
	<input name="readpact" type="checkbox" id="readpact" value="" /><label for="readpact"><strong>我已经阅读并同意此协议</strong></label>
</div>
<div class="butbox boxcenter">
	<input type="button" class="nextbut" value="" onclick="document.getElementById('readpact').checked ?window.location.href='<?php echo web_url("install",array("name"=>"public","op"=>"setp2"))?>' : alert('您必须同意软件许可协议才能安装！');" />
</div>
	</td>
  </tr>
</table>
<?php }?>
<?php if( $op=="setp2"){?>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0"  class="twbox"  style="font-size:23px">
    <tr  >
      <td colspan="2" align="center"><strong style="font-size:23px">程序依赖环境检查</strong></td>
    </tr>
      <tr>
      <td width="260" align="right"  style="font-size:18px">PHP版本(最低PHP 5.3)：</td>
      <td><?php echo (version_compare(PHP_VERSION,'5.3.0','ge'))?'<font color=green>检查通过</font>':'<font color=red>PHP '.PHP_VERSION.'不通过</font>'; ?>
	  </td>
      <tr>
      <td width="260" align="right"  style="font-size:18px">config文件夹读写：</td>
      <td><?php echo $resultfolderarray['config']; ?>
	  </td>
	   <tr>
      <td width="260" align="right"  style="font-size:18px">themes文件夹读写：</td>
      <td><?php echo $resultfolderarray['themes']; ?>
	  </td>
	   <tr>
      <td width="260" align="right"  style="font-size:18px">cache文件夹读写：</td>
      <td><?php echo $resultfolderarray['cache']; ?>
	  </td>
	   <tr>
      <td width="260" align="right" style="font-size:18px">attachment文件夹读写：</td>
      <td><?php echo $resultfolderarray['attachment']; ?>
	  </td>
    </tr>
      	<tr>
      <td width="260" align="right">pdo_mysql：</td>
      <td><?php echo $resultarray['pdo_mysql']; ?>
	  </td>
    </tr>
	<tr>
      <td width="260" align="right">allow_url_fopen：</td>
      <td><?php echo $resultarray['allow_url_fopen']; ?>
	  </td>
    </tr>
    	<tr>
      <td width="260" align="right">file_get_contents：</td>
      <td><?php echo $resultarray['file_get_contents']; ?>
	  </td>
    </tr>
    	<tr>
      <td width="260" align="right">xml_parser_create：</td>
      <td><?php echo $resultarray['xml_parser_create']; ?>
	  </td>
    </tr>
   	<tr>
      <td width="260" align="right">curl_init：</td>
      <td ><?php echo $resultarray['curl_init']; ?>
	  </td>
    </tr>

    <tr>
      <td colspan="2" align="right">
	  <div class="butbox boxcenter">
	  	<input name="doact" type="hidden"  value="install"  />
	<input type="button" class="backbut" value="" onclick="window.location.href='<?php echo web_url("install",array("name"=>"public","op"=>"display"))?>';" style="margin-right:20px" />
	<?php if( $allcheck){?>
	<input type="button" class="nextbut" value="" onclick="window.location.href='<?php echo web_url("install",array("name"=>"public","op"=>"setp3"))?>';" />
<?php }else{?><br/>
请解决环境问题后，刷新页面，进行下一步操作。
<?php }?>
</div></td>
    </tr>


<?php }?>
	<?php if( $op=="setp3"){?>
	
<form id="form1" name="form1" method="post" >
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0"  class="twbox">
    <tr>
      <td colspan="2" align="center">百家CMS 正式版-系统安装-请仔细阅读说明,然后进行安装</td>
    </tr>

	
	<tr>
      <td width="260" align="right"><strong>数据库地址：</strong></td>
      <td><input name="dbhost" type="text" class="textipt" id="dbhost" style="width:150px" value="127.0.0.1" />
	  </td>
    </tr>
    
    <tr>
      <td width="260" align="right"><strong>数据库端口：</strong></td>
      <td><input name="dbport" type="text" class="textipt" id="dbport" style="width:150px" value="3306" />
	  </td>
    </tr>
	<tr>
      <td width="260" align="right"><strong>数据库名称：</strong></td>
      <td><input name="dbname" type="text" class="textipt" id="dbname" style="width:150px" value="" />
      数据库名称
	  </td>
    </tr>

	<tr>
      <td width="260" align="right"><strong>数据库用户名：</strong></td>
      <td><input name="dbuser" type="text" class="textipt" id="dbuser" style="width:150px" value="root" />
      数据库连接账号
	  </td>
    </tr>


	<tr>
      <td width="260" align="right"><strong>数据库密码：</strong></td>
      <td><input name="dbpwd" type="text" class="textipt" id="dbpwd" style="width:150px" value="" />
      数据库连接密码
	  </td>
    </tr>

	<tr>
      <td width="260" align="right"><strong>登录帐号：</strong></td>
      <td><input name="adminname" type="text" id="adminname" class="textipt" value="admin"  style="width:150px" /></td>
    </tr>
    <tr>
      <td align="right"><strong>登录密码：</strong></td>
      <td><input name="adminpwd" type="text"  class="textipt" value="" style="width:150px" /></td>
    </tr>



    <tr>
      <td colspan="2" align="right">
	  <div class="butbox boxcenter">
	  	<input name="doact" type="hidden"  value="install"  />
	<input type="button" class="backbut" value="" onclick="window.location.href='<?php echo web_url("install",array("name"=>"public","op"=>"setp2"))?>';" style="margin-right:20px" />
	<input name="submit" type="submit" class="setupbut"    value="" />
</div></td>
    </tr>
  </table>
</form>

	<?php }?>
</body>
</html>
