@extends('template.default')

@section('content')
	{{$map['js']}}
	{{$map['html']}}

	@foreach($kategori as $row)
		{{HTML::image('uploads/icon/'.$row->icon)}}
		<a href="{{URL::to('web/kategori/'.$row->id_kategori)}}">
			{{$row->nm_kategori}}
		</a>
	@endforeach
@stop