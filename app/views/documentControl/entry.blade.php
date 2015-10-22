@extends('layout')
@section('content')
<div class='content' style="max-width:760px;margin:0 auto;">
<div class="row">
	 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							 <div class="box-header">
									<h3 class="box-title">Instructions</h3>
							  </div>
                <!-- /.box-header -->
				
					<div class="box-body">
						<table class='table table-bordered'>
							<tr>
								<td class="col-md-3">Instruction 1</td>
							<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id posuere mauris. montes, nascetur</td>
							</tr>							
							<tr>
								<td class="col-md-3" >Instruction 2</td>
								<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id posuere mauris. Quisque mi enim, interdum </td>
							</tr>
							
						</table>
					
					</div>
                <!-- /.box-body -->
                               
                            </div><!-- /.box -->
						
	<p class="text-center">
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#safety">Issue New Document Control</button>	
	</p>
	</div>
</div>
<div class="modal fade" id="safety" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Entry New Document </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'doc/save', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form', 'files'=>true))}}
						@if (Auth::check())						
							  {{Form::hidden('user_id',Auth::user()->id)}}		   						
						@endif
					
					<div class="form-group required">
					
                                           
											{{Form::label('active', 'Active', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> <label> {{ Form::radio('active', 'Yes') }} &nbsp  Yes</label>
									 <label> {{ Form::radio('active', 'No') }} &nbsp  No</label>
									</div>
									
								</div>
                        </div>
					<div class="form-group ">
                                        
											{{Form::label('record_id', 'Record ID', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('record_id','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('control_number', 'Control Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('control_number','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('safety_issue', 'Safety Issue #', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('safety_issue','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
												
													{{Form::label('document_date', 'Document Date', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('document_date',$dates,date('d'),array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('document_month',$months,date('F'),array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('document_year',$year,date('Y'),array('class'=>'form-control'))}}
														</div>
													</div>
					</div>
					<div class="form-group required ">
                                        
											{{Form::label('document_type', 'Document Type', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('document_type', array('Null' => '--Select--', 'Investigation' => 'Investigation',
											'Approval'=>'Approval',
											'Application'=>'Application',
											'Authorization'=>'Authorization',
											'Check List'=>'Check List',
											'Ops Specs'=>'Ops Specs',
											'Report'=>'Report',
											'Resolution'=>'Resolution',
											), 0,array('class'=>'form-control','id'=>'category','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('technical_area', 'Technical Area', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('technical_area', array('' => '--Select--', 'Accident' =>'Accident',
											'Aerodromes'=>'Aerodromes',
											'Air Traffic'=>'Air Traffic',
											'Avionics'=>'Avionics',
											'Dangerous Goods'=>'Dangerous Goods',
											'Incident'=>'Incident',
											'Licensing'=>'Licensing',
											'Maintenance'=>'Maintenance',
											'Medical'=>'Medical',
											'Operation'=>'Operation',
											
											), 0,array('class'=>'form-control','id'=>'category','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('signed_by', 'Signed By', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('signed_by', array('Null' => '--Select--', 'Mr.X' => 'Mr.X','Mr.Y'=>'Mr.Y'), 0,array('class'=>'form-control','id'=>'category','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('inspector', 'Inspector', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('inspector', array('Null' => '--Select--', 'Mr.X' => 'Mr.X','Mr.Y'=>'Mr.Y'), 0,array('class'=>'form-control','id'=>'category'))}}
					</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('organization', 'Organization', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('organization','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('project_number', 'Project Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('project_number','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('aircraft_registration', 'Aircraft Registration', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('aircraft_registration','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('pel_number', 'PEL Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('pel_number','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('employee_id', 'Employee ID', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('employee_id','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('investigation_number', 'Investigation Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('investigation_number','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					
					<div class="form-group required">											
											{{Form::label('subject', 'Subject', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::textarea('subject','', array('class' => 'form-control','placeholder'=>'','size'=>'30x3','required'=>''))}}
											 </div>
				  </div>
				  <div class="form-group">											
											{{Form::label('summary_or_keyword', 'Summary Or Keyword', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::textarea('summary_or_keyword','', array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
											 </div>
				  </div>
					
					<div class="form-group">
                                           
                                            
											 {{ Form::label('pdf', 'Upload PDF Document: ',array('class'=>'control-label col-xs-4')) }}
											 <div class="col-xs-6">
											 {{ Form::file('pdf') }}
											 
											 
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
</div>
@stop