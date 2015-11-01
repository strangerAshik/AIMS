@extends('layout')
@section('content')
<section class="content widthController">
<div class='row col-md-12 hidden-print'>
				
				@if('true'==CommonFunction::hasPermission('sia_followup',Auth::user()->emp_id(),'access'))
				<p class="text-center col-md-4">
				<a class="btn btn-primary btn-block" target="_blink" href="{{URL::to('surveillance/followUp/'.$sia_number);}}">Follow Up</a>
				</p>
				@endif

				@if('true'==CommonFunction::hasPermission('sia_corrective_action',Auth::user()->emp_id(),'access'))
				<p class="text-center col-md-4">
				<a class="btn btn-primary btn-block"  href="{{URL::to('surveillance/correctiveAction/'.$sia_number);}}">Corrective Action</a>
				</p>
				@endif

				@if('true'==CommonFunction::hasPermission('sia_approval',Auth::user()->emp_id(),'access'))
				<p class="text-center col-md-4">
				<button class="btn btn-primary btn-block"   data-toggle="modal" data-target="#approvalForm">Approval</button>
				</p>
				@endif
</div>

<!--Program descripton-->
<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
            
							<div class="box-header table_toggle expand ">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Program Details</h3>			

									<div class="man pull-right" >-</div>	
									
							</div>
							<div class="box-header visible-print-block">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Program Details</h3>			
							</div>							 
                <!-- /.box-header -->
					
					<div class="box-body ">
					
					 @if($programDetails)
           				 @foreach ($programDetails as $info) 	
           				 <div class='disNon'>{{$num=0}}</div>
                    <table class="table table-bordered">
				
				 
            <tbody>
         
			   <tr><td colspan="2" >
						
							<span class='hidden-print'>
								@if('true'==CommonFunction::hasPermission('sia_program',Auth::user()->emp_id(),'par_delete'))

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sia_program',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_program',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sia_program',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_program',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('AircraftController@approve', '',array('sia_program',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('sia_program',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_program',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('sia_program',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('sia_program',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_program',Auth::user()->emp_id(),'update'))
									<a data-toggle="modal" data-target="#updateProgram{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
								@endif
									
							</span>	
			   <td></tr>
			   <tr><th >SIA / Tracking Number</th><td>{{$info->sia_number}}</td></tr>
			   <tr><th>Organization Name</th><td>{{$info->org_name}}</td></tr>
			   <tr><th>Event On</th><td>{{$info->event}}</td></tr>
			    <tr><th>Specific Purpose</th><td>{{$info->specific_purpose}}</td></tr>
			   <tr><th>Date</th><td>{{$info->date}}</td></tr>
			   <tr><th>Time ( LT )</th><td>{{$info->time}}</td></tr>
			   <tr><th>Team Members</th><td> 
			   @if($authors=CommonFunction::updateMultiSelection('sia_program', 'id',$info->id,'team_members'))
                                               @if($authors!=null)
                                                    @foreach($authors as $key=>$value)
                                                        {{$value}},
                                                    @endforeach
                                               
                                                @endif
                @else
                    No Members Added!!
                @endif</td>
               </tr>
			   <tr><th>Remarks</th><td>{{$info->remarks}}</td></tr>
			
			</tbody>
					 
					 
					
					 
					</table>
			@endforeach
			@else 
			<table class="table table-bordered">
			<tbody>
			<tr><td colspan="2" class="text-center text-bold">This is Not Planned Program!</td></tr>
			@foreach ($actionDetails as $info) 	
			<tr><td>SIA Number</td><td>{{$info->sia_number}}</td></tr>
			@endforeach

			</tbody>
			</table>
			@endif
					</div>

						</div>
					</div>
					
</div> 
<!--Action descripton-->
<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                   
							<div class="box-header table_toggle expand">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Action Details</h3> 
									<span class='hidden-print man pull-right'>-</span>
							</div>	
							<div class="box-header visible-print-block">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Action Details</h3> 
							</div>							 
                <!-- /.box-header -->
					
					<div class="box-body">
					<div class='disNon'> 
					{{$num=0}}
					</div>	
                    <table class="table table-bordered">
				
				
                    <tbody>
                    @if($actionDetails)
                    @foreach($actionDetails as $info)	
					   <tr><td colspan="2">
					   									
							<span class='hidden-print'>
								@if('true'==CommonFunction::hasPermission('sia_action',Auth::user()->emp_id(),'par_delete'))

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sia_action',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_action',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sia_action',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_action',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('AircraftController@approve', '',array('sia_action',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('sia_action',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_action',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('sia_action',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('sia_action',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_action',Auth::user()->emp_id(),'update'))
									<a data-toggle="modal" data-target="#updateAction{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
								@endif
									
							</span>	

					   </td></tr>
					   <tr><th class='col-md-4'>SIA Type</th><td>{{$info->program_type}}</td></tr>
					   <tr><th class='col-md-4'>SIA/ Tracking Number</th><td>{{$info->sia_number}}</td></tr>
					   <tr><th>Team Members</th><td>
						 @if($authors=CommonFunction::updateMultiSelection('sia_action', 'id',$info->id,'team_members'))
                                               @if($authors!=null)
                                                    @foreach($authors as $key=>$value)
                                                        {{$value}},
                                                    @endforeach
                                               
                                                @endif
                                                @else
                                                    No Members Added!!
                                                @endif
					   </td></tr>
					   <tr><th>Type of SIA (Event)</th><td>{{$info->event}}</td></tr>
					   <tr><th>Objective</th><td>{{$info->objective}}</td></tr>
					   <tr><th>ISWC</th><td>{{$info->iats_code}}</td></tr>
					   <tr><th>Organization Name</th><td>{{$info->organization}}</td></tr>
					   <tr><th>Location</th><td>{{$info->location}}</td></tr>
					   <tr><th>Date</th><td>{{$info->date}}</td></tr>
					   <tr><th>Time ( LT )</th><td>{{$info->time}}</td></tr>
					   <tr><th>Flight Number</th><td>{{$info->flight_number}}</td></tr>
					   <tr><th>Departure Airfield</th><td>{{$info->departure_airfield}}</td></tr>
					   <tr><th>Arrival Airfield</th><td>{{$info->arrival_airfield}}</td></tr>
					   <tr><th>Aircraft MMS</th><td>{{$info->aircraft_mms}}</td></tr>
					   <tr><th>Aircraft Registration No.</th><td>{{$info->aircraft_registration_no}}</td></tr>
					   <tr><th>PIC</th><td>{{$info->pic}}</td></tr>
					   <tr><th>PEL Number</th><td>
							 @if($authors=CommonFunction::updateMultiSelection('sia_action', 'id',$info->id,'pel_numbers'))
                                               @if($authors!=null)
                                                    @foreach($authors as $key=>$value)
                                                        {{$value}}</br>
                                                    @endforeach
                                               
                                                @endif
                                                @else
                                                    No PEL Added!!
                                                @endif
					   </td></tr>
					   <tr><th>Any Other personal Inspected </th><td>{{$info->other_personal_inspected}}</td></tr>
					   <tr><th>SIA By Critical Element</th><td>{{$info->critical_element}}</td></tr>
					   <tr><th>SIA By Critical Area </th><td>

							  @if($areas=CommonFunction::updateMultiSelection('sia_action', 'id',$info->id,'sia_by_area'))
                                               @if($areas!=null)
                                                    @foreach($areas as $key=>$value)
                                                        {{$value}},
                                                    @endforeach
                                               
                                                @endif
				                @else
				                    No Area Added!!
				                @endif
					  </td></tr>
					   <tr><th>Has Finding?</th><td>{{$info->has_finding}}</td></tr>
					   
					   <tr><th>Result</th><td>{{$info->result}}</td></tr>
					     <tr><th>Has Safety Concern?</th><td>{{$info->has_safety_concern}}</td></tr>
					       <tr><th>Has EDP?</th><td>{{$info->has_edp}}</td></tr>
					
					   <tr><th>Hazard Identification</th><td>{{$info->hazard_identification}}</td></tr>
					   <tr><th>Asses Initial Risk</th><td>{{$info->initial_risk}}</td></tr>
					   
					   <tr><th>Determine Severity</th><td>{{$info->determine_severity}}</td></tr>
					   <tr><th>Determine risk [risk matrix] </th><td>{{$info->determine_risk}}</td></tr>
					   <tr><th>Violation of Safety Standard</th><td>{{$info->violation_of_safety_standard}}</td></tr>
					   <tr><th>Safety Risk Management</th><td>{{$info->safety_risk_management}}</td></tr>
					   <tr><th>Determine Likelihood</th><td>{{$info->determine_likelihood}}</td></tr>
					   
					   <tr><th>Risk Statement</th><td>{{$info->risk_statement}}</td></tr>
					  
					   <tr><th>Safety performance indicator (SPI)</th><td>{{$info->safety_performance_indicator}}</td></tr>
					   <tr><th>Safety performance target (SPT)</th><td>{{$info->safety_performance_target}}</td></tr>
					   <tr><th>LEI(%)</th><td>{{$info->lack_of_effective_implementation}}</td></tr>
					 
					
					</tbody>
				 
					 
					
					 
					</table>
					@endforeach
					@else 
					 <table class="table table-bordered">
                    <tbody>
						<tr><td colspan="2">No Action Taken Yet!
						@if('true'==CommonFunction::hasPermission('sia_action',Auth::user()->emp_id(),'access'))
						 Go For Action Entry <a class="hidden-print" href="{{URL::to('surveillance/newActionEnrty')}}" style="color:green"> [Action Entry] </a> 
						@endif
						 </td></tr>
					</tbody>
					</table>
					@endif
					</div>
					
						
						</div>
					</div>
					
</div> 
<!--Finding Description -->  
<div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							<div class="box-header table_toggle expand">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;'>Findings</h3>
									<div class="man pull-right" >-</div>									
									
							</div>	
							<div class="box-header visible-print-block">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;'>Findings</h3>
							</div>							 
                
					
					<div class="box-body">
					<div style="display: none;">
					{{$num=0;}}
					</div>		
                    <table class="table table-bordered">
                    <thead>

                    <tr><th>No.</th><th>Finding No.</th><th>Finding</th><th>Target Date</th><th>Mitigate?</th><th>Details</th></tr>
                    </thead>
				     <tbody>					   
						
						
						@if($findings)
						@foreach ($findings as $info) 
						<tr>
						<td>{{++$num}}</td>
						<td>{{$info->finding_number}}</td>
						<td>{{$info->finding}}</td>
						<td>{{$info->target_date}}</td>
						<td>
						<?php $isMitigate=CommonFunction::isMitigate($info->finding_number);?>
						@if($isMitigate>0)
						Yes
						@else 
						Not Yet
						@endif
						</td>
						<td><a target="_blink"  href="{{URL::to('surveillance/correctiveAction/'.$sia_number);}}">Details</a></td>
						</tr>
						@endforeach
						@else 
						<tr><td colspan="4">No Finding Found. 
						@if('true'==CommonFunction::hasPermission('sia_action',Auth::user()->emp_id(),'access'))
						Go For Finding Entry
						<a class="hidden-print" href="{{URL::to('surveillance/newActionEnrty')}}" style="color:green"> [Finding] </a>
						@endif
						</td></tr>
						@endif
						
					</tbody>
					</table>
					</div>
						</div>
					</div>
					
</div> 
<!--Safety concern descripton-->
<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							<div class="box-header table_toggle expand">

									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Safety Concern</h3>	
									<div class="man pull-right" >-</div>								
									
							</div>
							<div class="box-header visible-print-block">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Safety Concern</h3>
							</div>							 
                <!-- /.box-header -->
					
					<div class="box-body">
					<div class='disNon'>
					{{$num=0}}
					</div>	
                    <table class="table table-bordered">
					<thead>
						<tr><th>No.</th><th>SC Number</th><th>Approved</th><th>Details</th></tr>
					</thead>
				
                    <tbody>					   
						
						
						@if($safetyCons)
						@foreach ($safetyCons as $info) 
						<tr>
							<td>{{++$num}}</td>
							<td>{{$info->safety_issue_number}}</td>
							
							<td>
							<?php $count=CommonFunction::isSafetyConsApproved($info->safety_issue_number);?>
							@if($count>0)
								Yes
							@else 
								No
							@endif
							</td>
							<td><a target="_blink" href="{{URL::to('safety/singlesafetyConcern/'.$info->safety_issue_number)}}">Details</a></td>
							</tr>
						@endforeach
						@else 
						<tr><td colspan="4">No Safety Concern Found.
						@if('true'==CommonFunction::hasPermission('sia_action',Auth::user()->emp_id(),'access'))
						 Go For Safety Concern Entry<a class="hidden-print" href="{{URL::to('surveillance/newActionEnrty')}}" style="color:green"> [Safety Concern] </a> 
						@endif
						 </td></tr>
						@endif
						
					</tbody>
				 
					 
					
					 
					</table>
					</div>
						</div>
					</div>
					
</div> 

<!--EDP descripton-->
<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							<div class="box-header table_toggle expand">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >EDP</h3>	
									<div class="man pull-right" >-</div>							
									
							</div>	
							<div class="box-header visible-print-block">
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >EDP</h3>	
							</div>							 
                <!-- /.box-header -->
					
					<div class="box-body">
					<div class='disNon'>{{$num=0}}</div>	
                    <table class="table table-bordered">
				
				
                    <tbody>					   
						
						<tr><th>No.</th><th>EDP Number</th><th>Details</th></tr>
						@if($edps)
						@foreach ($edps as $info) 
						<tr><td>{{++$num}}</td><td>{{$info->edp_number}}</td><td><a target="_blink" href="{{URL::to('edp/singleEdp/'.$info->edp_number)}}">Details</a></td></tr>
						@endforeach
						@else 
						<tr><td colspan="4">No EDP Found.
						@if('true'==CommonFunction::hasPermission('sia_action',Auth::user()->emp_id(),'access'))
						 Go For EDP Entry<a class="hidden-print" href="{{URL::to('surveillance/newActionEnrty')}}" style="color:green"> [EDP] </a>

						@endif
						 </td></tr>
						@endif
						
					</tbody>
				 
					 
					
					 
					</table>
					</div>
						</div>
					</div>
					
</div>

<!--Approval Info-->
<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                   
							<div class="box-header table_toggle expand">							
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Approval Info</h3>
									<div class="man pull-right" >-</div>
							</div>
							<div class="box-header visible-print-block">							
									<h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Approval Info</h3>
							</div>							 
                <!-- /.box-header -->
					
					<div class="box-body">
					<div class='disNon'>
					{{$num=0}}
					</div>	
                    <table class="table table-bordered">
				
				
                    <tbody>	
                    <tr><td colspan="4">
                    		@if($approvalInfo)
							@foreach($approvalInfo as $info)		
								<span class='hidden-print'>
								@if('true'==CommonFunction::hasPermission('sia_approval',Auth::user()->emp_id(),'par_delete'))

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sia_approval',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_approval',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sia_approval',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_approval',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('AircraftController@approve', '',array('sia_approval',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('sia_approval',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_approval',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('sia_approval',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('sia_approval',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('sia_approval',Auth::user()->emp_id(),'update'))
									<a data-toggle="modal" data-target="#approvalForm{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
								@endif
									
							</span>	

                    </td></tr>	
					<tr><th>Approved By</th><th>Designation</th><th>Approval Date</th><th>Note</th></tr>
					
					<tr><td>{{$info->approved_by}}</td><td>{{$info->designation}}</td><td>{{$info->approval_date}}</td><td>{{$info->approval_note}}</td></tr>
					
						
					</tbody>
				 
					 
					
					 
					</table>
					@endforeach
					@else
					 <table class="table table-bordered">
                    <tbody>		
						<tr><td>Not Approved Yet!</td></tr>
					</tbody>
					</table>
					@endif
					</div>
					
						</div>
					</div>
					
</div>  


@include('common')
@yield('print')
</section>

@include('surveillance.entryForm')
@yield('approvalForm')

@include('surveillance.editForm')
@yield('updateApprovalForm')
@yield('updateNewProgram')
@yield('updateAction')

@include('safetyConcerns/entryForm')
	@yield('issueSafety')
	@yield('edp')
@include('surveillance/entryForm')
	@yield('finding')
@stop