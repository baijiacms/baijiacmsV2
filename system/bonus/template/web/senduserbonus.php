<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<h3 class="header smaller lighter blue">发放优惠券</h3>
<form action="" class="form-horizontal" method="post" >
	<table class="table table-striped table-bordered table-hover">
			<tbody>
				<tr>
				<td>
				<li style="float:left;list-style-type:none;">
						按用户等级发放优惠券:&nbsp;
							<select name="rank_level" style="margin-right:10px;margin-top:10px;width: 150px; height:34px; line-height:28px; padding:2px 0">
     							<option value="0">请选择用户等级</option>  
     								<option value="-1">全部会员</option> 
			     				<?php foreach($rank_model_list as $rank_model){?>
			     				<option value="<?php echo $rank_model['rank_level']?>"><?php echo $rank_model['rank_name']?></option> 
	     						<?php }?>
     				</select>
						</li>
					
						<li style="list-style-type:none;">
								&nbsp;&nbsp;&nbsp;	<input type="submit" name="send_userleve" value="根据会员等级发送优惠券" class="btn btn-primary">
						</li>
					</td>
				</tr>
			</tbody>
		</table>
			</form>
		<form action="" class="form-horizontal" method="post" onsubmit="return validate()" >
<table class="table" style="width:95%;" align="center">
					<tbody>
						<tr>
							<td style="vertical-align: middle;font-size: 14px;font-weight: bold;width:120px">手机号码：<input name="send_user_tel" type="text" value="">&nbsp;&nbsp;<input type="submit" name="search" value=" 查 询 " class="btn btn-primary"></td>
		
				
						</tr>
					
						
						<tr>
							<td>
								
								<table cellspacing="1" cellpadding="3">
  <tbody><tr>
    <th>会员列表：</th>
    <th>操作</th>
    <th>给下列用户发放优惠券</th>
  </tr>
  <tr>
    <td width="45%" align="center">
      <select name="user_search[]" id="user_search" size="15" style="width:260px" ondblclick="addUser()" multiple="true">
      					<?php foreach($search_member_list as $member){?>
     				  				<option value="<?php echo $member['mobile']?>"><?php echo $member['mobile']?></option> 
     							<?php }?>
      
      </select>
    </td>
    <td align="center">
      <p><input type="button" value=">" onclick="addUser()" class="button"></p>
      <p><input type="button" value="<" onclick="delUser()" class="button"></p>
    </td>
    <td width="45%" align="center">
      <select name="user_add[]" id="user_add" multiple="true" size="15" style="width:260px" ondblclick="delUser()">
      	
      </select>
    </td>
  </tr>
  <tr>
    <td align="center" colspan="3">
    	<input type="submit" name="send_user" value="确定发送优惠券" class="btn btn-primary"></td>
  </tr>
</tbody></table>
								
								</td>
						
						</tr>
					</tbody>
				</table>
		</form>
		<script>
			
			function validate()
{
    var dest = document.getElementById('user_add');
    for (var i = 0; i < dest.options.length; i++)
    {
        dest.options[i].selected = "true";
    }
   	return true;

}

			 function addUser()
  {
      var src = document.getElementById('user_search');
      var dest = document.getElementById('user_add');

      for (var i = 0; i < src.options.length; i++)
      {
          if (src.options[i].selected)
          {
              var exist = false;
              for (var j = 0; j < dest.options.length; j++)
              {
                  if (dest.options[j].value == src.options[i].value)
                  {
                      exist = true;
                      break;
                  }
              }
              if (!exist)
              {
                  var opt = document.createElement('OPTION');
                  opt.value = src.options[i].value;
                  opt.text = src.options[i].text;
                  dest.options.add(opt);
              }
          }
      }
  }

  function delUser()
  {
      var dest = document.getElementById('user_add');

      for (var i = dest.options.length - 1; i >= 0 ; i--)
      {
          if (dest.options[i].selected)
          {
              dest.options[i] = null;
          }
      }
  }

			</script>
<?php  include page('footer');?>
								