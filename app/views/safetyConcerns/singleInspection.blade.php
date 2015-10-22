@extends('layout')
@section('content')
<section class='content widthController'>

<span style='display:none'>
{{$role=Auth::User()->Role()}}
</span>
         <div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							 <div class="box-header">
									<h3 class="box-title">Inspection Info.</h3>							
							  </div>		 
							 
                <!-- /.box-header -->
				
					<div class="box-body">
				
                    <table class="table table-bordered">
                        <tbody>
						  <tr>
						  {{-- @include('safetyConcerns/options')                                
						  @yield('primaryInspection')--}}
                           </tr>
							@foreach($ins_primary_infos as $info)
                            <tr>               
								<th colspan='2' style='color:#72C2E6'>
									  @if('true'==CommonFunction::hasPermission('sc_new_inspection',Auth::user()->emp_id(),'par_delete'))
										{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sc_primary_inspection',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
									 @endif
									 @if('true'==CommonFunction::hasPermission('sc_new_inspection',Auth::user()->emp_id(),'sof_delete'))
										{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sc_primary_inspection', $info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
									 @endif								
									 @if('true'==CommonFunction::hasPermission('sc_new_inspection',Auth::user()->emp_id(),'update'))
										 <a data-toggle="modal" data-target="#inspectionInfo{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
									 @endif
								</th>
								
						    </tr>
							<tr>
                                <th>									
									Inspection Number
								</th>
                                <td>{{$info->inspection_number}}</td>
                            </tr>
                            <tr>
                                <th>Inspection Title</th>
                                <td>{{$info->inspection_title}}</td>
                            </tr>
                            <tr>
                                <th>Lead Inspector</th>
                                <td>{{$info->lead_inspector}}</td>
                            </tr>

                                                
                            <tr>
                                <th>Team Members</th>
                                <td>
                                @if($teamMembers=CommonFunction::updateMultiSelection('sc_primary_inspection', 'id',$info->id,'team_members'))
                                                    @foreach($teamMembers as $key=>$value)
                                                        {{$value}}</br>
                                                    @endforeach
                                @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Type Of Inspection</th>
                                <td>{{$info->type_of_inspection}}</td>
                            </tr>
							 
                            <tr>
                                <th>Against Organization</th>
                                <td>{{$info->against_organization}}</td>
                            </tr>
							@endforeach
							
                        </tbody>
                    </table>
				
                </div>
                <!-- /.box-body -->
                               
                            </div><!-- /.box -->
						</div>
						
				</div>
				@include('safetyConcerns.menu')
				@yield('menuIssueSafetyConcern')
				
				
				
				@foreach($safety_concerns as $sc)
			    <div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							<div class="box-header">
									<h3 class="box-title" ><a style='color:#367FA9;font-weight:bold;' href="{{URL::to('safety/singlesafetyConcern/'.$sc->safety_issue_number);}}">{{$sc->safety_issue_title}}</a></h3>
									
									<a class='btn btn-primary pull-right 'style='color: #fff;
margin: 9px 10px 0 0;' href="{{URL::to('safety/singlesafetyConcern/'.$sc->safety_issue_number);}}"> Details</a>
							</div>							 
                <!-- /.box-header -->
				
					<div class="box-body">
				
                    <table class="table table-bordered">
                        <tbody>
						                       
							<tr>
                                <th>									
									Safety Issue Number
								</th>
                                <td>{{$sc->safety_issue_number}}</td>
                            </tr>
                            
                            <tr>
                                <th>Type Of Concern</th>
                                <td>{{$sc->type_of_concern}}</td>
                            </tr>
                            <tr>
                                <th>Type Of Issue</th>
                                <td>{{$sc->type_of_issue}}</td>
                            </tr>
                            <tr>
                                <th>POI/Responsible</th>
                                <td>{{$sc->poi_or_responsible}}</td>
                            </tr>
                           
							 
                            <tr>
                                <th>Assigned Inspector</th>
                                <td>{{$sc->assigned_inspector}}</td>
                            </tr>
                            <tr>
                                <th>Issue Finding Date</th>
                                <td>{{$sc->issue_finding_date.' '.$sc->issue_finding_month.' '.$sc->issue_finding_year}}</td>
                            </tr>
                            <tr>
                                <th>Issue Finding Local Time</th>
                                <td>{{$sc->issue_finding_local_time}}</td>
                            </tr>
                            <tr>
                                <th>Place/Airport</th>
                                <td>{{$sc->place_or_airport}}</td>
                            </tr>
                            <tr>
                                <th>CVR Statement</th>
                                <td>{{$sc->cvr_statement}}</td>
                            </tr>
                            <tr>
                                <th>Initial Risk Analysis</th>
                                <td>{{$sc->initial_risk_analysis}}</td>
                            </tr>
                            <tr>
                                <th>Corrective Status</th>
                                <td>{{$sc->corrective_satatus}}</td>
                            </tr>
                            <tr>
                                <th>Corrective Priority</th>
                                <td>{{$sc->corrective_priority}}</td>
                            </tr>
                            
                            <tr>
                                <th>Provided To</th>
                                <td>{{$sc->provided_to}}</td>
                            </tr>
                            <tr>
                                <th>Target Date</th>
                                <td>{{$sc->target_date.' '.$sc->target_month.' '.$sc->target_year}}</td>
                            </tr>
                           
                         
                            <tr>
                                <th>Job Aid File</th>
                                <td>
								@if($sc->job_aid_file!='Null'){{HTML::link('files/sc_job_aid_file/'.$sc->job_aid_file,'Document',array('target'=>'_blank'))}}
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
                                <th>Responsible Pels</th>
                                <td>{{$sc->responsible_pels}}</td>
                            </tr>
                            <tr>
                                <th>Aircraft MSN</th>
                                <td>{{$sc->aircraft_msn}}</td>
                            </tr>
                            <tr>
                                <th>Aircraft Registration Number</th>
                                <td>{{$sc->aircraft_rgistration_number}}</td>
                            </tr>
                            <tr>
                                <th>Final Regulation Date</th>
                                <td>{{$sc->final_regulation_date.' '.$sc->final_regulation_month.' '.$sc->final_regulation_year}}</td>
                            </tr>
                            <tr>
                                <th>Final Regulation Inspector</th>
                                <td>{{$sc->final_regulation_inspector}}</td>
                            </tr>
                            <tr>
                                <th>Final Regulation Method</th>
                                <td>{{$sc->final_regulation_method}}</td>
                            </tr>
                            <tr>
                                <th>Residual Risk</th>
                                <td>{{$sc->residual_risk}}</td>
                            </tr>
                            <tr>
                                <th>Actual Finding</th>
                                <td>{{$sc->actual_finding}}</td>
                            </tr>
                            <tr>
                                <th>Safety Concern</th>
                                <td>{{$sc->safety_concern}}</td>
                            </tr>
                            <tr>
                                <th>Risk Statement</th>
                                <td>{{$sc->risk_statement}}</td>
                            </tr>
							
							
                        </tbody>
                    </table>
				
                </div>
                <!-- /.box-body -->
                               
                            </div><!-- /.box -->
						</div>
						
				</div>
				@endforeach
				

	</section>
    <!--  -->
@include('safetyConcerns/entryForm')
@yield('issueSafety')
@include('safetyConcerns/editForm')
@yield('inspectionPrimary')
@stop
