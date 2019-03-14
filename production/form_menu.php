<?php
include("controller/doconnect.php");
session_start();
include("controller/session.php");
include("query/find_ledger.php");
include("query/redirect_billing.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bonne Journée! </title>

        <!-- Toastr -->
    <link rel="stylesheet" href="../vendors/toastr/toastr.min.css">
    <script src="../vendors/toastr/jquery-1.9.1.min.js"></script>
    <script src="../vendors/toastr/toastr.min.js"></script>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome-2/css/all.css" rel="stylesheet"> 
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../production/common/error.js"></script>

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        
        <!-- Sidebar Menu -->
        <?php
          if ($_SESSION['userRole'] == "Staff"){
            session_destroy(); 

            session_start();
            $logout = true;
            $_SESSION['logout'] = $logout;
            
            header("location: login.php"); 
          } else if ($_SESSION['userRole'] == "Admin") {
            include("view/sidebar.php");
          }
        ?>
        <!-- End Of Sidebar  -->
        
        <!-- Top Navigation -->
        <?php include("view/top_navigation.php"); ?>
        <!-- End Of Top Navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Validation Item</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form validation <small>sub title</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form id="formregistergoods" class="form-horizontal form-label-left" action="controller/doaddnewgoods.php" method="POST">

                      <span class="section">Master Item Info</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="description" name="description" required="required" class="form-control col-md-7 col-xs-12" placeholder="Contoh: Cuci Satuan">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qty">Waktu Pengerjaan <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                          <input type="number" id="waktu_pengerjaan" name="waktu_pengerjaan" required="required" min="1" max="9999" class="form-control col-md-7 col-xs-12" placeholder="Contoh: 2 JAM">
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                          <select name="satuan_waktu_pengerjaan" id="satuan_waktu_pengerjaan" class="form-control col-lg-3 col-md-3 col-xs-4 category">
                            <option value="60">JAM</option>
                            <option value="1440">HARI</option>
                            <option value="10080">MINGGU</option>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Category 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="category" id="category" onchange="showfield(this.options[this.selectedIndex].value)" class="form-control col-md-7 col-xs-12 category">
                          <option value="uncategorized">Select Or Add Category</option>
                          
                           <?php
                            $sql = "SELECT distinct category 
                            FROM inventory
                            where ledger_id = '".$ledger_new."'
                            ";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                          ?>
                              <option value="<?php echo $row["category"] ?>"> <?php echo $row["category"] ?></option>
                          <?php
                            }
                          ?>

                          <option value="Other" name="Other">Add Category</option>
                          </select>
                          <div id="div1"></div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qty">Apakah Item Jual<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                          <div class="radio">
                            <label>
                              <input type="radio" checked="" class="flat" value="y" name="optionsRadios"> Ya
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" value="n" class="flat" name="optionsRadios"> Tidak
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qty">Unit Satuan<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                          <div class="radio">
                            <label>
                              <input type="radio" checked="" class="flat" value="KG"  name="optionsRadios2"> KG 
                            </label>
                            <label>
                              <input type="radio" value="Satuan" class="flat"  name="optionsRadios2"> Satuan 
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" value="Meter Persegi" class="flat"  name="optionsRadios2"> m<sup>2</sup> (Meter Persegi) 
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-12 col-xs-12" align="center">
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="x_panel">
                  <form class="form-horizontal" action="controller/export_index_csv.php" method="post" name="upload_excel" enctype="multipart/form-data">
                     <fieldset>
                              <!-- Form Name -->
                              <legend>MASS ADD CSV </legend>
       
                              <!-- File Button -->
                              <div class="form-group">
                                  <label class="col-md-4 control-label " for="filebutton">Select File</label>
                                  <div class="col-md-4">
                                      <input type="file" name="file" id="file" class="input-large">
                                  </div>
                              </div>
       
                              <!-- Button -->
                              <div class="form-group">
                                  <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                                  <div class="col-md-4">
                                      <button type="submit" name="Import_inventory" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                                  </div>
                              </div>      
                       </fieldset>
                 </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include("view/footer.php"); ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <!-- jQuery custom content scroller -->
    <script src="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>


    <script type="text/javascript">
    function showfield(name){
      if(name=='Other'){
        document.getElementById('div1').innerHTML='<input type="text" name="category" id="otherCategory" class="form-control col-md-7 col-xs-12 category" />';
      } else {
        document.getElementById('div1').innerHTML='';
      }
    }
    </script>



  </body>
</html>