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
		<title>课程注册系统</title>
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
						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-bell-alt icon-animated-bell"></i>
								<span class="badge badge-important">
								<?php
										echo $count;
								?>
								</span>
							</a>

							<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">

								<li class="dropdown-header">
									<i class="icon-warning-sign"></i>
									还有
									<?php
										echo $count;
									?>
									门课程人数未达到要求
								</li>

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

								foreach($rows as $row)
								{
									$sql="SELECT title from course natural join section where sec_id='$row[0]'";
									$result = mysqli_query($con,$sql);
									$class = mysqli_fetch_assoc($result);
									$class = $class["title"];									


									echo 
									"
									<li>
									<a href='#'>
										<div class='clearfix'>
											<span class='pull-left'>$class</span>
											<span class='pull-right'>$row[1]/10</span>
										</div>
										
									";
									if($row[1]<=3)
									{
										echo
										"
										<div class='progress progress-mini ''>
										<div style='width:$row[1]0%' class='progress-bar progress-bar-danger'></div>
									</div>
									</a>
									</li>
										";
									}
									elseif($row[1]>3&&$row[1]<10)
									{
										echo
										"
										<div class='progress progress-mini ''>
										<div style='width:$row[1]0%' class='progress-bar progress-bar-warning'></div>
									</div>
									</a>
									</li>
										";
									}
									elseif($row[1]==10)
									{
										echo
										"
										<div class='progress progress-mini ''>
										<div style='width:$row[1]0%' class='progress-bar progress-bar-success'></div>
									</div>
									</a>
									</li>
										";	
									}									
								}
								
								foreach($names as $name)
								{
									$isnull=true;

									$sql="SELECT title from course natural join section where sec_id='$name[0]'";
									$result = mysqli_query($con,$sql);
									$class = mysqli_fetch_assoc($result);
									$class = $class["title"];	

									foreach($rows as $row)
									{
										if($row[0]==$name[0])
										{
											$isnull=false;
										}
									}
									
									if($isnull)
									{
										echo 
										"
										<li>
										<a href='#'>
											<div class='clearfix'>
												<span class='pull-left'>$class</span>
												<span class='pull-right'>0/10</span>
											</div>
											<div class='progress progress-mini ''>
											<div style='width:0%' class='progress-bar progress-bar-danger'></div>
										</div>
										</a>
										</li>
											";
										
									}

								}
																													
								?>


								<li>
									<a href="proclasschoosed.php">
										查看选课详情
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>


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
									<a href="proinfo.php">
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
							<a href="promain.php">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> 主页 </span>
							</a>
						</li>

						<li>
							<a href="proinfo.php">
								<i class="icon-file"></i>
								<span class="menu-text"> 查看个人信息 </span>
							</a>
						</li>	

						
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-plus"></i>
								<span class="menu-text"> 教授选课 </span>
								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="proclasschoosed.php">
										<i class="icon-double-angle-right"></i>
										已选课程
									</a>
								</li>

								<li>
									<a href="proclasschoose.php">
										<i class="icon-double-angle-right"></i>
										在线选课
									</a>
								</li>
							</ul>
						</li>	


						<li class="active">
							<a href="proscore.php">
								<i class="icon-bar-chart"></i>
								<span class="menu-text"> 课程打分 </span>
							</a>
						</li>	
								
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
								<li href="#">主页</li>
							</li>

							<li class="active">课程打分</li>
						</ul><!-- .breadcrumb -->

					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														
														<th>课程ID</th>
														<th>课程名</th>
														<th>课程段</th>
														<th>学生ID</th>
														<th>学生姓名</th>
														<th>成绩</th>

														<th>
														<button type="button" class="width-35  btn btn-sm btn-primary" onclick="submit()">
															<i class="icon-ok"></i>
															提交
														</button>
														<button type="button" class="width-35  btn btn-sm btn-primary" onclick="goback()">
															<i class="icon-exchange"></i>
															返回
														</button>
														</th>
													</tr>
												</thead>

												<tbody>
												<?php

													session_start();
													$scoreid=$_SESSION["scroeid"];
													$user = $_SESSION["user"];

													$con=mysqli_connect("localhost","root","123456","systemdb");

													if(!$con)
													{
														echo "<script>alert('数据库连接失败！')</script>";
													}
													
													else
													{
														$sql="select course_id,title,sec_id,stu_id,name from section natural join course natural join student natural join takes natural join teaches where prof_id='$user' and flag='0' and sec_id ='$scoreid' ";
														$result = mysqli_query($con,$sql);
														$rows = mysqli_fetch_all($result);
	
	
														$count=0;
														echo"<script>x=0;</script>";
														foreach ($rows as $row)
														{
	
	
															echo"<script>x=x+1;</script>";
															$count=$count+1;
															echo 
															"
															<tr>
																<td>$row[0]</td>
																<td>$row[1]</td>
																<td name='sec$count'>$row[2]</td>
																<td name='Stu_name$count'>$row[3]</td>
																<td>
																	$row[4]
																</td>
																
																<td>
																	<div class='visible-md visible-lg hidden-sm hidden-xs action-buttons'>
																		<select name='grade$count'>
																		<option >请选择成绩等级</option>
																		<option >A</option>
																		<option >B</option>
																		<option >C</option>
																		<option >D</option>
																		<option >E</option>
																		<option >F</option>
																		</select>
																		
																	</div>
																</td>
															</tr>
															";
													}
													

													}
													mysqli_close($con);
												?>	

												</tbody>
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
								</div><!-- /row -->
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

		<!-- ace scripts -->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

		<script>
			function submit()
			{	
				var Stu_names=new Array();
				var gradearray =new Array();
				var sec=new Array();


				for(var i=0;i<x;i++)
				{
					var Stu_name="Stu_name"+(i+1);
					var name = "grade"+(i+1);
					var secn="sec"+(i+1);
					gradearray[i]=document.querySelector("select[name="+name+"]").value;
					Stu_names[i]=document.querySelector("td[name="+Stu_name+"]").innerHTML;
					sec[i]=document.querySelector("td[name="+secn+"]").innerHTML;

					if(gradearray[i]=="请选择成绩等级")
					{
						alert("请先选择成绩等级!");
						return;	
					}
				}			


				var xhr = new XMLHttpRequest();

				xhr.onload = function()
				{
				  //console.log(xhr.responseText);
				  alert(xhr.responseText);
				}

				xhr.open('post','submitscore.php');

				xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xhr.send('gradearray='+gradearray+'&Stu_names='+Stu_names+'&sec='+sec);
			}

			function goback()
			{
				var r = confirm("确认返回课程列表吗");
				if(r==true)
				{
					location.href("proscore.php");
				}
			}

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
