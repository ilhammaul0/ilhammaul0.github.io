<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl" style="background-image: url('https://images.unsplash.com/photo-1519389950473-47ba0277781c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8dGVjaG5vbG9neXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="<?= base_url('/img/' . user()->foto); ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        <?= user()->username; ?>
                    </h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Informasi Profil</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="list-group">
                                <table>
                                    <tr>
                                        <td class="list-group-item border-0 text-sm">
                                            <strong class="text-dark">Username</strong>
                                        </td>
                                        <td>
                                            &nbsp;: <?= user()->username; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="list-group-item border-0 text-sm">
                                            <strong class="text-dark">Fullname</strong>
                                        </td>
                                        <td>
                                            &nbsp;: <?= user()->fullname; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="list-group-item border-0 text-sm">
                                            <strong class="text-dark">Nip</strong>
                                        </td>
                                        <td>
                                            &nbsp;: <?= user()->nip; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="list-group-item border-0 text-sm">
                                            <strong class="text-dark">Email</strong>
                                        </td>
                                        <td>
                                            &nbsp;: <?= user()->email; ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>