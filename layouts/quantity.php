<?php 
require_once('class/main.php');
require_once('user_role.php');
$obj = new Model;

$show= $obj->show_product();

?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Product List</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Quantity</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php date_default_timezone_set('America/Havana');
                  $created_at = date('d-M-y'); 
                  echo $created_at;
                ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php  if ($_SESSION['user_level'] === 'super_admin'){ ?>
              <!--   <div class="float-left">
                <a href="product_form.php" type="submit" name="save" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add</a>
                </div> -->
                 <?php } ?>
                  <style>
                  table {
                    font-family: arial, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                  }

                  td, th {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                  }


                  </style>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <!-- <th>#SN</th> -->
                    <th>Product name</th>
                    <th>Quantity</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php 

                  $no=1;
                  while ($rows = mysqli_fetch_array($show)) {

                ?>
                  <tr>
                    <!-- <td><?php echo $no. "</br>"; ?></td> -->
                   <td><?php echo $rows['product_name']?></td>
                   <form class="form-row" id="register_form" action="form_insert.php" method="post">
                    <input type="hidden" name="id[]" value="<?php echo $rows['product_id']?>">
                   <td><input type=number id="name" placeholder="" 
                    class="form-control " name="u_quantity[]" style="width: 100px;" min="0"></td>
                      <div class="float-right">
                    </tr>


              <?php 
                $no++; 

               } 

               ?>

               <!-- Button trigger modal -->
                  </tbody>
                </table>
                <br>
                <div class="float-right">
                 <button type="submit" name="update_quantity" class="btn btn-sm btn-primary"><!-- <i class="fas fa-download"></i> --> Submit</button>
                    </div>
                    </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<script>

function add_stock(el){
  $('#product_id').val(el);
}

function disburse(pl){
  $('#d_product_id').val(pl);
}
</script>

 <!-- /.content-wrapper -->
  <footer class="main-footer">
    <!-- <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-rc
    </div> -->
    <strong>Developed By <a href="https://www.fiverr.com/omimazumder?public_mode=true"=>OMI MAZUMDER</a></strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->

<script src="../dist/js/select2.min.js"></script>
<script src="../dist/js/toastr.js"></script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.js"></script>


<script type="text/javascript">
<?php if(isset($_GET['msg'])): ?>

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
Command: toastr["success"]("<?php echo $_GET['msg']?>")

<?php endif ?>
</script>  
</body>
</html>
