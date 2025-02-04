<?php include($_SERVER['DOCUMENT_ROOT'] . '/pibythree-revamp/header.php');

// Database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the slug from the query string
$slug = isset($_GET['slug']) ? $_GET['slug'] : '';
if (empty($slug)) {
    die("Invalid slug"); // Exit if the slug is missing
}

// Fetch blog data using the slug
$sql = "SELECT * FROM blogs WHERE slug = ? AND status = 1 AND is_deleted = 1 LIMIT 1";
$sql1 = "SELECT * FROM blog_categories WHERE status = 1 AND is_deleted = 1 LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt1 = $conn->prepare($sql1);
$stmt->bind_param("s", $slug);
$stmt->execute();
$result = $stmt->get_result();

// $stmt1->bind_param("s1", $slug);
$stmt1->execute();
$result1 = $stmt1->get_result();

if ($result->num_rows > 0) {
    $blog = $result->fetch_assoc();
} else {
    die("Blog not found");
}

if ($result1->num_rows > 0) {
  $category = $result1->fetch_assoc();
} else {
  die("category not found");
}
?>

<section class="page-title page-title-blank-2 bg-white" id="page-title">
      <div class="container">
        <div class="row">
          <div class="col">
            <h1 class="d-none">The Influence of Environmental Conditions in Arctic Regions.</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="breadcrumb-wrap">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $home; ?>/">Home<br></a></li>
                <li class="breadcrumb-item"><a href="<?php echo $home; ?>/blog">blog<br></a></li>
                <li class="breadcrumb-item"><a href=""><?php echo $category['id']; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href=""><?php echo $blog['title']; ?></a></li>
              </ol>
            </div>

          </div>

        </div>

      </div>

    </section>

    <section class="blog blog-single" id="blog">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-8">
            <div class="entry-title">
              <h4><?php echo $blog['title']; ?></h4>
            </div>
            <div class="blog-entry">

              <div class="entry-img"><img src="<?php echo $dir.'/'.$blog['image']; ?>" alt="entry image" />
                <div class="entry-meta">
                  <div class="entry-category"><a href="<?php echo $home; ?>/category.php?id=<?php echo base64_encode($blog['category']); ?>"><?php echo $category['name']; ?></a></div>
                  <div class="entry-date"> <span class="date"><?php echo date('M Y',strtotime($blog['created_at'])); ?></span></div>
                  <div class="entry-author"><a href="blog.html">Admin</a></div>
                </div>

              </div>
              <div class="entry-content">

                <div class="entry-bio">
                  <p><?php echo base64_decode($blog['description']); ?></p>
                </div>
                <div class="entry-holder">
                  <div class="entry-tags"><span>tags: </span>
                    <?php
                    $tag = $blog['tag'];
                      $conn = new mysqli($servername, $username, $password, $dbname);
                      if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                      }
                      if(!empty($tag)){
                        $sql = "SELECT * FROM blog_tags WHERE id IN (".implode(',', json_decode($tag)).") AND status=1 AND is_deleted=1;";
                      }else{

                        $sql = "SELECT * FROM blog_tags WHERE id=0 AND status=1 AND is_deleted=1;";
                      }

                        //print_r($sql);die;

                      $result = $conn->query($sql);
                      $id = 1;
                       if ($result->num_rows > 0) {
                           while($row = $result->fetch_assoc()) { ?>
                           <a href="<?php echo $home; ?>/tag.php?id=<?php echo base64_encode($row['id']); ?>"><?php echo $row['name']; ?></a>
                     <?php }} ?>
                  </div>



                </div>
              </div>
              <div class="nav-posts">
               <?php
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM blogs WHERE status=1 AND is_deleted=1 limit 2;";
                $result = $conn->query($sql);
                $id = 1;
                 if ($result->num_rows > 0) {
                     while($row = $result->fetch_assoc()) { 

                        if($id % 2 != 0){ ?>

                            <div class="prev-post">
                              <div class="post-img">
                                <div class="overlay"> <i class="energia-arrow-right"></i></div><img
                                  src="<?php echo $dir.'/'.$row['image']; ?>" alt="title" />
                              </div>
                              <div class="post-body"><span>previous post</span><a class="post-link" href="<?php echo $home; ?>/blog-single.php/<?php echo $row['slug'];?>"><?php echo $row['title']; ?></a></div>
                            </div>
                        <?php }else{ ?>
                            <div class="next-post">
                              <div class="post-body"><span>next post</span><a class="post-link" href="<?php echo $home; ?>/blog-single.php/<?php echo $row['slug'];?>"><?php echo $row['title']; ?></a></div>
                              <div class="post-img">
                                <div class="overlay"> <i class="energia-arrow-right"></i></div><img
                                  src="<?php echo $dir.'/'.$row['image']; ?>" alt="title" />
                              </div>
                            </div>
                        <?php } ?>
               <?php }} ?>
              </div>





            </div>

          </div>

          <div class="col-12 col-lg-4">

            <div class="sidebar sidebar-blog">




              <div class="widget widget-recent-posts">
                <div class="widget-title">
                  <h5>recent posts</h5>
                </div>
                <div class="widget-content">
                  <?php
                   $conn = new mysqli($servername, $username, $password, $dbname);
                   if ($conn->connect_error) {
                     die("Connection failed: " . $conn->connect_error);
                   }

                   $sql = "SELECT * FROM blogs WHERE status=1 AND is_deleted=1 limit 4;";
                   $result = $conn->query($sql);
                   $id = 1;
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { ?>
                  <div class="post">
                    <div class="post-img"><img src="<?php echo $dir.'/'.$row['image']; ?>" alt="post img" /></div>
                    <div class="post-content">
                      <div class="post-date"><span class="date"><?php echo date('M Y',strtotime($row['created_at'])); ?></span></div>
                      <div class="post-title"><a href="<?php echo $home; ?>/blog-single.php/<?php echo $row['slug'];?>"><?php echo $row['title']; ?></a></div>
                    </div>
                  </div>
                  <?php }} ?>

                </div>
              </div>


              <div class="widget widget-categories">
                <div class="widget-title">
                  <h5>categories</h5>
                </div>
                <div class="widget-content">
                  <ul class="list-unstyled">
                     <?php
                      $conn = new mysqli($servername, $username, $password, $dbname);
                      if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                      }

                      $sql = "SELECT * FROM blog_categories WHERE status=1 AND is_deleted=1;";
                      $result = $conn->query($sql);
                      $id = 1;
                       if ($result->num_rows > 0) {
                           while($row = $result->fetch_assoc()) { 
                              $id= $row['id'];
                              $conn1 = new mysqli($servername, $username, $password, $dbname);
                               if ($conn1->connect_error) {
                                 die("Connection failed: " . $conn1->connect_error);
                               }
                              $sql1 = "SELECT * FROM blogs WHERE category='$id' AND status=1 AND is_deleted=1;";
                              $result1 = $conn1->query($sql1);
                              $count = $result1->num_rows;
                              ?>
                        <li><a href="<?php echo $home; ?>/category.php?id=<?php echo base64_encode($id); ?>"><?php echo $row['name']; ?></a><span><?php echo $count;?></span></li>
                     <?php }} ?>
                  </ul>
                </div>
              </div>


              <div class="widget widget-tags">
                <div class="widget-title">
                  <h5>Tags</h5>
                </div>
                <div class="widget-content">
                  <?php
                      $conn = new mysqli($servername, $username, $password, $dbname);
                      if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                      }

                      $sql = "SELECT * FROM blog_tags WHERE status=1 AND is_deleted=1;";
                      $result = $conn->query($sql);
                      $id = 1;
                       if ($result->num_rows > 0) {
                           while($row = $result->fetch_assoc()) { ?>
                           <a href="<?php echo $home; ?>/tag.php?id=<?php echo base64_encode($row['id']); ?>"><?php echo $row['name']; ?></a>
                     <?php }} ?>
                </div>
              </div>

            </div>

          </div>

        </div>

      </div>

    </section>


<?php  include($_SERVER['DOCUMENT_ROOT'] . '/pibythree-revamp/footer.php');
// include('C:/pibythree-revamp/footer.php');?>
