@extends('layout')

@section('content')
<section class="content contentWidth">
<!--Menu-->
	<p class="text-center col-md-6">
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#forwardingForm" >Action Details</button>    
	</p>
	<p class="text-center col-md-6">
	    <button class="btn btn-primary btn-block " data-toggle="modal" data-target="#approvalForm" >Approval</button>	
	</p>

<!--Details of Reporting-->
	<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							<div class="box-header table_toggle expand">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Reporting Details</h3>	
									<div class="man pull-right">-</div>								
									
							</div>							 
                <!-- /.box-header -->
					
					<div class="box-body">
					<div class='disNon'>
					{{$num=0}}
					</div>	
                    <table class="table table-bordered">
				
				        <tbody>
						   <tr>
                               <th>									
								Title
							  </th>
                                <td>
									Title Of Report
								</td>
						   </tr>
							<tr>
                               <th>									
								Date
							  </th>
                                <td>
									01 January 2015
								</td>
						   </tr>
						   <tr>
                               <th>									
								Email of Reporter
							  </th>
                                <td>
									example@caab.com
								</td>
						   </tr>
						   <tr>
						   		<th>									
						  		  Reporting Details
						 		 </th>
                               
                                <td>
									Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of 

									type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
								</td>
							</tr>
							<tr>
								<th>
									Document
								 </th>
								<td>
									Document
								</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    </div>
                    </div>
    </div>
<!--Action-->
	<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							<div class="box-header table_toggle expand">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Action Details</h3>	
									<div class="man pull-right">-</div>								
									
							</div>							 
                <!-- /.box-header -->
					
					<div class="box-body">
					
                    <table class="table table-bordered">
				     
				        <tbody>
				        	<tr><td colspan="4">
									
								<span class='hidden-print'>
								@if('true'==CommonFunction::hasPermission('sia_approval',Auth::user()->emp_id(),'par_delete'))

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sia_approval','$info->id'), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_approval',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sia_approval','$info->id'), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_approval',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('AircraftController@approve', '',array('sia_approval','$info->id'), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('sia_approval','$info->id'), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_approval',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('sia_approval','$info->id'), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('sia_approval','$info->id'), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_approval',Auth::user()->emp_id(),'update'))
									<a data-toggle="modal" data-target="#approvalForm" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
								@endif
									
							</span>	

                    </td></tr>	
						   <tr>
						   		<th>									
						  		  Action Details
						 		 </th>
                               
                                <td>
									Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of 

									type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
								</td>
							</tr>
							<tr>
								<th>
									Document
								 </th>
								<td>
									Document
								</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    </div>
                    </div>
    </div>
<!--Approval-->
	<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							<div class="box-header table_toggle expand">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Approval Details</h3>	
								
									<div class="man pull-right">-</div>								
									
							</div>							 
                <!-- /.box-header -->
					
					<div class="box-body">
						
                    <table class="table table-bordered">
					 <thead>
					 	<tr><td colspan="4">
									
								<span class='hidden-print'>
								@if('true'==CommonFunction::hasPermission('sia_approval',Auth::user()->emp_id(),'par_delete'))

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sia_approval','$info->id'), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_approval',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sia_approval','$info->id'), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_approval',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('AircraftController@approve', '',array('sia_approval','$info->id'), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('sia_approval','$info->id'), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_approval',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('sia_approval','$info->id'), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('sia_approval','$info->id'), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_approval',Auth::user()->emp_id(),'update'))
									<a data-toggle="modal" data-target="#approvalForm" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
								@endif
									
							</span>	

                    </td></tr>	
				      	<tr><th>Approved By</th><th>Designation</th><th>Approval Date</th><th>Note</th></tr>
				      </thead>
				        <tbody>
						  <tr>
						  	<td>Name NF</td><td>Admin</td><td>01 January 2015</td><td>Note example</td></tr>
						  </tr>
                        </tbody>
				    </table>
                    </div>
                    </div>
                    </div>
    </div>
</section>

<!--Entry Form-->
@include('voluntaryReporting/entryForm')
@yield('approvalForm')
@stop