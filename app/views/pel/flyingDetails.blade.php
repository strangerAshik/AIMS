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
									<h3 class="box-title">Flying Details</h3>
							  </div>
                <!-- /.box-header -->
				
					<div class="box-body">
					@if($flyingDetails)
					@foreach($flyingDetails as $info)
                    <table class="table table-bordered">
                        <tbody>
						
                            <tr>
                              <th colspan='2'>Flying Detail #{{++$num}}
								<span class='hidden-print'>
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'par_delete'))	
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('pel_flying_details',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
							  @endif
							  @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'sof_delete'))	
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('pel_flying_details',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
							   @endif
									
									
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'approve'))	
                                  
									{{ HTML::linkAction('AircraftController@approve', '',array('pel_flying_details',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
								
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('pel_flying_details',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
							@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('pel_flying_details',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}

									{{ HTML::linkAction('AircraftController@warning', '',array('pel_flying_details',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'update'))	
									 <a data-toggle="modal" data-target="#updateFlyingDetails{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
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
									Date
								</td>
                                <td>{{$info->date.' '.$info->month.' '.$info->year}}</td>
                            </tr>
                            <tr>
                                <td>									
									Local Time
								</td>
                                <td>{{$info->local_time}}</td>
                            </tr>
                            <tr>
                                <td>									
									Sun Rise
								</td>
                                <td>{{$info->sun_rise}}</td>
                            </tr>
                            <tr>
                                <td>									
									Sun Set
								</td>
                                <td>{{$info->sun_set}}</td>
                            </tr>
                            <tr>
                                <td>									
									Flight Number
								</td>
                                <td>{{$info->flight_number}}</td>
                            </tr>
                            <tr>
                                <td>									
									Pairing
								</td>
                                <td>{{$info->pairing}}</td>
                            </tr>
                            <tr>
                                <td>									
									Departure Airfield
								</td>
                                <td>{{$info->departure_airfield}}</td>
                            </tr>
                            <tr>
                                <td>									
									Arrival Airfield
								</td>
                                <td>{{$info->arrival_airfield}}</td>
                            </tr>
                            <tr>
                                <td>									
									Off Block (In Minute)
								</td>
                                <td>{{$info->off_block}}</td>
                            </tr>
                            <tr>
                                <td>									
									On Block (In Minute)
								</td>
                                <td>{{$info->on_block}}</td>
                            </tr>
                            <tr>
                                <td>									
									Flight (In Minute)
								</td>
                                <td>{{$info->flight}}</td>
                            </tr>
                            <tr>
                                <td>									
									PIC/P1
								</td>
                                <td>{{$info->pic_p1}}</td>
                            </tr>
                            <tr>
                                <td>									
									Co-Pilot/P2
								</td>
                                <td>{{$info->co_pilot_p2}}</td>
                            </tr>
                            <tr>
                                <td>									
									Relief Pilot/R
								</td>
                                <td>{{$info->relief_pilot_r}}</td>
                            </tr>
                            <tr>
                                <td>									
									Dual
								</td>
                                <td>{{$info->dual}}</td>
                            </tr>
                            <tr>
                                <td>									
									Instructor
								</td>
                                <td>{{$info->instructor}}</td>
                            </tr>
                            <tr>
                                <td>									
									Examiner
								</td>
                                <td>{{$info->examiner}}</td>
                            </tr>
                            <tr>
                                <td>									
									Night
								</td>
                                <td>{{$info->night}}</td>
                            </tr>
                            <tr>
                                <td>									
									IFR
								</td>
                                <td>{{$info->ifr}}</td>
                            </tr>
                            <tr>
                                <td>									
									Sim Instructor
								</td>
                                <td>{{$info->sim_instructor}}</td>
                            </tr>
                            <tr>
                                <td>									
									Cross Country
								</td>
                                <td>{{$info->cross_country}}</td>
                            </tr>
                            <tr>
                                <td>									
									Approach Landing
								</td>
                                <td>{{$info->approach_landing}}</td>
                            </tr>
                            <tr>
                                <td>									
									Flight Time (view only)
								</td>
                                <td>{{$info->flight_time_view_only}}</td>
                            </tr>
                          
							<tr>
                                <td>Last 3 Flying Dates (View Only)</td>
                                <td>{{$info->date_1.' '.$info->month_1.' '.$info->year_1.'</br>'.$info->date_2.' '.$info->month_2.' '.$info->year_2.'</br>'.$info->date_3.' '.$info->month_3.' '.$info->year_3}}</td>
                            </tr>

                            <tr>
                                <td>									
									Flight Time Limits
								</td>
                                <td>{{$info->flight_time_limits}}</td>
                            </tr>

                            <tr>
                                <td>									
									Aircraft MSN
								</td>
                                <td>{{$info->aircraft_msn}}</td>
                            </tr>

                            <tr>
                                <td>									
									Aircraft Registration Number
								</td>
                                <td>{{$info->aircraft_registration_number}}</td>
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
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#flyingDetails">Add Flying Details</button>
	
</p>

@include('pel.entryForm')
@yield('flyingDetails') 

@include('pel.editForm')
@yield('updateFlyingDetails')

	</section>
@stop