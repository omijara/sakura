<?php
require_once('class/main.php');
$obj = new Model;

 if(isset($_POST['save_data'])) {
      $insertID = $_POST['save_data'];
      $obj->store_input($insertID);
  }

     if(isset($_POST['c_update'])) {
      $data = $_POST['c_update'];
      $obj->store_update($data);
  }

     if(isset($_POST['save_product'])) {
      $insertID = $_POST['save_product'];
      $obj->product_input($insertID);
  }

       if(isset($_POST['p_update'])) {
      $data = $_POST['p_update'];
      $obj->product_update($data);
  }
  
     if(isset($_POST['save_cat'])) {
      $insertID = $_POST['save_cat'];
      $obj->category_input($insertID);
  }

       if(isset($_POST['update_quantity'])) {
      $insertID = $_POST['update_quantity'];
      $obj->update_quantity($insertID);
  }

         if(isset($_POST['search'])) {
      $insertID = $_POST['search'];
      $obj->data_search($insertID);
  }


?>
