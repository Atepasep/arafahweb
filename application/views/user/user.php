<div class="page-wrapper">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                <h2 class="page-title d-flex justify-content-between">
                    <span>Data User Aplikasi</span>
                    <?php if($this->session->userdata('msg')!=null): ?>
                        <div class="alert alert-important alert-danger alert-dismissible font-kecil" role="alert">
                            <div class="d-flex">
                            <div>
                                <svg class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg>
                            </div>
                            <div>
                                <?= $this->session->userdata('msg'); ?>
                            </div>
                            </div>
                            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                    <?php endif; ?>
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
                                                    <?php 
                                                        if ($user['filefoto']==''){
                                                            $foto = base_url().'assets/images/logoasliw.png';
                                                        }else{
                                                            $foto = base_url().'assets/images/user_avatar/'.$user['filefoto'];
                                                        }
                                                     ?>
                                                    <div class="col-12 col-lg-auto"><span class="avatar m-0" style="background-image: url(<?= $foto ?>)"></span></div>
                                                    <div class="col">
                                                        <div class="font-bold">
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