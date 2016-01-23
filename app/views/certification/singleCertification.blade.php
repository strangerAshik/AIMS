@extends('layoutMT')

@section('content')
<section class="content contentWidth">	

	       <div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
									<div class="col-md-12 ">
                                    <h3 class="box-title">Organization: AIMS | Certification Category: AMO</h3>
									</div>
                                </div><!-- /.box-header -->
                               
                                <div class="row"> 
                                	
                                	@if('true'==CommonFunction::hasPermission('edp_legal_opinion',Auth::user()->emp_id(),'entry'))
									<p class="text-left col-md-11">
									&nbsp &nbsp &nbsp <a class="btn btn-primary glyphicon glyphicon-retweet" href="{{URL::to('certification/followup/7878')}}">&nbspFollow Up</a>
									</p>
									@endif  
									                      
	                                <div class="col-md-8" >	                               
		                                <div class="progress" style="height:25px!important; margin-left:24px; ">
										  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
										  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" >
										    40% Complete (success)
										  </div>
										</div>

									</div>
									
								
									
								</div>
                                <div class="box-body">
								
                                    <table id="example3" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Phase</th>
												<th>Doc Name</th>
												<th>Status</th>
												<th>Approval</th>
												<th>Action</th>
											</tr>
										</thead>
											<tr>
												<td>PHASE 1- PRE APPLICATION PHASE</td>
												<td>AOC Initial Application form</td>
												<td>Provided</td>
												<td>Approved</td>
												<td><a href="{{URL::to('certification/singleDocs/DOC_43243')}}">View</a></td>
											</tr>
											<tr>
												<td>PHASE 1- PRE APPLICATION PHASE</td>
												<td>Business Plan</td>
												<td>Provided</td>
												<td>Approved</td>
												<td><a href="#">View</a></td>
											</tr>
											<tr>
												<td>PHASE 2- FORMAL APPLICATION PHASE</td>
												<td>Formal application</td>
												<td>Provided</td>
												<td>Approved</td>
												<td><a href="#">View</a></td>
											</tr>
											<tr>
												<td>PHASE 2- FORMAL APPLICATION PHASE</td>
												<td>Schedule of Events / Implementation Schedule</td>
												<td>Provided</td>
												<td>Approved</td>
												<td><a href="#">View</a></td>
											</tr>
											<tr>
												<td>PHASE 3- Document Evaluation PHASE</td>
												<td>Documents (All) </td>
												<td>Provided</td>
												<td>Not Approved</td>
												<td><a href="#">View</a></td>
											</tr>
											<tr>
												<td>PHASE 4- INSPECTION AND DEMONSTRATION PHASE</td>
												<td>Quality System</td>
												<td>Provided</td>
												<td>Approved</td>
												<td><a href="#">View</a></td>
											</tr>
											<tr>
												<td>PHASE 4- INSPECTION AND DEMONSTRATION PHASE</td>
												<td>Facilities and Infrastructure</td>
												<td>Provided</td>
												<td>Not Approved</td>
												<td><a href="#">View</a></td>
											</tr>
											<tr>
												<td>PHASE 5- Final Certification Phase</td>
												<td>compliance statement</td>
												<td>Provided</td>
												<td>Approved</td>
												<td><a href="#">View</a></td>
											</tr>
											<tr>
												<td>PHASE 5- Final Certification Phase</td>
												<td>Final Certification</td>
												<td>Provided</td>
												<td>Not Approved</td>
												<td><a href="#">View</a></td>
											</tr>
											
										<tbody>
										

										</tbody>
										</table>
						    </div>
					</div>
				</div>
	       </div>
<style type="text/css">
	tr.group,
	tr.group:hover {
	    background-color: #0F4C61 !important;
	}
	/*Css For progress bar*/

/* Skills Progess Bar */

section#skills-pgr {
  padding: 3px 10px 0;
}
#skills-pgr div.progress {
  font-weight: bolder;
  color: #fff;
  background-color: #f3f3f3;
  border: 0px none;
  box-shadow: none;
  height: 2.5em;
}
div.progress-bar > span {
  float: left;
  position: relative;
  top: 9px;
  left: 2%;
  font-size: 14px;
}
/*End*/
</style>
<script type="text/javascript">
//progress bar
// Skills Progress Bar
$(function() {
  $('.progress-bar').each(function() {
    var bar_value = $(this).attr('aria-valuenow') + '%';                
    $(this).animate({ width: bar_value }, { duration: 2000, easing: 'easeOutCirc' });
  });
});
//end 
	$(document).ready(function() {
    var table = $('#example3').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 0 }
        ],
        "order": [[ 0, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(0, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="7" style="background-color: #5EBAC9 !important; color:#FFF;font-weight:bold">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
 
    // Order by the grouping
    $('#example3 tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 0 && currentOrder[1] === 'asc' ) {
            table.order( [ 0, 'desc' ] ).draw();
        }
        else {
            table.order( [ 0, 'asc' ] ).draw();
        }
    } );
 

} );
</script>
<script type="text/javascript">
    
    var deleteLinks = document.querySelectorAll('.delete');

    for (var i = 0; i < deleteLinks.length; i++) {
      deleteLinks[i].addEventListener('click', function(event) {
          event.preventDefault();

          var choice = confirm(this.getAttribute('data-confirm'));

          if (choice) {
            window.location.href = this.getAttribute('href');
          }
      });
}
</script>
</section>
@stop