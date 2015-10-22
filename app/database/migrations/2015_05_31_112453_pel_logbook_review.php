<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PelLogbookReview extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pel_logbook_review',function($table){
			$table->increments('id');
			$table->string('emp_id');

			$table->string('active');
			
			$table->string('review_date');
			$table->string('review_month');
			$table->string('review_year');

			$table->string('purpose_of_review');
			$table->string('flight_time');
			$table->string('memo_notes');
		
			$table->string('approve',10);
			$table->string('warning',10);
			$table->string('row_creator');
			$table->string('row_updator');
			$table->integer('soft_delete');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pel_logbook_review');
	}

}
