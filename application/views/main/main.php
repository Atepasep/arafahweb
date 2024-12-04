<div class="page-wrapper">
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl d-flex flex-column justify-content-center">
        <div class="empty">
            <div class="empty-img mt-4">
                <img src="<?= base_url().'assets/images/logoasliw.png'; ?>" height="128" alt="LOGO">
            </div>
            <p class="empty-title"><?= $this->session->userdata('cabangaktif'); ?> - <?= datacabang($this->session->userdata('cabangaktif'),'alamat_cabang'); ?></p>
            <p class="empty-title">Selamat datang <?= datauser($this->session->userdata('userid'),'nama'); ?></p>
            <p class="empty-subtitle text-secondary">
            <input type="text" class="hilang" name="msg" id="msg" value="<?= $this->session->flashdata('msg'); ?>">
            <input type="text" class="hilang" name="pesanerror" id="pesanerror" value="<?= $this->session->flashdata('pesanerror'); ?>">
            Anda berada di Aplikasi Arafah Medilab
            </p>
            <!-- <div class="empty-action">
            <a href="./." class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                Add your first client
            </a>
            </div> -->
        </div>
        </div>
    </div>