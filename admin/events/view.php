<?php 
include('../include/header.php');
include('../include/sidebar.php'); 
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM events WHERE id=".base64_decode($_GET['id'])." limit 1";
  $result = $conn->query($sql);
  $name = '';
  $image = '';
  $date = '';
  $venue = '';
  $description = '';
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $image = $row['image'];
      $name = $row['name'];
      $date = $row['date'];
      $time = $row['time'];
      $venue = $row['venue'];
      $description = $row['description'];
    }
  }

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Events
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Events</a></li>
        <li class="active">View Events</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <img height="250px" width="100%" src="../<?php echo $image; ?>" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <?php echo $name; ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Date</label>
                  <?php echo $date.' '.$time; ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Venue</label>
                  <?php echo $venue; ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <?php echo $description; ?>
                </div>
                  
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="./" class="btn btn-primary pull-right">Back</a>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('../include/footer.php'); ?>