<h3>管理设置：<?=$data['name']?></h3>
<!--<p class="sec_nav">
<a href="<?=base_url()?>index.php/admin/groups/edit/<?=$data['group_id']?>/basic"><span>基本设置</span></a>
<a href="<?=base_url()?>index.php/admin/groups/edit/<?=$data['group_id']?>/access"><span>论坛权限</span></a>
<a href="<?=base_url()?>index.php/admin/groups/admin_edit/<?=$data['group_id']?>" class="on"><span>管理设置</span></a>
</p>
<ul class="tips">
  <li><b>提示: </b></li>
  <li>双击版块名称可编辑版块标题</li>
</ul>-->
<?php echo form_open_multipart(base_url().'index.php/admin/groups/admin_edit/'.$data['group_id'])?>
<table class="table2">
    <colgroup>
    <col class="th">
    <col width="500">
    <col>
    </colgroup>
    <tr class="split">
    	<td colspan="3">帖子相关</td>
    </tr>
    <tr>
      <th>操作权限</th>
      <td>
      <ul class="list_box">
      <li><input type="checkbox" value="1" name="is_edit" <?php echo my_set_checkbox('is_edit', '1',$data); ?> class="checkbox">编辑</li>
      <li><input type="checkbox" value="1" name="is_check" <?php echo my_set_checkbox('is_check', '1',$data); ?> class="checkbox">审核</li>
      <li><input type="checkbox" value="1" name="is_copy" <?php echo my_set_checkbox('is_copy', '1',$data); ?> class="checkbox">复制</li>
      <li><input type="checkbox" value="1" name="is_merge" <?php echo my_set_checkbox('is_merge', '1',$data); ?> class="checkbox">合并</li>
      <li><input type="checkbox" value="1" name="is_split" <?php echo my_set_checkbox('is_split', '1',$data); ?> class="checkbox">切分</li>
      <li><input type="checkbox" value="1" name="is_highlight" <?php echo my_set_checkbox('is_highlight', '1',$data); ?> class="checkbox">高亮</li>
      <li><input type="checkbox" value="1" name="is_recommend" <?php echo my_set_checkbox('is_recommend', '1',$data); ?> class="checkbox">推荐</li>
      <li><input type="checkbox" value="1" name="is_bump" <?php echo my_set_checkbox('is_bump', '1',$data); ?> class="checkbox">提升</li>
      <li><input type="checkbox" value="1" name="is_move" <?php echo my_set_checkbox('is_move', '1',$data); ?> class="checkbox">移动</li>
      <li><input type="checkbox" value="1" name="is_del" <?php echo my_set_checkbox('is_del', '1',$data); ?> class="checkbox">删除</li>
      <li><input type="checkbox" value="1" name="is_ban" <?php echo my_set_checkbox('is_ban', '1',$data); ?> class="checkbox">屏蔽</li>
      <li><input type="checkbox" value="1" name="is_close" <?php echo my_set_checkbox('is_close', '1',$data); ?> class="checkbox">关闭</li>
      </ul>
      </td>
      <td></td>
  </tr>
 
    <tr>
      <th>置顶类型</th>
      <td><label>
          <input type="radio"  name="allow_top" value="0" <?php echo my_set_radio('allow_top', 0, $data)?> />
          不允许置顶</label>
        <label>
          <input type="radio"  name="allow_top" value="1" <?php echo my_set_radio('allow_top', 1, $data)?> />
          允许置顶 I</label>
        <label>
          <input type="radio"  name="allow_top" value="2" <?php echo my_set_radio('allow_top', 2, $data)?> />
          允许置顶 I/II</label>
          <input type="radio"  name="allow_top" value="3" <?php echo my_set_radio('allow_top', 3, $data)?> />
          允许置顶 I/II/III</label>
          </td>
          <td>设置是否允许置顶管理范围内主题的级别。I 版块置顶、II 分类置顶、III 全站置顶。</td>
    </tr>
    <tr>
      <th>加精类型</th>
      <td><label>
          <input type="radio"  name="allow_digest" value="0" <?php echo my_set_radio('allow_digest', 0, $data)?> />
          不允许精华</label>
        <label>
          <input type="radio"  name="allow_digest" value="1" <?php echo my_set_radio('allow_digest', 1, $data)?> />
          允许精华 I</label>
        <label>
          <input type="radio"  name="allow_digest" value="2" <?php echo my_set_radio('allow_digest', 2, $data)?> />
          允许精华 I/II</label>
          <input type="radio"  name="allow_digest" value="3" <?php echo my_set_radio('allow_digest', 3, $data)?> />
          允许精华 I/II/III</label></td>
      <td>设置是否允许精华管理范围内主题的级别。I 版块精华、II 分类精华、III 全站精华。</td>
    </tr>
    <tr>
      <th>回复置顶</th>
      <td><label>
          <input type="radio"  name="is_toppost" value="1" <?php echo my_set_radio('is_toppost', 1, $data)?>/>
          是</label>
        <label>
          <input type="radio"  name="is_toppost" value="0" <?php echo my_set_radio('is_toppost', 0, $data)?>/>
          否</label></td>
       <td></td>
    </tr>
    <tr>
      <th>编辑主题分类</th>
      <td><label>
          <input type="radio"  name="is_editcategory" value="1" <?php echo my_set_radio('is_editcategory', 1, $data)?>/>
          是</label>
        <label>
          <input type="radio"  name="is_editcategory" value="0" <?php echo my_set_radio('is_editcategory', 0, $data)?>/>
          否</label></td>
       <td></td>
    </tr>
    <tr class="split">
    	<td colspan="3">用户相关</td>
    </tr>
    <tr>
      <th>编辑用户</th>
      <td><label>
          <input type="radio"  name="is_edituser" value="1" <?php echo my_set_radio('is_edituser', 1, $data)?>/>
          是</label>
        <label>
          <input type="radio"  name="is_edituser" value="0" <?php echo my_set_radio('is_edituser', 0, $data)?>/>
          否</label></td>
       <td></td>
    </tr>
    <tr>
      <th>禁止用户</th>
      <td><label>
          <input type="radio"  name="is_banuser" value="1" <?php echo my_set_radio('is_banuser', 1, $data)?>/>
          是</label>
        <label>
          <input type="radio"  name="is_banuser" value="0" <?php echo my_set_radio('is_banuser', 0, $data)?>/>
          否</label></td>
       <td></td>
    </tr>
    <tr>
      <th>查看IP</th>
      <td><label>
          <input type="radio"  name="is_viewip" value="1" <?php echo my_set_radio('is_viewip', 1, $data)?>/>
          是</label>
        <label>
          <input type="radio"  name="is_viewip" value="0" <?php echo my_set_radio('is_viewip', 0, $data)?>/>
          否</label></td>
       <td></td>
    </tr>
    <tr>
      <th>禁止IP</th>
      <td><label>
          <input type="radio"  name="is_banip" value="1" <?php echo my_set_radio('is_banip', 1, $data)?>/>
          是</label>
        <label>
          <input type="radio"  name="is_banip" value="0" <?php echo my_set_radio('is_banip', 0, $data)?>/>
          否</label></td>
       <td></td>
    </tr>
    <tr class="split">
    	<td colspan="3">其他</td>
    </tr>
    <tr>
      <th>查看管理日志</th>
      <td><label>
          <input type="radio"  name="is_viewlog" value="1" <?php echo my_set_radio('is_viewlog', 1, $data)?>/>
          是</label>
        <label>
          <input type="radio"  name="is_viewlog" value="0" <?php echo my_set_radio('is_viewlog', 0, $data)?>/>
          否</label></td>
       <td></td>
    </tr>
    
    
</table>
  <p class="div_bottom">
    <input class="inp_btn" name="submit" type="submit" value="提交" />
  </p>
<?php echo form_close() ?>