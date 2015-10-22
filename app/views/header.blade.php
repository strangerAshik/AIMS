 @section('header')
 <div style='display:none'>
 @if(Auth::check())
{{$emp_id = Auth::user()->emp_id();}}
@endif
</div>
 <a href="#" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->				
                AIMS
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
			
			<a class="navbar-btn sidebar-toggle" role="button" data-toggle="offcanvas" href="#">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</a>
                <!-- Sidebar toggle button-->
              @if(Auth::check())    
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                       
                        <!-- Notifications: style can be found in dropdown.less -->
                        
                        <!-- Tasks: style can be found in dropdown.less -->
                        
                        <!-- User Account: style can be found in dropdown.less -->
                    
					   <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>
										{{$id = Auth::user()->getName();}} <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
							
                                <li class="user-header bg-light-blue">
                                   
									@if(Auth::user()->photo())
                                        {{HTML::image('files/userPhoto/'.Auth::user()->photo(),'User',array('class'=>'img-circle'))}}
                                    @elseif(Employee::profilePic($emp_id))
                                        {{HTML::image('img/PersonnelPhoto/'.Employee::profilePic($emp_id),'User',array('class'=>'img-circle'))}}
                                    @else
                                        {{HTML::image('img/PersonnelPhoto/anonymous.png','User',array('class'=>'img-circle'))}}
                                    @endif
                                   <!-- <p>
                                        Jane Doe - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>-->
                                </li>
							
                                <!-- Menu Body -->
                               
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
									{{ HTML::linkAction('SettingsController@index', 'Settings',array(), array('class' => 'btn btn-default btn-flat')) }}
									
                                    </div>
                                    <div class="pull-right">
										{{ HTML::linkAction('SettingsController@logout', 'Sign out',array(), array('class' => 'btn btn-default btn-flat')) }}
                                    </div>
                                </li>
                            </ul>
                        </li>
						
                    </ul>
                </div>
				@endif
            </nav>
@endsection