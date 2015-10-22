<?php

class Qualification_personal extends \Eloquent {
	protected $fillable = [];
	protected $table = 'qualification_personal';
	
	static function getPhoto(){
		$query=DB::table('qualification_personal')->where('emp_id', '=', '0' )->get();
		return Qualification_personal::all();
	}
}