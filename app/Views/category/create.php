<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Form Tambah Data Category</h2>
            <form action="/category/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="form-group row <?= $this->extend('template/template'); ?>">
                            <label for="name" class="col-sm-4 col-form-label">Field</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control <?= ($validation->hasError('field')) ? 'is-invalid' : '' ?>" id="field" name="field" autofocus value="<?= old('field'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('field'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Val</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="val" name="val" value="<?= old('val'); ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Isactive</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="isactive" name="isactive" value="<?= old('isactive'); ?>">
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