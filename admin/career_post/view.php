<?php 
include('../include/header.php');
include('../include/sidebar.php'); 
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql               = "SELECT * FROM career_post WHERE id=".base64_decode($_GET['id'])." limit 1";
  $result            = $conn->query($sql);
  $title             = '';
  $location          = '';
  $type              = '';
  $short_description = '';
  $job_id            = '';
  $experience        = '';
  $position_status   = '';
  $target_dir        = "uploads/";
  $pdf_file          = '';

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

      $title             = $row['title'];
      $location          = $row['location'];
      $type              = $row['type'];
      $short_description = $row['short_description'];
      $job_id            = $row['job_id'];
      $experience        = $row['experience'];
      $position_status   = $row['position_status'];
      $pdf_file          = $row['pdf_file'];
    }
  }

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Career Post
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Career Post</a></li>
        <li class="active">View Career Post</li>
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
                  <label for="exampleInputEmail1">Title</label>
                  <?php echo $title; ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Location</label>
                  <?php echo $location; ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Type</label>
                  <?php echo $type; ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Short Description</label>
                  <?php echo $short_description; ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Job Id</label>
                  <?php echo $job_id; ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Experience</label>
                  <?php echo $experience; ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Position Status</label>
                  <?php echo $position_status; ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Job Description</label>
                  <?php if (!empty($pdf_file)) : ?>
                    <p>
                      <a href="<?php echo $pdf_file; ?>" target="_blank">View Current PDF</a>
                    </p>
                  <?php else : ?>
                    <p>No PDF uploaded yet.</p>
                  <?php endif; ?>
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