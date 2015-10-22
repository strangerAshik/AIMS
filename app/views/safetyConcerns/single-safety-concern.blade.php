@extends('layout')
@section('content')

<span style='display:none'>
{{$role=Auth::User()->Role()}}
</span>
<style>
	
</style>
<section class='content widthController'>        
						
				
				
	@foreach($safetyConcernDatas as $sc)
	@include('safetyConcerns.menu')
	@if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'entry'))
	@yield('menuSingleSafetyConcern')	
	@endif
	@endforeach
	<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							<div class="box-header table_toggle expand">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >SC Summary</h3>	
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
									Approval Status
								</th>
                                <td>
									@if($approvalInfos)
										Approved
									@else
										Not Approved Yet
									@endif
								</td>
                            </tr>
							<tr>
                                <th>									
									Inspector
								</th>
                                <td>
								@if($lastAssignedPerson)
									
										{{$lastAssignedPerson->forwarding_to}}
									
								@else
									@foreach($safetyConcernDatas as $sc)
										{{$sc->assigned_inspector}}
									@endforeach
								@endif
								</td>
                            </tr>
						
							<tr>
                                <th>									
									Corrective Action
								</th>
                                <td>@if($correctiveActions)
										Some Corrective Action Is Given.
									@else
										No Corrective Action Is Given.
									@endif</td>
                            </tr>
							<tr>
                                <th>									
									Legal Opinion
								</th>
                                <td>
								@foreach($legalOpinions as $opinion)
								@if($legalOpinions)
										Some Legal Opinion Is Given.
								@else
									No Legal Opinion Is Given.
								@endif
								@endforeach
								</td>
                            </tr>
							<tr>
                                <th>									
									Remaining Day('s)
								</th>
                                <td>
								@foreach($safetyConcernDatas as $sc)
								{{CommonFunction::remaingDay($sc->target_date)}} days
								@endforeach
								</td>
                            </tr>
							
						</tbody>
					 
					 
					
					 
					</table>
					</div>
						</div>
					</div>
					
	</div>
	@foreach($safetyConcernDatas as $sc)
	<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							<div class="box-header table_toggle expand">
									<h3 class="box-title" style='color:#367FA9;font-weight:bold;'>
									 {{$sc->safety_issue_number}}: Description
									</h3>	
									<div class="man pull-right">-</div>			
						
							
					
							</div>							 
                <!-- /.box-header -->
				
					<div class="box-body">
				
                    <table class="table table-bordered">
                        <tbody>
						    <tr>                
								<td colspan='2'>
									@if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'par_delete'))
										{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sc_safety_concern',$sc->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
									@endif
									@if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'sof_delete'))
										{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sc_safety_concern',$sc->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
								    @endif
									@if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'update'))
										 <a data-toggle="modal" data-target="#editIssueSafety{{$sc->id}}" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
									@endif
								</td>
						    </tr>
						    <tr>
                                <th>								
									SIA Number
								</th>
                                <td>{{$sc->sia_number}}</td>
                            </tr>
                                            
							<tr>
                                <th>									
									SC Number
								</th>
                                <td>{{$sc->safety_issue_number}}</td>
                            </tr>                                          
							
                            <tr>
                                <th>Finding Number</th>
                                <td>{{$sc->finding_number}}</td>
                            </tr>
                            <tr>
                                <th>Inspector Observation</th>
                                <td>{{$sc->inspector_observation}}</td>
                            </tr>
                           
							 
                            <tr>
                                <th>Safety Concern</th>
                                <td>{{$sc->safety_concern}}</td>
                            </tr>
                            <tr>
                                <th>Safety Concern related to CE</th>
                                <td>{{$sc->sc_critical_element}}</td>
                            </tr>
                            <tr>
                                <th>Safety Concern related to Critical Area</th>
                                <td>{{$sc->sc_area}}</td>
                            </tr>
                            <tr>
                                <th>Type Of Concern</th>
                                <td>{{$sc->type_of_concern}}</td>
                            </tr>
                            
                            <tr>
                                <th>Type of Issue</th>
                                <td>{{$sc->type_of_issue}}</td>
                            </tr>
                            <tr>
                                <th>Violation of Regulation / Best Practice</th>
                                <td>{{$sc->best_practice}}</td>
                            </tr>
                            <tr>
                                <th>POI/PAI/Responsible</th>
                                <td>{{$sc->poi_or_responsible}}</td>
                            </tr>
                            <tr>
                                <th>Issue Finding Date</th>
                                <td>{{date('d F Y',strtotime($sc->issue_finding_date))}}</td>
                            </tr>                            
                            <tr>
                                <th>Issue Finding Local Time</th>
                                <td>{{$sc->issue_finding_local_time}}</td>
                            </tr>                        
                            <tr>
                                <th>Place / Airport</th>
                                <td>{{$sc->place_or_airport}}</td>
                            </tr>                
                            <tr>
                                <th>Responsible PELs</th>
                                <td>{{$sc->responsible_pels}}</td>
                            </tr>              
                            <tr>
                                <th>Aircraft MMS</th>
                                <td>{{$sc->aircraft_msn}}</td>
                            </tr>         
                            <tr>
                                <th>Aircraft Rgistration Number</th>
                                <td>{{$sc->aircraft_rgistration_number}}</td>
                            </tr>    
                            <tr>
                                <th>Corrective Priority</th>
                                <td>{{$sc->corrective_priority}}</td>
                            </tr>
                            <tr>
                                <th>Target Date</th>
                                <td>{{date('d F Y',strtotime($sc->target_date))}}</td>
                            </tr>
                            
                            <tr>
                                <th>Witness Statement</th>
                                <td>{{$sc->witness_statement}}</td>
                            </tr>
                            <tr>
                                <th>Uploaded Evidence</th>
                                <td>
                                	@if($sc->upload_evidence!='Null'){{HTML::link('files/safety_consern/'.$sc->upload_evidence,'Document',array('target'=>'_blank'))}}
									@else
										{{HTML::link('#','No Document Provided')}}
									@endif

                                </td>
                            </tr>
                            <tr>
                                <th>Uploaded Checklist</th>
                                <td>
                                	@if($sc->upload_checklist!='Null'){{HTML::link('files/safety_consern/'.$sc->upload_checklist,'Document',array('target'=>'_blank'))}}
									@else
										{{HTML::link('#','No Document Provided')}}
									@endif

                                </td>
                            </tr>
                            <tr>
                                <th>Question</th>
                                <td>{{$sc->question}}</td>
                            </tr>
                            <tr>
                                <th>Answer</th>
                                <td>{{$sc->answer}}</td>
                            </tr>
                            <tr>
                                <th>Risk Statement</th>
                                <td>{{$sc->risk_statement}}</td>
                            </tr>
                            <tr>
                                <th>Risk Probability</th>
                                <td>{{$sc->risk_Probability}}</td>
                            </tr>
                            <tr>
                                <th>Risk Severity</th>
                                <td>{{$sc->risk_severity}}</td>
                            </tr>
                            <tr>
                                <th>Severity Statement</th>
                                <td>{{$sc->cvr_statement}}</td>
                            </tr>
                            <tr>
                                <th>Risk Assessment from Matrix Index</th>
                                <td>{{$sc->risk_assesment_from_matrix}}</td>
                            </tr>
                            <tr>
                                <th>Determine Risk & Type of Action</th>
                                <td>{{$sc->risk_action}}</td>
                            </tr>
                            <tr>
                                <th>Risk Management</th>
                                <td>{{$sc->risk_management}}</td>
                            </tr>
                            
                          
                        </tbody>
                    </table>
				
                </div>
                <!-- /.box-body -->
                               
                            </div><!-- /.box -->
						</div>
						
	</div>
				
	@endforeach
				
				
	<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							<div class="box-header table_toggle expand">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Corrective Action</h3>
									<div class="man pull-right">-</div>												
							</div>							 
                <!-- /.box-header -->
					
					<div class="box-body">
				
                    <table class="table table-bordered">
					@if($correctiveActions)
					@foreach($correctiveActions as $action)
					<div class='disNon'>
					{{$num=0}}
					</div>
                        <tbody>
						    <tr>               
								<th colspan='2' style='color:#72C2E6'>Corrective Action #{{++$num}}

									 @if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'par_delete'))
										{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sc_corrective_action',$action->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
									 @endif
									 @if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'sof_delete'))
										{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sc_corrective_action', $action->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
									 @endif
										
									
									 @if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'update'))
										 <a data-toggle="modal" data-target="#editCorrectiveIssue{{$action->id}}" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
									 @endif
								</th>
								
						    </tr>               
							<tr>
                                <th>									
									Corrective Action
								</th>
                                <td>{{$action->currective_action}}</td>
                            </tr>
                            
                            <tr>
                                <th>Revived Date</th>
                                <td>{{$action->revived_date.' '.$action->revived_month.' '.$action->revived_year}}</td>
                            </tr>
                            <tr>
                                <th>Concern Authority Officer</th>
                                <td>{{$action->concern_authority_officer}}</td>
                            </tr>
                            <tr>
                                <th>Regulation Mitigation</th>
                                <td>{{$action->regulation_mitigation}}</td>
                            </tr>
							 <tr>
                                <th>Revived Date</th>
                                <td>{{$action->regulation_mitigation_date.' '.$action->regulation_mitigation_month.' '.$action->regulation_mitigation_year}}</td>
                            </tr>
							 <tr>
                                <th>Job Aid File</th>
                                <td>
								@if($action->corrective_action_file!='Null'){{HTML::link('files/sc_corrective_action_file/'.$action->corrective_action_file,'Document',array('target'=>'_blank'))}}
								@else
									{{HTML::link('#','No Document Provided')}}
								@endif
								</td>
                            </tr>
						</tbody>
					 @endforeach
					 @else
						 <tbody>
							<tr>
								<td colspan='2'>
								No Corrective Action Given Yet!!
								</td>
							</tr>
						 </tbody>
					 @endif
					 
					</table>
					</div>
						</div>
					</div>
					
						
					
					
	</div>
	<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							<div class="box-header table_toggle expand">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Finalization Info</h3>
									<div class="man pull-right">-</div>												
							</div>							 
                <!-- /.box-header -->
					
					<div class="box-body">
				
                    <table class="table table-bordered">
					@if($finalization)
					@foreach($finalization as $info)
					<div class='disNon'>
					{{$num=0}}
					</div>
                        <tbody>
						    <tr>               
								<th colspan='2' style='color:#72C2E6'>

									 @if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'par_delete'))
										{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sc_finalization',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
									 @endif
									 @if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'sof_delete'))
										{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sc_finalization', $info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
									 @endif
										
									
									 @if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'update'))
										 <a data-toggle="modal" data-target="#updatefinzalization{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
									 @endif
								</th>
								
						    </tr>               
							<tr>
                                <th>									
									Final Resolution Date
								</th>
                                <td>{{date('d F Y', strtotime($info->final_resolution_date))}}</td>
                            </tr>
                            
                            <tr>
                                <th>Final Inspector</th>
                                <td>{{$info->final_inspector}}</td>
                            </tr>
                            <tr>
                                <th>Final Method</th>
                                <td>{{$info->final_method}}</td>
                            </tr>
                            <tr>
                                <th>Residual Risk</th>
                                <td>{{$info->residual_risk}}</td>
                            </tr>
                            <tr>
                                <th>Status/ Result</th>
                                <td>{{$info->status_result}}</td>
                            </tr>
                            <tr>
                                <th>EDP Number</th>
                                <td>{{$info->edp_number}}</td>
                            </tr>
                            <tr>
                                <th>Closing Note</th>
                                <td>{{$info->closing_note}}</td>
                            </tr>
							 
						</tbody>
					 @endforeach
					 @else
						 <tbody>
							<tr>
								<td colspan='2'>
								Not Finalized!!
								</td>
							</tr>
						 </tbody>
					 @endif
					 
					</table>
					</div>
						</div>
					</div>
					
						
					
					
	</div>
				
	<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							<div class="box-header table_toggle expand">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Approval Information</h3>									
									<div class="man pull-right">-</div>			
									
							</div>							 
                <!-- /.box-header -->
					
					<div class="box-body">
					<div class='disNon'>
					{{$num=0}}
					</div>	
                    <table class="table table-bordered">
					@if($approvalInfos)
					@foreach($approvalInfos as $info)
                        <tbody>
						    <tr>               
								<th colspan='2' style='color:#72C2E6'>Approval Info. #{{++$num}}
									 @if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'par_delete'))
										{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sc_approval_info',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
									 @endif
									 @if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'sof_delete'))
										{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sc_approval_info',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
									 @endif
									@if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'update'))
										 <a data-toggle="modal" data-target="#editapprovalInfos{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
									 @endif
								</th>
								
						    </tr>        
							<tr>
                                <th>									
									Approved By
								</th>
                                <td>{{$info->approved_by}}</td>
                            </tr>
							<tr>
                                <th>									
									Designation
								</th>
                                <td>{{$info->designation}}</td>
                            </tr>
							<tr>
                                <th>									
									Approval Date
								</th>
                                <td>{{$info->approval_date.' '.$info->approval_month.' '.$info->approval_year}}</td>
                            </tr>
                            
                            <tr>
                                <th>Approval Note</th>
                                <td>{{$info->approval_note}}</td>
                            </tr>
                          
						</tbody>
					 @endforeach
					 @else
						 <tbody>
							<tr>
								<td colspan='2'>
								Not Approved Yet!!
								</td>
							</tr>
						 </tbody>
					 @endif
					 
					</table>
					</div>
						</div>
					</div>
				
	</div>
	<div class="row disNon" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							<div class="box-header table_toggle expand">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Legal Opinion</h3>
									<div class="man pull-right">-</div>												
									
							</div>							 
                <!-- /.box-header -->
					
					<div class="box-body">
					<div class='disNon'>
					{{$num=0}}
					</div>	
                    <table class="table table-bordered">
					@if($legalOpinions)
					@foreach($legalOpinions as $opinion)
                        <tbody>
						    <tr>               
								<th colspan='2' style='color:#72C2E6'>Legal Opinion #{{++$num}}
									 @if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'par_delete'))
										{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sc_legal_openion',$opinion->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
									 @endif
									 @if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'sof_delete'))
										{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sc_legal_openion',$opinion->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
									 @endif
									@if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'update'))
										 <a data-toggle="modal" data-target="#updatelegalOpenion{{$opinion->id}}" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
									 @endif
								</th>
								
						    </tr>        
							<tr>
                                <th>									
									Legal Opinion
								</th>
                                <td>{{$opinion->legal_openion}}</td>
                            </tr>
							<tr>
                                <th>									
									Author Of Legal Opinion
								</th>
                                <td>{{$opinion->row_creator}}</td>
                            </tr>
							<tr>
                                <th>									
									Given at [Date and Time]
								</th>
                                <td>{{$opinion->created_at}}</td>
                            </tr>
							
						</tbody>
					 @endforeach
					 @else
						 <tbody>
							<tr>
								<td colspan='2'>
								No Legal Opinion Written Yet!!
								</td>
							</tr>
						 </tbody>
					 @endif
					 
					</table>
					</div>
						</div>
					</div>
					
	</div>
				
	<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							<div class="box-header table_toggle expand">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >RSC Record Of History</h3>
									<div class="man pull-right">-</div>												
							</div>							 
                <!-- /.box-header -->
					
					<div class="box-body">
				
                    <table class="table table-bordered">
				
					
                        <tbody>
						                 
							
							<tr>
                                <th>Date</th><th>Name</th><th>Designation</th><th>Forwarding Note</th>
								@if('true'==CommonFunction::hasPermission('safety_concern',Auth::user()->emp_id(),'update'))
                                <th>Edit</th><th>P. Delete</th><th>S. Delete</th>
                                @endif
                                
                            </tr>
							
							@foreach($safetyConcernDatas as $sc)
							
							<tr>
                                <td>{{$sc->created_at}}</td><td>{{$sc->assigned_inspector}}</td><td>Inspector</td><td>SC Initialize</td>
                                
                            </tr>
							
                            @endforeach
							@foreach($forwardings as $forwarding)
							
							<tr>
                                <td>{{$forwarding->forwarding_date}}</td>
								<td>{{$forwarding->forwarding_to}}</td>
								<td>{{$forwarding->designation}}</td>
								<td>{{$forwarding->forwarding_note}}</td>
								@if('true'==CommonFunction::hasPermission('safety_concern',Auth::user()->emp_id(),'update'))
								<td>
								<a data-toggle="modal" data-target="#editForwardings{{$forwarding->id}}" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
								</td>
								<td>{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sc_forwarding',$forwarding->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}</td>
								<td>
								{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sc_forwarding',$forwarding->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
								</td>
								@endif
                                
                            </tr>
							
                            @endforeach
						</tbody>
					
					
					 
					</table>
					</div>
						</div>
					</div>
						
	</div>
				
              
	</section>
	
			@include('safetyConcerns.entryForm')
				@yield('issueSafety')
				@yield('correctiveIssue')
				@yield('forwardingForm')
				@yield('finzalization')
				@yield('approvalForm')
				@yield('legalOpenion')
				
			@include('safetyConcerns.editForm')			
				@yield('editIssueSafety')
				@yield('editCorrectiveIssue')										
				@yield('updateApprovalForm')
				@yield('updateForwardingForm')
				@yield('updatelegalOpenion')
				@yield('updatefinzalization')
	
@stop
