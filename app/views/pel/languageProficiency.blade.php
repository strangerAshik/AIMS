@extends('layout')
@section('content')
 
<section class="content widthController">
   <div style="display:none">{{$num=0;}}</div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Language Proficiency</h3>
                </div>
                <!-- /.box-header -->
					<div class="box-body">
                    @if($languages)
					@foreach($languages as $info)
                    <table class="table table-bordered">
                        <tbody>
						
                            <tr>
                                <th colspan='2'> Language  #{{++$num}}
                                    <span class='hidden-print'>
                              @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'par_delete'))    
                                    {{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('pel_laguage_profeciancy',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
                              @endif
                              @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'sof_delete'))
                                    {{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('pel_laguage_profeciancy',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;')) }}
                               @endif
                                    
                                    
                            @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'approve')) 
                                  
                                    {{ HTML::linkAction('AircraftController@approve', '',array('pel_laguage_profeciancy',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
                                
                                    
                                    {{ HTML::linkAction('AircraftController@notApprove', '',array('pel_laguage_profeciancy',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
                                @endif
                            @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'worning')) 
                                    {{ HTML::linkAction('AircraftController@removeWarning', '',array('pel_laguage_profeciancy',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
                                    {{ HTML::linkAction('AircraftController@warning', '',array('pel_laguage_profeciancy',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
                                @endif
                                @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'update'))  
                                     <a data-toggle="modal" data-target="#pelLangProfe{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
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
                                             <th colspan='2'>{{AircraftPrimaryInfo::warning($info)}}    </th>
                                             </tr>  
                                         @endif 
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
                    @else
                    <table class="table table-bordered">
                        <tr><td>No Data Is Provided Yet!!!</td></tr>
                    </table>
                    @endif
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
                   
					{{Form::open(array('url'=>'pel/saveLanguageProfeciency','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
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
                            
                                <button type="submit" class="btn btn-primary btn-block">Save</button>
                            
                        </div>
						{{Form::close()}}
                </div>
            </div>
        </div>
    </div>
	<!--Start Update Pop up-->
@include('pel.editForm')
@yield('updateLanguagePro')
	<!---End Update Pop up-->
 <script>
$(document).ready(function(){
  
 
  
});
</script>



@stop