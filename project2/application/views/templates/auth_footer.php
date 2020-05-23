<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
      
      $("#icon-click").click(function(){
        $("#icon").toggleClass('fa-eye-slash');

        var input = $("#password");

        if(input.attr("type")==="password")
        {
            input.attr("type","text");
        }
        else
        {
            input.attr("type","password");
        }
        
      });

    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
      
      $("#icon-click1").click(function(){
        $("#icon1").toggleClass('fa-eye-slash');

        var input = $("#password1");

        if(input.attr("type")==="password")
        {
            input.attr("type","text");
        }
        else
        {
            input.attr("type","password");
        }
        
      });

    });
</script>
  
</body>
</html>