@section('addModule')
<div class="modal fade" id="addModule" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">New Module</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'saveModule','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}

				
					<div class="form-group required">
                                           
											{{Form::label('module_name','Module Name', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-7">
											{{Form::text('module_name','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					

					<div class="form-group">
                       
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Add New Module</button>
                       
                    </div>
					
					{{Form::close()}}
            </div>
        </div>
    </div>
</div>
@stop



@section('addUser')
@if($PageName=='Settings')
<!-- Add User-->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add User</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
                {{Form::open(array('url' => 'newUser/save', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
                        @if (Auth::check())                     
                               {{Form::hidden('user_id',Auth::user()->id)}}                         
                        @endif
                    
                    
                    
                
                    <div class="form-group required">
                                        
                                            {{Form::label('name', 'Full Name', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::text('name','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div>
                    <div class="form-group required">
                                        
                                            {{Form::label('emp_id', 'Employee ID', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::text('emp_id','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div>
                    <div class="form-group required">
                                        
                                            {{Form::label('email', 'Email', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::text('email','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div>
                    <div class="form-group required">
                                        
                                            {{Form::label('designation', 'Designation', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                             <?php $roles=CommonFunction::listsOfColumn('users','role'); ?>
                                            <select id="designation" name='designation' class="demo-default" placeholder="Select  Designation...">
                                                <option value="">Select  Designation...</option>
                                                @foreach($roles as $role)
                                                <option value="{{$role}}">{{$role}}</option>
                                                @endforeach
                                            </select>
                                            
                                            </div>
                                            
                    </div>
                    
                    
                    <div class="form-group required">
                                        
                                            {{Form::label('organization', 'Organization', array('class' => 'col-xs-4 control-label'))}}
                                        <div class="col-xs-6">
                                            
                                            <select id="organization" name='organization' class="demo-default" placeholder="Select  Organization...">
                                                <option value="">Select  Organization...</option>
                                                @foreach($organizations as $organization)
                                                <option value="{{$organization}}">{{$organization}}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                            
                                    
                                            
                    </div>
                <div style="display: none">  {{$num=0;}}</div>
                    @foreach ($modules as $module) 
                    <div class='form-group'>
                    {{Form::label('module',++$num.' ) '.$module, array('class' => 'col-xs-4 control-label'))}}
                    <div class="col-xs-8">                    
                    {{Form::hidden($module.'_'.'access', 'false')}}
                    {{Form::checkbox($module.'_'.'access', 'true', false)}}Access</br>
                    {{Form::hidden($module.'_'.'entry', 'false')}}
                    {{Form::checkbox($module.'_'.'entry', 'true', false)}}Entry</br>
                    {{Form::hidden($module.'_'.'update', 'false')}}
                    {{Form::checkbox($module.'_'.'update', 'true', false)}}Edit</br>
                    {{Form::hidden($module.'_'.'approve', 'false')}}
                    {{Form::checkbox($module.'_'.'approve', 'true', false)}}Approve</br>
                    {{Form::hidden($module.'_'.'worning', 'false')}}
                    {{Form::checkbox($module.'_'.'worning', 'true', false)}}Worning</br>
                    {{Form::hidden($module.'_'.'sof_delete', 'false')}}
                    {{Form::checkbox($module.'_'.'sof_delete', 'true', false)}}S.D</br>
                    {{Form::hidden($module.'_'.'par_delete', 'false')}}
                    {{Form::checkbox($module.'_'.'par_delete', 'true', false)}}P.D</br>
                    {{Form::hidden($module.'_'.'report', 'false')}}
                    {{Form::checkbox($module.'_'.'report', 'true', false)}}Report</br>
                    </div>
                    </div>
                    @endforeach
                    
                
                    <div class="form-group required">
                                        
                                            {{Form::label('password', 'Password', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::password('password','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div>
                    <div class="form-group required">
                                        
                                            {{Form::label('password_confirmation', 'Conform Password', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::password('password_confirmation','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
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
    </div>
<!--End Add User-->
<script>
$(document).ready(function(){
//$('#organization').selectize();
$('#organization').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
$('#designation').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
//$('#').selectize();
    
});
</script>
@endif
@stop
@section('changePass')

<!-- User Settings-->
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <!--<a style="color:green;float:right;margin-right:5px;" href="" data-target="#edit1" data-toggle="modal">
                            <span aria-hidden="true" class="glyphicon glyphicon-pencil"></span>
               </a>-->
               
                <h4 class="modal-title">Change Password</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
                {{Form::open(array('url' => 'changePassword', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
                        
                    
                    <div class="form-group required">
                                        
                                            {{Form::label('Password', 'New Password', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::password('password','', array('class' => 'form-control','placeholder'=>''))}}
                                            </div>
                                            
                    </div>
                    <div class="form-group required">
                                        
                                            {{Form::label('password_confirmation', 'Conform Password', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::password('password_confirmation','', array('class' => 'form-control','placeholder'=>''))}}
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
    </div>
<!--End User Settings-->
@stop