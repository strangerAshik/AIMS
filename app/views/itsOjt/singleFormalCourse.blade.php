@extends('layout')
@section('content')
<section class="content contentWidth">
	<div class="row" >
                        
	@foreach($courseDetails as $info)	
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header table_toggle expand">
									<h3 class="box-title">{{$info->its_course_number.":".$info->its_course_title}}</h3>
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

									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('itsOjt_course_formal',$info->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									@endif
								@if('true'==CommonFunction::hasPermission('aircraft',Auth::user()->emp_id(),'sof_delete'))
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('itsOjt_course_formal',$info->id), array('class' => 'glyphicon glyphicon-trash hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif	
									
								 @if('true'==CommonFunction::hasPermission('aircraft',Auth::user()->emp_id(),'approve'))

									{{ HTML::linkAction('AircraftController@approve', '',array('itsOjt_course_formal',$info->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('itsOjt_course_formal',$info->id), array('class' => 'glyphicon glyphicon-ok hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
								@if('true'==CommonFunction::hasPermission('aircraft',Auth::user()->emp_id(),'worning'))	
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('itsOjt_course_formal',$info->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('itsOjt_course_formal',$info->id), array('class' => 'glyphicon glyphicon-bell hidden-print','style'=>'color:red;float:right;padding:5px;')) }}
									@endif
								@if('true'==CommonFunction::hasPermission('aircraft',Auth::user()->emp_id(),'update'))

									 <a data-toggle="modal" data-target="#formalEdit{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
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
								ITS Course Title
							</th>
							<td>{{$info->its_course_title}}</td>
						</tr>
						<tr>
							<th class="col-md-3">									
								Training Profile
							</th>
							<td>{{$info->training_profile}}</td>
						</tr>						
										
						<tr>
							<th class="col-md-3">									
								Training Category
							</th>
							<td>{{$info->training_category}}</td>
						</tr>			
						<tr>
							<th class="col-md-3">									
								Sequence
							</th>
							<td>{{$info->sequence}}</td>
						</tr>
						<tr>
							<th class="col-md-3">									
								Course Length
							</th>
							<td>{{$info->course_length}}</td>
						</tr>
						<tr>
							<th class="col-md-3">									
								Course Objective
							</th>
							<td>{{nl2br($info->course_objective)}}</td>
						</tr>   
						<tr>
							<th class="col-md-3">									
								Course Description
							</th>
							<td>{{nl2br($info->course_description)}}</td>
						</tr>
						
						<tr>
							<th class="col-md-3">									
								Course Content
							</th>
							<td>{{nl2br($info->course_content)}}</td>
						</tr> 
						<tr>
							<th class="col-md-3">									
								Prerequisites
							</th>
							<td>{{$info->prerequisites}}</td>
						</tr> 
						<tr>
							<th class="col-md-3">									
								Revision Date
							</th>
							<td>{{$info->revision_date}}</td>
						</tr> 
						
						<tr>
							<th class="col-md-3">									
								Course Manager
							</th>
							<td>{{$info->course_manager}}</td>
						</tr> 
						<tr>
							<th class="col-md-3">									
								Phone
							</th>
							<td>{{$info->phone}}</td>
						</tr> 
						<tr>
							<th class="col-md-3">									
								Associated CAA training Courses
							</th>
							<td>{{$info->associated_caa_training_courses}}</td>
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
@include('itsOjt.editForm')

@yield('formalEdit')
@stop