@extends('layout')
@section('content')
 
<section class="content contentWidth">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Technical Licence Record</h3>
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
                                <th colspan='2'>LICENSE  #{{++$a_sl}}
                                    <a onclick=" return confirm('Wanna Delete?')"  href="{{'deleteTechlicence/'.$info->id}}" style='color:red;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                    <a data-toggle="modal" data-target="#{{'TL'.$info->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                </th>
                            </tr>
                            <tr>
                                <td class='col-md-4'>Active</td>
                                <td >{{$info->active}}</td>
                            </tr>
                            <tr>
                                <td>Licence Number</td>
                                <td>{{$info->licence_no}}</td>
                            </tr>
                            <tr>
                                <td> Licence Type</td>
                                <td> {{$info->licence_type}}</td>
                            </tr>
							<tr>
                                <td>Issue Date</td>
                                <td> {{$info->issue_date.' '.$info->issue_month.' '.$info->issue_year}}</td>
                            </tr>
                            <tr>
                                <td>Expiration Date</td>
                                <td>{{$info->expiration_date.' '.$info->expiration_month.' '.$info->expiration_year}}</td>
                            </tr>
                            <tr>
                                <td>Rating </td>
                                <td>{{$info->rating}}</td>
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
                    <h4 class="modal-title">Add Technical Licence Record </h4>
                </div>
                <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                  
					{{Form::open(array('url'=>'qualification/saveTechnicalLicence','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
                        <div class="form-group required">
                                           
											{{Form::label('', 'Active', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> <label> {{ Form::radio('active', 'Yes',true) }} &nbsp  Yes</label>
									 <label> {{ Form::radio('active', 'No') }} &nbsp  No</label>
									</div>
									
								</div>
                        </div>
						<div class="form-group required">
                                           
											{{Form::label('licence_no', 'Licence Number', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('licence_no','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
						<div class="form-group required">
                                           
											{{Form::label('licence_type', 'Licence Type', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('licence_type','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
						<div class="form-group required">
												
													{{Form::label('issue_date', 'Issue Date', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('issue_date',$dates, '0',array('class'=>'form-control','required'=>''))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('issue_month',$months,'0',array('class'=>'form-control','required'=>''))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('issue_year',$years,'0',array('class'=>'form-control','required'=>''))}}
														</div>
													</div>
						</div>
						<div class="form-group">
												
													{{Form::label('expiration_date', 'Expiration Date', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('expiration_date',$dates, '0',array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														
														{{Form::select('expiration_month',$months,'0',array('class'=>'form-control'))}}
															
														</div>
														<div class="col-xs-2">
															
															{{Form::select('expiration_year',$years_from,'0',array('class'=>'form-control'))}}
														</div>
													</div>
						</div>
						<div class="form-group " >											
											{{Form::label('rating', 'Rating', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('rating','', array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
											</div>
					</div>
						
					
                       
                        <div class="form-group">
                            <div class="col-xs-5 col-xs-offset-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
						{{Form::close()}}
                </div>
            </div>
        </div>
    </div>
	<!-----------Start Update Pop up---------------->
	@foreach($infos as $info)
	<div class="modal fade" id="{{'TL'.$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update Technical Licence Record </h4>
                </div>
                <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                  {{Form::open(array('url'=>'qualification/updateTechnicalLicence','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
					  {{Form::hidden('id',$info->id)}}
                        <div class="form-group required">
                                           
											{{Form::label('', 'Active', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
										<div class="radio">
									 
									  <label> {{ Form::radio('active', 'Yes',Input::old('active', $info->active=='Yes'),array()) }} &nbsp  Yes</label>
									 <label> {{ Form::radio('active', 'No',Input::old('active', $info->active == 'No'),array()) }} &nbsp  No</label>
									</div>
									
								</div>
                        </div>
						<div class="form-group required">
                                           
											{{Form::label('licence_no', 'Licence Number', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('licence_no',$info->licence_no, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
						<div class="form-group required">
                                           
											{{Form::label('licence_type', 'Licence Type', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('licence_type',$info->licence_type, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
						<div class="form-group required">
												
													{{Form::label('issue_date', 'Issue Date', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('issue_date',$dates, $info->issue_date ,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														{{Form::select('issue_month',$months, $info->issue_month ,array('class'=>'form-control'))}}
											
															
														</div>
														<div class="col-xs-2">
															{{Form::select('issue_year',$years, $info->issue_year ,array('class'=>'form-control'))}}
														</div>
													</div>
						</div>
						<div class="form-group">
												
													{{Form::label('expiration_date', 'Expiration Date', array('class' => 'col-xs-4 control-label'))}}
												
													<div class="row">
														<div class="col-xs-2">
														{{Form::select('expiration_date',$dates, $info->expiration_date ,array('class'=>'form-control'))}}
														</div>
														<div class="col-xs-3">
														
														{{Form::select('expiration_month',$months, $info->expiration_month ,array('class'=>'form-control'))}}
															
														</div>
														<div class="col-xs-2">
															
															{{Form::select('expiration_year',$years_from, $info->expiration_year ,array('class'=>'form-control'))}}
														</div>
													</div>
						</div>
						<div class="form-group " >											
											{{Form::label('rating', 'Rating', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::textarea('rating',$info->rating , array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
											</div>
					</div>
						
					
                       
                        <div class="form-group">
                            <div class="col-xs-5 col-xs-offset-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
						{{Form::close()}}
                </div>
            </div>
        </div>
    </div>
	@endforeach
	<!-----------End Update Pop up---------------->
    <script>
$(document).ready(function(){
  
 
  
});
</script>



@stop