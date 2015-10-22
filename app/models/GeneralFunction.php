<?php

class GeneralFunction extends \Eloquent {
	static function test(){
		$years['']='Year';
		for($i =date('Y'); $i >=1930; $i--){$years[$i] = $i;} return $years;
	}
	protected $fillable = [];
	static public function years(){
		$years['']='Year';
		$i =date('Y')+5;
		for($i; $i >=1930; $i--){$years[$i] = $i;} return $years;
	}
	static public function years_from(){
		$years['']='Year';
		$j=2017;
		for($i =date('Y'); $i <=$j; $i++){$years[$i] = $i;} return $years;
	}
	
	static public function dates(){
		$dates['']='Day';
		for($i =1; $i <=31; $i++){$dates[$i] = $i;}	return $dates;
	}
	static public function months(){
		$months = [
		''=>'Month',
    'January' => 'January',
    'February' => 'February',
    'March' => 'March',
    'April' => 'April',
    'May' => 'May',
    'June' => 'June',
    'July' => 'July',
    'August' => 'August',
    'September' => 'September',
    'October' => 'October',
    'November' => 'November',
    'December' => 'December'
	];
		return $months;
	}
}