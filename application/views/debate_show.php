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
      <li class="icoHonour"><span>荣誉学员</span></li>
      <li class="usIco"><a class="usIco1" title="2">收藏</a><a class="usIco2" title="2">勋章</a><a class="usIco3" title="2">顶</a><a class="usIco4" title="2">编辑</a></li>
      <!--titile和文字待定-->
    </ul>
  </div>
        
      <div class="newsCotR pr">
        <article class="newsCots">
          <h1 class="fyahei">现代程序员的工作环境</h1>
          <div class="newsTip"><span>发表于 5 天前 | <a href="#">只看该作者</a></span><span title="阅读" class="icoEye">2012</span><span title="评论" class="icoMsg2">2018</span></div>
          <div class="newsCotIn">
            <blockquote>本次大会更注重交流与互动，解答开发者们的实际困难，并分享实战经验。为庆祝此次大会的召开，特组织征集笑脸活动，将会在大会现场播放笑脸墙，关注我们大会但因地域无法来到现场的朋友们，或已报名出席大会的朋友们，都可积极参与，说不定在现场都可以看到你的朋友或同事的笑脸呦。</blockquote>
            <span class="btnLRed">红方</span>
            <p>一查暴露的问题更多，红会信任危机越大？假如郭美美就只有这些问题，接下来能证明红会的清白，能不查吗？简单的道理，犹如XX想立牌坊，谁都明白。反正红会不彻底清查，我是不会再给他捐款的！！！</p>
            <span class="btnLBlue">蓝方</span>
            <p>真相帝来给你爆个料吧：美美是王某的私生女，王某是某元勋的儿子。当王某得知自己还有这么漂亮的一个女儿的时候顿感亏欠母女多年，对美美宠爱有加，总觉得对美美母女无法弥补，所以事事都由着美美性子来。结果美美胸大无脑玩出了滔天大祸。这时候考验了"亲爹"的护犊之情。
红十字会是副部级单位，你想想按照国情至少得是部级以上的领导才能查他吧？问题是现在的监管部门级别低得连给人家端茶倒水的级别都不够，怎么查？</p>
            <p>美美刚刚出了一张A，手上还拽着四个2和大小王。开始我们是从一张照片认识了美美的背景，所以，有心人不妨仔细分析下美美现在发的图片的背景。我一直认为美美在这宗情况下还傻B似得的拍照炫富，要么她是真脑残，要么，是在释放什么信号，譬如，照片中的细节，让某人知道，她是有底牌的。</p>
            <div class="tc"><img src="images/temp.jpg" width="300" height="200" alt="cat"></div>
            <div>解压密码:</div>
            <div class="showHide">浪漫的杯子，如果您要查看本帖隐藏内容请<a href="#">回复</a></div> 
            <div class="showHideCot">
              <strong>墙关注我们大会但因地域无法来到现场的朋友们，或已报名出席</strong>
              <p>墙，关注我们大会但因地域无法来到现场的朋友们，或已报名出席墙，关注我们大会但因地域无法来到现场的朋友们，或已报名出席墙，关注我们大会但因地域无法来到现场的朋友们，或已报名出席</p>
            </div>         
            <div class="downloadUrl"><a href="#" target="_blank">Nape离线API文档.rar</a>(599.78 KB, 下载次数: 269)</div>
            <div class="orgUrl">原文链接：<a href="#">http://bbs.9ria.com/thread-120574-1-1.html</a></div>
          </div>
        </article>  
        <div class="debate">
          <div class="debateTit">
            <span class="btnUp">顶</span>
            <div class="voteNum">
              <span class="voteNumL" style="width:60%;">999票</span>
              <span class="voteNumR" style="width:40%">500票面</span>
            </div>
            <span class="btnUp2">顶</span>
          </div>
          <div class="debateCot pr">
            <div class="debateCotLi">
              <p class="thesis pr">共青团十七届中央书记处第一书记秦宜智汇报了共青团第十七次全国代表大会和十七届一中全会的召开情况<span>2012-12-12 12:22</span><i class="icoSj pa"></i></p>
              <div  class="thesisUs">
                <a href="#"><img src="images/temp.jpg" alt="浪漫的杯子"></a>
                <p><a href="#">浪漫的杯子</a>：海南小学女生开房案学女生开房案学女生开房案家长称判决太轻将抗诉</p>
              </div>
              <ul>
                <li><a href="#"><img src="images/temp.jpg" alt="浪漫的杯子"></a></li>
                <li><a href="#"><img src="images/temp.jpg" alt="浪漫的杯子"></a></li>
                <li><a href="#"><img src="images/temp.jpg" alt="浪漫的杯子"></a></li>
                <li><a href="#"><img src="images/temp.jpg" alt="浪漫的杯子"></a></li>
                <li><a href="#"><img src="images/temp.jpg" alt="浪漫的杯子"></a></li>
                <li><a href="#"><img src="images/temp.jpg" alt="浪漫的杯子"></a></li>
                <li><a href="#"><img src="images/temp.jpg" alt="浪漫的杯子"></a></li>
                <li><a href="#"><img src="images/temp.jpg" alt="浪漫的杯子"></a></li>
                <li><a href="#"><img src="images/temp.jpg" alt="浪漫的杯子"></a></li>
                <li><a href="#"><img src="images/temp.jpg" alt="浪漫的杯子"></a></li>
              </ul>
              <a href="javascript:void(0);" class="postView">发表红方观点</a>
            </div>
            <div class="debateCotLi userBlue">
              <p class="thesis pr">共青团十七届中央书记处第一书记秦宜智汇报了共青团第十七次全国代表大会和十七届一中全会的召开情况<span>2012-12-12 12:22</span><i class="icoSj pa"></i></p>
              <div  class="thesisUs">
                <a href="#"><img src="images/temp.jpg" alt="浪漫的杯子"></a>
                <p><a href="#">浪漫的杯子</a>：海南小学女生开房案学女生开房案学女生开房案家长称判决太轻将抗诉</p>
              </div>
              <ul>
                <li><a href="#"><img src="images/temp.jpg" alt="浪漫的杯子"></a></li>
                <li><a href="#"><img src="images/temp.jpg" alt="浪漫的杯子"></a></li>
                <li><a href="#"><img src="images/temp.jpg" alt="浪漫的杯子"></a></li>
                <li><a href="#"><img src="images/temp.jpg" alt="浪漫的杯子"></a></li>
                <li><a href="#"><img src="images/temp.jpg" alt="浪漫的杯子"></a></li>
                <li><a href="#"><img src="images/temp.jpg" alt="浪漫的杯子"></a></li>
                <li><a href="#"><img src="images/temp.jpg" alt="浪漫的杯子"></a></li>
                <li><a href="#"><img src="images/temp.jpg" alt="浪漫的杯子"></a></li>
                <li><a href="#"><img src="images/temp.jpg" alt="浪漫的杯子"></a></li>
                <li><a href="#"><img src="images/temp.jpg" alt="浪漫的杯子"></a></li>
              </ul>
              <a href="javascript:void(0);" class="postView">发表蓝方观点</a>
            </div>
            <span class="debateCotHr pa"></span>
          </div>
        </div>    
        <div class="myTag pr"><a href="#">Photoshop</a>,<a href="#">Dota</a>,<a href="#">物理</a>,<a href="#">化学</a><i class="pa"></i></div>  
        <div class="orderBy">
          <span>回复排序列：</span>
          <ul>
            <li><a href="#" class="btnUserDeft">默认</a></li>
            <li><a href="#" class="btnUserRed">红方</a></li>
            <li><a href="#" class="btnUserBlue">蓝方</a></li>
          </ul>
        </div>
        <div class="reply clearfix pr">        
          <div class="replyL">本帖评记记录：共<em>11</em>人评分 银子<em>+42</em></div>
          <div class="replyCot">
              <ul>
                <li>
                  <ul>
                    <li class="td1"><a href="#"><img src="images/temp.jpg" alt="我名"></a></li>
                    <li class="td2"><a href="#">浪漫的杯子</a></li>
                    <li class="td3">+8</li>
                    <li class="td4">郭美美真是个NB的人啊！~</li>
                  </ul>
                </li>
                <li>
                  <ul>
                    <li class="td1"><a href="#"><img src="images/temp.jpg" alt="我名"></a></li>
                    <li class="td2"><a href="#">浪漫的杯子</a></li>
                    <li class="td3">+8</li>
                    <li class="td4">郭美美真是个NB的人啊！~</li>
                  </ul>
                </li>
                <li>
                  <ul>
                    <li class="td1"><a href="#"><img src="images/temp.jpg" alt="我名"></a></li>
                    <li class="td2"><a href="#">浪漫的杯子</a></li>
                    <li class="td3">+8</li>
                    <li class="td4">郭美美真是个NB的人啊！~</li>
                  </ul>
                </li>
                <li>
                  <ul>
                    <li class="td1"><a href="#"><img src="images/temp.jpg" alt="我名"></a></li>
                    <li class="td2"><a href="#">浪漫的杯子</a></li>
                    <li class="td3">+8</li>
                    <li class="td4">郭美美真是个NB的人啊！~</li>
                  </ul>
                </li>
              </ul>
              <div class="replyCotBot">
                <span class="pageRep"><a href="#">上一页</a><a href="#">1</a><a href="#">2</a><a href="#">3</a>...<a href="#">4</a><a href="#">5</a><a href="#">下一页</a></span>
                <span class="btnGrade">我来评分</span>
                
              </div>
            </div> 
          <span class="icoReply pa">收起回复</span>
        </div>
        <div class="related">
          <h3>相关帖子</h3>
          <ul>
            <li><a href="#" title="全称">福州村民被两三千名政府武装人员殴打</a></li>
            <li><a href="#" title="全称">福州村民被两三千名政府武装人员殴打</a></li>
            <li><a href="#" title="全称">福州村民被两三千名政府武装人员殴打</a></li>
            <li><a href="#" title="全称">福州村民被两三千名政府武装人员殴打</a></li>
            <li><a href="#" title="全称">福州村民被两三千名政府武装人员殴打</a></li>
            <li><a href="#" title="全称">福州村民被两三千名政府武装人员殴打</a></li>
            <li><a href="#" title="全称">福州村民被两三千名政府武装人员殴打</a></li>
            <li><a href="#" title="全称">福州村民被两三千名政府武装人员殴打</a></li>
            <li><a href="#" title="全称">福州村民被两三千名政府武装人员殴打</a></li>
            <li><a href="#" title="全称">福州村民被两三千名政府武装人员殴打</a></li>
          </ul>
        </div>
        <ul class="newsBot pa">
          <li class="fl"><a href="#">举报</a></li>
          <li><a href="#" class="icoEdit">评分</a></li>
          <li><a href="#" class="icoCollect">收藏</a></li>
          <li><a href="#" class="icoGrade">编辑</a></li>
          <li><a href="#" class="icoReplys">回复</a></li>
        </ul>
      </div>
    </li>
  </ul>
  <ul class="newsCot">
    <li class="clearfix">
      <div class="newsCotL">
        <div class="usFace pr">
          <a href="#"><img src="images/temp.jpg" alt="名称"></a>
          <span class="pa usFaceBg usFaceBg2"></span>
          <span class="pa usFaceP">实习总航</span>
          <i class="pa icoSj2"></i>
          <div class="usFaceInfoBox pa">
            <div class="usFaceInfo pr">
              <div class="usFaceInfoTit">当前在线</div><!--如果是离加则加载样式：cOffLine -->
              <ul>    
                <li class="usUid"><span>UID：</span>285334</li>
                <li><span>最后登录：</span>2013-6-14</li>
                <li><span>在线时间：</span>37 小时</li>
                <li><span>银子：</span>94 两</li>
                <li><span>注册时间：</span>2012-10-14</li>
                <li><span>积分：</span>1448</li>
                <li><span>主题：</span><a href="#">3</a></li><!--若为0则无链接-->
                <li><span>帖子：</span><a href="#">64</a></li><!--若为0则无链接-->
                <li><span>分享：</span><a href="#">2</a></li><!--若为0则无链接-->
                <li><span>精华：</span>0</li>
                <li><span>金子：</span>12 两</li>
              </ul>
              <div class="usFaceInfoBot"><a href="#" class="icoUs1">资料</a><a href="#" class="icoUs2">串个门</a><a href="#" class="icoUs3">加好友</a></div>
              <i class="pa"></i>
            </div>
          </div>
        </div>
        <div class="usName"><a href="#">浪漫的杯子</a></div>
        <ul class="usTip">
          <li><span class="fl">等级：</span><span class="myRank"><i class="icoSun"></i><i class="icoSun"></i><i class="icoMoon"></i><i class="icoStar"></i></span></li>
          <li><span class="fl">积分：</span>250</li> 
          <li class="usIco"><a class="usIco1" title="2">收藏</a><a class="usIco2" title="2">勋章</a><a class="usIco3" title="2">顶</a><a class="usIco4" title="2">编辑</a></li><!--titile和文字待定-->
        </ul>
      </div>
      <div class="newsCotR pr">
        <div class="tr myState myState2"><span class="btnLBlue">蓝方</span><div class="newsTip"><span>发表于 5 天前 | <a href="#">只看该作者</a></span><span title="阅读" class="icoEye">2012</span><span title="评论" class="icoMsg2">2018</span></div>沙发</div>
        
        <article class="newsCots">
          <h2 class="fyahei">现代程序员的工作环境</h2>          
          <div class="newsCotIn">
            <p>7天前，32岁的漯河人周三江倒在郑州东区的马路边上，再也没有醒来。周三江72岁的老父亲来郑州商都路派出所办理死亡证明时被索要3000元运尸费，而且不开发票，这个数字顿时吓住了老人。从周三江的死亡地点到医院太平间区区15公里，为何会花费3000元运尸费？警察和太平间工作人员均表示，这是"不成文的规定"。<em>(今天10:17)</em></p>
          </div>
        </article>
                
               
        <div class="cmtCot">
          <span class="btnCmt">点评</span>
          <a href="#"><img src="images/temp.jpg" alt="名称"></a>
          <div class="cmtCotR"><a href="#">浪漫的杯子</a>从周三江的死亡地点到医院太平间区区15公里，为何会花费3000元运尸费？<span><em>发表于：</em>2012-12-12 15：22</span><span><em>IP：</em>158.236.232.232</span></div>
        </div>
        <div class="newsAD fsong"><i></i>本次大会更注难，并分享实战经验。为庆祝此次大会<cite>|</cite><a href="#">本次大会更注重交流与互难，并分享实</a><cite>|</cite><a href="#">本次大会更注重交流与互难，并分享实</a></div>
        <ul class="newsBot pa">
          <li class="fl"><a href="#">举报</a></li>
          <li><a href="#" class="icoEdit">评分</a></li>
          <li><a href="#" class="icoCite">引用不着</a></li>
          <li><a href="#" class="icoReplys">回复</a></li>
        </ul>
      </div>
    </li>
    <li class="clearfix">
      <div class="newsCotL">
        <div class="usFace pr">
          <a href="#"><img src="images/temp.jpg" alt="名称"></a>
          <span class="pa usFaceBg usFaceBg3"></span>
          <span class="pa usFaceP">会员</span>
          <i class="pa icoSj2"></i>
          <div class="usFaceInfoBox pa">
            <div class="usFaceInfo pr">
              <div class="usFaceInfoTit">当前在线</div><!--如果是离加则加载样式：cOffLine -->
              <ul>    
                <li class="usUid"><span>UID：</span>285334</li>
                <li><span>最后登录：</span>2013-6-14</li>
                <li><span>在线时间：</span>37 小时</li>
                <li><span>银子：</span>94 两</li>
                <li><span>注册时间：</span>2012-10-14</li>
                <li><span>积分：</span>1448</li>
                <li><span>主题：</span><a href="#">3</a></li><!--若为0则无链接-->
                <li><span>帖子：</span><a href="#">64</a></li><!--若为0则无链接-->
                <li><span>分享：</span><a href="#">2</a></li><!--若为0则无链接-->
                <li><span>精华：</span>0</li>
                <li><span>金子：</span>12 两</li>
              </ul>
              <div class="usFaceInfoBot"><a href="#" class="icoUs1">资料</a><a href="#" class="icoUs2">串个门</a><a href="#" class="icoUs3">加好友</a></div>
              <i class="pa"></i>
            </div>
          </div>
        </div>
        <div class="usName"><a href="#">浪漫的杯子</a></div>
        <ul class="usTip">
          <li><span class="fl">等级：</span><span class="myRank"><i class="icoSun"></i><i class="icoSun"></i><i class="icoMoon"></i><i class="icoStar"></i></span></li>
          <li><span class="fl">积分：</span>250</li> 
          <li class="usIco"><a class="usIco1" title="2">收藏</a><a class="usIco2" title="2">勋章</a><a class="usIco3" title="2">顶</a><a class="usIco4" title="2">编辑</a></li><!--titile和文字待定-->
        </ul>
      </div>
      <div class="newsCotR pr">
        <div class="tr myState">沙发</div>
        <blockquote class="blot">
          <strong>引用 2 楼"花舞霓裳"的回复:</strong>
          <p>一查暴露的问题更多，红会信任危机越大？假如郭美美就只有这些问题，接下来能证明红会的清白，能不查吗？简单的道理，犹如XX想立牌坊，谁都明白。反正红会不彻底清查，我是不会再给他捐款的！脸呦。</p>
          <p>一查暴露的问题更多，红会信任危机越大？假如郭美美就只有这些问题，接下来能证明红会的清白，能不查吗？简单的道理，犹如XX想立牌坊，谁都明白。反正红会不彻底清查，我是不会再给他捐款的！脸呦。</p>
        </blockquote>
        <div class="myCmt">
          <p>7天前，32岁的漯河人周三江倒在郑州东区的马路边上，再也没有醒来。周三江72岁的老父亲来郑州商都路派出所办理死亡证明时被索要3000元运尸费，而且不开发票，这个数字顿时吓住了老人。从周三江的死亡地点到医院太平间区区15公里，为何会花费3000元运尸费？警察和太平间工作人员均表示，这是"不成文的规定"。<em>(今天10:17)</em></p>
        </div>
        <div class="newsADImg"><a href="#"><img src="images/temp.jpg" alt="名称"></a></div>
        <ul class="newsBot pa">
          <li class="fl"><a href="#">举报</a></li>
          <li><a class="icoEdit" href="#">评分</a></li>
          <li><a class="icoCite" href="#">引用不着</a></li>
          <li><a class="icoReplys" href="#">回复</a></li>
        </ul>
      </div>
    </li>    
  </ul>
  <div class="menuPage clearfix">
    <ul class="menuTag">
      <li class="pr hasMenu"><a href="javascript:void(0);" class="icoPost">发帖</a>
        <div class="menuBox pa">
          <ul>
            <li class="icoSj"></li>
            <li><a href="#" class="ico1">发表帖子</a></li>
            <li><a href="#" class="ico2">发起投票</a></li>
            <li><a href="#" class="ico3">发布悬赏</a></li>
            <li><a href="#" class="ico4">发起辩论</a></li>
            <li><a href="#" class="ico5">发起活动</a></li>
            <li><a href="#" class="ico6">出售商品</a></li>
          </ul>
        </div>        
      </li>
      <li><a href="javascript:void(0);">回复</a></li>
    </ul>
    <div class="pagenum"><a href="../2.html" class="btnPre"></a><a href="#" class="current">1</a><a href="../2.html">2</a><a href="../3.html">3</a><a href="../4.html">4</a><a href="../5.html">5</a><a href="../6.html">6</a><a href="../7.html">7</a><a href="../8.html">8</a>...<a href="../100.html">100</a><a href="../2.html" class="btnNext"></a></div>
  </div>
  <div class="mainCmt">
    <h5>给作者留言</h5>
    <form>
      <textarea name="" cols="" rows="" class="inp"></textarea>
      <button class="mainCmtBtn">回复</button>
    </form>
  </div>  
</div>