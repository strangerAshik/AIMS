@extends('layout')

@section('content')
<section class="content contentWidth">
<!--Formal Course description-->
	<div class="row" >
                      
		
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header  table_toggle expand">
				<div class="man pull-right" >-</div>
				<span class="box-title">
				<h3 >{{$its_course_number}} : {{$getCourseName}}</h3>

				<h4 >{{$its_job_task_no}}: {{$getOjtTitle}}  </h4>

				<h4> <i>Employee Name : {{CommonFunction::getEmployeeName($emp_tracker)}} </i> </h4
				</span>
									
							  </div>

							  
                <!-- /.box-header -->
				
					<div class="box-body">
					
                    <table class="table table-bordered">
                        <tbody>
                        
                          <tr >
                        	<th>Designation on This OJT</th>
                        	<?php $ojtL3=CommonFunction::ojtCourseStatus($its_course_number,$its_job_task_no,$emp_tracker,'L3');?>
                    			<?php $formalStatus=CommonFunction::formalCourseStatus($its_course_number,$emp_tracker);?>
							<td>
                        	@if($ojtd=='i')
                        		 <span class="inspector">Inspector</span>
                            @elseif($ojtd=='ii')
                            	 <span class="due">Refresher Due</span>
							@elseif($ojtd=='ii')
							      <span class="trainee">Trainee</span>

                        	@endif
                        	</td>
                        </tr>

                      

                        
                            <!--Level 1-->
                      @if($formal)
                      <?php $num=0;?>
                      @foreach($formal as $info)
                        
                            <tr id="formal{{$info->id}}">
                                <th class="col-md-12" colspan="2" style="background:#ddd">									
									Formal Course Details #{{++$num}}

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
                            <tr><td colspan="2"></td></tr>
								<tr style="background:#ddd">
                                <th class="col-md-3" >									
									Formal Course Status
								</th>
								<td>Not Done</td>
                                
                            </tr>
                            <tr><td colspan="2"></td></tr>
                            @endif
                      
                            <!--Level 1-->
                      @if($level1)
                      <?php $num=0;?>
                      @foreach($level1 as $info)
                        
                            <tr id="L1{{$info->id}}">
                                <th class="col-md-12" colspan="2" style="background:#ddd">									
									Level-1 Details #{{++$num}}

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
									 <a data-toggle="modal" data-target="#editLevel1{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
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
                            <tr><td colspan="2"></td></tr>
								<tr style="background:#ddd">
                                <th class="col-md-3" >									
									OJT Level #1 Status
								</th>
								<td>Not Done</td>
                                
                            </tr>
                            <tr><td colspan="2"></td></tr>
                            @endif
                      <!--Level 2-->
                      @if($level2)
                       <?php $num=0;?>
                      @foreach($level2 as $info)
                        
                            <tr id="L2{{$info->id}}>
                                <th class="col-md-12" colspan="2" style="background:#ddd">									
									Level-2 Details #{{++$num}}

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
									 <a data-toggle="modal" data-target="#editLevel2{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
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
									OJT Level #2 Status
								</th>
								<td>Not Done</td>
                                
                            </tr>
                            <tr><td colspan="2"></td></tr>
                            @endif
                      <!--Level 3-->
                      @if($level3)
                        <?php $num=0;?>
                      @foreach($level3 as $info)
                        
                            <tr id="L3{{$info->id}}">
                                <th class="col-md-12" colspan="2" style="background:#ddd">									
									Level-3 Details #{{++$num}}

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
									 <a data-toggle="modal" data-target="#editLevel3{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
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
									OJT Level #3 Status
								</th>
								<td>Not Done</td>
                                
                            </tr>
                            <tr><td colspan="2"></td></tr>
                            @endif
                           
                        
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