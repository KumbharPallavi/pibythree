<html>

<head>
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
  <link rel="stylesheet" href="css/owl.theme.default.min.css">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vlitejs@5/dist/vlite.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vlitejs@5/dist/plugins/subtitle.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vlitejs@5/dist/plugins/cast.css">

  <link href="css/styles.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
  <link href="css/home.css" rel="stylesheet">
  <link href="css/about-us.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<?php include('config.php');?>
<body>
  <!-- <div id="loader" class="pi-loader"></div> -->
  <div class="loader">
    <div id="loader">
    <div class="pi-runner">
      <span class="pi-body">&#x26c5;</span>
      <span class="pi-line"></span>
      <span class="pi-leg leg-left"></span>
      <span class="pi-leg leg-right"></span>
    </div>
  </div>
    <div id="main-content" style="display: none;">
      <div class="home-default">
        <header>
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="subheader">
                  <ul>
                    <li><a href="<?php echo $home; ?>/pibythree-careers" target="_blank">Careers</a></li>
                  </ul>
                  <ul class="header-social-icons">
                    <li><a href="https://www.facebook.com/PibyThreeOfficial/" target="_blank"><i
                          class="fa-brands fa-facebook"></i></a></li>
                    <li><a href="https://x.com/Piby3Official" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                    </li>
                    <li><a href="https://www.instagram.com/pibythreeofficial/ " target="_blank"><i
                          class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/pibythree/" target="_blank"><i
                          class="fa-brands fa-linkedin"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCmSKvo_MRWOSMnsX4DlFKFA" target="_blank"><i
                          class="fa-brands fa-youtube"></i></a></li>
                  </ul>
                </div>
                <nav class="navbar navbar-expand-lg navbar-light">
                  <a class="navbar-brand" href="<?php echo $home; ?>/index"><img src="images/logo-dark.png" alt="homepage-logo"></a>
                  <div class="mob-nav">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                      data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                      aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="search"><i class="fa-solid fa-magnifying-glass"></i></div>
                  </div>
                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo $home; ?>/index">Home</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          The <span style="font-size: 24px; line-height: 0;">&#x213C;</span> Story
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <li><a class="dropdown-item" href="<?php echo $home; ?>/about-us">About Us</a></li>
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          <span style="font-size: 24px; line-height: 0;">&#x213C;</span> Insights
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <li><a class="dropdown-item" href="<?php echo $home; ?>/blog">Blogs</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
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
        </header>
      </div>
      <section class="home-banner home-default">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="home-info-wrapper">
                <div class="home-info" data-aos="fade-right">
                  <span>For Marketing and Creative Teams</span>
                  <h1 class="word">We'll make you believe in <br><strong>Cloud and AI.</strong></h1>
                  <p class="lead">Helping businesses navigate Gen AI and Cloud to reduce costs and transform enterprises
                    for
                    the future.</p>
                </div>
                <div class="home-banner-img">
                  <div class="banner-abstract-shape"></div>
                  <div class="matrix-vertical"><img src="images/matrix_vertical.png" alt=""></div>
                  <div class="rectangle-small"><img src="images/rectangle_small.png" alt=""></div>
                  <img src="images/home-banner.png" alt="banner-img" data-aos="fade-left">
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="owl-carousel owl-theme partner-slider" id="client-home-default" data-aos="fade-left">
                <div class="item">
                  <div class="img-partner">
                    <img src="images/partner/img-client2.png" alt="partner-img" class="img-fluid">
                  </div>
                </div>
                <div class="item">
                  <div class="img-partner">
                    <img src="images/partner/img-client3.png" alt="partner-img" class="img-fluid">
                  </div>
                </div>
                <div class="item">
                  <div class="img-partner">
                    <img src="images/partner/img-client8.png" alt="partner-img" class="img-fluid">
                  </div>
                </div>
                <div class="item">
                  <div class="img-partner">
                    <img src="images/partner/img-client4.png" alt="partner-img" class="img-fluid">
                  </div>
                </div>
                <div class="item">
                  <div class="img-partner">
                    <img src="images/partner/img-client5.png" alt="partner-img" class="img-fluid">
                  </div>
                </div>
                <div class="item">
                  <div class="img-partner">
                    <img src="images/partner/img-client1.png" alt="partner-img" class="img-fluid">
                  </div>
                </div>
                <div class="item">
                  <div class="img-partner">
                    <img src="images/partner/img-client6.png" alt="partner-img" class="img-fluid">
                  </div>
                </div>
                <div class="item">
                  <div class="img-partner">
                    <img src="images/partner/img-client7.png" alt="partner-img" class="img-fluid">
                  </div>
                </div>
                <div class="item">
                  <div class="img-partner">
                    <img src="images/partner/img-client9.png" alt="partner-img" class="img-fluid">
                  </div>
                </div>
                <div class="item">
                  <div class="img-partner">
                    <img src="images/partner/img-client11.png" alt="partner-img" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="why-us">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="why-us-wrapper" data-aos="fade-right">
                <div class="why-us-title">
                  <span class="subtitle">Why Chose Us?</span>
                  <h2 class="word">Believe us,<br><strong>Believe cloud</strong></h2>
                  <a href="<?php echo $home; ?>/pi-pillars" class="btn btn-default btn-rounded mt-3"><span class="outer-wrap"><span
                        data-text="View All Services">View All Services</span>
                    </span>
                  </a>
                </div>
                <div class="square-top"><img src="images/square_large.svg" alt=""></div>
                <div class="why-card-wrapper" data-aos="fade-left">
                  <div class="owl-carousel owl-theme pi-pillar-slider" id="pi-pillar-slider">
                    <div class="item">
                      <div class="why-us-card">
                        <div class="why-us-card-img-wrapper">
                          <img src="images/why-us-card-img1.png" alt="Cloud Consulting" class="img-fluid">
                        </div>
                        <div class="why-us-content-wrapper">
                          <h3>Cloud Consulting</h3>
                          <p>Creating Value, Delivering Excellence.</p>
                        </div>
                        <div class="arrow-icon">
                          <a href="<?php echo $home; ?>/cloud-consulting"><i class="fa-solid fa-arrow-right"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="why-us-card">
                        <div class="why-us-card-img-wrapper">
                          <img src="images/why-us-card-img2.png" alt="Cloud Data & Analytics" class="img-fluid">
                        </div>
                        <div class="why-us-content-wrapper">
                          <h3>Cloud Data & Analytics</h3>
                          <p>Making sense of data for better decision-making</p>
                        </div>
                        <div class="arrow-icon">
                          <a href="<?php echo $home; ?>/cloud-consulting"><i class="fa-solid fa-arrow-right"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="why-us-card">
                        <div class="why-us-card-img-wrapper">
                          <img src="images/why-us-card-img3.png" alt="Cloud Application Modernization" class="img-fluid">
                        </div>
                        <div class="why-us-content-wrapper">
                          <h3>Cloud Application Modernization</h3>
                          <p>Staying Ahead of the Game.</p>
                        </div>
                        <div class="arrow-icon">
                          <a href="<?php echo $home; ?>/application-modernization"><i class="fa-solid fa-arrow-right"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="why-us-card">
                        <div class="why-us-card-img-wrapper">
                          <img src="images/why-us-card-img4.png" alt="Cloud Management" class="img-fluid">
                        </div>
                        <div class="why-us-content-wrapper">
                          <h3>Cloud Management</h3>
                          <p>Unlocking the potential of your data</p>
                        </div>
                        <div class="arrow-icon">
                          <a href="<?php echo $home; ?>/cloud-management"><i class="fa-solid fa-arrow-right"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="why-us-card">
                        <div class="why-us-card-img-wrapper">
                          <img src="images/why-us-card-img5.png" alt="Machine Learning & AI" class="img-fluid">
                        </div>
                        <div class="why-us-content-wrapper">
                          <h3>Machine Learning & AI</h3>
                          <p>Solving tomorrow's problems today</p>
                        </div>
                        <div class="arrow-icon">
                          <a href="<?php echo $home; ?>/machine-learning-ai"><i class="fa-solid fa-arrow-right"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </section>
      <section class="our-work">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="work-wrapper">
                <div class="work-card">
                  <div class="work-card-content" data-aos="fade-right">
                    <span class="subtitle">The work we do willingly</span>
                    <h2>Inspiration comes<br> only <strong>during work.</strong></h2>
                    <p>This letter expresses our sincere gratitude for the excellent work that your company has done. I
                      would like to note the high professionalism of the entire team, the ability to work with the
                      customer.
                    </p>
                  </div>
                  <div class="progress-wrap">
                    <h6>Project Delivered on Time</h6>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" data-width="90"><span>90%</span></div>
                    </div>
                  </div>

                  <div class="progress-wrap">
                    <h6>Availability</h6>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" data-width="70"><span>70%</span></div>
                    </div>
                  </div>
                  <a href="<?php echo $home; ?>/about-us" class="btn btn-secondary">
                    <span class="outer-wrap">
                      <span data-text="Read More">Read More</span>
                    </span>
                  </a>
                </div>
                <div class="work-card" data-aos="fade-left">
                  <video id="player" src="video/dummy-video.mp4">
                  </video>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="know-us">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="know-us-wrapper">
                <div class="know-us-head" data-aos="fade-right">
                  <span class="subtitle">Get To Know Us</span>
                  <h2><strong>Enterprises for Future</strong></h2>
                  <p>Πby3 is A Cloud Transformation company enabling Enterprises for Future. We are nimble, and Highly
                    dynamic
                    focused team with a passion to serve our clients with utmost trust and ownership. Our expertise in
                    Technology with vast expereince over the years helps client get Solutions with optimized cost and
                    reduced
                    risks.</p>
                  <div class="hstack gap-4 mb-5 home-stats">
                    <div class="tick-icon-big">
                      <div class="icon-space"><i class="fa-solid fa-check"></i></div>
                      <div class="text-space fun-fact">
                        <span class="timer" data-to="99" data-speed="2000">99%</span>
                        <div>Satisfaction rate</div>
                        <div class="stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i>
                        </div>
                      </div>
                    </div>
                    <div class="tick-icon-big">
                      <div class="icon-space"><i class="fa-solid fa-check"></i></div>
                      <div class="text-space fun-fact">
                        <span class="timer" data-to="9" data-speed="2000">$9M</span>
                        <div>Global revenue</div>
                        <div class="stars">
                          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a href="<?php echo $home; ?>/about-us" class="btn btn-secondary">
                    <span class="outer-wrap">
                      <span data-text="Read More">Read More</span>
                    </span>
                  </a>
                </div>
                <div class="know-us-img-wrapper" data-aos="fade-left">
                  <img src="images/know-us.png" alt="know-us-banner">
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="client-slider-section">
        <div class="client-words-wrapper">
          <div class="slider-img-wrapper" data-aos="fade-right">
            <img src="images/about-us/testimonials-img.jpg" class="img-fluid" alt="about-us-img">
          </div>
          <div class="client-slider-wrapper" data-aos="fade-left">
            <div class="owl-carousel owl-theme client-slider" id="client-slider">
              <div class="item">
                <div class="client-card">
                  <h3>My buisness is growing Faster</h3>
                  <p>Thank you for your excellent work.</p>
                  <div class="client-details">
                    <div class="client-img-wrapper">
                      <img src="images/about-us/thumb_1.jpg" class="img-fluid">
                    </div>
                    <div class="client">
                      <h3>Rider Smith</h3>
                      <p>Marketing Envato Pvt Ltd</p>
                      <div class="stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                          class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="client-card">
                  <h3>My buisness is growing Faster</h3>
                  <p>Thank you for your excellent work.</p>
                  <div class="client-details">
                    <div class="client-img-wrapper">
                      <img src="images/about-us/thumb_1.jpg" class="img-fluid">
                    </div>
                    <div class="client">
                      <h3>Rider Smith</h3>
                      <p>Marketing Envato Pvt Ltd</p>
                      <div class="stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                          class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="client-card">
                  <h3>My buisness is growing Faster</h3>
                  <p>Thank you for your excellent work.</p>
                  <div class="client-details">
                    <div class="client-img-wrapper">
                      <img src="images/about-us/thumb_1.jpg" class="img-fluid">
                    </div>
                    <div class="client">
                      <h3>Rider Smith</h3>
                      <p>Marketing Envato Pvt Ltd</p>
                      <div class="stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                          class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- <section class="">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="owl-carousel owl-theme partner-slider" id="client-home-default" data-aos="fade-left">
                <div class="item">
                  <div class="img-partner">
                    <img src="images/partner/img-client1.png" alt="">
                  </div>
                </div>
                <div class="item">
                  <div class="img-partner">
                    <img src="images/partner/img-client1.png" alt="">
                  </div>
                </div>
                <div class="item">
                  <div class="img-partner">
                    <img src="images/partner/img-client1.png" alt="">
                  </div>
                </div>
                <div class="item">
                  <div class="img-partner">
                    <img src="images/partner/img-client1.png" alt="">
                  </div>
                </div>
                <div class="item">
                  <div class="img-partner">
                    <img src="images/partner/img-client1.png" alt="">
                  </div>
                </div>
                <div class="item">
                  <div class="img-partner">
                    <img src="images/partner/img-client1.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> -->
      <a href="mailto:contactus@pibythree.com">
        <div class="contact-icon" role="button" aria-label="Contact Us">
          <i class="fa-regular fa-envelope"></i>
        </div>
      </a>
<?php include('footer.php'); ?>