<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--[if lt IE 9]>
<script type="text/javascript" src="/admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="/admin/lib/respond.min.js"></script>
<![endif]-->
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
<script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
    <title>添加权限 - 权限管理 - H-ui.admin v3.1</title>
    <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>

<body>
    <article class="page-container">
        <form class="form form-horizontal" id="form-admin-add">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>权限名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="auth_name" name="auth_name">
                </div>
            </div>
            </div>
            <div class="row cl" style="display:none">
                <label class="form-label col-xs-4 col-sm-3">控制器：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="controller" name="controller">
                </div>
            </div>
            <div class="row cl" style="display:none">
                <label class="form-label col-xs-4 col-sm-3">方法：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" name="action" id="action">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>父级权限：</label>
                <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
                        <select class="select" name="pid" id="pid" size="1">
                            <option value="0">顶级权限</option>
                            @foreach($parents as $val)
                                <option value="{{$val->id}}">{{$val->auth_name}}</option>
                            @endforeach
                        </select>
                    </span> </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>导航显示：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <div class="radio-box">
                        <input name="is_nav" type="radio" id="is_nav-1" value="1" checked>
                        <label for="is_nav-1">是</label>
                    </div>
                    <div class="radio-box">
                        <input type="radio" id="is_nav-2" name="is_nav" value="2">
                        <label for="is_nav-2">否</label>
                    </div>
                </div>
            </div>
            <!-- csrf隐藏域 -->
            {{csrf_field()}}
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                    <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                </div>
            </div>
        </form>
    </article>

    <!--_footer 作为公共模版分离出去-->
    <script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
    <script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
    <script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
    <!--/_footer 作为公共模版分离出去-->

    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
    <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
    <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
    <script type="text/javascript">
        // jquery优化控制器与方法表单的隐藏与显示
        // $('#controller,#action').parent().parent().hide();   //太low?试试下面的
        // $('#controller,#action').parents('.row').hide();     //也可以在标签hidden 或 style="display:none" 这里用none
        $('#pid').change(function(){
            var _val = $(this).val();
            if(_val > 0){
                // 注意在hide()于show()方法中可以加上毫秒参数实现简单动画效果
                $('#controller,#action').parents('.row').show(600);
            }else{
                // 当返回顶级权限时将控制器与方法的值清空
                $('#controller,#action').val('');
                $('#controller,#action').parents('.row').hide(600);
            }
        });
        // ajax请求
        $(function() {
            $('.skin-minimal input').iCheck({
                checkboxClass: 'icheckbox-blue',
                radioClass: 'iradio-blue',
                increaseArea: '20%'
            });

            $("#form-admin-add").validate({
                    rules: {
                        auth_name: {
                            required: true,
                            minlength: 4,
                            maxlength: 16
                        },
                        is_nav: {
                            required: true,
                        },
                        pid: {
                            required: true,
                        },
                    },
                    onkeyup: false,
                    focusCleanup: true,
                    success: "valid",
                    submitHandler: function(form) {
                        $(form).ajaxSubmit({
                            type: 'post',
                            url: "",
                            success: function(data) {
                                if(data == '1'){
                                    layer.msg('添加成功!', {icon: 1,time: 1500,},function(){
                                        var index = parent.layer.getFrameIndex(window.name);
                                        // parent.$('.btn-refresh').click();
                                        // 关闭窗口后刷新框架页面
										parent.window.location = parent.window.location;
                                        parent.layer.close(index);
                                    });
                                }else{
                                    layer.msg('添加失败!', {icon: 2,time: 2000,});                                        
                                }
                        },
                        error: function(XmlHttpRequest, textStatus, errorThrown) {
                            layer.msg('error!', {icon: 2,time: 1000,});
                        }
                    });
                }
            });
        });
    </script>
    <!--/请在上方写此页面业务相关的脚本-->
</body>

</html> 