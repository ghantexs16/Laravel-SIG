<?php
class WebController extends BaseController{
	public function index(){
		//return View::make('hello');
		$config = array();
		//pertama tentukan dulu koordinat daerah yang ingin anda tuju
	    $config['center'] = '-6.885177, 109.135567';
	    //sampai disini koordinat daerah


	    $config['zoom']="13";
		$config['map_type']="ROADMAP";
		$config['trafficOverlay']=true;
	    $config['onboundschanged'] = 'if (!centreGot) {
	            var mapCentre = map.getCenter();
	            marker_0.setOptions({
	                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
	            });
	        }
	        centreGot = true;';

	    Gmaps::initialize($config);

	    // set up the marker ready for positioning
	    // once we know the users location
	    $marker = array();
	    Gmaps::add_marker($marker);

	    $map = Gmaps::create_map();

	    $kategori=Kategori::all();

	    return View::make('web.index')
	    	->with('map',$map)
	    	->with('kategori',$kategori);
	}

	public function kategori($id){
		$kategori=Kategori::all();
		$koordinat=DB::Table('lokasi')->where('lokasi.id_kategori','=',$id)
		->join('kategori','kategori.id_kategori','=','lokasi.id_kategori')
		->get();

		$config['center']="-6.885177, 109.135567";
		$config['zoom']="13";
		$config['map_type']="ROADMAP";
		$config['trafficOverlay']=true;

		Gmaps::initialize($config);

		foreach($koordinat as $row){
			$marker=array();
			$marker['icon']=URL::to('uploads/icon/'.$row->icon);
			$marker['infowindow_content']=$row->nm_lokasi."<hr><strong>Alamat : ".$row->alamat.
			"<br><strong>Kode Pos : </strong>".$row->kode_pos.
			"<br><strong>Telp : </strong>".$row->telp;
			$marker['position']=$row->lat.','.$row->lng;
			$marker['animation'] = 'DROP';
			Gmaps::add_marker($marker);
		}

		$map=Gmaps::create_map();

		return View::make('web.index')
	    	->with('map',$map)
	    	->with('kategori',$kategori);
	}
}