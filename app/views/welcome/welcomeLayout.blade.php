<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AIMS | Library</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
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
        <div>
       
         @include('welcome/header')
          @yield('header')
    
     @yield('content')

       @include('welcome/footer')
       @yield('footer')
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

