<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Developing List</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="text-end me-3">
                        <a href="/developing/create" class="btn btn-primary">Tambah Developing</a>
                    </div>
                    <div class="title mt-2 mb-2 mx-3">
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
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="15" scope="col">No</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Id Developer</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" scope="col">Id Aplikasi</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="15" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                                <?php foreach ($developing as $de) : ?>
                                    <tr>
                                        <th class="text-center font-weight-bolder opacity-10" scope="row"><?= $i++; ?></th>
                                        <td class="text-center font-weight-bolder opacity-10" scope="row"><?= $de['id_developer']; ?></td>
                                        <td class="text-center font-weight-bolder opacity-10" scope="row"><?= $de['id_aplikasi']; ?></td>
                                        <td class="text-center font-weight-bolder opacity-10" scope="row">
                                            <a href="/developing/<?= $de['slug']; ?>" class="btn btn-info mt-3">Detail</a>
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