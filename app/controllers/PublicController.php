<?php

class PublicController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /public
	 *
	 * @return Response
	 */

	public function SDpublicView(){
		 $allDocs=DB::table('lib_suporting_docs')
		->where('soft_delete','<>','1')
		->where('doc_status','=','Public')
		->orderBy('doc_type')
		->get();				
		return View::make('library.supportingDocuments.viewPublic')
		->with('PageName','Private Supporting View')
		->with('dates',parent::dates())
		->with('toDay',date("d F Y"))
		->with('months',parent::months())
		->with('years_from',parent::years_from())
		->with('years',parent::years())
		->with('allDocs',$allDocs);
	}

	public function sendMessage(){

		$name=Input::get('name');
		$email=Input::get('email');
		$phone=Input::get('phone');
		$subject=Input::get('subject');
		$message=Input::get('message');

		$to = "support@asrtmcaab.com, md.ashikuzzaman.ashik@gmail.com";
		$subject =$subject;

		$message = "
		<html>
		<head>
		<title>$subject</title>
		</head>
		<body>
		<p>$message</p>
		<table>
		<tr>
		<th>Name: $name</th>
		<th>Phone: $phone</th>
		<th>Email: $email</th>
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

		return Redirect::back()->with('message','Message Send!');

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /public/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /public
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /public/{id}
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
	 * GET /public/{id}/edit
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
	 * PUT /public/{id}
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
	 * DELETE /public/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}