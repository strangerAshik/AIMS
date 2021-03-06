

@extends('layout')

@section('content')
<section class="content contentWidth">
<?php 
$courseStatus=0;
$level1Status=0;
$level2Status=0;
$level3Status=0;
$today_time = strtotime(date("Y-m-d"));
?>
   <!--Formal Course description-->
   <div class="row" >
      <div class="col-md-12">
         <!-- general form elements -->
         <div class="box box-primary ">
            <div class="box-header  table_toggle expand">
               <div class="man pull-right" >-</div>
               <span class="box-title">
                  <h3 >{{$its_course_number}} : {{$getCourseName}}</h3>
                  <h4 >{{$its_job_task_no}}: {{$getOjtTitle}}  </h4>
                  <h4>
                  <i>Employee Name : {{CommonFunction::getEmployeeName($emp_tracker)}} </i> </h4
               </span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<!--Navigation-->
				<span>
				&nbsp &nbsp <a  class="hidden-print" href="#formal" style="color:green" >[ Formal Course ] </a>
				&nbsp &nbsp <a  class="hidden-print" href="#L1" style="color:green" >[ OJT Level-1 ] </a>
				&nbsp &nbsp <a  class="hidden-print" href="#L2" style="color:green" >[ OJT Level-2 ] </a> 
				&nbsp &nbsp <a  class="hidden-print" href="#L3" style="color:green" >[ OJT Level-3 ] </a> 
				</span>
               <table class="table table-bordered">
                  <tbody>
                     <!--Menue-->
                     <tr id='formal'>
                        <td colspan="2">
&nbsp &nbsp <a  class="hidden-print"href="#" style="" data-toggle="modal" data-target="#updateFormalCourse">[ Update Formal Course ]</a> </td>
                     </tr>
                     @if($formal)
                     <?php $num=0;?>
                     @foreach($formal as $info)
                     <tr id="formal{{$info->id}}">
                        <th class="col-md-12" colspan="2" style="background:#ddd">									
                           Formal Course Details #{{++$num}}
                           <span class='hidden-print'>
                           @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'par_delete'))
                           {{ HTML::linkAction('BaseController@permanentDelete', 'P.D',array('itsojt_formal_ojt_course_status',$info->id,"formal$info->id"), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','title'=>'Permanent Delete','onclick'=>" return confirm('Wanna Delete?')")) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'sof_delete'))
                           {{ HTML::linkAction('BaseController@softDelete', 'S.D',array('itsojt_formal_ojt_course_status',$info->id,"formal$info->id"), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','title'=>'Soft Delete','onclick'=>" return confirm('Wanna Delete?')")) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'approve'))
                           {{ HTML::linkAction('BaseController@approve', '',array('itsojt_formal_ojt_course_status',$info->id,"formal$info->id"), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;','title'=>'Approval')) }}
                           {{ HTML::linkAction('BaseController@notApprove', '',array('itsojt_formal_ojt_course_status',$info->id,"formal$info->id"), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;','title'=>'Disapproval')) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'worning'))
                           {{ HTML::linkAction('BaseController@removeWarning', '',array('itsojt_formal_ojt_course_status',$info->id,"formal$info->id"), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;','title'=>'Warning')) }}
                           {{ HTML::linkAction('BaseController@warning', '',array('itsojt_formal_ojt_course_status',$info->id,"formal$info->id"), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;','title'=>'Remove Warning')) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'update'))
                           <a title='Edit' data-toggle="modal" data-target="#editFormal{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
                           <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                           </a>
                           @endif
                           </span>
                        </th>
                     </tr>
                     @if($info->approve=='0')
                     <tr>
                        <th  colspan='2'> {{AircraftPrimaryInfo::notApproved($info)}}</th>
                     </tr>
                     @endif
                     @if($info->warning=='1')
                     <tr  >
                        <th colspan='2'>{{AircraftPrimaryInfo::warning($info)}}	</th>
                     </tr>
                     @endif
                     <tr>
                        <th class="col-md-3">									
                           Instructor
                        </th>
                        <td>{{$info->instructor}}</td>
                     </tr>
                     <tr>
                        <th class="col-md-3">									
                           Supervisor
                        </th>
                        <td>{{$info->supervisor}}</td>
                     </tr>
                     <tr>
                        <th class="col-md-3">									
                           Manager
                        </th>
                        <td>{{$info->manager}}</td>
                     </tr>
                     <tr>
                        <th class="col-md-3">									
                           Start Date
                        </th>
                        <td>{{$info->start_date}}</td>
                     </tr>
                     <tr>
                        <th class="col-md-3">									
                           Completion Date
                        </th>
                        <td>{{$info->completion_date}}</td>
                     </tr>
                     @if($info->completion_status=='Yes')
                     <tr>
                        <th class="col-md-3">									
                           Validity
                        </th>
                        <td>                        
                        <!--is Formal validate-->
                        <?php                        
                        $expire_time = strtotime($info->validity_date);
                        ?>
                        @if($expire_time<$today_time)
                           <span style="color: red;">{{$info->validity_date}}</span>
                            <?php
                             if($courseStatus!=1)
                             $courseStatus=2;
                              ?>
                        @else 
                           <span style="color: green;">{{$info->validity_date}}</span>
                           <?php 
                           if($courseStatus!=1)
                              $courseStatus=1; 
                           ?>
                        @endif
                        </td>
                     </tr>
                     @endif
                     <tr>
                        <th class="col-md-3">									
                           Completion Status
                        </th>
                        <td>{{$info->completion_status}}</td>
                     </tr>
                     <tr>
                        <th class="col-md-3">									
                           Certificate
                        </th>
                        <td>
                           @if($info->certificate!='Null'){{HTML::link('files/itsOjt/'.$info->certificate,'Certificate',array('target'=>'_blank'))}}
                           @else
                           {{HTML::link('#','No Certificate Provided')}}
                           @endif
                        </td>
                     </tr>
                     <tr>
                        <th class="col-md-3">
                           Comment
                        </th>
                        <td>{{nl2br($info->notes)}}</td>
                     </tr>
                     <tr>
                        <td colspan="2">
                           <i>Initialized By : {{$info->row_creator}} | 
                           Initialized at : {{$info->created_at}} | 
                           Last Updated By : {{$info->row_updator}} | 
                           Updated at : {{$info->updated_at}}</i>
                        </td>
                     </tr>
                     @endforeach
                     @else 
                     <tr>
                        <td colspan="2"></td>
                     </tr>
                     <tr style="background:#ddd">
                        <th class="col-md-3" >									
                           Formal Course Status
                        </th>
                        <td>Not Done</td>
                     </tr>
                     <tr>
                        <td colspan="2"></td>
                     </tr>
                     @endif
                     <!--Level 1-->
                     <!--Menue-->
                     <tr id='L1'>
                        <td colspan="2">&nbsp &nbsp <a  class="hidden-print"href="#" style="" data-toggle="modal" data-target="#updateLevel1">[ Update Level-1 ]</a>  </td>
                     </tr>
                     <tr>
                        <td colspan="2">
                        </td>
                     </tr>
                     @if($level1)
                     <?php $num=0;?>
                     @foreach($level1 as $info)
                     <tr id="L1{{$info->id}}">
                        <th class="col-md-12" colspan="2" style="background:#ddd">									
                           Level-1 Details #{{++$num}}
                           <span class='hidden-print'>
                           @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'par_delete'))
                           {{ HTML::linkAction('BaseController@permanentDelete', 'P.D',array('itsojt_formal_ojt_course_status',$info->id,"L1$info->id"), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','title'=>'Permanent Delete','onclick'=>" return confirm('Wanna Delete?')")) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'sof_delete'))
                           {{ HTML::linkAction('BaseController@softDelete', 'S.D',array('itsojt_formal_ojt_course_status',$info->id,"L1$info->id"), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','title'=>'Soft Delete','onclick'=>" return confirm('Wanna Delete?')")) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'approve'))
                           {{ HTML::linkAction('BaseController@approve', '',array('itsojt_formal_ojt_course_status',$info->id,"L1$info->id"), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;','title'=>'Approval')) }}
                           {{ HTML::linkAction('BaseController@notApprove', '',array('itsojt_formal_ojt_course_status',$info->id,"L1$info->id"), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;','title'=>'Disapproval')) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'worning'))
                           {{ HTML::linkAction('BaseController@removeWarning', '',array('itsojt_formal_ojt_course_status',$info->id,"L1$info->id"), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;','title'=>'Warning')) }}
                           {{ HTML::linkAction('BaseController@warning', '',array('itsojt_formal_ojt_course_status',$info->id,"L1$info->id"), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;','title'=>'Remove Warning')) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'update'))
                           <a title='Edit' data-toggle="modal" data-target="#editLevel1{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
                           <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                           </a>
                           @endif
                           </span>
                        </th>
                     </tr>
                     @if($info->approve=='0')
                     <tr>
                        <th  colspan='2'> {{AircraftPrimaryInfo::notApproved($info)}}</th>
                     </tr>
                     @endif
                     @if($info->warning=='1')
                     <tr  >
                        <th colspan='2'>{{AircraftPrimaryInfo::warning($info)}}	</th>
                     </tr>
                     @endif
                     <tr>
                        <th class="col-md-3">									
                           Instructor
                        </th>
                        <td>{{$info->instructor}}</td>
                     </tr>
                     <tr>
                        <th class="col-md-3">									
                           Supervisor
                        </th>
                        <td>{{$info->supervisor}}</td>
                     </tr>
                     <tr>
                        <th class="col-md-3">									
                           Manager
                        </th>
                        <td>{{$info->manager}}</td>
                     </tr>
                     <tr>
                        <th class="col-md-3">									
                           Start Date
                        </th>
                        <td>{{$info->start_date}}</td>
                     </tr>
                     <tr>
                        <th class="col-md-3">									
                           Completion Date
                        </th>
                        <td>{{$info->completion_date}}</td>
                     </tr>
                     @if($info->completion_status=='Yes')
                     <tr>
                        <th class="col-md-3">									
                           Validity
                        </th>
                        <td>
                        <?php 
                        $expire_time = strtotime($info->validity_date);
                        ?>
                        @if($expire_time<$today_time)
                           <span style="color: red;">{{$info->validity_date}}</span>
                           <?php 
                           if($level1Status!=1)
                              $level1Status=2; 
                           ?>
                        @else 
                           <span style="color: green;">{{$info->validity_date}}</span>
                           <?php 
                           if($level1Status!=1)
                              $level1Status=1; 
                           ?>
                        @endif
                        </td>
                     </tr>
                     @endif
                     <tr>
                        <th class="col-md-3">									
                           Completion Status
                        </th>
                        <td>{{$info->completion_status}}</td>
                     </tr>
                     <tr>
                        <th class="col-md-3">									
                           Certificate
                        </th>
                        <td>
                           @if($info->certificate!='Null'){{HTML::link('files/itsOjt/'.$info->certificate,'Certificate',array('target'=>'_blank'))}}
                           @else
                           {{HTML::link('#','No Certificate Provided')}}
                           @endif
                        </td>
                     </tr>
                     <tr>
                        <th class="col-md-3">
                           Comment
                        </th>
                        <td>{{nl2br($info->notes)}}</td>
                     </tr>
                     <tr>
                        <td colspan="2">
                           <i>Initialized By : {{$info->row_creator}} | 
                           Initialized at : {{$info->created_at}} | 
                           Last Updated By : {{$info->row_updator}} | 
                           Updated at : {{$info->updated_at}}</i>
                        </td>
                     </tr>
                     @endforeach
                     @else 
                     <tr>
                        <td colspan="2"></td>
                     </tr>
                     <tr style="background:#ddd">
                        <th class="col-md-3" >									
                           OJT Level #1 Status
                        </th>
                        <td>Not Done</td>
                     </tr>
                     <tr>
                        <td colspan="2"></td>
                     </tr>
                     @endif
                     <!--Level 2-->
                     <!--Menue-->
                     <tr id='L2'>
                        <td colspan="2">
                         @if($level1)
                        &nbsp &nbsp <a  class="hidden-print"href="#" style="" data-toggle="modal" data-target="#updateLevel2">[ Update Level-2 ]</a>
                        @else 
                         &nbsp &nbsp <a  class="hidden-print"href="#" style="color:#DDD" title="Complete Level-1 First" data-toggle="modal" data-target="#">[ Update Level-2 ]</a>
                        @endif
                        </td>
                     </tr>
                     @if($level2)
                     <?php $num=0;?>
                     @foreach($level2 as $info)
                     <tr id="L2{{$info->id}}">
                        <th class="col-md-12" colspan="2" style="background:#ddd">									
                           Level-2 Details #{{++$num}}
                           <span class='hidden-print'>
                           @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'par_delete'))
                           {{ HTML::linkAction('BaseController@permanentDelete', 'P.D',array('itsojt_formal_ojt_course_status',$info->id,"L2$info->id"), array('class' => 'glyphicon glBaseControlleryphicon-trash','style'=>'color:red;float:right;padding:5px;','title'=>'Permanent Delete','onclick'=>" return confirm('Wanna Delete?')")) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'sof_delete'))
                           {{ HTML::linkAction('BaseController@softDelete', 'S.D',array('itsojt_formal_ojt_course_status',$info->id,"L2$info->id"), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','title'=>'Soft Delete','onclick'=>" return confirm('Wanna Delete?')")) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'approve'))
                           {{ HTML::linkAction('BaseController@approve', '',array('itsojt_formal_ojt_course_status',$info->id,"L2$info->id"), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;','title'=>'Approval')) }}
                           {{ HTML::linkAction('BaseController@notApprove', '',array('itsojt_formal_ojt_course_status',$info->id,"L2$info->id"), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;','title'=>'Disapproval')) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'worning'))
                           {{ HTML::linkAction('BaseController@removeWarning', '',array('itsojt_formal_ojt_course_status',$info->id,"L2$info->id"), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;','title'=>'Warning')) }}
                           {{ HTML::linkAction('BaseController@warning', '',array('itsojt_formal_ojt_course_status',$info->id,"L2$info->id"), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;','title'=>'Remove Warning')) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'update'))
                           <a title='Edit' data-toggle="modal" data-target="#editLevel2{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
                           <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                           </a>
                           @endif
                           </span>
                        </th>
                     </tr>
                     @if($info->approve=='0')
                     <tr>
                        <th  colspan='2'> {{AircraftPrimaryInfo::notApproved($info)}}</th>
                     </tr>
                     @endif
                     @if($info->warning=='1')
                     <tr  >
                        <th colspan='2'>{{AircraftPrimaryInfo::warning($info)}}	</th>
                     </tr>
                     @endif
                     <tr>
                        <th class="col-md-3">									
                           Instructor
                        </th>
                        <td>{{$info->instructor}}</td>
                     </tr>
                     <tr>
                        <th class="col-md-3">									
                           Supervisor
                        </th>
                        <td>{{$info->supervisor}}</td>
                     </tr>
                     <tr>
                        <th class="col-md-3">									
                           Manager
                        </th>
                        <td>{{$info->manager}}</td>
                     </tr>
                     <tr>
                        <th class="col-md-3">									
                           Start Date
                        </th>
                        <td>{{$info->start_date}}</td>
                     </tr>
                     <tr>
                        <th class="col-md-3">									
                           Completion Date
                        </th>
                        <td>{{$info->completion_date}}</td>
                     </tr>
                     @if($info->completion_status=='Yes')
                     <tr>
                        <th class="col-md-3">									
                           Validity
                        </th>
                        <td>

                        <?php 
                        $expire_time = strtotime($info->validity_date);
                        ?>
                        @if($expire_time<$today_time)
                           <span style="color: red;">{{$info->validity_date}}</span>
                           <?php 
                           if($level2Status!=1)
                              $level2Status=2; 
                           ?>
                        @else 
                           <span style="color: green;">{{$info->validity_date}}</span>
                           <?php 
                           if($level2Status!=1)
                              $level2Status=1; 
                           ?>
                        @endif

                        </td>
                     </tr>
                     @endif
                     <tr>
                        <th class="col-md-3">									
                           Completion Status
                        </th>
                        <td>{{$info->completion_status}}</td>
                     </tr>
                     <tr>
                        <th class="col-md-3">									
                           Certificate
                        </th>
                        <td>
                           @if($info->certificate!='Null'){{HTML::link('files/itsOjt/'.$info->certificate,'Certificate',array('target'=>'_blank'))}}
                           @else
                           {{HTML::link('#','No Certificate Provided')}}
                           @endif
                        </td>
                     </tr>
                     <tr>
                        <th class="col-md-3">
                           Comment
                        </th>
                        <td>{{nl2br($info->notes)}}</td>
                     </tr>
                     <tr>
                        <td colspan="2">
                           <i>Initialized By : {{$info->row_creator}} | 
                           Initialized at : {{$info->created_at}} | 
                           Last Updated By : {{$info->row_updator}} | 
                           Updated at : {{$info->updated_at}}</i>
                        </td>
                     </tr>
                     @endforeach
                     @else 
                     <tr style="background:#ddd">
                        <th class="col-md-3" >									
                           OJT Level #2 Status
                        </th>
                        <td>Not Done</td>
                     </tr>
                     <tr>
                        <td colspan="2"></td>
                     </tr>
                     @endif
                     <!--Level 3-->
                     <!--Menue-->
                     <tr id='L3'>
                        <td colspan="2">
                        @if($level1 && $level2)
                        &nbsp &nbsp <a  class="hidden-print"href="#" style="" data-toggle="modal" data-target="#updateLevel3">[ Update Level-3 ]</a>
                        @else                         
                        &nbsp &nbsp <a  class="hidden-print"href="#" style="color: #ddd" data-toggle="modal" data-target="#" title="Complete Level-1 & Level-2 First">[ Update Level-3 ]</a>
                        @endif
                        </td>
                     </tr>
                     @if($level3)
                     <?php $num=0;?>
                     @foreach($level3 as $info)
                     <tr id="L3{{$info->id}}">
                        <th class="col-md-12" colspan="2" style="background:#ddd">									
                           Level-3 Details #{{++$num}}
                           <span class='hidden-print'>
                           @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'par_delete'))
                           {{ HTML::linkAction('BaseController@permanentDelete', 'P.D',array('itsojt_formal_ojt_course_status',$info->id,"L3$info->id"), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','title'=>'Permanent Delete','onclick'=>" return confirm('Wanna Delete?')")) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'sof_delete'))
                           {{ HTML::linkAction('BaseController@softDelete', 'S.D',array('itsojt_formal_ojt_course_status',$info->id,"L3$info->id"), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','title'=>'Soft Delete','onclick'=>" return confirm('Wanna Delete?')")) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'approve'))
                           {{ HTML::linkAction('BaseController@approve', '',array('itsojt_formal_ojt_course_status',$info->id,"L3$info->id"), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;','title'=>'Approval')) }}
                           {{ HTML::linkAction('BaseController@notApprove', '',array('itsojt_formal_ojt_course_status',$info->id,"L3$info->id"), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;','title'=>'Disapproval')) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'worning'))
                           {{ HTML::linkAction('BaseController@removeWarning', '',array('itsojt_formal_ojt_course_status',$info->id,"L3$info->id"), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;','title'=>'Warning')) }}
                           {{ HTML::linkAction('BaseController@warning', '',array('itsojt_formal_ojt_course_status',$info->id,"L3$info->id"), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;','title'=>'Remove Warning')) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('its_review_update_tasks_and_course',Auth::user()->emp_id(),'update'))
                           <a title='Edit' data-toggle="modal" data-target="#editLevel3{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
                           <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                           </a>
                           @endif
                           </span>
                        </th>
                     </tr>
                     @if($info->approve=='0')
                     <tr>
                        <th  colspan='2'> {{AircraftPrimaryInfo::notApproved($info)}}</th>
                     </tr>
                     @endif
                     @if($info->warning=='1')
                     <tr  >
                        <th colspan='2'>{{AircraftPrimaryInfo::warning($info)}}	</th>
                     </tr>
                     @endif
                     <tr>
                        <th class="col-md-3">									
                           Instructor
                        </th>
                        <td>{{$info->instructor}}</td>
                     </tr>
                     <tr>
                        <th class="col-md-3">									
                           Supervisor
                        </th>
                        <td>{{$info->supervisor}}</td>
                     </tr>
                     <tr>
                        <th class="col-md-3">									
                           Manager
                        </th>
                        <td>{{$info->manager}}</td>
                     </tr>
                     <tr>
                        <th class="col-md-3">									
                           Start Date
                        </th>
                        <td>{{$info->start_date}}</td>
                     </tr>
                     <tr>
                        <th class="col-md-3">									
                           Completion Date
                        </th>
                        <td>{{$info->completion_date}}</td>
                     </tr>
                     @if($info->completion_status=='Yes') 
                     <tr>
                        <th class="col-md-3">									
                           Validity
                        </th>
                        <td>
                        
                        <?php 
                        $expire_time = strtotime($info->validity_date);
                        ?>
                        @if($expire_time<$today_time)
                           <span style="color: red;">{{$info->validity_date}}</span>
                           <?php 
                           if($level3Status!=1)
                              $level3Status=2; 
                           ?>
                        @else 
                           <span style="color: green;">{{$info->validity_date}}</span>
                           <?php 
                           if($level3Status!=1)
                              $level3Status=1; 
                           ?>
                        @endif

                        </td>
                     </tr>
                     @endif
                     <tr>
                        <th class="col-md-3">									
                           Completion Status
                        </th>
                        <td>{{$info->completion_status}}</td>
                     </tr>
                     <tr>
                        <th class="col-md-3">									
                           Certificate
                        </th>
                        <td>
                           @if($info->certificate!='Null'){{HTML::link('files/itsOjt/'.$info->certificate,'Certificate',array('target'=>'_blank'))}}
                           @else
                           {{HTML::link('#','No Certificate Provided')}}
                           @endif
                        </td>
                     </tr>
                     <tr>
                        <th class="col-md-3">
                           Comment
                        </th>
                        <td>{{nl2br($info->notes)}}</td>
                     </tr>
                     <tr>
                        <td colspan="2">
                           <i>Initialized By : {{$info->row_creator}} | 
                           Initialized at : {{$info->created_at}} | 
                           Last Updated By : {{$info->row_updator}} | 
                           Updated at : {{$info->updated_at}}</i>
                        </td>
                     </tr>
                     @endforeach
                     @else 
                     <tr style="background:#ddd">
                        <th class="col-md-3" >									
                           OJT Level #3 Status
                        </th>
                        <td>Not Done</td>
                     </tr>
                     <tr>
                        <td colspan="2"></td>
                     </tr>
                     @endif
                     <tr style=" font-weight: bold">
                        <th>Designation on This OJT</th>
                        <?php $ojtL3=CommonFunction::ojtCourseStatus($its_course_number,$its_job_task_no,$emp_tracker,'L3');?>
                        <?php $formalStatus=CommonFunction::formalCourseStatus($its_course_number,$emp_tracker);?>
                        <td>

                           @if($courseStatus==1 && $level1Status==1 &&$level2Status==1 &&$level3Status==1 )
                           <span class="inspector">Inspector</span>                           
                           @elseif($courseStatus==0 || $level1Status==0 || $level2Status==0  || $level3Status==0 )
                           <span class="trainee">Trainee</span>
                           @elseif($courseStatus==2 || $level1Status==2 || $level2Status==2 || $level3Status==2 )
                           <span class="due">Refresher Due</span>
                           @endif
                        </td>
                        
                     </tr>
                  </tbody>
               </table>
            </div>
            <!-- /.box-body -->
         </div>
         <!-- /.box -->
      </div>
      @include('common')
      @yield('print')
   </div>
</section>
@include('itsOjt/editForm')
@yield('updateCourseUpdate')
<!--Update FormalCourse-->
<div class="modal fade" id="updateFormalCourse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Update Formal Course Status</h4>
         </div>
         <div class="modal-body">
            {{Form::open(array('url'=>'itsOjt/updateFormalOjtStatus','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>'true'))}}
            {{Form::hidden('emp_tracker',$emp_tracker)}}
            {{Form::hidden('itscn',$its_course_number)}}
            {{Form::hidden('level','formal')}}
            <div class="form-group required">
               {{Form::label('instructor', 'Instructor', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::text('instructor','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('supervisor', 'Supervisor', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::text('supervisor','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('manager', 'Manager', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::text('manager','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('start_date', 'Start Date', array('class' => 'col-xs-4 control-label'))}}
               <div class="row">
                  <div class="col-xs-2">
                     {{Form::select('start_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-3">
                     {{Form::select('start_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-2">
                     {{Form::select('start_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
                  </div>
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('completion_date', 'Completion Date', array('class' => 'col-xs-4 control-label'))}}
               <div class="row">
                  <div class="col-xs-2">
                     {{Form::select('completion_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-3">
                     {{Form::select('completion_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-2">
                     {{Form::select('completion_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
                  </div>
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('validity_date', 'Validity', array('class' => 'col-xs-4 control-label'))}}
               <div class="row">
                  <div class="col-xs-2">
                     {{Form::select('validity_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-3">
                     {{Form::select('validity_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-2">
                     {{Form::select('validity_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
                  </div>
               </div>
            </div>
            <div class="form-group required">
               {{Form::label(' completion_status', ' Completion Status', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  <div class="radio">									 
                     <label> {{ Form::radio('completion_status', 'Yes',true) }} &nbsp  Passed</label>
                     <label> {{ Form::radio('completion_status', 'No') }} &nbsp  Failed</label>
                  </div>
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('upload_certificate', 'Upload Certificate', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::file('certificate',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('comment', 'Comment', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::textarea('notes','',array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
               </div>
            </div>
            <div class="form-group">
               <button type="submit"  value='' class="btn btn-primary btn-lg btn-block">Save</button>
            </div>
         </div>
         {{Form::close()}}
      </div>
   </div>
</div>
</div>
<!--Update Level-->
<div class="modal fade" id="updateLevel1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Update Level-1 Status</h4>
         </div>
         <div class="modal-body">
            {{Form::open(array('url'=>'itsOjt/updateFormalOjtStatus','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>'true'))}}
            {{Form::hidden('emp_tracker',$emp_tracker)}}
            {{Form::hidden('itscn',$its_course_number)}}
            {{Form::hidden('ojt_task_no',$its_job_task_no)}}
            {{Form::hidden('level','L1')}}
            <div class="form-group required">
               {{Form::label('instructor', 'Instructor', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::text('instructor','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('supervisor', 'Supervisor', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::text('supervisor','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('manager', 'Manager', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::text('manager','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('start_date', 'Start Date', array('class' => 'col-xs-4 control-label'))}}
               <div class="row">
                  <div class="col-xs-2">
                     {{Form::select('start_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-3">
                     {{Form::select('start_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-2">
                     {{Form::select('start_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
                  </div>
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('completion_date', 'Completion Date', array('class' => 'col-xs-4 control-label'))}}
               <div class="row">
                  <div class="col-xs-2">
                     {{Form::select('completion_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-3">
                     {{Form::select('completion_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-2">
                     {{Form::select('completion_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
                  </div>
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('validity_date', 'Validity', array('class' => 'col-xs-4 control-label'))}}
               <div class="row">
                  <div class="col-xs-2">
                     {{Form::select('validity_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-3">
                     {{Form::select('validity_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-2">
                     {{Form::select('validity_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
                  </div>
               </div>
            </div>
            <div class="form-group required">
               {{Form::label(' completion_status', ' Completion Status', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  <div class="radio">									 
                     <label> {{Form::radio('completion_status', 'Yes',true)}} &nbsp  Passed</label>
                     <label> {{Form::radio('completion_status', 'No')}} &nbsp  Failed</label>
                  </div>
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('upload_certificate', 'Upload Certificate', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::file('certificate',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('comment', 'Comment', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::textarea('notes','',array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
               </div>
            </div>
            <div class="form-group">
               <button type="submit"  value='' class="btn btn-primary btn-lg btn-block">Save</button>
            </div>
         </div>
         {{Form::close()}}
      </div>
   </div>
</div>
</div>
<!--Level2-->
<div class="modal fade" id="updateLevel2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Update Level 2 Status</h4>
         </div>
         <div class="modal-body">
            {{Form::open(array('url'=>'itsOjt/updateFormalOjtStatus','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>'true'))}}
            {{Form::hidden('emp_tracker',$emp_tracker)}}
            {{Form::hidden('itscn',$its_course_number)}}
            {{Form::hidden('ojt_task_no',$its_job_task_no)}}
            {{Form::hidden('level','L2')}}
            <div class="form-group required">
               {{Form::label('instructor', 'Instructor', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::text('instructor','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('supervisor', 'Supervisor', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::text('supervisor','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('manager', 'Manager', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::text('manager','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('start_date', 'Start Date', array('class' => 'col-xs-4 control-label'))}}
               <div class="row">
                  <div class="col-xs-2">
                     {{Form::select('start_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-3">
                     {{Form::select('start_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-2">
                     {{Form::select('start_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
                  </div>
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('completion_date', 'Completion Date', array('class' => 'col-xs-4 control-label'))}}
               <div class="row">
                  <div class="col-xs-2">
                     {{Form::select('completion_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-3">
                     {{Form::select('completion_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-2">
                     {{Form::select('completion_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
                  </div>
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('validity_date', 'Validity', array('class' => 'col-xs-4 control-label'))}}
               <div class="row">
                  <div class="col-xs-2">
                     {{Form::select('validity_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-3">
                     {{Form::select('validity_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-2">
                     {{Form::select('validity_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
                  </div>
               </div>
            </div>
            <div class="form-group required">
               {{Form::label(' completion_status', ' Completion Status', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  <div class="radio">									 
                     <label> {{Form::radio('completion_status', 'Yes',true)}} &nbsp  Passed</label>
                     <label> {{Form::radio('completion_status', 'No')}} &nbsp  Failed</label>
                  </div>
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('upload_certificate', 'Upload Certificate', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::file('certificate',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('comment', 'Comment', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::textarea('notes','',array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
               </div>
            </div>
            <div class="form-group">
               <button type="submit"  value='' class="btn btn-primary btn-lg btn-block">Save</button>
            </div>
         </div>
         {{Form::close()}}
      </div>
   </div>
</div>
</div>
<!--Level 3-->
<div class="modal fade" id="updateLevel3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Update Level 3 Status</h4>
         </div>
         <div class="modal-body">
            {{Form::open(array('url'=>'itsOjt/updateFormalOjtStatus','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form','files'=>'true'))}}
            {{Form::hidden('emp_tracker',$emp_tracker)}}
            {{Form::hidden('itscn',$its_course_number)}}
            {{Form::hidden('ojt_task_no',$its_job_task_no)}}
            {{Form::hidden('level','L3')}}
            <div class="form-group required">
               {{Form::label('instructor', 'Instructor', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::text('instructor','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('supervisor', 'Supervisor', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::text('supervisor','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('manager', 'Manager', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::text('manager','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('start_date', 'Start Date', array('class' => 'col-xs-4 control-label'))}}
               <div class="row">
                  <div class="col-xs-2">
                     {{Form::select('start_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-3">
                     {{Form::select('start_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-2">
                     {{Form::select('start_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
                  </div>
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('completion_date', 'Completion Date', array('class' => 'col-xs-4 control-label'))}}
               <div class="row">
                  <div class="col-xs-2">
                     {{Form::select('completion_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-3">
                     {{Form::select('completion_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-2">
                     {{Form::select('completion_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
                  </div>
               </div>
            </div>
            <div class="form-group required">
               {{Form::label('validity_date', 'Validity', array('class' => 'col-xs-4 control-label'))}}
               <div class="row">
                  <div class="col-xs-2">
                     {{Form::select('validity_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-3">
                     {{Form::select('validity_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="col-xs-2">
                     {{Form::select('validity_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
                  </div>
               </div>
            </div>
            <div class="form-group required">
               {{Form::label(' completion_status', ' Completion Status', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  <div class="radio">									 
                     <label> {{ Form::radio('completion_status', 'Yes',true) }} &nbsp  Passed</label>
                     <label> {{ Form::radio('completion_status', 'No') }} &nbsp  Failed</label>
                  </div>
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('upload_certificate', 'Upload Certificate', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::file('certificate',array("accept"=>"image/*,application/pdf",'class'=>'fileupload'))}}
               </div>
            </div>
            <div class="form-group ">
               {{Form::label('comment', 'Comment', array('class' => 'col-xs-4 control-label'))}}
               <div class="col-xs-6">
                  {{Form::textarea('notes','',array('class' => 'form-control','placeholder'=>'','size'=>'4x2'))}}
               </div>
            </div>
            <div class="form-group">
               <button type="submit"  value='' class="btn btn-primary btn-lg btn-block">Save</button>
            </div>
         </div>
         {{Form::close()}}
      </div>
   </div>
</div>
</div>
@stop

