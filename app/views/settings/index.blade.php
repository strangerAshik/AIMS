@extends('layout')
@section('content')
<section class="content">
<div style="display:none">
{{$role=Auth::user()->Role()}}
</div>

<div class="row">
                        <div class="col-lg-3 col-md-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green height">
                                <div class="inner">
                                    <h4 class='title'>
                                      My Profile
                                    </h4>
                                   
                                </div>
                                
                                <div class="icon">
                                    <a href="{{'myProfile'}}"> <i class="ion ion-person"></i></a>
                                </div>
                                <a class="small-box-footer" href="{{'myProfile'}}" >
                                   Add User <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        @if('true'==CommonFunction::hasPermission('add_user',Auth::user()->emp_id(),'access'))
						<div class="col-lg-3 col-md-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow height">
                                <div class="inner">
                                    <h4 class='title'>
                                       Add User
                                    </h4>
                                   
                                </div>
                                
								<div class="icon">
                                    <a href="#" data-toggle="modal" data-target="#addUser"> <i class="ion ion-person-add"></i></a>
                                </div>
                                <a class="small-box-footer" href="#" data-toggle="modal" data-target="#addUser">
                                   Add User <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
						@endif
						@if('true'==CommonFunction::hasPermission('all_user',Auth::user()->emp_id(),'access'))
                       <div class="col-lg-3 col-md-3 col-xs-6">
                            
                            <div class="small-box bg-red height">
                                <div class="inner">
                                  <h4 class='title'>
                                   All Users 
                                  </h4>
                                    
                                </div>
                                <div class="icon">
                                    <a href="{{'viewUsers'}}" > <i class="icon ion-person-stalker"></i></a>
                                </div>
                                <a class="small-box-footer" href="{{'viewUsers'}}">
                                    View All Users <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
						@endif
						
						<div class="col-lg-3 col-md-3 col-xs-6">
                            
                            <div class="small-box bg-aqua height">
                                <div class="inner">
                                  <h4 class='title'>
								   <h4 style='font-weight:bold;'>Change Password</h4>
                                  </h4>
                                    
                                </div>
                                <div class="icon">
                                    <a href="" href="#" data-toggle="modal" data-target="#changePassword"> <i class="ion ion-ios7-gear"></i></a>
                                </div>
                                <a class="small-box-footer" href="#" data-toggle="modal" data-target="#changePassword">
                                    Change Password <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
						
						@if('true'==CommonFunction::hasPermission('module',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-md-3 col-xs-6">
                            
                            <div class="small-box bg-maroon  height">
                                <div class="inner">
                                  <h4 class='title'>
                                   <h4 style='font-weight:bold;'>Module</h4>
                                  </h4>
                                    
                                </div>
                                <div class="icon">
                                    <a href="{{'viewModule'}}" > <i class="ion ion-ios7-gear"></i></a>
                                </div>
                                <a class="small-box-footer" href="{{'viewModule'}}" >
                                    add,update Module <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        @endif

                        @if('true'==CommonFunction::hasPermission('dropdown_management',Auth::user()->emp_id(),'access'))
                        <div class="col-lg-3 col-md-3 col-xs-6">
                            
                            <div class="small-box bg-teal   height">
                                <div class="inner">
                                  <h4 class='title'>
                                   <h4 style='font-weight:bold;'>Drop-down Management </h4>
                                  </h4>
                                    
                                </div>
                                <div class="icon">
                                    <a href="{{'dropdownManagement'}}" > <i class="ion ion-ios7-gear"></i></a>
                                </div>
                                <a class="small-box-footer" href="{{'dropdownManagement'}}" >
                                    Drop-down info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        @endif
                        @if('true'==CommonFunction::hasPermission('checklist_management',Auth::user()->emp_id(),'access'))
						<div class="col-lg-3 col-md-3 col-xs-6">
                            
                            <div class="small-box bg-teal   height">
                                <div class="inner">
                                  <h4 class='title'>
								   <h4 style='font-weight:bold;'>Checklist Management </h4>
                                  </h4>
                                    
                                </div>
                                <div class="icon">
                                    <a href="{{'checkListManagement'}}" > <i class="ion ion-ios7-gear"></i></a>
                                </div>
                                <a class="small-box-footer" href="{{'checkListManagement'}}" >
                                    Checklist info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
						@endif
</div>
@include('settings.entryForm')
@yield('addUser')
@yield('changePass')
</section>


@stop