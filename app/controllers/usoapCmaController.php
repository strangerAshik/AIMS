<?php

class UsoapCmaController extends \BaseController {

	
	public function main()
	{
		return View::make('usoapCma.main')
		->with('PageName','USOAP CMA Main')
		->with('active','usoap_cma')
		;
	}

	public function newPQ()
	{
		return View::make('usoapCma.newPQ')
		->with('PageName','New PQ')
		->with('active','usoap_cma')
		->with('dates',parent::dates())
			
			->with('months',parent::months())
			
			->with('years',parent::years());	
	}

	public function savePQ()
	{
		DB::table('usoap_pq')->insert(array(
				'pq_number'=>Input::get('pq_number'),
				'audit_area'=>Input::get('audit_area'),
				'critical_element'=>Input::get('critical_element'),
				'pq_type'=>Input::get('pq_type'),
				'audit_area_group'=>Input::get('audit_area_group'),
				'pq'=>Input::get('pq'),
				'icao_ref'=>Input::get('icao_ref'),
				'review_evidence'=>Input::get('review_evidence'),
				'pq_overall_com_status'=>Input::get('pq_overall_com_status'),
				'number_of_cc'=>Input::get('number_of_cc'),
				'final_statement'=>Input::get('final_statement'),
				'final_evidence'=>Input::get('final_evidence'),
				'ncmc_approval'=>Input::get('ncmc_approval'),


				'row_creator'=>Auth::user()->getName(),
				'row_updator'=>Auth::user()->getName(),
				'soft_delete'=>'0',
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s')
			));
		return Redirect::back()->withInput()->with('message','PQ is Saved!');
	}

	public function saveCC()
	{

		$date_of_complementation=Input::get('date').' '.Input::get('month').' '.Input::get('year');
		$timestamp = strtotime($date_of_complementation);
		$date_of_complementation =date('Y-m-d', $timestamp);
	 
		DB::table('usoap_cc')->insert(array(
				'pq_number'=>Input::get('pq_number'),

				'status'=>Input::get('status'),
				'state_ref'=>Input::get('state_ref'),
				'details_of_difference'=>Input::get('details_of_difference'),
				'remarks'=>Input::get('remarks'),
				'date_of_complementation'=>$date_of_complementation,
				'complementation_by_percent'=>Input::get('complementation_by_percent'),

				'row_creator'=>Auth::user()->getName(),
				'row_updator'=>Auth::user()->getName(),
				'soft_delete'=>'0',
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s')
			));
		return Redirect::back()->withInput()->with('message','CC is Saved!');
	}

	public function pqList()
	{
		$pqList=DB::table('usoap_pq')->get();
		return View::make('usoapCma.listView')
		->with('PageName','PQ List')
		->with('active','usoap_cma')
		->with('pqList',$pqList)
		;
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /usoapcma/{id}
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
	 * DELETE /usoapcma/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}