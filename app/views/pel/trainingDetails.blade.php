@extends('layout')
@section('content')
<section class='content widthController'>
<div style="display:none">{{$num=0}}</div>
<div class="row" >
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							 <div class="box-header">
									<h3 class="box-title">Training Details</h3>
							  </div>
                <!-- /.box-header -->
				
					<div class="box-body">
					@if($trainingDetails)
					@foreach($trainingDetails as $info)
                    <table class="table table-bordered">
                        <tbody>
						
                            <tr>
                              <th colspan='2'>Training Detail#{{++$num}}
								<span class='hidden-print'>
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'par_delete'))	
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('pel_training_details',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							  @endif
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('pel_training_details',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
							   @endif
									
									
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'approve'))	
                                  
									{{ HTML::linkAction('AircraftController@approve', '',array('pel_training_details',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
								
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('pel_training_details',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('pel_training_details',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}

									{{ HTML::linkAction('AircraftController@warning', '',array('pel_training_details',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'update'))	
									 <a data-toggle="modal" data-target="#updateTrainingDetails{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
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
									Name Of The Course
								</td>
                                <td>{{$info->name_of_the_course}}</td>
                            </tr>
                            <tr>
                                <td>									
									Name Of The Institute
								</td>
                                <td>{{$info->name_of_the_institute}}</td>
                            </tr>
                          
							<tr>
                                <td>Start Date</td>
                                <td>{{$info->start_date.' '.$info->start_month.' '.$info->start_year}}</td>
                            </tr>
							<tr>
                                <td>End Date</td>
                                <td>{{$info->end_date.' '.$info->end_month.' '.$info->end_year}}</td>
                            </tr>
							<tr>
                                <td>Certificate Issue Date</td>
                                <td>{{$info->certificate_issue_date.' '.$info->certificate_issue_month.' '.$info->certificate_issue_year}}</td>
                            </tr>
							<tr>
                                <td>Certificate Issue Date</td>
                                <td>{{$info->expiration_date.' '.$info->expiration_month.' '.$info->expiration_year}}</td>
                            </tr>
							<tr>
                                <td>Duration</td>
                                <td>{{$info->duration}}</td>
                            </tr>
							
							<tr>
                                <td>File</td>
                                <td>@if($info->file!='Null'){{HTML::link('files/pelTrainingDetails/'.$info->file,'File',array('target'=>'_blank'))}}
													@else
														{{HTML::link('#','No FIle  Is Provided')}}
													@endif</td>
                            </tr>
							<tr>
                                <td>Approved By</td>
                                <td>{{$info->approved_by}}</td>
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
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#trainingDetails">Add Training Details</button>
	
</p>

@include('pel.entryForm')
@yield('trainingDetails') 

@include('pel.editForm')
@yield('updatetrainingDetails') 
</section>
@stop