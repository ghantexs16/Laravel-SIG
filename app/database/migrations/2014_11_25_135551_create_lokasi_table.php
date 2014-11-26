<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLokasiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lokasi', function(Blueprint $table)
		{
			$table->increments('id_lokasi');
			$table->integer('id_kategori')->unsigned();
			$table->string('nm_lokasi',45);
			$table->string('alamat',100);
			$table->string('kode_pos',5);
			$table->string('telp',15);
			$table->float('lat');
			$table->float('lng');
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
		Schema::drop('lokasi');
	}

}
