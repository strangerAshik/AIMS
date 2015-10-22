@extends('layout')
@section('content')
 
<section class="content" style="max-width:760px;margin:0 auto;">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Employee Assignment </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
					
					</div>
					<div class="box-body">
					@foreach($infos as $info)
                    <table class="table table-bordered">
                        <tbody>
						{{Employee::notApproved($info)}}	
                            <tr>
                                <th colspan="2">Employee Assignment #{{++$a_sl}}
                                    <a href="{{'deleteEnpVeri/'.$info->id}}" style='color:red;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                    <a data-toggle="modal" data-target="#{{'EV'.$info->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                </th>
                            </tr>
                            <tr>
                                <td class="col-md-4">Name</td>
                                <td >{{$info->name}}</td>
                            </tr>
                            <tr>
                                <td>Employee ID</td>
                                <td>{{Auth::user()->emp_id()}}</td>
                            </tr>
                            <tr>
                                <td>Date Of Entry</td>
                                <td>{{$info->entry_date." ".$info->entry_month." ".$info->entry_year}}</td>
                            </tr>
							<tr>
                                <td>Active</td>
                                <td> {{$info->active}}</td>
                            </tr>
                            <tr>
                                <td>Termination/ Separation Date</td>
                                  <td>{{$info->termination_date." ".$info->termination_month." ".$info->termination_year}}</td>
                            </tr>
                            <tr>
                                <td>Position </td>
                                <td>{{$info->position}}</td>
                            </tr>
							<tr>
                                <td>Assigned Task </td>
                                <td>{{$info->assigned_task}}</td>
                            </tr><tr>
                                <td>Assigned By </td>
                                <td>{{$info->assigned_by}}</td>
                            </tr>
							<tr>
                                <td>Note </td>
                                <td>{{$info->note}}
								</td>
                            </tr>
							
                        </tbody>
                    </table>
					@endforeach
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    <!--Button for popup-->
    <p class="text-center">
        <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#EmploymentDetails">Add New</button>
    </p>
    <!-- start of oppup content-->
    <div class="modal fade" id="EmploymentDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Employee Assignment </h4>
                </div>
                <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                 {{Form::open(array('url'=>'qualification/EmpVerification','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
                        
						<div class="form-group required">
                                           
											{{Form::label('name', 'Name', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('name','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
						
						<div class="form-group required">
												
													{{Form::label('entry_date', 'Date Of Entry', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('entry_date',$dates,'0',array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('entry_month',$months,'0',array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('entry_year', $years,'0',array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
						</div>
						<div class="form-group required">
                                           
											{{Form::label('active', 'Active', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> <label> {{ Form::radio('active', 'Yes',true) }} &nbsp  Yes</label>
									 <label> {{ Form::radio('active', 'No') }} &nbsp  No</label>
									</div>
									
								</div>
                        </div>
						<div class="form-group">
												
													{{Form::label('termination_date', 'Termination Date/ Separation Date', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
													
															{{Form::select('termination_date',$dates,'0',array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														
														{{Form::select('termination_month',$months,'0',array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															
															{{Form::select('termination_year', $years,'0',array('class'=>'form-control'))}}
														</div>
													</div>
						</div>
						<div class="form-group required">
                                           
											{{Form::label('position', 'Position', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('position','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
						<div class="form-group required" >											
											{{Form::label('assigned_task', 'Assigned Task', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('assigned_task','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1', 'required'=>''))}}
											</div>
					    </div>
						<div class="form-group required" >											
											{{Form::label('assigned_by', 'Assigned By', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('assigned_by','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1', 'required'=>''))}}
											</div>
					    </div>
						<div class="form-group " >											
											{{Form::label('note', 'Note', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('note','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
											</div>
					    </div>
						
					
                       
                        <div class="form-group">
                          
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                          
                        </div>
						{{Form::close()}}
                </div>
            </div>
        </div>
    </div>
	<!--------------------Start Update Pop up area--------------------------->
	 @foreach($infos as $info)
	 <div class="modal fade" id="{{'EV'.$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update Employee Assignment </h4>
                </div>
                <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                 {{Form::open(array('url'=>'qualification/updateEmpVerification','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
					 {{Form::hidden('id',$info->id)}}
						<div class="form-group required">
                                           
											{{Form::label('name', 'Name', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('name',$info->name, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
						
						<div class="form-group required">
												
													{{Form::label('entry_date', 'Date Of Entry', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('entry_date',$dates, $info->entry_date ,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('entry_month',$months, $info->entry_month ,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('entry_year', $years, $info->entry_year ,array('class'=>'form-control'))}}
														</div>
													</div>
						</div>
						<div class="form-group required">
                                           
											{{Form::label('active', 'Active', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> <label> {{ Form::radio('active', 'Yes') }} &nbsp  Yes</label>
									 <label> {{ Form::radio('active', 'No') }} &nbsp  No</label>
									</div>
									
								</div>
                        </div>
						<div class="form-group">
												
													{{Form::label('termination_date', 'Termination Date/ Separation Date', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
													
															{{Form::select('termination_date',$dates, $info->termination_date ,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														
														{{Form::select('termination_month',$months, $info->termination_month ,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															
															{{Form::select('termination_year', $years, $info->termination_year ,array('class'=>'form-control'))}}
														</div>
													</div>
						</div>
						<div class="form-group required">
                                           
											{{Form::label('position', 'Position', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('position', $info->position , array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
						<div class="form-group required" >											
											{{Form::label('assigned_task', 'Assigned Task', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('assigned_task',$info->assigned_task, array('class' => 'form-control','placeholder'=>'','size'=>'4x1', 'required'=>''))}}
											</div>
					    </div>
						<div class="form-group required" >											
											{{Form::label('assigned_by', 'Assigned By', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('assigned_by',$info->assigned_by, array('class' => 'form-control','placeholder'=>'','size'=>'4x1', 'required'=>''))}}
											</div>
					    </div>
						<div class="form-group " >											
											{{Form::label('note', 'Note', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('note', $info->note , array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
											</div>
					</div>
						
					
                       
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                        </div>
						{{Form::close()}}
                </div>
            </div>
        </div>
    </div>
	@endforeach
	<!--------------------End Update Pop up area--------------------------->
    <script>
$(document).ready(function(){
  
 
  
});
</script>



@stop