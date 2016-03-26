<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('documents', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->string('table_name');
            $table->string('mother_id');
            $table->string('calling_id');
            $table->string('pdf_title');
            $table->string('pdf_name');
            $table->string('pdf_description');
            
            $table->string('creator');
            $table->string('updater');
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
		Schema::drop('documents');
	}

}
