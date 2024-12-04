<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Arafah Medilab - Pilih Cabang Aktif</title>
    <link href="<?= base_url(); ?>assets/favicon.ico" rel="icon">
    <!-- CSS files -->
    <link href="<?= base_url(); ?>assets/css/tabler.min.css?1692870487" rel="stylesheet"/>
    <link href="<?= base_url(); ?>assets/css/tabler-flags.min.css?1692870487" rel="stylesheet"/>
    <link href="<?= base_url(); ?>assets/css/tabler-payments.min.css?1692870487" rel="stylesheet"/>
    <link href="<?= base_url(); ?>assets/css/tabler-vendors.min.css?1692870487" rel="stylesheet"/>
    <link href="<?= base_url(); ?>assets/css/demo.min.css?1692870487" rel="stylesheet"/>
    <link href="<?= base_url(); ?>assets/css/mystyle.css?1692870487" rel="stylesheet"/>
    <style>
    /* @import url('https://rsms.me/inter/inter.css'); */

    :root {
      --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }

    body {
      font-feature-settings: "cv03", "cv04", "cv11";
    }
  </style>
  <script type="text/javascript">
    base_url = '<?= base_url() ?>';
  </script>
  <noscript>
    <style type="text/css">
        .page {display:none;}
    </style>
    <div class="noscriptmsg">
      You don't have javascript enabled.  Good luck with that.
    </div>
  </noscript>
  </head>
  <body  class=" d-flex flex-column">
      <div class="page page-center">
          <div class="container py-4">
              <div class="text-center">
                <p class="font-bold">PILIH CABANG</p>
                <div class="form-selectgroup">
                    <?php 
                        $datacabang = $cabang['cabang'];
                        for($x=0;$x<=(strlen($datacabang)/3)-1;$x++):
                        switch (substr($datacabang,($x*3),3)) {
                            case 'PST':
                                $isi = 'GUDANG';
                                break;
                            case 'PWK':
                                $isi = 'PURWAKARTA';
                                break;
                            case 'SBG':
                                $isi = 'SUBANG';
                                break;
                            case 'KNG':
                                $isi = 'KUNINGAN';
                                break;
                            default:
                                $isi = '';
                                break;
                        }
                    ?>
                    <label class="form-selectgroup-item">
                        <input type="radio" name="icons" value="<?= substr($datacabang,($x*3),3); ?>" class="form-selectgroup-input">
                        <span class="form-selectgroup-label font-bold"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                            <?= substr($datacabang,($x*3),3); ?> - <?= $isi; ?></span>
                    </label>
                    <?php endfor; ?>
                </div>
                <hr class="m-2">
                <div class="text-center">
                <a href="#" class="btn btn-square btn-primary" id="setcabang">Set</a>
                <a href="<?= base_url().'auth/logout'; ?>" class="btn btn-square btn-outline btn-danger">Batal / Keluar</a>
                </div>
            </div>
        </div>
        <!-- Libs JS -->
        <!-- Tabler Core -->
        <script src="<?= base_url(); ?>assets/js/vendor/jquery.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/demo-theme.min.js?1692870487"></script>
        <script src="<?= base_url(); ?>assets/js/tabler.min.js?1692870487" defer></script>
        <script src="<?= base_url(); ?>assets/js/demo.min.js?1692870487" defer></script>
    <script>
        $("#setcabang").click(function(){
            var pilih = $("input[name='icons']:checked").val();
            $.ajax({
                // dataType: "json",
                type: "POST",
                url: base_url + "auth/setcabangaktif",
                data: {
                    plh: pilih,
                },
                success: function (data) {
                    window.location.href = base_url;
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                },
            });
        })
    </script>
  </body>
</html>