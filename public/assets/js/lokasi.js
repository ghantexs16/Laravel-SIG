
				$("#propinsi").click(function(){
					var propinsi=$("#propinsi").val();

					$.ajax({
						url:"<?php echo site_url('pendaftaran/get_kabupaten');?>",
						type:"POST",
						data:"propinsi="+propinsi,
						cache:false,
						success:function(html){
							$("#kabupaten").html(html);
						}
					});
				});

				$("#propinsi").change(function(){
					var propinsi=$("#propinsi").val();

					$.ajax({
						url:"<?php echo site_url('pendaftaran/get_kabupaten');?>",
						type:"POST",
						data:"propinsi="+propinsi,
						cache:false,
						success:function(html){
							$("#kabupaten").html(html);
						}
					});
				})

				$("#kabupaten").click(function(){
					var propinsi=$("#propinsi").val();
					var kabupaten=$("#kabupaten").val();

					$.ajax({
						url:"<?php echo site_url('pendaftaran/get_kecamatan');?>",
						type:"POST",
						data:"propinsi="+propinsi+"&kabupaten="+kabupaten,
						cache:false,
						success:function(html){
							$("#kecamatan").html(html);
						}
					});
				});

				$("#kabupaten").change(function(){
					var propinsi=$("#propinsi").val();
					var kabupaten=$("#kabupaten").val();

					$.ajax({
						url:"<?php echo site_url('pendaftaran/get_kecamatan');?>",
						type:"POST",
						data:"propinsi="+propinsi+"&kabupaten="+kabupaten,
						cache:false,
						success:function(html){
							$("#kecamatan").html(html);
						}
					});
				});

				$("#kecamatan").click(function(){
					var propinsi=$("#propinsi").val();
					var kabupaten=$("#kabupaten").val();
					var kecamatan=$("#kecamatan").val();

					$.ajax({
						url:"<?php echo site_url('pendaftaran/get_kelurahan');?>",
						type:"POST",
						data:"propinsi="+propinsi+"&kabupaten="+kabupaten+"&kecamatan="+kecamatan,
						cache:false,
						success:function(html){
							$("#kelurahan").html(html);
						}
					});
				})

				$("#kecamatan").change(function(){
					var propinsi=$("#propinsi").val();
					var kabupaten=$("#kabupaten").val();
					var kecamatan=$("#kecamatan").val();

					$.ajax({
						url:"<?php echo site_url('pendaftaran/get_kelurahan');?>",
						type:"POST",
						data:"propinsi="+propinsi+"&kabupaten="+kabupaten+"&kecamatan="+kecamatan,
						cache:false,
						success:function(html){
							$("#kelurahan").html(html);
						}
					});
				});