<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Form Ubah Data User</h2>
            <?php foreach ($admins as $admin) : ?>
                <form action="/admin/update/<?= $admin['userid']; ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="card mb-3">
                        <input type="hidden" name="slug" value="<?= $admin['slug']; ?>">
                        <input type="hidden" name="fotoLama" value="<?= $admin['foto']; ?>">
                        <div class="card-body">
                            <div class="form-group row input-group input-group-outline">
                                <label for="name" class="col-sm-4 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : '' ?>" id="fullname" name="fullname" autofocus value="<?= old('fullname') ? old('fullname') : $admin['fullname']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('fullname'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row input-group input-group-outline">
                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="email" name="email" value="<?= old('email') ? old('email') : $admin['email']; ?>">
                                </div>
                            </div>
                            <div class="form-group row input-group input-group-outline">
                                <label for="username" class="col-sm-4 col-form-label">Username</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="username" name="username" value="<?= old('username') ? old('username') : $admin['username']; ?>">
                                </div>
                            </div>
                            <div class="form-group row input-group input-group-outline">
                                <input type="hidden" name="level_id" value="<?= $admin['authgroupid']; ?>">
                                <label for="role" class="col-sm-4 col-form-label">Role</label>
                                <div class="custom-control custom-radio ml-2">
                                    <input <?= $admin['group_id'] == 1 ? 'checked' : '' ?> class="custom-control-input" type="radio" id="customRadio1" value="1" name="level">
                                    <label for="customRadio1" class="custom-control-label">Admin</label>
                                </div>
                                <div class="custom-control custom-radio ml-2">
                                    <input <?= $admin['group_id'] == 2 ? 'checked' : '' ?> class="custom-control-input" type="radio" id="customRadio2" value="2" name="level">
                                    <label for="customRadio2" class="custom-control-label">User</label>
                                </div>
                            </div>
                            <div class="form-group row input-group input-group-outline">
                                <label for="desk" class="col-sm-4 col-form-label">NIP</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nip" name="nip" value="<?= old('nip') ? old('nip') : $admin['nip']; ?>">
                                </div>
                            </div>
                            <div class="form-group row input-group input-group-outline">
                                <label for="desk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="gender" name="gender" value="<?= old('gender') ? old('gender') : $admin['gender']; ?>">
                                </div>
                            </div>
                            <div class="form-group row input-group input-group-outline">
                                <label for="desk" class="col-sm-12 col-form-label">Foto</label>
                                <div class="col-sm-4">
                                    <img src="/img/<?= $admin['foto']; ?>" class="img-thumbnail img-preview" alt="">
                                </div>
                                <div class="col-sm-2">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : '' ?>" id="foto" name="foto" onchange="previewImg()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('foto'); ?>
                                        </div>
                                        <label class="custom-file-label" for="foto" name="foto"><?= $admin['foto']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row input-group input-group-outline">
                                <label for="desk" class="col-sm-4 col-form-label">Dibuat Oleh</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="created_by" name="created_by" value="<?= old('created_by') ? old('created_by') : $admin['created_by']; ?>">
                                </div>
                            </div>
                            <div class="form-group row input-group input-group-outline">
                                <label for="desk" class="col-sm-4 col-form-label">Isactive</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="isactive" name="isactive" value="<?= old('isactive') ? old('isactive') : $admin['isactive']; ?>">
                                </div>
                            </div>
                            <div class="form-group row input-group input-group-outline">
                                <label for="desk" class="col-sm-4 col-form-label">Note</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="note" name="note" value="<?= old('note') ? old('note') : $admin['note']; ?>">
                                </div>
                            </div>
                            <div class="form-group row input-group input-group-outline">
                                <div class="col-sm-10 mt-3">
                                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>