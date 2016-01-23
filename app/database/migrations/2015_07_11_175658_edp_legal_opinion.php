<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EdpLegalOpinion extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('edp_legal_opinion', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('edp_number');
			
			$table->longText('legal_openion',700);
			
			$table->string('row_creator');
			$table->string('creator_emp_id');
			$table->string('row_updator');
			$table->string('updater_emp_id');
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
		Schema::drop('edp_legal_opinion');
	}

}
