
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->

    <a class="brand-link">

      <span class="brand-text font-weight-bold">Shakura Arts</span>

    </a>



    <!-- Sidebar -->

    <div class="sidebar">

      <!-- Sidebar user panel (optional) -->

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

<!--         <div class="image">

          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

        </div> -->

        <div class="info">

          <a class="d-block">
            Welcome!
           <strong><?php 

             echo $_SESSION['username']; 

            ?></strong> 

            </a>

        </div>

      </div>





    <!-- Sidebar Menu -->

      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


           <a href="index.php" class="nav-link active">

              <i class="nav-icon fas fa-tachometer-alt"></i>

              <p>

              Dashboard

            <!--    <i class="right fas fa-angle-left"></i> -->

              </p>

            </a>

                    <li class="nav-item">

            <a href="#" class="nav-link">

              <i class="nav-icon fa fa-th"></i>

              <p>

               Product

                <i class="fas fa-angle-left right"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

               <li class="nav-item">

                <a href="product_list.php" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>View</p>

                </a>

              </li>

            </ul>

          </li>



         <li class="nav-item">

            <a href="#" class="nav-link">

              <i class="nav-icon fa fa-th"></i>

              <p>

                Category

                <i class="fas fa-angle-left right"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

               <li class="nav-item">

                <a href="categories.php" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>View</p>

                </a>

              </li>

            </ul>

          </li>

          <li class="nav-item">

            <a href="#" class="nav-link">

              <i class="nav-icon fa fa-th"></i>

              <p>

                Report

                <i class="fas fa-angle-left right"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              </li>

              <li class="nav-item">

                <a href="report.php" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>View</p>

                </a>

            </ul>

          </li>
      

          <li class="nav-item">

            <a href="#" class="nav-link">

              <i class="nav-icon fas fa-cog"></i>

              <p>

                Settings

                <i class="fas fa-angle-left right"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

            <li class="nav-item">

                <a href="store_list.php" class="nav-link">

                  <i class="fas fa-store"></i>

                  <p> Store List</p>

                </a>

            </li>  
<!-- 
             <li class="nav-item">

                <a href="#" class="nav-link">

                  <i class="fas fa-key"></i>

                  <p> Change Password</p>

                </a>

              </li> -->

               <li class="nav-item">

                <a href="logout.php" class="nav-link">

                  <i class="fas fa-sign-out-alt"></i>

                  <p>Logout</p>

                </a>

              </li>



              </li>

            </ul>

      </nav>

      <!-- /.sidebar-menu -->

    </div>

    <!-- /.sidebar -->

  </aside>



    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

