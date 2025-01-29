<?php 
  include('../include/header.php'); 
  include('../include/sidebar.php'); 
  if($_POST){


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
      $image                   = 'uploads/banners/'.$random_file_name;
      if(move_uploaded_file($file_tmp,$physical_dir.$image))
      {
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $name        = $_POST['name'];
        $description = base64_encode($_POST['description']);
        $image       = $image;
        $date        = date('Y-m-d h:i:s');
        $sql         = "UPDATE banners SET name='$name',description='$description',image='$image',updated_at='$date' WHERE id=".base64_decode($_GET['id']);

        if ($conn->query($sql) === TRUE) {
          $_SESSION['success'] = 'Record added successfully.';
          echo "<script>location.href = '".$dir."/banners';</script>";
        } else {
          $_SESSION['error'] = "Error: " . $sql . "<br>" . $conn->error;
          header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
      }
    }
    else{
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $name        = $_POST['name'];
      $description = base64_encode($_POST['description']);
      $date        = date('Y-m-d h:i:s');
      $sql         = "UPDATE banners SET name='$name',description='$description',updated_at='$date' WHERE id=".base64_decode($_GET['id']);

      if ($conn->query($sql) === TRUE) {
      $_SESSION['success']   = 'Record upated successfully.';
        echo "<script>location.href = '".$dir."/banners';</script>";
      } else {
        $_SESSION['success'] = 'Record upated successfully.';
        echo "<script>location.href = '".$dir."/banners';</script>";
      }
    }
  }

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql       = "SELECT * FROM banners WHERE id=".base64_decode($_GET['id'])." limit 1";
  $result    = $conn->query($sql);
  $id        = '';
  $name      = '';
  $image     = '';
  $description = '';
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

      $id          = $row['id'];
      $name        = $row['name'];
      $image       = $row['image'];
      $description = $row['description'];

    }
  }
?>
<style type="text/css">
  .ck-editor__editable {
    min-height: 400px !important;
}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Banners
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Banners</a></li>
        <li class="active">Edit Banners</li>
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
                  <img id="output_image1" height="250px" width="100%" src="../<?php echo $image; ?>" />
                  <label for="exampleInputEmail1">Image</label>
                  <input type="file" class="form-control" id="image" onchange="preview_image(event,1)" name="image" >
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required>
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea class="form-control" id="editor" rows="6"  name="description"><?php echo str_replace( '&', '&amp;', base64_decode($description)); ?></textarea>
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
  <!-- /.content-wrapper -->
<?php include('../include/footer.php'); ?>