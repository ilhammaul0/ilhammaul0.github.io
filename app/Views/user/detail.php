<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <!-- <h2 class="mt-2">Detail User</h2> -->
            <div class="row">
                <div class="col-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Detail User</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <img src="/img/<?= $user['user_image']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <table>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>: <?= $users['fullname']; ?></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>: <?= $users['username']; ?></td>
                                </tr>
                                <tr>
                                    <td>NIP</td>
                                    <td>: <?= $users['nip']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>: <?= $users['gender']; ?></td>
                                </tr>
                                <tr>
                                    <td>Login At</td>
                                    <td>: <?= $users['login_at']; ?></td>
                                </tr>
                                <tr>
                                    <td>IP Client</td>
                                    <td>: <?= $users['ip_client']; ?></td>
                                </tr>
                                <tr>
                                    <td>Created By</td>
                                    <td>: <?= $users['created_by']; ?></td>
                                </tr>
                                <tr>
                                    <td>Isactive</td>
                                    <td>: <?= $users['isactive']; ?></td>
                                </tr>
                            </table>

                            <a href="/user/edit/<?= $users['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/user/<?= $users['id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Delete</button>
                            </form>

                            <div>
                                <a href="/user">Kembali ke daftar user</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>