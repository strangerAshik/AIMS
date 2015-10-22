@extends('layout')
@section('content')
 
<section class="content" style="max-width:760px;margin:0 auto;">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Reference</h3>
                </div>
                <!-- /.box-header -->
               
					<div class="box-body">
					@foreach($infos as $info)
                    <table class="table table-bordered">
                        <tbody>
						{{Employee::notApproved($info)}}	
                            <tr>
                                <th colspan='2' >Reference  #{{++$a_sl}}
                                    <a href="{{'deleteReference/'.$info->id}}" style='color:red;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                    <a data-toggle="modal" data-target="#{{'R'.$info->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                </th>
                            </tr>
                            <tr>
                                <td class="col-md-4">Referee Type</td>
                                <td >{{$info->referee_type}}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{$info->name}}</td>
                            </tr>
                            <tr>
                                <td>Designation</td>
                                <td> {{$info->designation}}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{$info->address}}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{$info->telephone}}</td>
                            </tr>
							<tr>
                                <td>Email</td>
                                <td>{{$info->email_address}}</td>
                            </tr>							
							<tr>
                                <td>Year Acquainted</td>
                                <td>{{$info->years_acquainted}}</td>
                            </tr>
							<tr>
                                <td>May we request a reference</td>
                                <td>{{$info->may_we_request}}</td>
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
                    <h4 class="modal-title">Add Reference </h4>
                </div>
                <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                    {{Form::open(array('url'=>'qualification/saveReference','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
                        <div class="form-group required">
                                        
											{{Form::label('referee_type', 'Referee type', array('class' => 'col-xs-4 control-label'))}}
											
                            <div class="col-xs-6">
											{{Form::select('referee_type', array('' => '--Select--', 'Present supervisor' => 'Present supervisor','Past supervisor'=>'Past supervisor','Academic supervisor'=>'Academic supervisor'), null,array('class'=>'form-control','id'=>'category','required'=>''))}}
							</div>
                        </div>
						<div class="form-group required">
                                           
											{{Form::label('name', 'Name', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('name','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
						<div class="form-group required">
                                           
											{{Form::label('designation', ' Designation', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('designation','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
						
						<div class="form-group">
											{{Form::label('address', ' Address', array('class' => 'col-xs-4 control-label'))}}
														
                                <div class="col-xs-6">
											{{Form::textarea('address','', array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
								</div>
						</div>
						<div class="form-group required">
                                           
											{{Form::label('telephone', 'Telephone', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('telephone','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
						<div class="form-group required">
                                           
											{{Form::label('years_acquainted', '  Years acquainted', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('years_acquainted','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
						<div class="form-group required">
                                           
											{{Form::label('email_address', 'E-mail address', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('email_address','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
						
						<div class="form-group required">
                                        
											{{Form::label('may_we_request', ' May we request a reference?', array('class' => 'col-xs-4 control-label'))}}
											
                            <div class="col-xs-6">
											{{Form::select('may_we_request', array('' => '--Select--', 'Yes' => 'Yes','No'=>'No'), null,array('class'=>'form-control','id'=>'','required'=>''))}}
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
	<!-----------Update Pop up start------------------>
	@foreach($infos as $info)
	<div class="modal fade" id="{{'R'.$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Reference </h4>
                </div>
                <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                    {{Form::open(array('url'=>'qualification/updateReference','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
						{{Form::hidden('id',$info->id)}}
						<div class="form-group required">
                                        
											{{Form::label('referee_type', 'Referee type', array('class' => 'col-xs-4 control-label'))}}
											
                            <div class="col-xs-6">
											{{Form::select('referee_type', array('' => '--Select--', 'Present supervisor' => 'Present supervisor','Past supervisor'=>'Past supervisor','Academic supervisor'=>'Academic supervisor'), $info->referee_type ,array('class'=>'form-control','id'=>'category','required'=>''))}}
							</div>
                        </div>
						<div class="form-group required">
                                           
											{{Form::label('name', 'Name', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('name',$info->name, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
						<div class="form-group required">
                                           
											{{Form::label('designation', ' Designation', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('designation', $info->designation , array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
						
						<div class="form-group">
											{{Form::label('address', ' Address', array('class' => 'col-xs-4 control-label'))}}
														
                                <div class="col-xs-6">
											{{Form::textarea('address', $info->address , array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
								</div>
						</div>
						<div class="form-group required">
                                           
											{{Form::label('telephone', 'Telephone', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('telephone', $info->telephone , array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
						<div class="form-group required">
                                           
											{{Form::label('years_acquainted', '  Years acquainted', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('years_acquainted',$info->years_acquainted, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
						<div class="form-group required">
                                           
											{{Form::label('email_address', 'E-mail address', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('email_address', $info->email_address, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                        </div>
						
						<div class="form-group required">
                                        
											{{Form::label('may_we_request', ' May we request a reference?', array('class' => 'col-xs-4 control-label'))}}
											
                            <div class="col-xs-6">
											{{Form::select('may_we_request', array('' => '--Select--', 'Yes' => 'Yes','No'=>'No'), $info->may_we_request ,array('class'=>'form-control','id'=>'','required'=>''))}}
							</div>
                        </div>
					
                       
                        <div class="form-group">
                            <div class="col-xs-5 col-xs-offset-3">
                              <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                            </div>
                        </div>
					{{Form::close()}}
                </div>
            </div>
        </div>
    </div>
	@endforeach 
	<!-----------Update Pop up End------------------>
    <script>
$(document).ready(function(){
  
 
  
});
</script>



@stop