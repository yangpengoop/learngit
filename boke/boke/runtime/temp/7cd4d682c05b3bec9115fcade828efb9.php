<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:60:"F:\boke\boke\public/../application/back\view\rule\group.html";i:1534494536;s:63:"F:\boke\boke\public/../application/back\view\Public\header.html";i:1534491304;s:63:"F:\boke\boke\public/../application/back\view\Public\footer.html";i:1534491264;}*/ ?>
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
    <div class="page-header"><h1> 首页 &gt; 用户组管理</h1></div>
    <div class="col-xs-12">
        <div class="tabbable">
            <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab">
                <li class="active"><a href="#home" data-toggle="tab">用户组列表</a></li>
                <li><a href="javascript:;" onclick="add()">添加用户组</a></li>
            </ul>
            <div class="tab-content">
                <table class="table table-striped table-bordered table-hover table-condensed">
                    <tr>
                        <th>用户组名</th>
                        <th>操作</th>
                    </tr>
                    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$v): ?>
                        <tr>
                            <td><?php echo $v['title']; ?></td>
                            <td><a href="javascript:;" ruleId="<?php echo $v['id']; ?>" ruleTitle="<?php echo $v['title']; ?>"
                                   onclick="edit(this)">修改</a> | <a
                                    href="javascript:if(confirm('确定删除？'))location='<?php echo Url('back/Rule/delete_group',array('id'=>$v['id'])); ?>'">删除</a>
                                | <a href="<?php echo Url('back/Rule/rule_group',array('id'=>$v['id'])); ?>">分配权限</a> | <a
                                        href="<?php echo Url('back/Rule/check_user',array('group_id'=>$v['id'])); ?>">添加成员</a></td>
                        </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="bjy-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
                    <h4 class="modal-title" id="myModalLabel"> 添加用户组</h4></div>
                <div class="modal-body">
                    <form id="bjy-form" class="form-inline" action="<?php echo Url('back/Rule/add_group'); ?>" method="post">
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <tr>
                                <th width="15%">用户组名：</th>
                                <td><input class="input-medium" type="text" name="title"></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td><input class="btn btn-success" type="submit" value="添加"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="bjy-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
                    <h4 class="modal-title" id="myModalLabel"> 修改规则</h4></div>
                <div class="modal-body">
                    <form id="bjy-form" class="form-inline" action="<?php echo Url('back/Rule/edit_group'); ?>" method="post"><input
                            type="hidden" name="id">
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <tr>
                                <th width="12%">规则名：</th>
                                <td><input class="input-medium" type="text" name="title"></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td><input class="btn btn-success" type="submit" value="修改"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // 添加菜单
        function add() {
            $("input[name='title']").val('');
            $('#bjy-add').modal('show');
        }

        // 修改菜单
        function edit(obj) {
            var ruleId = $(obj).attr('ruleId');
            var ruletitle = $(obj).attr('ruletitle');
            $("input[name='id']").val(ruleId);
            $("input[name='title']").val(ruletitle);
            $('#bjy-edit').modal('show');
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
