<div class="page-wrapper">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                <h2 class="page-title d-flex justify-content-between">
                    <span>Data Personil</span>
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
                    <a href="<?= base_url().'personil/addpersonil'; ?>" class="btn btn-blue btn-square font-kecil btn-ku" data-bs-toggle="modal" data-bs-target="#modal-scrollable" data-title="Add Personil/Karyawan"><i class="fa fa-plus mr-1"></i> Tambah data</a>
                </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body mt-1">
        <div class="container-xl">
            <!-- <div class="row row-cards"> -->
                <!-- <div class="col-12"> -->
                    <div class="card">
                        <div class="card-body">
                            <div id="table-default">
                                <table class="table fixcolumn table-hover mt-1 row-border order-column nowrap">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Tgl Masuk</th>
                                            <th>L/P</th>
                                            <th>Tgl Lahir</th>
                                            <th>Alamat</th>
                                            <th>Pendidikan</th>
                                            <th>Telp</th>
                                            <th>Email</th>
                                            <th>Remark</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-tbody font-kecil">
                                        <?php foreach($data->result_array() as $dat): ?>
                                        <tr>
                                            <td>
                                                <div class="row align-items-center">
                                                    <?php 
                                                        if ($dat['filefoto']==''){
                                                            $foto = base_url().'assets/images/logoasliw.png';
                                                        }else{
                                                            $foto = base_url().'assets/images/personil/'.$dat['filefoto'];
                                                        }
                                                     ?>
                                                    <div class="col-12 col-lg-auto"><span class="avatar m-0" style="background-image: url(<?= $foto ?>)"></span></div>
                                                    <div class="col">
                                                        <div class="font-bold">
                                                            <?= $dat['nama']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle"><?= $dat['jabatan']; ?></td>
                                            <td class="align-middle"><?= tgl_indo($dat['tgl_kerja']); ?><br><span class="badge badge-outline text-azure"><?= umurnow($dat['tgl_kerja']); ?></span></td>
                                            <td class="align-middle"><?= $dat['jenkel']; ?></td>
                                            <td class="align-middle"><?= $dat['tempat'].', '.tgl_indo($dat['tgl_lahir']); ?><br><span class="badge badge-outline text-azure"><?= umurnow($dat['tgl_lahir']); ?></span></td>
                                            <td class="align-middle"><?= $dat['alamat']; ?></td>
                                            <td class="align-middle"><?= $dat['pendidikan']; ?></td>
                                            <td class="align-middle"><?= $dat['telp']; ?></td>
                                            <td class="align-middle"><?= $dat['email']; ?></td>
                                            <td class="align-middle"><?= $dat['ket']; ?></td>
                                            <td class="align-middle">
                                                <a href="<?= base_url().'personil/editpersonil/'.$dat['id']; ?>" class="btn btn-sm btn-blue" data-bs-toggle="modal" data-bs-target="#modal-scrollable" data-title="Edit Personil/Karyawan" title="Edit Data"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="#" data-href="<?= base_url().'personil/hapuspersonil/'.$dat['id']; ?>" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete" data-message="Akan menghapus data ini" title="Hapus Data"><i class="fa fa-trash-o"></i> Hapus</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>