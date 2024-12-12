<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="<?php echo asset('css/ui.css');?>"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ebbc1aa60f.js" crossorigin="anonymous"></script>
    <script src="app.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
</head>
<body>
    <div class="top">
        <div class="links">
            <a href="https://www.linkedin.com/in/gururaj-math-223360255/" target="_blank"><i
                    class='bx bxl-linkedin-square'></i></a>
            <a href="https://codepen.io/gururajmath"><i class='bx bxl-codepen' target="_blank"></i></a>
            <a href="https://github.com/Gururaj-Math" target="_blank"><i class='bx bxl-github'></i></a>
        </div>
        <div class="head">
             Blogger<span>.</span>
        </div>
        <div class="search">
            <i class='bx bx-search'></i>
            <i class="fa-solid fa-bars on hamburger"></i>
        </div>
    </div>
     <div class="alert">
                <ul class="navigation1">
                    <i class='bx bxs-x-circle close'></i>
                    <li><a href="#banner" class="out">HOME</a></li>
                    <li><a href="#news" class="out">SHOP</a></li>
                    <li><a href="#jobs" class="out">ABOUT</a></li>
                    <li><a href="#register" class="out">REVIEWS</a></li>
                </ul>
            </i>
        </div>
    </header> 
    <!--NAVBAR-->
    <div class="header">
        <ul class="navigation">
            <li><a href="#banner">HOME</a></li>
            <li><a href="#news">Blogs FEEDS</a></li>
            <li><a href="#events">News  Feed</a></li>
            <li><a href="#register">Contact us </a></li>
        </ul>
    </div>
    <!--HOME PAGE-->
    <div class="banner" id="banner">
        <swiper-container class="mySwiper" navigation="true">
            <swiper-slide>
                <div class="imgbx">
                    <a href="#news"><img src="https://i.postimg.cc/dtLWZmwx/pexels-cottonbro-studio-9656754.jpg"
                            alt=""></a>
                </div>
                <div class="text">
                    <h1>Blog FEEDS</h1> 
         
                    <p>"Insights, Inspiration, and Ideas for a Better Tomorrow"</p>
                </div>
            </swiper-slide>
            <swiper-slide>
                <div class="imgbx">
                    <a href="#"><img src="https://i.postimg.cc/L8N4npDS/pexels-miguel-acosta-1259626.jpg" alt=""></a>
                </div>
                <div class="text">
                    <h1>Blogs  Feed</h1>

                    <p>Empowering Your Journey with Knowledge and Creativity".</p>
                </div>
            </swiper-slide>
            <swiper-slide>
                <div class="imgbx">
                    <a href="#"><img src="https://i.postimg.cc/8k27SNKn/pexels-arthouse-studio-4413745.jpg" alt=""></a>
                </div>
                <div class="text">
                    <h1>Blogs Feed </h1>
                    <p>"Explore, Learn, and Grow with Every Post"</p>
                </div>
            </swiper-slide>
        </swiper-container>
    </div>
    <!--blogs SECTION-->
    <section class="news" id="news">
        <div class="titletext">
            <h1>Blogs <span>Feed</span></h1>
        </div>
        <div class="container">
            <?php foreach ($blog as $data) { ?>
            <div class="card hidden">
                <div class="card__header">
                <img src="{{ asset($data->image) }}" alt="card__image" class="card__image">
                </div>
                <div class="card__body">
                <span class="tag">Blogs</span>
                <h4 class="title"><?php echo $data["title"] ?></h4>
                <p class="description"><?php echo $data["description"] ?></p>
                </div>
                <div class="card__footer">
                <div class="user">
                    <h5><?php echo $data["authorname"] ?></h5>
                    <div class="user__info">
                    <small>2h ago</small>
                    </div>
                </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
    
    <!--news SECTION-->
    <section class="events" id="events">
        <div class="titletext">
            <h1>News   <span>feed</span></h1>
        </div>
        <div class="container">
        <?php foreach ($news as $data){?>
            <div class="card">
              <div class="card__header">
              <img src="{{ asset( $data->image) }}" alt="card__image" class="card__image" width="600">
              </div>
              <div class="card__body">
                <span class="tag">News</span>
                <h4><?php echo $data["title"]?></h4>
                <h4><?php echo $data["description"]?></h4>
                <p></p>
              </div>
              <div class="card__footer">
                <div class="user">
                  <h5><?php echo $data["authorname"]?></h5>
                  <div class="user__info">
                    <small>2h ago</small>
                  </div>
                </div>
              </div>
            </div>
            <?php }?>
          </div>    
    <section class="register" id="register">
        <div class="titletext">
            <h1>Contact<span>Us</span></h1>
        </div>
        <div class="form">
        <div class="formimg">
            <img src="https://images.pexels.com/photos/768474/pexels-photo-768474.jpeg?auto=compress&cs=tinysrgb&w=600" alt="">
        </div> 
    <div class="formcontent-container">
            <form action="" class="formcontent" method="post" id="contactForm">
                <input type="text" placeholder="Username" name="name">
                <input type="email" placeholder="Email" name="email" >
                <input type="number" placeholder="Number" name="number" >
                <textarea class="form-control" name="comment" placeholder="Comment" rows="5" ></textarea>
                <button type="submit" class="btn" style="background-color: aquamarine;">Submit</button>
            </form>
            </div>
        </div>
        </div>  
    </section>
    <section class="footer">
    <div class="footer-content">
        <!-- About the Blog -->
        <div class="footer-about">
            <h2>About the Blog</h2>
            <p>Stay updated with the latest trends in tech, lifestyle, and creativity. Join our community and explore insightful articles!</p>
        </div>
        
        <!-- Quick Links -->
        <div class="footer-links">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#blog">Blog Posts</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>

        <!-- Social Media Links -->
        <div class="footer-social">
            <h3>Follow Us</h3>
            <ul>
                <li><a href="https://www.linkedin.com" target="_blank"><i class='bx bxl-linkedin'></i> LinkedIn</a></li>
                <li><a href="https://github.com" target="_blank"><i class='bx bxl-github'></i> GitHub</a></li>
                <li><a href="https://twitter.com" target="_blank"><i class='bx bxl-twitter'></i> Twitter</a></li>
            </ul>
        </div>
        <!-- Contact Information -->
        <div class="footer-contact">
            <h3>Contact Us</h3>
            <p>Email: info@yourblog.com</p>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
<script>
$(document).ready(function () {
    $("#contactForm").submit(function (event) {
        event.preventDefault(); 
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        const formData = $(this).serialize();

        $.ajax({
            url: '/contactus', 
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
            data: formData,
            dataType: 'json', 
            success: function (response) {
                if (response.status === 'success') {
                    alert('Data saved successfully!');
                } else {
                    alert(response.message || 'Failed to save data');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error details:', textStatus, errorThrown, jqXHR.responseText);
                if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                    alert(jqXHR.responseJSON.message);
                } else {
                    alert('Unexpected error occurred');
                }
            }
        });
    });
});



</script>