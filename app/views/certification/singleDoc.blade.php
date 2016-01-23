@extends('layout')
@section('content')
	<section class='content contentWidth'>
		<div class='row col-md-12 hidden-print'>
				@if('true'==CommonFunction::hasPermission('edp_legal_opinion',Auth::user()->emp_id(),'entry'))
				<p class="text-center col-md-4">
				<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#addDoc">Add Document</button>
				</p>
				@endif
			
				@if('true'==CommonFunction::hasPermission('edp_approval',Auth::user()->emp_id(),'entry'))
				<p class="text-center col-md-4">
				<button class="btn btn-primary btn-block"   data-toggle="modal" data-target="#finding">Add Finding</button>
				</p>
				@endif
			
				@if('true'==CommonFunction::hasPermission('edp_approval',Auth::user()->emp_id(),'entry'))
				<p class="text-center col-md-4">
				<button class="btn btn-primary btn-block"   data-toggle="modal" data-target="#approvalForm">Approval</button>
				</p>
				@endif
		
 	</div>
 	<!--Document Details Table-->
		<div class="row" id="SMSDetails">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                   
							<div class="box-header table_toggle expand">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Document Details</h3> 
									<span class='hidden-print man pull-right'>-</span>
							</div>	
													 
              
					<div class="box-body">
				
					<div class='disNon'> 
					{{$num=0}}
					</div>	
                    <table class="table table-bordered">
				
				
                    <tbody>

					   <tr><td colspan="2">
					   									
							<span class='hidden-print'>
								@if('true'==CommonFunction::hasPermission('sia_sms',Auth::user()->emp_id(),'par_delete'))

									{{ HTML::linkAction('BaseController@permanentDelete', 'P.D',array('sia_sms','$info->id','sms'.'$info->id'), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_sms',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('BaseController@softDelete', 'S.D',array('sia_sms','$info->id','sms'.'$info->id'), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_sms',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('BaseController@approve', '',array('sia_sms','$info->id','sms'.'$info->id'), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('BaseController@notApprove', '',array('sia_sms','$info->id','sms'.'$info->id'), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_sms',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('BaseController@removeWarning', '',array('sia_sms','$info->id','sms'.'$info->id'), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('BaseController@warning', '',array('sia_sms','$info->id','sms'.'$info->id'), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_sms',Auth::user()->emp_id(),'update'))
									<a data-toggle="modal" data-target="#updateSms{{'$info->id'}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
								@endif
									
							</span>	

					   </td></tr>
				  
					  
					 
					   <tr><th class="col-md-3">Title</th><td>Title</td></tr>
					   <tr><th>Document</th><td><a href="#">Document</a></td></tr>
					   
					   <tr><th>Note</th><td>This is a demo note</td></tr>
					   <tr>
					   		<td colspan="2">
					   			Initialized By : Jibesh Chandra Mukherjee | Initialized at : 2015-12-17 23:33:10 | Last Updated By : Jibesh Chandra Mukherjee | Updated at : 2015-12-17 23:33:10
					   		</td>
					   		
					   </tr>
			
					
					</tbody>
				 
					 
					
					 
					</table>
				
					</div>
					
						
						</div>
					</div>
					
</div> 

 	<!--FInding Details Table-->
 	<div class="row" id="Findings">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							<div class="box-header table_toggle expand">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;'>Findings</h3>
									
									<div class="man pull-right" >-</div>									
									
							</div>	
							
										&nbsp &nbsp <a  class="hidden-print"href="#" style="color:green" data-toggle="modal" data-target="#finding">[Add Finding] </a> 
							
													 
                
					
					<div class="box-body">
					<div style="display: none;">
					{{$num=0;}}
					</div>		
                    <table class="table table-bordered">
                    <thead>

                    <tr><th>#</th><th>Finding No.</th><th>Title</th><th>Target Date</th><th>Mitigate?</th><th class='hidden-print'>Action</th></tr>
                    </thead>
				     <tbody>					   
						<tr>
							<td>1</td>
							<td>FN_42349302</td>
							<td>Doc is not properly oriented</td>
							<td>01-05-2016</td>
							<td>No</td>
							<td><a href={{URL::to('certification/singleFinding/FN_42349302')}}>View</a></td>
						</tr>
						
						
					</tbody>
					</table>
					</div>
						</div>
					</div>
					
</div> 
	<!--Approval Details Table-->
		<div class="row" id="SMSDetails">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                   
							<div class="box-header table_toggle expand">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Approval Details</h3> 
									<span class='hidden-print man pull-right'>-</span>
							</div>	
							&nbsp &nbsp <a  class="hidden-print"href="#" style="color:green" data-toggle="modal" data-target="#approvalForm">[Add Approval Info] </a> 						 
              
					<div class="box-body">
				
					<div class='disNon'> 
					{{$num=0}}
					</div>	
                    <table class="table table-bordered">
				
				
                    <tbody>

					   <tr><td colspan="2">
					   									
							<span class='hidden-print'>
								@if('true'==CommonFunction::hasPermission('sia_sms',Auth::user()->emp_id(),'par_delete'))

									{{ HTML::linkAction('BaseController@permanentDelete', 'P.D',array('sia_sms','$info->id','sms'.'$info->id'), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_sms',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('BaseController@softDelete', 'S.D',array('sia_sms','$info->id','sms'.'$info->id'), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_sms',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('BaseController@approve', '',array('sia_sms','$info->id','sms'.'$info->id'), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('BaseController@notApprove', '',array('sia_sms','$info->id','sms'.'$info->id'), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_sms',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('BaseController@removeWarning', '',array('sia_sms','$info->id','sms'.'$info->id'), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('BaseController@warning', '',array('sia_sms','$info->id','sms'.'$info->id'), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_sms',Auth::user()->emp_id(),'update'))
									<a data-toggle="modal" data-target="#updateSms{{'$info->id'}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
								@endif
									
							</span>	

					   </td></tr>
				  
					  
					 
					   <tr><th class="col-md-3">Approved By</th><td>Name</td></tr>
					   <tr><th>Designation</th><td>Designation</td></tr>
					   <tr><th>Approval Date</th><td>01 November 2016</td></tr>
					   
					   <tr><th>Note</th><td>This is a demo note</td></tr>
					   <tr>
					   		<td colspan="2">
					   			Initialized By : Jibesh Chandra Mukherjee | Initialized at : 2015-12-17 23:33:10 | Last Updated By : Jibesh Chandra Mukherjee | Updated at : 2015-12-17 23:33:10
					   		</td>
					   		
					   </tr>
			
					
					</tbody>
				 
					 
					
					 
					</table>
				
					</div>
					
						
						</div>
					</div>
					
</div> 
	</section>

 <!--Entry form -->
 <!--Add Document -->
 <div class="modal fade" id="addDoc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Document</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
				  
					{{Form::hidden('certificate_no','CER'.'_'.time())}}
					
					<div class="form-group required">
                                           
											{{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('title',' ', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>  
					<div class="form-group required">
                                           
											{{Form::label('document', 'Document', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('document',array('class' => '','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>     

					<div class="form-group ">
                                           
											{{Form::label('note', 'Note', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('note',' ', array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
											</div>
											
                    </div>           
					<div class="form-group">
                       
                            <button type="submit" name='saveAndContinue' value='' class="btn btn-primary btn-lg btn-block">Save</button>
                       
                    </div>
					</div>
					{{Form::close()}}
            </div>
        </div>
    </div>
</div>
<!--Add Finding-->
<div class="modal fade" id="finding" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Finding</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'surveillance/saveFinding','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>true))}}
				  
				{{Form::hidden('finding_number','FN'.'_'.time())}}
				{{Form::hidden('doc_no','')}}
			
					<div class="form-group required">
	                                       
											{{Form::label('finding_number', 'Finding  Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('finding_number_NR','FN'.'_'.time(), array('class' => 'form-control','placeholder'=>'','required'=>'','disabled'=>''))}}
											</div>
											
	                </div>
                	<div class="form-group required">
                                           
											{{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('title',' ', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                  
                    <div class="form-group required">
                                           
											{{Form::label('finding', 'Finding', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('finding','', array('required'=>'','class' => 'form-control','placeholder'=>'',''=>'','size'=>'4x1'))}}
											
											
											</div>
											
                    </div>
                    
					 <div class="form-group required">
	                                           
												{{Form::label('date', 'Target Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                    </div>	
					
					
					
					<div class="form-group ">
                                           
											{{Form::label('corrective_action_plan', 'Corrective Action Plan', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('corrective_action_plan','', array('class' => 'form-control','placeholder'=>'',''=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                           
											{{Form::label('upload_file', 'Upload File', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('upload_file',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}

											</div>
											
                    </div>
                   
					
					<div class="form-group">
                       
                            <button type="submit" name='' value='' class="btn btn-primary btn-lg btn-block">Save</button>
                       
                    </div>
					</div>
					{{Form::close()}}
            </div>
        </div>
    </div>
</div>
<!--Approval-->
<div class="modal fade" id="approvalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Approval Form</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => '', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					
				  
						
							{{Form::hidden('doc_no','')}}							
						
				
					
					
					
					<div class="form-group required">
                                        
											{{Form::label('approved_by', 'Approved By', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('approved_by', Auth::User()->getName() , array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('designation', 'Designation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											{{Form::text('designation', Auth::User()->Role() , array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group required">
                                           
											{{Form::label('approval_date', 'Approval Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														{{Form::select('approval_date', $dates , date('d') ,array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('approval_month', $months , date('F') ,array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('approval_year', $years , date('Y') ,array('class'=>'form-control','required'=>''))}}
														</div>
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('approval_note', 'Note', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('approval_note','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
											
                    </div>
					
                    <div class="form-group">
                      
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                    
					{{Form::close()}}
            </div>
        </div>
    </div>
	</div>
	</div>

@stop