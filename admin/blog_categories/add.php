<?php 
  include('../include/header.php'); 
  include('../include/sidebar.php'); 
  //print_r($_POST);die();
  if($_POST){
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $name      = $_POST['name'];
    $date      = date('Y-m-d h:i:s');
    $sql       = "INSERT INTO blog_categories (name,created_at) VALUES ('$name','$date')";

    if ($conn->query($sql) === TRUE) {
      $_SESSION['success'] = 'Record added successfully.';
      echo "<script>location.href = '".$dir."/blog_categories';</script>";
      // header('Location: ./index.php');
    } else {
      $_SESSION['error'] = "Error: " . $sql . "<br>" . $conn->error;
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    $conn->close();
  }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Blog Categories
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Blog Categories</a></li>
        <li class="active">Add Blog Categories</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php if(isset($_SESSION['error']) && !empty($_SESSION['error'])){?>
      <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $_SESSION['error'];?>
        </div>
      <?php $_SESSION['error'] = '';} ?>
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- form start -->
            <form role="form" action="./add.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" name="name" required>
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