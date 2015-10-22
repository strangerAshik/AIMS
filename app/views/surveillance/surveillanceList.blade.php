@extends('layoutTable')
@section('content')
  <!-- Right side column. Contains the navbar and content of the page -->
  
                              

                                 <div class="col-md-12">
                <div style="display:none">{{$num=0;}}</div>
                            <div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">List Of Executed SIA Program</h3>
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
                               {{Form::open(array('url'=>'surveillance/actionListDateToDate','method'=>'get','class'=>'form-inline','data-toggle'=>'validator','role'=>'form'))}}
                               {{Form::hidden('rquerstFrom','el')}}
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
                                  
                                  <button type="submit" class="btn btn-primary">Get Data</button>
                                {{Form::close()}}
</div>
</div>
                            <div class="box-body table-responsive">
                               <h4 class="text-center text-success"> Recor Shown From <b class="text-primary">{{$from}}</b> To <b class="text-primary">{{$to}}</b></h4>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>SIA Number</th>
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
                                                <td><a target="_blink" href="{{URL::to('surveillance/singleProgram/'.$info->sia_number)}}">Details</a></td>
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