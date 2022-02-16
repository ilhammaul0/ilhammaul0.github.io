<!DOCTYPE html>
<html lang="en">

<head>
	<?= $this->include('template/_partial/head'); ?>
</head>

<body class="g-sidenav-show  bg-gray-200">

	<?= $this->include('template/_partial/aside') ?>

	<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
		<!-- Navbar -->
		<?= $this->include('template/_partial/navbar') ?>
		<!-- End Navbar -->
		<script src="<?= base_url() ?>/template2/assets/js/jquery.js"></script>
		<?= $this->renderSection('content'); ?>
	</main>

	
	<?= $this->include('template/_partial/js') ?>
</body>

</html>