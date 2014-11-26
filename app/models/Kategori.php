<?php
class Kategori extends Eloquent{
	protected $table="kategori";
	protected $primaryKey="id_kategori";

	static $rules=[
		'nama'=>'required',
		'icon'=>'image|max:2048'
	];

	static $pesan=[
		'nama.required'=>'Nama Kategori Harus diis',
		'icon.required'=>'Icon harus diisi'
	];

	public function lokasi(){
		return $this->hasOne('lokasi','id_kategori');
	}
}