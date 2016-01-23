@extends('layout')
@section('content')


<section class='content widthController'> 
<?php $sia_number='';?>       
					<div class="row" >
						<div class="col-md-12 " style="/*position: fixed; z-index: 999999*/">
						&nbsp &nbsp <a  class="hidden-print" href="#scDescription" style="color:green" >[ SC Description] </a>

						&nbsp &nbsp <a  class="hidden-print" href="#correctiveAction" style="color:green" >[ Corrective Action] </a> 

						&nbsp &nbsp <a  class="hidden-print" href="#finalization" style="color:green" >[ Finalization] </a> 

						&nbsp &nbsp <a  class="hidden-print" href="#approval" style="color:green" >[ approval] </a> 
						</div>
					</div>
	

	@foreach($safetyConcernDatas as $sc)
	<!--Menu-->				
	<span class='hidden-print disNon'>
		@if('true'==CommonFunction::hasPermission('sc_followup',Auth::user()->emp_id(),'access'))
		<p class="text-center col-md-6">
		{{ HTML::linkAction('safetyConcernsController@followUp', 'Follow up',array('safety_issue_number'=>$sc->safety_issue_number ), array('class' => 'btn btn-primary btn-block')) }}
		</p>
		@endif
		@if('true'==CommonFunction::hasPermission('sc_forwarding',Auth::user()->emp_id(),'access'))
		<p class="text-center col-md-6">
		    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#forwardingForm" >Forwarding</button>    
		</p>
		@endif
		@if('true'==CommonFunction::hasPermission('sc_corrective_action',Auth::user()->emp_id(),'access'))
		<p class="text-center col-md-6">
		    <button class="btn btn-primary btn-block " data-toggle="modal" data-target="#correctiveIssue" >Add New Corrective Action</button>	
		</p>
		@endif
		
		<p class="text-center disNon">
		    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#legalOpenion" >Opinion Of Legal Department</button> 
		</p>
		@if('true'==CommonFunction::hasPermission('sc_finalization',Auth::user()->emp_id(),'access'))
		<p class="text-center col-md-6">
		    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#finzalization" >Finalization</button>  
		</p>
		@endif
		@if('true'==CommonFunction::hasPermission('sc_approval',Auth::user()->emp_id(),'access'))
		<p class="text-center col-md-6">
		    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#approvalForm" >Approval</button>    
		</p>
		@endif
		</span>
	<!--End Menu-->
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
                                <th class="col-md-3">									
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
									Remaining Day('s)
								</th>
                                <td>
								@foreach($safetyConcernDatas as $sc)
								<?php $day=CommonFunction::remaingDay($sc->target_date);?>
								@if($day<0)
									<span style="color: red">{{$day}} day(s)</span>
								@else 
									<span style="color: green">{{$day}} day(s)</span>
								@endif
							
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
	<div class="row" id="scDescription">
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
						    <tr class='hidden-print'>                
								<td colspan='2'>
									@if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'par_delete'))
										{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sc_safety_concern',$sc->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									@endif
									@if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'sof_delete'))
										{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sc_safety_concern',$sc->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
								    @endif
									@if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'update'))
										 <a data-toggle="modal" data-target="#editIssueSafety{{$sc->id}}" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
									@endif
								</td>
						    </tr>
						    <tr>
                                <th class="col-md-3">								
									SIA Number
								</th>
                                <td>{{$sia_number=$sc->sia_number}}</td>
                            </tr>
                                            
							<tr>
                                <th>									
									SC Number
								</th>
                                <td>{{$sc->safety_issue_number}}</td>
                            </tr>                                          
							
                            <tr>
                                <td class="col-md-4">Title</td>
                                <td >{{$sc->title}}</td>
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
                                <td>
									@if($elements=CommonFunction::updateMultiSelection('sc_safety_concern', 'id',$sc->id,'sc_critical_element'))
                                               @if($elements!=null)
                                                    @foreach($elements as $key=>$value)
                                                        {{$value}},
                                                    @endforeach
                                               
                                                @endif
					                @else
					                    No CE Added!!
					                @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Safety Concern related to Critical Area</th>
                                <td>
									@if($elements=CommonFunction::updateMultiSelection('sc_safety_concern', 'id',$sc->id,'sc_area'))
                                               @if($elements!=null)
                                                    @foreach($elements as $key=>$value)
                                                        {{$value}},
                                                    @endforeach
                                               
                                                @endif
					                @else
					                    No Area Added!!
					                @endif
                                </td>
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
                           
                            <tr class="smsBackground">
                                <th>Risk Statement</th>
                                <td>{{$sc->risk_statement}}</td>
                            </tr>
                            <tr class="smsBackground">
                                <th>Risk Probability</th>
                                <td>{{$sc->risk_Probability}}</td>
                            </tr>
                            <tr class="smsBackground">
                                <th>Risk Severity</th>
                                <td>{{$sc->risk_severity}}</td>
                            </tr>
                            <tr class="smsBackground">
                                <th>Severity Statement</th>
                                <td>{{$sc->cvr_statement}}</td>
                            </tr>
                            <tr class="smsBackground">
                                <th>Risk Assessment from Matrix Index</th>
                                <td>{{$sc->risk_assesment_from_matrix}}</td>
                            </tr>
                            <tr class="smsBackground">
                                <th>Determine Risk & Type of Action</th>
                                <td>{{$sc->risk_action}}</td>
                            </tr>
                            <tr class="smsBackground">
                                <th>Risk Management</th>
                                <td>{{$sc->risk_management}}</td>
                            </tr>
                           
                          <tr>
					   		<td colspan="2">
					   			<i>Initialized By : {{$sc->row_creator}} | 
					   			Initialized at : {{$sc->created_at}} | 
					   			Last Updated By : {{$sc->row_updator}} | 
					   			Updated at : {{$sc->updated_at}}</i>
					   		</td>
					   		
					   	</tr>
                        </tbody>
                    </table>
				
                </div>
                <!-- /.box-body -->
                               
                            </div><!-- /.box -->
						</div>
						
	</div>
				
	@endforeach
				
				
	<div class="row" id="correctiveAction">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							<div class="box-header table_toggle expand">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Corrective Action</h3>
									<div class="man pull-right">-</div>												
							</div>	
							@if(!$correctiveActions)
							@if('true'==CommonFunction::hasPermission('sc_corrective_action',Auth::user()->emp_id(),'entry'))
										&nbsp &nbsp <a  class="hidden-print"href="#" style="color:green" data-toggle="modal" data-target="#correctiveIssue">[Add Corrective Action] </a> 
							@endif	
							@endif					 
                <!-- /.box-header -->
					
					<div class="box-body">
				
                    <table class="table table-bordered">
					@if($correctiveActions)
					@foreach($correctiveActions as $action)
					<div class='disNon'>
					{{$num=0}}
					</div>
                        <tbody>
						    <tr class='hidden-print'>               
								<th colspan='2' style='color:#72C2E6'>Corrective Action #{{++$num}}

									 @if('true'==CommonFunction::hasPermission('sc_corrective_action',Auth::user()->emp_id(),'par_delete'))
										{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sc_corrective_action',$action->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									 @endif
									 @if('true'==CommonFunction::hasPermission('sc_corrective_action',Auth::user()->emp_id(),'sof_delete'))
										{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sc_corrective_action', $action->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									 @endif
									 @if('true'==CommonFunction::hasPermission('sc_corrective_action',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('AircraftController@approve', '',array('sc_corrective_action',$action->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('sc_corrective_action',$action->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
									@if('true'==CommonFunction::hasPermission('sc_corrective_action',Auth::user()->emp_id(),'worning'))	
										{{ HTML::linkAction('AircraftController@removeWarning', '',array('sc_corrective_action',$action->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
										{{ HTML::linkAction('AircraftController@warning', '',array('sc_corrective_action',$action->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
									@endif
										
									
									 @if('true'==CommonFunction::hasPermission('sc_corrective_action',Auth::user()->emp_id(),'update'))
										 <a data-toggle="modal" data-target="#editCorrectiveIssue{{$action->id}}" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
									 @endif
								</th>
								
						    </tr>  
						      @if($action->approve=='0')
					<tr>
						<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($action)}}</th>	
					 </tr>
					 @endif
					 @if($action->warning=='1')
					 <tr  >
					 <th colspan='2'>{{AircraftPrimaryInfo::warning($action)}}	</th>
					 </tr>  
					 @endif             
							<tr>
                                <th class="col-md-3">									
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
                                <th>Provided File</th>
                                <td>
								@if($action->corrective_action_file!='Null'){{HTML::link('files/sc_corrective_action_file/'.$action->corrective_action_file,'Document',array('target'=>'_blank'))}}
								@else
									{{HTML::link('#','No Document Provided')}}
								@endif
								</td>
                            </tr>
                            <tr>
						   		<td colspan="2">
						   			<i>Initialized By : {{$action->row_creator}} | 
						   			Initialized at : {{$action->created_at}} | 
						   			Last Updated By : {{$action->row_updator}} | 
						   			Updated at : {{$action->updated_at}}</i>
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
	<div class="row" id="finalization">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							<div class="box-header table_toggle expand">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Finalization Info</h3>
									<div class="man pull-right">-</div>												
							</div>	
							@if(!$finalization)	
							@if('true'==CommonFunction::hasPermission('sc_finalization',Auth::user()->emp_id(),'entry'))
										&nbsp &nbsp <a  class="hidden-print"href="#" style="color:green" data-toggle="modal" data-target="#finzalization">[Add Finalization] </a> 
							@endif	
							@endif					 
                <!-- /.box-header -->
					
					<div class="box-body">
				
                    <table class="table table-bordered">
					@if($finalization)
					@foreach($finalization as $info)
					<div class='disNon'>
					{{$num=0}}
					</div>
                        <tbody>
						    <tr class='hidden-print'>               
								<th colspan='2' style='color:#72C2E6'>

									 @if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'par_delete'))
										{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sc_finalization',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									 @endif
									 @if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'sof_delete'))
										{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sc_finalization', $info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									 @endif
										
									
									 @if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'update'))
										 <a data-toggle="modal" data-target="#updatefinzalization{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
									 @endif
								</th>
								
						    </tr>               
							<tr>
                                <th class="col-md-3">									
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
                            <tr>
						   		<td colspan="2">
						   			<i>Initialized By : {{$info->row_creator}} | 
						   			Initialized at : {{$info->created_at}} | 
						   			Last Updated By : {{$info->row_updator}} | 
						   			Updated at : {{$info->updated_at}}</i>
						   		</td>
						   		
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
				
	<div class="row" id="approval">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							<div class="box-header table_toggle expand">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Approval Information</h3>									
									<div class="man pull-right">-</div>			
									
							</div>	
						@if(!$approvalInfos)	 
							@if('true'==CommonFunction::hasPermission('sc_approval',Auth::user()->emp_id(),'entry'))
										&nbsp &nbsp <a  class="hidden-print"href="#" style="color:green" data-toggle="modal" data-target="
										#approvalForm">[Approval] </a> 
							@endif		
						@endif			 
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
								<span class='hidden-print'>
									 @if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'par_delete'))
										{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sc_approval_info',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									 @endif
									 @if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'sof_delete'))
										{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sc_approval_info',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									 @endif
									@if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'update'))
										 <a data-toggle="modal" data-target="#editapprovalInfos{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
									 @endif
									</span>
								</th>
								
						    </tr>        
							<tr>
                                <th class="col-md-3">									
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
						    <tr >               
								<th colspan='2' style='color:#72C2E6'>Legal Opinion #{{++$num}}

						    	<span  class='hidden-print'>
									 @if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'par_delete'))
										{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sc_legal_openion',$opinion->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									 @endif
									 @if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'sof_delete'))
										{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sc_legal_openion',$opinion->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
									 @endif
									@if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'update'))
										 <a data-toggle="modal" data-target="#updatelegalOpenion{{$opinion->id}}" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
									 @endif
									 </span>
								</th>
								
						    </tr>        
							<tr>
                                <th class="col-md-3">									
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
	@if('true'==CommonFunction::hasPermission('sc_forwarding',Auth::user()->emp_id(),'access'))			
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
								<td>{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sc_forwarding',$forwarding->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}</td>
								<td>
								{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sc_forwarding',$forwarding->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
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
	@endif
				
           @include('common')
            @yield('print')    
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
