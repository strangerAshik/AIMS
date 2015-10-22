@extends('layout')
@section('content')
<div class='content' style="max-width:760px;margin:0 auto;">
<div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Opened Admin Tracking</h3>
                </div>
            	<div class="box-body">
				
                    <table class="table table-bordered">
                        <tbody>
                            
                            <tr>
                                <td class='col-md-4'>High Risk Issue('s)</td>
                                <td class='col-md-2'>{{$OH}}</td>
                            </tr>
                            <tr>
                                <td>Medium Risk Issue('s)</td>
                                <td>{{$OM}}</td>
                            </tr>
                            <tr>
                                <td>Low Risk Issue('s)</td>
                                <td>{{$OL}}</td>
                            </tr>
							<tr>
                                <td>No Risk Issue('s)</td>
                                <td>{{$ON}}</td>
                            </tr>
                          </tbody>
                    </table>
					
                </div>
                <!-- /.box-body -->
            </div>
        </div>
		<div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">In Progress Admin Tracking</h3>
                </div>
            	<div class="box-body">
				
                    <table class="table table-bordered">
                        <tbody>
                            
                            <tr>
                                <td class='col-md-4'>High Risk Issue('s)</td>
                                <td class='col-md-2'>{{$AH}}</td>
                            </tr>
                            <tr>
                                <td>Medium Risk Issue('s)</td>
                                <td>{{$AM}}</td>
                            </tr>
                            <tr>
                                <td>Low Risk Issue('s)</td>
                                <td>{{$AL}}</td>
                            </tr>
							<tr>
                                <td>No Risk Issue('s)</td>
                                <td>{{$AN}}</td>
                            </tr>
                          </tbody>
                    </table>
					
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>


<p class="text-center">
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#safety">Entry Admin Tracking</button>
	
</p>
</div>
<!-- start of oppup content-->
<div class="modal fade" id="safety" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Entry Admin Tracking</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'admin/save', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
						@if (Auth::check())						
							   {{Form::hidden('user_id',Auth::user()->id)}}							
						@endif
					{{Form::hidden('receipt_date',$toDay)}}
					<div class="form-group ">
                                        
											{{Form::label('admin_track', 'Admin Track #', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('admin_track','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group">
                                        
											{{Form::label('initial_risk', 'Initial Risk', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('initial_risk', array('' => '--Select--', 'H-High Risk' => 'H-High Risk','M-Medium Risk'=>'M-Medium Risk','L-Low Risk'=>'L-Low Risk','N-No Risk'=>'N-No Risk'), 0,array('class'=>'form-control','id'=>'category'))}}
											</div>
											
                    </div>
					
					<div class="form-group required">
                                        
											{{Form::label('completion_status', 'Completion Status', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('completion_status', array('' => '--Select--', 'R-Resolved' => 'R-Resolved','R-Open'=>'R-Open','X-Cancelled'=>'X-Cancelled','A-All Ready In Progress'=>'A-All Ready In Progress'), 0,array('class'=>'form-control','id'=>'category','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('assigned_to', 'Assigned To', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('assigned_to', array('Null' => '--Select--', 'Mr.X' => 'Mr.X','Mr.Y'=>'Mr.Y'), 0,array('class'=>'form-control','id'=>'category'))}}
											</div>
											
                    </div>
					<div class="form-group ">
												
													{{Form::label('start_date', 'Start Date', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('start_date',$dates,'0',array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('start_month',$months,'0',array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('start_year',$year,'01',array('class'=>'form-control'))}}
														</div>
													</div>
					</div>
					<div class="form-group ">
												
													{{Form::label('target_date', 'Target Date', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('target_date',$dates,'0',array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('target_month',$months,'0',array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('target_year',$year,'01',array('class'=>'form-control'))}}
														</div>
													</div>
					</div>
					<div class="form-group ">
												
													{{Form::label('complete_date', 'Date Completed', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('complete_date',$dates,'0',array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('complete_month',$months,'0',array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('complete_year',$year,'01',array('class'=>'form-control'))}}
														</div>
													</div>
					</div>
					<div class="form-group ">
                                        
											{{Form::label('organization', 'Organization', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('organization', array('' => '--Select--'), 0,array('class'=>'form-control','id'=>'category'))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('pel_number', 'PEL Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('pel_number','', array('class' => 'form-control','placeholder'=>'',))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('aircraft_registration', 'Aircraft Registration', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('aircraft_registration','', array('class' => 'form-control','placeholder'=>'',))}}
											</div>
											
                    </div>
					<div class="form-group">
												
													{{Form::label('other_entry', 'Other Entity', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="col-xs-6">			
														
														{{Form::text('other_entry','', array('class' => 'form-control','placeholder'=>''))}}
													</div>
														
					</div>
					<div class="form-group required">											
											{{Form::label('tracking_for', 'Tracking For', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::textarea('tracking_for','', array('class' => 'form-control','placeholder'=>'','size'=>'30x3','required'=>''))}}
											 </div>
					</div>
					<div class="form-group ">											
											{{Form::label('action_taken', 'Action Taken', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::textarea('action_taken','', array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
											 </div>
					</div>
					
					<div class="form-group ">
                                        
											{{Form::label('record_id', 'Record Id', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('record_id','', array('class' => 'form-control','placeholder'=>''))}}
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
	
@stop