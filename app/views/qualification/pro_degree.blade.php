@extends('layout')
@section('content')
 <section class="content" style="max-width:760px;margin:0 auto;">
                    <div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Professional Degree </h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
								
                                    <table class="table table-bordered">
                                        <tbody>
										
										<tr>                                           
                                            <th >Name of professional degree</th>
                                            <th >Institute</th>
                                            <th >Duration</th>
                                            <th >Class/ Grade/ Percentage</th>
                                            <th >Major/Area</th>
                                            <th >Year</th>
                                            <th >Edit</th>
                                            <th >Delete</th>
                                            
                                        </tr>
										@foreach($infos as $info)
										{{Employee::notApproved($info)}}	
                                        <tr>
                                           
                                            <td>{{$info->pro_degree_name}}</td>
                                            <td>{{$info->pro_degree_institute}}</td>
                                            <td>{{$info->pro_degree_duration}}</td>
                                            <td>{{$info->pro_degree_grade}}</td>
                                            <td>{{$info->pro_degree_major_area}}</td>
                                            <td>{{$info->pro_degree_year}}</td>
                                            
                                            <td >
												
												<a data-toggle="modal" data-target="#{{'proD'.$info->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
												
											</td>
                                            <td><a href="{{'deleteProDegree/'.$info->id}}" style='color:red'><span class="glyphicon glyphicon-trash"></span></a> </td>
                                            
                                        </tr>
                                        	@endforeach
										
										
										
                                            
                                       
                                    </tbody></table>
								
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
                            </div>    
                           
							
							
							

<!--Button for popup-->
<p class="text-center">
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#EmploymentDetails">Add New</button>
	
</p>
<!-- start of oppup content-->
<div class="modal fade" id="EmploymentDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Professional Degree </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               {{Form::open(array('url'=>'qualification/pro_degree','method'=>'post','class'=>'form-horizontal','role'=>'form','data-toggle'=>'validator'))}}
					
					<div class="form-group required">
                                           
											{{Form::label('pro_degree_name', 'Name of professional degree', array('class' => 'col-xs-5 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('pro_degree_name','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group">
                                           
											{{Form::label('pro_degree_institute', 'Educational institute', array('class' => 'col-xs-5 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('pro_degree_institute','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group">
                                           
											{{Form::label('pro_degree_duration', 'Duration', array('class' => 'col-xs-5 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('pro_degree_duration','', array('class' => 'form-control','placeholder'=>'i.e 2 Days/1 month/ 1 Year'))}}
											</div>
											
                    </div>
					<div class="form-group">
                                           
											{{Form::label('pro_degree_grade', 'Class/Grade/Percentage', array('class' => 'col-xs-5 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('pro_degree_grade','', array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('pro_degree_major_area', 'Major/Area', array('class' => 'col-xs-5 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('pro_degree_major_area','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                           
											{{Form::label('pro_degree_year', 'Year', array('class' => 'col-xs-5 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('pro_degree_year', $year, '01', array('class' => 'form-control','placeholder'=>'','required'=>'')) }}
											</div>
											
                    </div>
				
                    

                    <div class="form-group">
                        
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                        
                    </div>
					
					{{Form::close()}}
            </div>
        </div>
    </div>
</div>
<!------------------------Edit Option Start------------------------------------>
@foreach($infos as $info)
<div class="modal fade" id="{{'proD'.$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Professional Degree </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               {{Form::open(array('url'=>'qualification/updatePro_degree','method'=>'post','class'=>'form-horizontal','role'=>'form','data-toggle'=>'validator'))}}
						{{Form::hidden('id', $info->id)}}
					<div class="form-group">
                                           
											{{Form::label('pro_degree_name', 'Name of professional degree', array('class' => 'col-xs-5 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('pro_degree_name',$info->pro_degree_name, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group">
                                           
											{{Form::label('pro_degree_institute', 'Educational institute', array('class' => 'col-xs-5 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('pro_degree_institute',$info->pro_degree_institute, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group">
                                           
											{{Form::label('pro_degree_duration', 'Duration', array('class' => 'col-xs-5 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('pro_degree_duration',$info->pro_degree_duration, array('class' => 'form-control','placeholder'=>'i.e 2 Days/1 month/ 1 Year'))}}
											</div>
											
                    </div>
					<div class="form-group">
                                           
											{{Form::label('pro_degree_grade', 'Class/Grade/Percentage', array('class' => 'col-xs-5 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('pro_degree_grade',$info->pro_degree_grade, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group">
                                           
											{{Form::label('pro_degree_major_area', 'Major/Area', array('class' => 'col-xs-5 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('pro_degree_major_area',$info->pro_degree_major_area, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group">
                                           
											{{Form::label('pro_degree_year', 'Year', array('class' => 'col-xs-5 control-label'))}}
											<div class="col-xs-6">
											{{Form::select('pro_degree_year', $year, $info->pro_degree_year, array('class' => 'form-control','placeholder'=>'')) }}
											</div>
											
                    </div>
				
                    

                    <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
					{{Form::close()}}
            </div>
        </div>
    </div>
</div>
@endforeach
<!------------------------Edit Option End------------------------------------>

<script>

</script>



@stop