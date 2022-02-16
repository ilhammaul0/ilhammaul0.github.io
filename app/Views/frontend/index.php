<?= $this->extend('frontend/template'); ?>
<?= $this->section('content'); ?>
<div class="page-header min-vh-80" style="background-image: url('https://images.unsplash.com/photo-1630752708689-02c8636b9141?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2490&q=80')">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="text-center">
                    <h1 class="text-white">Your title here</h1>
                    <h3 class="text-white">Subtitle</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Your main section here</h2>
            <table class="table table-bordered table-hover mt-3">
                <thead>
                    <tr>
                        <th style="width: 1%">No</th>
                        <th scope="col">Nama APP</th>
                        <th scope="col">Deskirpsi</th>
                        <th scope="col">URL</th>
                        <th scope="col">Bahasa</th>
                        <th scope="col">Versi Bahasa</th>
                        <th scope="col">Framework</th>
                        <th scope="col">Versi APP</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                    <?php foreach ($app as $a) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $a['name_app']; ?></td>
                            <td><?= $a['desc_app']; ?></td>
                            <td><?= $a['url']; ?></td>
                            <td><?= $a['lang']; ?></td>
                            <td><?= $a['lang_version']; ?></td>
                            <td><?= $a['framework']; ?></td>
                            <td><?= $a['app_version']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>