<div class="container-xl">
    <form method="POST" name="formpersonil" id="formpersonil" action="<?= $action; ?>"  enctype="multipart/form-data" >
        <!-- <div class="row">
            <div class="col-6"> -->
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                        <a href="#" class="avatar avatar-upload rounded" id="file_browser">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                            <span class="avatar-upload-text">Add</span> -->
                            <img src="<?= base_url().'assets/images/addgambar.png'; ?>" alt="gambar" id="gbimage">
                        </a>
                        <div class="input-group">
                            <input type="hidden" class="form-control group-control" id="file_path" name="file_path">
                            <input type="file" class="hilang" accept="image/*"  id="file" name="file" onchange="loadFile(event)">
                            <input type="hidden" name="old_logo" value="">
                        </div>
                    </div>
                    <div class="col">
                        <label class="form-label font-bold text-secondary">NIK (Nomor induk karyawan)</label>
                        <input type="text" class="form-control font-kecil" placeholder="Kode" value="<?= $kode; ?>" disabled />
                        <input type="text" class="form-control font-kecil hilang" name="nik" id="nik" value="<?= $kode; ?>" />
                    </div>
                </div>
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <label class="form-label mb-0 font-kecil required">Nama</label>
                        <input type="text" class="form-control font-kecil" id="nama" name="nama" placeholder="Isi Nama Lengkap" />
                    </div>
                </div>
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="row">
                        <div class="col-8 px-0">
                            <div class="col px-2">
                                <label class="form-label mb-0 font-kecil required">Tempat Lahir</label>
                                <input type="text" class="form-control font-kecil" id="tempat" name="tempat" placeholder="Tempat Lahir" />
                            </div>
                        </div>
                        <div class="col-4 px-0">
                            <div class="col px-2">
                                <label class="form-label mb-0 font-kecil required">Tgl Lahir</label>
                                <input type="text" class="form-control font-kecil tglpilih" id="tgl_lahir" name="tgl_lahir" placeholder="Tgl Lahir" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <label class="form-label mb-0 font-kecil required">Alamat</label>
                        <textarea class="form-control font-kecil" id="alamat" name="alamat"></textarea>
                    </div>
                </div>
                <div class="row mb-2 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <label class="form-label mb-0 font-kecil required">Jenis Kelamin</label>
                        <div class="form-selectgroup">
                              <label class="form-selectgroup-item">
                                <input type="radio" name="jenkel" id="jenkel" value="L" class="form-selectgroup-input" checked>
                                <span class="form-selectgroup-label">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-gender-male"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" /><path d="M19 5l-5.4 5.4" /><path d="M19 5h-5" /><path d="M19 5v5" /></svg>
                                  Laki - Laki</span>
                              </label>
                              <label class="form-selectgroup-item">
                                <input type="radio" name="jenkel" id="jenkel" value="P" class="form-selectgroup-input">
                                <span class="form-selectgroup-label">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-gender-female"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" /><path d="M12 14v7" /><path d="M9 18h6" /></svg>
                                  Perempuan</span>
                              </label>
                            </div>
                    </div>
                </div>
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <label class="form-label mb-0 font-kecil required">Telepon / WA</label>
                        <input type="text" class="form-control font-kecil" id="telp" name="telp" placeholder="Nomor Telp" />
                    </div>
                </div>
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <label class="form-label mb-0 font-kecil required">Email Aktif</label>
                        <input type="text" class="form-control font-kecil" id="email" name="email" placeholder="E-mail" />
                    </div>
                </div>
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <label class="form-label mb-0 font-kecil required">Pendidikan</label>
                        <select class="form-control font-kecil form-select" id="pendidikan_id" name="pendidikan_id" placeholder="Pendidikan">
                            <option>Pilih Pendidikan</option>
                            <?php foreach($pendidikan->result_array() as $didik): ?>
                                <option value="<?= $didik['id'] ?>"><?= $didik['pendidikan'].' # '.$didik['nama_pendidikan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <label class="form-label mb-0 font-kecil required">Jabatan</label>
                        <input type="text" class="form-control font-kecil" id="jabatan" name="jabatan" placeholder="Jabatan" />
                    </div>
                </div>
                <div class="row mb-0 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="row">
                        <div class="col-6 px-0">
                            <div class="col px-2">
                                <label class="form-label mb-0 font-kecil required">Tgl Masuk</label>
                                <input type="text" class="form-control font-kecil tglpilih" id="tgl_kerja" name="tgl_kerja" placeholder="Tgl Masuk" />
                            </div>
                        </div>
                        <div class="col-6 px-0">
                            <div class="col px-2">
                                <label class="form-label mb-0 font-kecil required">Tgl Keluar</label>
                                <div>
                                <input type="text" class="form-control font-kecil tglpilih" id="tgl_keluar" name="tgl_keluar" placeholder="Tgl Keluar" />
                                <small class="form-hint mt-0">Kosongkan jika karyawan masih AKTIF</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <label class="form-label mb-0 font-kecil required">Keterangan</label>
                        <textarea class="form-control font-kecil" id="ket" name="ket"></textarea>
                    </div>
                </div>
            <!-- </div>
        </div> -->
    </form>
</div>
<!-- <hr class="m-1">
<div class="d-flex justify-content-between p-0">
    <button type="button" class="btn me-auto btn-square" data-bs-dismiss="modal">Batal</button>
    <a href="#" class="btn btn-primary btn-square" id="simpanuser">Simpan</a>
</div> -->
<script>
    $(document).ready(function(){
        $(".tglpilih").datepicker({
            autoclose: true,
            format: "dd-mm-yyyy",
        })
    })
    $("#simpanformscroll").click(function(){
        if($("#nama").val()==''){
            alert('Nama Harus diisi !');
            return false;
        }
        if($("#tempat").val()==''){
            alert('Tempat lahir Harus diisi !');
            return false;
        }
        if($("#tgl_lahir").val()==''){
            alert('Tgl Lahir Harus diisi !');
            return false;
        }
        if($("#alamat").val()==''){
            alert('Alamat Harus diisi !');
            return false;
        }
        if($("#pendidikan").val()==''){
            alert('Pendidikan Harus Pilih !');
            return false;
        }
        document.formpersonil.submit();
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