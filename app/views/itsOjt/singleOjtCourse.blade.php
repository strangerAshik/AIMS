@extends('layout')
@section('content')
<section class="content contentWidth">
	<div class="row" >
                        
	@foreach($courseDetails as $info)	
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header table_toggle expand">
									<h3 class="box-title">{{$info->its_job_task_no." : ".$info->title}}</h3>
									<div class="man pull-right">-</div>
							  </div>
							 
                <!-- /.box-header -->
					
					
					<div class="box-body">
					
                    <table class="table table-bordered">
									 
					   <tbody>	
						
                        
						 <tr>
						 <td colspan="2">
							
								 <span class='hidden-print'>
                                  @if('true'==CommonFunction::hasPermission('aircraft',Auth::user()->emp_id(),'par_delete'))

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('ItsOjt_course_ojt',$info->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									@endif
								@if('true'==CommonFunction::hasPermission('aircraft',Auth::user()->emp_id(),'sof_delete'))
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('ItsOjt_course_ojt',$info->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif	
									
								 @if('true'==CommonFunction::hasPermission('aircraft',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('AircraftController@approve', '',array('ItsOjt_course_ojt',$info->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('ItsOjt_course_ojt',$info->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('aircraft',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('ItsOjt_course_ojt',$info->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('ItsOjt_course_ojt',$info->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									@endif
								@if('true'==CommonFunction::hasPermission('aircraft',Auth::user()->emp_id(),'update'))

									 <a data-toggle="modal" data-target="#ojtEdit{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil hidden-print" aria-hidden="true"></span>
									</a>
									@endif
								</span>
								
							</td>
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
							<th class="col-md-3">									
								ITS Course Number
							</th>
							<td>{{$info->its_course_number}}  </td>
						</tr>
						<tr>
							<th class="col-md-3">									
								ITS Job Task #
							</th>
							<td>{{$info->its_job_task_no}}  </td>
						</tr>
						<tr>
							<th class="col-md-3">									
								Title
							</th>
							<td>{{$info->title}}</td>
						</tr>
						<tr>
							<th class="col-md-3">									
								Approval Date
							</th>
							<td>{{$info->approval_date}}</td>
						</tr>						
										
						<tr>
							<th class="col-md-3">									
								Comments
							</th>
							<td>{{$info->comments}}</td>
						</tr>			
						<tr>
							<th class="col-md-3">									
								Inspector Type
							</th>
							<td>{{$info->inspector_type}}</td>
						</tr>
						<tr>
							<th class="col-md-3">									
								Training Category
							</th>
							<td>{{$info->training_category}}</td>
						</tr>
						<tr>
							<th class="col-md-3">									
								Frequency
							</th>
							<td>{{$info->frequency}}</td>
						</tr>   
						<tr>
							<th class="col-md-3">									
								Associative FAA Job Task No
							</th>
							<td>{{$info->associative_faa_job_task_no}}</td>
						</tr>
						
						<tr>
							<th class="col-md-3">									
								Regulation Reference
							</th>
							<td>{{nl2br($info->regulation_reference)}}</td>
						</tr> 
						<tr>
							<th class="col-md-3">									
								CAA Forms
							</th>
							<td>{{$info->caa_forms}}</td>
						</tr> 
						<tr>
							<th class="col-md-3">									
								Guidance Material Reference
							</th>
							<td>{{nl2br($info->guidance_materials_referance)}}</td>
						</tr> 
						
						<tr>
							<th class="col-md-3">									
								Task Description
							</th>
							<td>{{nl2br($info->task_description)}}</td>
						</tr> 
						<tr>
							<th class="col-md-3">									
								Job Performance Subtasks
							</th>
							<td>{{nl2br($info->job_performance_subtasks)}}</td>
						</tr> 
						
						
                       
                        </tbody>
						
					
                    </table>
					
                </div>
				
					
						
					</div>

				
                <!-- /.box-body -->
                               
                          </div><!-- /.box -->
						</div>

		
	@endforeach				
</div>
</section>


@stop