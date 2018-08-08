<?php /*a:2:{s:31:"./themes/admin/index/index.html";i:1521208325;s:24:"./themes/admin/base.html";i:1521208325;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>StartBBS后台管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="/bbs/public/static/common/js/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/bbs/public/static/common/css/font-awesome.min.css">
    <!--CSS引用-->
    
    <link rel="stylesheet" href="/bbs/public/static/common/css/admin.css">
    <!--[if lt IE 9]>
    <script src="/bbs/public/static/common/css/html5shiv.min.js"></script>
    <script src="/bbs/public/static/common/css/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="layui-layout layui-layout-admin">
    <!--头部-->
    <div class="layui-header header">
        <a href=""><img class="logo" src="/bbs/public/static/common/images/admin_logo.png" alt=""></a>
        <ul class="layui-nav" style="position: absolute;top: 0;right: 20px;background: none;">
            <li class="layui-nav-item"><a href="<?php echo htmlentities($root); ?>" target="_blank">前台首页</a></li>
            <li class="layui-nav-item"><a href="http://www.startbbs.com" target="_blank">官方网站</a></li>
            <li class="layui-nav-item"><a href="javascript:void(0)" data-url="<?php echo url('admin/system/clear'); ?>" id="clear-cache">清除缓存</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;"><?php echo session('user_name'); ?></a>
                <dl class="layui-nav-child"> <!-- 二级菜单 -->
                    <dd><a href="<?php echo url('admin/change_password/index'); ?>">修改密码</a></dd>
                    <dd><a href="<?php echo url('admin/login/logout'); ?>">退出登录</a></dd>
                </dl>
            </li>
        </ul>
    </div>

    <!--侧边栏-->
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree">
                <li class="layui-nav-item layui-nav-title"><a>管理菜单</a></li>
                <li class="layui-nav-item">
                    <a href="<?php echo url('admin/index/index'); ?>"><i class="fa fa-home"></i> 网站信息</a>
                </li>
                <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): if( count($menu)==0 ) : echo "" ;else: foreach($menu as $key=>$vo): if(isset($vo['children'])): ?>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="<?php echo htmlentities($vo['icon']); ?>"></i> <?php echo htmlentities($vo['title']); ?></a>
                    <dl class="layui-nav-child">
                        <?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): if( count($vo['children'])==0 ) : echo "" ;else: foreach($vo['children'] as $key=>$v): ?>
                        <dd><a href="<?php echo url($v['name'],$v['param']); ?>"> <?php echo htmlentities($v['title']); ?></a></dd>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </dl>
                </li>
                <?php else: ?>
                <li class="layui-nav-item">
                    <a href="<?php echo url($vo['name']); ?>"><i class="<?php echo htmlentities($vo['icon']); ?>"></i> <?php echo htmlentities($vo['title']); ?></a>
                </li>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>

                <li class="layui-nav-item" style="height: 30px; text-align: center"></li>
            </ul>
        </div>
    </div>

    <!--主体-->
    
<div class="layui-body">
	    <!--tab标签-->
	    <div class="layui-tab layui-tab-brief">
	        <ul class="layui-tab-title">
	            <li class="layui-this">网站概览</li>
	        </ul>
	        <div class="layui-tab-content layui-row layui-col-space20">
	            <div class="layui-tab-item layui-show layui-col-md6">
	                <table class="layui-table">
		                <thead>
			                <tr>
						      <th colspan="2">系统信息</th>
						    </tr> 
			            </thead>
	                    <tr>
	                        <td>网站域名</td>
	                        <td><?php echo htmlentities($config['url']); ?></td>
	                    </tr>
	                    <tr>
	                        <td>网站目录</td>
	                        <td><?php echo htmlentities($config['document_root']); ?></td>
	                    </tr>
	                    <tr>
	                        <td>服务器操作系统</td>
	                        <td><?php echo htmlentities($config['server_os']); ?></td>
	                    </tr>
	                    <tr>
	                        <td>服务器端口</td>
	                        <td><?php echo htmlentities($config['server_port']); ?></td>
	                    </tr>
	                    <tr>
	                        <td>服务器环境</td>
	                        <td><?php echo htmlentities($config['server_soft']); ?></td>
	                    </tr>
	                    <tr>
	                        <td>PHP版本</td>
	                        <td><?php echo htmlentities($config['php_version']); ?></td>
	                    </tr>
	                    <tr>
	                        <td>MySQL版本</td>
	                        <td><?php echo htmlentities($config['mysql_version']); ?></td>
	                    </tr>
	                    <tr>
	                        <td>最大上传限制</td>
	                        <td><?php echo htmlentities($config['max_upload_size']); ?></td>
	                    </tr>
	                </table>
	            </div>
	            <div class="layui-tab-item layui-show layui-col-md6">
	                <table class="layui-table">
		                <thead>
			                <tr>
						      <th colspan="2">产品信息</th>
						    </tr> 
			            </thead>
	                    <tr>
	                        <td>产品名称</td>
	                        <td>StartBBS轻量社区系统</td>
	                    </tr>
	                    <tr>
	                        <td>系统版本</td>
	                        <td><?php echo config('version'); ?></td>
	                    </tr>
	                    <tr>
	                        <td>更新时间</td>
	                        <td><?php echo config('publish_time'); ?></td>
	                    </tr>
	                    <tr>
	                        <td>官方网站</td>
	                        <td><a href="http://www.startbbs.com">http://www.startbbs.com</a></td>
	                    </tr>
	                    <tr>
	                        <td>官方QQ群</td>
	                        <td>超级群：645590178</td>
	                    </tr>
	                    <tr>
	                        <td>联系我们</td>
	                        <td>startbbs@126.com</td>
	                    </tr>
	                    <tr>
	                        <td>开发团队</td>
	                        <td>烧饼shaobing.me</td>
	                    </tr>
	                    <tr>
	                        <td></td>
	                        <td></td>
	                    </tr>
	                </table>
	            </div>
	        </div>
	    </div>
</div>


    <!--底部-->
    <div class="layui-footer footer">
        <div class="layui-main">
            <p>2017-2018 &copy; <a href="http://www.startbbs.com" target="_blank">StartBBS后台管理</a> <?php echo config('version'); ?> - <?php echo config('publish_time'); ?> </p>
        </div>
    </div>
</div>

<script>
    // 定义全局JS变量
    var GV = {
        current_controller: "admin/<?php echo htmlentities((isset($controller) && ($controller !== '')?$controller:'')); ?>/",
        base_url: "/bbs/public/static"
    };
</script>
<!--JS引用-->
<script src="/bbs/public/static/common/js/jquery.min.js"></script>
<script src="/bbs/public/static/common/js/layui/layui.all.js"></script>
<script src="/bbs/public/static/common/js/global.js"></script>
<script src="/bbs/public/static/common/js/admin.js"></script>

<!--页面JS脚本-->

</body>
</html>