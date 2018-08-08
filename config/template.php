<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 模板设置
// +----------------------------------------------------------------------

return [
    // 模板路径
    'view_path'    => '',
    'tpl_replace_string'    => [
        '__STATIC__' => '/bbs/public/static',
        '__IMAGES__' => '/bbs/public/static/common/images',
        '__JS__'     => '/bbs/public/static/common/js',
        '__CSS__'    => '/bbs/public/static/common/css',
        '__SKIN__'    => '/bbs/public/static/default',
    ]
];
