<?php

class OrgCommonFunction extends \Eloquent {

    public static $OrgPrimaryRule=array(
    	'org_number'=>'required|min:2|unique:org_primary'
    	);
    
	protected $fillable = [];

	static function lastUpdateDate($orgNum){
		
		return DB::table('org_update_tracking')->where('org_number', $orgNum)
					->orderBy('id', 'desc')
					->take(1)
					->pluck('date_time');
		
	}
	static function lastUpdator($orgNum){
			return DB::table('org_update_tracking')->where('org_number', $orgNum)
													->orderBy('id', 'desc')
													->take(1)
													->pluck('updater');
	}
}
