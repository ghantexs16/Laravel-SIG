<?php
class KategoriSeeder extends Seeder{
	public function run(){
		DB::table('kategori')->delete();

		$isi=array(
			array(
				'nm_kategori'=>'Sekolah',
				'icon'=>'sekolah.png'
			),
			array(
				'nm_kategori'=>'Bank',
				'icon'=>'bank.png'
			),
			array(
				'nm_kategori'=>'Restoran',
				'icon'=>'restoran.png'
			)
		);

		DB::table('kategori')->insert($isi);
	}
}