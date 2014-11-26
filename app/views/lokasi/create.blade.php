@extends('template.default')

@section('content')
	<legend>Tambah Lokasi</legend>
	{{Form::open(array('url'=>'lokasi','method'=>'post','class'=>'form-horizontal'))}}
		<div class="form-group">
			{{Form::label('kategori','Kategori',array('class'=>'col-sm-2 control-label'))}}
			<div class="col-sm-4">
				<select name="kategori" class="form-control">
					<option></option>
					@foreach($kategori as $row)
						<option value="{{$row->id_kategori}}">{{$row->nm_kategori}}</option>
					@endforeach
				</select>
			</div>
		</div>

		{{Bootstrap::horizontal('col-sm-4','col-sm-2')
			->text('nama','Nama Kategori','',$errors)}}

		{{Bootstrap::horizontal('col-sm-4','col-sm-2')
			->text('alamat','Alamat','',$errors)}}

		{{Bootstrap::horizontal('col-sm-4','col-sm-2')
			->text('kodepos','Kode Pos','',$errors)}}

		{{Bootstrap::horizontal('col-sm-4','col-sm-2')
			->text('telp','Telp','',$errors)}}

		{{Bootstrap::horizontal('col-sm-4','col-sm-2')
			->text('lat','Latitude','',$errors)}}

		{{Bootstrap::horizontal('col-sm-4','col-sm-2')
			->text('lng','Longtitude','',$errors)}}

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