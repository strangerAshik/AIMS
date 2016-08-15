 <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{CommonFunction::getCompanySetupDetails()->short_name}}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!--Favicon-->
       <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <!--Bar Chart-->
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/data.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>


        <script src="http://code.highcharts.com/highcharts-3d.js"></script>

       
       <!-- date picker -->
     {{ HTML::style('plugin/datepicker/jquery.datetimepicker.css') }}
     
       


        <!--End Bar Chart-->
      
       
        <!-- Theme style -->
         {{ HTML::style('css/AdminLTE.css') }}
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
       
       
        </style>
      
<script type="text/javascript" src="/assets/script/canvasjs.min.js"></script></head>
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
                <!-- sidebar: style can be found in sidebar.less -->
                  @include('left_sidebar')
               @yield('left_sidebar')
                <!-- /.sidebar -->
            </aside>
        <aside class="right-side">
         <section class="content">
          <div class="row">

              <div class="col-md-10 col-md-offset-2">
               {{Form::open(array('url'=>'report/reportChartByDateToDate','method'=>'get','class'=>'form-inline','data-toggle'=>'validator','role'=>'form'))}}
               {{Form::hidden('fileName',$fileName)}}
               {{Form::hidden('active',$active)}}
                  <div class="form-group">
                    <label for="email"> From :</label>
                    {{Form::select('from_date', $dates, $from_Date ,array('class'=>'form-control','required'=>''))}}
                    {{Form::select('from_month',$months, $fromMonth ,array('class'=>'form-control','required'=>''))}}
                    {{Form::select('from_year',$years, $fromYear,array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="form-group">
                    <label for="email"> To: </label>
                    {{Form::select('to_date', $dates, $to_Date ,array('class'=>'form-control','required'=>''))}}
                    {{Form::select('to_month',$months, $toMonth ,array('class'=>'form-control','required'=>''))}}
                    {{Form::select('to_year',$years, $toYear,array('class'=>'form-control','required'=>''))}}
                  </div>
                  
                  <button type="submit" class="btn btn-default">Submit</button>
                {{Form::close()}}
                </div>
                 <h4 class="text-center text-success"> Report Shown For <b class="text-primary">{{date('d F Y',strtotime($from))}}</b> To <b class="text-primary">{{date('d F Y',strtotime($to))}}</b></h4>
              </div>
                

        <!--Content-->
        @yield('content')
     
        <!--End Content-->
         </section><!-- /.content -->
        </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

       
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
        

        
        <!-- AdminLTE App -->
        
        <script src="{{URL::asset('js/AdminLTE/app.js')}}" type="text/javascript"></script>
       
        
        <!-- page script -->
             <!-- date picker -->
 <script src="{{URL::asset('plugin/datepicker/jquery.datetimepicker.full.js')}}" type="text/javascript"></script>  
        <script>

          $.datetimepicker.setLocale('en');


          $('.datepicker').datetimepicker({
            timepicker:false,
            format:'d F Y'

          });



      </script>

       <!-- date picker -->
       

    </body>
</html>
