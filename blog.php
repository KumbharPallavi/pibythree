<?php

$pageCss = 'blog-single-1';
include $_SERVER['DOCUMENT_ROOT'] . '/pibythree-revamp/header.php';?>
<section class="about-banner">
            <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="banner-img">
                                <img src="images/about-us-banner.jpg" class="img-fluid" alt="about-us-banner">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-text-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">                       
                            <div class="banner-head" data-aos="fade-down">
                                    <h2>Blog</h2>
                                </div>
                                <ol class="breadcrumb breadcrumb-light">
                                    <li class="breadcrumb-item"><a href="<?php echo $home; ?>/index">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </header>
    </div>
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
<section class="blog blog-grid blog-grid-5 custom-blog" id="blog">
   <div class="container">
      <div class="row">
      	<?php
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM blogs WHERE status=1 AND is_deleted=1 AND publish=0 ORDER BY id DESC;";
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
		                     <div class="entry-date"><span class="day"><?php echo date('jS \of F Y',strtotime($row['created_at'])); ?></span></div>
		                     <!-- <div class="entry-author">
		                        <p>Admin</p>
		                     </div> -->
		                  </div>
		                  <div class="entry-title">
		                     <h4><a href="blog-single.php/<?php echo urlencode($row['slug']); ?>"><?php echo $row['title']; ?></a></h4>
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
		<?php }} ?>
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