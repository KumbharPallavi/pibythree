// Homepage Loader
window.addEventListener("load", () => {
    const loader = document.getElementById("loader");
    const mainContent = document.getElementById("main-content");

    // Fade out the loader
    loader.classList.add("hidden");

    // Run loader for 50 iterations (5 seconds)
    const loaderDuration = 5 * 200; // 5 seconds in milliseconds
    // Show the main content after loader fades
    setTimeout(() => {
        // Fade out the loader
        loader.classList.add("hidden");

        // Show the main content after loader fades
        setTimeout(() => {
            loader.style.display = "none";
            mainContent.style.display = "block";
        }, 500); // Match the transition duration in CSS (0.5s)
    }, loaderDuration);
});


$(document).ready(function () {
    // Toggle main menu on hamburger click
    $('.navbar-toggler').on('click', function () {
        // $('#navbarNavDropdown').slideToggle(); 
        $('.navbar-toggler-icon').toggleClass('close'); // Toggle the 'close' class
    });

    // Toggle submenus for dropdown items
    $('.nav-item.dropdown > .nav-link').on('click', function (e) {
        e.preventDefault(); // Prevent default anchor behavior
        const submenu = $(this).next('.dropdown-menu');

        // Close other open submenus
        // $('.dropdown-menu').not(submenu).slideUp().removeClass('show');

        // Toggle the clicked submenu
        // submenu.slideToggle().toggleClass('show');
    });

    $('.close').on('click', function() {
        $(this).closest('.alert').fadeOut();
    });

   // Show popup on Apply Now button click
$('.apply-now-btn').on('click', function (e) {
    e.preventDefault(); // Prevent the default link behavior
    const popupId = $(this).data('popup'); // Get the popup ID from data-popup
    $(`#${popupId}`).fadeIn(); // Show the relevant popup
});

// Close popup when close button is clicked
$('.close-btn').on('click', function () {
    $(this).closest('.popup').fadeOut(); // Hide the closest popup
});

// Close popup when clicking outside the popup content
$(window).on('click', function (e) {
    if ($(e.target).hasClass('popup')) {
        $(e.target).fadeOut(); // Hide the popup that was clicked
    }
});

    function setEqualHeights(selector) {
        let maxHeight = 0;
        $(selector).each(function () {
            $(this).css('height', 'auto'); // Reset height
            let thisHeight = $(this).outerHeight();
            if (thisHeight > maxHeight) {
                maxHeight = thisHeight;
            }
        });
        $(selector).css('height', maxHeight + 'px'); // Apply max height
    }

    // Match heights on page load
    setEqualHeights('.careers-card h3'); // Match all h3 elements
    setEqualHeights('.careers-card p');  // Match all p elements

    setEqualHeights('.accelerator-card-content h3'); // Match all h3 elements
    setEqualHeights('.accelerator-card-content p');  // Match all p elements

    setEqualHeights('.team-content h2'); // Match all h2 elements
    setEqualHeights('.team-content p');  // Match all p elements

    // Match heights on window resize
    $(window).on('resize', function () {
        setEqualHeights('.careers-card h3');
        setEqualHeights('.careers-card p');

        setEqualHeights('.accelerator-card-content h3');
        setEqualHeights('.accelerator-card-content p');

        setEqualHeights('.team-content h2');
        setEqualHeights('.team-content p');
    });


    // Match heights on page load
    setEqualHeights('.blog-content .meta-tag');
    setEqualHeights('.blog-content h3');
    setEqualHeights('.blog-content p');

    // Match heights on window resize
    $(window).on('resize', function () {
        setEqualHeights('.blog-content .meta-tag');
        setEqualHeights('.blog-content h3');
        setEqualHeights('.blog-content p');
    });



    $('.partner-slider').owlCarousel({
        loop: true,
        dots: false,
        margin: 10,
        autoplay: true,
        smartSpeed: 1000,
        autoplayTimeout: 7000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                nav: false
            },
            700: {
                items: 3,
                nav: false
            },
            1000: {
                items: 6,
                nav: false,
                margin: 30
            }
        }
    })

    $('.about-us-partner').owlCarousel({
        loop: true,
        dots: false,
        margin: 10,
        autoplay: true,
        smartSpeed: 1000,
        autoplayTimeout: 7000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                nav: false
            },
            700: {
                items: 4,
                nav: false
            },
            1000: {
                items: 6,
                nav: false,
                margin: 30
            }
        }
    })

    $('.client-slider').owlCarousel({
        loop: true,
        dots: false,
        nav: true,
        navText: ['<i class="fa-solid fa-arrow-left"></i>', '<i class="fa-solid fa-arrow-right"></i>'],
        autoplay: true,
        smartSpeed: 1000,
        autoplayTimeout: 7000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            700: {
                items: 1,
            },
            1000: {
                items: 1,
            }
        }
    })

    $('.pi-pillar-slider').owlCarousel({
        loop: true,
        dots: false,
        margin: 10,
        autoplay: true,
        smartSpeed: 1000,
        autoplayTimeout: 7000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            700: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: false,
                margin: 30
            }
        }
    })

    $('.reviews').owlCarousel({
        loop: true,
        dots: false,
        margin: 10,
        nav: true,
        navText: ['<i class="fa-solid fa-arrow-left"></i>', '<i class="fa-solid fa-arrow-right"></i>'],
        autoplay: true,
        smartSpeed: 1000,
        autoplayTimeout: 7000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: true
            },
            1000: {
                items: 2,
                nav: true,
                margin: 30
            }
        }
    });
        

    // homepage progressbar
    $('.progress-bar').each(function () {
        // Get the data-width attribute value
        const targetWidth = $(this).data('width');

        // Animate the width of the progress bar
        $(this).animate(
            { width: `${targetWidth}%` }, // Target width
            1000 // Animation duration in milliseconds
        );
    });
});

const tabs = document.querySelectorAll('.tab');
const contents = document.querySelectorAll('.cloud-spectrum .content');

tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        // Remove active class from all tabs and contents
        tabs.forEach(t => t.classList.remove('active'));
        contents.forEach(c => c.classList.remove('active'));

        // Add active class to clicked tab and its corresponding content
        tab.classList.add('active');
        const target = tab.getAttribute('data-target');
        document.getElementById(target).classList.add('active');
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const listItems = document.querySelectorAll(".accordion-list li");
    const images = document.querySelectorAll(".accordion-img");

    const activateItem = (item, index) => {
        // Remove active class from all list items
        listItems.forEach((li) => li.classList.remove("active"));

        // Hide all images
        images.forEach((img) => img.classList.remove("active-img"));

        // Add active class to the hovered or clicked item
        item.classList.add("active");

        // Show the corresponding image
        images[index].classList.add("active-img");
    };

    listItems.forEach((item, index) => {
        item.addEventListener("click", function () {
            activateItem(item, index);
        });

        item.addEventListener("mouseenter", function () {
            activateItem(item, index);
        });
    });
});

  document.querySelectorAll('.faq-question').forEach((question) => {
    question.addEventListener('click', () => {
      const parent = question.parentElement;
  
      // Close all open items
      document.querySelectorAll('.faq-item').forEach((item) => {
        if (item !== parent) {
          item.classList.remove('active');
        }
      });
  
      // Toggle the clicked item
      parent.classList.toggle('active');
    });
  });

