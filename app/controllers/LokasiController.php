<?php

class LokasiController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lokasi=Lokasi::paginate(8);

		return View::make('lokasi.index')	
			->with('lokasi',$lokasi);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$kategori=Kategori::all();

		return View::make('lokasi.create')
			->with('kategori',$kategori);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validasi=Validator::make(Input::all(),Lokasi::$rules,Lokasi::$pesan);

		if($validasi->fails()){
			return Redirect::back()
				->withInput()
				->withErrors($validasi);
		}else{
			$lokasi=new Lokasi;
			$lokasi->id_kategori=Input::get('kategori');
			$lokasi->nm_lokasi=Input::get('nama');
			$lokasi->alamat=Input::get('alamat');
			$lokasi->kode_pos=Input::get('kodepos');
			$lokasi->telp=Input::get('telp');
			$lokasi->lat=Input::get('lat');
			$lokasi->lng=Input::get('lng');

			$lokasi->save();

			Session::flash('pesan',"<hr><div class='alert alert-info'>
				Data Berhasil disimpan</div>");

			return Redirect::to('lokasi');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$lokasi=Lokasi::find($id);
		$kategori=Kategori::all();

		return View::make('lokasi.edit')
			->with('lokasi',$lokasi)
			->with('kategori',$kategori);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validasi=Validator::make(Input::all(),Lokasi::$rules,Lokasi::$pesan);

		if($validasi->fails()){
			return Redirect::back()
				->withInput()
				->withErrors($validasi);
		}else{
			$lokasi=Lokasi::find($id);
			$lokasi->id_kategori=Input::get('kategori');
			$lokasi->nm_lokasi=Input::get('nama');
			$lokasi->alamat=Input::get('alamat');
			$lokasi->kode_pos=Input::get('kodepos');
			$lokasi->telp=Input::get('telp');
			$lokasi->lat=Input::get('lat');
			$lokasi->lng=Input::get('lng');

			$lokasi->save();

			Session::flash('pesan',"<hr><div class='alert alert-info'>
				Data Berhasil diupdate</div>");

			return Redirect::to('lokasi');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function hapus(){
		if(Request::ajax()){
			$kode=Input::get('kode');

			Lokasi::find($kode)->delete();

			Session::flash('pesan',"<hr><div class='alert alert-info'>
				Data Berhasil dihapus</div>");
		}
	}


}
