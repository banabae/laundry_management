<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $tajuk ?></title>
	<!-- <link href="<?= site_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet"> -->
	<!-- <link href="<?= site_url('assets/') ?>css/sb-admin-2.css" rel="stylesheet"> -->
	<link href="<?= site_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= site_url('assets/') ?>css/font-awesome.min.css" rel="stylesheet">
	<link href="<?= site_url('assets/') ?>css/datepicker3.css" rel="stylesheet">
	<link href="<?= site_url('assets/') ?>css/styles.css" rel="stylesheet">
	<link href="<?= site_url('assets/') ?>custom_css/style.css" rel="stylesheet">
	<link href="<?= site_url('assets/') ?>js/jquery-ui/jquery-ui.css" rel="stylesheet">
	<link href="<?= site_url('node_modules/sweetalert2/dist/sweetalert2.min.css') ?>" rel="stylesheet">
	<!-- <link href="<?= site_url('node_modules/sweetalert2/dist/sweetalert2.min.js') ?>" rel="stylesheet"> -->
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	
</head>
<body>
	<!-- topbar -->
	<?= $topbar ?>
	<!-- end topbar -->

	<!-- sidebar -->
	<?= $sidebar ?>
	<!--end sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

		<?= $content ?>
		<!-- end main content -->
		<div class="row">
			<div class="col-sm-12">
				<p class="back-link">This Application created by <a href="#">Sabana Nur Rizki Hermawan</a></p>
			</div>
		</div>
	</div>	<!--/.main-->

<!-- 	<a class="btn scroll-to-top rounded" href="#page-top">
	   <i class="glyphicon glyphicon-arrow-up"></i>
	</a> -->

	<!-- modal logout -->
	<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content center-block">
	      <div class="modal-body">
	        <h3 class="text-center">Yakin mau Keluar?</h3>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
	        <a href="<?= site_url('Logout') ?>" class="btn btn-danger">Keluar</a>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- end modal -->
	
	<script src="<?= site_url('assets/') ?>js/jquery-3.1.0.min.js"></script>
	<script src="<?= site_url('assets/') ?>js/jquery-1.11.1.min.js"></script>
	<script src="<?= site_url('assets/') ?>js/jquery-ui/jquery-ui.js"></script>
	<!-- <script src="<?= site_url('assets/') ?>js/sb-admin-2.min.js"></script> -->
	<script src="<?= site_url('assets/') ?>js/bootstrap.min.js"></script>
	<script src="<?= site_url('assets/') ?>js/chart.min.js"></script>
	<script src="<?= site_url('assets/') ?>js/chart-data.js"></script>
	<script src="<?= site_url('assets/') ?>js/easypiechart.js"></script>
	<script src="<?= site_url('assets/') ?>js/easypiechart-data.js"></script>
	<script src="<?= site_url('assets/') ?>js/bootstrap-datepicker.js"></script>
	<script src="<?= site_url('assets/') ?>js/custom.js"></script>
	<script src="<?= site_url('assets/') ?>custom_js/alert.js"></script>
	<script src="<?= site_url('assets/') ?>custom_js/waktu_realtime.js"></script>
	<script src="<?= site_url('node_modules/sweetalert2/dist/sweetalert2.min.js') ?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			if ($('[name="role"]').val() == "admin") {
				var member      = "<?php echo site_url('Admin/Transaksi/getAutoCompleteMember/?');?>";
			} else {
				var member      = "<?php echo site_url('Kasir/Transaksi/getAutoCompleteMember/?');?>";
			}
			// autocomplete member
			$("#member").autocomplete({
				source: member,
				select: function (event, ui) {
					$('[name="id_member"]').val(ui.item.label);
					$('[name="nama_member"]').val(ui.item.nama_member);
					$('[name="tlp_member"]').val(ui.item.tlp_member);
					$('[name="alamat_member"]').val(ui.item.alamat_member);
				}
			});
			// console.log(member);
		});
		function dis() {
			if ($('[name="role"]').val() == "admin") {
				var diskonUrl      = "<?php echo site_url('Admin/Transaksi/getHargaAfterDiskon/?');?>";
			} else {
				var diskonUrl      = "<?php echo site_url('Kasir/Transaksi/getHargaAfterDiskon/?');?>";
			}
			var diskon = $("#diskon").val();
			$.ajax({
				url: diskonUrl,
				data: "diskon="+diskon,
			}).success(function (data) {
				var json = data,
				obj = JSON.parse(json);
				// console.log(obj[0]);
				var numb = obj[0].toFixed(0);
				var hasil = Math.round(numb / 500) * 500;
				var final = hasil;
				// var final = "Rp"+hasil+",00";
				$('[name="hargaAfterDiskon"]').val(final);
				$('[name="totalKeseluruhan"]').val(final);
				// $('#biayaTambahan').val(0);
				console.log(final);
			});
		}
		function biayaPlesPles() {
			var bt = $("#biayaTambahan").val();
			var had = $("#hargaAfterDiskon").val();
			if (bt != false) {
				var final = parseInt(had) + parseInt(bt);
			} else {
				var final = parseInt(had);
			}
			$('[name="totalKeseluruhan"]').val(final);
			console.log(final);
		}
		function bayarLangsung() {
			var b = $("#bayar").val();
			var tk = $("#totalKeseluruhan").val();
			if (b != false) {
				var final = parseInt(b) - parseInt(tk);
				if ( final < 0 ) {
					$('[name="kembalian"]').val("-");
				} else {
					$('[name="kembalian"]').val(final);
				}
			} else {
				var final = parseInt(tk);
			}
			console.log(final);
		}
		function save(save_method) {
			var url;
			if ($('[name="role"]').val() == "admin") {
				if (save_method == 1) {
					url = "<?php echo site_url('Admin/Transaksi/bayar') ?>";
				} else {
					url = "<?php echo site_url('Admin/Transaksi/bayarNanti') ?>";
				}
			} else {
				if (save_method == 1) {
					url = "<?php echo site_url('Kasir/Transaksi/bayar') ?>";
				} else {
					url = "<?php echo site_url('Kasir/Transaksi/bayarNanti') ?>";
				}
			}
			var formData = new FormData($('#form')[0]);
			console.log(formData);
			$.ajax({
				url : url,
		        type: "POST",
		        data: formData,
		        contentType: false,
		        processData: false,
		        dataType: "JSON",
		        success: function(data){
					console.log(data);
					if (data.status) {
						$('#msg').val("Transaksi Berhasil!");
						console.log('test');

					} else {
						$('#msg').val("Transaksi Gagal!");
						console.log('test2');
					}		
				},
				error : function(jqXHR, textStatus, errorThrown) {
					// body...
					// console.log(textStatus);
					console.log(errorThrown);
				}
			});
		}
	</script>
</body>
</html>