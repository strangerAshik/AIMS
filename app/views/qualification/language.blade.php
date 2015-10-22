@extends('layout')
@section('content')
 
<section class="content" style="max-width:760px;margin:0 auto;">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Language</h3>
                </div>
                <!-- /.box-header -->
					<div class="box-body">
					@foreach($infos as $info)
                    <table class="table table-bordered">
                        <tbody>
						{{Employee::notApproved($info)}}	
                            <tr>
                                <th colspan='2'> Language  #{{++$a_sl}}
                                    <a href="{{'deleteLanguage/'.$info->id}}" style='color:red;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                  <a data-toggle="modal" data-target="#{{'lang'.$info->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                </th>
                            </tr>
                            <tr>
                                <td class='col-md-4'>Language</td>
                                <td>{{$info->language}}</td>
                            </tr>
                            <tr>
                                <td>Speak</td>
                                <td>{{$info->lang_speak}}</td>
                            </tr>
                            <tr>
                                <td>Understand</td>
                                <td> {{$info->lang_understanding}}</td>
                            </tr>
                            <tr>
                                <td>Read</td>
                                <td>{{$info->lang_reading}}</td>
                            </tr>
                            <tr>
                                <td>Write</td>
                                <td>{{$info->lang_writing}}</td>
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
                    <h4 class="modal-title">Add Language </h4>
                </div>
                <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					{{Form::open(array('url'=>'qualification/saveLanguage','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
                        <div class="form-group required">
                                           
											{{Form::label('language', 'Language', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('language','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                            </div>
						<div class="form-group required">
                                        
											{{Form::label('lang_speak', 'Speaking ability', array('class' => 'col-xs-4 control-label'))}}
											
                            <div class="col-xs-6">
											{{Form::select('lang_speak', array('' => '--Select--', 'Fluent' => 'Fluent','Moderate'=>'Moderate','Not Fluent'=>'Not Fluent'), null,array('class'=>'form-control','id'=>'','required'=>''))}}
							</div>
                        </div>
						<div class="form-group required">
                                        
											{{Form::label('lang_understanding', 'Understanding', array('class' => 'col-xs-4 control-label'))}}
											
                            <div class="col-xs-6">
											{{Form::select('lang_understanding', array('' => '--Select--', 'Fluent' => 'Fluent','Moderate'=>'Moderate','Not Fluent'=>'Not Fluent'), null,array('class'=>'form-control','id'=>'category','required'=>''))}}
							</div>
                        </div>
						<div class="form-group required">
                                        
											{{Form::label('lang_reading', 'Reading ability', array('class' => 'col-xs-4 control-label'))}}
											
                            <div class="col-xs-6">
											{{Form::select('lang_reading', array('' => '--Select--', 'Fluent' => 'Fluent','Moderate'=>'Moderate','Not Fluent'=>'Not Fluent'), null,array('class'=>'form-control','id'=>'category','required'=>''))}}
							</div>
                        </div>
						<div class="form-group required">
                                        
											{{Form::label('lang_writing', ' Writing ability', array('class' => 'col-xs-4 control-label'))}}
											
                            <div class="col-xs-6">
											{{Form::select('lang_writing', array('' => '--Select--', 'Fluent' => 'Fluent','Moderate'=>'Moderate','Not Fluent'=>'Not Fluent'), null,array('class'=>'form-control','id'=>'category','required'=>''))}}
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
	<!--Start Update Pop up-->
	@foreach($infos as $info)
	 <div class="modal fade" id="{{'lang'.$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update Language </h4>
                </div>
                <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                   
					{{Form::open(array('url'=>'qualification/updateLanguage','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
							{{Form::hidden('id',$info->id)}}
                        <div class="form-group required">
                                           
											{{Form::label('language', 'Language', array('class' => 'col-xs-4 control-label'))}}
											
                                <div class="col-xs-6">
											{{Form::text('language',$info->language, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
                            </div>
						<div class="form-group required">
                                        
											{{Form::label('lang_speak', 'Speaking ability', array('class' => 'col-xs-4 control-label'))}}
											
                            <div class="col-xs-6">
											{{Form::select('lang_speak', array('' => '--Select--', 'Fluent' => 'Fluent','Moderate'=>'Moderate','Not Fluent'=>'Not Fluent'), $info->lang_speak,array('class'=>'form-control','id'=>'','required'=>''))}}
							</div>
                        </div>
						<div class="form-group required">
                                        
											{{Form::label('lang_understanding', 'Understanding', array('class' => 'col-xs-4 control-label'))}}
											
                            <div class="col-xs-6">
											{{Form::select('lang_understanding', array('' => '--Select--', 'Fluent' => 'Fluent','Moderate'=>'Moderate','Not Fluent'=>'Not Fluent'), $info->lang_understanding,array('class'=>'form-control','id'=>'category','required'=>''))}}
							</div>
                        </div>
						<div class="form-group required">
                                        
											{{Form::label('lang_reading', 'Reading ability', array('class' => 'col-xs-4 control-label'))}}
											
                            <div class="col-xs-6">
											{{Form::select('lang_reading', array('' => '--Select--', 'Fluent' => 'Fluent','Moderate'=>'Moderate','Not Fluent'=>'Not Fluent'), $info->lang_reading,array('class'=>'form-control','id'=>'category','required'=>''))}}
							</div>
                        </div>
						<div class="form-group required">
                                        
											{{Form::label('lang_writing', ' Writing ability', array('class' => 'col-xs-4 control-label'))}}
											
                            <div class="col-xs-6">
											{{Form::select('lang_writing', array('' => '--Select--', 'Fluent' => 'Fluent','Moderate'=>'Moderate','Not Fluent'=>'Not Fluent'), $info->lang_writing,array('class'=>'form-control','id'=>'category','required'=>''))}}
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
	</section>
	@endforeach
	<!---End Update Pop up-->
 <script>
$(document).ready(function(){
  
 
  
});
</script>



@stop