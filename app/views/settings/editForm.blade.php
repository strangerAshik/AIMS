
@if($PageName=='Module Names')
@section('updateModule')
@foreach($modules as $module)
<div class="modal fade" id="updateModule{{$module->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Module</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'updateModule','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}
                    {{Form::hidden('id',$module->id)}}
                    {{Form::hidden('old_module_name',$module->module_name)}}
				
					<div class="form-group required">
                                           
											{{Form::label('module_name','Module Name', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-7">
											{{Form::text('module_name',$module->module_name, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					

					<div class="form-group">
                       
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Add Update Module</button>
                       
                    </div>
					
					{{Form::close()}}
            </div>
        </div>
    </div>
</div>
@endforeach
@stop
@endif

@if($PageName=='My Profile')
@section('updateUserInfos')
@foreach($userInfos as $info)
<div class="modal fade" id="profileView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Profile</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
                {{Form::open(array('url'=>'updateMyProfile','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>'true'))}}
                    {{Form::hidden('id',$info->id)}}               
                    {{Form::hidden('old_photo',$info->photo)}}                
                
                    <div class="form-group">
                                           
                                            {{Form::label('emp_id','Employee Id', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::text('emp_id',$info->emp_id, array('class' => 'form-control','placeholder'=>'','required'=>'','disabled'=>'diabled'))}}
                                            </div>
                                            
                    </div>
                    <div class="form-group">
                                           
                                            {{Form::label('name','Full Name', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::text('name',$info->name, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div>
                    <div class="form-group">
                                           
                                            {{Form::label('role','Role', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::text('role',$info->role, array('class' => 'form-control','placeholder'=>'','required'=>'','disabled'=>'diabled'))}}
                                            </div>
                                            
                    </div>
                    <div class="form-group">
                                           
                                            {{Form::label('organization','Organization', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::text('organization',$info->organization, array('class' => 'form-control','placeholder'=>'','required'=>'','disabled'=>'diabled'))}}
                                            </div>
                                            
                    </div>
                    <div class="form-group">
                                           
                                            {{Form::label('email','Email', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::text('email',$info->email, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div>
                    
                                           
                    <div class="form-group ">                                  
                    
                     {{ Form::label('image', 'Upload New Photo',array('class'=>'control-label col-xs-4')) }}
                     <div class="col-xs-6">
                     {{ HTML::image('files/userPhoto/'.$info->photo, 'User Photo', array('class' => 'img-thumbnail','width'=>'250','height'=>'250')) }}
                     {{ Form::file('photo') }}
                     
                     <p class="help-block">Photo size : 300px250px</p>
                     </div>
                    </div>
                                            
                    
                    <!-- <div class="form-group">
                                                               
                                            {{Form::label('new_password','New Password', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::text('new_password','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                                        </div>
                    <div class="form-group">
                                                               
                                            {{Form::label('conform_password','Conform Password', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::text('conform_password','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}  
                                            </div>
                                            
                                        </div> -->
                    

                    <div class="form-group">                       
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>                       
                    </div>
                    
                    {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@endforeach
@stop
@endif

@if($PageName=='Single User')
@section('updateUserInfosAdmin')
@foreach($userInfos as $info)
<div class="modal fade" id="profileView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Profile</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
                {{Form::open(array('url'=>'updateUserProfileAdmin','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>'true'))}}
                    {{Form::hidden('id',$info->id)}}               
                    {{Form::hidden('old_photo',$info->photo)}}                
                    {{Form::hidden('emp_id',$info->emp_id)}}                
                
                    <div class="form-group">
                                           
                                            {{Form::label('emp_id','Employee Id', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::text('emp_id_disable',$info->emp_id, array('class' => 'form-control','placeholder'=>'','required'=>'','disabled'=>'diabled'))}}
                                            </div>
                                            
                    </div>
                    <div class="form-group">
                                           
                                            {{Form::label('name','Full Name', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::text('name',$info->name, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div>
                    <div class="form-group">
                                           
                                            {{Form::label('role','Role', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            <select id="designation" name='role' class="demo-default" placeholder="Select  Designation...">
                                                <option value="{{$info->role}}">{{$info->role}}</option>
                                                @foreach($roles as $role)
                                                <option value="{{$role}}">{{$role}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                            
                    </div>
                    <div class="form-group">
                                           
                                            {{Form::label('organization','Organization', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">                                          
                                            <select id="organization" name='organization' class="demo-default" placeholder="Select  Organization...">
                                                <option  selected='selected'value="{{$info->organization}}">{{$info->organization}}</option>
                                                @foreach($organizations as $organization)
                                                <option value="{{$organization}}">{{$organization}}</option>
                                                @endforeach
                                            </select>                                       
                                            </div>
                                            
                    </div>
                    <div class="form-group">
                                           
                                            {{Form::label('email','Email', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::text('email',$info->email, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div>
                    
                                           
                    <div class="form-group ">                                  
                    
                     {{ Form::label('image', 'Upload New Photo',array('class'=>'control-label col-xs-4')) }}
                     <div class="col-xs-6">
                     {{ HTML::image('files/userPhoto/'.$info->photo, 'User Photo', array('class' => 'img-thumbnail','width'=>'250','height'=>'250')) }}
                     {{ Form::file('photo') }}
                     
                     <p class="help-block">Photo size : 300px250px</p>
                     </div>
                    </div>
                                            
                    
                    <!-- <div class="form-group">
                                                               
                                            {{Form::label('new_password','New Password', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::text('new_password','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                                        </div>
                    <div class="form-group">
                                                               
                                            {{Form::label('conform_password','Conform Password', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::text('conform_password','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}  
                                            </div>
                                            
                                        </div> -->
                    

                    <div class="form-group">                       
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>                       
                    </div>
                    
                    {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@endforeach
<script>
$(document).ready(function(){
//$('#organization').selectize();
$('#organization').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#designation').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
    
});
</script>

@stop
@endif
@if($PageName=='Single Dropdown')
@section('updateOption')
@foreach($getOptions as $info)
<div class="modal fade" id="updateOption{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Option</h4>
            </div>

            <div class="modal-body">
              {{Form::open(array('url'=>'updateOption','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>'true'))}}
                    {{Form::hidden('id',$info->id)}}               
                             
                
                    <div class="form-group">
                                           
                                            {{Form::label('options','Drop-down Name', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::text('options',$info->options, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
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


@stop
@endif