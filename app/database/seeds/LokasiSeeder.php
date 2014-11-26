<?php
class LokasiSeeder extends Seeder{
	public function run(){
		DB::table('lokasi')->delete();

		$isi=array(
			array(
				'id_kategori'=>1,
				'nm_lokasi'=>'SMK N 1 Tegal',
				'alamat'=>'Jl. Kol Sugiono',
				'kode_pos'=>'34532',
				'telp'=>'08434323422',
				'lat'=>'-6.869285',
				'lng'=>'109.123486'
			),
			array(
				'id_kategori'=>2,
				'nm_lokasi'=>'Bank Mandiri Tegal',
				'alamat'=>'Jl. Jend. Sudirman',
				'kode_pos'=>'87745',
				'telp'=>'0283 234234',
				'lat'=>'-6.871628',
				'lng'=>'109.136715'
			),
			array(
				'id_kategori'=>3,
				'nm_lokasi'=>'Mardiyah Coffe',
				'alamat'=>'Jl. Hos. Cokro Aminoto',
				'kode_pos'=>'235644',
				'telp'=>'0283 876343',
				'lat'=>'-6.866654',
				'lng'=>'109.136736'
			)
		);

		DB::table('lokasi')->insert($isi);
	}
}