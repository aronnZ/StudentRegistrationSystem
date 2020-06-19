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

		<link rel="stylesheet" href="assets/css/jquery-ui-1.10.3.custom.min.css" />

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
							课程注册系统
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<?php
					session_start();
					$user = $_SESSION["user"];
					$con=mysqli_connect("localhost","root","123456","systemdb");

					$sql="SELECT sec_id, count(stu_id) as count from course natural join takes natural join teaches where prof_id='$user' and flag='0' group by sec_id";
					$result = mysqli_query($con,$sql);
					$rows = mysqli_fetch_all($result);

					$sql="SELECT sec_id from teaches where prof_id='$user'";
					$result = mysqli_query($con,$sql);
					$names = mysqli_fetch_all($result);	
								
					$count=0;

					foreach($rows as $row)
					{
						if($row[1]<=3)
							{
								$count=$count+1;
							}
										
					}
								
					foreach($names as $name)
					{
							$isnull=true;

							foreach($rows as $row)
							{
								if($row[0]==$name[0])
								{
									$isnull=false;
								}
							}
									
							if($isnull)
							{
								$count=$count+1;							
							}

					}
																													
				?>



				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>欢迎光临,</small>
									<?php
									session_start();
									echo $_SESSION["name"];
									?>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

								<li>
									<a href="stuinfo.php">
										<i class="icon-user"></i>
										个人资料
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a onclick="quit()">
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
					<li>
							<a href="stumain.php">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> 主页 </span>
							</a>
						</li>

						<li>
							<a href="stuinfo.php">
								<i class="icon-file"></i>
								<span class="menu-text"> 查看个人信息 </span>
							</a>
						</li>	

						<li>
							<a href="stuschedule.php">
								<i class="icon-calendar"></i>
								<span class="menu-text"> 查看课程表 </span>
							</a>
						</li>	
						
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-plus"></i>
								<span class="menu-text"> 学生选课 </span>
								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="stuclasschoosed.php">
										<i class="icon-double-angle-right"></i>
										已选课程
									</a>
								</li>

								<li>
									<a href="stuclasschoose.php">
										<i class="icon-double-angle-right"></i>
										在线选课
									</a>
								</li>
							</ul>
						</li>	


						<li>
							<a href="stuscore.php">
								<i class="icon-bar-chart"></i>
								<span class="menu-text"> 查看成绩 </span>
							</a>
						</li>	

						<li class="active">
							<a href="#">
								<i class="icon-bar-chart"></i>
								<span class="menu-text"> 账单 </span>
							</a>
						</li>

						<li>
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
							<li class="active">
								<i class="icon-home home-icon"></i>
								<li href="#">学生账单</li>
							</li>
						</ul><!-- .breadcrumb -->

					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-xs-12 col-sm-6 widget-container-span">
										<div class="widget-box">
											<div class="widget-header header-color-blue">
												<h5 class="bigger lighter">
													<i class="icon-table"></i>
													学生课程账单
												</h5>												
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-striped table-bordered table-hover">
														<thead class="thin-border-bottom">
															<tr>
																<th>																	
																	序号
																</th>

																<th>																	
																	课程编号
																</th>

																<th>
																	课程名称
																</th>
																<th class="hidden-480">
																<i class="icon-money"></i>
																	价格
																</th>
															</tr>
														</thead>

														<tbody>

														<?php

														session_start();
														$user=$_SESSION["user"];
														
														$con=mysqli_connect("localhost","root","123456","systemdb");
														
														
														if(!$con)
														{
															echo "数据库连接错误!";															
														}

														else
														{
															$sql="select shtdwn_flag from administrator";
														$result = mysqli_query($con,$sql);
														$flag = mysqli_fetch_assoc($result);

														if($flag['shtdwn_flag']!='1')
														{
															echo
															"
															<tr>
															<td class=''></td>

															<td>
																
															</td>

															<td>																
															</td>

															<td class='hidden-480'>
																计费系统不可用！正在反复尝试连接...
															</td>
															</tr>

															";
														}

														else
														{
															$sql="select sec_id,title,fee from student natural join takes natural join course where stu_id='$user' and flag=0 ";
															$result = mysqli_query($con,$sql);
															$rows = mysqli_fetch_all($result);
	
	
															$count=0;
															$total=0;
															if($rows!=null)
															{
																
																foreach($rows as $row)
																{
																	$secid=$row[0];
																	$title=$row[1];
																	$fee=$row[2];
																	$total = intval($fee)+$total;
																	$count=$count+1;
																	echo
																	"
																	<tr>
																	<td class=''>$count</td>
	
																	<td>
																		$secid
																	</td>
	
																	<td>
																	$title	
																	</td>
	
																	<td class='hidden-480'>
																		<span class='label label-warning'>￥$fee</span>
																	</td>
																	</tr>
	
																	";
																}
															}
															echo
																	"
																	<tr>
																	<td class=''></td>
	
																	<td>
																		
																	</td>
	
																	<td>
																	总价	
																	</td>
	
																	<td class='hidden-480'>
																		<span class='label label-warning'>￥$total</span>
																	</td>
																	</tr>
	
																	";
														}	
														}
												

																																																			
														?>
										
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div><!-- /span -->
								</div><!-- /row -->

								</div><!-- PAGE CONTENT ENDS -->
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

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
							<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
							<label class="lbl" for="ace-settings-add-container">
								Inside
								<b>.container</b>
							</label>
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

		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.slimscroll.min.js"></script>

		<!-- ace scripts -->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			jQuery(function($) {
			
				$('#simple-colorpicker-1').ace_colorpicker({pull_right:true}).on('change', function(){
					var color_class = $(this).find('option:selected').data('class');
					var new_class = 'widget-header';
					if(color_class != 'default')  new_class += ' header-color-'+color_class;
					$(this).closest('.widget-header').attr('class', new_class);
				});
			
			
				// scrollables
				$('.slim-scroll').each(function () {
					var $this = $(this);
					$this.slimScroll({
						height: $this.data('height') || 100,
						railVisible:true
					});
				});
			
				/**$('.widget-box').on('ace.widget.settings' , function(e) {
					e.preventDefault();
				});*/
				  
				  
			
				// Portlets (boxes)
			    $('.widget-container-span').sortable({
			        connectWith: '.widget-container-span',
					items:'> .widget-box',
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'widget-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer'
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
