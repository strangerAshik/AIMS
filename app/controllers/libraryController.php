<?php

class LibraryController extends \BaseController {
	 
	public function main()
	{
		return View::make('library.supportingDocuments.main')
		->with('PageName','Supporting Doc Main')
		->with('active','e_library')
		;
	}
	//report
	public function report(){
		return View::make('library.report')
		->with('PageName','Report')
		->with('active','e_library')
		;
	}
	public function reportByDateToDate(){
		return App::make('SurveillanceController')->reportByDateToDate('library');
	}
	public function newSupportingDocuments(){
		 $docTypesList =array(''=>'--Select Type--')+DB::table('lib_suporting_docs_type')
		->where('soft_delete','<>','1')
		->lists('doc_type','doc_type');
		 $docTypes = DB::table('lib_suporting_docs_type')
		->where('soft_delete','<>','1')
		->get();
		$authors=[];
		$tags=[];
		//Multiple selection update
		//$authors=parent::getMultipleOptionList('lib_suporting_docs','doc_authors');
		//$tags=parent::getMultipleOptionList('lib_suporting_docs','doc_tags');
		
		
		//merge arrays 
		//End Multiple selection update
		
		return View::make('library.supportingDocuments.newSupportingDocuments')
		->with('PageName','New Supporting Doc ')
		->with('active','e_library')
		->with('dates',parent::dates())
		->with('toDay',date("d F Y"))
		->with('months',parent::months())
		->with('years_from',parent::years_from())
		->with('years',parent::years())
		->with('authors',$authors)
		->with('docTypesList',$docTypesList)
		->with('docTypes',$docTypes)
		->with('tags',$tags)
		;
	}
	public function saveSupportingDocument(){
		
		$doc_upload=parent::fileUpload('doc_upload','lib_supporting_docs');
	
		$sd=new LibSupportingDocument;
		$sd->doc_title=Input::get('doc_title');
		$sd->doc_authors=Input::get('doc_authors');
		$sd->doc_type=Input::get('doc_type');
		$sd->doc_subject=Input::get('doc_subject');
		$sd->doc_tags=Input::get('doc_tags');
		$sd->doc_series=Input::get('doc_series');
		$sd->doc_edition=Input::get('doc_edition');
		$sd->doc_part=Input::get('doc_part');
		$sd->doc_volume=Input::get('doc_volume');
		$sd->doc_amendment=Input::get('doc_amendment');
		$sd->doc_published_year=Input::get('doc_published_year');
		$sd->doc_isbn=Input::get('doc_isbn');
		$sd->doc_upload=$doc_upload;
		$sd->doc_url=Input::get('doc_url');
		$sd->doc_status=Input::get('doc_status');
		$sd->row_creator=Auth::user()->getName();
		$sd->row_updator=Auth::user()->getName();
		$sd->soft_delete=0;
		$sd->save();
		
		return Redirect::back()->with('message','Supporting Docs Saved ');
		
	}
	public function updateSupportingDocument(){
		
		$doc_upload=parent::updateFileUpload('old_doc_upload','doc_upload','lib_supporting_docs');
		//Multiple selection 
		
	     //End Multiple selection 
	
		$id=Input::get('id');
		DB::table('lib_suporting_docs')
		->where('id',$id)
		->update(array(
		'doc_title' => Input::get('doc_title'),
		'doc_authors' =>Input::get('doc_authors'),
		'doc_type' => Input::get('doc_type'),
		'doc_subject' => Input::get('doc_subject'),
		'doc_tags' =>Input::get('doc_tags'),
		'doc_series' => Input::get('doc_series'),
		'doc_edition' => Input::get('doc_edition'),
		'doc_part' => Input::get('doc_part'),
		'doc_volume' => Input::get('doc_volume'),
		'doc_amendment' => Input::get('doc_amendment'),
		'doc_published_year' => Input::get('doc_published_year'),
		'doc_isbn' => Input::get('doc_isbn'),
		'doc_upload' => $doc_upload,
		'doc_url' => Input::get('doc_url'),
		'doc_status' => Input::get('doc_status'),
		'row_updator' =>Auth::user()->getName(),
		'soft_delete' =>0,
		
		'updated_at' =>time()		
		));
		return Redirect::back()->with('message','Supporting Docs Updated ');
	}
	public function saveSupportingDocumentType(){
		
		$sd=new LibSupportingDocumentType;
		$sd->doc_type=Input::get('doc_type');	
		
		$sd->row_creator=Auth::user()->getName();
		$sd->row_updator=Auth::user()->getName();
		$sd->soft_delete=0;
		$sd->save();
		
		return Redirect::back()->with('message','Supporting Docs Type Saved ');
		
	}
	public function updateSupportingDocumentType(){
		$id=Input::get('id');
		 $doc_type=Input::get('doc_type');
		   $old_doc_type=Input::get('old_doc_type');
		 
		 DB::table('lib_suporting_docs')
		->where('doc_type',$old_doc_type)
		->update(array(		
		'doc_type' => $doc_type,		
		'updated_at' =>time()		
		));
		
		 DB::table('lib_suporting_docs_type')
		->where('id',$id)
		->update(array(		
		'doc_type' =>$doc_type,		
		'row_updator' =>Auth::user()->getName(),
		'updated_at' =>time()		
		));
		
		return Redirect::back()->with('message','Supporting Docs Updated ');
	}
	public function privateView(){
		 $allDocs=DB::table('lib_suporting_docs')
		->where('soft_delete','<>','1')
		->orderBy('doc_type')
		->get();
		 $docTypesList =array(''=>'--Select Type--')+DB::table('lib_suporting_docs_type')
		->where('soft_delete','<>','1')
		->lists('doc_type','doc_type');
	
		$docTypes = DB::table('lib_suporting_docs_type')
		->where('soft_delete','<>','1')
		->lists('doc_type');
		
		//Multiple selection update
		 $authors =  DB::table('lib_suporting_doc_authors') ->where('doc_authors','=','1430066019')->pluck('doc_authors_name');;
		$authors=unserialize($authors);
		//End Multiple selection update
		
		
			return View::make('library.supportingDocuments.viewPrivate')
			->with('PageName','Private Supporting View ')
			->with('active','e_library')
			->with('dates',parent::dates())
			->with('toDay',date("d F Y"))
			->with('months',parent::months())
			->with('years_from',parent::years_from())
			->with('years',parent::years())
			->with('allDocs',$allDocs)
			->with('docTypesList',$docTypesList)
			
			->with('docTypes',$docTypes);
	}
	public function publicView(){
		 $allDocs=DB::table('lib_suporting_docs')
		->where('soft_delete','<>','1')
		->where('doc_status','=','Public')
		->orderBy('doc_type')
		->get();
	
		$docTypes = DB::table('lib_suporting_docs_type')
		->where('soft_delete','<>','1')
		->lists('doc_type');
		
		
		
		
			return View::make('library.supportingDocuments.viewPublic')
			->with('PageName','Private Supporting View ')
			->with('active','e_library')
			->with('dates',parent::dates())
			->with('toDay',date("d F Y"))
			->with('months',parent::months())
			->with('years_from',parent::years_from())
			->with('years',parent::years())
			->with('allDocs',$allDocs)
			
			->with('docTypes',$docTypes);
	}

}