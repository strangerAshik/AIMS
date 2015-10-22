@extends('layout')
@section('content')
<section class='content widthController'>

         <div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
									
                                    <h3 class="box-title">Admin Tracking List</h3>
									<div class="col-md-4 col-md-offset-3  position">
										<form action="" class="search-form">
											<div class="form-group has-feedback">
												<label for="search" class="sr-only">Search</label>
												<input type="text" class="form-control" name="search" id="search" placeholder="search">
												<span class="glyphicon glyphicon-search form-control-feedback"></span>
											</div>
										</form>
									</div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
								
                                    <table class="table table-bordered">
										<thead>
											<tr>
												<th>No.</th>
												<th>Admin Track</th>
												<th>Initial Risk </th>
												<th>Tracking For</th>
												<th>View</th>
												<th>Update</th>
												<th>Delete</th>
											</tr>
										</thead>
										@foreach($infos as $info)
										<tbody>
											<tr>
												<td class='text-centre'>{{++$sl}}</td>
												<td class='text-centre'>{{$info->admin_track	}}</td>
												<td class='text-centre'>{{$info->initial_risk}}</td>
												<td class='text-centre'>{{$info->tracking_for}}</td>
												<td class='text-centre'>
													<a data-toggle="modal" data-target="#view{{$info->id}}" href='' style=''>
													<span class="glyphicons glyphicons-list-alt"></span>View
													</a>
												</td>
												<td class='text-centre'>
													<a data-toggle="modal" data-target="#edit{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
												</td>
												<td class='text-centre'>
													<a href="{{'deleteAdmin/'.$info->id}}" style='color:red;float:right;padding:5px;'><span class="glyphicon glyphicon-trash"></span></a>
												</td>
											</tr>
										</tbody>
										@endforeach
									</table>
									
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
      </div>    
	<!---Start View The Safety Concern--->
	@foreach($infos as $info)
	<div class="modal fade" id="view{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Admin Tracking Details</h4>
            </div>

            <div class="modal-body">
				   <table class="table table-bordered">
                                        <tbody>
										<tr>                                           
                                            <th colspan='2' >Admin Tracking #{{$info->admin_track}}
											
											<a href="{{'deleteAdmin/'.$info->id}}" style='color:red;float:right;padding:5px;'><span class="glyphicon glyphicon-trash"></span></a>
											<a data-toggle="modal" data-target="#edit{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
											</th>
                                        </tr>
                                        <tr>
                                           
                                            <td class="col-md-4">Admin Track</td>
                                            <td >{{$info->admin_track}}</td>
											                                          
                                        </tr>
										<tr>
											<td>Initial Risk</td>
											<td>{{$info->initial_risk}}</td>
										</tr>
                                        <tr>
											<td>Completion Status</td>
											<td>{{$info->completion_status}}</td>
										</tr>
										<tr>
											<td>Assigned To</td>
											<td>{{$info->assigned_to}}</td>
										</tr>
										<tr>
											<td>Start Date</td>
											<td>{{$info->start_date.' '.$info->start_month.' '.$info->start_year}}</td>
										</tr>
										<tr>
											<td>Target Date</td>
											<td>{{$info->target_date.' '.$info->target_month.' '.$info->target_year}}</td>
										</tr>
										<tr>
											<td>Date Completed</td>
											<td>{{$info->complete_date.' '.$info->complete_month.' '.$info->complete_year}}</td>
										</tr>
										<tr>
											<td>Organization</td>
											<td>{{$info->organization}}</td>
										</tr>
                                        <tr>
											<td>PEL Number</td>
											<td>{{$info->pel_number}}</td>
										</tr>
                                        <tr>
											<td>Aircraft Registration</td>
											<td>{{$info->aircraft_registration}}</td>
										</tr>
                                        
										
                                        <tr>
											<td>Other Entity</td>
											<td>{{$info->other_entry}}</td>
										</tr>
                                        <tr>
											<td>Tracking For</td>
											<td>{{$info->tracking_for}}</td>
										</tr>
                                        <tr>
											<td>Action Taken</td>
											<td>{{$info->action_taken}}</td>
										</tr> 
										<tr>
											<td>Record Id</td>
											<td>{{$info->record_id}}</td>
										</tr>
                                       
                                    </tbody>
								</table>
								
            </div><!-- /.box-body -->
        </div>    
    </div>    
 </div>		
 @endforeach
<!---End View The Safety Concern--->
<!--Start Editing -->	
@foreach($infos as $info)
<div class="modal fade" id="edit{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Admin Tracking</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'admin/update', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
						@if (Auth::check())						
							   {{Form::hidden('user_id',Auth::user()->id)}}							
						@endif
					{{Form::hidden('receipt_date',$toDay)}}
					{{Form::hidden('id',$info->id)}}
					<div class="form-group ">
                                        
											{{Form::label('admin_track', 'Admin Track #', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('admin_track', $info->admin_track , array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group">
                                        
											{{Form::label('initial_risk', 'Initial Risk', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('initial_risk', array('' => '--Select--', 'H-High Risk' => 'H-High Risk','M-Medium Risk'=>'M-Medium Risk','L-Low Risk'=>'L-Low Risk','N-No Risk'=>'N-No Risk'), $info->initial_risk ,array('class'=>'form-control','id'=>'category'))}}
											</div>
											
                    </div>
					
					<div class="form-group required">
                                        
											{{Form::label('completion_status', 'Completion Status', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('completion_status', array('' => '--Select--', 'R-Resolved' => 'R-Resolved','R-Open'=>'R-Open','X-Cancelled'=>'X-Cancelled','A-All Ready In Progress'=>'A-All Ready In Progress'), $info->completion_status ,array('class'=>'form-control','id'=>'category','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('assigned_to', 'Assigned To', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('assigned_to', array('Null' => '--Select--', 'Mr.X' => 'Mr.X','Mr.Y'=>'Mr.Y'), $info->assigned_to ,array('class'=>'form-control','id'=>'category'))}}
											</div>
											
                    </div>
					<div class="form-group ">
												
													{{Form::label('start_date', 'Start Date', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('start_date',$dates, $info->start_date ,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('start_month',$months, $info->start_month  ,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('start_year',$year,$info->start_year,array('class'=>'form-control'))}}
														</div>
													</div>
					</div>
					<div class="form-group ">
												
													{{Form::label('target_date', 'Target Date', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('target_date',$dates, $info->target_date ,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('target_month',$months,$info->target_month ,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('target_year',$year,
															$info->target_year ,array('class'=>'form-control'))}}
														</div>
													</div>
					</div>
					<div class="form-group ">
												
													{{Form::label('complete_date', 'Date Completed', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('complete_date',$dates, $info->complete_date ,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('complete_month',$months,$info->complete_month ,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('complete_year',$year,$info->complete_year ,array('class'=>'form-control'))}}
														</div>
													</div>
					</div>
					<div class="form-group ">
                                        
											{{Form::label('organization', 'Organization', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('organization', array('' => '--Select--'), $info->organization ,array('class'=>'form-control','id'=>'category'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('pel_number', 'PEL Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('pel_number',$info->pel_number , array('class' => 'form-control','placeholder'=>'',))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('aircraft_registration', 'Aircraft Registration', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('aircraft_registration', $info->aircraft_registration, array('class' => 'form-control','placeholder'=>'',))}}
											</div>
											
                    </div>
					<div class="form-group">
												
													{{Form::label('other_entry', 'Other Entity', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="col-xs-6">			
														
														{{Form::text('other_entry',$info->other_entry , array('class' => 'form-control','placeholder'=>''))}}
													</div>
														
					</div>
					<div class="form-group required">											
											{{Form::label('tracking_for', 'Tracking For', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::textarea('tracking_for',$info->tracking_for , array('class' => 'form-control','placeholder'=>'','size'=>'30x3','required'=>''))}}
											 </div>
					</div>
					<div class="form-group ">											
											{{Form::label('action_taken', 'Action Taken', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::textarea('action_taken', $info->action_taken , array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
											 </div>
					</div>
					
					<div class="form-group ">
                                        
											{{Form::label('record_id', 'Record Id', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('record_id',$info->record_id, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
                    <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                       
                    </div>
					{{Form::close()}}
            </div>
        </div>
    </div>
	</div>
</div>
@endforeach
<!--End  Editing -->	
                           
</section>
@stop