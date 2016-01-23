@extends('layout')
@section('content')
<section class='content widthController'>
<div class="row" >
<div style="display: none">{{$num=0}}</div>
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							 <div class="box-header">
									<h3 class="box-title">AME Log Details</h3>
							  </div>
                <!-- /.box-header -->
				
					<div class="box-body">
					@if($ameLogs)
					@foreach($ameLogs as $info)
                    <table class="table table-bordered">
                        <tbody>
						
                            <tr>
                              <th colspan='2'>AMR Log #{{++$num}}
								<span class='hidden-print'>
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'par_delete'))	
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('pel_ame_log_details',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							  @endif
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('pel_ame_log_details',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							   @endif
									
									
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'approve'))	
                                  
									{{ HTML::linkAction('AircraftController@approve', '',array('pel_ame_log_details',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
								
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('pel_ame_log_details',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('pel_ame_log_details',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}

									{{ HTML::linkAction('AircraftController@warning', '',array('pel_ame_log_details',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'update'))	
									 <a data-toggle="modal" data-target="#updateAmeLogDetails{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
								@endif
							     
							  </span>
							  </th>
                            </tr>
                             @if($info->approve=='0')
							  <tr>
								<th  colspan='2'> {{AircraftPrimaryInfo::notApproved($info)}}</th>	
							 </tr>
							 @endif
							 @if($info->warning=='1')
								 <tr  >
								 <th colspan='2'>{{AircraftPrimaryInfo::warning($info)}}	</th>
								 </tr>  
							 @endif
                            <tr>
                                <td>									
									Index Number
								</td>
                                <td>{{$info->index_number}}</td>
                            </tr>
                            <tr>
                                <td>									
									ATA Chapter
								</td>
                                <td>{{$info->ata_chapter}}</td>
                            </tr>
                            <tr>
                                <td>									
									Part-66 Module
								</td>
                                <td>{{$info->part_66_module}}</td>
                            </tr>
                            <tr>
                                <td>									
									Task Competence Group (p-66)
								</td>
                                <td>{{$info->task_competence_group_p_66}}</td>
                            </tr>
                            <tr>
                                <td>									
									Task Competence Details (p-66)
								</td>
                                <td>{{$info->task_competence_details_p_66}}</td>
                            </tr>
                            <tr>
                                <td>									
									Basic Skill Title
								</td>
                                <td>{{$info->basic_skill_title}}</td>
                            </tr>
                            <tr>
                                <td>									
									Basic Skill Task
								</td>
                                <td>{{$info->basic_skill_task}}</td>
                            </tr>
                            <tr>
                                <td>									
									Maintenance Task Title
								</td>
                                <td>{{$info->maintenance_task_title}}</td>
                            </tr>
                            <tr>
                                <td>									
									Maintenance Task Details
								</td>
                                <td>{{$info->maintenance_task_details}}</td>
                            </tr>
                            <tr>
                                <td>									
									Aircraft MSN
								</td>
                                <td>{{$info->aircraft_msn}}</td>
                            </tr>
                            <tr>
                                <td>									
									Workshop
								</td>
                                <td>{{$info->workshop}}</td>
                            </tr>
                            <tr>
                                <td>									
									Work Order
								</td>
                                <td>{{$info->work_order}}</td>
                            </tr>
                            <tr>
                                <td>									
									Supervisor/Instructor/ Assessor/Company
								</td>
                                <td>{{$info->supervisor_instructor_assessor_company}}</td>
                            </tr>
                          
							<tr>
                                <td>Date</td>
                                <td>{{$info->date.' '.$info->month.' '.$info->year}}</td>
                            </tr>

                            <tr>
                                <td>									
									Hour Details
								</td>
                                <td>{{$info->hour_details}}</td>
                            </tr>
							
							
                        </tbody>
                    </table>
					@endforeach
					@else 
					<table class="table table-bordered">
					<tr><td>No Data Is Given Yet!!</td></tr>
					</table>
					@endif
                </div>
                <!-- /.box-body -->
                               
                            </div><!-- /.box -->
						</div>
						
</div>

<p class="text-center">
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#ameLogDetails">Add AME Log Details</button>
	
</p>

@include('pel.entryForm')
@yield('ameLogDetails') 

@include('pel.editForm')
@yield('updateameLogDetails')
</section>
@stop