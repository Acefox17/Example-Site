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
			$table->integer('second_example_integer')->unsigned();
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
			$table->dropColumn('second_example_integer');//parameter can also be an array of column names
		});
	}

}