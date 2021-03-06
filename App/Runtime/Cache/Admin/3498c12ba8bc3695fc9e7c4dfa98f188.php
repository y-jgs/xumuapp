<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>管理中心</title>
 		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
 		<!-- jq库 -->
		<script src='/Public/Admin/assets/js/jquery-2.0.3.min.js'></script>
		<!-- bootstrap -->
		<link href="/Public/Admin/assets/css/bootstrap.min.css" rel="stylesheet" />
		<!-- 时间选择器  -->
		 <link href="/Public/Components/bootstrap-datetimepicker-master/sample in bootstrap v3/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
   		 <link href="/Public/Components/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
		<script type="text/javascript" src="/Public/Components/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
		<script type="text/javascript" src="/Public/Components/bootstrap-datetimepicker-master/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
		 <!-- jqgrid -->
		<link rel="stylesheet" href="/Public/Admin/assets/css/ui.jqgrid.css" />
		<!-- 通知层 -->
		 <link href="/Public/Components/toastr/toastr.css" rel="stylesheet" />
		 <script src='/Public/Components/toastr/toastr.js'></script>
		  <!-- awesome 字体库 -->
		<link rel="stylesheet" href="/Public/Admin/assets/css/font-awesome.min.css" />
		 <!--[if IE 7]>
			  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
 		<!-- 表单验证 -->
		<link rel="stylesheet" href="/Public/Components/jquery-validation-1.14.0/demo/css/screen.css">
		<script src="/Public/Components/jquery-validation-1.14.0/dist/jquery.validate.js"></script>
		<!-- ace styles -->
		<!-- 图片上传预览 -->
		<script type="text/javascript" src="/Public/js/uploadPreview.min.js"></script>
		<!-- 后台样式 -->
		<link rel="stylesheet" href="/Public/Admin/assets/css/ace.min.css" />
		<link rel="stylesheet" href="/Public/Admin/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="/Public/Admin/assets/css/ace-skins.min.css" />
 		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
 		<!-- ace settings handler -->
 		<script src="/Public/Admin/assets/js/ace-extra.min.js"></script>
		<script src="/Public/Admin/assets/js/chosen.jquery.min.js"></script>
		<script src="/Public/Admin/assets/js/fuelux/fuelux.spinner.min.js"></script>
		<script src="/Public/Admin/assets/js/jquery.knob.min.js"></script>
		<script src="/Public/Admin/assets/js/jquery.autosize.min.js"></script>
		<script src="/Public/Admin/assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="/Public/Admin/assets/js/jquery.maskedinput.min.js"></script>
		<script src="/Public/Admin/assets/js/bootstrap-tag.min.js"></script>
		<!-- 公共js  <link rel="stylesheet" href=on.js" /> -->
		
			<!-- 自定义公共css  -->
		<link rel="stylesheet" href="/Public/css/style.css" />
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<script type="text/javascript" charset="utf-8" src="/Public/Components/ueditor1_4_3-utf8-php/ueditor.config.js"></script>
		<script type="text/javascript" charset="utf-8" src="/Public/Components/ueditor1_4_3-utf8-php/ueditor.all.min.js"> </script>
		<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
		<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
		<script type="text/javascript" charset="utf-8" src="/Public/Components/ueditor1_4_3-utf8-php/lang/zh-cn/zh-cn.js"></script>

		<!--[if lt IE 9]>
		<script src="/Public/Admin/assets/js/html5shiv.js"></script>
		<script src="/Public/Admin/assets/js/respond.min.js"></script>
		<![endif]-->
		<!-- 通知层前台js -->
		<script>
			//批量删除
			function batchDel(selector,action){
				var list = new Array();
				$("input[id='"+selector+"']:checked").each(function () {
					list.push($(this).val());
				});
				if (list == '') {
					alert('请选择您要删除的数据！');
					return false;
				}
				if(confirm('确定要删除？')){
					var data = "list=" + list.join(',');
					$.ajax({
						url: "<?php echo u(CONTROLLER_NAME . '/"+action+"');?>",
						type: "POST",
						dataType: "json",
						data: data,
						success: function (res) {
							if (res.result == 'success1') {
								alert("操作成功");
								location.reload();
							} else {
								alert("操作失败");
							}
						}
					});
				}
			}
			//单条数据删除
		 function OneDelData(action,id){
			 if(confirm('确定要删除？')){
				 $.ajax({
					 url:"<?php echo u(CONTROLLER_NAME . '/"+action+"');?>",
					 type:"POST",
					 dataType:"json",
					 data:"id="+id,
					 success:function(res){
						 if(res.result == 'success'){
							 location.reload()
						 }else{
							 alert("操作失败");
						 }
					 }
				 });
			 }
		 }
			//修改状态
			function statusSave(action,id){
					var show = document.getElementById("show_"+id).checked == true ? '1':'0';
					$.ajax({
						url:"<?php echo U(CONTROLLER_NAME . '/"+action+"');?>", // 表单提交的地址
						type: 'POST',
						dataType: 'json',
						data:'id='+id+'&status='+show, // 表单提交的数据
						success:function(res){
						}
					});
			}
		var opts = {
			"closeButton": true,
			"debug": false,
			"positionClass": "toast-top-right",
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "500",
			"timeOut": "5000",
			"extendedTimeOut": "500",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
			};
		</script>
		  <style>
.main-content {
  margin-left: 0;
    margin-right: 0;
    margin-top: 0;
    min-height: 100%;
    padding: 0;
}
</style> 
	</head>
<link rel="stylesheet" href="/Public/lightbox/css/screen.css"/>
<link rel="stylesheet" href="/Public/lightbox/css/lightbox.css"/>
<script src="/Public/lightbox/js/lightbox.js"></script>
<body>

<div class="main-container" id="main-container">
  <div class="main-container-inner"> <a class="menu-toggler" id="menu-toggler" href="#"> <span
        class="menu-text"></span> </a>  
    <div class="main-content">
      <div class="page-content">
        <div class="row">
            <?php if(is_array($nav_head)): $i = 0; $__LIST__ = $nav_head;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav_head_v): $mod = ($i % 2 );++$i; endforeach; endif; else: echo "" ;endif; ?>
          <div class="col-xs-12">
            <div class="widget-box transparent" id="recent-box">
              <div class="widget-header">
                <div class="widget-toolbar no-border">
                  <ul class="nav nav-tabs" id="recent-tab">
                   
                    <li class="active"><a href="<?php echo U(CONTROLLER_NAME.'/gindex');?>">列表</a></li>
                     <li><a href="<?php echo U(CONTROLLER_NAME.'/xieyi');?>">协议</a> </li>
                  </ul>
                </div>
              </div>
            </div>
            <br>
            <div class="main-container" id="main-container"> 
              <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
      </script>
              <div>
                <form action="<?php echo u(CONTROLLER_NAME.'/gindex');?>">
                  <input style="margin: 0px 0 0 0; float: left;" value="<?php echo ($name); ?>"
                      type="text" id="name" placeholder="公司或姓名" name="name" />
                  <a class="search" href="javascript:$('form').submit()">搜索</a>
                  <div style="clear: both;"></div>
                </form>
              </div>
              <br>

              <div class="main-container-inner">

                <div class="row">
                  <div class="col-xs-12"> 
                    <!-- PAGE CONTENT BEGINS -->
                    <!--  <a href="#" class="all_val"  data-toggle="modal" data-target="#myModal2">批量删除</a> -->
                    <div class="table-responsive">
                      <table id="sample-table-1"
             class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th class="center"><label >
                               <input type="checkbox" class="ace chkall" id="" onclick="selectall('id[]');">
                                <span class="lbl"></span></label></th>
                                <td>编号</td>
                            <td>账号</td>
                             <td>联系电话</td>
                              <!--<td>邮箱</td>-->
                              <!-- <td>分类</td> -->
                            <td>宣传标题</td>
                            <td>营业执照</td>
                            <td>身份证正面</td>
                            <td>审核状态</td>
                            <td>操作</td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                              <input type="hidden" name="id" id="id" value="<?php echo ($vo["id"]); ?>" />
                              <td class="center"><label>
                                  <input type="checkbox" name="checkbox" value="<?php echo ($vo["id"]); ?>" id="style_val" class="ace box" />
                                  <span class="lbl"></span> </label></td>
                              <td><span style="color:#999;"><?php echo ($vo["id"]); ?></span></td>
                               <td><?php echo ($vo["username"]); ?></td>
                                <td><?php echo ($vo["tel"]); ?></td>
                                <!--<td><?php echo ($vo["emil"]); ?></td>-->
                               <!--  <td><?php echo ($vo["class_id"]); ?></td> -->
                              <td class="hidden-480"><?php echo ($vo["title"]); ?></td>
                              <td><a class="example-image-link" href="<?php echo ($vo["main_img"]); ?>" data-lightbox="content" ><img class="example-image" style="width:50px;height:50px;" src="<?php echo ($vo["id_img"]); ?>" alt="营业执照"></a></td>
                              <td><a class="example-image-link" href="<?php echo ($vo["id_img"]); ?>" data-lightbox="content" ><img class="example-image" style="width:50px;height:50px;" src="<?php echo ($vo["id_img"]); ?>" alt="身份证正面"></a></td>
                                <td>
                                <?php if($vo["status"] == 0): ?>未审核
                              <?php elseif($vo["status"] == 1): ?>
                                    审核通过
                                    <?php else: ?>
                                    审核驳回<?php endif; ?>
                                </td>
                              <td>

                                  <select id="check_6916" onchange="check(this.value,'<?php echo ($vo[id]); ?>')">
                                      <option value="0" <?php if($vo["status"] == 0): ?>selected<?php endif; ?> >未审核</option>
                                      <option value="1" <?php if($vo["status"] == 1): ?>selected<?php endif; ?> >审核通过</option>
                                      <option value="2" <?php if($vo["status"] == 2): ?>selected<?php endif; ?> >审核驳回</option>
                                  </select>

                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                      </table>
                      <p style="text-align: center; color: #ccc;"><?php echo ($not_found); ?></p>
                      <ul style="line-height: 30px;" class="fy_li">
                        <?php echo ($page); ?>
                      </ul>
                    </div>
                   
                    <!-- /.table-responsive -->
                    <script type="text/javascript">
                        // 审核
                        function check(checkid,id){

                            var myurl="<?php echo u(CONTROLLER_NAME .'/gshow_change');?>";
                            $.ajax({
                                type: "POST",
                                url: myurl,
                                data: {status:checkid,id:id},
                                dataType:'html',
                                success:function(res){

                                    alert("操作成功");
                                    location.reload()
                                }
                            });
                        }
     </script> 
                    
                    <!-- PAGE CONTENT ENDS --> 
                  </div>
                  <!-- /.col --> 
                </div>
                <!-- /.row --> 
                
              </div>
              <!-- /.main-container-inner --> 
              
            </div>
            <!-- /.main-container --> 
          </div>
        </div>
        <!-- /.row --> 
      </div>
      <!-- /.page-content --> 
    </div>
    <!-- /.main-content --> 
    
  </div>
  <!-- /.main-container-inner --> 
  
  <a href="#" id="btn-scroll-up"
      class="btn-scroll-up btn btn-sm btn-inverse"> <i
      class="icon-double-angle-up icon-only bigger-110"></i> </a> </div>
 
		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script src="/Public/Admin/assets/js/jquery.dataTables.min.js"></script>
		<script src="/Public/Admin/assets/js/jquery.dataTables.bootstrap.js"></script>
		<script src="/Public/Admin/assets/js/bootstrap.min.js"></script>
		<script src="/Public/Admin/assets/js/typeahead-bs2.min.js"></script>

		<!-- dataTables -->

		<script src="/Public/Admin/assets/js/jquery.dataTables.min.js"></script>
		<script src="/Public/Admin/assets/js/jquery.dataTables.bootstrap.js"></script>

		<!-- ace scripts -->

		<script src="/Public/Admin/assets/js/ace-elements.min.js"></script>
		<script src="/Public/Admin/assets/js/ace.min.js"></script>
		 <!-- bootstrap -->
		<script src="/Public/Admin/assets/js/bootstrap.min.js"></script>
		<script src="/Public/Admin/assets/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="/Public/Admin/assets/js/excanvas.min.js"></script>
		<![endif]-->

	
		<script src="/Public/Admin/assets/js/bootstrap.min.js"></script>
		<script src="/Public/Admin/assets/js/typeahead-bs2.min.js"></script>

		<!-- jqGrid -->
	<script src="/Public/Admin/assets/js/jqGrid/jquery.jqGrid.min.js"></script>
		<script src="/Public/Admin/assets/js/jqGrid/i18n/grid.locale-en.js"></script>

		<!-- ace scripts -->

		 
	 
		<script src="/Public/Admin/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="/Public/Admin/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="/Public/Admin/assets/js/jquery.slimscroll.min.js"></script>
		<script src="/Public/Admin/assets/js/jquery.easy-pie-chart.min.js"></script>
		<script src="/Public/Admin/assets/js/jquery.sparkline.min.js"></script>
		<script src="/Public/Admin/assets/js/flot/jquery.flot.min.js"></script>
		<script src="/Public/Admin/assets/js/flot/jquery.flot.pie.min.js"></script>
		<script src="/Public/Admin/assets/js/flot/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->

		<script src="/Public/Admin/assets/js/ace-elements.min.js"></script>
		
<script>

$('.form_date').datetimepicker({
    language:  'zh-CN',
    weekStart: 1,
    todayBtn:  1,
	autoclose: 1,
	todayHighlight: 1,
	startView: 2,
	minView: 2,
	forceParse: 0
});
</script>
 
	</body>
</html>