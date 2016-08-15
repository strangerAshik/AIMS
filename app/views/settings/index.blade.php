@extends('layout')
@section('content')
<section class="content">
<div style="display:none">
{{$role=Auth::user()->Role()}}
</div>
<!--Instruction Start-->
 <?php 
 $module='settings';
 $instructions=CommonFunction::getModuleInstructions($module);
 ?>
  @include('commonInstruction')
  @yield('instruction')
<!--End Instruction-->
<div class="row">
                        <div class="col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-blue  height">
                                <div class="inner">
                                    <h4 class='title'>
                                      My Profile
                                    </h4>
                                   
                                </div>
                                
                                <div class="icon">
                                    <a href="{{'myProfile'}}"> <i class="ion ion-person"></i></a>
                                </div>
                                <a class="small-box-footer" href="{{'myProfile'}}" >
                                  <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        @if('true'==CommonFunction::hasPermission('add_user',Auth::user()->emp_id(),'access'))
						<div class="col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-blue height">
                                <div class="inner">
                                    <h4 class='title'>
                                       Add User
                                    </h4>
                                   
                                </div>
                                
								<div class="icon">
                                    <a href="#" data-toggle="modal" data-target="#addUser"> <i class="ion ion-person-add"></i></a>
                                </div>
                                <a class="small-box-footer" href="#" data-toggle="modal" data-target="#addUser">
                                   <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
						@endif
						@if('true'==CommonFunction::hasPermission('all_user',Auth::user()->emp_id(),'access'))
                       <div class="col-md-4">
                            
                            <div class="small-box bg-blue height">
                                <div class="inner">
                                  <h4 class='title'>
                                   All Users 
                                  </h4>
                                    
                                </div>
                                <div class="icon">
                                    <a href="{{'viewUsers'}}" > <i class="icon ion-person-stalker"></i></a>
                                </div>
                                <a class="small-box-footer" href="{{'viewUsers'}}">
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
						@endif
						
						
						
						@if('true'==CommonFunction::hasPermission('module',Auth::user()->emp_id(),'access'))
                        <div class="col-md-4">
                            
                            <div class="small-box bg-blue  height">
                                <div class="inner">
                                  <h4 class='title'>
                                   <h4 style='font-weight:bold;'>Module,Instruction & Report Management</h4>
                                  </h4>
                                    
                                </div>
                                <div class="icon">
                                    <a href="{{'viewModule'}}" > <i class="ion ion-ios7-gear"></i></a>
                                </div>
                                <a class="small-box-footer" href="{{'viewModule'}}" >
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        @endif

                        @if('true'==CommonFunction::hasPermission('dropdown_management',Auth::user()->emp_id(),'access'))
                        <div class="col-md-4">
                            
                            <div class="small-box bg-blue   height">
                                <div class="inner">
                                  <h4 class='title'>
                                   <h4 style='font-weight:bold;'>Drop-down Management </h4>
                                  </h4>
                                    
                                </div>
                                <div class="icon">
                                    <a href="{{'dropdownManagement'}}" > <i class="ion ion-ios7-gear"></i></a>
                                </div>
                                <a class="small-box-footer" href="{{'dropdownManagement'}}" >
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        @endif
                        @if('true'==CommonFunction::hasPermission('dropdown_management',Auth::user()->emp_id(),'access'))
                        <div class="col-md-4">
                            
                            <div class="small-box bg-blue   height">
                                <div class="inner">
                                  <h4 class='title'>
                                   <h4 style='font-weight:bold;'>Role Management</h4>
                                  </h4>
                                    
                                </div>
                                <div class="icon">
                                    <a href="{{'roleManagment'}}" > <i class="ion ion-ios7-gear"></i></a>
                                </div>
                                <a class="small-box-footer" href="{{'roleManagment'}}" >
                                   <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        @endif
                        @if('true'==CommonFunction::hasPermission('checklist_management',Auth::user()->emp_id(),'access'))
                        <div class="col-md-4">
                            
                            <div class="small-box bg-aqua   height">
                                <div class="inner">
                                  <h4 class='title'>
                                   <h4 style='font-weight:bold;'>Checklist Management </h4>
                                  </h4>
                                    
                                </div>
                                <div class="icon">
                                    <a href="{{'checkListManagement'}}" > <i class="ion ion-ios7-gear"></i></a>
                                </div>
                                <a class="small-box-footer" href="{{'checkListManagement'}}" >
                                    <i class="fa fa-arrow-circle-right"></i>
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