<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; www.carapintar.web.id <?php echo date('Y') ?></div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url()?>assets/js/scripts.js"></script>
<script src="<?php echo base_url()?>assets/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/datatables/dataTables.bootstrap4.js"></script>
<script>
    $(document).ready(function () {
      $('#dataTables-example').dataTable();
    });
</script>
<!-- Bootstrap FileUpload -->
<script src="<?php echo base_url()?>assets/js/bootstrap-fileupload.js"></script>
<!-- Bootsrap SweetAlert -->
<script src="<?php echo base_url()?>assets/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url()?>assets/js/coding.js"></script>
<script type="text/javascript">
  $('.alert-dismissible').alert().delay(3000).slideUp('slow');
</script>
<script src="<?php echo base_url()?>assets/demo/datatables-demo.js"></script>
</body>
</html>