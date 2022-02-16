<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <form action="/user/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="card mb-3">
                    <div class="card-header">
                        <h2 class="card-title">Form Tambah Data User</h2>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : '' ?>" id="fullname" name="fullname" autofocus value="<?= old('fullname'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('fullname'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desk" class="col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="username" name="username" value="<?= old('username'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desk" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="password" name="password" value="<?= old('password_hash'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desk" class="col-sm-4 col-form-label">Id Group</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="id_group" name="id_group" value="<?= old('id_group'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= old('jenis_kelamin'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desk" class="col-sm-4 col-form-label">Foto</label>
                            <div class="col-sm-4">
                                <img src="/img/user.png" class="img-thumbnail img-preview" alt="">
                            </div>
                            <div class="col-sm-4">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($validation->hasError('user_image')) ? 'is-invalid' : '' ?>" id="foto" name="foto" onchange="previewImg()">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('user_image'); ?>
                                    </div>
                                    <label class="custom-file-label" for="foto" name="foto">Pilih Foto</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desk" class="col-sm-4 col-form-label">NIP</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nip" name="nip" value="<?= old('nip'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desk" class="col-sm-4 col-form-label">Login At</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="login_at" name="login_at" value="<?= old('login_at'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desk" class="col-sm-4 col-form-label">Ip Client</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="ip_client" name="ip_client" value="<?= old('ip_client'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desk" class="col-sm-4 col-form-label">Created By</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="created_by" name="created_by" value="<?= old('created_by'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desk" class="col-sm-4 col-form-label">Isactive</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="isactive" name="isactive" value="<?= old('isactive'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desk" class="col-sm-4 col-form-label">Note</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="note" name="note" value="<?= old('note'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
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