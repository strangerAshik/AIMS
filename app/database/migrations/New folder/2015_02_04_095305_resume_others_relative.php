<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResumeOthersRelative extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resume_othes_relative',function($table){
				//(parent, spouse, child, sibling, uncle/aunt, nephew/niece, cousin, in-laws, etc.)
			$table->increments('id');
			$table->integer('emp_id');
			$table->string('name');
			$table->string('designation');
			$table->string('unit');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resume_othes_relative');
	}

}
