<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Category Detail</h1>
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table>
                                <tr>
                                    <td>Field</td>
                                    <td>: <?= $category['field']; ?></td>
                                </tr>
                                <tr>
                                    <td>Val</td>
                                    <td>: <?= $category['val']; ?></td>
                                </tr>
                                <tr>
                                    <td>Isactive</td>
                                    <td>: <?= $category['isactive']; ?></td>
                                </tr>
                            </table>

                            <a href="/category/edit/<?= $category['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/category/<?= $category['id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Delete</button>
                            </form>

                            <div>
                                <a href="/category">Kembali ke daftar category</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>