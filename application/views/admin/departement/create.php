<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-inbox bg-blue"></i>
                        <div class="d-inline">
                            <h5><?= $title ?></h5>
                            <span><?= $desc ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?= base_url('assets/') ?>index.html"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Tables</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3><?= $title ?></h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="name">Nama Departement</label>
                                <input type="text" name="name" id="name" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" value="<?= set_value('name') ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('name') ?>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-rounded">Simpan</button>
                            <a href="<?= base_url('departement') ?>" class="btn btn-outline-danger btn-rounded">Kembali</a>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>