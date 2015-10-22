<?php

class SurveillanceCommon extends \Eloquent {
	protected $fillable = [];

	static function departureAirfield(){
    return DB::table('sia_action')->orderBy('departure_airfield')->lists('departure_airfield','departure_airfield');
   }
	static function arrivalAirfield(){
    return DB::table('sia_action')->orderBy('arrival_airfield')->lists('arrival_airfield','arrival_airfield');
   }
	static function location(){
    return DB::table('sia_action')->orderBy('location')->lists('location','location');
   }
	static function pilotInCommand(){
    return DB::table('sia_action')->orderBy('pic')->lists('pic','pic');
   }
	static function flightNumber(){
    return DB::table('sia_action')->orderBy('flight_number')->lists('flight_number','flight_number');
   }
	static function time(){
    return DB::table('sia_action')->orderBy('time')->lists('time','time');
   }
}