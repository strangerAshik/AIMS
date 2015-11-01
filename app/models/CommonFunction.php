<?php

class CommonFunction extends \Eloquent {
	protected $fillable = [];
  //depricated
	static function dDays($day,$month,$year){
	 $months=[
		''=>'Month',
    '1' => 'January',
    '2' => 'February',
    '3' => 'March',
    '4' => 'April',
    '5' => 'May',
    '6' => 'June',
    '7' => 'July',
    '8' => 'August',
    '9' => 'September',
    '10' => 'October',
    '11' => 'November',
    '12' => 'December'
	];
	for($i=1;$i<=12;$i++){
		if($months[$i]==$month){
			$month=$i;
		}
	}
	 $date=$day.'-'.$month.'-'.$year;
	 $now = time(); // or your date as well
     $your_date = strtotime($date);
     $datediff = $your_date-$now ;
     return floor($datediff/(60*60*24));

   }
   static function remaingDay($t_date){

    $now = time(); // or your date as well
     $t_date = strtotime($t_date);
     $datediff = $t_date-$now ;
     return floor($datediff/(60*60*24));
     
   }
   //dapricated 
      static function updateMultiSelection($table_name, $where_field_name, $where_field_value, $field_name_of_target_value){
     //Multiple selection update
    $query =  DB::table($table_name) ->where( $where_field_name,'=',$where_field_value)->pluck( $field_name_of_target_value);
    if($query)return $dquery=unserialize($query);
    else return null;
    //return 'Hellod';
    //End Multiple selection update
     
   }  
//recommend
   static function showMultiValues($table_name,$sia_number){
	   //Multiple selection update
		$query =  DB::table($table_name) ->where( 'sia_number',$sia_number)->pluck('team_members');
		if($query)return $dquery=unserialize($query);
    else return null;
		//return 'Hellod';
		//End Multiple selection update
	   
   }

   static function listsOfColumn($tableName,$columnName){
   // $options='options';
    $select=array(''=>'--Select--');
    $options= DB::table($tableName)->orderBy($columnName)->lists($columnName,$columnName);
     return $options=array_merge($select,$options);
   }
   static function hasPermission($moduleName,$empId,$colName){
   	return DB::table('module_user_permission')
   	->where('user_id',$empId)
   	->where('module_name',$moduleName)
   	->pluck($colName);

   }
   static function getOptions($dropdownName){
    $tableName='dropdown_option_management';
    $options='options';
    $select=array(''=>'--Select--');
    $options=DB::table($tableName)->where('dropdown_names',$dropdownName)
          ->where('soft_delete','<>','1')
          ->lists($options,$options);
    $options=array_merge($select,$options);
    return $options;
   }
   static function pelLicenseType($empId){
  return  DB::table('pel_general_info')
    ->where('emp_id',$empId)  
    ->pluck('license_type');
}
static function getInspectorList(){
  return DB::table('users')->where('role','Inspector')->lists('name');
}
static function pelList(){
  return DB::table('users')->where('role','Inspector')->get();
}
static function InspectorListWithID(){
  return DB::table('users')->where('role','Inspector')->get();
}

static function inspectionHappend($sia_number){
return DB::table('sia_action')->where('sia_number',$sia_number)->count();
//  return 0;
}
static function stateOfReg(){
  return DB::table('aircraft_primary_info')->lists('state_registration','state_registration');
}
static function date($strToTIme){
  return date('d',strtotime($strToTIme));
}

static function month($strToTIme){
  return date('F',strtotime($strToTIme));
}
static function year($strToTIme){
  return date('Y',strtotime($strToTIme));
}


static function organizations(){
  return DB::table('users')->orderBy('organization')->lists('organization','organization');
}
static function toDayProgram(){
    $undefineSurveillance=array('SIA_Not_Programed_'.time()=>'SIA_Not_Programed_'.time(),'Volanteer_'.time()=>'Volanteer_'.time());
    $toDayProgram=DB::table('sia_program')->orderBy('date','desc')->lists('sia_number','sia_number');
    // $toDayProgram=DB::table('sia_program')->where('date',date('Y-m-d'))->lists('sia_number');
    $toDayProgram=array_merge($undefineSurveillance,$toDayProgram);

  return $toDayProgram;
}

static function listOfProgarm(){

    $undefineSurveillance=array('SIA_Not_Programed_'.time()=>'SIA_Not_Programed_'.time(),'Volanteer_'.time()=>'Volanteer_'.time());
    $listOfProgarm=DB::table('sia_program')->orderBy('date','desc')->lists('sia_number','sia_number');
    
    return  $listOfProgarm=array_merge($listOfProgarm,$undefineSurveillance);
}

static function notActionedSiaNumbers(){
  return $programSiaNumbers = DB::table('sia_program')->lists('sia_number','sia_number');
  //$actionedSiaNumbers = DB::table('sia_action')->select('sia_number','id');
  //return $combined = $programSiaNumbers->union($actionedSiaNumbers)->orderBy('id')->lists('sia_number', 'sia_number');
  
}
static function siaActionListedSiaNumber(){
  return $siaNumbers=DB::table('sia_action')->orderBy('id','desc')->lists('sia_number','sia_number');
}

static function aircraftMmsList(){
  return $aMms=DB::table('aircraft_primary_info')->orderBy('aircraft_MSN')->lists('aircraft_MSN');
}

static function aircraftRegistrationNo(){
  return $aRegNos=DB::table('aircraft_primary_info')->orderBy('registration_no')->lists('registration_no');
}

static function getChecklistName(){
  return $clName=DB::table('sia_checklists')->orderBy('checklist_name')->lists('checklist_name');
}
static function getChecklistType(){
  return $clName=DB::table('sia_checklists')->orderBy('checklist_type')->lists('checklist_type');
}
static function getSections(){
  return $clName=DB::table('sia_checklists')->orderBy('section')->lists('section');
}
static function saftyConsCount($sia_number){
  return $clName=DB::table('sc_safety_concern')->where('sia_number',$sia_number)->count();
}
static function findingCount($sia_number){
  return $clName=DB::table('sia_findings')->where('sia_number',$sia_number)->count();
}
static function edpCount($sia_number){
  return $clName=DB::table('edp_primary')->where('sia_number',$sia_number)->count();
}
static function getEdpList(){
  return $info=DB::table('edp_primary')->orderBy('id','desc')->lists('edp_number','edp_number');
}

static function programStatus($sia_number){
  return $info=DB::table('sia_approval')->where('sia_number',$sia_number)->count();
}


static function getFindingList(){
  $select=array('#'=>'--Select Finding Number--');

  $info=DB::table('sia_findings')->orderBy('id','desc')->lists('finding_number','finding_number');

  return array_merge( $select,$info);
}
static function getFindingNumber($sc_number){
  return $info=DB::table('sia_findings')->where('sia_number',$sc_number)->count();
}

static function correctiveAction($findingNumber){
  return $info=DB::table('sia_corrective_action')->where('finding_number',$findingNumber)->get();
}
static function isMitigate($findingNumber){
  return $info=DB::table('sia_corrective_action')->where('finding_number',$findingNumber)->count();
}
static function isSafetyConsApproved($sc_number){
  return $info=DB::table('sc_approval_info')->where('safety_issue_number',$sc_number)->count();
}

static function getSpecificPurpose($sc_number){
  return $info=DB::table('sia_program')->where('sia_number',$sc_number)->pluck('specific_purpose');
}

static function getSCAndRiskAnalysis($sc_number){
  return $info=DB::table('sc_safety_concern')->select('safety_issue_number','risk_action')->where('sia_number',$sc_number)->get();
}
//Report

//Findings-Safety Concern-EDP (By Month &Year)
static function getMonthList($from,$to){

  $list=array(date('F Y'));

  $begin = new DateTime($from);
  $end = new DateTime($to);
  $i=0;
  while ($begin <= $end) {

       $list[$i]=$begin->format('F Y');
      $begin->modify('first day of next month');

      ++$i;
  }

  return $list;

}

static function getScEdpNumber($from,$to,$dateColunmName,$tableName){
  $monthList=self::getMonthList($from,$to);
  
  $scOrEdpContainer=[];

  foreach ($monthList as $monthYear) {
     $from=date('Y-m-d',strtotime('01 '.$monthYear));
     $to=date('Y-m-d',strtotime('31 '.$monthYear));

     $count=DB::table($tableName)->whereBetween($dateColunmName, array($from,$to))->count();
     $scOrEdpContainer[]=$count;
  }
  return $scOrEdpContainer;
}

static function getFindingNumberByMonth($from,$to){
  
   $monthList=self::getMonthList($from,$to);

   $findingSiaList=DB::table('sia_findings')->lists('sia_number');
   $findingNumContainer=[];
   foreach ($monthList as $monthYear) {
     $from=date('Y-m-d',strtotime('01 '.$monthYear));
     $to=date('Y-m-d',strtotime('31 '.$monthYear));
     $siaNumbers=DB::table('sia_action')->whereBetween('date',array($from,$to))->lists('sia_number');
     $intersectSia=array_intersect($siaNumbers, $findingSiaList);
     $findingNumber=sizeof($intersectSia);
     $findingNumContainer[]=$findingNumber;

   }

  return $findingNumContainer;
  
}


//Surveillance by Service Provider
static function getServiceProviderList($form,$to){
  $from=$form;
  $to=$to; 
  return DB::table('sia_action')->where('organization','<>','')->whereBetween('date', array($from,$to))->distinct()->lists('organization'); 
}
static function surveillanceByProvider($provider,$fromDate,$toDate){
 
  return DB::table('sia_action')->where('organization',$provider)
                ->whereBetween('date', array($fromDate,$toDate))->count(); 
}
//Surveillance By Critical Elements
static function totalIns($thisYear){
   $from=date('Y-m-d',strtotime('01 '.'January '.$thisYear));
  $to=date('Y-m-d',strtotime('31 '.'December '.$thisYear)); 
   return DB::table('sia_action')->whereBetween('date', array($from,$to))->count();
}
static function getCePar($ce,$from,$to){
  //$from=date('Y-m-d',strtotime('01 '.'January '.$thisYear));
  //$to=date('Y-m-d',strtotime('31 '.'December '.$thisYear)); 
  $totalIns=DB::table('sia_action')->where('critical_element','<>','')->whereBetween('date', array($from,$to))->count();
  if($totalIns<1) $totalIns=1;
  $thisCeNum=DB::table('sia_action')->where('critical_element',$ce)
 ->whereBetween('date', array($from,$to))->count();
 
 return ($thisCeNum*100)/$totalIns;
}

//Status of Surveillance Program
static function numberOfProgram($from,$to){
  return DB::table('sia_program')->whereBetween('date',array($from,$to))->count();
}
static function numberOfExecution($from,$to){
  return DB::table('sia_action')->whereBetween('date',array($from,$to))->count();
}
static function numberOfClosedProgram($from,$to){
$siaList=DB::table('sia_action')->whereBetween('date',array($from,$to))->lists('sia_number');
$counter=0;
foreach ($siaList as $siaNum) {
  $result=DB::table('sia_approval')->where('sia_number',$siaNum)->count();;
  if($result>0) $counter++;
}

  return $counter;
}
//Type of Enforcement

static function multiSelectionDataWithPercentage($dateFieldName,$from,$to,$tableName,$whereNotNull,$columnName){
//getting the list of column of date to date range
    $listOfType=DB::table($tableName)->where($whereNotNull,'<>','')->whereBetween($dateFieldName,array($from,$to))->lists($columnName);

//unserialize and keep in an 1D array
    $actionTypes=array();
    foreach ($listOfType as $list) {
      $values=unserialize($list);
      foreach ($values as $key => $value) {
       $actionTypes[]=$value;
      }
    }
//Array Analysis stat
    //get the unique value of array in 1D array
    $uniqueTypes=array_unique($actionTypes);
    //get an associative array with frequency 
    $freqWithTypeAsAssociativeArray=array_count_values($actionTypes);
   //from the associative array get the 1D array for counting total number of EDP
    $onlyFrequencyValue=array_values($freqWithTypeAsAssociativeArray);
    $totalActionTaken= array_sum($onlyFrequencyValue);

    //populate array for the json data
    $jsonArray=[];
    foreach ($uniqueTypes as $type) {
      $value=$freqWithTypeAsAssociativeArray[$type]*100/$totalActionTaken;
      $jsonArray[] = array('name' => $type ,'y' => $value);
    }
  
  return $jsonArray;


}
static function piSingleColumnDataProcessWithPersentageJason($dateFieldName,$from,$to,$tableName,$whereNotNull,$columnName){
//getting list as a 1D Array
 $lists=DB::table($tableName)->where($whereNotNull,'<>','')->whereBetween($dateFieldName,array($from,$to))->lists($columnName);

//Array Analysis stat

  //total Observations
    $totalObservation=sizeof($lists);

  //get the unique value of array in 1D array
    $uniqueLists=array_unique($lists);

  //get an associative array with frequency 
    $freqWithTypeAsAssociativeArray=array_count_values($lists);


    //populate array for the json data
    $jsonArray=[];
    foreach ($uniqueLists as $list) {
      $value=$freqWithTypeAsAssociativeArray[$list]*100/$totalObservation;
      $jsonArray[] = array('name' => $list ,'y' => $value);
    }
  
   return $jsonArray;

}

//SIA , Finding-Safety Concern-EDP By Operator
static function getOperatorList($from,$to){
  return $operatorList=DB::table('sia_action')->where('organization','<>','')->whereBetween('date',array($from,$to))->distinct()->orderBy('organization')->lists('organization');
}
static function getSiaArray($from,$to){
  $operatorList=DB::table('sia_action')->where('organization','<>','')->whereBetween('date',array($from,$to))->orderBy('organization')->lists('organization');
  //get associative array with frequency
  $assovalue=array_count_values($operatorList);
  //from asso array get only value
  $siaArray=array_values($assovalue);
 
    return $siaArray;
}
static function getFindingScEdpArray($actionTable,$from,$to){

$operatorList=DB::table('sia_action')->where('organization','<>','')->whereBetween('date',array($from,$to))->distinct()->orderBy('organization')->lists('organization');

$findingArray=[];
$findingSia=DB::table($actionTable)->lists('sia_number');
  foreach ($operatorList as $org) {
    $orgSia=DB::table('sia_action')->where('organization',$org)->whereBetween('date',array($from,$to))->lists('sia_number');
    //intersect 2 array
    $intersectValue=array_intersect($orgSia,$findingSia);
    $findingNumber=sizeof($intersectValue);
    $findingArray[]=$findingNumber;

  }
  return $findingArray;

}
//SIA-Findings-SC-EDP By Aircraft MMS
static function listOfMms($from,$to){
   $listMmsFromSia=DB::table('sia_action')->where('aircraft_mms','<>','')->whereBetween('date',array($from,$to))->lists('aircraft_mms');
   //$listMmsFromSia=array_unique($listMmsFromSia);
  //$listMmsFromSc=DB::table('sc_safety_concern')->where('aircraft_msn','<>','')->whereBetween('issue_finding_date',array($from,$to))->lists('aircraft_msn');
 // $listMmsFromSc=array_unique($listMmsFromSc);
 //return array_unique (array_merge ( $listMmsFromSc,$listMmsFromSia));
 return array_unique ($listMmsFromSia);
  //$listMMS=array_merge($listMmsFromSia,$listMmsFromSc);
 
  
   //reduce redundency
   //return $aircraft_mms=array_unique($aircraft_mms);
}
static function siaNumberMms($from,$to){
  $listOfMms=self::listOfMms($from,$to);
  $siaNumArray=[];
  foreach ($listOfMms as $mms) {
  $num=DB::table('sia_action')->where('aircraft_mms',$mms)->whereBetween('date',array($from,$to))->count();
  $siaNumArray[]=$num;
  }
  return $siaNumArray;
  
}
static function scMms($from,$to){
   $listOfMms=self::listOfMms($from,$to);
   $scMmsNum=[];
   foreach ($listOfMms as $mms) {
     $num=DB::table('sc_safety_concern')->where('aircraft_msn',$mms)->whereBetween('issue_finding_date',array($from,$to))->count();
     $scMmsNum[]=$num;
   }
   return $scMmsNum;
}
static function findingEdpOfMms($actionTable,$from,$to){
 $listOfMms=self::listOfMms($from,$to);
 //
 $findingSia=DB::table($actionTable)->lists('sia_number');
 //list of sia_number
$findingArray=[];
$findingSia=DB::table($actionTable)->lists('sia_number');
  foreach ($listOfMms as $mms) {
    $orgSia=DB::table('sia_action')->where('aircraft_mms',$mms)->whereBetween('date',array($from,$to))->lists('sia_number');
    //intersect 2 array
    $intersectValue=array_intersect($orgSia,$findingSia);
    $findingNumber=sizeof($intersectValue);
    $findingArray[]=$findingNumber;

  }
  return $findingArray;
}
//Program Execution By Event
static function getList($from,$to,$dateCloumName,$tableName,$where,$listBy){
return $List=DB::table($tableName)->where($where,'<>','')->whereBetween($dateCloumName,array($from,$to))->orderBy($listBy)->distinct()->lists($listBy);
   //get the unique value of array in 1D array
   
}
static function getListNumber($from,$to,$dateCloumName,$tableName,$where,$listBy){
 $eventList=DB::table($tableName)->where($where,'<>','')->whereBetween($dateCloumName,[$from,$to])->orderBy($listBy)->lists($listBy);
  //get the unique value of array in 1D array
  $uniqueLists=array_unique($eventList);
  //get an associative array with frequency 
    $freqWithTypeAsAssociativeArray=array_count_values($eventList);


    //populate array for the json data
    $jsonArray=[];
    foreach ($uniqueLists as $list) {
      $value=$freqWithTypeAsAssociativeArray[$list];
      $jsonArray[] =$value;
    }
    return $jsonArray;
}

static function userPhotoById($id){
  $img= DB::table('users')->where('emp_id',$id)->pluck('photo');
  if($img){
    return $img;
  }
  return 'anonymous.png';
}






















}