        <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item"><a href="./" target="_blank" class="link-secondary" rel="noopener">Documentation</a></li>
                  <li class="list-inline-item"><a href="./" class="link-secondary">License</a></li>
                  <li class="list-inline-item">
                    <a href="https://atepsaprudin.my.id" target="_blank" class="link-secondary" rel="noopener">
                      <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                      Sponsor
                    </a>
                  </li>
                </ul>
              </div>
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Copyright &copy; 2024
                    <!-- <a href="." class="link-secondary">Tabler</a> -->
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- jquery latest version -->
    <!-- <script src="<?= base_url(); ?>assets/js/vendor/jquery.min.js"></script> -->
    <script src="<?= base_url(); ?>assets/js/jquery-3.7.1.js"></script>
    <!-- template source -->
    <!-- <script src="<?= base_url(); ?>assets/libs/list.js/dist/list.min.js?1692870487" defer></script> -->
    <script src="<?= base_url(); ?>assets/js/demo-theme.min.js?1692870487"></script>
    <script src="<?= base_url(); ?>assets/js/tabler.min.js?1692870487" defer></script>
    <script src="<?= base_url(); ?>assets/js/demo.min.js?1692870487" defer></script>
    <!-- dataTablses -->
    <script src="<?= base_url(); ?>assets/vendor/datatables/datatables.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/js/responsive.bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/fixheader/js/dataTables.fixedheader.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/js/dataTables.fixedColumns.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/js/fixedColumns.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    
    <script src="<?= base_url(); ?>assets/js/myscript.js?1692870487" defer></script>
    <script src="<?= base_url(); ?>assets/vendor/toast/jquery.toast.min.js"></script>
    <?php if(isset($fungsi) && $fungsi=='main'){ ?>
      <script src="<?= base_url(); ?>assets/js/own/main.js?1692870487" defer></script>
    <?php }; ?>
    <!-- <script>
      document.addEventListener("DOMContentLoaded", function() {
      const list = new List('table-default', {
      	sortClass: 'table-sort',
      	listClass: 'table-tbody',
      	valueNames: [ 'sort-name', 'sort-type', 'sort-city', 'sort-score',
      		{ attr: 'data-date', name: 'sort-date' },
      		{ attr: 'data-progress', name: 'sort-progress' },
      		'sort-quantity'
      	]
      });
      })
    </script> -->
  </body>
</html>