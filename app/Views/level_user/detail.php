<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3>Detail Level User</h3>
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <table>
                                <tr>
                                    <td>Group Name</td>
                                    <td>: <?= $auth_groups['name']; ?></td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>: <?= $auth_groups['description']; ?></td>
                                </tr>
                            </table>

                            <a href="/level_user/edit/<?= $auth_groups['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/level_user/<?= $auth_groups['id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Delete</button>
                            </form>

                            <div>
                                <a href="/level_user">Kembali ke daftar level user</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>