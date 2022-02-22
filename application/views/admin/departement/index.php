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
            <div class="col-lg">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <h3><?= $title ?></h3>
                        <a href="<?= base_url('departement/add') ?>" class="btn btn-outline-primary btn-rounded">Tambah Data</a>
                    </div>
                    <div class="card-body">
                        <table id="data_table" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Departement</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($departementData as $departement) { ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $departement->departement_name ?></td>

                                        <td>
                                            <a href="#!"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>

                                            <a href="#!"><i class="ik ik-trash-2 f-16 mr-15 text-red delete-department" data-id="<?= $departement->id ?>"></i></a>
                                        </td>

                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

<?php if ($this->session->flashdata('success')) : ?>
    <div class="flashdata" data-flashdata="<?= $this->session->flashdata('success') ?>" data-type="success"></div>
<?php endif ?>
<?php if ($this->session->flashdata('error')) : ?>
    <div class="flashdata" data-flashdata="<?= $this->session->flashdata('error') ?>" data-type="error"></div>
<?php endif ?>