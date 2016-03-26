<?php

class voluntaryReportingController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function main()
	{
		return View::make('voluntaryReporting.main')
			->with('PageName','Voluntary Reporting')
			->with('active','voluntary_reporting')
			;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function voluntaryReportingList()
	{
		$allReport=DB::table('voluntary_reporting')->where('soft_delete','<>','1')->orderBy('id','desc')->get();
		return View::make('voluntaryReporting.voluntaryReportingList')
			->with('PageName','Voluntary Reporting List')
			->with('active','voluntary_reporting')
			->with('allReport',$allReport)

			;
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function singleReport($id)
	{
		$reportInfo=DB::table('voluntary_reporting')->where('soft_delete','<>','1')->where('id',$id)->get();
		$reportAction=DB::table('voluntary_reporting_action')->where('soft_delete','<>','1')->where('report_id',$id)->get();
		$approvalInfo=DB::table('voluntary_reporting_approval')->where('soft_delete','<>','1')->where('report_id',$id)->orderBy('id','desc')->get();
		return View::make('voluntaryReporting.singleReport')
			->with('PageName','Single Report')
			->with('active','voluntary_reporting')
			->with('dates',parent::dates())
			->with('months',parent::months())
			->with('years',parent::years_from())
			->with('reportInfo',$reportInfo)
			->with('reportAction',$reportAction)
			->with('reportId',$id)		
			->with('approvalInfo',$approvalInfo)		

			;
	}

	public function saveReport(){
		$file=parent::fileUpload('file','voluntaryReporting');
		//email
		/*
		$title=Input::get('title');
		$email=Input::get('email');
		$report=Input::get('report');
		
		$to = "support@asrtmcaab.com, md.ashikuzzaman.ashik@gmail.com";
		$subject =$title;

		$message = "
		<html>
		<head>
		<title>$title</title>
		</head>
		<body>
		<p>$message</p>
		<table>
		<tr>
		
		<th>Email: $email</th>
		<th>Report: $report</th>
		</tr>
		
		</table>
		</body>
		</html>
		";

		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: <contact@asrtmcaab.com>' . "\r\n";
		

		mail($to,$subject,$message,$headers);
		*/

		DB::table('voluntary_reporting')->insert(
					array(
							'email'=>Input::get('email'),
							'title'=>Input::get('title'),
							'report'=>Input::get('report'),
							'file'=>$file,

							'soft_delete'=>'0',
							'approve'=>'0',
							'warning'=>'0',
							'soft_delete'=>'0',
							'created_at'=>date('Y-m-d H:i:s'),
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);
		
		return Redirect::back()->with('message','Your Report Recived. Thanks For Reporting :)');


	}
	public function saveApprovalForm(){

			$pageId=Input::get('report_id');
		
			$approval_date=Input::get('approval_date').' '.Input::get('approval_month').' '.Input::get('approval_year');
			$strtotime=strtotime($approval_date);
			$approval_date=date('Y-m-d',$strtotime);

			DB::table('voluntary_reporting_approval')->insert(array(
			'report_id'=>Input::get('report_id'),
			'approved_by'=>Input::get('approved_by'),
			'designation'=>Input::get('designation'),
			'approval_date'=>$approval_date,
			'approval_note'=>Input::get('approval_note'),
			'row_creator'=>Auth::User()->getName(),
			'row_updator'=>Auth::User()->getName(),
			'soft_delete'=>'0',			
			'created_at'=>date('Y-m-d H:i:s'),			
			'updated_at'=>date('Y-m-d H:i:s')			
			));

		//return Redirect::back()->with('message','Aproved!');

		 return Redirect::to(URL::previous() . "#$pageId")->with('message', 'Approval Information is Saved!');


	}
	public function updateApprovalForm(){
			$id=Input::get('id');

			$pageId=$id;

			$approval_date=Input::get('approval_date').' '.Input::get('approval_month').' '.Input::get('approval_year');
			$strtotime=strtotime($approval_date);
			$approval_date=date('Y-m-d',$strtotime);

			DB::table('voluntary_reporting_approval')->where('id',$id)->update(array(
			
			'approved_by'=>Input::get('approved_by'),
			'designation'=>Input::get('designation'),
			'approval_date'=>$approval_date,
			'approval_note'=>Input::get('approval_note'),
			
			'row_updator'=>Auth::User()->getName(),
			
			'updated_at'=>date('Y-m-d H:i:s')			
			));

		
		 return Redirect::to(URL::previous() . "#$pageId")->with('message', 'Approval Information is Updated!');


	}

	public function saveAction(){
		$pageId=Input::get('report_id');
		$userEmail=DB::table('voluntary_reporting')->where('id',$pageId)->pluck('email');
		$reportTitle=DB::table('voluntary_reporting')->where('id',$pageId)->pluck('title');
		$file=parent::fileUpload('file','voluntaryReporting');
		$notify=Input::get('notify');
		if($notify){
			$notify='Yes';

		}
		else{
			$notify='No';
		}

		DB::table('voluntary_reporting_action')->insert(
					array(
							'report_id'=>Input::get('report_id'),
							'action_details'=>Input::get('action_details'),
							'file'=>$file,
							'notify'=>$notify,

							'row_creator'=>Auth::user()->getName(),
							'row_updator'=>Auth::user()->getName(),
							'soft_delete'=>'0',
							'approve'=>'0',
							'warning'=>'0',
							'soft_delete'=>'0',
							'created_at'=>date('Y-m-d H:i:s'),
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);

		
		//mail sending 
		if($notify=='Yes'){

				$to = $userEmail;
				$subject = "DFSR-CAAB: Your Voluntary Report In Action";

				$message = "
				<html>
				<head>
				<title>DFSR-CAAB: Your Voluntary Report In Action</title>
				</head>
				<body>
				<h2>DFSR-CAAB: Your Voluntary Report In Action</h2>
				<br>Your voluntary report titled '".$reportTitle." ' is in action. 
				<br>Thanks for your cooperation.
				
				</body>
				</html>
				";

				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				// More headers
				$headers .= 'From: <ASRTM@dfsr.gov.bd>' . "\r\n";
				//$headers .= 'Cc: myboss@example.com' . "\r\n";



				if(mail($to,$subject,$message,$headers))
					$success='Reporter Notified &';
				else
					$success='Reporter Notification Failled &';
			}
		else 
			$success='Reporter is not Notified & ';

		
		 return Redirect::to(URL::previous() . "#$pageId")->with('message', $success.' Action Saved');


	}
	public function updateAction(){
		
		//$file=parent::fileUpload('file','voluntaryReporting');
		$file=parent::updateFileUpload('old_file','file','voluntaryReporting');

		$id=Input::get('id');
		$pageId=$id;

		DB::table('voluntary_reporting_action')->where('id',$id)->update(
					array(
							
							'action_details'=>Input::get('action_details'),
							'file'=>$file,
							//'notify'=>$notify,

							
							'row_updator'=>Auth::user()->getName(),
							
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);
		
		 return Redirect::to(URL::previous() . "#$pageId")->with('message', 'Action Updated!!');


	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
