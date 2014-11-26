<?php

class KategoriController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$kategori=Kategori::paginate(8);

		return View::make('kategori.index')
			->with('kategori',$kategori);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('kategori.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input=Input::all();

		$validasi=Validator::make($input,Kategori::$rules,Kategori::$pesan);

		if($validasi->fails()){
			return Redirect::back()
				->withInput()
				->withErrors($validasi);
		}else{
			$kategori=new Kategori;
			$kategori->nm_kategori=Input::get('nama');

			if(Input::hasFile('icon')){
				$file=Input::file('icon');
				$filename=str_random(5).'-'.$file->getClientOriginalName();
				$destinationPath='uploads/icon/';
				$file->move($destinationPath,$filename);
				$kategori->icon=$filename;
			}

			$kategori->save();

			Session::flash('pesan',"<hr><div class='alert alert-info'>
				Data Berhasil disimpan</div>");

			return Redirect::to('kategori');
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
		$kategori=Kategori::find($id);
		return View::make('kategori.edit')
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
		$validasi=Validator::make(Input::all(),Kategori::$rules,Kategori::$pesan);

		if($validasi->fails()){
			return Redirect::back()
				->withErrors($validasi)
				->withInput();
		}else{
			$kategori=Kategori::find($id);
			$kategori->nm_kategori=Input::get('nama');

			if(Input::hasFile('icon')){
				$file=Input::file('icon');
				$filename=str_random(5).'-'.$file->getClientOriginalName();
				$destinationPath='uploads/icon/';
				$file->move($destinationPath,$filename);


				if($kategori->icon){
					$fotolama=$kategori->icon;
					$filepath=public_path().DIRECTORY_SEPARATOR.'uploads/icon'.DIRECTORY_SEPARATOR.$kategori->icon;

					try{
						File::delete($filepath);
					}catch(FileNotFoundException $e){

					}
				}

				$kategori->icon=$filename;
			}

			$kategori->save();

			Session::flash('pesan',"<hr><div class='alert alert-info'>
			Data Berhasil diupdate</div>");

			return Redirect::to('kategori');
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

	}

	public function hapus(){
		if(Request::ajax()){
			$kode=Input::get('kode');

			$cek=DB::table('lokasi')->where('id_kategori','=',$kode)
				->count();

			if($cek>0){
				$html="Data Kategori tidak dapat dihapus karena masih memiliki Lokasi :";
				$html.="<ul>";
				$lokasi=DB::table('lokasi')->where('id_kategori','=',$kode)->get();
				foreach($lokasi as $row){
					$html.="<li>$row->nm_lokasi</li>";
				}
				$html.="</ul>";
				Session::flash('pesan',"<hr><div class='alert alert-danger'>".$html."</div>");
			}else{
				$kategori=Kategori::find($kode);

				if($kategori->icon){
					$fotolama=$kategori->icon;
					$filepath=public_path().DIRECTORY_SEPARATOR.'uploads/icon'.DIRECTORY_SEPARATOR.$kategori->icon;

					try{
						File::delete($filepath);
					}catch(FileNotFoundException $e){

					}
				}

				$kategori->delete();

				Session::flash('pesan',"<hr><div class='alert alert-info'>
					Data Berhasil dihapus</div>");
			}
		}
	}


}
