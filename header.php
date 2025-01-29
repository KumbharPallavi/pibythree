<html>

<head>
<?php include('config.php'); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="PibyThree is a Cloud Consulting &amp; Services organization">
    <title>PibyThree</title>
    <link href="images/favicon.png" rel="icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vlitejs@5/dist/vlite.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vlitejs@5/dist/plugins/subtitle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vlitejs@5/dist/plugins/cast.css">

    <link href="<?php echo dirname($_SERVER['PHP_SELF']); ?>/css/styles.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="<?php $_SERVER['DOCUMENT_ROOT']    ?>/pibythree-revamp/css/home.css" rel="stylesheet">
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/about-us.css" rel="stylesheet">
    <link href="<?php  $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/contact-us.css" rel="stylesheet">
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/academy.css" rel="stylesheet">
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/blog-single.css" rel="stylesheet">
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/blogs.css" rel="stylesheet">
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/careers.css" rel="stylesheet">
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/cloud-management.css" rel="stylesheet">
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/csr.css" rel="stylesheet">
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/gen-ai.css" rel="stylesheet">   
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/ml-ai.css" rel="stylesheet">
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/our-team.css" rel="stylesheet">
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/pi-pillars.css" rel="stylesheet">
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/cloud-consulting.css" rel="stylesheet">
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/generative-ai.css" rel="stylesheet"> 
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/cloud-finops.css" rel="stylesheet">
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/application-modernization.css" rel="stylesheet">
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/it-automation.css" rel="stylesheet">
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/pi-accelerator.css" rel="stylesheet"> 
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/partners.css" rel="stylesheet"> 
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/blog-single-1.css" rel="stylesheet"> 
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/terms.css" rel="stylesheet"> 
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/privacy.css" rel="stylesheet"> 
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/blog/style.css" rel="stylesheet">
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/blog/style.css" rel="stylesheet">
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/blog/vendor.min.css" rel="stylesheet">
    <link href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/css/style.css" rel="stylesheet">

    <?php
    // Dynamically load page-specific CSS
    if (isset($pageCss)) {
        echo '<link rel="stylesheet" href="css/' . $pageCss . '.css">';
    }
    ?>
    <?php 

$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
 if($uri_segments[2]=='<?php echo $home; ?>/blog-single'){
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    }
   
    if(isset($uri_segments[3])){
       $sql = "SELECT * FROM blogs WHERE slug='$uri_segments[3]' limit 1";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          // echo $row['meta'];

          echo '<meta property="og:url" content="https://'.$_SERVER['HTTP_HOST'].'" />
                 <meta property="og:type" content="website" />
                 <meta property="og:image" content="https://'.$_SERVER['HTTP_HOST'].'/'.$row['image'].'" /> 
                 <meta property="og:title" content="Blogs | '.$row['title'].' | PibyThree" /> 
                 <meta property="og:description" content="'.$row['shot_description'].' | Read from the experts of Pibythree." />
                 
                 <meta name="twitter:card" content="https://'.$_SERVER['HTTP_HOST'].'/'.$row['image'].'">
                 <meta name="twitter:site" content="@Piby3Official">
                 <meta name="twitter:creator" content="@Piby3Official">
                 <meta name="twitter:title" content="Blogs | '.$row['title'].' | PibyThree">
                 <meta name="twitter:description" content="'.$row['shot_description'].' | Read from the experts of Pibythree.">
                 <meta name="twitter:image" content="https://'.$_SERVER['HTTP_HOST'].'/'.$row['image'].'">';
        }
       }
    }
 }
?>
</head>

<body>
    <div class="home-default">
        <header class="about-us">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="subheader">
                            <ul>
                                <li><a href="<?php echo $home; ?>/pibythree-careers">Careers</a></li>
                            </ul>
                            <ul class="header-social-icons">
                                <li><a href="https://www.facebook.com/PibyThreeOfficial/" target="_blank"><i
                                            class="fa-brands fa-facebook"></i></a></li>
                                <li><a href="https://x.com/Piby3Official" target="_blank"><i
                                            class="fa-brands fa-x-twitter"></i></a>
                                </li>
                                <li><a href="https://www.instagram.com/pibythreeofficial/ " target="_blank"><i
                                            class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/pibythree/" target="_blank"><i
                                            class="fa-brands fa-linkedin"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCmSKvo_MRWOSMnsX4DlFKFA"
                                        target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                            </ul>
                        </div>
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="<?php echo $home; ?>/index"><img src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/pibythree-revamp/images/logo-dark.png"
                                    alt="homepage-logo"></a>
                            <div class="mob-nav">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <!-- <div class="search"><i class="fa-solid fa-magnifying-glass"></i></div> -->
                            </div>
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="<?php echo $home; ?>/index">Home</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            The <span style="font-size: 24px; line-height: 0;">&#x213C;</span> Story
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <li><a class="dropdown-item" href="<?php echo $home; ?>/about-us">About Us</a></li>
                                            <!-- <li><a class="dropdown-item" href="our-team.html">Our Team</a></li> -->
                                            <li><a class="dropdown-item" href="<?php echo $home; ?>/contact-us">Contact Us</a></li>
                                            <li><a class="dropdown-item" href="<?php echo $home; ?>/our-team">Our Team</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="<?php echo $home; ?>/pi-pillars"><span style="font-size: 24px; line-height: 0;">&#x213C;</span> Pillars</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="<?php echo $home; ?>/pi-accelerator"><span style="font-size: 24px; line-height: 0;">&#x213C;</span> Accelarators</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span style="font-size: 24px; line-height: 0;">&#x213C;</span> Insights
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <li><a class="dropdown-item" href="<?php echo $home; ?>/blog">Blogs</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Life at <span style="font-size: 24px; line-height: 0;">&#x213C;</span>!
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <li><a class="dropdown-item" href="<?php echo $home; ?>/talent-academy">Talent Academy</a></li>
                                            <li><a class="dropdown-item" href="<?php echo $home; ?>/csr">CSR</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="<?php echo $home; ?>/partners">Partners</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>