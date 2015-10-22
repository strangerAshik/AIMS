<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiaFollowUp extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sia_follow_up', function(Blueprint $table)
		{
			$table->increments('id');			
			$table->string('sia_number');
			
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
		Schema::drop('sia_follow_up');
	}

}
