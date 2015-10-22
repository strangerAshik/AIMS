<?php

class AircraftPrimaryInfo extends \Eloquent {
	protected $fillable = [];
	protected $table = 'aircraft_primary_info';
	
	static public function notApproved($acca){
		
		if($acca->approve!='1'){			
			return "
						<div id='myAlert' class='alert alert-warning'>
									   <a href='#' class='close' data-dismiss='alert'>&times;</a>
									   <strong>Approval Notice:</strong> Data is not Approved yet!!
						</div>
				";
		}
										
							
	}
	static public function warning($acca){
		
		if($acca->warning=='1'){			
			return "
						<div id='myAlert' class='alert alert-warning'>
									   <a href='#' class='close' data-dismiss='alert'>&times;</a>
									   <strong>Warning:</strong> Data is In  warning!!
						</div>
				";
		}
										
							
	}
}