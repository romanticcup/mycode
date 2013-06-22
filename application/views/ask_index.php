<!--content-->
<div class="wrap clearfix">
  <div class="myPos fsong">>
	<a href="<?php echo base_url();?>">论坛</a>><a href="<?php echo base_url('index.php/bbs/ask/');?>">问答</a><?php 
  	if(!empty($nav)){
		echo '>';
	  	$nav_num = count($nav);
		$i=0;
		foreach($nav as $key=>$val){
			$i++;
			$link = '<a href="'.base_url('index.php/bbs/ask/?forum_id='.$key).'">'.$val.'</a>>';
			
			if($nav_num == $i){
				$link = substr($link,0,-1);
			}
			echo $link;
		}
	}
  ?>
  </div>
  <div class="col1 pr"> 
    <nav class="leftNav">
      <!--<dl>
        <dt>收藏的版块</dt>
        <dd><a href="#">口水天下</a></dd>
      </dl>-->
      <?php foreach($forums as $forum){?>
      <dl>
        <dt><a href="javascript:void(0);"><?php echo $forum['name']; ?></a></dt>
        	<?php 
			if(!empty($forum['sub'])){
			foreach($forum['sub'] as $sub){?>
        		<dd><a href="<?php echo base_url('index.php/bbs/ask/?forum_id='.$sub['id']);?>"><?php echo $sub['name']; ?></a></dd>
        	<?php }}?>
      </dl>
      <?php }?>
      
    </nav>
    <span class="leftNavCtrl pa"></span>
  </div>
  <div class="col2">
    <div class="boardInfo">
    
      <div class="boardInfoTop">
      <?php if(!empty($current_forum)){?>
        <h3>
        <?php if(!empty($current_forum['name'])){?>
        <a href="<?php echo base_url('index.php/bbs/ask/?forum_id='.$current_forum['id']);?>">
			<?php echo $current_forum['name']?>
        </a>
        <?php }else{?>
        问答首页
        <?php }?>
        </h3>
        
        <span class="fl">
        	今日：<strong><?php echo isset($current_forum['today_topics'])?$current_forum['today_topics']:0?></strong>
            主题：<strong><?php echo isset($current_forum['topics'])?$current_forum['topics']:0?></strong>
        </span>
        
        <span class="fr">
        <!--<a href="#">收藏本版</a>
        <a href="#" class="btnRss">订阅</a>-->
        <i></i></span>
      </div>
      <?php }?>
      
      <?php if(!empty($mannager)){?>
          <div class="boardMsgr">
          <strong>版主：</strong>
			<?php foreach($mannager as $user){
            	$users[] = '<a href="'.$this->config->item('user_url').$user['id'].'">'.$user['username'].'</a>,';
            }
				echo join(',',$users);
			?>
          </div>
      <?php }?>
      
      <!--推荐帖子-->
      <?PHP 
		if(!empty($recommend_topics)){
			foreach($recommend_topics as $topic){
				echo '<p><strong><a href="'.base_url().'index.php/topic/show/'.$topic['id'].'">'.$topic['subject'].'</a></strong></p>';
			}
		}
	  ?>
    </div>
    <div class="menuPage clearfix">
    <?php if(!empty($forum_id)){?>
      <ul class="menuTag">
        <li class="pr hasMenu"><a href="javascript:void(0);" class="icoPost">发帖</a>
          <div class="menuBox pa">
            <ul>
              <li class="icoSj"></li>
            <li class="icoSj"></li>
            <li><a href="<?php echo base_url('index.php/action/post/'.$forum_id.'/1');?>" class="ico1" target="_blank">发表帖子</a></li>
            <li><a href="<?php echo base_url('index.php/action/post/'.$forum_id.'/2');?>" class="ico3" target="_blank">发布问答</a></li>
            <li><a href="<?php echo base_url('index.php/action/post/'.$forum_id.'/3');?>" class="ico2" target="_blank">发起投票</a></li>
            <li><a href="<?php echo base_url('index.php/action/post/'.$forum_id.'/4');?>" class="ico4" target="_blank">发起辩论</a></li>
            </ul>
          </div>
        </li>
      </ul>
      <?php }?>
      <?php empty($page) && $page = ''; echo $page;?>

    </div>
    <div class="list">
      <ul class="listTag">
        <li <?php if(empty($type)){ echo 'class="current"'; }?>><a href="<?=$type_url.'0'?>">全部</a></li>
        <li <?php if($type==1){ echo 'class="current"'; }?>><a href="<?=$type_url.'1'?>">待解决</a></li>
        <li <?php if($type==2){ echo 'class="current"'; }?>><a href="<?=$type_url.'2'?>">已解决</a></li>
        <li <?php if($type==3){ echo 'class="current"'; }?>><a href="<?=$type_url.'3'?>">零回答</a></li>
      </ul>
        
      <?php if(!empty($topic_categorys)){?>
      <div class="tags">
        <strong><a href="#">全部</a></strong>
        <ul>
          <?php foreach($topic_categorys as $topic_category){
              echo '<li><a href="'. $category_url.$topic_category['id'] .'">'.$topic_category['name'].'</a></li>';
          }?>
        </ul>
      </div>
      <?php }?>
        
      <ul class="listCot listCotShow">
       <li class="listCotShowOrder">
          <ul>
            <li class="td1">筛选：</li>
            <li class="td2">
            <a href="javascript:void(0);">发布时间</a>
            <a href="javascript:void(0);">最高赏金</a>
            <a href="javascript:void(0);">推荐</a>
            </li>
            <li class="td3">赏金</li>
            <li class="td4">作者</li>
            <li class="td5">回复/查看</li>
            <li class="td6">最后发表</li>
          </ul>
        </li>
        <li>
          <ul>
            <li class="td1"><i class="icoAEd"></i></li>
            <li class="td2"><strong><a href="#">[交互设计]</a></strong><a href="#" title="郭美美澳门包场办奢华派对庆生惹众怒">郭美美澳门包场办奢华派对庆生惹众怒</a></li>
            <li class="td3"><i class="icoCoin"></i>50</li>
            <li class="td4">
              <a href="#"><img src="images/temp.jpg" alt="大猫"></a>
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">2013-6-17</span>
            </li>
            <li class="td5">
              <span class="tdSpan1"><a href="#">30</a></span>
              <span class="tdSpan2">5455</span>
            </li>
            <li class="td6">              
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">3分钟前</span>
            </li>
          </ul>
        </li>
        <li>
          <ul>
            <li class="td1"><i class="icoAIng"></i></li>
            <li class="td2"><strong><a href="#">[Android]</a></strong><a href="#" title="郭美美澳门包场办奢华派对庆生惹众怒">郭美美澳美美澳美美澳美美澳美美澳美美澳美美澳美美澳美美澳美美澳门包场办奢华派对庆生惹众怒</a></li>
            <li class="td3"><i class="icoCoin"></i>5240</li>
            <li class="td4">
              <a href="#"><img src="images/temp.jpg" alt="大猫"></a>
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">2013-6-17</span>
            </li>
            <li class="td5">
              <span class="tdSpan1"><a href="#">30</a></span>
              <span class="tdSpan2">5455</span>
            </li>
            <li class="td6">              
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">3分钟前</span>
            </li>
          </ul>
        </li>
        <li>
          <ul>
            <li class="td1"><i class="icoANo"></i></li>
            <li class="td2"><strong><a href="#">[HTML5/CSS3/JS2]</a></strong><a href="#" title="郭美美澳门包场办奢华派对庆生惹众怒">郭美美澳门包场办奢华派对庆生惹众怒</a></li>
            <li class="td3"><i class="icoCoin"></i>113</li>
            <li class="td4">
              <a href="#"><img src="images/temp.jpg" alt="大猫"></a>
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">2013-6-17</span>
            </li>
            <li class="td5">
              <span class="tdSpan1"><a href="#">30</a></span>
              <span class="tdSpan2">5455</span>
            </li>
            <li class="td6">              
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">3分钟前</span>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="listCot">
        <li>
          <ul>
            <li class="td1"><i class="icoAIng"></i></li>
            <li class="td2"><strong><a href="#">[交互设计]</a></strong><a href="#" title="郭美美澳门包场办奢华派对庆生惹众怒">郭美美澳门包场办奢华派对庆生惹众怒</a></li>
            <li class="td3"><i class="icoCoin"></i>50</li>
            <li class="td4">
              <a href="#"><img src="images/temp.jpg" alt="大猫"></a>
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">2013-6-17</span>
            </li>
            <li class="td5">
              <span class="tdSpan1"><a href="#">30</a></span>
              <span class="tdSpan2">5455</span>
            </li>
            <li class="td6">              
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">3分钟前</span>
            </li>
          </ul>
        </li>
        <li>
          <ul>
            <li class="td1"><i class="icoAIng"></i></li>
            <li class="td2"><strong><a href="#">[Android]</a></strong><a href="#" title="郭美美澳门包场办奢华派对庆生惹众怒">郭美美澳美美澳美美澳美美澳美美澳美美澳美美澳美美澳美美澳美美澳门包场办奢华派对庆生惹众怒</a></li>
            <li class="td3"><i class="icoCoin"></i>5240</li>
            <li class="td4">
              <a href="#"><img src="images/temp.jpg" alt="大猫"></a>
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">2013-6-17</span>
            </li>
            <li class="td5">
              <span class="tdSpan1"><a href="#">30</a></span>
              <span class="tdSpan2">5455</span>
            </li>
            <li class="td6">              
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">3分钟前</span>
            </li>
          </ul>
        </li>
        <li>
          <ul>
            <li class="td1"><i class="icoAIng"></i></li>
            <li class="td2"><strong><a href="#">[HTML5/CSS3/JS2]</a></strong><a href="#" title="郭美美澳门包场办奢华派对庆生惹众怒">郭美美澳门包场办奢华派对庆生惹众怒</a></li>
            <li class="td3"><i class="icoCoin"></i>113</li>
            <li class="td4">
              <a href="#"><img src="images/temp.jpg" alt="大猫"></a>
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">2013-6-17</span>
            </li>
            <li class="td5">
              <span class="tdSpan1"><a href="#">30</a></span>
              <span class="tdSpan2">5455</span>
            </li>
            <li class="td6">              
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">3分钟前</span>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="listCot">
        <li>
          <ul>
            <li class="td1"><i class="icoAEd"></i></li>
            <li class="td2"><strong><a href="#">[交互设计]</a></strong><a href="#" title="郭美美澳门包场办奢华派对庆生惹众怒">郭美美澳门包场办奢华派对庆生惹众怒</a></li>
            <li class="td3"><i class="icoCoin"></i>50</li>
            <li class="td4">
              <a href="#"><img src="images/temp.jpg" alt="大猫"></a>
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">2013-6-17</span>
            </li>
            <li class="td5">
              <span class="tdSpan1"><a href="#">30</a></span>
              <span class="tdSpan2">5455</span>
            </li>
            <li class="td6">              
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">3分钟前</span>
            </li>
          </ul>
        </li>
        <li>
          <ul>
            <li class="td1"><i class="icoAEd"></i></li>
            <li class="td2"><strong><a href="#">[Android]</a></strong><a href="#" title="郭美美澳门包场办奢华派对庆生惹众怒">郭美美澳美美澳美美澳美美澳美美澳美美澳美美澳美美澳美美澳美美澳门包场办奢华派对庆生惹众怒</a></li>
            <li class="td3"><i class="icoCoin"></i>5240</li>
            <li class="td4">
              <a href="#"><img src="images/temp.jpg" alt="大猫"></a>
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">2013-6-17</span>
            </li>
            <li class="td5">
              <span class="tdSpan1"><a href="#">30</a></span>
              <span class="tdSpan2">5455</span>
            </li>
            <li class="td6">              
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">3分钟前</span>
            </li>
          </ul>
        </li>
        <li>
          <ul>
            <li class="td1"><i class="icoAEd"></i></li>
            <li class="td2"><strong><a href="#">[HTML5/CSS3/JS2]</a></strong><a href="#" title="郭美美澳门包场办奢华派对庆生惹众怒">郭美美澳门包场办奢华派对庆生惹众怒</a></li>
            <li class="td3"><i class="icoCoin"></i>113</li>
            <li class="td4">
              <a href="#"><img src="images/temp.jpg" alt="大猫"></a>
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">2013-6-17</span>
            </li>
            <li class="td5">
              <span class="tdSpan1"><a href="#">30</a></span>
              <span class="tdSpan2">5455</span>
            </li>
            <li class="td6">              
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">3分钟前</span>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="listCot">
        <li>
          <ul>
            <li class="td1"><i class="icoANo"></i></li>
            <li class="td2"><strong><a href="#">[交互设计]</a></strong><a href="#" title="郭美美澳门包场办奢华派对庆生惹众怒">郭美美澳门包场办奢华派对庆生惹众怒</a></li>
            <li class="td3"><i class="icoCoin"></i>50</li>
            <li class="td4">
              <a href="#"><img src="images/temp.jpg" alt="大猫"></a>
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">2013-6-17</span>
            </li>
            <li class="td5">
              <span class="tdSpan1"><a href="#">30</a></span>
              <span class="tdSpan2">5455</span>
            </li>
            <li class="td6">              
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">3分钟前</span>
            </li>
          </ul>
        </li>
        <li>
          <ul>
            <li class="td1"><i class="icoANo"></i></li>
            <li class="td2"><strong><a href="#">[Android]</a></strong><a href="#" title="郭美美澳门包场办奢华派对庆生惹众怒">郭美美澳美美澳美美澳美美澳美美澳美美澳美美澳美美澳美美澳美美澳门包场办奢华派对庆生惹众怒</a></li>
            <li class="td3"><i class="icoCoin"></i>5240</li>
            <li class="td4">
              <a href="#"><img src="images/temp.jpg" alt="大猫"></a>
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">2013-6-17</span>
            </li>
            <li class="td5">
              <span class="tdSpan1"><a href="#">30</a></span>
              <span class="tdSpan2">5455</span>
            </li>
            <li class="td6">              
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">3分钟前</span>
            </li>
          </ul>
        </li>
        <li>
          <ul>
            <li class="td1"><i class="icoANo"></i></li>
            <li class="td2"><strong><a href="#">[HTML5/CSS3/JS2]</a></strong><a href="#" title="郭美美澳门包场办奢华派对庆生惹众怒">郭美美澳门包场办奢华派对庆生惹众怒</a></li>
            <li class="td3"><i class="icoCoin"></i>113</li>
            <li class="td4">
              <a href="#"><img src="images/temp.jpg" alt="大猫"></a>
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">2013-6-17</span>
            </li>
            <li class="td5">
              <span class="tdSpan1"><a href="#">30</a></span>
              <span class="tdSpan2">5455</span>
            </li>
            <li class="td6">              
              <span class="tdSpan1"><a href="#">浪漫的杯子</a></span>
              <span class="tdSpan2">3分钟前</span>
            </li>
          </ul>
        </li>
      </ul>
      
      
      
      
    </div>
    <div class="menuPage clearfix">
    
    <?php if(!empty($forum_id)){?>
      <ul class="menuTag">
        <li class="pr hasMenu"><a href="javascript:void(0);" class="icoPost">发帖</a>
          <div class="menuBox pa">
            <ul>
              <li class="icoSj"></li>
            <li class="icoSj"></li>
            <li><a href="<?php echo base_url('index.php/action/post/'.$forum_id.'/1');?>" class="ico1" target="_blank">发表帖子</a></li>
            <li><a href="<?php echo base_url('index.php/action/post/'.$forum_id.'/2');?>" class="ico3" target="_blank">发布问答</a></li>
            <li><a href="<?php echo base_url('index.php/action/post/'.$forum_id.'/3');?>" class="ico2" target="_blank">发起投票</a></li>
            <li><a href="<?php echo base_url('index.php/action/post/'.$forum_id.'/4');?>" class="ico4" target="_blank">发起辩论</a></li>
            </ul>
          </div>
        </li>
      </ul>
      <?php }?>
      
      <div class="pagenum"><a href="../2.html" class="btnPre"></a><a href="#" class="current">1</a><a href="../2.html">2</a><a href="../3.html">3</a><a href="../4.html">4</a><a href="../5.html">5</a><a href="../6.html">6</a><a href="../7.html">7</a><a href="../8.html">8</a>...<a href="../100.html">100</a><a href="../2.html" class="btnNext"></a></div>
    </div>
  </div>

</div>