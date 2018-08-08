<?php /*a:2:{s:38:"./themes/admin/system/site_config.html";i:1521208325;s:24:"./themes/admin/base.html";i:1521208325;}*/ ?>
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
	    <?php if(isset($group_list)): ?>
	    <ul class="layui-tab-title">
	        <?php if(is_array($group_list) || $group_list instanceof \think\Collection || $group_list instanceof \think\Paginator): $i = 0; $__LIST__ = $group_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
	        <li class="<?php if($group == $key): ?>layui-this<?php endif; ?>">
	            <a href="<?php echo Url('system/siteconfig',['group'=>$key]); ?>"><?php echo htmlentities($v); ?>配置</a>
	        </li>
	        <?php endforeach; endif; else: echo "" ;endif; ?>
	    </ul>
	    <?php endif; ?>
        <div class="layui-tab-content" style="background-color: #fff;">
            <div class="layui-tab-item layui-show">
	            <div class="layui-row">
                	<div class="layui-col-xs12 layui-col-md5">
		                <form class="layui-form form-container" action="<?php echo url('admin/system/updateSiteConfig'); ?>" method="post">
		                    <?php if(is_array($site_config) || $site_config instanceof \think\Collection || $site_config instanceof \think\Paginator): $i = 0; $__LIST__ = $site_config;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
		                    <div class="layui-form-item">
		                        <label class="layui-form-label"><?php echo htmlentities($v['title']); ?></label>
		                            <div class="layui-input-block">
		                            <?php switch($v['type']): case "1": ?>
		                                <input type="text" name="config[<?php echo htmlentities($v['name']); ?>]" value="<?php echo isset($v['value']) ? htmlentities($v['value']) : ''; ?>" class="layui-input">
		                                <?php break; case "2": ?>
		                                <textarea name="config[<?php echo htmlentities($v['name']); ?>]" class="layui-textarea" rows="4"><?php echo isset($v['value']) ? htmlentities($v['value']) : ''; ?></textarea>
		                                <?php break; case "3": ?>
		                                <textarea name="config[<?php echo htmlentities($v['name']); ?>]" class="layui-textarea" rows="4"><?php echo isset($v['value']) ? htmlentities($v['value']) : ''; ?></textarea>
		                                <?php break; case "4": ?>
		                                <!--开关-->
		                                <?php $text=parse_config_attr($v['options']) ?>
										<input type="checkbox" name="config[<?php echo htmlentities($v['name']); ?>]" value="1" lay-skin="switch" lay-text="<?php echo htmlentities($text[1]); ?>|<?php echo htmlentities($text[0]); ?>"<?php if($v['value'] == 1): ?> checked=""<?php endif; ?>>
		                                <?php break; case "5": ?>
		                                <select name="config[<?php echo htmlentities($v['name']); ?>]">
		                                <?php if(!(empty($v['options']) || (($v['options'] instanceof \think\Collection || $v['options'] instanceof \think\Paginator ) && $v['options']->isEmpty()))): $_result=parse_config_attr($v['options']);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		                                <option value="<?php echo htmlentities($key); ?>" <?php if($v['value'] == $key): ?>selected<?php endif; ?> ><?php echo htmlentities($vo); ?></option>
		                                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
		                                </select>
		                                <?php break; case "6": $_result=parse_config_attr($v['options']);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					                    <input type="radio" name="config[<?php echo htmlentities($v['name']); ?>]" value="<?php echo htmlentities($key); ?>" title="<?php echo htmlentities($vo); ?>" <?php if($key == $v['value']): ?>checked<?php endif; ?>>
					                    <?php endforeach; endif; else: echo "" ;endif; break; case "7": $_result=parse_config_attr($v['options']);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					                    <input type="checkbox" name="config[<?php echo htmlentities($v['name']); ?>][]" value="<?php echo htmlentities($key); ?>" title="<?php echo htmlentities($vo); ?>" lay-skin="primary" <?php if(in_array($key, $value)): ?>checked<?php endif; ?>>
					                    <?php endforeach; endif; else: echo "" ;endif; break; case "8": ?>
					                    <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="{ <?php if(!empty($v['url'])): ?>url: '<?php echo url($v['url']); ?>', <?php endif; ?>exts:'<?php echo str_replace(',', '|', config('upload.upload_image_ext')); ?>', accept:'image'}">请上传<?php echo htmlentities($v['title']); ?></button>
					                    <input type="hidden" class="upload-input" name="config[<?php echo htmlentities($v['name']); ?>]" value="<?php echo htmlentities($v['value']); ?>">
					                    <?php if($v['value']): ?>
					                        <img src="<?php echo htmlentities($v['value']); ?>" style="display:inline-block;border-radius:5px;border:1px solid #ccc" width="36" height="36">
					                    <?php else: ?>
					                        <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
					                    <?php endif; break; case "9": ?>
					                    <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-data="{ <?php if(!empty($v['url'])): ?>url: '<?php echo url($v['url']); ?>', <?php endif; ?>exts:'<?php echo str_replace(',', '|', config('upload.upload_file_ext')); ?>', accept:'file'}">请上传<?php echo htmlentities($v['title']); ?></button>
					                    <input type="hidden" class="upload-input" name="config[<?php echo htmlentities($v['name']); ?>]" value="<?php echo htmlentities($v['value']); ?>">
		                                <?php break; case "10": ?>
		                                    <input type="number" name="config[<?php echo htmlentities($v['name']); ?>]" value="<?php echo isset($v['value']) ? htmlentities($v['value']) : ''; ?>" class="layui-input">
		                                <?php break; endswitch; ?>
		                            <div class="layui-form-mid layui-word-aux"><?php echo htmlentities($v['tips']); ?>, 调用方式：<code style="color:#5FB878;">config('<?php echo htmlentities($v['group']); ?>.<?php echo htmlentities($v['name']); ?>')</code></div>
		                        </div>

		                    </div>
		                    <?php endforeach; endif; else: echo "" ;endif; ?>
		                    <div class="layui-form-item">
		                        <div class="layui-input-block">
		                            <button class="layui-btn" lay-submit lay-filter="*">提交</button>
		                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
		                        </div>
		                    </div>
		                </form>
            		</div>
            	</div>
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