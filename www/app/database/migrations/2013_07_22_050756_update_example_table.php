<?php

use Illuminate\Database\Migrations\Migration;

class UpdateExampleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ex_objects', function($table)
		{
			$table->string('second_example_string')->unique();
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ex_objects',function($table)
		{
			$table->dropColumn('second_example_string');//can also be an array of column names
		});
	}

}