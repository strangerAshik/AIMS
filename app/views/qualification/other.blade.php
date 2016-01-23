@extends('layout')
@section('content')
 <section class="content contentWidth">
 
 
                    <div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Publication</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
								@foreach($pubs as $pub)
                                    <table class="table table-bordered">
                                        <tbody>
										{{Employee::notApproved($pub)}}	
										<tr>                                           
                                            <th colspan='2'>Publication   #{{++$a_sl}}
											<a onclick=" return confirm('Wanna Delete?')"  href="{{'deletePublication/'.$pub->id}}" style='color:red;float:right;padding:5px;'><span class="glyphicon glyphicon-trash"></span></a>
											<a data-toggle="modal" data-target="#{{'PUB'.$pub->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
											</th>
                                        </tr>
                                        <tr>
                                           
                                            <td class="col-md-4">{{$pub->title}}</td>
                                            <td >{{$pub->description}}</td>
                                            
                                        </tr>
                                        
                                    </tbody>
									</table>
								@endforeach
									  
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
                            </div>    
                           
							
							
						

<!--Button for popup-->
<p class="text-center">
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#Publication">Add Publication</button>
	
</p>
<!-- start of oppup content-->
<div class="modal fade" id="Publication" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Publication </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'qualification/savePublication', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					
					
					
				
					<div class="form-group required">
                                        
											{{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('title','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
											{{Form::label('description', 'Description', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::textarea('description','', array('class' => 'form-control','placeholder'=>'Must Mention ISBN Referance & where Published otherwise this publication is not counted as valid Publication ','size'=>'30x3','required'=>''))}}
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
</section>
<section class="content contentWidth">
 
 
                    <div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Membership</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
								@foreach($membs as $memb)
                                    <table class="table table-bordered">
                                        <tbody>
										{{Employee::notApproved($memb)}}	
										<tr>                                           
                                            <th colspan='2'>Membership   #{{++$t_sl}}
											<a href="{{'deleteMembership/'.$memb->id}}" style='color:red;float:right;padding:5px;'><span class="glyphicon glyphicon-trash"></span></a>
											<a data-toggle="modal" data-target="#{{'M'.$memb->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
											
											</th>
                                        </tr>
                                        <tr>
                                           
                                            <td class="col-md-4">{{$memb->title}}</td>
                                            <td >{{$memb->description}}</td>
                                            
                                        </tr>
                                        
                                    </tbody>
									</table>
								@endforeach
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
                            </div>    
                           
							
							
						

<!--Button for popup Add-->
<p class="text-center">
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#Thesis">Add Membership</button>
	
</p>
<!-- start of oppup content-->
<div class="modal fade" id="Thesis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Membership </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
              {{Form::open(array('url' => 'qualification/saveMembership', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					
					
					
				
					<div class="form-group required">
                                        
											{{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('title','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
											{{Form::label('description', 'Description', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::textarea('description','', array('class' => 'form-control','placeholder'=>'','size'=>'30x3','required'=>''))}}
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
	<!--------------------Start Update POP UP For Publication--------------------------------->
	@foreach($pubs as $pub)
		<div class="modal fade" id="{{'PUB'.$pub->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Publication </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'qualification/updatePublication', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					
					{{Form::hidden('id',$pub->id)}}
					
				
					<div class="form-group required">
                                        
											{{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('title',$pub->title, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
											{{Form::label('description', 'Description', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::textarea('description',$pub->description, array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
											 </div>
					</div>
					
					<div class="form-group">
                       
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
                       
                    </div>
					{{Form::close()}}
            </div>
        </div>
    </div>
	</div>
	@endforeach
	<!--------------------End Update POP UP--------------------------------->
	<!--------------------Start Update POP UP For Membership--------------------------------->
	@foreach($membs as $memb)
	<div class="modal fade" id="{{'M'.$memb->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Membership </h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
              {{Form::open(array('url' => 'qualification/updateMembership', 'method' => 'post', 'files'=>true, 'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
				
					{{Form::hidden('id',$memb->id)}}
					<div class="form-group required">
                                        
											{{Form::label('title', 'Title', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('title',$memb->title, array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
											{{Form::label('description', 'Description', array('class' => 'control-label col-xs-4'))}}
											<div class="col-xs-6">
											{{Form::textarea('description',$memb->description, array('class' => 'form-control','placeholder'=>'','size'=>'30x3'))}}
											 </div>
					</div>
					
					<div class="form-group">
                          <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
                    </div>
					{{Form::close()}}
            </div>
        </div>
    </div>
	</div>
	@endforeach
	<!--------------------End Update POP UP For Membership--------------------------------->
</section>

<script>
$(document).ready(function(){
  $("select#Standard").change(function(){
     var standard=$( "#Standard option:selected" ).text();
	 if(standard=='Grade'){$("#out_of").prop('disabled', false);}
	 else $("#out_of").prop('disabled', true);
	 
});
  
});
</script>



@stop