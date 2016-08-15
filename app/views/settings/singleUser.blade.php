@extends('layout')
@section('content')
<section class='content widthController' >
<div class="row" >
                       
		 
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
                        @foreach($userInfos as $info)
							 <div class="box-header col-md-6">
									<h3 class="box-title">User Details</h3>
							 </div>	
							 <div class="box-header col-md-6">
                              <span class='hidden-print'>
                    
                             <a  href="{{URL::to('userDelete/'.$info->emp_id)}}" title="Permanent Delete" onclick=" return confirm('Wanna Delete?')">
                                        <span class="glyphicon glyphicon-trash" style="color:red;float:right;padding:5px;" >Delete</span>
                                    </a>
                      
							 <a data-toggle="modal" data-target="#profileView" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
                                </span>
							</div>						
			
					<div class="box-body">
					
                    <table class="table table-bordered">
                        <tbody>
						
                            <tr>
                                <td class="col-md-3">									
									Empoloyee ID
								</td>
                                <td>{{$info->emp_id}}</td>
                            </tr>
                            <tr>
                                <td class="col-md-3">									
									Full Name
								</td>
                                <td>{{$info->name}}</td>
                            </tr>
                            <tr>
                                <td class="col-md-3">									
									Role
								</td>
                                <td>{{CommonFunction::roleName($info->role)}}</td>
                            </tr>
                            <tr>
                                <td class="col-md-3">									
									Organization
								</td>
                                <td>{{$info->organization}}</td>
                            </tr>
                            <tr>
                                <td class="col-md-3">									
									Email
								</td>
                                <td>{{$info->email}}</td>
                            </tr>
                            <tr>
                                <td class="col-md-3">									
									Photo
								</td>
                                <td>{{ HTML::image('files/userPhoto/'.$info->photo, 'Employee Photo', array('class' => 'img-thumbnail','width'=>'160','height'=>'120')) }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-3">									
									Password
								</td>
                                <td><a class="small-box-footer" href="#" data-toggle="modal" data-target="#changePassword">
                                    Change Password <i class="fa fa-arrow-circle-right"></i>
                                </a></td>
                            </tr>
                            
                        
                      	  </tbody>
                   		</table>

						</div>
				@endforeach	
               	</div>
                <!-- /.box-body -->
                               
                            </div>
</div>
<div class="row" >
                        
		 
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">User Permission</h3>
							 </div>	
			@foreach ($modules as $module) 
		 		
				{{Form::open(array('url' => 'updateUserPermission', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					
					<div class="box-body">
                    
                    <table class="table table-bordered">
                        <tbody>

                  
                  
                    <tr id="{{$module->module_name}}"> 
                    <td class='col-md-4'>
                    {{Form::hidden('emp_id',$empId)}}
                    {{Form::hidden('module_name',$module->module_name)}}
                    {{Form::label('module', $module->module_name, array('class' => 'col-xs-4 control-label pull-left'))}}
                    </td>
                    <td class="col-md-7">

                                   
                   
                    @if($module->access=='true')       
                    {{Form::hidden($module->module_name.'_'.'access','false')}}             
                    {{Form::checkbox($module->module_name.'_'.'access', 'true',true)}}Access
                    @else
                    {{Form::hidden($module->module_name.'_'.'access','false')}}
                    {{Form::checkbox($module->module_name.'_'.'access', 'true',false)}}Access
					@endif
                    					
					@if( $module->entry=='true')
					{{Form::hidden($module->module_name.'_'.'entry','false')}}
                    {{Form::checkbox($module->module_name.'_'.'entry', 'true',true)}}Entry
                    @else
                    {{Form::hidden($module->module_name.'_'.'entry','false')}}
                    {{Form::checkbox($module->module_name.'_'.'entry', 'true',false)}}Entry
					@endif

                    @if( $module->update=='true')
                    {{Form::hidden($module->module_name.'_'.'update','false')}}
                    {{Form::checkbox($module->module_name.'_'.'update', 'true',true)}}Update
                    @else
                    {{Form::hidden($module->module_name.'_'.'update','false')}}
                    {{Form::checkbox($module->module_name.'_'.'update', 'true',false)}}Update
                    @endif

					@if( $module->approve=='true')
					{{Form::hidden($module->module_name.'_'.'approve','false')}}
                    {{Form::checkbox($module->module_name.'_'.'approve', 'true',true)}}Approve</br>
                    @else
                    {{Form::hidden($module->module_name.'_'.'approve','false')}}
                    {{Form::checkbox($module->module_name.'_'.'approve', 'true',false)}}Approve</br>
					@endif
					
					@if( $module->worning=='true')
					{{Form::hidden($module->module_name.'_'.'worning','false')}}
                    {{Form::checkbox($module->module_name.'_'.'worning', 'true',true)}}Warning
                    @else
                    {{Form::hidden($module->module_name.'_'.'worning','false')}}
                    {{Form::checkbox($module->module_name.'_'.'worning', 'true',false)}}Warning
					@endif

					@if( $module->sof_delete=='true')
					{{Form::hidden($module->module_name.'_'.'sof_delete','false')}}
                    {{Form::checkbox($module->module_name.'_'.'sof_delete', 'true',true)}}S.Delete
                    @else
                    {{Form::hidden($module->module_name.'_'.'sof_delete','false')}}
                    {{Form::checkbox($module->module_name.'_'.'sof_delete', 'true',false)}}S.Delete
					@endif
					@if( $module->par_delete=='true')
					{{Form::hidden($module->module_name.'_'.'par_delete','false')}}
                    {{Form::checkbox($module->module_name.'_'.'par_delete', 'true',true)}}P.Delete
                    @else
                    {{Form::hidden($module->module_name.'_'.'par_delete','false')}}
                    {{Form::checkbox($module->module_name.'_'.'par_delete', 'true',false)}}P.Delete
					@endif
					@if( $module->report=='true')
					{{Form::hidden($module->module_name.'_'.'report','false')}}
                    {{Form::checkbox($module->module_name.'_'.'report', 'true',true)}}Report
                    @else
                    {{Form::hidden($module->module_name.'_'.'report','false')}}
                    {{Form::checkbox($module->module_name.'_'.'report', 'true',false)}}Report
					@endif                   
                    </td>

                    <td class="col-md-1"><button type="submit" class="btn btn-primary">Update</button></td>
                    </tr>
                    

            
                    </tbody>
                    </table>
                    </div>
                                 
					{{Form::close()}}
                @endforeach
               	</div>
                <!-- /.box-body -->
                               
                            </div>
</div>
<div class="row" >
                        
		 
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">Add New Permission</h3>
							 </div>	
				<table class="table table-bordered">
                        <tbody>
				{{Form::open(array('url' => 'newModulePermissionupdate', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
							   {{Form::hidden('id',$empId)}}							
							<tr> 
								<div class="form-group required">
                                      
                                     <td> 
											{{Form::label('modules', 'Module', array('class' => 'col-xs-4 control-label'))}}
									</td>	
									<td>
											<div class="col-xs-6">											
											<select id="module_name" name='module_name' class="demo-default" placeholder="Select  Module...">
												
												@foreach($moduleNames as $module)
												<option value="{{$module}}">{{$module}}</option>
												@endforeach
											</select>										
											</div>
									  </td>
											
                    		</div>	
                    	</tr>
                    	<tr>				
					<div class='form-group'>
					<td>
                    {{Form::label('module','Permission', array('class' => 'col-xs-4 control-label'))}}
                    </td>
                    <td>
                    <div class="col-xs-8">                    
                    {{Form::hidden('access', 'false')}}
                    {{Form::checkbox('access', 'true', false)}}Access</br>
                    {{Form::hidden('entry', 'false')}}
                    {{Form::checkbox('entry', 'true', false)}}Entry</br>
                    {{Form::hidden('update', 'false')}}
                    {{Form::checkbox('update', 'true', false)}}Edit</br>
                    {{Form::hidden('approve', 'false')}}
                    {{Form::checkbox('approve', 'true', false)}}Approve</br>
                    {{Form::hidden('worning', 'false')}}
                    {{Form::checkbox('worning', 'true', false)}}Worning</br>
                    {{Form::hidden('sof_delete', 'false')}}
                    {{Form::checkbox('sof_delete', 'true', false)}}S.D</br>
                    {{Form::hidden('par_delete', 'false')}}
                    {{Form::checkbox('par_delete', 'true', false)}}P.D</br>
                    </div>
                    </td>
                    </div>
                    </tr>
                    <tr>
                    <td colspan='2'><div class="form-group">
                       
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Add New Module Permission</button>
                       
                    </div></td>
                    </tr>
					{{Form::close()}}
					</tbody>
					</table>
							</div>
                <!-- /.box-body -->
                               
                            </div>
				 </div>

</section>
@include('settings.entryForm')
@yield('changePass')

@include('settings.editForm')
@yield('updateUserInfosAdmin')
@stop