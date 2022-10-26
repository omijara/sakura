<?php 
require_once('class/main.php');
require_once('user_role.php');
$obj = new Model;

$show= $obj->show_quantity();
$data= $obj->data_search();
$store= $obj->show_store();
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product Quantity Report</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="float-left">
                  <form action="" method="GET">
                  <input type="date" id="from" name="from" required>
                  <span>to</span>
                  <input type="date" id="to" name="to" required>

                   <select id="drop-down" name="store_name" required>
                    <option value="">Select</option>
                    <?php while ($rows = mysqli_fetch_array($store)){ ?>
                    <option value="<?php echo $rows['username']?>"><?php echo $rows['name']?></option>
                  <?php } ?>
                  </select>
                  <input type="submit" name="search" value="Search" >
                </form>
                </div>
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
                     <th>Date</th>
                    <th>Product name</th>
                    <th>Quantity</th>
                    <th>Store Name</th>
                   <!--  <th>Action</th> -->
                  </tr>
                  </thead>
                  <tbody>
                <?php 

                  if(isset($data)) {
                    // var_dump($data);
                    // exit();
                 if(mysqli_num_rows($data) > 0){

                  $sn=1;
                  foreach($data as $row){
                  ?>
                    <tr>
                    <td><?php echo $sn. "</br>"; ?></td>
                    <td><?php echo $row['submit_date']?></td>
                   <td><?php echo $row['product_name']?></td>
                 

                   <td><?php echo $row['quantity']?></td>

                   <td><?php echo $row['name']?></td>
                                            </tr>
                                            <?php

                                             $sn++; 
                                        }
                                    }
                                    else
                                    {
                                      ?>
                                      <tr><td>No Record Found</td> </tr>
                                      <?php

                                        
                                    }
                                  }
              else{

                  $no=1;
                  while ($rows = mysqli_fetch_array($show)) {

                ?>
                  <tr>
                    <td><?php echo $no. "</br>"; ?></td>
                    <td><?php
                  //   $originalDate = $rows['submit_date'];
                  // $newDate = date("d-M-y", strtotime($originalDate)); 
                  //   echo $newDate 
                    echo $rows['submit_date']?>
                      
                    </td>
                   <td><?php echo $rows['product_name']?></td>
                  

                   <td><?php
                   if ($rows['quantity'] == 0){
                    echo "";
                   } else echo $rows['quantity'] ?></td>
                 
                   <td><?php echo $rows['store_name']?></td>


           <!--           <td align="center">
                    <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">Action<span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
              
                    <div class="dropdown-divider"></div> -->

                  <?php

                    //echo "<a onClick=\"javascript: return confirm('Are you sure want to delete this record?');\" class= 'dropdown-item' href='delete.php?productId=".$rows["product_id"]."'>"?><!-- <i class="fa fa-trash" style="color:red"></i> Delete</a>

                    </div>
                    </td> 
                    </tr> -->

</tr>
              <?php 
                $no++; 

               } 
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

function disburse(pl){
  $('#d_product_id').val(pl);
}
</script>

 <?php require_once('footer.php'); ?>