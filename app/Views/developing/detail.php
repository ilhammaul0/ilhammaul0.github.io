<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container ">
    <h1 class="h3 mb-4 text-gray-800">Developing Detail</h1>
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table>
                                <tr>
                                    <td>ID Developer</td>
                                    <td>: <?= $developing['id_developer']; ?></td>
                                </tr>
                                <tr>
                                    <td>ID Aplikasi</td>
                                    <td>: <?= $developing['id_aplikasi']; ?></td>
                                </tr>
                            </table>

                            <a href="/developing/edit/<?= $developing['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/developing/<?= $developing['id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Delete</button>
                            </form>

                            <div>
                                <a href="/developing">Kembali ke daftar developing</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>