<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
        <title>AIMS | Oversight</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
      <!--Favicon-->
       <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >

     

      <!-- On-line-->

   	   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	   <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	   <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
	 
     
{{ HTML::style('css/AdminLTE.css') }}
	
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

<link href="{{URL::asset('js/datatable/jquery.datatables.yadcf.css')}}" rel="stylesheet" type="text/css" />
<script src="{{URL::asset('js/datatable/jquery.dataTables.yadcf.js')}}"></script>

<style>
.label {
  padding: 0px 10px 0px 10px;
	border: 1px solid #ccc;
	-moz-border-radius: 1em; /* for mozilla-based browsers */
	-webkit-border-radius: 1em; /* for webkit-based browsers */
	border-radius: 1em; /* theoretically for *all* browsers*/
}

.label.lightblue {
	background-color: #99CCFF;
}

#external_filter_container_wrapper {
  margin-bottom: 20px;
}

#external_filter_container {
  display: inline-block;
}
</style>  

<script>
$(document).ready(function(){
  $('#example').dataTable().yadcf([
		{column_number : 0},
	    {column_number : 1, text_data_delimiter: ",", filter_type: "auto_complete"},
	    {column_number : 2, data: ["Yes", "No"], filter_default_label: "Select Yes/No"},
	    {column_number : 3, text_data_delimiter: ",", filter_type: "auto_complete"},
	    {column_number : 4, column_data_type: "html", html_data_type: "text", filter_default_label: "Select tag"}]);
});
</script>
<meta charset=utf-8 />
<title>yadcf - Yet Another DataTables Column Filter</title>
</head>
<body class="skin-blue">
				
        <!-- header logo: style can be found in header.less -->
        <header class="header">
           @include('header')
		   @yield('header')
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
           
		   <aside class="left-side sidebar-offcanvas">
               @include('left_sidebar')
			   @yield('left_sidebar')
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
			
				 <section class="content-header">
                 
                   <!-- <h1>
                        Qualification
                        <small>Employee Qualification</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Qualification</a></li>
                        <li class="active">{{$PageName}}</li>
                    </ol>-->
				 </section>
			
			<!--Success Massage-->
			@if(Session::has('message'))
				 
				 <div id='myAlert' class='alert alert-success'>
							   <a href='#' class='close' data-dismiss='alert'>&times;</a>
							   <strong>Message: </strong>  {{Session::get('message')}}
				</div>
			@endif 
			<!--End success massage-->
			<!--Start error massage-->
			@if(Session::has('error'))
				
				 <div id='myAlert' class='alert alert-warning'>
							   <a href='#' class='close' data-dismiss='alert'>&times;</a>
							   <strong>Error: </strong> {{Session::get('error')}}
				</div>
				@endif 
			  @if($errors->any())
			  <div>
				<ul class="alert alert-warning">
				   <div id='myAlert' class='alert alert-warning'>
							   <a href='#' class='close' data-dismiss='alert'>&times;</a>
							   <strong>Error list: </strong>  {{ implode('', $errors->all('<li>:message</li>'))}}

				</ul>
			  </div>
			  @endif
			  <!--End error massage-->
			
                <!-- Main content -->
                <div id="answer"></div>
      @yield('content')
     
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>

    </div>
  </body>
</html>
