@extends('layout')
@section('content')
<section class="content widthController">
<div class='row col-md-12 hidden-print'>
				@if('true'==CommonFunction::hasPermission('edp_legal_opinion',Auth::user()->emp_id(),'entry'))
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#correctiveAction">Add Corrective Action</button>
				</p>
				@endif
			
				@if('true'==CommonFunction::hasPermission('edp_approval',Auth::user()->emp_id(),'entry'))
				<p class="text-center col-md-6">
				<button class="btn btn-primary btn-block"   data-toggle="modal" data-target="#approvalForm">Approval</button>
				</p>
				@endif
		
 	</div>
<div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Finding Details</h3>

                                </div><!-- /.box-header -->
                                  
                                <div class="box-body">
								
								<div style="display:none">{{$num=0;}}</div>
														
									
                                    <table class="table table-bordered">
                                    
									<tbody>
									
									
                                   <tr id="{{'$info->id'}}">               
								<th colspan='2' style='color:#72C2E6'>Finding #{{++$num}}
								<span  class='hidden-print'>
									@if('true'==CommonFunction::hasPermission('sia_add_finding',Auth::user()->emp_id(),'par_delete'))
										{{ HTML::linkAction('BaseController@permanentDelete', 'P.D',array('sia_findings','$info->id','$info->id'), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									 @endif
									 @if('true'==CommonFunction::hasPermission('sia_add_finding',Auth::user()->emp_id(),'sof_delete'))
										{{ HTML::linkAction('BaseController@softDelete', 'S.D',array('sia_findings',' $info->id','$info->id'), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									 @endif
										
									
									 @if('true'==CommonFunction::hasPermission('sia_add_finding',Auth::user()->emp_id(),'update'))
										 <a data-toggle="modal" data-target="#updateFindings{{'$info->id'}}" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
									 @endif
									 </span>

								</th>
								
						    </tr> 

                                      
                                        <tr>
                                           
                                            <td class="col-md-4">Finding Number</td>
                                            <td >FN_9050329</td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="col-md-4">Title</td>
                                            <td >TItle Of Finding</td>
                                        </tr>
                                     

										<tr>
                                           
                                            <td>Finding</td>
                                            <td>Finding issue</td>
                                            
                                        </tr>
										<tr>
                                           
                                            <td>Target Date</td>
                                            <td>10/10/2015</td>
                                            
                                        </tr> 
										<tr>
                                            <td>Corrective Action Plan</td>
                                            <td>Corrective Action Plan Corrective Action PlanCorrective Action Plan</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Document</td>
                                            <td>
				                               <a href="#">Document</a>
											</td>
                                        </tr>
                                        <tr>
									   		<td colspan="2">
									   			<i>Initialized By : AMIS DB ADMIN | Initialized at : 2016-01-11 14:32:37 | Last Updated By : AMIS DB ADMIN | Updated at : 2016-01-11 14:32:37</i>
									   		</td>
									   		
									   	</tr>
                                        
                                      
										<tr>
                                           <th colspan='2' style='color:green'>Corrective Action Details
                                          <span class='hidden-print'>
									 @if('true'==CommonFunction::hasPermission('sia_corrective_action',Auth::user()->emp_id(),'par_delete'))
										{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sia_corrective_action','$corr->id'), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
									 @endif
									 @if('true'==CommonFunction::hasPermission('sia_corrective_action',Auth::user()->emp_id(),'sof_delete'))
										{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sia_corrective_action', '$corr->id'), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
									 @endif
								@if('true'==CommonFunction::hasPermission('sia_corrective_action',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('AircraftController@approve', '',array('sia_corrective_action','$corr->id'), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('sia_corrective_action','$corr->id'), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
									@if('true'==CommonFunction::hasPermission('sia_corrective_action',Auth::user()->emp_id(),'worning'))	
										{{ HTML::linkAction('AircraftController@removeWarning', '',array('sia_corrective_action','$corr->id'), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
										{{ HTML::linkAction('AircraftController@warning', '',array('sia_corrective_action','$corr->id'), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
									@endif
										
									
									 @if('true'==CommonFunction::hasPermission('sia_corrective_action',Auth::user()->emp_id(),'update'))
										 <a data-toggle="modal" data-target="#updateCorrectiveIssue{{'$corr->id'}}" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
									 @endif
									 </span>
								</th>
                                        </tr>
                  
										<tr>
                                            <td>Corrective Action</td>
                                            <td></td>
                                        </tr>
										<tr>
                                            <td>Revived Date</td>
                                            <td></td>
                                        </tr>
										<tr>
                                            <td>Concern Authority Officer</td>
                                            <td></td>
                                        </tr>
										<tr>
                                            <td>Regulation Mitigation</td>
                                            <td></td>
                                        </tr>
										<tr>
                                            <td>Regulation Mitigation Date</td>
                                            <td></td>
                                        </tr>
										<tr>
                                            <td>Document</td>
                                            <td>
				                                <a href="">Document</a>
											</td>
                                        </tr>
                                        <tr>
									   		<td colspan="2">
									   			<i>Initialized By : AMIS DB ADMIN | Initialized at : 2016-01-11 14:32:37 | Last Updated By : AMIS DB ADMIN | Updated at : 2016-01-11 14:32:37</i>
									   		</td>
									   		
									   	</tr>
                                     
                                    </tbody></table>
								
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
                             @include('common')
                                    @yield('print')
</div>   

</section>
<!--Entry start-->
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


<!--Corrective Action-->
<div class="modal fade" id="correctiveAction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Corrective Action</h4>
            </div>

            <div class="modal-body">
                
               
				{{Form::open(array('url' => '#', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form','files'=>true))}}
					
						
								{{Form::hidden('certificate_no','')}}					
								{{Form::hidden('finding_number','')}}					
						
					
						
					
					<div class="form-group required ">
                                        
											{{Form::label('currective_action', 'Corrective Action', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('currective_action','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1','required'=>''))}}
											</div>
											
                    </div>
					
					<div class="form-group ">
                                           
											{{Form::label('revived_date', 'Revived Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														{{Form::select('revived_date', $dates,'0',array('class'=>'form-control',''=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('revived_month',$months,'0',array('class'=>'form-control',''=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('revived_year',$years,'0',array('class'=>'form-control',''=>''))}}
														</div>
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('concern_authority_officer', 'Concern Authority Officer', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('concern_authority_officer','', array('class' => 'form-control','placeholder'=>'',''=>''))}}
											</div>
											
                    </div>
					<div class="form-group  ">
                                        
											{{Form::label('regulation_mitigation', 'Resolution /Mitigation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('regulation_mitigation','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1',''=>''))}}
											</div>
											
                    </div>
					
					
					<div class="form-group ">
                                           
											{{Form::label('regulation_mitigation_date', 'Resolution / Mitigation Date', array('class' => 'col-xs-4 control-label'))}}
											<div class="row">
														<div class="col-xs-2">
														{{Form::select('regulation_mitigation_date', $dates,'0',array('class'=>'form-control',''=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('regulation_mitigation_month',$months,'0',array('class'=>'form-control',''=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('regulation_mitigation_year',$years,'0',array('class'=>'form-control',''=>''))}}
														</div>
													</div>
											
                    </div>
					<div class="form-group ">
                                           
                                            
											 {{ Form::label('corrective_action_file', 'Upload Corrective Action File: ',array('class'=>'control-label col-xs-4')) }}
											 <div class="col-xs-6">
											 {{ Form::file('corrective_action_file',array("accept"=>"image/*,application/pdf",'class'=>'fileupload')) }}
											 
											 
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
	<script>
	$(document).ready(function(){
$('#').selectize();
	
});
	</script>
@stop