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
                    <!--SIA-->
                    @if('true'==CommonFunction::hasPermission('sia',Auth::user()->emp_id(),'access'))
                        <li class="treeview <?php if($active=='sia') echo 'active';?>">
                            <a href="#">
                                <i class="glyphicon glyphicon-fullscreen"></i> <span>SIA</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{URL::to('surveillance/main');}}"><i class="fa fa-angle-double-right"></i>Main</a></li>
                                
                                @if('true'==CommonFunction::hasPermission('sia_board',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('surveillance/noticeBoard');}}"><i class="fa fa-angle-double-right"></i>Notice Board</a></li>
                                @endif

                                @if('true'==CommonFunction::hasPermission('my_sia',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('surveillance/mySia');}}"><i class="fa fa-angle-double-right"></i>{{Auth::user()->organization()}}'s SIA</a></li>
                                @endif
                                 @if('true'==CommonFunction::hasPermission('sia_inspector_associate_sia',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('surveillance/singleInspectorSia');}}"><i class="fa fa-angle-double-right"></i>My SIA</a></li>
                                @endif
                                @if('true'==CommonFunction::hasPermission('sia_program',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('surveillance/newProgram');}}"><i class="fa fa-angle-double-right"></i>Add New SIA Program</a></li>
                                @endif

                                @if('true'==CommonFunction::hasPermission('sia_today_task',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('surveillance/todayTaskList');}}"><i class="fa fa-angle-double-right"></i>Today's Task-list</a></li>
                                @endif

                                 @if('true'==CommonFunction::hasPermission('execute_sia_program',Auth::user()->emp_id(),'access'))
                                <li class="disNon"><a href="{{URL::to('surveillance/newActionEnrty');}}"><i class="fa fa-angle-double-right"> </i>Execute SIA Program</a></li>
                                @endif

                                @if('true'==CommonFunction::hasPermission('sia_program_list',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('surveillance/programList');}}"><i class="fa fa-angle-double-right"></i>SIA Programs List (All)</a></li>
                                @endif

                                @if('true'==CommonFunction::hasPermission('executed_sia_programs',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('surveillance/surveillanceList');}}"><i class="fa fa-angle-double-right"></i>Executed SIA Programs</a></li>
                                @endif

                                
                                @if('true'==CommonFunction::hasPermission('sia_central_search',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('surveillance/centralSearch');}}"><i class="fa fa-angle-double-right"></i>SIA Central Search</a></li>
                                @endif

                                @if('true'==CommonFunction::hasPermission('sia_report',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('surveillance/report');}}"><i class="fa fa-angle-double-right"></i>Report</a></li>
                                @endif

                                 <!--Safety Concerns List-->
                                @if('true'==CommonFunction::hasPermission('sc_safety_concerns_list',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('safety/issuedList');}}"><i class="fa fa-angle-double-right"></i>Safety Concerns List </a></li>
                                @endif
                                 <!--EDP List-->
                                @if('true'==CommonFunction::hasPermission('edp_list',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('surveillance/allEdp');}}"><i class="fa fa-angle-double-right"></i>EDP List </a></li>
                                @endif
                                
                                
                              
                            </ul>
                        </li>
                        @endif

                    
                    <!--Employee-->                       
						@if('true'==CommonFunction::hasPermission('employee',Auth::user()->emp_id(),'access'))
                        <li class="treeview <?php if($active=='employee') echo 'active';?>">
                            <a href="#">
                                <i class="glyphicon glyphicon-user"></i> <span>Employee</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{URL::to('qualification/main');}}"><i class="fa fa-angle-double-right"></i>Main</a></li>  
								@if('true'==CommonFunction::hasPermission('emp_admin_list',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('qualification/employees');}}"><i class="fa fa-angle-double-right"></i>Employees List</a></li>

                                <li><a href="{{URL::to('qualification/trainingArchive');}}"><i class="fa fa-angle-double-right"></i>Training Archive</a></li>

								<li><a href="{{URL::to('qualification/empTaskList');}}"><i class="fa fa-angle-double-right"></i>Employee Task List</a></li> 
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
					<!--Organization -->
                        @if('true'==CommonFunction::hasPermission('organization',Auth::user()->emp_id(),'access'))
                        <li class="treeview <?php if($active=='organization') echo 'active';?>">
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
                    <!--Personnel Licensing -->
                        @if('true'==CommonFunction::hasPermission('personnel_licensing',Auth::user()->emp_id(),'access'))
                        <li class="treeview <?php if($active=='personnel_licensing') echo 'active';?>">
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


                        <!--Aircraft-->
                        @if('true'==CommonFunction::hasPermission('aircraft',Auth::user()->emp_id(),'access'))
                        <li class="treeview <?php if($active=='aircraft') echo 'active';?>">
                            <a href="#">
                                <i class="glyphicon glyphicon-plane"></i> <span> Aircraft </span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{URL::to('aircraft/main');}}"><i class="fa fa-angle-double-right"></i>Main</a></li>   
                                @if('true'==CommonFunction::hasPermission('aircraft_my_list',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('aircraft/myAircraftList');}}"><i class="fa fa-angle-double-right"></i>My Aircraft</a></li>                          
                                @endif

                                @if('true'==CommonFunction::hasPermission('airaft_admin_list',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('aircraft/aircraftList');}}"><i class="fa fa-angle-double-right"></i>Aircraft List</a></li>  
                                @endif

                                @if('true'==CommonFunction::hasPermission('aircraft_add_new_aircraft',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('aircraft/new_aircraft');}}"><i class="fa fa-angle-double-right"></i>Add New Aircraft</a></li>   
                                @endif

                                @if('true'==CommonFunction::hasPermission('aircraft_report',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('aircraft/report');}}"><i class="fa fa-angle-double-right"></i>Report</a></li>   
                                @endif

                            </ul>
                        </li>                       
                        @endif

                        <!--ITS-->
                        @if('true'==CommonFunction::hasPermission('its',Auth::user()->emp_id(),'access'))
                        <li class="treeview <?php if($active=='its') echo 'active';?>">
                            <a href="#">
                                <i class="fa fa-briefcase"></i> <span> ITS </span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{URL::to('itsOjt/main');}}"><i class="fa fa-angle-double-right"></i>Main</a></li> 

                                @if('true'==CommonFunction::hasPermission('its_my_its_records',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('itsOjt/itsRecords');}}"><i class="fa fa-angle-double-right"></i>My ITS Records</a></li>                            
                                @endif
                                @if('true'==CommonFunction::hasPermission('its_add_trainee',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('itsOjt/addTrainee');}}"><i class="fa fa-angle-double-right"></i>Add Trainee</a></li>                            
                                @endif

                                @if('true'==CommonFunction::hasPermission('its_formal_course_and_job_task',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('itsOjt/addCourse');}}"><i class="fa fa-angle-double-right"></i>Add Formal Course & Job Task</a></li>                            
                                @endif

                                @if('true'==CommonFunction::hasPermission('its_course_ojt_list',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('itsOjt/courseList');}}"><i class="fa fa-angle-double-right"></i>Course / OJT List</a></li>                          
                                @endif

                                @if('true'==CommonFunction::hasPermission('its_assign_course_and_ojt',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('itsOjt/assignCourseAndOjt');}}"><i class="fa fa-angle-double-right"></i>Assign Course & OJT</a></li>    
                                @endif

                                @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('itsOjt/addTrainingOjt');}}"><i class="fa fa-angle-double-right"></i>Review / Update Tasks &Courses</a></li> 
                                @endif

                                @if('true'==CommonFunction::hasPermission('its_central_search',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('itsOjt/centralSearch');}}"><i class="fa fa-angle-double-right"></i>ITS Central Search</a></li>  
                                @endif


                            </ul>
                        </li>                       
                        @endif

                        <!--Library -->
                        @if('true'==CommonFunction::hasPermission('e_library',Auth::user()->emp_id(),'access'))
                        <li class="treeview <?php if($active=='e_library') echo 'active';?>">
                            <a href="#">
                                <i class="glyphicon glyphicon-book"></i> <span> E-Library </span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                 <li><a href="{{URL::to('library/main');}}"><i class="fa fa-angle-double-right"></i>Main</a></li>

                                @if('true'==CommonFunction::hasPermission('library_add_new_supporitng_docs',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('library/newSupportingDocuments');}}"><i class="fa fa-angle-double-right"></i>New Supporting Document</a></li>                            
                                @endif

                                @if('true'==CommonFunction::hasPermission('library_supporting_docs',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('library/privateView');}}"><i class="fa fa-angle-double-right"></i>View Supporting Document</a></li>                            
                                @endif

                                @if('true'==CommonFunction::hasPermission('library_report',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('library/report');}}"><i class="fa fa-angle-double-right"></i>Report</a></li>                            
                                @endif

                            </ul>
                        </li>                       
                        @endif

                        <!--Voluntary Reporting-->
                        @if('true'==CommonFunction::hasPermission('voluntary_reporting',Auth::user()->emp_id(),'access'))
                        <li class="treeview  <?php if($active=='voluntary_reporting') echo 'active';?>">
                            <a href="#">
                                <i class="fa fa-users"></i> <span>Voluntary Reporting</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                 <li><a href="{{URL::to('voluntary/main');}}"><i class="fa fa-angle-double-right"></i>Main</a></li>

                                @if('true'==CommonFunction::hasPermission('voluntary_reporting_list',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('voluntary/voluntaryReportingList');}}"><i class="fa fa-angle-double-right"></i>Voluntary Reporting List</a></li>                            
                                @endif

                            </ul>
                        </li>                       
                        @endif

                        <!--Help & FAQ -->
						@if('true'==CommonFunction::hasPermission('help_faq',Auth::user()->emp_id(),'access'))
						<li class="treeview  <?php if($active=='help_faq') echo 'active';?>">
                            <a href="#">
                                <i class="fa fa-question-circle"></i> <span>Help & FAQ </span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                 <li><a href="{{URL::to('helpFaq/main');}}"><i class="fa fa-angle-double-right"></i>Main</a></li>

                                @if('true'==CommonFunction::hasPermission('help_faq_ask_question',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('helpFaq/askQuestion');}}"><i class="fa fa-angle-double-right"></i>Ask Question</a></li>                            
                                @endif

                                @if('true'==CommonFunction::hasPermission('help_faq_bank',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('helpFaq/faqBank');}}"><i class="fa fa-angle-double-right"></i>FAQ Bank</a></li>                            
                                @endif

                                @if('true'==CommonFunction::hasPermission('help_faq_report',Auth::user()->emp_id(),'access'))
                                <li><a href="{{URL::to('helpFaq/report');}}"><i class="fa fa-angle-double-right"></i>Report</a></li>                            
                                @endif

                            </ul>
                        </li>						
						@endif
						
					   @endif<!--End of Auth-->
			          
						  
					  
                    </ul>
                </section>
                <!-- /.sidebar -->
@endsection