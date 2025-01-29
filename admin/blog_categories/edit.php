<?php 
  include('../include/header.php'); 
  include('../include/sidebar.php'); 
  if($_POST){
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $name      = $_POST['name'];
    $date      = date('Y-m-d h:i:s');
    $sql       = "UPDATE blog_categories SET name='$name',updated_at='$date' WHERE id=".base64_decode($_GET['id']);

    if ($conn->query($sql) === TRUE) {
    $_SESSION['success']   = 'Record upated successfully.';
      echo "<script>location.href = '".$dir."/blog_categories';</script>";
    } else {
      $_SESSION['success'] = 'Record upated successfully.';
      echo "<script>location.href = '".$dir."/blog_categories';</script>";
    }

    $conn->close();
  }

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql       = "SELECT * FROM blog_categories WHERE id=".base64_decode($_GET['id'])." limit 1";
  $result    = $conn->query($sql);
  $id        = '';
  $name      = '';
  $mobile_no = '';
  $email     = '';

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $id        = $row['id'];
      $name      = $row['name'];
    }
  }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Blog Categories
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Blog Categories</a></li>
        <li class="active">Edit Blog Categories</li>
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
            <form role="form" action="./edit.php?id=<?php echo base64_encode($id); ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
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