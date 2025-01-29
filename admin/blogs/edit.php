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
      $image                   = 'uploads/blogs/'.$random_file_name;
      if(move_uploaded_file($file_tmp,$physical_dir.$image))
      {
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $title            = $_POST['title'];
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title'])));
        $category         = $_POST['category'];
        $tag              = json_encode($_POST['tag']);
        $publish          = $_POST['publish'];
        $created_at          = $_POST['created_at'];
        $meta             = $_POST['meta'];
        $shot_description = str_replace("'", "", $_POST['shot_description']);
        $description      = base64_encode($_POST['description']);
        $image       = $image;
        $date        = date('Y-m-d h:i:s');
        $sql         = "UPDATE blogs SET slug='$slug',title='$title',category='$category',tag='$tag',publish='$publish',created_at='$created_at',meta='$meta',shot_description='$shot_description',description='$description',image='$image',updated_at='$date' WHERE id=".base64_decode($_GET['id']);

        if ($conn->query($sql) === TRUE) {
          $_SESSION['success'] = 'Record added successfully.';
          echo "<script>location.href = '".$dir."/blogs';</script>";
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
        $title            = $_POST['title'];
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title'])));
        $category         = $_POST['category'];
        $tag              = json_encode($_POST['tag']);
        $publish          = $_POST['publish'];
        $created_at          = $_POST['created_at'];
        $meta             = $_POST['meta'];
        $shot_description = str_replace("'", "", $_POST['shot_description']);
        $description      = base64_encode($_POST['description']);
      $date        = date('Y-m-d h:i:s');
      $sql         = "UPDATE blogs SET slug='$slug',title='$title',category='$category',tag='$tag',publish='$publish',created_at='$created_at',meta='$meta',shot_description='$shot_description',description='$description',updated_at='$date' WHERE id=".base64_decode($_GET['id']);

      if ($conn->query($sql) === TRUE) {
      $_SESSION['success']   = 'Record upated successfully.';
        echo "<script>location.href = '".$dir."/blogs';</script>";
      } else {
        $_SESSION['success'] = 'Record upated successfully.';
        echo "<script>location.href = '".$dir."/blogs';</script>";
      }
    }
  }

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql       = "SELECT * FROM blogs WHERE id=".base64_decode($_GET['id'])." limit 1";
  $result    = $conn->query($sql);
  $id        = '';
  $title            = '';
  $category         = '';
  $tag              = '';
  $publish          = '';
  $created_at     = '';
  $meta             = '';
  $shot_description = '';
  $description      = '';
  $image            = '';
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

      $id               = $row['id'];
      $image            = $row['image'];
      $title            = $row['title'];
      $category         = $row['category'];
      $tag              = json_decode($row['tag']);
      $publish          = $row['publish'];
      $created_at       = $row['created_at'];
      $meta             = $row['meta'];
      $shot_description = $row['shot_description'];
      $description      = base64_decode($row['description']);

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
        Edit Blogs
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Blogs</a></li>
        <li class="active">Edit Blogs</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- form start -->
            <form role="form" action="./edit.php?id=<?php echo base64_encode($id); ?>" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-3">
                  <div class="box-body">
                    <div class="form-group">
                      <img id="output_image1" height="250px" width="100%" src="../<?php echo $image; ?>" />
                      <label for="exampleInputEmail1">Image</label>
                      <input type="file" class="form-control" id="image" onchange="preview_image(event,1)" name="image" >
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" name="title" value="<?php echo $title; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category</label>
                      <select class="form-control" name="category" required>
                        <option value="">Select</option>
                        <?php 
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM blog_categories WHERE is_deleted=1";
                        $result = $conn->query($sql);
                        $id = 1;
                        if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                        ?>
                          <option value="<?php echo $row['id']; ?>" <?php echo ($row['id']==$category)? 'selected':'' ;?>><?php echo $row['name']; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tag</label>
                      <select class="form-control" name="tag[]" multiple required>
                        <option value="">Select</option>
                        <?php 
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM blog_tags WHERE is_deleted=1";
                        $result = $conn->query($sql);
                        $id = 1;
                        if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                        ?>
                          <option value="<?php echo $row['id']; ?>" <?php echo (in_array($row['id'], $tag))? 'selected':'' ;?>><?php echo $row['name']; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Publish</label>
                      <select class="form-control" name="publish" required>
                        <option value="">Select</option>
                        <option value="1" <?php echo ($publish=='1')? 'selected':''; ?>>Draft</option>
                        <option value="0" <?php echo ($publish=='0')? 'selected':''; ?>>Publish</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Publish Date</label>
                      <input type="date" class="form-control" name="created_at" value="<?php echo $created_at; ?>" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6" style="display: none;">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Meta Tags</label>
                      <textarea class="form-control" name="meta"><?php echo $meta; ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Short Description</label>
                      <textarea class="form-control" name="shot_description"><?php echo $shot_description; ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea class="form-control" id="editor" rows="6" name="description"><?php echo str_replace( '&', '&amp;', $description)?></textarea>
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
        // CKEDITOR.instances['editor'].setData(<?php echo $description; ?>);
  </script>
  <!-- /.content-wrapper -->
<?php include('../include/footer.php'); ?>