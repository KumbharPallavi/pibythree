<?php 
  include('./include/header.php'); 
  include('./include/sidebar.php'); 
  //print_r($_POST);die();
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $session_login = $_SESSION['email'];
  $sql       = "SELECT * FROM users WHERE email='$session_login' limit 1";
  $result    = $conn->query($sql);
  $password  = '';
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

      $password = base64_encode(base64_encode($row['password']));

    }
  }

  if($_POST){
    if($password==$_POST['o_p']){
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $password      = base64_encode(base64_encode($_POST['password']));
      $date      = date('Y-m-d h:i:s');
      $sql       = "UPDATE users SET password='$password' WHERE email='$session_login'";

      if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = 'Record updated successfully.';
        // header('Location: ./index.php');
      } else {
        $_SESSION['success'] = 'Record updated successfully.';
        //header('Location: ' . $_SERVER['HTTP_REFERER']);
      }

      $conn->close();

    }else{
      $_SESSION['error'] = 'Old password is wrong. Please try again.';
    }
  }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change Password
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Change Password</li>
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
      <?php if(isset($_SESSION['success']) && !empty($_SESSION['success'])){?>
      <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $_SESSION['success'];?>
        </div>
      <?php $_SESSION['success'] = '';} ?>
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- form start -->
            <form role="form" action="./change_password.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Old Password</label>
                  <input type="password" class="form-control" name="o_p" required>
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
<?php include('./include/footer.php'); ?>