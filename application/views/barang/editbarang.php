<div class="container-xl">
    <form method="POST" name="formbarang" id="formbarang" action="<?= $action; ?>"  enctype="multipart/form-data" >
        <!-- <div class="row">
            <div class="col-6"> -->
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                        <a href="#" class="avatar avatar-upload rounded" id="file_browser">
                            <?php 
                                if($data['filefoto']==''){
                                    $foto = base_url().'assets/images/addgambar.png';
                                }else{
                                    $foto = base_url().'assets/images/barang/'.$data['filefoto'];
                                }
                             ?>
                            <img src="<?= $foto ?>" alt="gambar" id="gbimage">
                        </a>
                        <div class="input-group">
                            <input type="hidden" class="form-control group-control" id="file_path" name="file_path">
                            <input type="file" class="hilang" accept="image/*"  id="file" name="file" onchange="loadFile(event)">
                            <input type="hidden" name="old_logo" value="<?= $data['filefoto']; ?>">
                        </div>
                    </div>
                    <div class="col">
                        <label class="form-label font-bold text-secondary">Kode</label>
                        <div>
                            <input type="text" class="form-control font-kecil" id="kode" name="kode" placeholder="Isi Kode" value="<?= $data['kode']; ?>" disabled/>
                            <small class="form-hint mt-0">Dibuat otomatis oleh system</small>
                            <input type="text" name="id" class="hilang" id="id" value="<?= $data['id']; ?>">
                        </div>
                    </div>
                </div>
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <label class="form-label mb-0 font-kecil required">Nama Barang</label>
                        <input type="text" class="form-control font-kecil" id="nama" name="nama" placeholder="Nama Barang" value="<?= $data['nama']; ?>" />
                    </div>
                </div>
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <label class="form-label mb-0 font-kecil required">Kategori</label>
                        <select class="form-control form-select font-kecil" id="kategori_id" name="kategori_id">
                            <option value="">Pilih Kategori</option>
                            <?php foreach($kategori->result_array() as $kate): $selek = $data['kategori_id']==$kate['id'] ? 'selected' : ''; ?>
                                <option value="<?= $kate['id']; ?>" <?= $selek; ?>><?= $kate['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <label class="form-label mb-0 font-kecil required">Satuan</label>
                        <select class="form-control form-select font-kecil" id="satuan_id" name="satuan_id">
                            <option value="">Pilih Satuan</option>
                            <?php foreach($satuan->result_array() as $satu): $selek = $data['satuan_id']==$satu['id'] ? 'selected' : '';  ?>
                                <option value="<?= $satu['id']; ?>" <?= $selek; ?>><?= $satu['nama_satuan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="row">
                        <div class="col-6 px-0">
                            <div class="col px-2">
                                <label class="form-label mb-0 font-kecil ">Stok</label>
                                <input type="text" class="form-control font-kecil inputangka text-right" id="stok" name="stok" placeholder="Stok" value="<?= rupiah($data['stok'],0); ?>" />
                            </div>
                        </div>
                        <div class="col-6 px-0">
                            <div class="col px-2">
                                <label class="form-label mb-0 font-kecil">Buffer Stok</label>
                                <input type="text" class="form-control font-kecil inputangka text-right" id="stokaman" name="stokaman" placeholder="Buffer Stok"  value="<?= rupiah($data['stokaman'],0); ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <label class="form-label mb-0 font-kecil">Harga Beli</label>
                        <input type="text" class="form-control font-kecil inputangka text-right" id="hgbeli" name="hgbeli" placeholder="Harga Beli" value="<?= rupiah($data['hgbeli'],2); ?>" />
                    </div>
                </div>
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <label class="form-label mb-0 font-kecil">Harga Jual</label>
                        <input type="text" class="form-control font-kecil inputangka text-right" id="hgjual" name="hgjual" placeholder="Harga Jual" value="<?= rupiah($data['hgjual'],2); ?>" />
                    </div>
                </div>
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <label class="form-label mb-0 font-kecil required">Harga Retail</label>
                        <input type="text" class="form-control font-kecil inputangka text-right" id="hgretail" name="hgretail" placeholder="Harga Retail" value="<?= rupiah($data['hgretail'],2); ?>" />
                    </div>
                </div>
                <hr class="m-0">
                <div class="d-flex justify-content-between p-0 mt-2">
                    <button type="button" class="btn me-auto btn-square" data-bs-dismiss="modal">Batal</button>
                    <a href="#" class="btn btn-primary btn-square" id="simpanbarang">Simpan</a>
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
    $("#simpanbarang").click(function(){
        if($("#nama").val()==''){
            // alert('Nama Harus diisi !');
            pesan('Nama Barang Harus diisi !','info')
            return false;
        }
        if($("#kategori_id").val()==''){
            pesan('Kategori Harus diisi !','info');
            return false;
        }
        if($("#satuan_id").val()==''){
            pesan('Satuan Harus diisi !','info');
            return false;
        }
        if($("#hgbeli").val()=='' || $("#hgbeli").val()=='-'){
            pesan('Harga Beli Harus diisi !','info');
            return false;
        }
        if($("#hgjual").val()=='' || $("#hgjual").val()=='-'){
            pesan('Harga Jual Harus diisi !','info');
            return false;
        }
        document.formbarang.submit();
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
    $(".inputangka").on("change click keyup input paste", function (event) {
        $(this).val(function (index, value) {
            return value
                .replace(/(?!\.)\D/g, "")
                .replace(/(?<=\..*)\./g, "")
                .replace(/(?<=\.\d\d).*/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    });
</script>