<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">User Detail</h1>
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img class="card-img-top" src="<?= base_url('/img/' . $user->foto); ?>" alt="<?= $user->username; ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4><?= $user->username; ?></h4>
                                </li>
                                <?php if ($user->fullname) : ?>
                                    <li class="list-group-item"><?= $user->fullname; ?></li>
                                <?php endif; ?>
                                <li class="list-group-item"><?= $user->email; ?></li>
                                <li class="list-group-item">
                                    <?= $user->name; ?>
                                </li>
                                <!-- <li class="list-group-item">
                                    <small><a href="<?= base_url('admin'); ?>">&laquo; back to user list</a></small>
                                </li> -->
                            </ul>

                            <a href="/admin/edit/<?= $user->userid; ?>" class="btn btn-warning">Edit</a>

                            <form action="/admin/<?= $user->userid; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Delete</button>
                            </form>

                            <div>
                                <a href="/admin">Kembali ke list user</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>