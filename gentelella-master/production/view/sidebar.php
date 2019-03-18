<div class="col-md-3 left_col menu_fixed">
  <div class="left_col scroll-view">
    <div class="navbar nav_title">
      <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2><?php echo($user_check); ?></h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a href="index.php"><i class="fa fa-home"></i> Dashboard </a></li>
          <li><a><i class="fa fa-table"></i> Reports <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="sales_summary.php">Sales Summary</a></li>
              <li><a href="gross_profit.php">Gross Profit</a></li>
              <li><a href="payment_method.php">Payment Method</a></li>
              <li><a href="category_sales.php">Category Sales</a></li>
              <li><a href="outstanding_sales.php">Outstanding Sales</a></li>
              <li><a href="outstanding_ap.php">Outstanding AP</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="form_validation.php">Master Item Form</a></li>
              <li><a href="form_menu_bulanan.php">Tambah Menu Paket Bulanan</a></li>
              <li><a href="cogs.php">Cost of Goods Sold (COGS) Manual</a></li>
              <li><a href="adjustment_inventory.php">Adjustment Inventory</a></li>
              <li><a href="form_customer.php">Input Data Customer</a></li>
              <li><a href="form_supplier.php">Input Data Supplier</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-desktop"></i> Transactions <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="media_gallery.php">Account Receiveable</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="table_inventory.php">Table Inventory</a></li>
              <li><a href="table_invoice.php">Sales Invoice Summary</a></li>
              <li><a href="table_cogs.php">Table COGS</a></li>              
            </ul>
          </li>
          <li><a><i class="fas fa-store" style="width:26px; opacity:99; font-size:15px"></i> Outlets Settings <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="outlets.php">Outlets</a></li>
              <li><a href="employees.php">Employees</a></li>
            </ul>
          </li>
        </ul>
      </div>

    </div>
    <!-- /sidebar menu -->
  </div>
</div>