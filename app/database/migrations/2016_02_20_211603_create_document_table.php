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
			
			$table->string('title',1000);
			$table->string('table_name');
            $table->string('mother_id');
            $table->string('calling_id');
            $table->string('field_name');
            $table->string('doc_type');
            $table->string('doc_name');
            $table->string('doc_description');
            
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
