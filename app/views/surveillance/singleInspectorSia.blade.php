@extends('layoutTable')
@section('content')
  <!-- Right side column. Contains the navbar and content of the page -->
            
                    <div class="row">
    <div class="col-xs-12">
                            

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title text-center text-primary">Inspector Associated Program List (All)</h3>
                                </div><!-- /.box-header -->
                                 <div class="content">
              <div class="row">
              <div class="col-md-10 col-md-offset-2">
               {{Form::open(array('url'=>'surveillance/singleInspectorSiaDateToDate','method'=>'get','class'=>'form-inline','data-toggle'=>'validator','role'=>'form'))}}
                  <div class="form-group">
                    <label for="email"> From :</label>
                    {{Form::select('from_date', $dates,$fdate,array('class'=>'form-control','required'=>''))}}
                    {{Form::select('from_month',$months,$fmonth,array('class'=>'form-control','required'=>''))}}
                    {{Form::select('from_year',$years,$fyear,array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="form-group">
                    <label for="email"> To: </label>
                    {{Form::select('to_date', $dates,$tdate,array('class'=>'form-control','required'=>''))}}
                    {{Form::select('to_month',$months,$tmonth,array('class'=>'form-control','required'=>''))}}
                    {{Form::select('to_year',$years,$tyear,array('class'=>'form-control','required'=>''))}}
                  </div>
                  
                  <button type="submit" class="btn btn-default">Submit</button>
                {{Form::close()}}
                </div>
                </div>
                                </div>
                                <div class="box-body table-responsive">
                               <h4 class="text-center text-success"> Record Shown From <b class="text-primary">{{date('d F Y',strtotime($from))}}</b> To <b class="text-primary">{{date('d F Y',strtotime($to))}}</b></h4>
                              
                                    <table id="example1" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                
                                                <th>No.</th>
                                                <th>Date[Y-M-D]</th>
                                               
                                                <th>SIA/Tracking No</th>
                                                <th>Organization</th>
                                                <th>Event</th>
                                                <th>Team members</th>
                                                <th>Finding</th>
                                                <th>SC</th>
                                                <th>EDP</th>
                                                <th>Action Status</th>
                                                <th>Program Status</th>
                                              
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                         <div style="display: none">{{$num=0;}}</div>
                                        @foreach ($prgramList as $program)
                                        <?php 

                                        $members=CommonFunction::updateMultiSelection('sia_program', 'id',$program->id,'team_members');
                                        $isItMe=CommonFunction::isItMe($members,Auth::user()->emp_id());
                                        
                                        ?>
                                        @if($isItMe=='true')
                                           
                                            <tr>
                                                
                                                <td>{{++$num}}</td>                                                
                                                <td>{{date('d F Y',strtotime($program->date))}}</td>
                                               
                                                <td>{{$program->sia_number}}</td>                                                
                                                <td>{{$program->org_name}}</td>
                                                <td>{{$program->event}}</td>
                                                
                                                <td>
                                               @if($members)
                                               @if($members!=null)
                                                    @foreach($members as $key=>$value)
                                                        {{$value}},
                                                    @endforeach
                                               
                                                @endif
                                                @else
                                                    No Members Added!!
                                                @endif</td>
                                                <td>
                                                    <?php $fNum=CommonFunction::findingCount($program->sia_number);?>
                                                    @if($fNum!=0)
                                                    Finding-{{$fNum}}
                                                    @else
                                                        No Finding
                                                    @endif

                                                </td>
                                                <td>
                                                <?php $sNum=CommonFunction::saftyConsCount($program->sia_number) ?>
                                                @if($sNum!=0)
                                                    SC-{{$sNum}}
                                                @else
                                                    No SC 
                                                @endif

                                                </td>
                                                <td>
                                                    <?php $edpNum=CommonFunction::edpCount($program->sia_number);?>
                                                    @if($edpNum!=0)
                                                    EDP-{{$edpNum}}
                                                    @else
                                                        No EDP
                                                    @endif

                                                </td>
                                                <td>@if($insNum=CommonFunction::inspectionHappend($program->sia_number)>0) 
                                                    <span style="color:#0DD47A">Yes</span>
                                                    @else
                                                   <span style="color:#FD39CC"> No</span>
                                                    @endif
                                                 </td>
                                                 <td>
                                                 <?php $status=CommonFunction::programStatus($program->sia_number);?>
                                                    @if($status!=0)
                                                        <span style="color:green">Close</span>
                                                    @else 
                                                        <span style="color:red">Open</span>
                                                    @endif
                                                 </td>
                                                
                                                <td><a  href="{{URL::to('surveillance/singleProgram/'.$program->sia_number)}}">Details</a></td>
                                                
                                            </tr>
                                       @endif
                                           
                                        @endforeach
                                        </tbody>
                                        
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                

@stop