@extends('layoutTable')
@section('content')
  <!-- Right side column. Contains the navbar and content of the page -->
            
                    <div class="row">
    <div class="col-xs-12">
                            

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title text-center text-primary">SIA Program List (All)</h3>
                                </div><!-- /.box-header -->
                                 <div class="content">
              <div class="row">
              <div class="col-md-10 col-md-offset-2">
               {{Form::open(array('url'=>'surveillance/programListDateToDate','method'=>'get','class'=>'form-inline','data-toggle'=>'validator','role'=>'form'))}}
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
                  
                  <button type="submit" class="btn btn-default">Submit</button>
                {{Form::close()}}
                </div>
                </div>
                                </div>
                                <div class="box-body table-responsive">
                               <h4 class="text-center text-success"> Recor Shown From <b class="text-primary">{{date('d F Y',strtotime($from))}}</b> To <b class="text-primary">{{date('d F Y',strtotime($to))}}</b></h4>
                              
                                    <table id="example1" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Date[Y-M-D]</th>
                                                <th>Time</th>
                                                <th>SIA/Tracking No</th>
                                                <th>Organization</th>
                                                <th>Event</th>
                                                
                                                
                                                <th>Team members</th>
                                                <th>Accomplish Status</th>
                                              
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <div style="display: none">{{$num=0;}}</div>
                                        @foreach ($prgramList as $program)
                                            <tr>
                                                <td>{{++$num}}</td>                                                
                                                <td>{{date('d F Y',strtotime($program->date))}}</td>
                                                <td>{{$program->time}}</td>
                                                <td>{{$program->sia_number}}</td>                                                
                                                <td>{{$program->org_name}}</td>
                                                <td>{{$program->event}}</td>
                                                
                                                <td>
                                               @if($authors=CommonFunction::updateMultiSelection('sia_program', 'id',$program->id,'team_members'))
                                               @if($authors!=null)
                                                    @foreach($authors as $key=>$value)
                                                        {{$value}},
                                                    @endforeach
                                               
                                                @endif
                                                @else
                                                    No Members Added!!
                                                @endif</td>
                                                <td>@if($insNum=CommonFunction::inspectionHappend($program->sia_number)>0) 
                                                    <span style="color:green">Done</span>
                                                    @else
                                                   <span style="color:#FFC200"> Action Not Taken</span>
                                                    @endif
                                                 </td>
                                                
                                                <td><a target="_blink" href="{{URL::to('surveillance/singleProgram/'.$program->sia_number)}}">Details</a></td>
                                                
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Date[Y-M-D]</th>
                                                <th>SIA/Tracking No</th>
                                                <th>Event</th>
                                                
                                                <th>Time</th>
                                                <th>Teammembers</th>
                                                <th>Accomplished?</th>
                                                <th>Remark</th>
                                                <th>Details</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                

@stop