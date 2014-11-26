@extends('template.default')

@section('content')
	<legend>Edit Lokasi # {{$lokasi->nm_lokasi}}</legend>
	{{Form::model($lokasi,array('url'=>route('lokasi.update',['lokasi'=>$lokasi->id_lokasi]),'method'=>'PUT','class'=>'form-horizontal','files'=>'true'))}}

		<div class="form-group">
			{{Form::label('kategori','Kategori',array('class'=>'col-sm-2 control-label'))}}
			<div class="col-sm-4">
				<select name="kategori" class="form-control">
					<option value="{{$lokasi->id_kategori}}">{{$lokasi->kategori->nm_kategori}}</option>
					@foreach($kategori as $row)
						<option value="{{$row->id_kategori}}">{{$row->nm_kategori}}</option>
					@endforeach
				</select>
			</div>
		</div>

		{{Bootstrap::horizontal('col-sm-4','col-sm-2')
			->text('nama','Nama Kategori',$lokasi->nm_lokasi,$errors)}}

		{{Bootstrap::horizontal('col-sm-4','col-sm-2')
			->text('alamat','Alamat',$lokasi->alamat,$errors)}}

		{{Bootstrap::horizontal('col-sm-4','col-sm-2')
			->text('kodepos','Kode Pos',$lokasi->kode_pos,$errors)}}

		{{Bootstrap::horizontal('col-sm-4','col-sm-2')
			->text('telp','Telp',$lokasi->telp,$errors)}}

		{{Bootstrap::horizontal('col-sm-4','col-sm-2')
			->text('lat','Latitude',$lokasi->lat,$errors)}}

		{{Bootstrap::horizontal('col-sm-4','col-sm-2')
			->text('lng','Longtitude',$lokasi->lng,$errors)}}

		<div class="well">
			<button class="btn btn-primary">
				<i class="glyphicon glyphicon-saved"></i>
				Simpan
			</button>

			<a href="{{URL::to('lokasi')}}" class="btn btn-default">
				Kembali
			</a>
		</div>
	{{Form::close()}}
@stop