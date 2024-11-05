<div class="container-xl">
    <form method="POST" name="formuser" id="formuser" action="<?= $action; ?>"  enctype="multipart/form-data" >
        <div class="row mb-1 align-items-end">
            <div class="col-auto">
                <a href="#" class="avatar avatar-upload rounded" title="Klik untuk ganti FOTO" id="file_browser">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                    <span class="avatar-upload-text">Add</span> -->
                    <?php 
                        if($data['filefoto']==''){
                            $foto = base_url().'assets/images/addgambar.png';
                        }else{
                            $foto = base_url().'assets/images/user_avatar/'.$data['filefoto'];
                        }
                    ?>
                    <img src="<?= $foto?>" alt="gambar" id="gbimage">
                </a>
                <div class="input-group">
                    <input type="hidden" class="form-control group-control" id="file_path" name="file_path">
                    <input type="file" class="hilang" accept="image/*"  id="file" name="file" onchange="loadFile(event)">
                    <input type="hidden" name="old_logo" value="<?= $data['filefoto']; ?>">
                </div>
            </div>
            <div class="col">
                <label class="form-label">Kode</label>
                <input type="text" class="form-control font-kecil" placeholder="Kode" value="<?= $data['kode']; ?>" disabled />
                <input type="text" class="form-control font-kecil hilang" name="kode" id="kode" value="<?= $data['kode']; ?>" />
                <input type="text" class="form-control font-kecil hilang" name="id" id="id" value="<?= $data['id']; ?>" />
            </div>
        </div>
        <div class="row mb-1 align-items-end">
            <div class="col-auto">
            </div>
            <div class="col">
                <label class="form-label mb-0 font-kecil required">Nama</label>
                <input type="text" class="form-control font-kecil" id="nama" name="nama" value="<?= $data['nama']; ?>" placeholder="Isi Nama Lengkap" />
            </div>
        </div>
        <div class="row mb-1 align-items-end">
            <div class="col-auto">
            </div>
            <div class="col">
                <label class="form-label mb-0 font-kecil required">Jabatan</label>
                <input type="text" class="form-control font-kecil" id="posisi" name="posisi" value="<?= $data['posisi']; ?>" placeholder="Jabatan Pekerjaan" />
            </div>
        </div>
        <div class="row mb-1 align-items-end">
            <div class="col-auto">
            </div>
            <div class="col">
                <label class="form-label mb-0 font-kecil required">Tipe User</label>
                <select class="form-control form-select font-kecil" id="hak" name="hak">
                    <option value="0">Pilih Tipe User</option>
                    <option value="1" <?php if($data['hak']==1){ echo "selected"; } ?>>Administrator</option>
                    <option value="2" <?php if($data['hak']==2){ echo "selected"; } ?>>Owner</option>
                    <option value="3" <?php if($data['hak']==3){ echo "selected"; } ?>>User</option>
                </select>
            </div>
        </div>
        <div class="row mb-2 align-items-end">
            <div class="col-auto">
            </div>
            <div class="col">
                <label class="form-label mb-0 font-kecil required">Username</label>
                <input type="text" class="form-control font-kecil" id="username" name="username" value="<?= $data['username']; ?>" placeholder="Username" />
            </div>
        </div>
        <div class="row mb-3 align-items-end">
            <div class="col-auto">
            </div>
            <div class="col">
                <label class="form-label mb-1 font-kecil required">Password</label>
                <input type="password" class="form-control font-kecil" id="password" name="password" value="<?= $data['password']; ?>" placeholder="Password" />
            </div>
        </div>
        <div class="row mb-1 align-items-end">
            <div class="col-auto">
            </div>
            <div class="col">
                <label class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="aktif" name="aktif" <?php if($data['aktif']==1){ echo "checked"; } ?>>
                    <span class="form-check-label">Aktif</span>
                </label>
            </div>
        </div>
        <div class="rounded p-2" style="border-style: dotted; border-color: #EBEEF1;border-width: 2px;">
            <div class="row">
                <div class="col-4">
                    <label class="form-check mb-1">
                        <input class="form-check-input font-kecil" type="checkbox" id="cek1" name="cek1" <?= cekmodul($data['modul'],1); ?>>
                        <span class="form-check-label font-kecil">User Aplikasi</span>
                    </label>
                    <label class="form-check mb-1">
                        <input class="form-check-input font-kecil" type="checkbox" id="cek2" name="cek2" <?= cekmodul($data['modul'],2); ?>>
                        <span class="form-check-label font-kecil">Master Karyawan</span>
                    </label>
                    <label class="form-check mb-1">
                        <input class="form-check-input font-kecil" type="checkbox" id="cek3" name="cek3" <?= cekmodul($data['modul'],3); ?>>
                        <span class="form-check-label font-kecil">Master Barang</span>
                    </label>
                    <label class="form-check mb-1">
                        <input class="form-check-input font-kecil" type="checkbox" id="cek4" name="cek4" <?= cekmodul($data['modul'],4); ?>>
                        <span class="form-check-label font-kecil">Master Customer</span>
                    </label>
                    <label class="form-check mb-1">
                        <input class="form-check-input font-kecil" type="checkbox" id="cek5" name="cek5" <?= cekmodul($data['modul'],5); ?>>
                        <span class="form-check-label font-kecil">Master Supplier</span>
                    </label>
                </div>
                <div class="col-4">
                    <label class="form-check mb-1">
                        <input class="form-check-input font-kecil" type="checkbox" id="cek6" name="cek6" <?= cekmodul($data['modul'],6); ?>>
                        <span class="form-check-label font-kecil">Penjualan</span>
                    </label>
                    <label class="form-check mb-1">
                        <input class="form-check-input font-kecil" type="checkbox" id="cek7" name="cek7" <?= cekmodul($data['modul'],7); ?>>
                        <span class="form-check-label font-kecil">Pembelian</span>
                    </label>
                    <label class="form-check mb-1">
                        <input class="form-check-input font-kecil" type="checkbox" id="cek8" name="cek8" <?= cekmodul($data['modul'],8); ?>>
                        <span class="form-check-label font-kecil">Retur Penjualan</span>
                    </label>
                    <label class="form-check mb-1">
                        <input class="form-check-input font-kecil" type="checkbox" id="cek9" name="cek9" <?= cekmodul($data['modul'],9); ?>>
                        <span class="form-check-label font-kecil">Retur Pembelian</span>
                    </label>
                    <label class="form-check mb-1">
                        <input class="form-check-input font-kecil" type="checkbox" id="cek10" name="cek10" <?= cekmodul($data['modul'],10); ?>>
                        <span class="form-check-label font-kecil">Cicilan Jual Kredit</span>
                    </label>
                    <label class="form-check mb-1">
                        <input class="form-check-input font-kecil" type="checkbox" id="cek11" name="cek11" <?= cekmodul($data['modul'],11); ?>>
                        <span class="form-check-label font-kecil">Cicilan Beli Kredit</span>
                    </label>
                </div>
                <div class="col-4">
                    <label class="form-check mb-1">
                        <input class="form-check-input font-kecil" type="checkbox" id="cek12" name="cek12" <?= cekmodul($data['modul'],12); ?>>
                        <span class="form-check-label font-kecil">Rekap Stok</span>
                    </label>
                    <label class="form-check mb-1">
                        <input class="form-check-input font-kecil" type="checkbox" id="cek13" name="cek13" <?= cekmodul($data['modul'],13); ?>>
                        <span class="form-check-label font-kecil">Cash Flow</span>
                    </label>
                    <label class="form-check mb-1">
                        <input class="form-check-input font-kecil" type="checkbox" id="cek14" name="cek14" <?= cekmodul($data['modul'],14); ?>>
                        <span class="form-check-label font-kecil">Laporan</span>
                    </label>
                    <label class="form-check mb-1">
                        <input class="form-check-input font-kecil" type="checkbox" id="cek15" name="cek15" <?= cekmodul($data['modul'],15); ?>>
                        <span class="form-check-label font-kecil">Backup Database</span>
                    </label>
                    <label class="form-check mb-1">
                        <input class="form-check-input font-kecil" type="checkbox" id="cek16" name="cek16" <?= cekmodul($data['modul'],16); ?>>
                        <span class="form-check-label font-kecil">Adjustment Barang</span>
                    </label>
                    <label class="form-check mb-1">
                        <input class="form-check-input font-kecil" type="checkbox" id="cek17" name="cek17" <?= cekmodul($data['modul'],17); ?>>
                        <span class="form-check-label font-kecil">Penerimaan Barang</span>
                    </label>
                    <label class="form-check mb-1">
                        <input class="form-check-input font-kecil" type="checkbox" id="cek18" name="cek18" <?= cekmodul($data['modul'],18); ?>>
                        <span class="form-check-label font-kecil">Pengeluaran Barang</span>
                    </label>
                    <label class="form-check mb-1">
                        <input class="form-check-input font-kecil" type="checkbox" id="cek19" name="cek19" <?= cekmodul($data['modul'],19); ?>>
                        <span class="form-check-label font-kecil">History</span>
                    </label>                
                </div>
            </div>
            
        </div>
    </form>
</div>
<hr class="m-1">
<div class="d-flex justify-content-between p-0">
    <button type="button" class="btn me-auto btn-square" data-bs-dismiss="modal">Batal</button>
    <a href="#" class="btn btn-primary btn-square" id="simpanuser">Simpan</a>
</div>
<script>
    $("#simpanuser").click(function(){
        if($("#nama").val()==''){
            alert('Nama Harus diisi !');
            return false;
        }
        if($("#posisi").val()==''){
            alert('Jabatan Harus diisi !');
            return false;
        }
        if($("#hak").val()==0){
            alert('Tipe User Harus diisi !');
            return false;
        }
        if($("#username").val()==''){
            alert('Username Harus diisi !');
            return false;
        }
        if($("#password").val()==''){
            alert('Password Harus diisi !');
            return false;
        }
        document.formuser.submit();
    });
    $("#file_browser").click(function (e) {
		e.preventDefault();
		$("#file").click();
	});
	$("#file_path").click(function () {
		$("#file_browser").click();
	});
	$("#file").change(function () {
		$("#file_path").val($(this).val());
	});
</script>