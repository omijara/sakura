<?php require_once('header.php') ?>
    <?php if($_SESSION['user_level'] === 'super_admin'): ?>
        <!-- Admin menu -->
      <?php include_once('admin_menu.php');?>
  
      <?php elseif($_SESSION['user_level'] === 'store'): ?>
        <!-- store menu -->
      <?php include_once('store_menu.php');?>

      <?php endif;?>
