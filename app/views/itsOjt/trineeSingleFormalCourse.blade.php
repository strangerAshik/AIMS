@extends('layout')
@section('menue')

							&nbsp &nbsp <a  class="hidden-print" href="#formal" style="color:green" >[ Formal Course ] </a>

							

							&nbsp &nbsp <a  class="hidden-print"href="#" style="" data-toggle="modal" data-target="#updateFormalCourse">[ Update Formal Course ]</a>  

							
@stop
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

			

				<h4> <i>Employee Name : {{CommonFunction::getEmployeeName($emp_tracker)}} </i> </h4
		 		</span>
									
							  </div>

							  
                <!-- /.box-header -->
				
					<div class="box-body">
				
					
                    <table class="table table-bordered">
                        <tbody>
                
                        
                     <!--Menue-->
                    <tr id='formal'>
                    	<td colspan="2">@yield('menue')</td>
                    </tr>
                       
                      @if($formal)
                      <?php $num=0;?>
                      @foreach($formal as $info)
                        
                            <tr id="formal{{$info->id}}">
                                <th class="col-md-12" colspan="2" style="background:#ddd">									
									Formal Course Details #{{++$num}}

							<span class='hidden-print'>
							  
							    @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'par_delete'))
									{{ HTML::linkAction('BaseController@permanentDelete', 'P.D',array('itsojt_formal_ojt_course_status',$info->id,"formal$info->id"), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','title'=>'Permanent Delete')) }}
							  @endif
							  @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'sof_delete'))
									{{ HTML::linkAction('BaseController@softDelete', 'S.D',array('itsojt_formal_ojt_course_status',$info->id,"formal$info->id"), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','title'=>'Soft Delete')) }}
							   @endif
									
							@if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'approve'))
                                  
									{{ HTML::linkAction('BaseController@approve', '',array('itsojt_formal_ojt_course_status',$info->id,"formal$info->id"), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;','title'=>'Approval')) }}
								
									
									{{ HTML::linkAction('BaseController@notApprove', '',array('itsojt_formal_ojt_course_status',$info->id,"formal$info->id"), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;','title'=>'Disapproval')) }}
								@endif
							@if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'worning'))
									{{ HTML::linkAction('BaseController@removeWarning', '',array('itsojt_formal_ojt_course_status',$info->id,"formal$info->id"), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;','title'=>'Warning')) }}
									{{ HTML::linkAction('BaseController@warning', '',array('itsojt_formal_ojt_course_status',$info->id,"formal$info->id"), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;','title'=>'Remove Warning')) }}
							@endif
							@if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'update'))
									 <a title='Edit' data-toggle="modal" data-target="#editFormal{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
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
                            @if($info->completion_status=='Yes')
                            <tr>
                                <th class="col-md-3">									
									Validity
								</th>
                                <td>{{$info->validity_date}}</td>
                            </tr>
                            @endif
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
                            <tr>
						   		<td colspan="2">
						   			<i>Initialized By : {{$info->row_creator}} | 
						   			Initialized at : {{$info->created_at}} | 
						   			Last Updated By : {{$info->row_updator}} | 
						   			Updated at : {{$info->updated_at}}</i>
						   		</td>
						   		
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
                      
                        </tbody>
                    </table>
					
                </div>
                <!-- /.box-body -->
                               
                            </div><!-- /.box -->
</div>
		

@include('common')
@yield('print')
</div>
</section>


@include('itsOjt/editForm')
@yield('updateCourseUpdate')
<!--Update FormalCourse-->
<div class="modal fade" id="updateFormalCourse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Formal Course Status</h4>
            </div>

            <div class="modal-body"> 
                              
				{{Form::open(array('url'=>'itsOjt/updateFormalOjtStatus','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>'true'))}}
				{{Form::hidden('emp_tracker',$emp_tracker)}}
				{{Form::hidden('itscn',$its_course_number)}}
				{{Form::hidden('level','formal')}}
				  <div class="form-group required">
                                           
											{{Form::label('instructor', 'Instructor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('instructor','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                     <div class="form-group required">
                                           
											{{Form::label('supervisor', 'Supervisor', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('supervisor','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                   				
                     <div class="form-group required">
                                           
											{{Form::label('manager', 'Manager', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('manager','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
                    <div class="form-group required">
	                                           
												{{Form::label('start_date', 'Start Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('start_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('start_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('start_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
                    <div class="form-group required">
	                                           
												{{Form::label('completion_date', 'Completion Date', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('completion_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('completion_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('completion_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
                    <div class="form-group required">
	                                           
												{{Form::label('validity_date', 'Validity', array('class' => 'col-xs-4 control-label'))}}
												
														<div class="row">
															<div class="col-xs-2">
															{{Form::select('validity_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
															</div>
															<div class="col-xs-3">
															{{Form::select('validity_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
												
																
															</div>
															<div class="col-xs-2">
																{{Form::select('validity_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
															</div>
														</div>
												
	                </div>	
	                 <div class="form-group required">
                                           
											{{Form::label(' completion_status', ' Completion Status', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											<div class="radio">									 
											  <label> {{ Form::radio('completion_status', 'Yes',true) }} &nbsp  Passed</label>
											 <label> {{ Form::radio('completion_status', 'No') }} &nbsp  Failed</label>
										</div>
											</div>
											
                    </div>		
                    <div class="form-group ">
                                           
											{{Form::label('upload_certificate', 'Upload Certificate', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::file('certificate',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
											</div>
											
                    </div>
                    <div class="form-group ">
                                           
											{{Form::label('comment', 'Comment', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('notes','',array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
											</div>
											
                    </div>
                   
                   
                   
					 
						
					
					<div class="form-group">
                       
                            <button type="submit"  value='' class="btn btn-primary btn-lg btn-block">Save</button>
                       
                    </div>
					</div>
					{{Form::close()}}
            </div>
        </div>
    </div>
</div>

@stop

