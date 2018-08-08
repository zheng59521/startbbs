<?php /*a:2:{s:52:"/var/www/html/bbss/app/install/view/index/index.html";i:1521208325;s:50:"/var/www/html/bbss/app/install/view/base/base.html";i:1521208325;}*/ ?>
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
    
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
    <legend>StartBBS轻量社区系统 <?php echo config('version'); ?></legend>
</fieldset>
<blockquote class="layui-elem-quote layui-quote-nm">
    <p style="color: #0f88eb;font-size: 16px;">
     StartBBS（烧饼开源微社区系统）是一个基于 PHP+MySQL MVC架构开发的新型微社区系统， 开发这个基础系统的初衷:是想做出一个<span style="color: orangered;">轻量、优雅、性能强劲</span>的系统. <br>
    </p>
</blockquote>

<?php if(!(empty(stristr(App::version(),'rc')) || ((stristr(App::version(),'rc') instanceof \think\Collection || stristr(App::version(),'rc') instanceof \think\Paginator ) && stristr(App::version(),'rc')->isEmpty()))): ?>
<blockquote class="layui-elem-quote layui-quote-nm">
    <p style="color: red;font-size: 18px;">
        目前ThinkPHP5.1版本尚处于RC阶段，仅供学习参考，请勿用于商业项目！<br>
        ThinkPHP5.1 还在RC阶段,离正式发布还有一段时间,我也会根据框架的调整作出相应调整.
    </p>
</blockquote>
<?php endif; ?>
<blockquote class="layui-elem-quote">
    <p>StartBBS轻量社区系统 遵循Apache Licence2开源协议，并且免费使用（但不包括其衍生产品、插件或者服务）。</p>
    <p>Apache Licence是著名的非盈利开源组织Apache采用的协议。该协议和BSD类似，鼓励代码共享和尊重原作者的著作权，允许代码修改，再作为开源或商业软件发布。需要满足的条件：<br/>
    <p>1． 需要给用户一份Apache Licence ；</p>
    <p>2． 如果你修改了代码，需要在被修改的文件中说明；</p>
    <p>3． 在延伸的代码中（修改和有源代码衍生的代码中）需要带有原来代码中的协议，商标，专利声明和其他原来作者规定需要包含的说明；</p>
    <p>4． 如果再发布的产品中包含一个Notice文件，则在Notice文件中需要带有本协议内容。你可以在Notice中增加自己的许可，但不可以表现为对Apache Licence构成更改。</p>
    <br>
    <p><strong>鸣谢</strong></p>
    <p>非常以下项目:</p>
    <p>
        ThinkPHP： <a href="http://www.thinkphp.cn" target="_blank">http://www.thinkphp.cn</a>
    </p>
    <p>
        Layui：<a href="http://www.layui.com" target="_blank">http://www.layui.com</a>
    </p>
</blockquote>
<a class="layui-btn layui-btn-big" href="<?php echo Url::build('index/step1'); ?>">同意并继续</a>
<a class="layui-btn layui-btn-primary layui-btn-big" href="https://www.startbbs.com">不同意</a>


</div>

<div class="layui-footer footer">
    <div class="layui-main">
        <p>Copyright <strong><a href="https://www.startbbs.com">Startbbs.com</a></strong> &copy; 2018</p>
    </div>
</div>


<script type="text/javascript" src="/bbs/public/static/layui.js" charset="utf-8"></script>
<script src="/bbs/public/static/common/js/layui/layui.all.js"></script>
<script src="/bbs/public/static/common/js/global.js"></script>


<script type="text/javascript">
    UrlHighlight("<?php echo Url::build(''); ?>");
    layui.use(['jquery', 'form',], function () {

    });
</script>

</body>
</html>