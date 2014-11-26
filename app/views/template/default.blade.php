<!DOCTYPE>
<html>
	<head>
		<title>Tegal Maps</title>
		{{Bootstrap::css('local', ['type' => 'text/css'])}}
		{{Bootstrap::js('local', ['type' => 'text/javascript'])}}
	</head>
	<body>
		@include('template.header')

		<div class="container">
			@yield('content')
		</div>

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title">Konfirmasi</h4>
		      </div>
		      <div class="modal-body">
		        <p>Apakah anda yakin ingin menghapus data ini??</p>
		        <input type="hidden" id="idhapus">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</body>
</html>