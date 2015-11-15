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
	   <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     
       
       

	
	<!-- End On-Line--->
	   <!--off Line
	  
	   {{ HTML::style('css/onlineLinks/bootstrap.min.css') }}
	   {{ HTML::style('css/onlineLinks/font-awesome.min.css') }}      
	   {{ HTML::style('css/onlineLinks/ionicons.min.css') }}
	   <script src="{{URL::asset('css/onlineLinks/jquery.min.js')}}" type="text/javascript"></script>
		
		End Off Line--->
        <!-- Morris chart -->
		{{ HTML::style('css/morris/morris.css') }}
		
		
		
        <!-- jvectormap -->
        
		{{ HTML::style('css/jvectormap/jquery-jvectormap-1.2.2.css') }}
        
        <!-- bootstrap wysihtml5 - text editor -->
        
		{{ HTML::style('css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}
        <!-- Theme style -->
       
		{{ HTML::style('css/AdminLTE.css') }}
		<!--Datatable-->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
		
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>

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
 <!--Text Area Customaize
 <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> 
      <script type="text/javascript">
    //<![CDATA[
            bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
      //]]>
      </script>-->

        <script type="text/javascript">
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

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
			  
            </aside><!-- /.right-side -->
			
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

		<script type="text/javascript">
    



</script> 
<!--table toggle-->
<style type="text/css">
    .man{font-size: 40px;color:#367FA9;margin-right:60px;}
    .table_toggle{cursor: pointer;}
</style>

<script type="text/javascript">
//table toggle
 $('.table_toggle').click(function(){
      $(this).find('.man').text(function(_, value){return value=='-'?'+':'-'});
    $(this).nextUntil('tr.header').slideToggle(500, function(){
    });
});
// end table toggle
//Autofill according prev

  $('#trakingNumber').on('change',function(e){
        console.log(e);
        var siaNum=e.target.value;
       
        //ajax
        $.get('findingNumbers/' +siaNum,{
            siaNum: siaNum,
        },function(data){
            //success data
            //console.log(data);
            
            $('#finding_number_sc').empty();
            if(data==''){
                    $('#finding_number_sc').append('<option value="#">'+'No Finding Found'+'</option>');
            }
             else{
                $.each(data,function(index,data){
                    $('#finding_number_sc').append('<option value="'+data+'">'+data+'</option>');
                })
            }
        
            
        })
    })
//for edp finding
 $('#sia_edp').on('change',function(e){
        console.log(e);
        var siaNum=e.target.value;
       
        //ajax
        $.get('findingNumbers/' +siaNum,{
            siaNum: siaNum,
        },function(data){
            //success data
            //console.log(data);
            
            $('#finding_number_edp').empty();
            if(data==''){
                    $('#finding_number_edp').append('<option value="#">'+'No Finding Found'+'</option>');
            }
             else{
                $.each(data,function(index,data){
                    $('#finding_number_edp').append('<option value="'+data+'">'+data+'</option>');
                })
            }
        
            
        })
    })

//for Sc number of EDP
 
  $('#finding_number_edp').on('change',function(e){
        console.log(e);
        var findingNum=e.target.value;
        var siaNum=$('#sia_edp').val();
       
        //ajax
        //alert(siaNum)
        $.get('scNumbers/' +siaNum+'/'+findingNum,{
            siaNum: siaNum,
            findingNum: findingNum,
        },function(data){
            //success data
            //console.log(data);
            
            $('#sc_number_edp').empty();
            if(data==''){
                    $('#sc_number_edp').append('<option value="#">'+'No SC Found'+'</option>');
            }
             else{
               // $('#finding_number_edp').append("<option value='hello'>--Select Sc--</option>");
                $.each(data,function(index,data){
                   //$('#finding_number_edp').append("<option value='hello'>--Select Sc--</option>");
                    $('#sc_number_edp').append('<option value="'+data+'">'+data+'</option>');
                })
            }
        
            
        })
    })

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $('#example thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
</script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
		
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="{{ URL::asset('js/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="{{ URL::asset('js/plugins/sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="{{URL::asset('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{URL::asset('js/plugins/jqueryKnob/jquery.knob.js')}}" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="{{URL::asset('js/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="{{URL::asset('js/plugins/datepicker/bootstrap-datepicker.js')}}" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{URL::asset('js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="{{URL::asset('js/plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="{{URL::asset('js/AdminLTE/app.js')}}" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{URL::asset('js/AdminLTE/dashboard.js')}}" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="{{URL::asset('js/AdminLTE/demo.js')}}" type="text/javascript"></script>
      

           <!-- page script -->
    
	
    </body>
</html>
