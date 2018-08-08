<?php /*a:2:{s:31:"./themes/default/user/home.html";i:1521208325;s:33:"./themes/default/common/base.html";i:1533707407;}*/ ?>
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

<div class="fly-home fly-panel" style="background-image: url();">
  <img src="<?php echo htmlentities($user['avatar']); ?>_large.png" alt="<?php echo htmlentities($user['username']); ?>">
<!--  <i class="iconfont icon-renzheng" title="Fly社区认证"></i>-->
  <h1><?php echo htmlentities($user['username']); ?><i class="iconfont icon-nan"></i>
    <!-- <i class="iconfont icon-nv"></i>  -->
    <i class="layui-badge fly-badge-vip"><?php echo htmlentities(get_group_name($user['group_id'])); ?></i>
    <!--
    <span style="color:#c00;">（管理员）</span>
    <span style="color:#5FB878;">（社区之光）</span>
    <span>（该号已被封）</span>
    -->
  </h1>
  <p class="fly-home-info">
<!--    <i class="iconfont icon-kiss" title="飞吻"></i><span style="color: #FF7200;">66666 积分</span>-->
    <i class="iconfont icon-shijian"></i><span><?php echo htmlentities(friendlydate($user['create_time'])); ?> 加入</span>
    <i class="iconfont icon-chengshi"></i><span>来自<?php echo htmlentities($user['hometown']); ?></span>
  </p>

  <p class="fly-home-sign"><?php if($user['signature'] != null): ?><?php echo htmlentities($user['signature']); else: ?>TA还未设置签名哦<?php endif; ?></p>

  <!--<div class="fly-sns" data-user="">
    <a href="javascript:;" class="layui-btn layui-btn-primary fly-imActive" data-type="addFriend">加为好友</a>
    <a href="javascript:;" class="layui-btn layui-btn-normal fly-imActive" data-type="chat">发起会话</a>
  </div>-->

</div>

<div class="layui-container">
  <div class="layui-row layui-col-space15">
    <div class="layui-col-md6 fly-home-jie">
      <div class="fly-panel">
        <h3 class="fly-panel-title"><?php echo htmlentities($user['username']); ?> 最近的提问</h3>
        <ul class="jie-row">
		<?php if(is_array($user_topic) || $user_topic instanceof \think\Collection || $user_topic instanceof \think\Paginator): $i = 0; $__LIST__ = $user_topic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <li>
	        <?php if($vo['is_top'] == '1'): ?>
            <span class="layui-badge layui-bg-black">顶</span>
            <?php endif; if($vo['is_recommend'] == '1'): ?>
            <span class="fly-jing">精</span>
            <?php endif; ?>
            <a href="<?php echo url('topic/detail',array('id'=>$vo['id'])); ?>" class="jie-title"><?php echo htmlentities($vo['title']); ?></a>
            <i><?php echo htmlentities(friendlydate($vo['update_time'])); ?></i>
            <em class="layui-hide-xs"><?php echo htmlentities($vo['views']); ?>阅/<?php echo htmlentities($vo['posts']); ?>答</em>
          </li>
		<?php endforeach; endif; else: echo "" ;endif; ?>

          <!-- <div class="fly-none" style="min-height: 50px; padding:30px 0; height:auto;"><i style="font-size:14px;">没有发表任何求解</i></div> -->
        </ul>
      </div>
    </div>
    
    <div class="layui-col-md6 fly-home-da">
      <div class="fly-panel">
        <h3 class="fly-panel-title"><?php echo htmlentities($user['username']); ?> 最近的回答</h3>
        <ul class="home-jieda">
	    <?php if(is_array($user_post) || $user_post instanceof \think\Collection || $user_post instanceof \think\Paginator): $i = 0; $__LIST__ = $user_post;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <li>
          <p>
          <span><?php echo htmlentities(friendlydate($vo['update_time'])); ?></span>
          在<a href="<?php echo url('topic/detail',['id'=>$vo['topic_id']]); ?>" target="_blank"><?php echo htmlentities($vo['title']); ?></a>中回答：
          </p>
          <div class="home-dacontent"><?php echo $vo['content']; ?></div>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
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