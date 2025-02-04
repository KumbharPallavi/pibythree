<?php include('header.php');?>

<?php 
   $conn1 = new mysqli($servername, $username, $password, $dbname);
    if ($conn1->connect_error) {
      die("Connection failed: " . $conn1->connect_error);
    }
   $category = base64_decode($_GET['id']);
   $sql1 = "SELECT * FROM blog_categories WHERE id='$category' AND status=1 AND is_deleted=1 limit 1;";
   
   $result1 = $conn1->query($sql1);
   $category_name = '';
   if ($result1->num_rows > 0) {
      while($row1 = $result1->fetch_assoc()) {
        $category_name= $row1['name'];
     }
   }
?>
<div class="module-content module-search-warp">
   <div class="pos-vertical-center">
      <div class="container">
         <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
               <form class="form-search">
                  <input class="form-control" type="text" placeholder="type words then enter" />
                  <button></button>
               </form>
            </div>
         </div>
      </div>
   </div>
   <a class="module-cancel" href="#"><i class="fas fa-times"></i></a>
</div>
<section class="page-title page-title-13" id="page-title">
   <div class="page-title-wrap bg-overlay bg-overlay-dark-3">
      <div class="bg-section"><img src="images/blog-banner.jpg" alt="Background" /></div>
      <div class="container">
         <div class="row">
            <div class="col-12 col-lg-6 offset-lg-3">
               <div class="title text-center">
                  <h1 class="title-heading"><?php  echo $category_name;?></h1>
                  <ol class="breadcrumb breadcrumb-light d-flex justify-content-center">
                     <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Blog Category</li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="blog blog-grid blog-grid-5 custom-blog" id="blog">
   <div class="container">
      <div class="row">
      	<?php
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM blogs WHERE category='$category' AND status=1 AND is_deleted=1 AND publish=0 ORDER BY id DESC;";
                $result = $conn->query($sql);
                $id = 1;
                 if ($result->num_rows > 0) {
                     while($row = $result->fetch_assoc()) { 
                     	$conn1 = new mysqli($servername, $username, $password, $dbname);
			             if ($conn1->connect_error) {
			               die("Connection failed: " . $conn1->connect_error);
			             }
			             $category = $row['category'];
			            $sql1 = "SELECT * FROM blog_categories WHERE id='$category' AND status=1 AND is_deleted=1 limit 1;";
			            $result1 = $conn1->query($sql1);
			            if ($result1->num_rows > 0) {
			               while($row1 = $result1->fetch_assoc()) {
			                 $category_name= $row1['name'];
			              }
			            }
			     ?>
		         <div class="col-12 col-md-6 col-lg-4">
		            <div class="blog-entry" data-hover="">
		               <div class="entry-content">
		                  <div class="entry-meta">
		                     <div class="entry-date"><span class="day"><?php echo date('M Y',strtotime($row['created_at'])); ?></span></div>
		                     <div class="entry-author">
		                        <p>Admin</p>
		                     </div>
		                  </div>
		                  <div class="entry-title">
		                     <h4><a href="blog-single.php/<?php echo $row['slug']; ?>"><?php echo $row['title']; ?></a></h4>
		                  </div>
		                  <div class="entry-img-wrap">
		                     <div class="entry-img"><a href="blog-single.php/<?php echo $row['slug']; ?>"><img src="<?php echo $dir.'/'.$row['image']; ?>" alt="Filing Solar Power Permits in 2020? Consider Following Important Factors" /></a></div>
		                     <div class="entry-category"><a href="category.php?id=<?php echo base64_encode($row['category']); ?>"><?php echo $category_name; ?></a></div>
		                  </div>
		                  <div class="entry-bio">
		                     <p><?php echo $row['shot_description']; ?></p>
		                  </div>
		                  <div class="entry-more"> <a class="btn btn--white btn-bordered" href="blog-single.php/<?php echo $row['slug']; ?>">read more</a></div>
		               </div>
		            </div>
		         </div>
      <?php }}else{ ?>
         <h3><center>No record found.</center></h3>
		<?php } ?>
      </div>
      <!-- <div class="row">
         <div class="col-12 text--center">
            <ul class="pagination">
               <li><a class="current" href="blog.html">1</a></li>
               <li><a href="blog.html">2</a></li>
               <li><a href="#" aria-label="Next"><i class="energia-arrow-right"></i></a></li>
            </ul>
         </div>
      </div> -->
   </div>
</section>


<?php include('footer.php');?>