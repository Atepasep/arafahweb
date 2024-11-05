    <script src="<?= base_url(); ?>assets/js/vendor/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/demo-theme.min.js?1692870487"></script>
    <script src="<?= base_url(); ?>assets/js/tabler.min.js?1692870487" defer></script>
    <script src="<?= base_url(); ?>assets/js/demo.min.js?1692870487" defer></script>
    <script>
      $("#showpassword").click(function(){
        if($("#password").attr('type')=='password'){
          $("#password").attr('type','text');
        }else{
          $("#password").attr('type','password');
        }
      })
    </script>
  </body>
</html>