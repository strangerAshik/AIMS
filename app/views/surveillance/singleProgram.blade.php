

@extends('layout')
@section('content')
<section class="content widthController">
   <?php 
   //Some Variable 
   $hasFinding='No';
   $hasEdp='No';
   $hasSc='No';
   ?>
   <!--Get The Team Members-->
   <?php 
   //getting member in an array 
      $members=CommonFunction::updateMultiSelection('sia_program', 'sia_number',$sia_number,'team_members');?>	
   <?php 
   //checking whether member or not 
   $imTeamMember=CommonFunction::isItMe($members,Auth::user()->emp_id());?>
   <?php $role=Auth::user()->Role();?>
   <!--organization -->
   <?php $myOrg=Auth::user()->Organization();?>
   <?php $siaOrg=CommonFunction::siaOrg($sia_number);?>
   @if($imTeamMember=='true'|| 'true'==CommonFunction::hasPermission('sia_single_program',Auth::user()->emp_id(),'access'))
   <div class='row col-md-12 hidden-print'>
      @if('true'==CommonFunction::hasPermission('sia_followup',Auth::user()->emp_id(),'access'))
      <p class="text-center col-md-12">
         <a class="btn btn-primary btn-block" target="_blink" href="{{URL::to('surveillance/followUp/'.$sia_number);}}">Follow Up</a>
      </p>
      @endif
      @if('true'==CommonFunction::hasPermission('sia_corrective_action',Auth::user()->emp_id(),'access'))
      <p class="text-center col-md-12">
         <a class="btn btn-primary btn-block"  href="{{URL::to('surveillance/correctiveAction/'.$sia_number);}}">Corrective Action [Findings]</a>
      </p>
      @endif
   </div>
   <div class="row" >
      <div class="col-md-12 " style="/*position: fixed; z-index: 999999*/">
         &nbsp &nbsp <a  class="hidden-print" href="#ProgramDetails" style="color:green" >[ Program Details ] </a>
         &nbsp &nbsp <a  class="hidden-print" href="#ActionDetails" style="color:green" >[ Action Details ] </a> 
         &nbsp &nbsp <a  class="hidden-print" href="#SMSDetails" style="color:green" >[ SMS Details ] </a> 
         &nbsp &nbsp <a  class="hidden-print" href="#Findings" style="color:green" >[ Findings ] </a> 
         &nbsp &nbsp <a  class="hidden-print" href="#SafetyConcern" style="color:green" >[ Safety Concerns ] </a> 
         &nbsp &nbsp <a  class="hidden-print" href="#EDP" style="color:green" >[ EDP ] </a> 
         &nbsp &nbsp <a  class="hidden-print" href="#ApprovalInfo" style="color:green" >[ approval] </a> 
      </div>
   </div>
   <!--Program descripton-->
   <div class="row" id="ProgramDetails">
      <!-- left column -->
      <div class="col-md-12" >
         <!-- general form elements -->
         <div class="box box-primary">
            <div class="box-header table_toggle expand ">
               <h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Program Details</h3>
               <div class="man pull-right" >-</div>
            </div>
            <!--<div class="box-header visible-print-block">
               <h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Program Details</h3>			
               </div>	-->						 
            <!-- /.box-header -->
            <div class="box-body ">
               @if($programDetails)
               @foreach ($programDetails as $info) 	
               <div class='disNon'>{{$num=0}}</div>
               <table class="table table-bordered" >
                  <tbody>
                     <tr>
                        <span class='hidden-print'>
                        @if('true'==CommonFunction::hasPermission('sia_program',Auth::user()->emp_id(),'par_delete'))
                        {{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sia_program',$info->id), array("data-confirm"=>"Are you sure to delete this item?",'class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
                        @endif
                        @if('true'==CommonFunction::hasPermission('sia_program',Auth::user()->emp_id(),'sof_delete'))	
                        {{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sia_program',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
                        @endif
                        @if('true'==CommonFunction::hasPermission('sia_program',Auth::user()->emp_id(),'approve'))
                        {{ HTML::linkAction('AircraftController@approve', '',array('sia_program',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
                        {{ HTML::linkAction('AircraftController@notApprove', '',array('sia_program',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
                        @endif
                        @if('true'==CommonFunction::hasPermission('sia_program',Auth::user()->emp_id(),'worning'))	
                        {{ HTML::linkAction('AircraftController@removeWarning', '',array('sia_program',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
                        {{ HTML::linkAction('AircraftController@warning', '',array('sia_program',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
                        @endif
                        @if('true'==CommonFunction::hasPermission('sia_program',Auth::user()->emp_id(),'update'))
                        <a data-toggle="modal" data-target="#updateProgram{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                        @endif
                        </span>	
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
                        <th class="col-md-3" >SIA / Tracking Number</th>
                        <td>{{$info->sia_number}}</td>
                     </tr>
                     <tr>
                        <th>Organization Name</th>
                        <td>{{$info->org_name}}</td>
                     </tr>
                     <tr>
                        <th>Event On</th>
                        <td>{{$info->event}}</td>
                     </tr>
                     <tr>
                        <th>Specific Purpose</th>
                        <td>{{nl2br($info->specific_purpose)}}</td>
                     </tr>
                     <tr>
                        <th>Start Date</th>
                        <td>{{$info->date}}</td>
                     </tr>
                     <tr>
                        <th>End Date</th>
                        <td>{{$info->end_date}}</td>
                     </tr>
                     <tr>
                        <th>Time ( LT )</th>
                        <td>{{$info->time}}</td>
                     </tr>
                     <tr>
                        <th>Location</th>
                        <td>{{$info->location}}</td>
                     </tr>
                     <tr>
                        <th>Team Members</th>
                        <td> 
                           @if($authors=CommonFunction::updateMultiSelection('sia_program', 'id',$info->id,'team_members'))
                           @if($authors!=null)
                           @foreach($authors as $key=>$value)
                           {{ $value}},
                           @endforeach
                           @endif
                           @else
                           No Members Added!!
                           @endif
                        </td>
                     </tr>
                     <tr>
                        <th>Remarks</th>
                        <td>{{nl2br($info->remarks)}}</td>
                     </tr>
                     <tr>
                        <td colspan="2">
                           <i>Initialized By : {{$info->row_creator}} | 
                           Initialized at : {{$info->created_at}} | 
                           Last Updated By : {{$info->row_updator}} | 
                           Updated at : {{$info->updated_at}}</i>
                        </td>
                     </tr>
                  </tbody>
               </table>

               @endforeach
               @else 
               <table class="table table-bordered">
                  <tbody>
                     <tr>
                        <td colspan="2" class="text-center text-bold">This is Not Planned Program!</td>
                     </tr>
                     @foreach ($actionDetails as $info) 	
                     <tr>
                        <td>SIA Number</td>
                        <td>{{$info->sia_number}}</td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
               @endif
            </div>
         </div>
      </div>
   </div>
   <!--Action descripton-->
   <div class="row" id="ActionDetails">
      <!-- left column -->
      <div class="col-md-12">
         <!-- general form elements -->
         <div class="box box-primary">
            <div class="box-header table_toggle expand">
               <h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Action Details</h3>
               <span class='hidden-print man pull-right'>-</span>
            </div>
            @if(!$actionDetails && $imTeamMember='True')	
            @if('true'==CommonFunction::hasPermission('sia_action',Auth::user()->emp_id(),'access'))
            &nbsp &nbsp <a  class="hidden-print"href="#" style="color:green" data-toggle="modal" data-target="#primaryInfo">[Add Action Details] </a> 
            @endif
            @endif
            <!-- /.box-header -->
            <div class="box-body">
               <div class='disNon'> 
                  {{$num=0}}
               </div>
               <table class="table table-bordered">
                  <tbody>
                     @if($actionDetails)
                     @foreach($actionDetails as $info)	
                     <tr>
                        <td colspan="2">
                           <span class='hidden-print'>
                           @if('true'==CommonFunction::hasPermission('sia_action',Auth::user()->emp_id(),'par_delete'))
                           {{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sia_action',$info->id), array("data-confirm"=>"Are you sure to delete this item?",'class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('sia_action',Auth::user()->emp_id(),'sof_delete'))	
                           {{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sia_action',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('sia_action',Auth::user()->emp_id(),'approve'))
                           {{ HTML::linkAction('AircraftController@approve', '',array('sia_action',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
                           {{ HTML::linkAction('AircraftController@notApprove', '',array('sia_action',$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('sia_action',Auth::user()->emp_id(),'worning'))	
                           {{ HTML::linkAction('AircraftController@removeWarning', '',array('sia_action',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
                           {{ HTML::linkAction('AircraftController@warning', '',array('sia_action',$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('sia_action',Auth::user()->emp_id(),'update'))
                           <a data-toggle="modal" data-target="#updateAction{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
                           <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                           </a>
                           @endif
                           </span>	
                        </td>
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
                        <th class="col-md-3">Objective</th>
                        <td>{{$info->objective}}</td>
                     </tr>
                     <tr>
                        <th>ISWC</th>
                        <td>{{$info->iats_code}}</td>
                     </tr>
                     <tr>
                        <th>Organization Name</th>
                        <td>{{$info->organization}}</td>
                     </tr>
                     <tr>
                        <th>Date</th>
                        <td>{{$info->date}}</td>
                     </tr>
                     <tr>
                        <th>Time ( LT )</th>
                        <td>{{$info->time}}</td>
                     </tr>
                     <tr>
                        <th>Flight Number</th>
                        <td>{{$info->flight_number}}</td>
                     </tr>
                     <tr>
                        <th>Departure Airfield</th>
                        <td>{{$info->departure_airfield}}</td>
                     </tr>
                     <tr>
                        <th>Arrival Airfield</th>
                        <td>{{$info->arrival_airfield}}</td>
                     </tr>
                     <tr>
                        <th>Aircraft MMS</th>
                        <td>{{$info->aircraft_mms}}</td>
                     </tr>
                     <tr>
                        <th>Aircraft Registration No.</th>
                        <td>{{$info->aircraft_registration_no}}</td>
                     </tr>
                     <tr>
                        <th>PIC</th>
                        <td>{{$info->pic}}</td>
                     </tr>
                     <tr>
                        <th>PEL Number</th>
                        <td>
                           @if($authors=CommonFunction::updateMultiSelection('sia_action', 'id',$info->id,'pel_numbers'))
                           @if($authors!=null)
                           @foreach($authors as $key=>$value)
                           {{$value}}</br>
                           @endforeach
                           @endif
                           @else
                           No PEL Added!!
                           @endif
                        </td>
                     </tr>
                     <tr>
                        <th>Any Other personal Inspected </th>
                        <td>{{$info->other_personal_inspected}}</td>
                     </tr>
                     <tr>
                        <th>SIA By Critical Element</th>
                        <td>
                           @if($elements=CommonFunction::updateMultiSelection('sia_action', 'id',$info->id,'critical_element'))
                           @if($elements!=null)
                           @foreach($elements as $key=>$value)
                           {{$value}},
                           @endforeach
                           @endif
                           @else
                           No CE Added!!
                           @endif
                        </td>
                     </tr>
                     <tr>
                        <th>SIA By Critical Area </th>
                        <td>
                           @if($areas=CommonFunction::updateMultiSelection('sia_action', 'id',$info->id,'sia_by_area'))
                           @if($areas!=null)
                           @foreach($areas as $key=>$value)
                           {{$value}},
                           @endforeach
                           @endif
                           @else
                           No Area Added!!
                           @endif
                        </td>
                     </tr>
                     <tr>
                        <th>Has Finding?</th>
                        <td>{{$hasFinding=$info->has_finding}}</td>
                     </tr>
                     <tr>
                        <th>Result</th>
                        <td>{{$info->result}}</td>
                     </tr>
                     <tr>
                        <th>Has Safety Concern?</th>
                        <td>{{$hasSc=$info->has_safety_concern}}</td>
                     </tr>
                     <tr>
                        <th>Has EDP?</th>
                        <td>{{$hasEdp=$info->has_edp}}</td>
                     </tr>
                     <tr>
                        <td colspan="2">
                           <i>Initialized By : {{$info->row_creator}} | 
                           Initialized at : {{$info->created_at}} | 
                           Last Updated By : {{$info->row_updator}} | 
                           Updated at : {{$info->updated_at}}</i>
                        </td>
                     </tr>
                  </tbody>
               </table>
               <?php break;?>
               @endforeach
               @else 
               <table class="table table-bordered">
                  <tbody>
                     <tr>
                        <td colspan="2">No Action Taken Yet!
                        </td>
                     </tr>
                  </tbody>
               </table>
               @endif
            </div>
         </div>
      </div>
   </div>
   <!--SMS descripton-->
   <div class="row" id="SMSDetails">
      <!-- left column -->
      <div class="col-md-12">
         <!-- general form elements -->
         <div class="box box-primary">
            <div class="box-header table_toggle expand">
               <h3 class="box-title"style='color:#367FA9;font-weight:bold;' >SMS Details</h3>
               <span class='hidden-print man pull-right'>-</span>
            </div>
            @if(!$sms)
            @if('true'==CommonFunction::hasPermission('sia_sms',Auth::user()->emp_id(),'entry'))
            &nbsp &nbsp <a  class="hidden-print"href="#" style="color:green" data-toggle="modal" data-target="#entrySms">[Add SMS Details] </a> 
            @endif
            @endif
            <div class="box-body">
               <div class='disNon'> 
                  {{$num=0}}
               </div>
               <table class="table table-bordered">
                  <tbody>
                     @if($sms)
                     @foreach($sms as $info)	
                     <tr>
                        <td colspan="2">
                           <span class='hidden-print'>
                           @if('true'==CommonFunction::hasPermission('sia_sms',Auth::user()->emp_id(),'par_delete'))
                           {{ HTML::linkAction('BaseController@permanentDelete', 'P.D',array('sia_sms',$info->id,'sms'.$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('sia_sms',Auth::user()->emp_id(),'sof_delete'))	
                           {{ HTML::linkAction('BaseController@softDelete', 'S.D',array('sia_sms',$info->id,'sms'.$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('sia_sms',Auth::user()->emp_id(),'approve'))
                           {{ HTML::linkAction('BaseController@approve', '',array('sia_sms',$info->id,'sms'.$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:green;float:right;padding:5px;')) }}
                           {{ HTML::linkAction('BaseController@notApprove', '',array('sia_sms',$info->id,'sms'.$info->id), array('class' => 'glyphicon glyphicon-ok','style'=>'color:red;float:right;padding:5px;')) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('sia_sms',Auth::user()->emp_id(),'worning'))	
                           {{ HTML::linkAction('BaseController@removeWarning', '',array('sia_sms',$info->id,'sms'.$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:green;float:right;padding:5px;')) }}
                           {{ HTML::linkAction('BaseController@warning', '',array('sia_sms',$info->id,'sms'.$info->id), array('class' => 'glyphicon glyphicon-bell','style'=>'color:red;float:right;padding:5px;')) }}
                           @endif
                           @if('true'==CommonFunction::hasPermission('sia_sms',Auth::user()->emp_id(),'update'))
                           <a data-toggle="modal" data-target="#updateSms{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
                           <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                           </a>
                           @endif
                           </span>	
                        </td>
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
                        <th class="col-md-3">Hazard Identification</th>
                        <td>{{$info->hazard_identification}}</td>
                     </tr>
                     <tr>
                        <th>Asses Initial risk</th>
                        <td>{{$info->initial_risk}}</td>
                     </tr>
                     <tr>
                        <th>Determine Severity</th>
                        <td>{{$info->determine_severity}}</td>
                     </tr>
                     <tr>
                        <th>Determine Likelihood</th>
                        <td>{{$info->determine_likelihood}}</td>
                     </tr>
                     <tr>
                        <th>Determine risk [risk matrix] </th>
                        <td>{{$info->determine_risk}}</td>
                     </tr>
                     <tr>
                        <th>Violation of Safety Standard</th>
                        <td>{{$info->violation_of_safety_standard}}</td>
                     </tr>
                     <tr>
                        <th>Safety Risk Management</th>
                        <td>{{$info->safety_risk_management}}</td>
                     </tr>
                     <tr>
                        <th>Final Risk Statement</th>
                        <td>{{$info->risk_statement}}</td>
                     </tr>
                     <tr>
                        <th>Safety performance indicator (SPI)</th>
                        <td>{{$info->safety_performance_indicator}}</td>
                     </tr>
                     <tr>
                        <th>Safety performance target (SPT)</th>
                        <td>{{$info->safety_performance_target}}</td>
                     </tr>
                     <tr>
                        <th>LEI(%)</th>
                        <td>{{$info->lack_of_effective_implementation}}</td>
                     </tr>
                     <tr>
                        <td colspan="2">
                           <i>Initialized By : {{$info->row_creator}} | 
                           Initialized at : {{$info->created_at}} | 
                           Last Updated By : {{$info->row_updator}} | 
                           Updated at : {{$info->updated_at}}</i>
                        </td>
                     </tr>
                  </tbody>
               </table>
               <?php break;?>
               @endforeach
               @else 
               <table class="table table-bordered">
                  <tbody>
                     <tr>
                        <td colspan="2">No SMS Given!
                        </td>
                     </tr>
                  </tbody>
               </table>
               @endif
            </div>
         </div>
      </div>
   </div>
   <!--Finding Description -->  
   <div class="row" id="Findings">
      <!-- left column -->
      <div class="col-md-12">
         <!-- general form elements -->
         <div class="box box-primary">
            <div class="box-header table_toggle expand">
               <h3 class="box-title"style='color:#367FA9;font-weight:bold;'>Findings</h3>
               <div class="man pull-right" >-</div>
            </div>
            @if('true'==CommonFunction::hasPermission('sia_add_finding',Auth::user()->emp_id(),'entry'))
              @if(!$approvalInfo && $hasFinding=='Yes')
             &nbsp &nbsp <a  class="hidden-print"href="#" style="color:green" data-toggle="modal" data-target="#finding">[Add Finding] </a> 
             @else
             &nbsp &nbsp <a  class="hidden-print"href="#" style="color:#DDD" data-toggle="modal" data-target="#" title="Program Closed Or No Finding Found Mentioned in Action Details">[Add Finding] </a>
             @endif

            @endif
            <div class="box-body">
               <div style="display: none;">
                  {{$num=0;}}
               </div>
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Finding No.</th>
                        <th>Title</th>
                        <th>Target Date</th>
                        <th>Mitigate?</th>
                        <th class='hidden-print'>Details</th>
                     </tr>
                  </thead>
                  <tbody>
                     @if($findings)
                     @foreach ($findings as $info) 
                     <tr>
                        <td>{{++$num}}</td>
                        <td>{{$info->finding_number}}</td>
                        <td>{{$info->title}}</td>
                        <td>{{$info->target_date}}</td>
                        <td>
                           <?php $isMitigate=CommonFunction::isMitigate($info->finding_number);?>
                           @if($isMitigate>0)
                           Yes
                           @else 
                           Not Yet
                           @endif
                        </td>
                        <td class='hidden-print'><a  href="{{URL::to('surveillance/correctiveAction/'.$sia_number.'#'.$info->id)}}">Details</a></td>
                     </tr>
                     @endforeach
                     @else 
                     <tr>
                        <td colspan="4">No Finding Found. 
                           @if('true'==CommonFunction::hasPermission('sia_action',Auth::user()->emp_id(),'access'))
                           No Finding Found Yet!!
                           @endif
                        </td>
                     </tr>
                     @endif
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <!--Safety concern descripton-->
   <div class="row" id="SafetyConcern">
      <!-- left column -->
      <div class="col-md-12">
         <!-- general form elements -->
         <div class="box box-primary">
            <div class="box-header table_toggle expand">
               <h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Safety Concern</h3>
               <div class="man pull-right" >-</div>
            </div>
            @if('true'==CommonFunction::hasPermission('sc_issue_safety_concern',Auth::user()->emp_id(),'entry'))
            @if(!$approvalInfo && $hasSc=='Yes')
            &nbsp &nbsp <a  class="hidden-print"href="#" style="color:green" data-toggle="modal" data-target="#issueSafety">[Add Safety Concern] </a> 
            @else 
             &nbsp &nbsp <a  class="hidden-print"href="#" style="color:#DDD" data-toggle="modal" data-target="#" title="Program Closed Or No Safety Concern Found Mentioned in Action Details">[Add Safety Concern] </a> 
            @endif
            @endif
            <!-- /.box-header -->
            <div class="box-body">
               <div class='disNon'>
                  {{$num=0}}
               </div>
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Finding</th>
                        <th>Safety Concern</th>                       
                        <th>Target Date</th>
                        <th>Approved</th>
                        <th class='hidden-print'>Details</th>
                     </tr>
                  </thead>
                  <tbody>
                     @if($safetyCons)
                     @foreach ($safetyCons as $info) 
                     <tr>
                        <td>{{++$num}}</td>
                        <td>{{CommonFunction::findingTitle($info->finding_number)}} [ {{$info->finding_number}} ] </td>
                        
                        <td>{{$info->title}} [ {{$info->safety_issue_number}} ]</td>
                        <td>{{$info->target_date}}</td>
                        <td>
                           <?php $count=CommonFunction::isSafetyConsApproved($info->safety_issue_number);?>
                           @if($count>0)
                           Yes
                           @else 
                           No
                           @endif
                        </td>
                        <td class='hidden-print'><a href="{{URL::to('safety/singlesafetyConcern/'.$info->safety_issue_number)}}">Details</a></td>
                     </tr>
                     @endforeach
                     @else 
                     <tr>
                        <td colspan="4">
                           No Safety Concern Found Yet!!						
                        </td>
                     </tr>
                     @endif
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <!--EDP descripton-->
   <div class="row" id="EDP">
      <!-- left column -->
      <div class="col-md-12">
         <!-- general form elements -->
         <div class="box box-primary">
            <div class="box-header table_toggle expand">
               <h3 class="box-title"style='color:#367FA9;font-weight:bold;' >EDP</h3>
               <div class="man pull-right" >-</div>
            </div>
            @if('true'==CommonFunction::hasPermission('edp',Auth::user()->emp_id(),'entry'))
            @if(!$approvalInfo && $hasEdp=='Yes')
            &nbsp &nbsp <a  class="hidden-print"href="#" style="color:green" data-toggle="modal" data-target="#edp">[Add EDP] </a> 
            @else 
            &nbsp &nbsp <a  title="Program Closed Or No EDP Found Mentioned in Action Details" class="hidden-print"href="#" style="color:#DDD" data-toggle="modal" data-target="#">[Add EDP] </a> 
            @endif
            @endif
            <!-- /.box-header -->
            <div class="box-body">
               <div class='disNon'>{{$num=0}}</div>
               <table class="table table-bordered">
                  <tbody>
                     <tr>
                        <th>No.</th>
                        <th>EDP</th>                       
                        <th>Finding</th>
                        <th>SC Number</th>
                        <th>Legal Opinion</th>
                        <th>Approval</th>
                        <th class='hidden-print'>Details</th>
                     </tr>
                     @if($edps)
                     @foreach ($edps as $info) 
                     <tr>
                        <td>{{++$num}}</td>
                        <td>{{$info->title}} [ {{$info->edp_number}} ]</td>
                        
                        <td>{{CommonFunction::findingTitle($info->finding_number)}} [ {{$info->finding_number}} ] </td>

                        <td>
                        @if($info->sc_number)
                           {{CommonFunction::safetyTitle($info->sc_number)}} [ {{$info->sc_number}} ]
                        @endif
                        </td>
                        <td>
                           <?php $count=CommonFunction::isEdpLegalOpenionGiven($info->edp_number);?>
                           @if($count>0)
                           Given
                           @else 
                           Not Given
                           @endif
                        </td>
                        <td>
                           <?php $count=CommonFunction::isEdpApproved($info->edp_number);?>
                           @if($count>0)
                           Approved
                           @else 
                           Not Approved
                           @endif
                        </td>
                        <td class='hidden-print'><a href="{{URL::to('edp/singleEdp/'.$info->edp_number)}}">Details</a></td>
                     </tr>
                     @endforeach
                     @else 
                     <tr>
                        <td colspan="4">
                           No EDP Found Yet!!						
                        </td>
                     </tr>
                     @endif
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <!--Approval Info-->
   <div class="row" id="ApprovalInfo">
      <!-- left column -->
      <div class="col-md-12">
         <!-- general form elements -->
         <div class="box box-primary">
            <div class="box-header table_toggle expand">
               <h3 class="box-title"style='color:#367FA9;font-weight:bold;' >Approval Info</h3>
               <div class="man pull-right" >-</div>
            </div>
            @if(!$approvalInfo)
            @if('true'==CommonFunction::hasPermission('sia_approval',Auth::user()->emp_id(),'entry'))
           	@if($sms)
            &nbsp &nbsp <a  class="hidden-print"href="#" style="color:green" data-toggle="modal" data-target="#approvalForm">[Approval] </a>
            @else 
			 &nbsp &nbsp <a  class="hidden-print"href="#" style="color:#DDD" data-toggle="modal" data-target="#" title="Approval can be given only after providing SMS form service provider end">[Approval] </a>			
            @endif 

            @endif
            @endif
            <!-- /.box-header -->
            <div class="box-body">
               <div class='disNon'>
                  {{$num=0}}
               </div>
               <table class="table table-bordered">
                  <tbody>
                     <tr>
                        <th>Approved By</th>
                        <th>Designation</th>
                        <th>Approval Date</th>
                        <th>Note</th>
                        <th class='hidden-print'>Edit</th>
                        <th class='hidden-print' >S.D</th>
                        <th class='hidden-print'>P.D</th>
                     </tr>
                     @if($approvalInfo)
                     @foreach($approvalInfo as $info)
                     <tr>
                        <td class="col-md-3">{{$info->approved_by}}</td>
                        <td>{{$info->designation}}</td>
                        <td>{{$info->approval_date}}</td>
                        <td>{{$info->approval_note}}</td>
                        <td class='hidden-print'>
                           @if('true'==CommonFunction::hasPermission('sia_approval',Auth::user()->emp_id(),'update'))
                           <a data-toggle="modal" data-target="#approvalForm{{$info->id}}" href='' style='color:green;float:right;padding:5px;'>
                           <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                           </a>
                           @endif
                        </td>
                        <td class='hidden-print'>
                           @if('true'==CommonFunction::hasPermission('sia_approval',Auth::user()->emp_id(),'sof_delete'))	
                           {{ HTML::linkAction('AircraftController@softDelete', 'S.D',array('sia_approval',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
                           @endif
                        </td>
                        <td class='hidden-print'>
                           @if('true'==CommonFunction::hasPermission('sia_approval',Auth::user()->emp_id(),'par_delete'))
                           {{ HTML::linkAction('AircraftController@permanentDelete', 'P.D',array('sia_approval',$info->id), array('class' => 'glyphicon glyphicon-trash','style'=>'color:red;float:right;padding:5px;','onclick'=>" return confirm('Wanna Delete?')")) }}
                           @endif
                        </td>
                     </tr>
                    
                     @endforeach
                  </tbody>
               </table>
               @else
               <table class="table table-bordered">
                  <tbody>
                     <tr>
                        <td>Not Approved Yet!</td>
                     </tr>
                  </tbody>
               </table>
               @endif
            </div>
         </div>
      </div>
   </div>
   @include('common')
   @yield('print')
   @else 
   You are not allowed to view this SIA info. Because You are not Team Member of this SIA.
   @endif <!--End check am i team member or db admin -->
</section>
@include('surveillance.entryForm')
@yield('approvalForm')
@include('surveillance.editForm')
@yield('updateApprovalForm')
@yield('updateNewProgram')
@yield('updateAction')
@yield('sms')
@include('safetyConcerns/entryForm')
@yield('issueSafety')
@yield('edp')
@yield('riskMartix')
@include('surveillance/entryForm')
@yield('finding')
@include('surveillance/entryForm')
@yield('primaryInfo')
@yield('entrySms')
@yield('finding')
@stop

