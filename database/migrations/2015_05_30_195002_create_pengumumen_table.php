<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengumumenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pengumuman', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('judul');
			$table->text('isi');
			$table->string('kodekelas',5);
			$table->string('creator',10);
			$table->date('waktuaktif');
			$table->boolean('status');
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
		Schema::drop('pengumumen');
	}

}
