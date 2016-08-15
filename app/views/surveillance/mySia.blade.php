@extends('layoutTable')
@section('content')
  <!-- Right side column. Contains the navbar and content of the page -->
  
                              

                                 <div class="col-md-12">
                <div style="display:none">{{$num=0;}}</div>
                            <div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">List Of SIA</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                               
                                    <div class="box-group" id="accordion">
                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                        <div class="panel box box-primary">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                        
                                                    </a>
                                                </h4>
                                            </div>
<div class="row"> 
<div class="col-md-10 col-md-offset-2">              
                               {{Form::open(array('url'=>'surveillance/mySiaListDateToDate','method'=>'get','class'=>'form-inline','data-toggle'=>'validator','role'=>'form'))}}
                                <div class="form-group">
                    <label for="email"> From :</label>
                    {{Form::select('from_date', $dates, $from_Date ,array('class'=>'form-control','required'=>''))}}
                    {{Form::select('from_month',$months, $fromMonth ,array('class'=>'form-control','required'=>''))}}
                    {{Form::select('from_year',$years, $fromYear,array('class'=>'form-control','required'=>''))}}
                  </div>
                  <div class="form-group">
                    <label for="email"> To: </label>
                    {{Form::select('to_date', $dates, $to_Date ,array('class'=>'form-control','required'=>''))}}
                    {{Form::select('to_month',$months, $toMonth ,array('class'=>'form-control','required'=>''))}}
                    {{Form::select('to_year',$years, $toYear,array('class'=>'form-control','required'=>''))}}
                  </div>
                  
                  <button type="submit" class="btn btn-default">Submit</button>
                {{Form::close()}}
                </div>
                 <h4 class="text-center text-success"> Record Shown From <b class="text-primary">{{date('d F Y',strtotime($from))}}</b> To <b class="text-primary">{{date('d F Y',strtotime($to))}}</b></h4>
</div>
</div>

                            <div class="box-body table-responsive">
                           
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>SIA Number</th>
                                                <th>Team Member(s)</th>
                                                <th>Organization</th>
                                                <th>Safety Concern(s)</th>
                                                <th>Finding(s)</th>
                                                <th>EDP</th>
                                                <th>Status</th>
                                                <th>View Details</th>
                                            </tr>
                                        </thead>
                                        @foreach($actionList as $info)
                                            @if($info->sia_number!=null)
                                            <tr>
                                                <td>{{++$num}}</td>
                                                <td>{{$info->sia_number}}</td>
                                                <td>
                                                     <?php  $members=CommonFunction::updateMultiSelection('sia_program', 'sia_number',$info->sia_number,'team_members');?>
                                                           @if($members)
                                                           @if($members!=null)
                                                                @foreach($members as $key=>$value)
                                                                    {{$value}},
                                                                @endforeach
                                                           
                                                            @endif
                                                            @else
                                                                No Members Added!!
                                                            @endif
                                                </td>
                                                <td>{{$info->organization}}</td>
                                                <td>
                                                <?php $sNum=CommonFunction::saftyConsCount($info->sia_number) ?>
                                                @if($sNum!=0)
                                                    SC-{{$sNum}}
                                                @else
                                                    No SC Listed Yet
                                                @endif

                                                </td>
                                                <td>
                                                    <?php $fNum=CommonFunction::findingCount($info->sia_number);?>
                                                    @if($fNum!=0)
                                                    Finding-{{$fNum}}
                                                    @else
                                                        No Finding Listed Yet
                                                    @endif

                                                </td>
                                                <td>
                                                    <?php $edpNum=CommonFunction::edpCount($info->sia_number);?>
                                                    @if($edpNum!=0)
                                                    EDP-{{$edpNum}}
                                                    @else
                                                        No EDP Listed Yet
                                                    @endif

                                                </td>
                                                <td>
                                                    <?php $status=CommonFunction::programStatus($info->sia_number);?>
                                                    @if($status!=0)
                                                        <span style="color:green">Close</span>
                                                    @else 
                                                        <span style="color:red">Open</span>
                                                    @endif
                                                </td>
                                                <td><a  href="{{URL::to('surveillance/singleProgram/'.$info->sia_number)}}">Details</a></td>
                                            </tr>
                                            @endif

                                        @endforeach
                                        <tbody>
                                        
                                        </tbody>
                                        
                                    </table>
                            </div>
               
                
                </div>
                </div>
                </div>
                </div>
                </div>
                            </div><!-- /.box -->
                        </div>
                    </div>

                

@stop