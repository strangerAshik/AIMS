@extends('layoutMT')
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
                              
                                    <table id="example" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Date[Y-M-D]</th>
                                                <!-- <th>Time</th> -->
                                                <th>SIA/Tracking No</th>
                                                <th>Organization</th>
                                                <th>SIA Area</th>
                                                <th>Event</th>
                                                
                                                
                                                <th>Team members</th>
                                                <th>Action Status</th>
                                                <th>Program Status</th>
                                              
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <div style="display: none">{{$num=0;}}</div>
                                        @foreach ($prgramList as $program)
                                       
                                        
                                       
                                            <tr>
                                           
                                                <td>{{++$num}}</td>                                                
                                                <td>{{date('Y/m/d',strtotime($program->date))}}</td>
                                               <!--  <td>{{$program->time}}</td> -->
                                                <td>{{$program->sia_number}}</td>                                                
                                                <td>{{$program->org_name}}</td>
                                                <td>
                                                      @if($program->sia_by_area)
                                                      <?php $areas=unserialize($program->sia_by_area);?>
                                                      @foreach($areas as $area)
                                                         {{$area}},
                                                      @endforeach

                                                      @else 
                                                      No Area Selected 

                                                      @endif
                                                </td>
                                                <td>{{$program->event}}</td>
                                                
                                                <td>
                                        <?php 
                                        $members=CommonFunction::updateMultiSelection('sia_program', 'id',$program->id,'team_members');
                                      
                                        ?>
                                               @if($members)
                                               @if($members!=null)
                                                    @foreach($members as $key=>$value)
                                                        {{$value}},
                                                    @endforeach
                                               
                                                @endif
                                                @else
                                                    No Members Added!!
                                                @endif</td>
                                                <td>@if($insNum=CommonFunction::inspectionHappend($program->sia_number)>0) 
                                                    <span style="color:#0DD43F">Yes</span>
                                                    @else
                                                   <span style="color:#FD11BC">No</span>
                                                    @endif
                                                 </td>
                                                 <td>
                                                     <?php $programStatus=CommonFunction::programStatus($program->sia_number);?>
                                                     @if($programStatus>0)
                                                        <span style="color: green">Close</span>
                                                     @else 
                                                       <span style="color: red">Open</span> 
                                                     @endif
                                                 </td>
                                                
                                                <td><a  href="{{URL::to('surveillance/singleProgram/'.$program->sia_number)}}">Details</a></td>
                                                
                                            </tr>
                                           
                                        @endforeach
                                        </tbody>
                                       
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                

@stop