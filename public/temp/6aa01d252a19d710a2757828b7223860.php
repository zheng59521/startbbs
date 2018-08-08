<?php /*a:2:{s:52:"/var/www/html/bbss/app/install/view/index/step1.html";i:1521208325;s:50:"/var/www/html/bbss/app/install/view/base/base.html";i:1521208325;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo isset($metaTitle) ? htmlentities($metaTitle) : 'startbbs'; ?>-安装</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="/bbs/public/static/js/layui/css/layui.css">
    <link rel="stylesheet" href="/bbs/public/static/common/css/main.css" media="all">
    
</head>
<body class="layui-layout-body layui-layout">
<header class="layui-header header">
    <div class="layui-main">
        <a class="logo" href="#"><img src="/public/static/default/images/logo.png" alt="startbbs"></a>
        <ul class="layui-nav ml200 pl0" >
            <li class="layui-nav-item <?php echo isset($step) ? htmlentities($step) : ''; ?>">
                <a href="javascript:void(0);">安装系统</a>
            </li>
            <li class="layui-nav-item <?php echo isset($step1) ? htmlentities($step1) : ''; ?>">
                <a href="javascript:void(0);">环境检测</a>
            </li>
            <li class="layui-nav-item <?php echo isset($step2) ? htmlentities($step2) : ''; ?>">
                <a href="javascript:void(0);">创建数据库</a>
            </li>
            <li class="layui-nav-item <?php echo isset($step3) ? htmlentities($step3) : ''; ?>">
                <a href="javascript:void(0);"><?php if(Session::get('update','install') == '1'): ?>升级<?php else: ?>安装<?php endif; ?></a>
            </li>
            <li class="layui-nav-item <?php echo isset($step4) ? htmlentities($step4) : ''; ?>">
                <a href="javascript:void(0);">完成</a>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="http://www.startbbs.com/">StartBBS官网</a>
            </li>
        </ul>
    </div>
</header>
<div class="layui-main">
    
<div class="layui-form">
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
        <legend>环境检测</legend>
    </fieldset>
    运行环境
    <table class="layui-table">
        <colgroup>
            <col width="150">
            <col width="150">
            <col width="150">
            <col>
        </colgroup>
        <thead>
        <tr>
            <th>项目</th>
            <th>所需配置</th>
            <th>当前配置</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($env) || $env instanceof \think\Collection || $env instanceof \think\Paginator): $i = 0; $__LIST__ = $env;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo isset($item[0]) ? htmlentities($item[0]) : ''; ?></td>
            <td><?php echo isset($item[1]) ? htmlentities($item[1]) : ''; ?></td>
            <td><i class="ico-<?php echo isset($item[4]) ? htmlentities($item[4]) : ''; ?>">&nbsp;</i><?php echo isset($item[3]) ? htmlentities($item[3]) : ''; ?></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    依赖性
    <table class="layui-table">
        <colgroup>
            <col width="150">
            <col width="150">
            <col width="150">
            <col>
        </colgroup>
        <thead>
        <tr>
            <th>名称</th>
            <th>类型</th>
            <th>检查结果</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($func) || $func instanceof \think\Collection || $func instanceof \think\Paginator): $i = 0; $__LIST__ = $func;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo isset($item[0]) ? htmlentities($item[0]) : ''; ?></td>
            <td><?php echo isset($item[3]) ? htmlentities($item[3]) : ''; ?></td>
            <td><span style="color:<?php echo isset($item[2]) ? htmlentities($item[2]) : 'inherit'; ?>;"><?php echo isset($item[1]) ? htmlentities($item[1]) : ''; ?></span></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <?php if(isset($dirfile)): ?>
    目录/文件权限
    <table class="layui-table">
        <colgroup>
            <col width="150">
            <col width="150">
            <col width="150">
            <col>
        </colgroup>
        <thead>
        <tr>
            <th>目录/文件</th>
            <th>所需状态</th>
            <th>当前状态</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($dirfile) || $dirfile instanceof \think\Collection || $dirfile instanceof \think\Paginator): $i = 0; $__LIST__ = $dirfile;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo isset($item[3]) ? htmlentities($item[3]) : ''; ?></td>
            <td><i class="ico-success">&nbsp;</i>可写</td>
            <td><i class="ico-<?php echo isset($item[2]) ? htmlentities($item[2]) : ''; ?>">&nbsp;</i><?php echo isset($item[1]) ? htmlentities($item[1]) : ''; ?></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>
<a class="layui-btn layui-btn-primary layui-btn-big" href="<?php echo Url::build('Index/index'); ?>">上一步</a>
<a class="layui-btn layui-btn-big" href="<?php echo Url::build('Index/step2'); ?>">下一步</a>

</div>

<div class="layui-footer footer">
    <div class="layui-main">
        <p>Copyright <strong><a href="https://www.startbbs.com">Startbbs.com</a></strong> &copy; 2018</p>
    </div>
</div>


<script type="text/javascript" src="/bbs/public/static/layui.js" charset="utf-8"></script>
<script src="/bbs/public/static/common/js/layui/layui.all.js"></script>
<script src="/bbs/public/static/common/js/global.js"></script>




</body>
</html>