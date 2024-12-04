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
                    <a href="<?= base_url().'barang/addbarang'; ?>" class="btn btn-blue btn-square font-kecil btn-ku" data-bs-toggle="modal" data-bs-target="#modal-large" data-title="Add Barang"><i class="fa fa-plus mr-1"></i> Tambah data</a>
                </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body mt-1">
        <div class="container-xl">
            <!-- <div class="row row-cards"> -->
                <!-- <div class="col-12"> -->
                    <div class="card card-active mb-1">
                        <div class="card-body">
                            <p>This is a card with active state.</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div id="table-default" class="table-responsive" style="z-index: 1000000;">
                                <table class="table  nowrap table-hover mt-1" id="tabelnya">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Satuan</th>
                                            <th>Stok</th>
                                            <th>Hg Jual</th>
                                            <th>Hg Beli</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-tbody">
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>