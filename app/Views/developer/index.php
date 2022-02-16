<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Developer List</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="text-end me-3">
                        <a href="/developer/create" class="btn btn-primary">Tambah Developer</a>
                    </div>
                    <div class="title mt-2 mb-2 mx-2">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-warning" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="table-responsive mx-2">
                        <table class="table table-hover align-items-center mb-0" id="datatable">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">No</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Nama Lengkap</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">NIP</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Jenis Kelamin</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Foto</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Catatan</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">No HP</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Email</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                            <?php foreach ($developer as $d) : ?>
                                <tr>
                                    <td class="text-center font-weight-bolder opacity-10" scope="row"><?= $i++; ?></td>
                                    <td class="text-center font-weight-bolder opacity-10"><?= $d['fullname']; ?></td>
                                    <td class="text-center font-weight-bolder opacity-10"><?= $d['nip']; ?></td>
                                    <td class="text-center font-weight-bolder opacity-10"><?= $d['gender']; ?></td>
                                    <td class="text-center font-weight-bolder opacity-10"><img src="/img/<?= $d['foto']; ?>" alt="" class="foto img-thumbnail"></td>
                                    <td class="text-center font-weight-bolder opacity-10"><?= $d['note']; ?></td>
                                    <td class="text-center font-weight-bolder opacity-10"><?= $d['hp']; ?></td>
                                    <td class="text-center font-weight-bolder opacity-10"><?= $d['email']; ?></td>
                                    <td class="text-center font-weight-bolder opacity-10">
                                        <a href="/developer/<?= $d['slug']; ?>" class="btn btn-info mt-3">Detail</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	$(document).ready( function () {
		$('#datatable').DataTable({
			language: {
				"paginate": {
					"first":      "&laquo",
					"last":       "&raquo",
					"next":       "&gt",
					"previous":   "&lt"
				},
			},
			dom:' <"d-flex"l<"input-group input-group-outline justify-content-end me-2"f>>rt<"d-flex justify-content-between"ip><"clear">'
		});
	} );
</script>
<?= $this->endSection(); ?>