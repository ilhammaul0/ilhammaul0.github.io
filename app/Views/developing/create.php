<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Form Tambah Data Developing</h2>
            <form action="/developing/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="form-group row input-group input-group-outline">
                            <label for="name" class="col-sm-4 col-form-label">Id Developer</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control <?= ($validation->hasError('id_developer')) ? 'is-invalid' : '' ?>" id="id_developer" name="id_developer" autofocus value="<?= old('id_developer'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('id_developer'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Id Aplikasi</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="id_aplikasi" name="id_aplikasi" value="<?= old('id_aplikasi'); ?>">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>