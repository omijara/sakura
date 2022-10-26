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
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Update Product Quantity</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-row" id="register_form" action="form_insert.php" method="post">
  <input type="hidden" name="product_id" id="product_id" value="">
  
  <div class="form-group col-md-6">
  <label for="name">Update current quantity<span class="text-danger">*</span></label>
  <input type=text value="" placeholder="Enter Product Quantity" id="name"
  class="form-control" name="new_quatity" min="0" max="" required>
  <small class="help-text text-muted">অনুগ্রহ করে প্রোডাক্ট এর পরিমাণ লিখুন.</small>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="update_quantity">Update</button>
      </div>
    </div>
    </form>
  </div>
</div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php  if ($_SESSION['user_level'] === 'super_admin'){ ?>
                <div class="float-left">
                <a href="product_form.php" type="submit" name="save" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add</a>
                </div>
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
                    <th>#SN</th>
                    <th>Product name</th>
                    <th>Category</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php 

                  $no=1;
                  while ($rows = mysqli_fetch_array($show)) {

                ?>
                  <tr>
                    <td><?php echo $no. "</br>"; ?></td>
                   <td><?php echo $rows['product_name']?></td>
                   <td><?php echo $rows['cat_name']?></td>


                     <td align="center">
                    <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">Action<span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
              
                 <!--    <div class="dropdown-divider"></div> -->
<!-- 
               <button onclick="add_stock(<?php echo $rows['product_id']?>)" type="button" class="dropdown-item" data-toggle="modal"data-target="#exampleModalCenter"><span class="fa fa-plus text-primary" ></span> Add</button>
               <div class="dropdown-divider"></div> -->
             <!--   <button onclick="add_stock(<?php echo $rows['product_id']?>)" type="button" class="dropdown-item" data-toggle="modal"data-target="#exampleModalCenter"><span class="fa fa-shopping-cart" ></span> Sell</button> -->

                <!-- <a class="dropdown-item" href="?page=history/manage_record&id="><span class="fa fa-plus text-primary"></span> Add Stock</a> -->
                    <div class="dropdown-divider"></div>
                  <?php  if ($_SESSION['user_level'] === 'super_admin'){ ?>
                   <a class="dropdown-item" href="product_edit.php?editId=<?php echo $rows["product_id"]?>"><span class="fa fa-edit text-primary"></span> Edit</a>
                    <div class="dropdown-divider"></div>

                  <?php

                    echo "<a onClick=\"javascript: return confirm('Are you sure want to delete this record?');\" class= 'dropdown-item' href='delete.php?productId=".$rows["product_id"]."'>"?><i class="fa fa-trash" style="color:red"></i> Delete</a>
                    <?php    } ?>
                    </div>
                    </td> 
                    </tr>


              <?php 
                $no++; 

               } 

               ?>

               <!-- Button trigger modal -->

                  </tbody>
                </table>
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

</script>

 <?php require_once('footer.php'); ?>