<?php 
include('../include/header.php');
include('../include/sidebar.php'); 
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM blogs WHERE id=".base64_decode($_GET['id'])." limit 1";
  $result = $conn->query($sql);
  $name = '';
  $image = '';
  $description = '';
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $description = base64_decode($row['description']);
    }
  }

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Blogs Page
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Blogs Page</a></li>
        <li class="active">View Blogs Page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Preview:</label>
                  <div style="border:1px solid black;margin: 5px;padding: 10px"><p><?php echo $description; ?></p></div>
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