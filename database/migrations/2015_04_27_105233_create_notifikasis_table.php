<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifikasisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifikasi', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('tipe');
			$table->integer('sender');
			$table->integer('recepient');
			$table->text('messageData');
			$table->boolean('read');
			$table->boolean('accept');
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
		Schema::drop('notifikasi');
	}

}
