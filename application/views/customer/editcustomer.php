<div class="container-xl">
    <form method="POST" name="formsupplier" id="formsupplier" action="<?= $action; ?>"  enctype="multipart/form-data" >
        <!-- <div class="row">
            <div class="col-6"> -->
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <label class="form-label mb-0 font-kecil required">Kode</label>
                        <div>
                            <input type="text" class="hilang" name="id" id="id" value="<?= $data['id']; ?>">
                            <input type="text" class="form-control font-kecil" id="kode" name="kode" placeholder="Isi Kode" value="<?= $data['kode']; ?>"/>
                            <small class="form-hint mt-0">Dibuat otomatis oleh system</small>
                        </div>
                    </div>
                </div>
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <label class="form-label mb-0 font-kecil required">Nama</label>
                        <input type="text" class="form-control font-kecil" id="nama" name="nama" placeholder="Nama Supplier" value="<?= $data['nama']; ?>" />
                    </div>
                </div>
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <label class="form-label mb-0 font-kecil required">Alamat</label>
                        <textarea class="form-control font-kecil" id="alamat" name="alamat"><?= $data['alamat']; ?></textarea>
                    </div>
                </div>
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <label class="form-label mb-0 font-kecil required">Kontak</label>
                        <input type="text" class="form-control font-kecil" id="kontak" name="kontak" placeholder="Kontak Supplier" value="<?= $data['kontak']; ?>" />
                    </div>
                </div>
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <label class="form-label mb-0 font-kecil required">Telp</label>
                        <input type="text" class="form-control font-kecil" id="telp" name="telp" placeholder="Telp" value="<?= $data['telp']; ?>" />
                    </div>
                </div>
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <label class="form-label mb-0 font-kecil required">Email</label>
                        <input type="text" class="form-control font-kecil" id="email" name="email" placeholder="Email" value="<?= $data['email']; ?>" />
                    </div>
                </div>
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <label class="form-label mb-0 font-kecil required">Npwp</label>
                        <input type="text" class="form-control font-kecil" id="npwp" name="npwp" placeholder="Npwp" value="<?= $data['npwp']; ?>"  />
                    </div>
                </div>
                <hr class="m-0">
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">
                        <label class="form-label mb-0 font-kecil">Tempo (hari)</label>
                        <input type="text" class="form-control font-kecil text-right inputangka" id="haritempo" name="haritempo" placeholder="Hari tempo" value="<?= $data['haritempo']; ?>"  />
                    </div>
                </div>
                <div class="row mb-1 align-items-end">
                    <div class="col-auto">
                    </div>
                    <div class="col">   
                        <label class="form-label mb-0 font-kecil required">Plafon Utang</label>
                        <input type="text" class="form-control font-kecil text-right inputangka" id="plafon" name="plafon" placeholder="Rp." value="<?= $data['plafon']; ?>"  />
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
        $(".inputangka").on("change click keyup input paste", function (event) {
            $(this).val(function (index, value) {
                return value
                    .replace(/(?!\.)\D/g, "")
                    .replace(/(?<=\..*)\./g, "")
                    .replace(/(?<=\.\d\d).*/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            });
        });
        $(".tglpilih2").datepicker({
		autoclose: true,
		format: "dd-mm-yyyy",
		endDate: "+1d",
	});
    })
    $("#simpanformscroll").click(function(){
        if($("#nama").val()==''){
            // alert('Nama Harus diisi !');
            pesan('Nama Harus diisi !','info')
            return false;
        }
        if($("#alamat").val()==''){
            pesan('Alamat Harus diisi !','info');
            return false;
        }
        if($("#kontak").val()==''){
            pesan('Kontak person Harus diisi !','info');
            return false;
        }
        if($("#telp").val()=='' && $("#email").val()==''){
            pesan('Telp / Email Harus diisi !','info');
            return false;
        }
        document.formsupplier.submit();
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