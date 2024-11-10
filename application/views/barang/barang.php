<div class="page-wrapper">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                <h2 class="page-title d-flex justify-content-between">
                    <span>Data Barang</span>
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
                    <a href="<?= base_url().'customer/addcustomer'; ?>" class="btn btn-blue btn-square font-kecil btn-ku" data-bs-toggle="modal" data-bs-target="#modal-scrollable" data-title="Add Customer"><i class="fa fa-plus mr-1"></i> Tambah data</a>
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
                            <div id="table-default" class="table-responsive">
                                <table class="table fixcolumn nowrap table-hover mt-1" style="width: 100% !important; height: 30px !important;">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Kontak</th>
                                            <th>Telp</th>
                                            <th>eMail</th>
                                            <th>Npwp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-tbody font-kecil">
                                        <?php foreach($data->result_array() as $dat): ?>
                                        <tr>
                                            <td class="align-middle"><?= $dat['kode']; ?></td>
                                            <td class="align-middle"><?= $dat['nama']; ?></td>
                                            <td class="align-middle"><?= $dat['nama_kategori']; ?></td>
                                            <td class="align-middle"><?= $dat['nama_satuan']; ?></td>
                                            <td class="align-middle"><?= $dat['stok']; ?></td>
                                            <td class="align-middle"><?= $dat['hgjual']; ?></td>
                                            <td class="align-middle"><?= $dat['hgbeli']; ?></td>
                                            <td class="align-middle">
                                                <a href="<?= base_url().'customer/editcustomer/'.$dat['id']; ?>" class="btn btn-sm btn-blue" data-bs-toggle="modal" data-bs-target="#modal-scrollable" data-title="Edit Personil/Karyawan" title="Edit Data"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="#" data-href="<?= base_url().'customer/hapusdata/'.$dat['id']; ?>" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete" data-message="Akan menghapus data ini" title="Hapus Data"><i class="fa fa-trash-o"></i> Hapus</a>
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