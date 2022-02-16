<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">App Detail</h1>
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table>
                                <tr>
                                    <td>Nama App</td>
                                    <td>: <?= $app['name_app']; ?></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>: <?= $app['desc_app']; ?></td>
                                </tr>
                                <tr>
                                    <td>Ordered By</td>
                                    <td>: <?= $app['ordered_by']; ?></td>
                                </tr>
                                <tr>
                                    <td>IP Server</td>
                                    <td>: <?= $app['ip_server']; ?></td>
                                </tr>
                                <tr>
                                    <td>Start Developed</td>
                                    <td>: <?= $app['start_developed']; ?></td>
                                </tr>
                                <tr>
                                    <td>End Developed</td>
                                    <td>: <?= $app['end_developed']; ?></td>
                                </tr>
                                <tr>
                                    <td>Live At</td>
                                    <td>: <?= $app['live_at']; ?></td>
                                </tr>
                                <tr>
                                    <td>Created At</td>
                                    <td>: <?= $app['created_at']; ?></td>
                                </tr>
                                <tr>
                                    <td>Updated At</td>
                                    <td>: <?= $app['updated_at']; ?></td>
                                </tr>
                            </table>

                            <a href="/app/edit/<?= $app['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/app/<?= $app['id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Delete</button>
                            </form>

                            <div>
                                <a href="/app">Kembali ke daftar app</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>