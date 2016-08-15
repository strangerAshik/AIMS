<?php

class helpFaqController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function main()
	{
		return View::make('helpFaq.main')
		->with('PageName','Help And FAQ')
		->with('active','help_faq')
		;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function askQuestion()
	{
		$recentQuestion=DB::table('help_faq_question')->orderBy('id','desc')->limit(5)->get();
		return View::make('helpFaq.addQuestion')
		->with('PageName','Ask Question')
		->with('active','help_faq')
		->with('recentQuestion',$recentQuestion)
		;
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function singleQuestionAnsware($id)
	
	{
		$question=DB::table('help_faq_question')->where('id',$id)->where('soft_delete','<>','1')->get();
		$ans=DB::table('help_faq_ans')->where('question_id',$id)->where('soft_delete','<>','1')->get();
		return View::make('helpFaq.singleQuestion')
		->with('PageName','Single Question')
		->with('active','help_faq')		
		->with('question',$question)
		->with('ans',$ans)
		;
	}


	public function faqBank()
	{
		//$question=DB::table('help_faq_question')->orderBy('category')->get();
		$question=DB::table('help_faq_question')
        ->leftJoin('help_faq_ans', 'help_faq_question.id', '=', 'help_faq_ans.question_id')
        ->where('help_faq_question.soft_delete','<>','1')
        ->select('help_faq_question.*', 'help_faq_ans.ans')
        ->orderBy('help_faq_question.id','desc')
        ->get();

		return View::make('helpFaq.faqBank')
		->with('PageName','Question Bank')
		->with('active','help_faq')
		->with('question',$question)
		
		;
		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function report()
	{
		return View::make('helpFaq.report')
		->with('PageName','Report')
		->with('active','help_faq');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function saveQuestion()
	{
		//Multiple selection update
		$category =Input::get('categories');
		$category= serialize($category);
		//$cat=parent::getMultipleOptionList('lib_suporting_docs','doc_authors');


		$file=parent::fileUpload('file','helpFaq');

		DB::table('help_faq_question')->insert(
			array(
							'category'=>$category,
							'question'=>Input::get('question'),
							'file'=>$file,							

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
		return Redirect::back()->with('message','Question Submitted');
		//$doc_upload=parent::updateFileUpload('old_doc_upload','doc_upload','lib_supporting_docs');
	}
	public function updateQuestion()
	{
		$id=Input::get('id');
		//Multiple selection update
		$category =Input::get('categories');
		 $category= serialize($category);
		


		
		$file=parent::updateFileUpload('old_file','file','helpFaq');
	

		DB::table('help_faq_question')->where('id',$id)->update(
			array(
							'category'=>$category,
							'question'=>Input::get('question'),
							'file'=>$file,							

							
							'row_updator'=>Auth::user()->getName(),
							
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);
		return Redirect::back()->with('message','Question Updated');
		//$doc_upload=parent::updateFileUpload('old_doc_upload','doc_upload','lib_supporting_docs');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function saveAnswre()
	{
		$file=parent::fileUpload('file','helpFaq');

		DB::table('help_faq_ans')->insert(
			array(
							'question_id'=>Input::get('question_id'),
							'ans'=>Input::get('ans'),
							'file'=>$file,							

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
		return Redirect::back()->with('message','Answer Saved');
	}
	public function updateAnswre()
	{
		$id=Input::get('id');
		$file=parent::updateFileUpload('old_file','file','helpFaq');

		DB::table('help_faq_ans')->where('id',$id)->update(
			array(
							
							'ans'=>Input::get('ans'),
							'file'=>$file,							

							
							'row_updator'=>Auth::user()->getName(),							
							'updated_at'=>date('Y-m-d H:i:s')
						)
				);
		return Redirect::back()->with('message','Answer Updated');
	}
	public function hello($id)
	{
		//
	}


}
