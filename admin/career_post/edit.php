<?php 
  include('../include/header.php'); 
  include('../include/sidebar.php'); 
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
    $status            = 1;
    $date              = date('Y-m-d h:i:s');
    $id                = base64_decode($_GET['id']);
    // $sql               = "UPDATE career_post SET title='$title',location='$location',type='$type',job_id='$job_id',experience='$experience',position_status='$position_status',short_description='$short_description',created_at='$date' WHERE id=".base64_decode($_GET['id']);

    // Handle file upload
    $pdf_file = $_FILES['pdf_file'];
    $target_dir = "uploads/"; // Directory to save the uploaded files
    $pdf_file_path = $pdf_file;
    $target_file = $target_dir . basename($pdf_file["name"]);
    $upload_ok = 1;

// Check if file is uploaded and is a PDF
if (!empty($_FILES['pdf_file']['name'])) {
  $pdf_file = $_FILES['pdf_file'];
  $file_name = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $pdf_file["name"]);
  $target_file = $target_dir . $file_name;

  // Validate file type
  $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  if ($file_type != "pdf") {
      echo "Only PDF files are allowed.";
      exit;
  }

   // Move the file to the target directory
   if (move_uploaded_file($pdf_file["tmp_name"], $target_file)) {
    $pdf_file_path = $target_file; // Update the file path
} else {
    echo "Failed to upload the file.";
    exit;
}
}
      // Update query with the PDF file
      $sql = "UPDATE career_post 
              SET title='$title',
                  location='$location',
                  type='$type',
                  job_id='$job_id',
                  experience='$experience',
                  position_status='$position_status',
                  short_description='$short_description',
                  pdf_file='$target_file',
                  created_at='$date' 
              WHERE id=$id";
   if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql               = "SELECT * FROM career_post WHERE id=".base64_decode($_GET['id'])." limit 1";
  $result            = $conn->query($sql);
  $id                = '';
  $title             = '';
  $location          = '';
  $type              = '';
  $job_id            = '';
  $experience        = '';
  $position_status   = '';
  $short_description = '';
  $pdf_file          = '';


  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $id                = $row['id'];
      $title             = $row['title'];
      $location          = $row['location'];
      $type              = $row['type'];
      $job_id            = $row['job_id'];
      $experience        = $row['experience'];
      $position_status   = $row['position_status'];
      $short_description = $row['short_description'];
      $pdf_file          = $row['pdf_file'];
    }
  }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Career Post
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Career Post</a></li>
        <li class="active">Edit Career Post</li>
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
            <form role="form" action="./edit.php?id=<?php echo base64_encode($id); ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="title" value="<?php echo $title; ?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Location</label>
                  <input type="text" class="form-control" name="location" value="<?php echo $location; ?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Type</label>
                  <input type="text" class="form-control" name="type" value="<?php echo $type; ?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Job Id</label>
                  <textarea class="form-control" name="job_id" required><?php echo $job_id; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Experience</label>
                  <textarea class="form-control" name="experience" required><?php echo $experience; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Position Status</label>
                  <textarea class="form-control" name="position_status" required><?php echo $position_status; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Short Description</label>
                  <textarea class="form-control" name="short_description" required><?php echo $short_description; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Current Job Description</label>
                  <?php if (!empty($pdf_file)) : ?>
                    <p>
                      <a href="<?php echo $pdf_file; ?>" target="_blank">View Current PDF</a>
                    </p>
                  <?php else : ?>
                    <p>No PDF uploaded yet.</p>
                  <?php endif; ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Upload New Job Description (PDF)</label>
                  <input type="file" name="pdf_file" accept="application/pdf">
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