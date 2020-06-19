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
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>

										教授信息维护
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="prochange.php">
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

								<li class="open active">
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


										<li class="active">
											<a href="#">
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
								<a href="#">学生信息维护</a>
							</li>
							<li class="active">增加新学生</li>
						</ul><!-- .breadcrumb -->

						<div class="nav-search" id="nav-search">
<!--							<form class="form-search">-->
<!--								<span class="input-icon">-->
<!--									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />-->
<!--									<i class="icon-search nav-search-icon"></i>-->
<!--								</span>-->
<!--							</form>-->
						</div><!-- #nav-search -->
					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<section id="main-content">
									<section class="wrapper">
										<div class="form-w3layouts">
											<div class="row">
												<div class="col-lg-12">
													<section class="panel">
														<header class="panel-heading">
															添加学生
														</header>
														<div class="panel-body">
															<div class="position-center">
																<form role="form" method="post">
																	<div class="form-group">
																		<label for="exampleInputText1">姓名</label>
                                                                        <span style="color:red">*</span>
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" required>
																	</div>
																	<div class="form-group">
																		<label for="exampleInputText1">出生日期</label>
																		<input type="date" class="form-control" id="exampleInputEmail1" name="birthday" >
																	</div>
																	<div class="form-group">
																		<label for="exampleInputText1">社会安全码</label>
                                                                        <span style="color:red">*</span>
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" name="SSN" required>
																	</div>
																	<div class="form-group">
																		<label >身份</label>&emsp;&emsp;
																		<span>
                                                                            <input type="radio"  name="status" value="" disabled style="display:none" />
                                                                            <input type="radio"  name="status" value="bachelor" />本科生&emsp;
                                                                            <input type="radio" name="status"  value="master" />研究生&emsp;
                                                                            <input type="radio"  name="status" value="doctor" />博士生
																		</span>
																	</div>
																	<div class="form-group">
                                                                        <label for="exampleInputText1">毕业年份</label>
                                                                        <input type="date" class="form-control" id="exampleInputEmail1" name="extrainfo" >
																		
																	</div>
																	<button type="button" class="btn btn-info" onclick ="login()">添加学生</button>&emsp;&emsp;
																	<button type="reset" class="btn btn-info">重置</button>
																</form>
															</div>
														</div>
													</section>
												</div>
											</div>

                                            <script>
                                            function login() {
                                                var name = document.querySelector("input[name=name]").value;
                                                var birthday = document.querySelector("input[name=birthday]").value;
                                                var SSN = document.querySelector("input[name=SSN]").value;
                                                var j,len,status,statuses=document.getElementsByName('status');
                                                var arr=["","bachelor","master","doctor"];
                                                for(j=0,len=statuses.length;j<len;j++){
                                                    if(statuses[j].checked){
                                                        status = arr[j];
                                                    }
                                                }
                                                var extrainfo = document.querySelector("input[name=extrainfo]").value;

                                                if(name==""){
                                                    alert("请输入姓名！");
                                                    return;
                                                }
                                                else{
                                                    if(SSN==""){
                                                        alert("请输入社会安全码！")
                                                        return;
                                                    }else{
                                                        if(birthday!=""&&extrainfo!="") {
                                                            if(birthday>extrainfo){
                                                                alert("毕业年份不可能小于出生日期，请重新输入！");
                                                                return;
                                                            }
                                                        }
                                                    }
                                                }

                                                var xhr = new XMLHttpRequest();
                                                xhr.open('post', 'register.php');
                                                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");



                                                xhr.onload = function () {
                                                    var response = xhr.responseText;
                                                    alert(xhr.responseText);
													window.location.href = "stunew.php";
                                                }

                                                xhr.send('id='+ '&M=S' +'&name=' + name + '&birthday=' + birthday + '&SSN=' + SSN + '&status=' + status + '&extrainfo=' + extrainfo +'&del=');
                                            }
                                            </script>


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

		<!-- ace scripts -->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
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
