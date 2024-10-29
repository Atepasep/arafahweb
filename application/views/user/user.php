<div class="page-wrapper">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                <h2 class="page-title d-flex justify-content-between">
                    <span>Data User Aplikasi</span>
                    <a href="<?= base_url().'userapps/adduser'; ?>" class="btn btn-blue btn-square font-kecil btn-ku" data-bs-toggle="modal" data-bs-target="#modal-large" data-title="Add User Aplikasi"><i class="fa fa-plus mr-1"></i> Tambah data</a>
                </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body mt-1">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="table-default" class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><button class="table-sort" data-sort="sort-name">Nama User</button></th>
                                            <th><button class="table-sort" data-sort="sort-city">Jabatan</button></th>
                                            <th><button class="table-sort" data-sort="sort-type">Username</button></th>
                                            <th><button class="table-sort" data-sort="sort-score">Password</button></th>
                                            <th><button class="table-sort" data-sort="sort-date">Aktif</button></th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-tbody font-kecil">
                                        <?php foreach($data->result_array() as $user){ ?>
                                            <tr>
                                                <td class="sort-name">
                                                <div class="row align-items-center">
                                                    <div class="col-12 col-lg-auto"><span class="avatar m-0" style="background-image: url(<?= base_url().'assets/images/logoasliw.png'; ?>)"></span></div>
                                                    <div class="col">
                                                    <div>
                                                        <?= $user['nama']; ?>
                                                    </div>
                                                    </div>
                                                </div>
                                                </td>
                                                <td class="sort-city align-middle"><?= $user['posisi']; ?></td>
                                                <td class="sort-type align-middle"><?= $user['username']; ?></td>
                                                <td class="sort-score align-middle"><?= visibpass($user['password']); ?></td>
                                                
                                                <td class="sort-date align-middle" data-date="1628071164">
                                                    <?php if($user['aktif']==1){ ?>
                                                        <span class="badge bg-green ms-auto"></span>
                                                    <?php }else{ ?>
                                                        <span class="badge bg-red ms-auto"></span>
                                                    <?php }; ?>
                                                </td>
                                                <td class="sort-progress align-middle">
                                                    <a href="<?= base_url().'userapps/edituser/'.$user['id']; ?>" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-large" data-title="Add User Aplikasi"><i class="fa fa-edit mr-1"></i> Edit</a>
                                                    <a href="#" data-href="<?= base_url().'userapps/hapususer/'.$user['id']; ?>" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete" data-message="Akan menghapus data ini"><i class="fa fa-trash-o mr-1"></i> Hapus</a>
                                                </div>
                                                </td>
                                            </tr>
                                        <?php  }; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>