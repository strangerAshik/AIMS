@extends('layout')

@section('content')
<section class="content contentWidth">
<!--Formal Course description-->
	<div class="row" >
                      
		
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header  table_toggle expand">
				<h3 class="box-title">{{$its_course_number}} : {{$getCourseName}} </h3>
									<div class="man pull-right" >-</div>
							  </div>

							  
                <!-- /.box-header -->
				
					<div class="box-body">
					
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                        	<th>Employee Name</th>
                        	<td>{{CommonFunction::TraineName($emp_tracker)}}</td>
                        </tr>
                       

                        <!--Formal Course Details-->
                        @if($formal)
                        @foreach($formal as $info)
                        <tr><td colspan="2" style="background:#ddd">
                        <b>Formal Course Details </b>

                        	<span class='hidden-print'>
							  
							  @if('true'==CommonFunction::hasPermission('aircraft',Auth::user()->emp_id(),'par_delete'))
									{{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('Itsojt_formal_ojt_course_status',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
							  @endif
							  @if('true'==CommonFunction::hasPermission('aircraft',Auth::user()->emp_id(),'sof_delete'))
									{{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('Itsojt_formal_ojt_course_status',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
							   @endif
									
							@if('true'==CommonFunction::hasPermission('aircraft',Auth::user()->emp_id(),'approve'))
                                  
									{{ HTML::linkAction('AircraftController@approve', '',array('Itsojt_formal_ojt_course_status',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
								
									
									{{ HTML::linkAction('AircraftController@notApprove', '',array('Itsojt_formal_ojt_course_status',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
								@endif
							@if('true'==CommonFunction::hasPermission('aircraft',Auth::user()->emp_id(),'worning'))
									{{ HTML::linkAction('AircraftController@removeWarning', '',array('Itsojt_formal_ojt_course_status',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
									{{ HTML::linkAction('AircraftController@warning', '',array('Itsojt_formal_ojt_course_status',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
							@endif
							@if('true'==CommonFunction::hasPermission('aircraft',Auth::user()->emp_id(),'update'))
									 <a data-toggle="modal" data-target="#editFormal{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
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
									Instructor
								</th>
                                <td>{{$info->instructor}}</td>
                            </tr>
                            <tr>
                                <th class="col-md-3">									
									Supervisor
								</th>
                                <td>{{$info->supervisor}}</td>
                            </tr>                            
                            <tr>
                                <th class="col-md-3">									
									Manager
								</th>
                                <td>{{$info->manager}}</td>
                            </tr>
                            <tr>
                                <th class="col-md-3">									
									Start Date
								</th>
                                <td>{{$info->start_date}}</td>
                            </tr>
                            <tr>
                                <th class="col-md-3">									
									Completion Date
								</th>
                                <td>{{$info->completion_date}}</td>
                            </tr>
                            
                            <tr>
                                <th class="col-md-3">									
									Validity
								</th>
                                <td>{{$info->validity_date}}</td>
                            </tr>
                            <tr>
                                <th class="col-md-3">									
									Completion Status
								</th>
                                <td>{{$info->completion_status}}</td>
                            </tr>
                            <tr>
                                <th class="col-md-3">									
									Certificate
								</th>
                                <td>
									 @if($info->certificate!='Null'){{HTML::link('files/itsOjt/'.$info->certificate,'Certificate',array('target'=>'_blank'))}}
                                                    @else
                                                        {{HTML::link('#','No Certificate Provided')}}
                                                    @endif
						
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-3">
                               	 Comment
								</th>
                                <td>{{nl2br($info->notes)}}</td>
                            </tr>
                            @endforeach
                            @else 
								<tr style="background:#ddd">
                                <th class="col-md-3" >									
									Formal Course Status
								</th>
								<td>Not Done</td>
								<tr><td colspan="2"></td></tr>
                                
                            </tr>
							
                            @endif
                          
                           
                        
                        </tbody>
                    </table>
					
                </div>
                <!-- /.box-body -->
                               
               </div><!-- /.box -->
			</div>
</div>
<!--Assgned Associated OJT-->
	<div class="row" >
                      
		
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header  table_toggle expand">
				<h3 class="box-title">Assgned Associated OJT</h3>
									<div class="man pull-right" >-</div>
							  </div>

							  
                <!-- /.box-header -->
				
					<div class="box-body">
					
                    <table class="table table-bordered">
                       	<thead>
                       		<tr>
                       			<th>JOb Task No.</th>
                       			<th>Title</th>
                       			<th>Course Designation</th>
                       			<th>Details</th>
                       		</tr>
                       	</thead>
                        <tbody>
                        @foreach($assoOjts as $info)
                       		<tr>
                       			<td>{{$info->job_task_no}}</td>
                       			<td><?php $title=CommonFunction::getOjtTitle($info->job_task_no);?>{{$title}}</td>
                       			<td>
								<?php $ojtL3=CommonFunction::ojtCourseStatus($info->itscn,$info->job_task_no,$emp_tracker,'L3');?>
                    			<?php $formalStatus=CommonFunction::formalCourseStatus($info->itscn,$emp_tracker);?>
								@if($formalStatus&&$ojtL3)
									<span style="color: green">Inspector</span>
								@else 
									<span style="color: red">Trainee</span>
								@endif

                       			</td>
                       			<td>{{ HTML::linkAction('itsOjtController@trineeSingleOjtCourse', 'View',array($info->itscn,$info->job_task_no,$emp_tracker), array('class' => '')) }}</td>
                       		</tr>
                       	@endforeach
                        
                        </tbody>
                    </table>
					
                </div>
                <!-- /.box-body -->
                               
               </div><!-- /.box -->
			</div>
</div>
</section>
@include('itsOjt/editForm')
@yield('updateCourseUpdate')
@stop