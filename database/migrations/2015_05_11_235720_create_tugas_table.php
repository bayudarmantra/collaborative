<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTugasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tugas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('judul');
			$table->text('deskripsi');
			$table->string('kelas',10);
			$table->dateTime('pengumpulan');
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
		Schema::drop('tugas');
	}

}
