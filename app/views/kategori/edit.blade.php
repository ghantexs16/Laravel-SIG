@extends('template.default')

@section('content')
	<legend>Edit Kategori # {{$kategori->nm_kategori}}</legend>

	{{Form::model($kategori,array('url'=>route('kategori.update',['kategori'=>$kategori->id_kategori]),'method'=>'PUT','class'=>'form-horizontal','files'=>'true'))}}

		{{Bootstrap::horizontal('col-sm-4','col-sm-2')
			->text('nama','Nama Kategori',$kategori->nm_kategori,$errors)}}

		<div class="form-group">
			{{Form::label('icon','Icon',array('class'=>'col-sm-2 control-label'))}} 
			<div class="col-sm-4">
				{{HTML::image('uploads/icon/'.$kategori->icon,'',array('style'=>'width:100px'))}} 
			</div>
		</div>

		{{Bootstrap::horizontal('col-sm-4','col-sm-2')
			->file('icon',' ',$errors)}}

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