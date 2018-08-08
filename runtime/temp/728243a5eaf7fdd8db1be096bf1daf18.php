<?php /*a:2:{s:36:"./themes/default/category/index.html";i:1521208325;s:33:"./themes/default/common/base.html";i:1533707407;}*/ ?>
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

<div class="layui-container fly-marginTop">
      <div class="fly-panel" pad20>
        	<h2 style="margin-bottom:15px;">版块分类导航</h2>
        <?php if(is_array($category_list) || $category_list instanceof \think\Collection || $category_list instanceof \think\Paginator): $i = 0; $__LIST__ = $category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	        <div class="layui-row" style="padding:10px 0;border-bottom: 1px dotted #999;">
	    		<div class="layui-col-md6">
	        <div class="layui-row">
	    		<div class="layui-col-md2">
					<a href="<?php echo url('category/topic',['id'=>$vo['id']]); ?>">
	              <img style="width:80px;height:80px;" src="<?php echo htmlentities($vo['thumb']); ?>" alt="<?php echo htmlentities($vo['name']); ?>">
	            	</a>
		    	</div>
	    		<div class="layui-col-md10">
					<h2><a href="<?php echo url('category/topic',['id'=>$vo['id']]); ?>"><?php echo htmlentities($vo['name']); ?></a></h2>
					<p><?php echo htmlentities($vo['description']); ?></p>
					<p>
						<span><?php echo htmlentities($vo['name']); ?></span>
						<!--<span><i class="layui-badge fly-badge-vip">VIP3</i></span>
						<span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>
	            		<span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>-->
	            	</p>
	            	<?php if(isset($vo['children'])): ?>
	            	<p>子版块：<?php foreach($vo['children'] as $v): ?><span><a href="<?php echo url('category/topic',['id'=>$v['id']]); ?>"><?php echo htmlentities($v['name']); ?></a></span><?php endforeach; ?></p>
	            	<?php endif; ?>
		    	</div>

		    </div>
		    </div>
		    <div class="layui-col-md6">
		    	<span class="fly-list-nums"><i class="iconfont icon-pinglun1" title="回答"></i> <?php echo htmlentities($vo['topics']); ?></span>
		    </div>
		    </div>
	     <?php endforeach; endif; else: echo "" ;endif; ?>	
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