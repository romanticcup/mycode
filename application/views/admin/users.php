
<h3>用户管理</h3>
<!--<ul class="col-ul tips">
  <li><b>提示: </b></li>
  <li>双击版块名称可编辑版块标题</li>
</ul>-->

<h4>搜索用户</h4>
<form name="search" method="get" action="<?=current_url()?>" class="form row">
  <fieldset>
    <div>
      <label for="url">用户组：</label>
      <select name="groups[]" size="5" multiple="multiple" class="select">
        <?=$groups_option?>
      </select>
    </div>
    <div>
      <label for="username">用户名：</label>
      <input name="username" type="text" class="inp_txt" value="<?php echo my_set_value('username',$data);?>" />
    </div>
    <div>
      <label for="email">email：<em class="feedback"></em></label>
      <input name="email" class="inp_txt" type="text" value="<?php echo my_set_value('email',$data);?>" />
    </div>
    <div>
      <label>&nbsp;</label>
      <input class="inp_btn" name="submit" type="submit" value="搜索" />
    </div>
  </fieldset>
</form>
<?php echo form_open(base_url() . 'index.php/admin/groups/index/') ?>
<?php //echo set_value('seo_title', $data) ?>
<table class="table">
  <colgroup>
  <col width="100">
  <col width="150">
  <col width="200">
  <col width="200">
  <col width="200">
  <col>
  </colgroup>
  <thead>
    <tr>
      <th>UID</th>
      <th>用户名</th>
      <th>电子邮箱</th>
      <th>注册时间</th>
      <th>最后登录时间</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
    <?php 
	!isset($users) && $users = array();
	foreach ($users as $key => $user) {?>
    <tr>
      <td><?= $user['id'] ?></td>
      <td><?= $user['username'] ?></td>
      <td><?= $user['email'] ?></td>
      <td><?= date($date_format,$user['regdate']) ?></td>
      <td><?= date($date_format,$user['regdate']) ?></td>
      <td><a href="<?= base_url() ?>index.php/admin/users/edit/<?= $user['id'] ?>">[编辑]</a> <a href="<?= base_url() ?>index.php/admin/groups/admin_edit/<?= $user['id'] ?>">[禁止]</a> <a href="#" class = "del" gid="<?= $user['id'] ?>">[清理]</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<?php echo $page;?>

<?php echo form_close() ?> 

<script type="text/javascript">
$(document).ready(function() {
        var global_id = 0;
	$("#add_new").click(function(){
                var groupsView = $("#groups_view"),
                    newName = $("input[name='newname']"),
                    newstars = $("input[name='newstars']"),
                    newcredits = $("input[name='newcredits']"),
                    checkArr = type=='member'?[newName,newstars,newcredits]:[newName,newstars],
                    isCheck = true;
		//得到点击者以及点击者的fid和级别。
                $.each(checkArr, function(i, n){
                    if($.trim(n.val())==''){
                        n.focus();
                        isCheck = false;
                        return false;
                    }
                });
                if(isCheck){
                    var html = '<tr><td></td>\
                    <td><input type="text" value="'+newName.val()+'" name="new['+global_id+'][name]" class="inp_txt"></td>\
                    <td><input type="text" value="'+newstars.val()+'" name="new['+global_id+'][stars]" class="inp_txt inp_num"></td>';
                    if(type=='member'){
                        html += '<td><input type="text" value="'+newcredits.val()+'" name="new['+global_id+'][credits]" class="inp_txt inp_long_num"></td>';
                    }
                    html += '<td><a href="#" class = "del" gid="0" >[删除]</a></td></tr>';
                    groupsView.append(html);
                    $.each(checkArr, function(i, n){
                        n.val('');
                    });
                    global_id++;
                }
		return false;
	});
	
	//版块删除
	$('.del',$('#groups_view')).live('click',function (e) {
		e.preventDefault();
                var that = this;
		$.Confirm('确定要删除此用户组么？','',function(){
                    var currentTr = $(that).parents('tr'),
                        gid = $(that).attr('gid');
                    //含子版不删除
                    if(gid != 0) {
                        //ajax发送请求，判断是否删除
                        $.post(base_url+"index.php/admin/groups/delete", { "id": gid },
                                function(data){
                                        if(data.success==1){
                                                currentTr.remove();
                                        }else{
                                                $.Alert(data.data,'删除用户组提示');
                                        }
                                }, "json");
                    }else{
                        currentTr.remove();
                    }
                });
	});
});
</script>