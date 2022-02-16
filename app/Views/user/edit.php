<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah User</h2>
            <form action="/user/update/<?= $user['id']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $users['slug']; ?>">
                <input type="hidden" name="fotoLama" value="<?= $users['foto']; ?>">
                <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : '' ?>" id="fullname" name="fullname" autofocus value="<?= old('fullname') ? old('fullname') : $users['fullname']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('fullname'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desk" class="col-sm-4 col-form-label">Username</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="username" name="username" value="<?= old('username') ? old('username') : $users['username']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desk" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="password" name="password" value="<?= old('password_hash') ? old('password_hash') : $users['password_hash']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desk" class="col-sm-4 col-form-label">Id Group</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="id_group" name="id_group" value="<?= old('id_group') ? old('id_group') : $users['id_group']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="gender" name="gender" value="<?= old('gender') ? old('gender') : $users['gender']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desk" class="col-sm-4 col-form-label">Foto</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $user['user_image']; ?>" class="img-thumbnail img-preview" alt="">
                    </div>
                    <div class="col-sm-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('user_image')) ? 'is-invalid' : '' ?>" id="foto" name="foto" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('user_image'); ?>
                            </div>
                            <label class="custom-file-label" for="foto" name="foto"><?= $users['user_iamge']; ?></label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desk" class="col-sm-4 col-form-label">NIP</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nip" name="nip" value="<?= old('nip') ? old('nip') : $users['nip']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desk" class="col-sm-4 col-form-label">Login At</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="login_at" name="login_at" value="<?= old('login_at') ? old('login_at') : $users['login_at']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desk" class="col-sm-4 col-form-label">Ip Client</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="ip_client" name="ip_client" value="<?= old('ip_client') ? old('ip_client') : $users['ip_client']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desk" class="col-sm-4 col-form-label">Created By</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="created_by" name="created_by" value="<?= old('created_by') ? old('created_by') : $users['created_by']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desk" class="col-sm-4 col-form-label">Isactive</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="isactive" name="isactive" value="<?= old('isactive') ? old('isactive') : $users['isactive']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desk" class="col-sm-4 col-form-label">Note</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="note" name="note" value="<?= old('note') ? old('note') : $users['note']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>