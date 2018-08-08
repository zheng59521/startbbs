<?php /*a:2:{s:33:"./themes/default/index/index.html";i:1533707709;s:33:"./themes/default/common/base.html";i:1533707407;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title><?php echo htmlentities($title); ?> - <?php echo config('base.site_title'); ?> - Powered by StartBBS!</title>
  <meta name="keywords" content="fly,layui,前端社区">
  <meta name="description" content="Fly社区是模块化前端UI框架Layui的官网社区，致力于为web开发提供强劲动力">
  <link rel="stylesheet" href="/bbs/public/static/common/js/layui/css/layui.css">
  <link rel="stylesheet" href="/bbs/public/static/default/css/global.css">
  <link rel="stylesheet" href="/bbs/public/static/default/css/index.css">
  
  <style>
  .fly-marginTop {
    margin: 0 auto;
  }
  .fly-panel,.layui-col-space15{
    margin-bottom: 0;
  }
  .layui-col-space15::before{
    content: " ";
    display: block;
    height: 10px;
  }
  </style>
</head>
<body style="margin:0;">
  <div style="height: 10px;"></div>
<!-- include file="common/header"} -->

<div class="fly-panel fly-column">
  <div class="layui-container">
    <ul class="layui-clear">
      <?php if(is_array($category_list) || $category_list instanceof \think\Collection || $category_list instanceof \think\Paginator): $i = 0; $__LIST__ = $category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <li><a href="<?php echo url('category/topic',['id'=>$vo['id']]); ?>"><?php echo htmlentities($vo['name']); ?></a></li>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul> 
    <div class="fly-column-right layui-hide-xs"> 
      <div class="layui-input-inline">
        <input type="text" name="title" placeholder="想搜点什么" autocomplete="off" class="layui-input">
      </div>
      <span class="fly-search"><i class="layui-icon"></i></span> 
      <a href="<?php echo url('topic/add'); ?>" class="layui-btn">发表新帖</a> 
    </div> 
    <div class="layui-hide-sm layui-show-xs-block" style="margin-top: -10px; padding-bottom: 10px; text-align: center;"> 
      <a href="jie/add.html" class="layui-btn">发表新帖</a> 
    </div> 
  </div>
</div>

<div class="layui-container">
  <div class="layui-row layui-col-space15">
    <div class="layui-col-md8">
      <div class="fly-panel">
        <div class="fly-panel-title fly-filter">
          <a>置顶</a>
          <a href="#signin" class="layui-hide-sm layui-show-xs-block fly-right" id="LAY_goSignin" style="color: #FF5722;">去签到</a>
        </div>
        <ul class="fly-list">
	        <?php if(is_array($newtopiclist) || $newtopiclist instanceof \think\Collection || $newtopiclist instanceof \think\Paginator): $i = 0; $__LIST__ = $newtopiclist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['is_top'] == '1'): ?>
          <li>
            <a href="<?php echo url('user/home',['id'=>$vo['uid']]); ?>" class="fly-avatar">
              <img src="<?php echo get_avatar($vo['uid'],'middle'); ?>" alt="<?php echo htmlentities($vo['username']); ?>">
            </a>
            <h2>
              <a class="layui-badge"><?php echo htmlentities(get_category_name($vo['cid'])); ?></a>
              <a href="<?php echo url('topic/detail',array('id'=>$vo['id'])); ?>"><?php echo htmlentities($vo['title']); ?></a>
            </h2>
            <div class="fly-list-info">
              <a href="<?php echo url('user/home',['id'=>$vo['uid']]); ?>" link>
                <cite><?php echo htmlentities($vo['username']); ?></cite>
              </a>
              <span><?php echo htmlentities(friendlyDate($vo['create_time'])); ?></span>
              <span class="fly-list-nums"> 
                <i class="iconfont icon-pinglun1" title="回答"></i> <?php echo htmlentities($vo['posts']); ?>
              </span>
            </div>
            <div class="fly-list-badge">
	            <?php if($vo['is_top']==1): ?>
	            <span class="layui-badge layui-bg-black">置顶</span><?php endif; if($vo['is_recommend']==1): ?>
              <span class="layui-badge layui-bg-red">精帖</span><?php endif; ?>
            </div>
          </li>
          <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>

      <div class="fly-panel" style="margin-bottom: 0;">
        
        <div class="fly-panel-title fly-filter">
          <a href="" class="layui-this">综合</a>
          <span class="fly-mid"></span>
          <a href="">精华</a>
          <span class="fly-filter-right layui-hide-xs">
            <a href="" class="layui-this">按最新</a>
            <span class="fly-mid"></span>
            <a href="">按热议</a>
          </span>
        </div>

        <ul class="fly-list">          
			<?php if(is_array($newtopiclist) || $newtopiclist instanceof \think\Collection || $newtopiclist instanceof \think\Paginator): $i = 0; $__LIST__ = $newtopiclist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['is_top'] == '0'): ?>
          <li>
            <a href="<?php echo url('user/home',['id'=>$vo['uid']]); ?>" class="fly-avatar">
              <img src="<?php echo get_avatar($vo['uid'],'middle'); ?>" alt="<?php echo htmlentities($vo['username']); ?>">
            </a>
            <h2>
              <a class="layui-badge"><?php echo htmlentities(get_category_name($vo['cid'])); ?></a>
              <a href="<?php echo url('topic/detail',array('id'=>$vo['id'])); ?>"><?php echo htmlentities($vo['title']); ?></a>
            </h2>
            <div class="fly-list-info">
              <a href="<?php echo url('user/home',['id'=>$vo['uid']]); ?>" link>
                <cite><?php echo htmlentities($vo['username']); ?></cite>
              </a>
              <span><?php echo htmlentities(friendlyDate($vo['create_time'])); ?></span>
              <span class="fly-list-nums"> 
                <i class="iconfont icon-pinglun1" title="回答"></i> <?php echo htmlentities($vo['posts']); ?>
              </span>
            </div>
            <div class="fly-list-badge">
	            <?php if($vo['is_top']==1): ?>
	            <span class="layui-badge layui-bg-black">置顶</span><?php endif; if($vo['is_recommend']==1): ?>
              <span class="layui-badge layui-bg-red">精帖</span><?php endif; ?>
            </div>
          </li>
          <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </ul>

      </div>
    </div>
    <div class="layui-col-md4">
      <div class="fly-panel">
        <div class="fly-panel-title">
          广告区域
        </div>
        <div class="fly-panel-main">
          <a href="http://www.startbbs.com" target="_blank" class="fly-zanzhu" style="background-color: #5FB878;">StartBBS 2.0 - 匠心之作</a>
        </div>
      </div>
      
      <div class="fly-panel fly-rank fly-rank-reply" id="LAY_replyRank">
        <h3 class="fly-panel-title">回贴周榜</h3>
        <dl>
          <!--<i class="layui-icon fly-loading">&#xe63d;</i>-->
        	<?php foreach($user_list as $vo): ?>
	        <dd>
	            <a href="<?php echo url('user/home',['id'=>$vo['id']]); ?>">
	            <img src="<?php echo htmlentities($vo['avatar']); ?>_middle.png"><cite><?php echo htmlentities($vo['username']); ?></cite><i>贴子数<?php echo htmlentities($vo['posts']); ?></i>
	            </a>
	        </dd>
			<?php endforeach; ?>
        </dl>
      </div>

      <dl class="fly-panel fly-list-one">
        <dt class="fly-panel-title">本周热议</dt>
        <?php if(is_array($hottopiclist) || $hottopiclist instanceof \think\Collection || $hottopiclist instanceof \think\Paginator): $i = 0; $__LIST__ = $hottopiclist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <dd>
          <a href="<?php echo url('topic/detail',array('id'=>$vo['id'])); ?>"><?php echo htmlentities($vo['title']); ?></a>
          <span><i class="iconfont icon-pinglun1"></i> <?php echo htmlentities($vo['views']); ?></span>
        </dd>
		<?php endforeach; endif; else: echo "" ;endif; ?>
        <!-- 无数据时 -->
        <!--
        <div class="fly-none">没有相关数据</div>
        -->
      </dl>


      <div class="fly-panel fly-link">
        <h3 class="fly-panel-title">友情链接</h3>
        <dl class="fly-panel-main">
	        <?php foreach($link as $vo): ?> 
			<dd><a href="<?php echo htmlentities($vo['link']); ?>" target="_blank"><?php echo htmlentities($vo['name']); ?></a><dd>
			<?php endforeach; ?>
          <!--<dd><a href="" class="fly-link">申请友链</a><dd>-->
        </dl>
      </div>

    </div>
  </div>
</div>
 
<!-- include file="common/footer"} -->
<!--JS引用-->
<script src="/bbs/public/static/common/js/jquery.min.js"></script>
<script src="/bbs/public/static/common/js/layui/layui.all.js"></script>
<script src="/bbs/public/static/common/js/global.js"></script>

<!--页面JS脚本-->

</body>
</html>