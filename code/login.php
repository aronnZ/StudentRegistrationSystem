<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>课程注册管理系统</title>
		<meta name="keywords" content="Bootstrapģ��,Bootstrapģ������,Bootstrap�̳�,Bootstrap����" />
		<meta name="description" content="JS�������ṩBootstrapģ��,Bootstrap�̳�,Bootstrap���ķ�������Bootstrap�������" />
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

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<br>
									<br>
									<span class="white">课程注册管理系统</span>
								</h1>
								<h4 class="blue"> </h4>
								
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												账号密码登录
											</h4>

											<div class="space-6"></div>

											<form method="post">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="Username" name = "user" onblur="remember()"/>
															<i class="icon-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Password" name = "password"/>
															<i class="icon-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" class="ace" name="checkbox" checked="true"/>
															<span class="lbl"> 记住密码 </span>
														</label>

														<button type="button" class="width-35 pull-right btn btn-sm btn-primary" onclick="login()">
															<i class="icon-key"></i>
															登录
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

											
										</div><!-- /widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a href="#" onclick="show_box('forgot-box'); return false;" class="forgot-password-link">
												<!--	<i class="icon-arrow-left"></i>
												忘记密码-->	
												</a>
											</div>

											<div>
								<!--	<a href="#" onclick="show_box('signup-box'); return false;" class="user-signup-link">
													账号注册
													<i class="icon-arrow-right"></i>
								-->			
												</a>
											</div>
										</div>
									</div><!-- /widget-body -->
								</div><!-- /login-box -->

								<div id="forgot-box" class="forgot-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="icon-key"></i>
												找回密码
											</h4>

											<div class="space-6"></div>
											<p>
												输入你的账户邮箱
											</p>

											<form>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" />
															<i class="icon-envelope"></i>
														</span>
													</label>

													<div class="clearfix">
														<button type="button" class="width-35 pull-right btn btn-sm btn-danger">
															<i class="icon-lightbulb"></i>
															发送!
														</button>
													</div>
												</fieldset>
											</form>
										</div><!-- /widget-main -->

										<div class="toolbar center">
											<a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
												返回登陆
												<i class="icon-arrow-right"></i>
											</a>
										</div>
									</div><!-- /widget-body -->
								</div><!-- /forgot-box -->

								<div id="signup-box" class="signup-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="icon-group blue"></i>
												新用户注册
											</h4>

											<div class="space-6"></div>
											<p> 输入你的信息: </p>

											<form method="post" action="register.php">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" name="emailre"/>
															<i class="icon-envelope"></i>
															<i class="emailinfo"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="学生S+学号、教授P+工号" name="userre"/>
															<i class="icon-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Password" name="passwordre"/>
															<i class="icon-lock"></i>

														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Repeat password" name="repeat"/>
															<i class="icon-retweet"></i>
														</span>
													</label>

													<label class="block">
														<input type="checkbox" class="ace" name="checkboxre" value="1"/>
														<span class="lbl">
															我接受
															<a href="#">用户协议</a>
														</span>
													</label>

													<div class="space-24"></div>

													<div class="clearfix">
														<button type="reset" class="width-30 pull-left btn btn-sm">
															<i class="icon-refresh"></i>
															重置
														</button>

														<button type="button" class="width-65 pull-right btn btn-sm btn-success" onclick="register()">
															注册
															<i class="icon-arrow-right icon-on-right"></i>
														</button>
													</div>
												</fieldset>
											</form>
										</div>

										<div class="toolbar center">
											<a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
												<i class="icon-arrow-left"></i>
												返回登陆
											</a>
										</div>
									</div><!-- /widget-body -->
								</div><!-- /signup-box -->
							</div><!-- /position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div>
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

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			function show_box(id) {
			 jQuery('.widget-box.visible').removeClass('visible');
			 jQuery('#'+id).addClass('visible');
			}
		</script>
		
		<script>
		function register()
		{
			var emailre = document.querySelector("input[name=emailre]").value;
			var userre = document.querySelector("input[name=userre]").value;
			var passwordre = document.querySelector("input[name=passwordre]").value;
			var repeat = document.querySelector("input[name=repeat]").value;
			var checkboxre = document.querySelector("input[name=checkboxre]").checked;

			var xhr = new XMLHttpRequest();
			xhr.open('post','register.php');

			xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

			xhr.onload = function()
			{
				console.log(xhr.responseText);
				alert(xhr.responseText);
			}

			xhr.send('email='+emailre+'&user='+userre+'&password='+passwordre+'&repeat='+repeat+'&checkbox='+checkboxre);
		}
		</script>

		<script>
		function login()
		{

			var user = document.querySelector("input[name=user]").value;
			var password = document.querySelector("input[name=password]").value;
			var checkbox = document.querySelector("input[name=checkbox]").checked;

			var xhr = new XMLHttpRequest();

			xhr.open('post','logindb.php');

			xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

			xhr.onload = function()
			{
				//console.log(xhr.responseText);
				var response = xhr.responseText;
				if(response.indexOf("php")==-1)
				{
					alert(xhr.responseText);
				}
				else
				{
					location.href(response);
				}

			}

			xhr.send('user='+user+'&password='+password+'&checkbox='+checkbox);
		}

		function remember()
		{
			var yes = document.querySelector("input[name=checkbox]").checked;

			if(yes==true)

			{
				
			var user = document.querySelector("input[name=user]").value;

			var xhr = new XMLHttpRequest();

			xhr.open('post','remember.php');

			xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

			xhr.onload = function()
			{
				//console.log(xhr.responseText);
				document.querySelector("input[name=password]").value = xhr.responseText;
			}

			xhr.send('user='+user);	

			}
			

		}


		</script>

	</body>
</html>
