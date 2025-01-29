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
    $mobile_no = $_POST['mobile_no'];
    $email     = $_POST['email'];
    $password  = base64_encode(base64_encode($_POST['password']));
    $date      = date('Y-m-d h:i:s');
    $sql1 = "SELECT * FROM users WHERE email='$email' OR mobile_no='$mobile_no'  limit 1";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
      $_SESSION['error'] = 'Email or Mobile No. already exist.';
      //header('Location: ./index.php');
    }else{

      $sql       = "INSERT INTO users (name, mobile_no,email,password,created_at) VALUES ('$name', '$mobile_no','$email','$password','$date')";

      if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = 'Record added successfully.';
        header('Location: ./index.php');
      } else {
        $_SESSION['error'] = "Error: " . $sql . "<br>" . $conn->error;
        // header('Location: ' . $_SERVER['HTTP_REFERER']);
      }
    }

    $conn->close();
  }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Admin User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin User</a></li>
        <li class="active">Add Admin User</li>
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
                <div class="form-group">
                  <label for="exampleInputEmail1">Mobile No.</label>
                  <input type="number" class="form-control" name="mobile_no" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email(Username)</label>
                  <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Confirm Password</label>
                  <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
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
  <script type="text/javascript">
    var password = document.getElementById("password")
    var confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
    if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
    confirm_password.setCustomValidity('');
    }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
  </script>
  <!-- /.content-wrapper -->
<?php include('../include/footer.php'); ?>