<?php 
  include('../include/header.php'); 
  include('../include/sidebar.php'); 
  if($_POST){
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $name      = $_POST['name'];
    $mobile_no = $_POST['mobile_no'];
    $email     = $_POST['email'];
    $date      = date('Y-m-d h:i:s');
    $_id = base64_decode($_GET['id']);
    // print_r($_id);die;
    $sql1 = "SELECT * FROM users WHERE (email='$email' OR mobile_no='$mobile_no') AND  id!='$_id' limit 1";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
      $_SESSION['error'] = 'Email or Mobile No. already exist.';
      //echo "<script>location.href = '".$dir."/user';</script>";
    }else{
      $sql       = "UPDATE users SET name='$name',mobile_no='$mobile_no',email='$email',updated_at='$date' WHERE id=".base64_decode($_GET['id']);

      if ($conn->query($sql) === TRUE) {
      $_SESSION['success']   = 'Record upated successfully.';
        echo "<script>location.href = '".$dir."/user';</script>";
      } else {
        $_SESSION['success'] = 'Record upated successfully.';
        echo "<script>location.href = '".$dir."/user';</script>";
      }
    }

    $conn->close();
  }

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql       = "SELECT * FROM users WHERE id=".base64_decode($_GET['id'])." limit 1";
  $result    = $conn->query($sql);
  $id        = '';
  $name      = '';
  $mobile_no = '';
  $email     = '';

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $id        = $row['id'];
      $name      = $row['name'];
      $mobile_no = $row['mobile_no'];
      $email     = $row['email'];
    }
  }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Admin User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin User</a></li>
        <li class="active">Edit Admin User</li>
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
            <form role="form" action="./edit.php?id=<?php echo base64_encode($id); ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Mobile No.</label>
                  <input type="number" class="form-control" name="mobile_no" value="<?php echo $mobile_no; ?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email(Username)</label>
                  <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required>
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