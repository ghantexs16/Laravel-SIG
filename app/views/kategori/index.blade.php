@extends('template.default')

@section('content')
	<a href="{{URL::to('kategori/create')}}" class="btn btn-primary">
		<i class="glyphicon glyphicon-plus"></i>
		Tambah Kategori
	</a>
	@if(Session::has('pesan'))
		{{Session::get('pesan')}}
	@endif

	<table class="table table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Kategori</th>
				<th>Icon</th>
				<th colspan="2"></th>
			</tr>
		</thead>
		<?php $no=0;?>
		@foreach($kategori as $row)
			<?php $no++;?>
			<tr>
				<td>{{$no}}</td>
				<td>{{$row->nm_kategori}}</td>
				<td>{{HTML::image('uploads/icon/'.$row->icon)}}</td>
				<td>
					<a href="{{URL::to('kategori/'.$row->id_kategori.'/edit')}}">
						<i class="glyphicon glyphicon-edit"></i>
					</a>
				</td>
				<td>
					<a href="#" class="hapus" kode="{{$row->id_kategori}}">
						<i class="glyphicon glyphicon-trash"></i>
					</a>
				</td>
			</tr>
		@endforeach
	</table>

	{{$kategori->links()}}

	<script>
    $(function(){
      $(".hapus").click(function(){
        var kode=$(this).attr("kode");

        $("#idhapus").val(kode);

        $("#myModal").modal("show");
      });

      $("#konfirmasi").click(function(){
        var kode=$("#idhapus").val();

        $.ajax({
          url:"{{URL::to('kategori/hapus')}}",
          type:"POST",
          data:"kode="+kode,
          cache:false,
          success:function(html){
            location.reload();
          }
        });
      });
    });
    </script>
@stop