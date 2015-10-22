@section('pqPrimary')
<div class="modal fade" id="pqPrimary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add PQ</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
                {{Form::open(array('url'=>'usoap/savePQ','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}

                
                    <div class="form-group required">
                                           
                                            {{Form::label('pq_number','PQ Number', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::text('pq_number','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div>
                    <div class="form-group required">
                                           
                                            {{Form::label('audit_area','Audit Area', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::select('audit_area',array(''=>'--Select Area--','PEL'=>'PEL','OPS'=>'OPS','AIG'=>'AIG','ANS'=>'ANS','AGA'=>'AGA','AIR'=>'AIR','LEG'=>'LEG'),'0', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div>
                    <div class="form-group required">
                                           
                                            {{Form::label('critical_element','Critical Element', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::select('critical_element',array(''=>'--Select CE--','CE-1'=>'CE-1','CE-2'=>'CE-2','CE-3'=>'CE-3','CE-4'=>'CE-4','CE-5'=>'CE-5','CE-6'=>'CE-6','CE-7'=>'CE-7','CE-8'=>'CE-8'),'0', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div>
                    <div class="form-group required">
                                           
                                            {{Form::label('pq_type','PQ Type', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::select('pq_type',array(''=>'--Select PQ Type--','Revised'=>'Revised','New'=>'New','Merged'=>'Merged','Split'=>'Split'),'0', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div>

                    <div class="form-group required">
                                           
                                            {{Form::label('audit_area_group','Audit Area Group', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::text('audit_area_group','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div>

                    <div class="form-group required">
                                           
                                            {{Form::label('pq','PQ', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::text('pq','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div>
                    <div class="form-group ">
                                           
                                            {{Form::label('icao_ref','ICAO Ref.', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::text('icao_ref','', array('class' => 'form-control','placeholder'=>''))}}
                                            </div>
                                            
                    </div>
                    <div class="form-group ">
                                           
                                            {{Form::label('review_evidence','Review Evidence/Answerer', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::text('review_evidence','', array('class' => 'form-control','placeholder'=>''))}}
                                            </div>
                                            
                    </div>

                    <div class="form-group required">
                                           
                                            {{Form::label('pq_overall_com_status','PQ Overall Complementation Status', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::select('pq_overall_com_status',array('No'=>'No','Yes'=>'Yes','In Progress'=>'In Progress'),'0', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div>
                    <div class="form-group required">
                                           
                                            {{Form::label('number_of_cc','Number Of CC', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::select('number_of_cc',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6'),'0', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div>
                    
                    <div class="form-group ">
                                           
                                            {{Form::label('final_statement','Final Statement', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::textarea('final_statement','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
                                            </div>
                                            
                    </div>
                    
                    <div class="form-group ">
                                           
                                            {{Form::label('final_evidence','Final Evidence', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::file('final_evidence')}}
                                            </div>
                                            
                    </div>
                    
                    <div class="form-group ">
                                           
                                            {{Form::label('ncmc_approval','NCMC Approval', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::checkbox('ncmc_approval')}} 
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
@stop
@section('addCC')
<div class="modal fade" id="addCC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add CC/EFOD</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                
				{{Form::open(array('url'=>'usoap/saveCC','method'=>'post','class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form'))}}

				
					 <div class="form-group required">
                                           
                                            {{Form::label('pq_number','PQ Number', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::text('pq_number','', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div>

                    <div class="form-group required">
                                           
                                            {{Form::label('status','Status', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::select('status',array('No Deference'=>'No Deference','More Exacting'=>'More Exacting','Not Applicable'=>'Not Applicable'),'0', array('class' => 'form-control','placeholder'=>'','required'=>''))}}
                                            </div>
                                            
                    </div>

                     <div class="form-group ">
                                           
                                            {{Form::label('state_ref','State Ref.', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::text('state_ref','', array('class' => 'form-control','placeholder'=>''))}}
                                            </div>
                                            
                    </div>
                     <div class="form-group ">
                                           
                                            {{Form::label('details_of_difference','Details of Differences', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::textarea('details_of_difference','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
                                            </div>
                                            
                    </div>
                     <div class="form-group ">
                                           
                                            {{Form::label('remarks','Remarks', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::textarea('remarks','', array('class' => 'form-control','placeholder'=>'','size'=>'4x1'))}}
                                            </div>
                                            
                    </div>

                     <div class="form-group ">
                                           
                                            {{Form::label('date_of_complementation','Date Of Complementation', array('class' => 'col-xs-4 control-label'))}}
                                            
                                           
                                                        <div class="row">
                                                            <div class="col-xs-2">
                                                            {{Form::select('date', $dates,date('d'),array('class'=>'form-control',''=>''))}}
                                                            </div>
                                                            <div class="col-xs-3">
                                                            {{Form::select('month',$months,date('F'),array('class'=>'form-control',''=>''))}}
                                                
                                                                
                                                            </div>
                                                            <div class="col-xs-2">
                                                                {{Form::select('year',$years,date('Y'),array('class'=>'form-control',''=>''))}}
                                                            </div>
                                                        </div> 
                                            
                    </div>

                     <div class="form-group ">
                                           
                                            {{Form::label('complementation_by_percent','Complementation By Percent', array('class' => 'col-xs-4 control-label'))}}
                                            <div class="col-xs-7">
                                            {{Form::text('complementation_by_percent','', array('class' => 'form-control','placeholder'=>''))}}
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
@stop