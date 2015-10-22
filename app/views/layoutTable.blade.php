<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AIMS | Oversight</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!--Favicon-->
       <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     
         
        <!-- DATA TABLES -->
         {{ HTML::style('css/datatables/dataTables.bootstrap.css') }}
       
        <!-- Theme style -->
         {{ HTML::style('css/AdminLTE.css') }}
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        {{ HTML::style('search/css/selectize.css') }}
        {{ HTML::script('search/js/selectize.js') }}
         <style type="text/css">
        .demo-animals .scientific {
            font-weight: normal;
            opacity: 0.3;
            margin: 0 0 0 2px;
        }
        .demo-animals .scientific::before {
            content: '(';
        }
        .demo-animals .scientific::after {
            content: ')';
        }
        </style>
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
          @yield('content')
         </section><!-- /.content -->
        </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="{{URL::asset('js/plugins/datatables/jquery.dataTables.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('js/plugins/datatables/dataTables.bootstrap.js')}}" type="text/javascript"></script>
        
        <!-- AdminLTE App -->
        
        <script src="{{URL::asset('js/AdminLTE/app.js')}}" type="text/javascript"></script>
       
        
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();               
                $("#resolved").dataTable();               
                $("#example3").dataTable();               
                $("#example4").dataTable();               
            });
        </script>

    </body>
</html>
