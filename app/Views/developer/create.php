<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="card-title">Form Tambah Data Developer</h2>
            <form action="/developer/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="form-group row input-group input-group-outline">
                            <label for="name" class="col-sm-4 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : '' ?>" id="fullname" name="fullname" autofocus value="<?= old('fullname'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('fullname'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">NIP</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nip" name="nip" value="<?= old('nip'); ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="gender" name="gender" value="<?= old('gender'); ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-12 col-form-label">Foto</label>
                            <div class="col-sm-4">
                                <img src="/img/user.png" class="img-thumbnail img-preview" alt="">
                            </div>
                            <div class="col-sm-4">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : '' ?>" id="foto" name="foto" onchange="previewImg()">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('foto'); ?>
                                    </div>
                                    <label class="custom-file-label input-group input-group-outline" for="foto" name="foto"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Dibuat Oleh</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="created_by" name="created_by" value="<?= old('created_by'); ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Isactive</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="isactive" name="isactive" value="<?= old('isactive'); ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Note</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="note" name="note" value="<?= old('note'); ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">No HP</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="hp" name="hp" value="<?= old('hp'); ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="email" name="email" value="<?= old('email'); ?>">
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