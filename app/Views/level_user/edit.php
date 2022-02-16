<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Level User</h2>
            <form action="/level_user/update/<?= $level_user['id']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="card mb-3">
                    <input type="hidden" name="slug" value="<?= $level_user['slug']; ?>">
                    <div class="card-body">
                        <div class="form-group row input-group input-group-outline">
                            <label for="name" class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name" name="name" autofocus value="<?= old('name') ? old('name') : $level_user['name']; ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Description</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="description" name="desccription" value="<?= old('description') ? old('description') : $level_user['description']; ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <div class="col-sm-10">
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