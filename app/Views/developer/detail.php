<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Developer</h2>
            <div class="row">
                <div class="col-4">
                    <div class="card mb-3">
                        <img src="/img/<?= $developer['foto']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <table>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>: <?= $developer['fullname']; ?></td>
                                </tr>
                                <tr>
                                    <td>NIP</td>
                                    <td>: <?= $developer['nip']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>: <?= $developer['gender']; ?></td>
                                </tr>
                                <tr>
                                    <td>No HP</td>
                                    <td>: <?= $developer['hp']; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>: <?= $developer['email']; ?></td>
                                </tr>
                            </table>

                            <a href="/developer/edit/<?= $developer['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/developer/<?= $developer['slug']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Delete</button>
                            </form>

                            <div>
                                <a href="/developer">Kembali ke daftar developer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>