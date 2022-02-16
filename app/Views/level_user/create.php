<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="card-title">Form Tambah Data Level User</h2>
            <form action="/level_user/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="form-group row input-group input-group-outline">
                            <label for="name" class="col-sm-4 col-form-label">Group Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="group_name" name="group_name" autofocus value="<?= old('name'); ?>">
                            </div>
                        </div>
                        <div class="form-group row input-group input-group-outline">
                            <label for="desk" class="col-sm-4 col-form-label">Description</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="description" name="description" value="<?= old('description'); ?>">
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