@extends('layout')

@section('content')
<section calss="content contentWidth">
<div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
									<div class="col-md-6 ">
                                    <h3 class="box-title">Employee Details</h3>

									</div>
									
									
                                </div><!-- /.box-header -->
                               
                                <div class="box-body">
								
                                    <table id="example1" class="table table-bordered table-striped">
										
										<tbody>
									@foreach ( $traineeInfo as $info)
											<tr>
												<th class="col-md-12" colspan="2" style="background:#ddd">									
									

							<span class='hidden-print'>
							  
							    @if('true'==CommonFunction::hasPermission('its_add_trainee',Auth::user()->emp_id(),'par_delete'))
									{{ HTML::linkAction('BaseController@permanentDelete', 'P.D',array('itsojt_trainee',$info->id,"L3$info->id"), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','title'=>'Permanent Delete','onclick'=>" return confirm('Wanna Delete?')")) }}
							  @endif
							  @if('true'==CommonFunction::hasPermission('its_add_trainee',Auth::user()->emp_id(),'sof_delete'))
									{{ HTML::linkAction('BaseController@softDelete', 'S.D',array('itsojt_trainee',$info->id,"L3$info->id"), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','title'=>'Soft Delete','onclick'=>" return confirm('Wanna Delete?')")) }}
							   @endif
									
							@if('true'==CommonFunction::hasPermission('its_add_trainee',Auth::user()->emp_id(),'approve'))
                                  
									{{ HTML::linkAction('BaseController@approve', '',array('itsojt_trainee',$info->id,"L3$info->id"), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;','title'=>'Approval')) }}
								
									
									{{ HTML::linkAction('BaseController@notApprove', '',array('itsojt_trainee',$info->id,"L3$info->id"), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;','title'=>'Disapproval')) }}
								@endif
							@if('true'==CommonFunction::hasPermission('its_add_trainee',Auth::user()->emp_id(),'worning'))
									{{ HTML::linkAction('BaseController@removeWarning', '',array('itsojt_trainee',$info->id,"L3$info->id"), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;','title'=>'Warning')) }}
									{{ HTML::linkAction('BaseController@warning', '',array('itsojt_trainee',$info->id,"L3$info->id"), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;','title'=>'Remove Warning')) }}
							@endif
							@if('true'==CommonFunction::hasPermission('its_add_trainee',Auth::user()->emp_id(),'update'))
									 <a title='Edit' data-toggle="modal" data-target="#editTainee{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
								@endif
							     
							  </span>
								</th> 
											</tr>
											<tr >											
												<th class="col-md-5">Employee Name</th>
												<td>{{$info->employee_name}}</td>
											</tr>
											<tr>
												<th>Employee ID</th>
												<td>{{$info->employee_id}}</td>
										    </tr>
										    <tr>
												<th>Employee's Speciality</th>
												<td>{{$info->employees_speciality}}</td>
											</tr>
											<tr>
												<th>Hire Date</th>
												<td>{{$info->hire_date}}</td>
											</tr>
											<tr>
												<th>Hiring Criteria</th>
												<td>{{nl2br($info->hiring_criteria)}}</td>
											</tr>
											<tr>
												<th>Current Position</th>
												<td>{{$info->current_position}}</td>
											</tr>
											<tr>
												<th>Position Description</th>
												<td>{{nl2br($info->position_description)}}</td>
											</tr>
										@endforeach
										</tbody>

										</table>
						    </div>
					</div>
				</div>
	       </div>
	@include('itsOjt/editForm')
	@yield('editTrainee')
</section>

@stop