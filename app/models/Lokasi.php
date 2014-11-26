<?php
class Lokasi Extends Eloquent{
	protected $table="lokasi";
	protected $primaryKey="id_lokasi";

	static $rules=[
		'kategori'=>'required',
		'nama'=>'required',
		'alamat'=>'required',
		'kodepos'=>'required',
		'telp'=>'required',
		'lat'=>'required',
		'lng'=>'required'
	];

	static $pesan=[
		'kategori.required'=>'Kategori harus diisi',
		'nama.required'=>'Nama harus diisi',
		'alamat.required'=>'Alamat harus diisi',
		'kodepos.required'=>'Kode pos harus diisi',
		'telp.required'=>'Telp harus diisi',
		'lat.required'=>'Latitude harus diisi',
		'lng.required'=>'Longtitude harus diisi'
	];

	public function kategori(){
		return $this->belongsTo('Kategori','id_kategori');
	}
}