@extends('layout')
@section('content')
<section class='content widthController'>
<div style="display: none">{{$num=0;}}</div>
<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							 <div class="box-header">
									<h3 class="box-title">Simulator</h3>
							  </div>
                <!-- /.box-header -->
				
					<div class="box-body">
					@if($simulatorHistorys)
					@foreach($simulatorHistorys as $info)
                    <table class="table table-bordered">
                        <tbody>
						
                            <tr>
                              <th colspan='2'>Simulator #{{++$num}}
								<span class='hidden-print'>
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'par_delete'))	
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('pel_simulator',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
							  @endif
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('pel_simulator',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
							   @endif
									
									
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'approve'))	
                                  
									{{ HTML::linkAction('AircraftController@approve', '',array('pel_simulator',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
								
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('pel_simulator',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('pel_simulator',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('pel_simulator',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'update'))	
									 <a data-toggle="modal" data-target="#updateSimulator{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
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
                                <td>Date</td>
                                <td>{{$info->date.' '.$info->month.' '.$info->year}}</td>
                            </tr>
							
							<tr>
                                <td>Model</td>
                                <td>{{$info->model}}</td>
                            </tr>
							<tr>
                                <td>Registration</td>
                                <td>{{$info->registration}}</td>
                            </tr>
							<tr>
                                <td>Location</td>
                                <td>{{$info->location}}</td>
                            </tr>
							<tr>
                                <td>Other Crew/Instructor</td>
                                <td>{{$info->other_crew_instructor}}</td>
                            </tr>
							<tr>
                                <td>Type Of Instruction</td>
                                <td>{{$info->type_of_instruction}}</td>
                            </tr>
							<tr>
                                <td>FFS(HR)</td>
                                <td>{{$info->FFS_HR}}</td>
                            </tr>
							<tr>
                                <td>FNPT-I(HR)</td>
                                <td>{{$info->FNPT_1_HR}}</td>
                            </tr>
							<tr>
                                <td>FNPT-II(HR)</td>
                                <td>{{$info->FNPT_II_HR}}</td>
                            </tr>
							<tr>
                                <td>CSS(HR)</td>
                                <td>{{$info->CSS_HR}}</td>
                            </tr>
							<tr>
                                <td>Instruction(HR)</td>
                                <td>{{$info->instruction_HR}}</td>
                            </tr>
							<tr>
                                <td>Exam(HR)</td>
                                <td>{{$info->exam_HR}}</td>
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
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#simulator">Add Simulator History</button>	
</p>

@include('pel.entryForm')
@yield('simulator') 

@include('pel.editForm')
@yield('updateSimulator')
</section>
@stop