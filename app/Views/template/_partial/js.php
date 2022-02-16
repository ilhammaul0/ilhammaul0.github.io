<!--   Core JS Files   -->
<script src="<?= base_url() ?>/template2/assets/js/core/popper.min.js"></script>
<script src="<?= base_url() ?>/template2/assets/js/core/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/template2/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?= base_url() ?>/template2/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="<?= base_url() ?>/template2/assets/js/plugins/chartjs.min.js"></script>
<script src="<?= base_url() ?>/template2/assets/vendor/daterangepicker/moment.min.js"></script>
<script src="<?= base_url() ?>/template2/assets/vendor/daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url() ?>/template2/assets/vendor/datatables/datatables.min.js"></script>

<script>
	var win = navigator.platform.indexOf('Win') > -1;
	if (win && document.querySelector('#sidenav-scrollbar')) {
		var options = {
			damping: '0.5'
		}
		Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
	}
</script>
<script>
	function previewImg() {
		const foto = document.querySelector('#foto');
		const fotoLabel = document.querySelector('.custom-file-label');
		const imgPreview = document.querySelector('.img-preview');

		fotoLabel.textContent = foto.files[0].name;

		const fileFoto = new FileReader();
		fileFoto.readAsDataURL(foto.files[0]);

		fileFoto.onload = function(e) {
			imgPreview.src = e.target.result;
		}
	}
</script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?= base_url() ?>/template2/assets/js/material-dashboard.min.js?v=3.0.0"></script>