<!DOCTYPE html>
<html lang="en">
	<head>
	<?php
		session_start();
		if(!isset($_SESSION['user']))
		{
			header("Location:login.php");
			exit;
		}
		?>
		<meta charset="utf-8" />
		<title>课程注册系统后台管理</title>
		<meta name="keywords" content="Bootstrap模版,Bootstrap模版下载,Bootstrap教程,Bootstrap中文" />
		<meta name="description" content="JS代码网提供Bootstrap模版,Bootstrap教程,Bootstrap中文翻译等相关Bootstrap插件下载" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- basic styles -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<!-- ace styles -->

		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
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
							课程注册系统后台管理
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>欢迎光临</small>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">							
								<li class="divider"></li>

								<li>
									<a  onclick="quit()">
										<i class="icon-off"></i>
										退出
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div><!-- /.container -->
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
						<li class="active">
							<a href="admin_main.php">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> 主页 </span>
							</a>
						</li>

						<li class="open active">
							<a href="#" class="dropdown-toggle">
								<i class="icon-book"></i>
								<span class="menu-text"> 用户信息管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="open active">
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>

										教授信息维护
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li class="active">
											<a href="#">
												<i class="icon-leaf"></i>
												变更教授信息
											</a>
										</li>


										<li>
											<a href="pronew.php">
												<i class="icon-leaf"></i>
												增加新教授
											</a>
										</li>

										<li>
											<a href="prodel.php">
												<i class="icon-leaf"></i>
												删除教授
											</a>
										</li>
									</ul>
								</li>

								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>

										学生信息维护
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="stuchange.php">
												<i class="icon-leaf"></i>
												变更学生信息
											</a>
										</li>


										<li>
											<a href="stunew.php">
												<i class="icon-leaf"></i>
												增加新学生
											</a>
										</li>

										<li>
											<a href="studel.php">
												<i class="icon-leaf"></i>
												删除学生
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>


			



						<li>
							<a href="index.php">
								<i class="icon-off"></i>
								<span class="menu-text"> 关闭注册系统 </span>
							</a>
						</li>
					</ul>
								
					<!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">主页</a>
							</li>

							<li>
								<a href="#">教授信息维护</a>
							</li>
							<li class="active">变更教授信息</li>
						</ul><!-- .breadcrumb -->

						
					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<h3 class="header blue lighter smaller">
									<i class="icon-group smaller-90"></i>
											输入工作号
								</h3>
                                <form action="sqlfix.php"  method="post">
                                    <div>
                                        <p>工作号：<input type="text" id="professorID" name="proID" placeholder="例如：P12345678"></p>
                                    </div>
                                    <br/>
                                    <!--  <input type="button" value="确认">-->
                                    <a href="#" id="id-btn-dialog2" class="btn btn-info btn-sm">搜索</a>

                                    <div id="dialog-confirm" class="hide">
                                        <div class="alert alert-info bigger-110">
                                            未找到结果，请重新输入
                                        </div>
                                    </div><!-- #dialog-confirm -->


                                </form>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

				<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-skin="default" value="#438EB9">#438EB9</option>
									<option data-skin="skin-1" value="#222A2D">#222A2D</option>
									<option data-skin="skin-2" value="#C6487E">#C6487E</option>
									<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
								</select>
							</div>
							<span>&nbsp; Choose Skin</span>
						</div>
					</div>
				</div><!-- /#ace-settings-container -->
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script src="assets/js/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery-ui-1.10.3.full.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<!-- ace scripts -->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
            jQuery(function($) {

                //override dialog's title function to allow for HTML titles
                $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
                    _title: function(title) {
                        var $title = this.options.title || '&nbsp;'
                        if( ("title_html" in this.options) && this.options.title_html == true )
                            title.html($title);
                        else title.text($title);
                    }
                }));


                $( "#id-btn-dialog2" ).on('click', function(e) {
                    e.preventDefault();
                    let proId = document.getElementById('professorID').value;

					var type = proId.substring(0,1);
					if(type!='P')
					{
						alert("ID格式错误！教授为P开头！");
						return;
					}

                    let xhr = new XMLHttpRequest();
                    xhr.open('post','sqlfix.php');
                    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");

                    xhr.onload = function(){
                        //console.log(xhr.responseText);
                        //alert(xhr.responseText);
                        let result = xhr.responseText;
                        if(result === '0'){
                            alert("数据库连接失败...");
                        }
                        else if(result === '2') {
                            $( "#dialog-confirm" ).removeClass('hide').dialog({
                                resizable: false,
                                modal: true,
                                title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i>提示</h4></div>",
                                title_html: true,
                                buttons: [
                                    {
                                        html: "<i class='icon-undo  green bigger-110'></i>&nbsp; 重新输入",
                                        "class" : "btn btn-xs",
                                        click: function() {
											window.location.href = "prochange.php";
                                            $( this ).dialog( "close" );
                                        }
                                    }
                                    ,
                                    {
                                        html: "<i class='icon-remove red bigger-110'></i>&nbsp; 取消",
                                        "class" : "btn btn-xs",
                                        click: function() {
											window.location.href = "prochange.php";
                                            $( this ).dialog( "close" );
                                        }
                                    }
                                ]
                            });
                        }
                        else if(result ==='1') {
                            window.location.href = "prochange1.php?index=" + proId;
                        }
                    }

                    xhr.send('stuID='+proId);

                });



            });
        </script>
		
		<script>
			function quit()
			{
				var yes = window.confirm("确认退出？");

				if(yes==true)
				{	
				var xhr = new XMLHttpRequest();
				xhr.open('post','quit.php');
				xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xhr.onload = function()
				{
					//console.log(xhr.responseText);
					location.href("login.php");
					alert("退出成功！");
				}

				xhr.send(null);	

				}
			}
		</script>

	</body>
</html>
