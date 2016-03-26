@extends('layoutMT')
@section('content')
<section class="content widthController">

<div class="row"> 
<div class="col-md-10 col-md-offset-2">
 {{Form::open(array('url'=>'surveillance/actionListDateToDate','method'=>'get','class'=>'form-inline center-block','data-toggle'=>'validator','role'=>'form'))}}
                               
                                {{Form::hidden('rquerstFrom','cs')}}
                                  <div class="form-group">
                                    <label for="email"> From :</label>
                                    {{Form::select('from_date', $dates,'1',array('class'=>'form-control','required'=>''))}}
                                    {{Form::select('from_month',$months,'January',array('class'=>'form-control','required'=>''))}}
                                    {{Form::select('from_year',$years,'2015',array('class'=>'form-control','required'=>''))}}
                                  </div>
                                  <div class="form-group">
                                    <label for="email"> To: </label>
                                    {{Form::select('to_date', $dates,date('d'),array('class'=>'form-control','required'=>''))}}
                                    {{Form::select('to_month',$months,date('F'),array('class'=>'form-control','required'=>''))}}
                                    {{Form::select('to_year',$years,date('Y'),array('class'=>'form-control','required'=>''))}}
                                  </div>
                                  
                                  <button type="submit" class="btn btn-primary">Submit</button>
{{Form::close()}}
</div>
</div>

<div class="box-body table-responsive">
<h4 class="text-center text-success"> Record Shown From <b class="text-primary">{{$from}}</b> To <b class="text-primary">{{$to}}</b></h4>
    <table id="example" class="display nowrap table table-bordered table-striped table-responsive" cellspacing="0" width="100%">
        <thead>
            <tr>
               
                <th>Date Of Execution</th>
                <th>SIA Number</th>
                <th>Organization</th>
                <th>Event</th>
                <th>Spe. Purpose</th>
                <th>Team Members</th>
                <th>Finding</th>
                <th>MMS</th>
                <th>PEL NO.</th>
                <th>Location</th>
                <th>Risk</th>
                <th>SC</th>
                <th>EDP</th>
                <th>Status</th>
                <th>Details</th>
            </tr>
            <tr id="filterrow">
              
                <th>Date Of Execution</th>
                <th>SIA Number</th>
                <th>Organization</th>
                <th>Event</th>
                <th>Spe. Purpose</th>
                <th>Team Members</th>
                <th>Finding</th>
                <th>MMS</th>
                <th>PEL NO.</th>
                <th>Location</th>
                <th>Risk</th>
                <th>SC</th>
                <th>EDP</th>
                <th>Status</th>
                <th>Details</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
               
                <th>DOE</th>
                
                <th>SIA Number</th>
                <th>Organization</th>
                <th>Event</th>
                <th>Spe. Purpose</th>
                <th>Team Members</th>
                <th>Finding</th>
                <th>MMS</th>
                <th>PEL NO.</th>
                <th>Location</th>
                <th>Risk</th>
                <th>SC</th>
                <th>EDP</th>
                <th>Status</th>
               
            </tr>
        </tfoot>
 
        <tbody>
        @foreach($actionList as $info)
            <tr>

                <td>{{date('d F Y',strtotime($info->date))}}</td>
                
                <td>{{$info->sia_number}}</td>
                <td>{{$info->organization}}</td>
                <td>{{$info->event}}</td>
                <td>
					<?php $getSpecificPurpose=CommonFunction::getSpecificPurpose($info->sia_number);?>
                {{$getSpecificPurpose}}</td>
                <td>
                 @if($authors=CommonFunction::updateMultiSelection('sia_action', 'id',$info->id,'team_members'))
                       @if($authors!=null)
                            @foreach($authors as $key=>$value)
                                {{$value}},<br>
                            @endforeach
                       
                        @endif
                @else
                    No Members Added!!
                @endif
                </td>
                <td>
                    <?php $getFindingNumber=CommonFunction::getFindingNumber($info->sia_number) ; ?>
                Finding-{{$getFindingNumber}}</td>
                <td>{{$info->aircraft_mms}}</td>
                <td>
                 @if($authors=CommonFunction::updateMultiSelection('sia_action', 'id',$info->id,'pel_numbers'))
                       @if($authors!=null)
                            @foreach($authors as $key=>$value)
                                {{$value}},<br>
                            @endforeach
                       
                        @endif
                @else
                    No Members Added!!
                @endif
                </td>
                <td>{{$info->location}}</td>
                <td>
                <?php $risk = CommonFunction::smsRisk($info->sia_number)?>
                @if($risk)
                    {{$risk}}                   
                @else 
                    SMS Not Provided
                @endif
                </td>
                <td>
                    <?php $getSCAndRiskAnalysis=CommonFunction::getSCAndRiskAnalysis($info->sia_number);?>
                    <div class="disNon">{{$nsc=0;}}</div>
                    @foreach($getSCAndRiskAnalysis as $scNoAndAna)
                        <p>{{$scNoAndAna->safety_issue_number}} &nbsp [{{ $scNoAndAna->risk_action }}]</p>
                        <div class="disNon">{{++$nsc}}</div>
                    @endforeach
                    Total SC-{{$nsc}}
                </td>
                <td>
                <?php $edpCount=CommonFunction::edpCount($info->sia_number);?>
               EDP-{{$edpCount}}</td>
                <td>
                <?php $status=CommonFunction::programStatus($info->sia_number);?>
                                                    @if($status!=0)
                                                        <span style="color:green">Close</span>
                                                    @else 
                                                        <span style="color:red">Open</span>
                                                    @endif
                </td>
                <td><a class="btn btn-primary" target="_blink" href="{{URL::to('surveillance/singleProgram/'.$info->sia_number)}}">Details</a></td>
                
            </tr>
        @endforeach   
        </tbody>
    </table>
</div>
</section>
@stop