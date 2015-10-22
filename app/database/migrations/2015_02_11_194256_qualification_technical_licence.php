<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QualificationTechnicalLicence extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qualification_technical_licence',function($table){
			//language
			$table->increments('id');
			$table->integer('emp_id');
			$table->string('active');
			$table->string('licence_no');
			$table->string('licence_type');
			$table->string('issue_date');
			$table->string('issue_month');
			$table->string('issue_year');
			$table->string('expiration_date');
			$table->string('expiration_month');
			$table->string('expiration_year');
			$table->string('rating');
			$table->string('verify',10);
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
		Schema::drop('qualification_technical_licence');
	}

}
