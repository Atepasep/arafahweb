<div class="container-xl">
    <div class="row mb-1 align-items-end">
        <div class="col-auto">
            <a href="#" class="avatar avatar-upload rounded">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <!-- <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                <span class="avatar-upload-text">Add</span> -->
                <img src="<?= base_url().'assets/images/addgambar.png'; ?>" alt="gambar">
            </a>
        </div>
        <div class="col">
            <label class="form-label">Kode</label>
            <input type="text" class="form-control font-kecil" name="nama" id="nama" placeholder="Kode" disabled />
        </div>
    </div>
    <div class="row mb-1 align-items-end">
        <div class="col-auto">
        </div>
        <div class="col">
            <label class="form-label mb-0 font-kecil">Nama</label>
            <input type="text" class="form-control font-kecil" placeholder="Isi Nama Lengkap" />
        </div>
    </div>
    <div class="row mb-1 align-items-end">
        <div class="col-auto">
        </div>
        <div class="col">
            <label class="form-label mb-0 font-kecil">Posisi</label>
            <input type="text" class="form-control font-kecil" placeholder="Posisi Pekerjaan" />
        </div>
    </div>
    <div class="row mb-2 align-items-end">
        <div class="col-auto">
        </div>
        <div class="col">
            <label class="form-label mb-0 font-kecil">Username</label>
            <input type="text" class="form-control font-kecil" placeholder="Username" />
        </div>
    </div>
    <div class="row mb-3 align-items-end">
        <div class="col-auto">
        </div>
        <div class="col">
            <label class="form-label mb-1 font-kecil">Password</label>
            <input type="password" class="form-control font-kecil" placeholder="Password" />
        </div>
    </div>
    <div class="row mb-1 align-items-end">
        <div class="col-auto">
        </div>
        <div class="col">
            <label class="form-check form-switch">
                <input class="form-check-input" type="checkbox">
                <span class="form-check-label">Aktif</span>
            </label>
        </div>
    </div>
    <div class="rounded p-2" style="border-style: dotted; border-color: #EBEEF1;border-width: 2px;">
        <label class="form-check mb-1">
            <input class="form-check-input font-kecil" type="checkbox" >
            <span class="form-check-label font-kecil">User Aplikasi</span>
        </label>
        <label class="form-check mb-1">
            <input class="form-check-input font-kecil" type="checkbox" >
            <span class="form-check-label font-kecil">Master Karyawan</span>
        </label>
        <label class="form-check mb-1">
            <input class="form-check-input font-kecil" type="checkbox" >
            <span class="form-check-label font-kecil">Master Barang</span>
        </label>
        <label class="form-check mb-1">
            <input class="form-check-input font-kecil" type="checkbox" >
            <span class="form-check-label font-kecil">Master Customer</span>
        </label>
        <label class="form-check mb-1">
            <input class="form-check-input font-kecil" type="checkbox" >
            <span class="form-check-label font-kecil">Master Supplier</span>
        </label>
    </div>
</div>
<hr class="m-1">
<div class="d-flex justify-content-between p-0">
    <button type="button" class="btn me-auto btn-square" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary btn-square" data-bs-dismiss="modal">Save changes</button>
</div>