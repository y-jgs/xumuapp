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
<body>

 
<div class="main-container" id="main-container">
  <div class="main-container-inner"> <a class="menu-toggler" id="menu-toggler" href="#"> <span
				class="menu-text"></span> </a>  
    <div class="main-content">
      <div class="page-content">
        <div class="row">
          <div class="col-xs-12">
            <div class="widget-box transparent" id="recent-box">
              <div class="widget-header">
                <div class="widget-toolbar no-border">
                  <ul class="nav nav-tabs" id="recent-tab">
                   
                    <li><a href="<?php echo U(CONTROLLER_NAME.'/index');?>">类型列表</a></li>
                    <li class="active"><a href="<?php echo U(CONTROLLER_NAME.'/add');?>">添加</a> </li>
                  </ul>
                </div>
              </div>
            </div>
            <br>
            <div class="main-container" id="main-container"> 
              <script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
              
              <div style="">
        <form enctype="multipart/form-data"  role="form" id="form1"  method="post" class="validate">
          <label>名称
            <input style="width:300px;" class="form-control margin100" type="text" name="name" id="name" />
          </label>
          <br>
          <label>路径
            <input style="width:300px;" class="form-control" type="text" name="path" id="path" />
          </label>
          <br>
          <label>图标Icon_class
            <input style="width:300px;" class="form-control margin100" type="text" name="icon" id="icon" />
          </label>
          <br>
          <label>上级模块
            <select style="width:300px;" class="form-control" name="parent" id="parent">
              <option value='0'>----顶级----</option>
              <?php if(is_array($system_menu)): $i = 0; $__LIST__ = $system_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i; if($menu["parent"] == 0): ?><option value="<?php echo ($menu["id"]); ?>"><?php echo ($menu["name"]); ?></option>
                  <?php if(is_array($system_menu)): $i = 0; $__LIST__ = $system_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menusub): $mod = ($i % 2 );++$i; if(($menusub["parent"]) == $menu["id"]): ?><option value="<?php echo ($menusub["id"]); ?>">-------<?php echo ($menusub["name"]); ?></option>
                      <?php if(is_array($system_menu)): $i = 0; $__LIST__ = $system_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menusub1): $mod = ($i % 2 );++$i; if(($menusub1["parent"]) == $menusub["id"]): ?><option value="<?php echo ($menusub1["id"]); ?>">---------------<?php echo ($menusub1["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
          </label>
          <br>
          <br>
          <label>是否菜单
            <select style="width:300px;" class="form-control" id="is_menu" name="is_menu">
              <option value="1">是</option>
              <option value="0">否</option>
            </select>
          </label>
          <br>
          <br>
          <label>排序
            <input style="width:300px;" class="form-control margin100" type="text" name="sort" id="sort" />
          </label>
          <br>
          <label>状态
            <select style="width:300px;" class="form-control" id="status" name="status">
              <option value="1">正常</option>
              <option value="0">停用</option>
            </select>
          </label>
          <br>
         <br>
          <a class="btn btn-success" id="submit">提交</a>
        </form>
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
   <script>
$(document).ready(function(){
    var opts = {
			"closeButton": true,
			"debug": false,
			"positionClass": "toast-top-full-width",
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		};
	$('#submit').click(function(){
		 
		//show_loading_bar(100);
		 if($("#name").val() ==  "")
		 {
			  toastr.error("<i class=fa-info></i>请输入名称内容", opts);
			 $("#name").focus();
			 return false;
		 }
		 if($("#path").val() ==  "")
		 {
			  toastr.error("<i class=fa-info></i>请输入路径内容", opts);
			 $("#path").focus();
			 return false;
		 }
		 if($("#icon1").val() ==  "")
		 {
			// toastr.error("<i class=fa-info></i>请输入图片class", opts);
			 $("#icon").focus();
			 return false;
		 }
		  
		 var data = "name="+$("#name").val()+
		 	 "&path="+$("#path").val()+
		 	 "&is_menu="+$('#is_menu').val()+
		 	"&status="+$('#status').val()+
			"&icon="+$('#icon').val()+
			"&sex="+$('#sex').val()+
			"&parent="+$('#parent').val()+
			"&sort="+$('#sort').val();
		 $.ajax({
			url:"<?php echo u(CONTROLLER_NAME . '/add');?>",
			type:"POST",
			dataType:"json",
			data:data,
			success:function(res){
				if(res.result == 'success'){
					alert('操作成功');
					 window.location.reload();
				}else{
					alert('操作失败');
					 window.location.reload();
				}
			}
		 
		 });
		 
	});
	
});
</script> 
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