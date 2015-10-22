<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ScFollowUp extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sc_follow_up',function($table){
			$table->increments('id');			
			$table->string('safety_issue_number');
			
			$table->string('image');
			$table->string('user_name');
			$table->string('user_id');
			$table->string('follow_up');
			$table->string('follow_up_file');
			$table->string('chat_time');
			
			
			$table->string('row_creator');
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
		Schema::drop('sc_follow_up');
	}

}
