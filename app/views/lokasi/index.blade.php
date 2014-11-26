@extends('template.default')

@section('content')
	<legend>Data Lokasi</legend>
	<a href="{{URL::to('lokasi/create')}}" class="btn btn-primary">
		<i class="glyphicon glyphicon-plus"></i>
		Tambah Lokasi
	</a>

	@if(Session::has('pesan'))
		{{Session::get('pesan')}}
	@endif

	<table class="table table-striped">
		<thead>
			<tr>
				<th>No.</th>
				<th>Kategori</th>
				<th>Nama Lokasi</th>
				<th>Alamat</th>
				<th>Kode Pos</th>
				<th>Telp</th>
				<th>Lat</th>
				<th>Lng</th>
				<th colspan="2"></th>
			</tr>
		</thead>
		<?php $no=0;?>
		@foreach($lokasi as $row)
			<?php $no++;?>
			<tr>
				<td>{{$no}}</td>
				<td>{{$row->kategori->nm_kategori}}</td>
				<td>{{$row->nm_lokasi}}</td>
				<td>{{$row->alamat}}</td>
				<td>{{$row->kode_pos}}</td>
				<td>{{$row->telp}}</td>
				<td>{{$row->lat}}</td>
				<td>{{$row->lng}}</td>
				<td>
					<a href="{{URL::to('lokasi/'.$row->id_lokasi.'/edit')}}">
						<i class="glyphicon glyphicon-edit"></i>
					</a>
				</td>
				<td>
					<a href="#" class="hapus" kode="{{$row->id_lokasi}}">
						<i class="glyphicon glyphicon-trash"></i>
					</a>
				</td>
			</tr>
		@endforeach
	</table>

	{{$lokasi->links()}}

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
          url:"{{URL::to('lokasi/hapus')}}",
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