@extends('layout')
@section('content')
<div class="contentWidth">
 <div class="row">
    <div class="col-xs-12">

	<div class="box">
	    <div class="box-header">
	        <h3 class="box-title text-center text-primary">Training Information</h3><br>
          
	</div><!-- /.box-header -->
 <div class="box-body table-responsive">
 		<table id="example1" class="table table-bordered table-striped ">
                                        
          <tbody>           
                 

                <tr>
                   <td class="col-md-4">Employee Name</td>
                   <td >{{$trainings->name}}</td>
                </tr>
                <tr>
                   <td class="col-md-4">Category</td>
                   <td >{{$trainings->category}}</td>
                </tr>
                @if($trainings->category=='Training')
                <tr>
                   <td>Type of Training</td>
                   <td>{{$trainings->type_of_training}}</td>
                </tr>
                <tr>
                   <td>Training Course / Number</td>
                   <td>{{$trainings->training_course}}</td>
                </tr>
                <tr>
                   <td>Subject / Specialization</td>
                   <td>{{$trainings->subject}}</td>
                </tr>
                @endif
                @if($trainings->category=='OJT')
                <tr>
                   <td>Training Task</td>
                   <td>{{$trainings->training_task}}</td>
                </tr>
                @endif
                @if($trainings->category=='Seminar / Workshop / Meeting / Conference')
                <tr>
                   <td>Topic</td>
                   <td>{{$trainings->topic}}</td>
                </tr>
                @endif
                <tr>
                   <td>
                      Major Area
                   </td>
                   <td>
                      {{$trainings->major_area}}
                   </td>
                </tr>
                <tr>
                   <td>
                      Instructor(s):
                   </td>
                   <td>
                      {{$trainings->instructor}}
                   </td>
                </tr>
                <tr>
                   <td>
                      Institute:
                   </td>
                   <td>
                      {{$trainings->institute}}
                   </td>
                </tr>
                <tr>
                   <td>                       
                      Location:
                   </td>
                   <td>
                      {{$trainings->location}}
                   </td>
                </tr>
                <tr>
                   <td>
                      Certificate Issued:
                   </td>
                   <td>
                      {{$trainings->proof}}
                   </td>
                </tr>
                <tr>
                   <td>
                      Start Date:
                   </td>
                   <td>
                      {{$trainings->start_date}} 
                   </td>
                </tr>
                <tr>
                   <td>
                      End Date:
                   </td>
                   <td>
                      {{$trainings->end_date}} 
                   </td>
                </tr>
                <tr>
                   <td>
                      Uploaded Evidence:
                   </td>
                   <td>
                      @if($trainings->pdf!='Null'){{HTML::link('files/TrainingWorkshopOJT/'.$trainings->pdf,'Document',array('target'=>'_blank'))}}
                      @else
                      {{HTML::link('#','No Document Provided')}}
                      @endif
                   </td>
                </tr>


          </tbody>
                                       
    </table>
  </div>
  </div>
  </div>
  </div>

@stop