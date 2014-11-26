@extends('template.default')

@section('content')
	<legend>Tambah Kategori</legend>
	{{Form::open(array('url'=>'kategori','method'=>'post','class'=>'form-horizontal','files'=>true))}}
		{{Bootstrap::horizontal('col-sm-4','col-sm-2')
			->text('nama','Nama Kategori','',$errors)}}

		{{Bootstrap::horizontal('col-sm-4','col-sm-2')
			->file('icon','Icon',$errors)}}

		<div class="well">
			<button class="btn btn-primary">
				<i class="glyphicon glyphicon-saved"></i>
				Simpan
			</button>

			<a href="{{URL::to('kategori')}}" class="btn btn-default">
				Kembali
			</a>
		</div>
	{{Form::close()}}
@stop