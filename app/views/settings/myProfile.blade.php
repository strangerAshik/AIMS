@extends('layout')
@section('content')
<section class='content widthController' >
<div class="row" >
                        
		 
                 <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary ">
							 <div class="box-header col-md-6">
									<h3 class="box-title">My Profile</h3>
							 </div>	
							 <div class="box-header col-md-6">
							 <a data-toggle="modal" data-target="#profileView" href='' style='color:green;float:right;padding:5px;'>
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
							</div>						
				@foreach($userInfos as $info)
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
</section>

@include('settings.entryForm')
@yield('changePass')

@include('settings.editForm')
@yield('updateUserInfos')

@stop