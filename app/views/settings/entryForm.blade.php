@section('addModule')
<div  class="modal fade" id="addModule" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
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
                                           
                                            {{Form::label('label','Label', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::text('label','', array('class' => 'form-control','placeholder'=>'Module Name: Label','required'=>''))}}
                                            </div>
                                            
                    </div>
                    
					<div class="form-group required">
                                           
											{{Form::label('module_name','Module Name', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-7">
											{{Form::text('module_name','', array('class' => 'form-control','placeholder'=>'use _ among the words','required'=>''))}}
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
                                            <?php $options=CommonFunction::roles();
                                            ?>
                                            {{Form::select('designation', $options ,'' ,array('class'=>'form-control'))}}
                                            </div>
                                            
                    </div>
                    
                    
                    <div class="form-group required">
                                        
                                            {{Form::label('organization', 'Organization', array('class' => 'col-xs-4 control-label'))}}
                                        <div class="col-xs-6">
                                            <?php $options=CommonFunction::getOptions('organization_all');?>
                                            <select id="organization" name='organization' class="demo-default" placeholder="Select  Organization...">
                                                <option value="">Select  Organization...</option>
                                                @foreach($options as $organization)
                                                <option value="{{$organization}}">{{$organization}}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                            
                                    
                                            
                    </div>               
                    
                
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
//$('#designation').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
//$('#').selectize();
    
});
</script>
@endif
@stop

@if($PageName=='My Profile'||$PageName=='Single User')
@section('changePass')
<!-- User Settings-->
@foreach($userInfos as $info)
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
               
                {{Form::open(array('url' => 'changePasswordIndividual/'.$info->emp_id, 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
                        
                    
                    <div class="form-group required">
                                        
                                            {{Form::label('Password', 'New Password', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-6">
                                            {{Form::password('password','', array('class' => 'form-control','placeholder'=>''))}}
                                            </div>
                                            
                    </div>
                    <div class="form-group required">
                                        
                                            {{Form::label('password_confirmation', 'Confirm Password', array('class' => 'col-xs-4 control-label'))}}
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
    @endforeach
<!--End User Settings-->
@stop
@endif