<?php if (!defined('THINK_PATH')) exit();?>
<html lang="zh-cn"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <title>微视角</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="微视角">
        <meta name="keywords" content="微视角">
        <meta name="author" content="Ghostry">
        <link href="/Public/Home/login/register/bootstrap.min.css" rel="stylesheet">
        <link href="/Public/Home/login/register/bootstrap-theme.min.css" rel="stylesheet">
        <link href="/Public/Home/login/register/select2.min.css" rel="stylesheet">
        <link href="/Public/Home/login/register/qq.css" rel="stylesheet">
        <link href="/Public/Home/login/register/css2.css" rel="stylesheet">

        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="http://fc.vhot119.com/Public/Theme/default/Home/Img/favicon.ico">
        <script src="/Public/Home/login/register/hm.js"></script>
        <script src="/Public/Home/login/register/jquery-2.0.3.min.js"></script>
    <link href="/Public/Home/login/register/default.css" rel="stylesheet"></head>
<style type="text/css">
.box-form .txt {
    position: relative;
    background: #f8f8f8;
    border-radius: 5px;
    border: 1px solid #d0d0d0;
    border-image: none;
    width: 96%;
    height: 40px;
    overflow: hidden;
    margin-bottom: 6px;
    margin-left: 2%;
}
</style>
<script type="text/javascript">
  
function apply_submit(){
        
    // if ($("#name").val() == ''){
    //     alert('请填写账号！');
    //     return;
    // }


    // if ($("#truename").val() == ''){
    //     alert('请添加真实姓名！');
    //     return;
    // }



    // if ($("#tel").val() == ''){
    //     alert('请填写手机号！');
    //     return;
    // }


    // if ($("#card").val() == ''){
    //     alert('请填写省份证号！');
    //     return;
    // }


    // if ($("#payname").val() == ''){
    //     alert('请填写支付姓名！');
    //     return;
    // }


    // if ($("#pay").val() == ''){
    //     alert('请填写支付宝账号！');
    //     return;
    // }

    // if ($("#province").val() == ''){
    //     alert('请选择省份！');
    //     return;
    // }


    // if ($("#address").val() == ''){
    //     alert('请填写详情地址！');
    //     return;
    // }

    var post_data = {
            name:$("#name").val(),
            truename:$("#truename").val(),
            tel:$("#tel").val(),
            card:$("#card").val(),
            attrid:$("#attrid").val(),
            payname:$("#payname").val(),
            pay:$("#pay").val(),
            province:$("#province").val(),
            city:$("#city").val(),
            area:$("#area").val(),
            address:$("#address").val(),
            password:$("#password").val(),
            rpassword:$("#rpassword").val(),
            
        };

        //alert(33333); return;
        // 禁用按钮
        submit_status = false;
        $.ajax({
            url: $("#reg").attr('action'),
            type: 'POST',
            dataType: 'json',
            data: post_data,
            success: function (data, textStatus) {
                alert(333333); return;
            },
            
        });
    }
</script>

    <body>
        <div class="container" style="width: 100%">
            <div class="row">
                <nav class="navbar navbar-default" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="http://fc.vhot119.com/home/index/index.html" target="_blank">
                            <img src="/Public/Home/login/register/logo1.jpg" height="25">　
                            微视角
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">	
                            <li class="active"><a href="http://fc.vhot119.com/home/agent/home.html">用户中心</a></li>
                            <li class=""><a href="http://fc.vhot119.com/home/index/appdown.html">App下载</a></li>
                            <li class=""><a href="http://fc.vhot119.com/home/index/browserdown.html">浏览器下载</a></li>

                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                                                        <li class=""><a href="">注册 / 登陆</a></li>                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div>
            <div class="row" id="body">
                
                <div class="col-md-12">
<div class="row">    
    	    
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                用户中心&nbsp;&gt;注册
            </div>
            <div class="panel-body">
                <form class="form-horizontal " action="<?php echo u(CONTROLLER_NAME . '/register');?>" method="POST" role="form" id="reg" novalidate="novalidate">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">注册账号</label>
                        <div class="col-sm-6"><input type="text" class="form-control " id="name" placeholder="请输入注册账号" name="name" value="" required="" data-rule-remote="" data-msg-remote="注册账号格式错误或已存在" aria-required="true"></div>
                        <div class="col-sm-4">
                            <span class="info help-block" for="remail">* 建议使用常用QQ注册</span></div>
                    </div>


                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">真实姓名</label>
                        <div class="col-sm-6"><input type="text" class="form-control " id="truename" placeholder="请输入真实姓名" name="truename" value="" required="" data-rule-remote="/home/agent/checkusername.html" data-msg-remote="真实姓名已存在" aria-required="true"></div>
                        <div class="col-sm-4">
                            <span class="info help-block" for="remail">填写真是姓名</span></div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">手机号</label>
                        <div class="col-sm-6"><input type="text" class="form-control " id="tel" placeholder="请输入手机号" name="tel" value="" required="" data-rule-remote="/home/agent/checkusername.html" data-msg-remote="手机号错误或已存在" aria-required="true"></div>
                        <div class="col-sm-4">
                            <span class="info help-block" for="remail">填写手机号</span></div>
                    </div>



                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">身份证号</label>
                        <div class="col-sm-6"><input type="text" class="form-control " id="card" placeholder="请输入身份证号" name="card" value="" required="" data-rule-remote="/home/agent/checkusername.html" data-msg-remote="身份证号已存在" aria-required="true"></div>
                        <div class="col-sm-4">
                            <span class="info help-block" for="remail">身份证号</span></div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">支付宝姓名</label>
                        <div class="col-sm-6"><input type="text" class="form-control " id="payname" placeholder="请输入支付宝姓名" name="payname" value="" required="" data-rule-remote="/home/agent/checkusername.html" data-msg-remote="支付宝已存在" aria-required="true"></div>
                        <div class="col-sm-4">
                            <span class="info help-block" for="remail">支付宝姓名</span></div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">支付宝账号</label>
                        <div class="col-sm-6"><input type="text" class="form-control " id="pay" placeholder="请输入支付宝账号" name="pay" value="" required="" data-rule-remote="/home/agent/checkusername.html" data-msg-remote="支付宝账号已存在" aria-required="true"></div>
                        <div class="col-sm-4">
                            <span class="info help-block" for="remail">支付宝账号</span></div>
                    </div>







             <div class="form-group">
              <label for="name" class="col-sm-2 control-label">地址</label>
                <div class="col-sm-6">
                    <select id="province" name="province" tabindex="3" style="background: none;"><option value="">省 </option><option value="北京">北京</option><option value="上海">上海</option><option value="天津">天津</option><option value="重庆">重庆</option><option value="河北">河北</option><option value="山西">山西</option><option value="河南">河南</option><option value="辽宁">辽宁</option><option value="吉林">吉林</option><option value="黑龙江">黑龙江</option><option value="内蒙古">内蒙古</option><option value="江苏">江苏</option><option value="山东">山东</option><option value="安徽">安徽</option><option value="浙江">浙江</option><option value="福建">福建</option><option value="湖北">湖北</option><option value="湖南">湖南</option><option value="广东">广东</option><option value="广西">广西</option><option value="江西">江西</option><option value="四川">四川</option><option value="海南">海南</option><option value="贵州">贵州</option><option value="云南">云南</option><option value="西藏">西藏</option><option value="陕西">陕西</option><option value="甘肃">甘肃</option><option value="青海">青海</option><option value="宁夏">宁夏</option><option value="新疆">新疆</option></select>
                <span>
                    <select id="city" name="city" tabindex="4" style="background: none;"><option value="">市 </option></select>
                </span>
                <span style="border-right:none">
                    <select id="area" name="area" tabindex="5" style="background: none;"><option value="">区 </option></select>
                </span>
            </div>

            </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">详情地址</label>
                        <div class="col-sm-6"><input type="text" class="form-control " id="address" placeholder="请输入详细地址" name="address" value="" required="" data-rule-remote="/home/agent/checkusername.html" data-msg-remote="" aria-required="true"></div>
                        <div class="col-sm-4">
                            <span class="info help-block" for="remail">详细地址</span></div>
                    </div>

                       


                       <div class="form-group"><label for="password" class="col-sm-2 control-label">密码</label>
                           <div class="col-sm-6"><input type="password" class="form-control " id="password" placeholder="请输入密码" name="password" value="" required="" data-rule-minlength="6" aria-required="true"></div>
                           <div class="col-sm-4"><span class="info help-block" for="rpassword">* 您的密码</span></div></div><div class="form-group"><label for="rpassword" class="col-sm-2 control-label">确认密码</label>
                    <div class="col-sm-6"><input type="password" class="form-control " id="rpassword" placeholder="请输入确认密码" name="rpassword" value="" required="" data-rule-minlength="6" data-rule-equalto="#rpass" aria-required="true"></div>
                    <div class="col-sm-4"><span class="info help-block" for="pass1">* 再输入一次新密码</span></div>
                </div>
                    <div class="form-group" ><div class="col-sm-offset-2 col-sm-10"><button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"  ></i> 注册</button></div></div>
               
                </form>            </div>

        </div>                        
    </div>
        <div class="col-md-6">

    </div></div>
</div>
</div>
<div class="row">
    <footer>
        <p class="pull-left">© <a href="http://www.yishoujiameng.com/" target="_blank">一手加盟网</a> 2016</p>
        <p class="pull-right">Powered by: <a href="http://www.yishoujiameng.com/">一手加盟网</a></p>
    </footer>
</div>
</div>
<script src="/Public/Home/login/register/jquery.browser.min.js"></script>
<script src="/Public/Home/login/register/bootstrap.min.js"></script>
<script src="/Public/Home/login/register/jquery.cookie.js"></script>
<script src="/Public/Home/login/register/jquery.dataTables.min.js"></script>
<script src="/Public/Home/login/register/jquery.flot.min.js"></script>
<script src="/Public/Home/login/register/jquery.flot.pie.min.js"></script>
<script src="/Public/Home/login/register/jquery.flot.stack.js"></script>
<script src="/Public/Home/login/register/jquery.flot.resize.min.js"></script>
<script src="/Public/Home/login/register/select2.min.js"></script>
<script src="/Public/Home/login/register/zh-CN.js"></script>
<script src="/Public/Home/login/register/jquery.colorbox.min.js"></script>
<script src="/Public/Home/login/register/jquery.raty.min.js"></script>
<script src="/Public/Home/login/register/jquery.autogrow-textarea.js"></script>
<script src="/Public/Home/login/register/jquery.history.js"></script>
<script src="/Public/Home/login/register/js.js"></script>
<script src="/Public/Home/login/register/jquery.validate.min.js"></script>
<script src="/Public/Home/login/register/messages_zh.min.js"></script>
<link href="/Public/Home/login/register/css.css" rel="stylesheet">
<script src="/Public/Home/login/register/kindeditor-all-min.js"></script>
<script src="/Public/Home/login/register/PCASClass.js"></script>



<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="cboxIE" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxLoadedContent" style="width: 0px; height: 0px; overflow: hidden; float: left;"></div><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><div id="cboxNext" style="float: left;"></div><div id="cboxPrevious" style="float: left;"></div><div id="cboxSlideshow" style="float: left;"></div><div id="cboxClose" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div></body></html>

<script type="text/javascript">
var pcas = new PCAS("province,省 必选","city,市 必选","area,区 必选");
var Item = {
    getItemInfo : function(){
        $(".sku_li_a").bind("click",function(){  //尺码点击
            var o = $(this);
            if(!o.hasClass("sku_hover")){    //点击的不是当前已经选中的
                $(".sku_hover").removeClass("sku_hover");
                o.addClass("sku_hover");
                /*更新对应的选中尺码的数据*/
                $("#item_price").html("￥"+ o.attr("data-price"));
                $("#price").val(o.attr("data-price"));
                $("#attrid").val(o.attr("data-title"));
                $("#fencheng").val(o.attr("data-fencheng"));
            }
        })
    },
    init : function(){
        Item.getItemInfo();
    }
}
Item.init();
$('.text-tit img').each(function(i,e){
    var text_tit_width = $(this).parent().width();
    var img_width = $(this).width();
    var img_css_width = $(this).css('width');
    var src = $(this).attr('src');
    if(src != undefined){
        src = src.replace(/(\?tp=.*)$/,'');
        src = src.replace(/(\d+)?$/,'');
        var width = '';
        if($(window).width() > 900){
            width='640';
        }else if ( $(window).width() > 640 && $(window).width() <= 900){
            //src = src+'640';
            if($('.text-tit').width()< 640){
                width = $('.text-tit').width();
            }

        }else if($(window).width() <= 640) {
            //src = src+'640';
            if($('.text-tit').width()<640){
                width = $('.text-tit').width();
            }
        }
        width = width+'px'


        var style = $(this).attr('style');
        if(style) style = "";
    //  if(style != undefined){
    //      style = style.replace(/width:.*?(\d+px)+/,'');
    //      style = style.replace(/height:.*?(\d+px)+/,'height: auto !important');
    //        style = style.replace('width: auto','');
    //  }

    //    $(this).attr('width',width);
    //    $(this).removeAttr('height');
    //    $(this).removeAttr('style');
        //$(this).attr('src',src);
        $(this).attr('style',style);
    //    var img=new Image();
    //    img.src=src;
    //    _width=img.width;
    //    if(_width<=$(window).width()){
    //        $(this).get(0).removeAttribute("width");
    //        $(this).get(0).style.width=_width+"px";
    //    }
    }
});










</script>