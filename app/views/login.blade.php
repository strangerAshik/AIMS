<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
        <title>CAAB | Civil Aviation Authority Bangladesh</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
		{{ HTML::style('css/morris/morris.css') }}
        <!-- jvectormap -->
        
		{{ HTML::style('css/jvectormap/jquery-jvectormap-1.2.2.css') }}
        <!-- Date Picker -->
     
		{{ HTML::style('css/datepicker/datepicker3.css') }}
        <!-- Daterange picker -->
       
		{{ HTML::style('css/daterangepicker/daterangepicker-bs3.css') }}
        <!-- bootstrap wysihtml5 - text editor -->
        
		{{ HTML::style('css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}
        <!-- Theme style -->
       
		{{ HTML::style('css/AdminLTE.css') }}

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
		  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <style> 
.panel-heading {
    padding: 5px 15px;
	text-align:center;
}

.panel-footer {
	padding: 1px 15px;
	color: #A0A0A0;
}

.profile-img {
	width: 96px;
	height: 96px;
	margin: 0 auto 10px;
	display: block;
	-moz-border-radius: 50%;
	-webkit-border-radius: 50%;
	border-radius: 50%;
}
</style>
	</head>
<body>

   <div class="container" style="margin-top:40px">
		<div class="row">
		
			<div class="col-sm-6 col-md-4 col-md-offset-4">
			@if(Session::has('message'))
				 <div class="alert alert-success">
				 {{Session::get('message')}}
				 </div>
		    @endif
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>Civil Aviation Authority, Bangladesh </strong>
					</div>
					<div class="panel-body">
						<form role="form" action="login" method="POST">
							<fieldset>
								<div class="row">
									<div class="center-block">
										<img class="profile-img"
											{{HTML::Image('img/logo.png/','CAAB LOGO',array('class'=>''))}}
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												<input class="form-control" placeholder="Email Address" name="email" type="text" autofocus>
											
											</div>
												{{$errors->first('email')}}
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Password" name="password" type="password" value="">
												
											</div>
											{{$errors->first('password')}}
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign in">
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="panel-footer ">
						
					</div>
                </div>
			</div>
		</div>
	</div>
	</body>