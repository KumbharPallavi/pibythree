<?php 
  include('../include/header.php'); 
  include('../include/sidebar.php'); 
  //print_r($_POST);die();
  if($_POST){
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"]))
    {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < 18; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }

      $file_name                         = $_FILES["image"]["name"];
      $file_tmp                          = $_FILES["image"]["tmp_name"];
      $ext                               = pathinfo($file_name,PATHINFO_EXTENSION);
      $random_file_name                  = $randomString.'.'.$ext;
      $image                   = 'uploads/events/'.$random_file_name;
      if(move_uploaded_file($file_tmp,$physical_dir.$image))
      {
        $name        = $_POST['name'];
        $date__      = $_POST['date'];
        $time        = $_POST['time'];
        $venue       = $_POST['venue'];
        $description = $_POST['description'];
        
        $image     = $image;
        $date      = date('Y-m-d h:i:s');
        $sql       = "INSERT INTO events (name,date,time,venue,description,image,created_at) VALUES ('$name','$date__','$time','$venue','$description','$image','$date')";

        if ($conn->query($sql) === TRUE) {
          $_SESSION['success'] = 'Record added successfully.';
          echo "<script>location.href = '".$dir."/events';</script>";
        } else {
          $_SESSION['error'] = "Error: " . $sql . "<br>" . $conn->error;
          header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        $conn->close();
      }
    }

  }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Events
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Events</a></li>
        <li class="active">Add Events</li>
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
            <form role="form" action="./add.php" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <img id="output_image1" height="250px" width="100%" src="./../dist/img/sample.jpg" />
                  <label for="exampleInputEmail1">Image</label>
                  <input type="file" class="form-control" id="image" onchange="preview_image(event,1)" name="image" required>
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" name="name" required>
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Venue</label>
                  <input type="text" class="form-control" name="venue" required>
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Date</label>
                  <input type="date" class="form-control" name="date" required>
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Time</label>
                  <input type="time" class="form-control" name="time" required>
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea class="form-control" name="description"></textarea>
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
  <script>
    function preview_image(event,id) 
        {   
            var input_id = event.target.id
            var fileInput = document.getElementById(input_id);
            //var filePath = event.path[0].files[0].name;
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.webp)$/i;
            if(!allowedExtensions.exec(filePath))
            {
                fileInput.value = '';
                $("#error_imagepath"+id).text('Please upload file having extensions .jpeg/.jpg/.png/.gif/.webp only.');
                
                $('#output_image'+id).attr("src",'');
                return false;
            }
            else
            {
                //Image preview
                var reader = new FileReader();
                reader.onload = function()
                {
                    var output = document.getElementById('output_image'+id);
                    output.src = reader.result;
                }
                reader.readAsDataURL(event.target.files[0]);
            }
        }
  </script>
<?php include('../include/footer.php'); ?>