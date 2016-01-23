<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
        <title>{{CommonFunction::getCompanySetupDetails()->short_name}}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!--Favicon-->
       <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >

      <!-- On-line-->
   	  
	   <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	   <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
	 
       <!-- Theme style -->       
		{{ HTML::style('css/AdminLTE.css') }}

<!--Datatable-->
            
       <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
       <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css">

       

      <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>



<!--Print Datatable-->


     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.1.0/css/buttons.dataTables.min.css">

     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.0.0/css/responsive.dataTables.min.css">
      <script src="https://cdn.datatables.net/responsive/2.0.0/js/dataTables.responsive.min.js"></script>

 
 
   
    <script src="https://cdn.datatables.net/buttons/1.1.0/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.1.0/js/buttons.flash.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.1.0/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.1.0/js/buttons.print.min.js"></script>


<!--Datepicker-->		
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <style type="text/css">
  #example thead th{font-weight: normal!important;}
  #example thead th input{
                        border-radius: 5px;
                        font-weight: normal !important;
                        text-align: center;
                        width: 100px;
                      }
  #example_filter input{
    border-radius: 5px;
font-weight: normal;
text-align: center;
  }

  table.dataTable.nowrap th, table.dataTable.nowrap td{
    white-space:normal!important;
  }
  </style>
  
  <script>
  $(function() {
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      altFormat: "yy-mm-dd",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
      altFormat: "yy-mm-dd",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
  </script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <style type="text/css">
          
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
			@yield('content')
                <!-- Main content -->
        
			  
            </aside><!-- /.right-side -->
			
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

		
      <script type="text/javascript">
 // Setup - add a text input to each footer cell
    $('#example thead tr#filterrow th').each( function () {
        var title = $('#example thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" onclick="stopPropagation(event);" placeholder="'+title+'" />' );
    } );
 
    // DataTable
var table = $('#example').DataTable( {
    orderCellsTop: true  ,
    dom: 'Bfrtip',
    buttons: [

        {
            extend: 'excel',
            className: 'fa  fa-arrow-circle-o-down fa-2x',
            text: 'Export Result Report',
            title: "{{date('d_F_Y_')}}"+'AIMS_SEARCH_REPORT'+"{{$PageName}}",
            //className: 'btn btn-primary'
        },       
        
       
    ],
} );
     
    // Apply the filter
    $("#example thead input").on( 'keyup change', function () {
        table
            .column( $(this).parent().index()+':visible' )
            .search( this.value )
            .draw();
    } );

  function stopPropagation(evt) {
    if (evt.stopPropagation !== undefined) {
      evt.stopPropagation();
    } else {
      evt.cancelBubble = true;
    }
  }
</script>
      
      

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        
        <!-- AdminLTE App -->
        <script src="{{URL::asset('js/AdminLTE/app.js')}}" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{URL::asset('js/AdminLTE/dashboard.js')}}" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="{{URL::asset('js/AdminLTE/demo.js')}}" type="text/javascript"></script>
      


           <!-- page script -->
  
	
    </body>
</html>
