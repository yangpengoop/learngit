<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:65:"F:\boke\boke\public/../application/back\view\rule\rule_group.html";i:1534498038;s:63:"F:\boke\boke\public/../application/back\view\Public\header.html";i:1534491304;s:63:"F:\boke\boke\public/../application/back\view\Public\footer.html";i:1534491264;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>admin</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="__ADMIN_ACEADMIN__/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="__ADMIN_ACEADMIN__/css/font-awesome.min.css" />
    <link rel="stylesheet" href="__ADMIN_ACEADMIN__/css/font-awesome.min.css" />
    <!--[if IE 7]>
    <link rel="stylesheet" href="__ADMIN_ACEADMIN__/css/font-awesome-ie7.min.css" />
    <![endif]-->
    <link rel="stylesheet" href="__ADMIN_ACEADMIN__/css/ace.min.css" />
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="__ADMIN_ACEADMIN__/css/ace-ie.min.css" />
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="__ADMIN_ACEADMIN__/js/html5shiv.js"></script>
    <script src="__ADMIN_ACEADMIN__/js/respond.min.js"></script>
    <script type="text/javascript">
        try {
            ace.settings.check('main-container', 'fixed')
        } catch (e) {
        }
    </script>
    <![endif]-->
    <link rel="stylesheet" href="__ADMIN_CSS__/base.css" />
    <style type="text/css">
        #sidebar .nav-list{
            overflow-y: auto;
        }
        .b-nav-li{
            padding: 5px 0;
        }
    </style>
</head>

<body>
<div class="navbar navbar-default" id="navbar">
    <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
    </script>
    <div class="navbar-container" id="navbar-container">
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>
                    <i class="icon-leaf"></i>
                    admin管理后台
                </small>
            </a><!-- /.brand -->
        </div>
        <div class="navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="__ADMIN_ACEADMIN__/avatars/user.jpg" alt="Jason's Photo" />
                        <span class="user-info">
                            <small>欢迎光临,</small>
                           yangpeng
                        </span>
                        <i class="icon-caret-down"></i>
                    </a>

                    <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li class="divider"></li>

                        <li>
                            <a href="<?php echo Url('Home/Index/logout'); ?>">
                                <i class="icon-off"></i>
                                退出
                            </a>
                        </li>
                    </ul>
                </li>
            </ul><!-- /.ace-nav -->
        </div>
    </div>
</div>
<div class="main-container" id="main-container">
    <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>

    <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
            <span class="menu-text"></span>
        </a>

        <div class="sidebar" id="sidebar">
            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
            </script>
            <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                    <button class="btn btn-success">
                        <i class="icon-signal"></i>
                    </button>

                    <button class="btn btn-info">
                        <i class="icon-pencil"></i>
                    </button>

                    <button class="btn btn-warning">
                        <i class="icon-group"></i>
                    </button>

                    <button class="btn btn-danger">
                        <i class="icon-cogs"></i>
                    </button>
                </div>

                <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                    <span class="btn btn-success"></span>

                    <span class="btn btn-info"></span>

                    <span class="btn btn-warning"></span>

                    <span class="btn btn-danger"></span>
                </div>
            </div><!-- #sidebar-shortcuts -->
            <ul class="nav nav-list">
                <?php if(is_array($nav_data) || $nav_data instanceof \think\Collection || $nav_data instanceof \think\Paginator): if( count($nav_data)==0 ) : echo "" ;else: foreach($nav_data as $key=>$v): if(empty($v['_data']) || (($v['_data'] instanceof \think\Collection || $v['_data'] instanceof \think\Paginator ) && $v['_data']->isEmpty())): ?>
                <li class="b-nav-li">
                    <a href="<?php echo Url($v['mca']); ?>">
                        <i class="fa fa-<?php echo $v['ico']; ?> icon-test"></i>
                        <span class="menu-text"> <?php echo $v['name']; ?> </span>
                    </a>
                </li>
                <?php else: ?>
                <li class="b-has-child">
                    <a href="#" class="dropdown-toggle b-nav-parent">
                        <i class="fa fa-<?php echo $v['ico']; ?> icon-test"></i>
                        <span class="menu-text"> <?php echo $v['name']; ?> </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <?php if(is_array($v['_data']) || $v['_data'] instanceof \think\Collection || $v['_data'] instanceof \think\Paginator): if( count($v['_data'])==0 ) : echo "" ;else: foreach($v['_data'] as $key=>$n): ?>
                        <li class="b-nav-li <?php if($request_url == $n['mca']): ?>active<?php endif; ?>">
                        <a href="<?php echo Url($n['mca']); ?>">
                            <i class="icon-double-angle-right"></i>
                            <?php echo $n['name']; ?>
                        </a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
            </div>

            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
            </script>
        </div>
        <div class="main-content">
            <div cla="page-content">
    <div class="page-header"><h1><i class="fa fa-home"></i> 首页 &gt; 用户组列表 &gt; 分配权限</h1></div>
    <div class="col-xs-12">
        <div class="tabbable">
            <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab">
                <li class="active"><a href="#home" data-toggle="tab">菜单列表</a></li>
                <!--<li><a href="javascript:;" onclick="add()">添加菜单</a></li>-->
            </ul>
            <div class="tab-content"><h1 class="text-center">为<span style="color:brown"><?php echo $group_data['title']; ?></span>分配权限
            </h1>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $group_data['id']; ?>">
                    <table class="table table-striped table-bordered table-hover table-condensed">
                        <?php if(is_array($rule_data) || $rule_data instanceof \think\Collection || $rule_data instanceof \think\Paginator): if( count($rule_data)==0 ) : echo "" ;else: foreach($rule_data as $key=>$v): if(empty($v['_data']) || (($v['_data'] instanceof \think\Collection || $v['_data'] instanceof \think\Paginator ) && $v['_data']->isEmpty())): ?>
                                <tr class="b-group">
                                    <th width="10%">
                                        <label><?php echo $v['title']; ?>
                                            <input type="checkbox" name="rule_ids[]" value="<?php echo $v['id']; ?>"
                                        <?php if(in_array($v['id'],$group_data['rules'])): ?> checked="checked" <?php endif; ?>
                                        onclick="checkAll(this)" >
                                        </label>
                                    </th>
                                    <td></td>
                                </tr>
                                <?php else: ?>
                                <tr class="b-group">
                                    <th width="10%"><label><?php echo $v['title']; ?> <input type="checkbox" name="rule_ids[]"
                                                                                value="<?php echo $v['id']; ?>"
                                        <?php if(in_array($v['id'],$group_data['rules'])): ?> checked="checked"<?php endif; ?>
                                        onclick="checkAll(this)"></label></th>
                                    <td class="b-child">
                                        <?php if(is_array($v['_data']) || $v['_data'] instanceof \think\Collection || $v['_data'] instanceof \think\Paginator): if( count($v['_data'])==0 ) : echo "" ;else: foreach($v['_data'] as $key=>$n): ?>
                                            <table class="table table-striped table-bordered table-hover table-condensed">
                                                <tr class="b-group">
                                                    <th width="10%"><label><?php echo $n['title']; ?> <input type="checkbox"
                                                                                                name="rule_ids[]"
                                                                                                value="<?php echo $n['id']; ?>"
                                                        <?php if(in_array($n['id'],$group_data['rules'])): ?>
                                                            checked="checked"
                                                        <?php endif; ?>
                                                        onclick="checkAll(this)"></label></th>
                                                    <td>
                                                        <?php if(!(empty($n['_data']) || (($n['_data'] instanceof \think\Collection || $n['_data'] instanceof \think\Paginator ) && $n['_data']->isEmpty()))): if(is_array($n['_data']) || $n['_data'] instanceof \think\Collection || $n['_data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $n['_data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><label>&emsp;<?php echo $c['title']; ?>
                                                                <input type="checkbox" name="rule_ids[]"
                                                                       value="<?php echo $c['id']; ?>"
                                                                <?php if(in_array($c['id'],$group_data['rules'])): ?>
                                                                    checked="checked"
                                                                <?php endif; ?>
                                                                ></label><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </td>
                                </tr>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        <tr>
                            <th></th>
                            <td><input class="btn btn-success" type="submit" value="提交"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <script>
        function checkAll(obj) {
            $(obj).parents('.b-group').eq(0).find("input[type='checkbox']").prop('checked', $(obj).prop('checked'));
        }
    </script>
<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="icon-double-angle-up icon-only bigger-110"></i>
</a>
</div>
</div>

<!--[if !IE]> -->
<script src="__ADMIN_ACEADMIN__/js/jquery-1.10.2.min.js"></script>
<!-- <![endif]-->

<!--[if IE]>
<script src="__ADMIN_ACEADMIN__/js/jquery-1.10.2.min.js"></script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='__ADMIN_ACEADMIN__/js/jquery-2.0.3.min.js'>"+"<"+"script>");
</script>
<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='__ADMIN_ACEADMIN__/js/jquery-1.10.2.min.js'>"+"<"+"script>");
</script>
<![endif]-->

<script type="text/javascript">
    if("ontouchend" in document) document.write("<script src='__ADMIN_ACEADMIN__/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
</script>
<script src="__ADMIN_ACEADMIN__/js/typeahead-bs2.min.js"></script>
<script src="__ADMIN_ACEADMIN__/js/bootstrap.min.js"></script>
<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="__ADMIN_ACEADMIN__/js/excanvas.min.js"></script>
<![endif]-->
<script src="__ADMIN_ACEADMIN__/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="__ADMIN_ACEADMIN__/js/jquery.ui.touch-punch.min.js"></script>
<script src="__ADMIN_ACEADMIN__/js/jquery.slimscroll.min.js"></script>
<script src="__ADMIN_ACEADMIN__/js/jquery.easy-pie-chart.min.js"></script>
<script src="__ADMIN_ACEADMIN__/js/jquery.sparkline.min.js"></script>
<script src="__ADMIN_ACEADMIN__/js/flot/jquery.flot.min.js"></script>
<script src="__ADMIN_ACEADMIN__/js/flot/jquery.flot.pie.min.js"></script>
<script src="__ADMIN_ACEADMIN__/js/flot/jquery.flot.resize.min.js"></script>
<script src="__ADMIN_ACEADMIN__/js/ace-elements.min.js"></script>
<script src="__ADMIN_ACEADMIN__/js/ace.min.js"></script>
<script src="/static/back/base.js"></script>
<block name="js"></block>
<script>
    $(function(){

        $('.b-has-child .active').parents('.b-has-child').eq(0).find('.b-nav-parent').click();
    })
</script>
</body>
</html>
