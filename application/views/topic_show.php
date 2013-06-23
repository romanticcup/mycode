<!--content-->
<div class="wrap">
  <div class="myPos fsong">>
  <a href="<?php echo base_url();?>">论坛</a>>
  <?php 
  	$position_names = array(1=>'沙发',2=>'板凳',3=>'地板');
  	$nav_num = count($nav);
	foreach($nav as $key=>$val){
		$link = '<a href="'.$val[1].'">'.$val[0].'</a>>';
		if($nav_num == $key+1){
			$link = substr($link,0,-1);
		}
		echo $link;
	}
  ?>
  </div>
  
  <div class="menuPage clearfix">
    <ul class="menuTag">
      <li class="pr hasMenu"><a href="javascript:void(0);" class="icoPost">发帖</a>
        <div class="menuBox pa">
          <ul>
            <li class="icoSj"></li>
            <li><a href="<?php echo base_url('index.php/action/post/'.$topic['forum_id'].'/1');?>" class="ico1" target="_blank">发表帖子</a></li>
            <li><a href="<?php echo base_url('index.php/action/post/'.$topic['forum_id'].'/2');?>" class="ico3" target="_blank">发布问答</a></li>
            <li><a href="<?php echo base_url('index.php/action/post/'.$topic['forum_id'].'/3');?>" class="ico2" target="_blank">发起投票</a></li>
            <li><a href="<?php echo base_url('index.php/action/post/'.$topic['forum_id'].'/4');?>" class="ico4" target="_blank">发起辩论</a></li>
            <!--<li><a href="#" class="ico5">发起活动</a></li>
            <li><a href="#" class="ico6">出售商品</a></li>-->
          </ul>
        </div>
      </li>
      <li><a href="javascript:void(0);" onClick="location.href='<?php echo base_url('index.php/action/reply/'.$topic['id']);?>'">回复</a></li>
      <li class="pr hasMenu"><a href="javascript:void(0);" class="icoMag">管理菜单</a>
        <div class="menuBox pa">
          <ul class="menuList">
            <li class="icoSj"></li>
			<?php foreach($manage_arr as $key=>$val){?>
            <li><a target="dialog" href="<?php echo base_url('index.php/topic/manage/'.$val[0].'/'.$topic['id']);?>"><?=$val[1]?></a></li>
            <?php }?>
          </ul>
        </div>
      </li>
    </ul>
    <?php empty($page) && $page = '';
echo $page;?>
</div>

  <ul class="newsCot">
	<?php foreach ($posts as $post) { 
      $user = $users[$post['author_id']];
    ?>
    <li class="clearfix">
        
<li class="clearfix">
    
  <div class="newsCotL">
    <div class="usFace pr">
    <a href="#"><img src="<?php echo base_url(!empty($user['icon'])?$user['icon']:'images/default.png');?>" alt="头像"></a>
    <span class="pa usFaceBg"></span>
    <!--usFaceBg为红色背景 usFaceBg2为绿色背景 usFaceBg3为黄色背景--> 
      <span class="pa usFaceP"><?php echo $user['group']['name'];?></span>
      <i class="pa icoSj2"></i>
      <div class="usFaceInfoBox pa">
        <div class="usFaceInfo pr">

        <?php if($user['online']){echo '<div class="usFaceInfoTit">当前在线</div>';}else{echo '<div class="usFaceInfoTit">当前不在线</div>';}?>
          <!--如果是离加则加载样式：cOffLine -->
          <ul>
            <li class="usUid"><span>UID：</span><?php echo $user['id'];?></li>
            <li><span>最后登录：</span><?php echo date('y-m-d',$user['last_login_time']);?></li>
            <li><span>在线时间：</span>37 小时</li>
            <li><span>银子：</span>94 两</li>
            <li><span>注册时间：</span>2012-10-14</li>
            <li><span>积分：</span>1448</li>
            <li><span>主题：</span><a href="#">3</a></li>
            <!--若为0则无链接-->
            <li><span>帖子：</span><a href="#">64</a></li>
            <!--若为0则无链接-->
            <li><span>分享：</span><a href="#">2</a></li>
            <!--若为0则无链接-->
            <li><span>精华：</span>0</li>
            <li><span>金子：</span>12 两</li>
          </ul>
          <div class="usFaceInfoBot"><a href="#" class="icoUs1">资料</a><a href="#" class="icoUs2">串个门</a><a href="#" class="icoUs3">加好友</a></div>
          <i class="pa"></i> </div>
      </div>
    </div>
    <div class="usName"><a href="#"><?php echo $user['username'];?></a></div>
    <ul class="usTip">
      <li><span class="fl">等级：</span><?php echo $user['stars_rank'];?></li>
      <li><span class="fl">积分：</span><?php echo $user['credits'];?></li>
      <li class="icoHonour">
      	<?php foreach($user['medals'] as $medal){?>
        	<img style="vertical-align:middle" src="<?php echo base_url('/images/medals/'.my_set_value('image', $medal));?>">
        <?php }?>
      </li>
      <!--titile和文字待定-->
    </ul>
  </div>

      <div class="newsCotR pr">
      <?php if($post['is_first']!=1){?>
          <div class="tr myState">
          
          <div class="newsTip">
          <span>发表于 <?php echo time_span($post['post_time'],'','','前');?> |<a href="<?php echo base_url('index.php/topic/show/'.$post['topic_id'].'/?author='.$post['author_id']);?>">只看该作者</a></span>
          </div>
		  <?php
			if(empty($position_names[$post['position']])){
				echo $post['position'].'#';
			}else{
				echo $position_names[$post['position']];
			}
			?>
            
        </div>
        <?php }?>
        <article class="newsCots">
          <?php if($post['is_first']==1){?>
          <h1 class="fyahei"><?php echo $post['subject'];?></h1>
          <?php }elseif(!empty($post['subject'])){?>
          <h2 class="fyahei"><?php echo $post['subject'];?></h2>
          <?php }?>
<?php if($post['is_first']==1){?>
          <div class="newsTip">
          <span>发表于 <?php echo time_span($post['post_time'],'','','前');?> |<a href="<?php echo base_url('index.php/topic/show/'.$post['topic_id'].'/?author='.$post['author_id']);?>">只看该作者</a></span>
          <?php if($post['is_first']==1){?>
          <span title="阅读数" class="icoEye"><?php echo $topic['views']?></span>
          <span title="回复数" class="icoMsg2"><?php echo $topic['replies']?></span>
          <?php }?>
          </div>
<?php }?>
          <div class="newsCotIn">
          <?php echo $post['content'];?>
          </div>
        </article>
        
        <!--
        <div class="download"> <span class="downloadPsw">解压密码:</span>
          <p>浪漫的杯子，如果您要查看本帖隐藏内容请<a href="#">回复</a></p>
          <div class="downloadUrl"><a href="#" target="_blank">Nape离线API文档.rar</a>(599.78 KB, 下载次数: 269)</div>
          <div class="orgUrl">原文链接：<a href="#">http://bbs.9ria.com/thread-120574-1-1.html</a></div>
        </div>
        
        <div class="reply clearfix pr">
          <div class="replyL">本帖评记记录：共<em>11</em>人评分 银子<em>+42</em></div>
          <div class="replyCot">
            <ul>
              <li>
                <ul>
                  <li class="td1"><a href="#"><img src="/images/temp.jpg" alt="我名" width="50" height="57" /></a></li>
                  <li class="td2"><a href="#">浪漫的杯子</a></li>
                  <li class="td3">+8</li>
                  <li class="td4">郭美美真是个NB的人啊！~</li>
                </ul>
              </li>
              <li>
                <ul>
                  <li class="td1"><a href="#"><img src="/images/temp.jpg" alt="我名" width="50" height="57"></a></li>
                  <li class="td2"><a href="#">浪漫的杯子</a></li>
                  <li class="td3">+8</li>
                  <li class="td4">郭美美真是个NB的人啊！~</li>
                </ul>
              </li>
            </ul>
            <div class="replyCotBot"> <span class="pageRep"><a href="#">上一页</a><a href="#">1</a><a href="#">2</a><a href="#">3</a>...<a href="#">4</a><a href="#">5</a><a href="#">下一页</a></span> <span class="btnGrade">我来评分</span> </div>
          </div>
          <span class="icoReply pa">收起回复</span> </div>
        -->
          <?php if($post['is_first']==1 && !empty($related_posts)){?>
          <div class="related">
          <h3>相关帖子</h3>
          <ul>
            <?php foreach ($related_posts as $key => $related) {?>
              <li><a href="" title="<?php echo $related['subject'];?>"><?php echo $related['subject'];?></a></li>
            <?php }?>
          </ul>
          </div>
          <?php }?>
          
        <ul class="newsBot pa">
          <li class="fl"><a href="<?php echo base_url('index.php/action/report/'.$post['id'])?>" target="dialog">举报</a></li>
          <?php if($post['is_first']==1){?>
          <li><a href="#" class="icoCollect">收藏</a></li>
          <?php }?>
          <!--li><a href="#" class="icoEdit">评分</a></li-->
          <li><a href="#" class="icoGrade">编辑</a></li>
          <li><a href="#" class="icoReplys">回复</a></li>
        </ul>
        
      </div>
      
    </li>

  <?php  
    }
    ?>
     </ul> 
    
  <div class="menuPage clearfix">
    <ul class="menuTag">
      <li class="pr hasMenu"><a href="javascript:void(0);" class="icoPost">发帖</a>
      
        <div class="menuBox pa">
          <ul>
            <li class="icoSj"></li>
            <li><a href="<?php echo base_url('index.php/action/post/'.$topic['forum_id'].'/1');?>" class="ico1" target="_blank">发表帖子</a></li>
            <li><a href="<?php echo base_url('index.php/action/post/'.$topic['forum_id'].'/2');?>" class="ico3" target="_blank">发布问答</a></li>
            <li><a href="<?php echo base_url('index.php/action/post/'.$topic['forum_id'].'/3');?>" class="ico2" target="_blank">发起投票</a></li>
            <li><a href="<?php echo base_url('index.php/action/post/'.$topic['forum_id'].'/4');?>" class="ico4" target="_blank">发起辩论</a></li>
          </ul>
        </div>
        
      </li>
      <li><a href="javascript:void(0);">回复</a></li>
    </ul>
        <?php empty($page) && $page = '';
echo $page;?>
   </div>
  <div class="mainCmt">
    <h5>回复帖子</h5>
    <form>
      <textarea name="" cols="" rows="" class="inp"></textarea>
      <button class="mainCmtBtn">回复</button>
    </form>
  </div>
</div>
