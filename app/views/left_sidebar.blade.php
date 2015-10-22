@section('left_sidebar')
 <!-- sidebar: style can be found in sidebar.less -->
 <div style='display:none'>
 @if(Auth::check())
{{$role = Auth::user()->Role();}}
{{$emp_id = Auth::user()->emp_id();}}
@endif
</div>
                <section class="sidebar">
                    <!-- Sidebar user panel -->
				    @if(Auth::check())
				   <div class="user-panel">
				
                        <div class="pull-left image">
						  @if(Auth::user()->photo())
                            {{HTML::image('files/userPhoto/'.Auth::user()->photo(),'User',array('class'=>'img-circle'))}}
                          @elseif(Employee::profilePic($emp_id))
							{{HTML::image('img/PersonnelPhoto/'.Employee::profilePic($emp_id),'User',array('class'=>'img-circle'))}}
                          @else
                            {{HTML::image('img/PersonnelPhoto/'.'anonymous.png','User',array('class'=>'img-circle'))}}
                          @endif						 
						
                        </div>
                        <div class="pull-left info">
                            <p>{{Auth::user()->getName()}}</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
						
                    </div>
					@endif
					
                    <ul class="sidebar-menu">
					@if(Auth::check())
                        <li class="active">
                            <a href="{{URL::to('dashboard')}}">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
					@endif
					@if(Auth::check())	
                    @if('true'==CommonFunction::hasPermission('surveillance_inspection_audit',Auth::user()->emp_id(),'access'))
                        <li class="treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-screenshot"></i> <span>SIA</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{URL::to('surveillance/main');}}"><i class="fa fa-angle-double-right"></i>Main</a></li>
                                @if('true'==CommonFunction::hasPermission('sia_today_task',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('surveillance/todayTaskList');}}"><i class="fa fa-angle-double-right"></i>Today's Task-list</a></li>
                                @endif

                                 @if('true'==CommonFunction::hasPermission('sia_program',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('surveillance/newProgram');}}"><i class="fa fa-angle-double-right"> </i>Add New SIA Program</a></li>
                                @endif

                                @if('true'==CommonFunction::hasPermission('sia_action',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('surveillance/newActionEnrty');}}"><i class="fa fa-angle-double-right"></i>Execute SIA Program</a></li>
                                @endif

                                @if('true'==CommonFunction::hasPermission('sia_program_list',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('surveillance/programList');}}"><i class="fa fa-angle-double-right"></i>SIA Programs List (All)</a></li>
                                @endif

                                
                                @if('true'==CommonFunction::hasPermission('sia_action_list',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('surveillance/surveillanceList');}}"><i class="fa fa-angle-double-right"></i>Executed SIA Program (All)</a></li>
                                @endif

                                @if('true'==CommonFunction::hasPermission('sia_action_list',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('surveillance/centralSearch');}}"><i class="fa fa-angle-double-right"></i>SIA Central Search </a></li>
                                @endif
                                 @if('true'==CommonFunction::hasPermission('sia_my',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('surveillance/mySia');}}"><i class="fa fa-angle-double-right"></i>My SIA </a></li>
                                @endif

                              
                            </ul>
                        </li>
                        @endif
                        
                       
						@if('true'==CommonFunction::hasPermission('employee',Auth::user()->emp_id(),'access'))
                        <li class="treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-user"></i> <span>Employee</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{URL::to('qualification/main');}}"><i class="fa fa-angle-double-right"></i>Main</a></li>  
								@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'access'))
								<li><a href="{{URL::to('qualification/employees');}}"><i class="fa fa-angle-double-right"></i>Employees List</a></li> 
							    @endif
								<li><a href="{{URL::to('qualification/personnel');}}"><i class="fa fa-angle-double-right"></i>Personal Info. </a></li>
                                <li><a href="{{URL::to('qualification/education')}}"><i class="fa fa-angle-double-right"></i>Education</a></li>
                                <li><a href="{{URL::to('qualification/employment')}}"><i class="fa fa-angle-double-right"></i>Employment</a></li>
                                <li><a href="{{URL::to('qualification/pro_degree')}}"><i class="fa fa-angle-double-right"></i>Professional Degree</a></li>
                                <li><a href="{{URL::to('qualification/taining_work_ojt')}}"><i class="fa fa-angle-double-right"></i>Training/Workshop/OJT</a></li>
                                <li><a href="{{URL::to('qualification/language')}}"><i class="fa fa-angle-double-right"></i>Language</a></li>
                                <li><a href="{{URL::to('qualification/technical_licence')}}"><i class="fa fa-angle-double-right"></i>CAA Technical Licence</a></li>
                                <li><a href="{{URL::to('qualification/aircraft_qualification')}}"><i class="fa fa-angle-double-right"></i>CAA Aircraft Qualification</a></li>
								 <li><a href="{{URL::to('qualification/reference')}}"><i class="fa fa-angle-double-right"></i>References</a></li>
								 <li><a href="{{URL::to('qualification/emp_verification')}}"><i class="fa fa-angle-double-right"></i>Employee Assignments</a></li>
                                <li><a href="{{URL::to('qualification/other')}}"><i class="fa fa-angle-double-right"></i>Others</a></li>
                                <li><a href="{{URL::to('qualification/comp_view')}}"><i class="fa fa-angle-double-right"></i>Comprehensive View </a></li>
                            </ul>
                        </li>						
						@endif
						
						@if('true'==CommonFunction::hasPermission('safety_concern',Auth::user()->emp_id(),'access'))
						<li class="treeview ">
                            <a href="#">
                                <i class="glyphicon glyphicon-warning-sign"></i> <span>Safety Concerns</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{URL::to('safety/main');}}"><i class="fa fa-angle-double-right"></i>Main</a></li>
							
                                @if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'access')) 
								<li class="disNon"><a href="{{URL::to('safety/newSafetyConcern');}}"><i class="fa fa-angle-double-right"></i>New Concern </a></li>
                                @endif
                                @if('true'==CommonFunction::hasPermission('sc_safety_concerns_list',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('safety/issuedList');}}"><i class="fa fa-angle-double-right"></i>Safety Concerns List </a></li>
                                @endif
                                @if('true'==CommonFunction::hasPermission('sc_safety_concerns_list',Auth::user()->emp_id(),'access'))
                                <li class="disNon"><a href="{{URL::to('safety/nonStandardIssuedList');}}"><i class="fa fa-angle-double-right"></i>Non Standard Issue List </a></li>
                                @endif
                            </ul>
                        </li>
						@endif
						  
                     

                        @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'access'))
                        <li class="treeview disNon">
                            <a href="#">
                                <i class="glyphicon glyphicon-briefcase"></i> <span>Organizations</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{URL::to('organization/main');}}"><i class="fa fa-angle-double-right"></i>Main</a></li>
                                @if('true'==CommonFunction::hasPermission('org_add_new',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('organization/newOrganization');}}"><i class="fa fa-angle-double-right"></i>Add Organization</a></li>
                                @endif
                                @if('true'==CommonFunction::hasPermission('org_admin_list',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('organization/organizationList');}}"><i class="fa fa-angle-double-right"></i>Organizations List </a></li>
                                @endif
                                @if('true'==CommonFunction::hasPermission('org_my_org',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('organization/myOrganization');}}"><i class="fa fa-angle-double-right"></i>My Organization</a></li>
                                @endif
                            </ul>
                        </li>
                        @endif
                        @if('true'==CommonFunction::hasPermission('employee',Auth::user()->emp_id(),'access'))
                        <li class="treeview disNon">
                            <a href="#">
                                <i class="glyphicon glyphicon-user"></i> <span>Personnel Licensing</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{URL::to('pel/main');}}"><i class="fa fa-angle-double-right"></i>Main</a></li>  
                                @if('true'==CommonFunction::hasPermission('pel_list',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('pel/pelList');}}"><i class="fa fa-angle-double-right"></i>PEL List</a></li> 
                                @endif
                                <li><a href="{{URL::to('pel/personalInfo');}}"><i class="fa fa-angle-double-right"></i>Personal Info. </a></li>
                                <li><a href="{{URL::to('pel/accademicQali')}}"><i class="fa fa-angle-double-right"></i>Academic Qualification</a></li>
                                <li><a href="{{URL::to('pel/languageProficiency')}}"><i class="fa fa-angle-double-right"></i>Language Proficiency</a></li>
                                <li><a href="{{URL::to('pel/designeeRecords')}}"><i class="fa fa-angle-double-right"></i>Designee Records</a></li>
                                <li><a href="{{URL::to('pel/medicalCertificate')}}"><i class="fa fa-angle-double-right"></i>Medical Certification</a></li>
                                <li><a href="{{URL::to('pel/licenseInfoMain')}}"><i class="fa fa-angle-double-right"></i>License Info.</a></li>
                                <li><a href="{{URL::to('pel/licenseHistory')}}"><i class="fa fa-angle-double-right"></i>License History</a></li>
                                <li><a href="{{URL::to('pel/logbookReview')}}"><i class="fa fa-angle-double-right"></i>Logbook Review</a></li>

                                <li><a href="{{URL::to('pel/compView/'.Auth::user()->emp_id())}}"><i class="fa fa-angle-double-right"></i>Comprehensive View </a></li>
                            </ul>
                        </li>                       
                        @endif

						@if('true'==CommonFunction::hasPermission('admin_tracking',Auth::user()->emp_id(),'access'))
						<li class="treeview disNon">
                            <a href="#">
                                <i class="glyphicon glyphicon-eye-open"></i> <span>Admin Tracking </span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{URL::to('admin/main');}}"><i class="fa fa-angle-double-right"></i>Main</a></li>
								<li><a href="{{URL::to('admin/entry');}}"><i class="fa fa-angle-double-right"></i>Admin Tracking Entry</a></li>
                                <li><a href="{{URL::to('admin/issuedList');}}"><i class="fa fa-angle-double-right"></i>Admin Tracking View</a></li>
                            </ul>
                        </li>
						@endif
						@if('true'==CommonFunction::hasPermission('document_control',Auth::user()->emp_id(),'access'))
						<li class="treeview disNon">
                            <a href="#">
                                <i class="glyphicon glyphicon-tags"></i> <span>Document Control</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{URL::to('doc/main');}}"><i class="fa fa-angle-double-right"></i>Main</a></li>
								<li><a href="{{URL::to('doc/entry');}}"><i class="fa fa-angle-double-right"></i>Document Control Entry</a></li>
                                <li><a href="{{URL::to('doc/listView');}}"><i class="fa fa-angle-double-right"></i>Document Control List</a></li>
                            </ul>
                        </li>
						@endif	
						@if('true'==CommonFunction::hasPermission('aircraft',Auth::user()->emp_id(),'access'))
						<li class="treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-plane"></i> <span> Aircraft </span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{URL::to('aircraft/main');}}"><i class="fa fa-angle-double-right"></i>Main</a></li>	
								 @if('true'==CommonFunction::hasPermission('aircraft_add_new_aircraft',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('aircraft/new_aircraft');}}"><i class="fa fa-angle-double-right"></i>Add New Aircraft</a></li>							
							    @endif
								@if('true'==CommonFunction::hasPermission('airaft_list',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('aircraft/aircraftList');}}"><i class="fa fa-angle-double-right"></i>Aircraft List</a></li>	
								@endif
                            </ul>
                        </li>						
						@endif
						
					   @endif<!--End of Auth-->
			             <li class="treeview">
                            <a href="#">
                                <i class="glyphicon  glyphicon-book"></i> <span>Library</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                              @if(Auth::check())
								  <li><a href="{{URL::to('library/main');}}"><i class="fa fa-angle-double-right"></i>Main</a></li>
                            @if('true'==CommonFunction::hasPermission('e_library',Auth::user()->emp_id(),'entry'))
								<li><a href="{{URL::to('library/newSupportingDocuments');}}"><i class="fa fa-angle-double-right"></i>Add Supporting Doc</a></li>
                            @endif
                                <li><a href="{{URL::to('library/privateView');}}"><i class="fa fa-angle-double-right"></i>Supporting Docs List</a></li>
								
							
								@endif
                            </ul>
                        </li>
						  
					  
                    </ul>
                </section>
                <!-- /.sidebar -->
@endsection