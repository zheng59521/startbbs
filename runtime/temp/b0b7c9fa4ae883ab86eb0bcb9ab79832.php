<?php /*a:2:{s:35:"./themes/default/article/index.html";i:1521208325;s:33:"./themes/default/common/base.html";i:1533648565;}*/ ?>
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
  </style>
</head>
<body style="margin:0;">
<!-- include file="common/header"} -->

<div class="layui-container  fly-marginTop">
  <div class="layui-row layui-col-space15">
    <div class="layui-col-md8">
      <div class="fly-panel" style="margin-bottom: 0;">
        <div class="fly-panel-title fly-filter"><h2>文章</h2>
        </div>

        <ul class="article-list">          
		<?php if(is_array($articlelist) || $articlelist instanceof \think\Collection || $articlelist instanceof \think\Paginator): $i = 0; $__LIST__ = $articlelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <li>
            <h3>
              <a href="<?php echo url('article/detail',array('id'=>$vo['id'])); ?>"><?php echo htmlentities($vo['title']); ?></a>
            </h3>
            <p><?php echo htmlentities($vo['introduction']); ?></p>
            <div class="fly-list-info">
              <span><?php echo htmlentities($vo['publish_time']); ?></span>
              <span class="fly-list-nums"> 
                <i class="iconfont icon-pinglun1" title="回答"></i> <?php echo htmlentities($vo['reading']); ?>
              </span>
            </div>
            <div class="fly-list-badge">
	            <?php if($vo['is_top']==1): ?>
	            <span class="layui-badge layui-bg-black">置顶</span><?php endif; if($vo['is_recommend']==1): ?>
              <span class="layui-badge layui-bg-red">精帖</span><?php endif; ?>
            </div>
          </li>
		<?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <?php echo $page; ?>
      </div>
      
    </div>
    <div class="layui-col-md4">
      <div class="fly-panel fly-link">
        <h3 class="fly-panel-title">栏目索引</h3>
        <dl class="fly-panel-main">
      <?php if(is_array($category_list) || $category_list instanceof \think\Collection || $category_list instanceof \think\Paginator): $i = 0; $__LIST__ = $category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <dd><a href="<?php echo url('article/category',['cid'=>$vo['id']]); ?>"><?php echo htmlentities($vo['name']); ?></a></dd>
      <?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
      </div>
      <dl class="fly-panel fly-list-one">
        <dt class="fly-panel-title">本版热议</dt>
        <?php if(is_array($hotarticle) || $hotarticle instanceof \think\Collection || $hotarticle instanceof \think\Paginator): $i = 0; $__LIST__ = $hotarticle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <dd>
          <a href="<?php echo url('article/detail',['id'=>$vo['id']]); ?>"><?php echo htmlentities($vo['title']); ?></a>
          <span><i class="iconfont icon-pinglun1"></i> <?php echo htmlentities($vo['reading']); ?></span>
        </dd>
		<?php endforeach; endif; else: echo "" ;endif; ?>

        <!-- 无数据时 -->
        <!--
        <div class="fly-none">没有相关数据</div>
        -->
      </dl>

      <div class="fly-panel">
        <div class="fly-panel-title">
          这里可作为广告区域
        </div>
        <div class="fly-panel-main">
          <a href="" target="_blank" class="fly-zanzhu" style="background-color: #393D49;">虚席以待</a>
        </div>
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