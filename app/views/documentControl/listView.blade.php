@extends('layout')
@section('content')
<section class='content' style="max-width:900px;margin:0 auto;">

    <div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
									
                                    <h3 class="box-title">Document Control</h3>
									
											
                                <div class="row col-md-12 pull-right">
										<div class="radio col-md-12">
											<div class='col-md-4'>
											<button class='btn btn-success btn-sm'id="active" onclick='active()'>Active</button>
											<button class='btn btn-danger btn-sm'id="inactive" onclick='inactive()'>Inactive</button>
											<button class='btn btn-primary btn-sm'id="all" onclick='allView()'>All</button>
											</div>
											<form action="" class="search-form ">
											
											<div class='col-md-4'>
											{{Form::select('document_type', array('Null' => '--Select Search Area--', '' => '',''=>''),0,array('class'=>'form-control','id'=>'category','required'=>''))}}
										
											</div>
											<div class="position_for_doc pull-left col-md-3">
											
												<div class="form-group has-feedback">
													<label for="search" class="sr-only">Search</label>
													<input type="text" class="form-control" name="search" id="search" placeholder="Search For">
													<span class="glyphicon glyphicon-search form-control-feedback"></span>
											</div>											
											</div>
											
												
													<button type="submit" class="btn btn-primary">Search</button>
											   
											
											</form>
										</div>
										
										
								</div>
									
								</div>
                       
									
                                <div class="box-body">
								
                                    <table class="table table-bordered">
										<thead>
											<tr>
												<th>Date</th>
												<th>Control</th>
												<th>Active</th>
												<th>Type</th>
												<th>Speciality</th>
												<th>ORG</th>
												<th>Subject</th>
												<th>View</th>
												<th>Update</th>
												<th>Delete</th>
											</tr>
										</thead>
										<!----All Document List----->
										
										<tbody id='allView' style="display:none">
										@foreach($infos as $info)
											<tr>
												<td class='text-centre'>{{$info->document_date. " " .$info->document_month. " " .$info->document_year }}</td>
												<td class='text-centre'>{{$info->control_number	}}</td>
												<td class='text-centre'>{{$info->active}}</td>
												<td class='text-centre'>{{$info->document_type}}</td>
												<td class='text-centre'>Undefined</td>
												<td class='text-centre'>{{$info->organization}}</td>
												<td class='text-centre'>{{$info->subject}}</td>
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
													<a href="{{'delete/'.$info->id}}" style='color:red;float:right;padding:5px;'><span class="glyphicon glyphicon-trash"></span>
													</a>
												</td>
											</tr>
										@endforeach
										</tbody>
									
										<!----End All Document List----->
										<!----Active Document List----->
										<tbody id='activeView'>
										@foreach($actives as $info)
											<tr>
												<td class='text-centre'>{{$info->document_date. " " .$info->document_month. " " .$info->document_year }}</td>
												<td class='text-centre'>{{$info->control_number	}}</td>
												<td class='text-centre'>{{$info->active}}</td>
												<td class='text-centre'>{{$info->document_type}}</td>
												<td class='text-centre'>Undefined</td>
												<td class='text-centre'>{{$info->organization}}</td>
												<td class='text-centre'>{{$info->subject}}</td>
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
													<a href="{{'delete/'.$info->id}}" style='color:red;float:right;padding:5px;'><span class="glyphicon glyphicon-trash"></span>
													</a>
												</td>
											</tr>
										@endforeach
										</tbody>
										<!----End Active Document List----->
										<!----Inactive Document List----->
										<tbody id='inactiveView' style="display:none;">
										@foreach($inactives as $info)
											<tr>
												<td class='text-centre'>{{$info->document_date. " " .$info->document_month. " " .$info->document_year }}</td>
												<td class='text-centre'>{{$info->control_number	}}</td>
												<td class='text-centre'>{{$info->active}}</td>
												<td class='text-centre'>{{$info->document_type}}</td>
												<td class='text-centre'>Undefined</td>
												<td class='text-centre'>{{$info->organization}}</td>
												<td class='text-centre'>{{$info->subject}}</td>
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
													<a href="{{'delete/'.$info->id}}" style='color:red;float:right;padding:5px;'><span class="glyphicon glyphicon-trash"></span>
													</a>
												</td>
											</tr>
										@endforeach
										</tbody>
										<!----End Inactive Document List----->
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
                <h4 class="modal-title">Document Details</h4>
            </div>

            <div class="modal-body">
				   <table class="table table-bordered">
                                        <tbody>
										<tr>                                           
                                            <th colspan='2' >Document #{{$info->record_id}}
											
											<a href="{{'delete/'.$info->id}}" style='color:red;float:right;padding:5px;'><span class="glyphicon glyphicon-trash"></span></a>
											<a data-toggle="modal" data-target="#edit{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
											</th>
                                        </tr>
                                        <tr>
                                           
                                            <td class="col-md-4">Active</td>
                                            <td >{{$info->active}}</td>
											                                          
                                        </tr>
										<tr>
											<td>Record ID</td>
											<td>{{$info->record_id}}</td>
										</tr>
                                        <tr>
											<td>Control Number</td>
											<td>{{$info->control_number}}</td>
										</tr>
										<tr>
											<td>Safety Issue</td>
											<td>{{$info->safety_issue}}</td>
										</tr>
										<tr>
											<td>Document Date</td>
											<td>{{$info->document_date.' '.$info->document_month.' '.$info->document_year}}</td>
										</tr>
										<tr>
											<td>Document Type</td>
											<td>{{$info->document_type}}</td>
										</tr>
										<tr>
											<td>Technical Area</td>
											<td>{{$info->technical_area}}</td>
										</tr>
										<tr>
											<td>Signed By</td>
											<td>{{$info->signed_by}}</td>
										</tr>
                                        <tr>
											<td>Inspector</td>
											<td>{{$info->inspector}}</td>
										</tr>
                                        <tr>
											<td>Organization</td>
											<td>{{$info->organization}}</td>
										</tr>
										<tr>
											<td>Project Number</td>
											<td>{{$info->project_number}}</td>
										</tr>
										<tr>
											<td>Aircraft Registration</td>
											<td>{{$info->aircraft_registration}}</td>
										</tr>
                                        <tr>
											<td>PEL Number</td>
											<td>{{$info->pel_number}}</td>
										</tr>
                                        <tr>
											<td>Employee ID</td>
											<td>{{$info->employee_id}}</td>
										</tr>
										<tr>
											<td>Investigation Number</td>
											<td>{{$info->investigation_number}}</td>
										</tr>
										<tr>
											<td>Subject</td>
											<td>{{$info->subject}}</td>
										</tr>
										<tr>
											<td>Summary Or Keyword</td>
											<td>{{$info->summary_or_keyword}}</td>
										</tr>
										<tr>
											<td>Uploaded Document</td>
											<td>
											@if($info->pdf!='Null'){{HTML::link('files/Document/'.$info->pdf,'Document',array('target'=>'_blank'))}}
											@else
												{{HTML::link('#','No Document Provided')}}
											@endif
												</td>
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
                <h4 class="modal-title">Entry New Document </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'doc/update', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form', 'files'=>true))}}
						@if (Auth::check())						
							   {{Form::hidden('user_id',Auth::user()->id)}}	
						
						@endif
					{{Form::hidden('old_file',$info->pdf)}}	
					{{Form::hidden('id',$info->id)}}				
					
					<div class="form-group required">
					
                                           
											{{Form::label('active', 'Active', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									   <label> {{ Form::radio('active', 'Yes',Input::old('active', $info->active=='Yes'),array()) }} &nbsp  Yes</label>
									 <label> {{ Form::radio('active', 'No',Input::old('active', $info->active == 'No'),array()) }} &nbsp  No</label>
									</div>
									
								</div>
                        </div>
					<div class="form-group ">
                                        
											{{Form::label('record_id', 'Record ID', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('record_id', $info->record_id , array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('control_number', 'Control Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('control_number',$info->control_number , array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('safety_issue', 'Safety Issue', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('safety_issue', $info->safety_issue , array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
												
													{{Form::label('document_date', 'Document Date', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('document_date',$dates,$info->document_date,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('document_month',$months, $info->document_month ,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('document_year',$year, $info->document_year ,array('class'=>'form-control'))}}
														</div>
													</div>
					</div>
					<div class="form-group required ">
                                        
											{{Form::label('document_type', 'Document Type', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('document_type', array('Null' => '--Select--', 'Mr.X' => 'Mr.X','Mr.Y'=>'Mr.Y'), $info->document_type ,array('class'=>'form-control','id'=>'category','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('technical_area', 'Technical Area', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('technical_area', array('' => '--Select--', 'R-Resolved' => 'R-Resolved','R-Open'=>'R-Open','X-Cancelled'=>'X-Cancelled','A-All Ready In Progress'=>'A-All Ready In Progress'), $info->technical_area ,array('class'=>'form-control','id'=>'category','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('signed_by', 'Signed By', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('signed_by', array('Null' => '--Select--', 'Mr.X' => 'Mr.X','Mr.Y'=>'Mr.Y'), $info->signed_by ,array('class'=>'form-control','id'=>'category','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('inspector', 'Inspector', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('inspector', array('Null' => '--Select--', 'Mr.X' => 'Mr.X','Mr.Y'=>'Mr.Y'), $info->inspector ,array('class'=>'form-control','id'=>'category'))}}
					</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('organization', 'Organization', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('organization', $info->organization , array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('project_number', 'Project Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('project_number', $info->project_number , array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('aircraft_registration', 'Aircraft Registration', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('aircraft_registration',$info->aircraft_registration , array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('pel_number', 'PEL Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('pel_number', $info->pel_number , array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('employee_id', 'Employee ID', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('employee_id',$info->employee_id, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group ">
                                        
											{{Form::label('investigation_number', 'Investigation Number', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('investigation_number',$info->investigation_number, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					
					
					<div class="form-group required">											
											{{Form::label('subject', 'Subject', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::textarea('subject',$info->subject , array('class' => 'form-control','placeholder'=>'','size'=>'30x3','required'=>''))}}
											 </div>
				  </div>
				  <div class="form-group">											
											{{Form::label('summary_or_keyword', 'Summary Or Keyword', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::textarea('summary_or_keyword',$info->summary_or_keyword , array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
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
	@endforeach
<!--End  Editing -->	

 <script>

	function active(){
	 $('#activeView').show();
	 $('#inactiveView').hide();
	 $('#allView').hide();
	};
	function inactive(){
     $('#activeView').hide();
	 $('#inactiveView').show();
	 $('#allView').hide();
	}
	function allView(){
		 $('#activeView').hide();
	 $('#inactiveView').hide();
	 $('#allView').show();
	}
</script>
          
</section>

@stop