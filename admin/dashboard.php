<?php include('./include/header.php'); ?>
<?php include('./include/sidebar.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <?php 

    $conn1 = new mysqli($servername, $username, $password, $dbname);
     if ($conn1->connect_error) {
       die("Connection failed: " . $conn1->connect_error);
     }
    $sql1 = "SELECT * FROM users WHERE status=1 AND is_deleted=1;";
    $result1 = $conn1->query($sql1);
    $count1 = $result1->num_rows;

    $sql1 = "SELECT * FROM blogs WHERE status=1 AND is_deleted=1;";
    $result1 = $conn1->query($sql1);
    $count2 = $result1->num_rows;

    $sql1 = "SELECT * FROM events WHERE status=1 AND is_deleted=1;";
    $result1 = $conn1->query($sql1);
    $count3 = $result1->num_rows;

    $sql1 = "SELECT * FROM contact_us WHERE status=1 AND is_deleted=1;";
    $result1 = $conn1->query($sql1);
    $count4 = $result1->num_rows;

    ?>
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Admin Users</span>
              <span class="info-box-number"><?php echo $count1;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-file-text"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Blogs</span>
              <span class="info-box-number"><?php echo $count2;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-calendar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Events</span>
              <span class="info-box-number"><?php echo $count3;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-address-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Contact Us</span>
              <span class="info-box-number"><?php echo $count4;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('./include/footer.php'); ?>