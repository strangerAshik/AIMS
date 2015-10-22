<?php

class Employee extends \Eloquent {
	protected $fillable = [];
	protected $table = 'qualification_personal';
	
	
	static public function notApproved($acca){
		
		if($acca->verify!='1'){			
			return "
						<div id='myAlert' class='alert alert-warning'>
									   <a href='#' class='close' data-dismiss='alert'>&times;</a>
									   <strong>Warning!</strong> Data is not Approved yet!!
						</div>
				";
		}
										
							
	}
	
	static public function profilePic($id){		
		$photo = DB::table('qualification_personal')->where('emp_id', $id)->pluck('photo');
		return $photo;
		}
	static public function followUpPic($id){		
		$photo = DB::table('users')->where('emp_id', $id)->pluck('photo');
		return $photo;
		}
		
	
	
}