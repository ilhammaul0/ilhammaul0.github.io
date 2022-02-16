<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Form Ubah Data App</h2>
            <form action="/app/update/<?= $app['id']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="card mb-3">
                    <input type="hidden" name="slug" value="<?= $app['slug']; ?>">
                    <div class="card-body">
                        <div class="form-group row input-group input-group-outline">
                            <label for="name" class="col-sm-4 col-form-label">Nama App</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control <?= ($validation->hasError('name_app')) ? 'is-invalid' : '' ?>" id="name_app" name="name_app" autofocus value="<?= old('name_app') ? old('name_app') : $app['name_app']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('name_app'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Deskripsi App</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="desc_app" name="desc_app" value="<?= old('desc_app') ? old('desc_app') : $app['desc_app']; ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Url App</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="url" name="url" value="<?= old('url') ? old('url') : $app['url']; ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Base App</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="base_app" name="base_app" value="<?= old('base_app') ? old('base_app') : $app['base_app']; ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Ordered By</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="ordered_by" name="ordered_by" value="<?= old('ordered_by') ? old('ordered') : $app['ordered_by']; ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">IP Server</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="ip_server" name="ip_server" value="<?= old('ip_server') ? old('ip_server') : $app['ip_server']; ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Bahasa</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="lang" name="lang" value="<?= old('lang') ? old('lang') : $app['lang']; ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Versi Bahasa</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="lang_version" name="lang_version" value="<?= old('lang_version') ? old('lang_version') : $app['lang_version']; ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Framework</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="framework" name="framework" value="<?= old('framework') ? old('framework') : $app['framework']; ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Versi App</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="app_version" name="app_version" value="<?= old('app_version') ? old('app_version') : $app['app_version']; ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="status" name="status" value="<?= old('status') ? old('status') : $app['status']; ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Start Develop</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="start_developed" name="start_developed" value="<?= old('start_developed') ? old('start_developed') : $app['start_developed']; ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">End Develop</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="end_developed" name="end_developed" value="<?= old('end_developed') ? old('end_developed') : $app['end_developed']; ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Live At</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="live_at" name="live_at" value="<?= old('live_at') ? old('live_at') : $app['live_at']; ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Created By</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="created_by" name="created_by" value="<?= old('created_by') ? old('created_by') : $app['created_by']; ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Isactive</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="isactive" name="isactive" value="<?= old('isactive') ? old('isactive') : $app['isactive']; ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Note</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="note" name="note" value="<?= old('note') ? old('note') : $app['note']; ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <div class="col-sm-10 mt-3">
                                <button type="submit" class="btn btn-primary">Ubah Data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>