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
						
						<li class="open active">
							<a href="#" class="dropdown-toggle">
								<i class="icon-plus"></i>
								<span class="menu-text"> 学生选课 </span>
								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="active">
									<a href="#">
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

						<li>
							<a href="stuprice.php">
								<i class="icon-bar-chart"></i>
								<span class="menu-text"> 账单 </span>
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
						<a href="#">学生选课</a>
					</li>
					<li class="active">已选课程</li>
				</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
                                <?php
                                $link = mysqli_connect('localhost', 'root', '123456','systemdb');

                                if(!$link){
                                    exit('数据库连接失败');
                                }
                                mysqli_set_charset($link,'utf8');
                                mysqli_select_db($link,'S');




                                //查询选课的信息
                                $sql2="select *from takes where stu_id='{$_SESSION["user"]}' and flag=0";

                                $res2=mysqli_query($link,$sql2);

                                echo '<table width="600" border="1">';
                                echo '<th>学科编号</th><th>课程编号</th><th>课程名称</th><th>开课季节</th><th>年份</th><th>上课地点</th><th>上课时间</th><th>授课教授</th>>';
                                    while($result=mysqli_fetch_assoc($res2)){
                                    echo'<tr>';
                                    echo"已选的课程";
                                        $getteacher="select name from professor as T natural join teaches as S where S.course_id='{$result['course_id']}' and S.sec_id='{$result['sec_id']}' and S.semester='{$result['semester']}'  and S.year='{$result['year']}'";
                                        $res1=mysqli_query($link,$getteacher);
                                        $result1=mysqli_fetch_assoc($res1);

                                        $vv="select building ,day,time_slot_id from section where course_id='{$result['course_id']}' and sec_id='{$result['sec_id']}' and semester='{$result['semester']}' and year='{$result['year']}'";
                                        $kk=mysqli_query($link,$vv);
                                        $w=mysqli_fetch_assoc($kk);

                                        $t="select title from course where course_id='{$result['course_id']}'";
                                        $f=mysqli_query($link,$t);
                                        $course_name=mysqli_fetch_assoc($f);

                                        $t2="select * from time_slot where time_slot_id='{$w['time_slot_id']}'";
                                        $f2=mysqli_query($link,$t2);
                                        $time=mysqli_fetch_assoc($f2);

                                        echo'<td>'.$result['course_id'].'</td>';
                                        echo'<td>'.$result['sec_id'].'</td>';
                                        echo'<td>'.$course_name['title'].'</td>';
                                        echo'<td>'.$result['semester'].'</td>';
                                        echo'<td>'.$result['year'].'</td>';
                                        echo'<td>'.$w['building'].'</td>';
                                        echo'<td>星期'.$w['day'].'---'.$time['start_hr'].':'.$time['start_min'].'到'.$time['end_hr'].':'.$time['end_min'].'</td>';
                                        echo'<td>'.$result1['name'].'</td>';
                                        echo'<td><a href="删除3.php?key1='.$result['course_id'].'&key2='.$result['sec_id'].'&key3='.$result['semester'].'&key4='.$result['year'].'" onClick="alert(\'确认\')">删除</a></td>';
                                        echo'</tr>';

                                    }
                                    echo'</table>';
                                    ?>
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
