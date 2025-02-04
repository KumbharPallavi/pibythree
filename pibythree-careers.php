<?php include('header.php');
  
  if($_POST){
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_FILES["file"]["name"]) && !empty($_FILES["file"]["name"]))
    {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < 18; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }

      $file_name                         = $_FILES["file"]["name"];
      $file_tmp                          = $_FILES["file"]["tmp_name"];
      $ext                               = pathinfo($file_name,PATHINFO_EXTENSION);
      $random_file_name                  = $randomString.'.'.$ext;
      $image                   = 'uploads/pdf/'.$random_file_name;
      if(move_uploaded_file($file_tmp,$physical_dir.$image))
      {
        $title       = preg_replace('/[^a-zA-Z0-9_.@]/', '',$_POST['title']);
        $name        = preg_replace('/[^a-zA-Z0-9_.@]/', '',$_POST['name']);
        $email       = preg_replace('/[^a-zA-Z0-9_.@]/', '',$_POST['email']);
        $mobile_no   = preg_replace('/[^a-zA-Z0-9_.@]/', '',$_POST['mobile_no']);
        
        $pdf     = $image;
        $date      = date('Y-m-d h:i:s');
        $sql       = "INSERT INTO career_application (title,name,email,mobile_no,pdf,created_at) VALUES ('$title','$name','$email','$mobile_no','$pdf','$date')";

        if ($conn->query($sql) === TRUE) {
          $_SESSION['success'] = 'Application submited successfully.';
          //echo "<script>location.href = '".$dir."/banners';</script>";
        } else {
          $_SESSION['error'] = "Error: " . $sql . "<br>" . $conn->error;
          // header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        $conn->close();
      }else{
        print_r($_FILES["image"]);die;
      }
    }

  }
?>

<section class="about-banner">
            <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="banner-img">
                                <img src="images/career-banner.jpg" class="img-fluid" alt="careers-banner">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-text-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">                       
                            <div class="banner-head" data-aos="fade-down">
                                    <h2>Careers</h2>
                                </div>
                                <ol class="breadcrumb breadcrumb-light">
                                    <li class="breadcrumb-item"><a href="<?php echo $home; ?>/index">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Careers</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </header>
    </div>




    <section class="careers careers-1" id="careers">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-6 offset-lg-3">
            <div class="heading heading-19 text-center">
              <p class="heading-subtitle">PibyThree is a Cloud Consulting & Services organization</p>
              <h2 class="heading-title">Welcome to PibyThree </h2>
              <?php if(isset($_SESSION['success']) && !empty($_SESSION['success'])){?>
              <div class="alert alert-success alert-dismissible">
                    <?php echo $_SESSION['success'];?>
                    <button type="button" class="close" data-dismiss="alert">×</button>
                </div>
                <?php $_SESSION['success'] = '';} ?>
                <?php if(isset($_SESSION['error']) && !empty($_SESSION['error'])){?>
              <div class="alert alert-danger alert-dismissible">
                    <?php echo $_SESSION['error'];?>
                    <button type="button" class="close" data-dismiss="alert">×</button>
                </div>
                <?php $_SESSION['error'] = '';} ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <!-- <div class="carousel owl-carousel carousel-dots" data-slide="3" data-slide-rs="1" data-autoplay="true"
              data-nav="false" data-dots="true" data-space="30" data-loop="true" data-speed="800"> -->
              <div class="careers-card-wrapper">
              <?php
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM career_post WHERE status=1 AND is_deleted=1;";
                $result = $conn->query($sql);
                $id = 1;
                 if ($result->num_rows > 0) {
                     while($row = $result->fetch_assoc()) {
                      $pdf_file_url = 'admin/career_post/' . $row['pdf_file']; ?>
                     <div class="careers-card" data-aos="fade-right">
                      <div class="type-wrapper">
                            <label><?php echo $row['type']; ?></label>
                            <label><?php echo $row['location']; ?></label>
                        </div>
                        <label>job-Role</label>
                        <h3><?php echo $row['title']; ?></h3>
                        <label>Job Req ID</label>
                        <br>
                        <span><?php echo $row['job_id']; ?></span><br><br>
                        <label>Job Description</label><br>
                        <a href="<?php echo 'admin/career_post/'.$row['pdf_file']; ?>" target="_blank">Click Here</a>
                        <br>
                        <br>
                        <label>Vacancy</label>
                        <div class="apply-wrapper">
                            <a class="btn btn-success vacancy-btn mt-3">
                                <span class="outer-wrap">
                                    <span data-text="Available"><?php echo $row['position_status']; ?></span>
                                </span>
                            </a>
                            <?php
                              // Full URL of the PDF file
                              $pdf_file_url = 'admin/career_post/'.$row['pdf_file'];
                              ?>
                              <a class="btn btn-default mt-3 apply-now-btn" data-popup="popup1" data-bs-toggle="modal" data-bs-target="#reconmodal"
                                onclick="function_set_value('<?php echo $row['title']; ?>', '<?php echo $row['type']; ?>', '<?php echo $row['location']; ?>');" 
                                >
                                  <span class="outer-wrap">
                                      <span data-text="Apply Now">Apply Now</span>
                                  </span>
                              </a>
                          </div>
                      </div>
                    
              <!-- <div class="career-item"> -->
                <!-- <div class="career-item-wrap"> -->
                  <!-- <div class="career-meta">
                    <p class="career-type"><?php //echo $row['type']; ?></p>
                    <p class="career-place"><?php //echo $row['location']; ?></p>
                  </div> -->

                  <!-- <div class="career-content"> -->
                    <!-- <h4 class="career-title"><?php //echo $row['title']; ?></h4> -->
                    <!-- <p class="career-desc"><?php //echo $row['short_description']; ?></p><a data-bs-toggle="modal" data-bs-target="#reconmodal" onclick="function_set_value('<?php //echo $row['title']; ?>','<?php //echo $row['short_description']; ?>','<?php //echo $row['type']; ?>','<?php //echo $row['location']; ?>')" class="career-more btn btn--secondary" href="contact-us.php">Apply Now <i -->
                        <!-- class="energia-arrow-right"></i></a> -->

                  <!-- </div> -->

                <!-- </div> -->

              <!-- </div> -->
              <?php }}?>

              

            </div>
          </div>
        </div>

      </div>

    </section>
    <div class="modal fade" id="reconmodal" tabindex="-1" aria-labelledby="reconmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
    
        <div class="modal-header">
          <h5 class="modal-title" id="reconmodalLabel">Application Form</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
              class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
          <div class="kubernet-popup-content">
            <h5></h5>
            <form method="post" action="<?php echo $home; ?>/pibythree-careers" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12">
                  
                    <div class="row">
                      <div class="col-md-12">
                        <h4 class="career-title"><span id="title_"></span></h4>
                      </div>
                      <div class="col-md-6">
                        <p class="career-type"><b>Job Type: </b><span id="type_"></span></p>
                      </div>
                      <div class="col-md-6">
                        <p class="career-place"><b>Location: </b><span id="location_"></span></p>
                      </div>
                    </div>
                </div>
              </div>
              <hr>
              <br>
              <br>
              <div class="row">
                <div class="col-md-6">
                  <input class="form-control" type="hidden" id="title" name="title" placeholder="Name" required="" />
                  <input class="form-control" type="text" name="name" placeholder="Name" required="" />
                </div>
                <div class="col-md-6">
                  <input class="form-control" type="text" name="email" placeholder="Email" required="" />
                </div>
                <div class="col-md-6">
                  <input class="form-control" type="text" name="mobile_no" placeholder="Mobile No." required="" />
                </div>
                <div class="col-md-6">
                  <input class="form-control" type="file" id="file" name="file" accept=".pdf" onchange="preview_image(event,1)" required="" />
                  <span id="error_imagepath" style="color: red;"></span>
                </div>
                <div class="col-12">
                   <!-- <button type="submit" class="btn btn--secondary">submit request</button> -->
                   <a class="btn mt-3 submit_request">
                        <span class="outer-wrap">
                            <button type="submit" class="submit"><span data-text="Submit Request">Submit Request</span></button>
                        </span>
                    </a>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
  <script>
    function function_set_value(title,type,location){
      $('#title_').text(title);
      $('#title').val(title);

     
      $('#type_').text(type);
      $('#location_').text(location);
    }
    function preview_image(event,id) 
        {   
            var input_id = event.target.id
            var fileInput = document.getElementById(input_id);
            //var filePath = event.path[0].files[0].name;
            var filePath = fileInput.value;
            var allowedExtensions = /(\.pdf)$/i;
            if(!allowedExtensions.exec(filePath))
            {
                fileInput.value = '';
                $("#error_imagepath").text('Please upload file having extensions .pdf only.');
                
                $('#output_image').attr("src",'');
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

<script>
function setPDFLink(pdfFile) {
    const link = document.getElementById('apply-now-link');
    link.href = pdfFile; // Set the href dynamically to the PDF file URL
}

</script>


<?php include('footer.php');?>