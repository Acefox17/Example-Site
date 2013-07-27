<?php

use Illuminate\Database\Migrations\Migration;

class RenameExampleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::rename('example_objects','ex_objects');//first parameter is old name, second is new
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::rename('ex_objects','example_objects');	
	}

}