<?php 
  include('../include/header.php'); 
  include('../include/sidebar.php'); 
  //print_r($_POST);die();
  if($_POST){
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $title             = $_POST['title'];
    $location          = $_POST['location'];
    $type              = $_POST['type'];
    $job_id            = $_POST['job_id'];
    $experience        = $_POST['experience'];
    $position_status   = $_POST['position_status'];
    $short_description = str_replace("'", "", $_POST['short_description']);
    $date              = date('Y-m-d h:i:s');
    // $sql               = "INSERT INTO career_post (title, location,type,job_id,experience,position_status,short_description,created_at) VALUES ('$title', '$location','$type','$job_id','$experience','$position_status','$short_description','$date')";

    // Handle file upload
$pdf_file = $_FILES['pdf_file'];
$target_dir = "uploads/"; // Directory to save the uploaded files
$target_file = $target_dir . basename($pdf_file["name"]);
$upload_ok = 1;

// Check if file is a PDF
$file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if ($file_type != "pdf") {
    echo "Only PDF files are allowed.";
    $upload_ok = 0;
}

// Move uploaded file to the target directory
if ($upload_ok && move_uploaded_file($pdf_file["tmp_name"], $target_file)) {
    // Insert data into the database
    $sql = "INSERT INTO career_post (title, location, type, job_id, experience, position_status, short_description, pdf_file, created_at)
            VALUES ('$title', '$location', '$type', '$job_id', '$experience', '$position_status', '$short_description', '$target_file', '$date')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Failed to upload the file.";
}


    if ($conn->query($sql) === TRUE) {
      $_SESSION['success'] = 'Record added successfully.';
      echo "<script>location.href = '".$dir."/career_post';</script>";
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
        Add Career Post
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Career Post</a></li>
        <li class="active">Add Career Post</li>
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
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Location</label>
                  <input type="text" class="form-control" name="location" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Type</label>
                  <input type="text" class="form-control" name="type" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Short Description</label>
                  <textarea class="form-control" name="short_description" required></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Job_id</label>
                  <textarea class="form-control" name="job_id" required></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Experience</label>
                  <textarea class="form-control" name="experience" required></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Position Status</label>
                  <textarea class="form-control" name="position_status" required></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Job Description</label>
                  <input type="file" name="pdf_file" accept="application/pdf" required>
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
  
<?php include('../include/footer.php'); ?>