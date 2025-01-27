<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

   @include('pages.css')
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <!-- <div class="loader_bg">
         <div class="loader"><img src="images/loading.webp" alt="#"/></div>
      </div> -->
      <!-- end loader -->
      <!-- header -->
      @include('pages.header')
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      @include('pages.slide')
      <!-- end banner -->
      <!-- about -->
      @include('pages.about')
      <!-- end about -->
      <!-- our_room -->
      @include('pages.room')
      <!-- end our_room -->
      <!-- gallery -->
      @include('pages.gallary')
      <!-- end gallery -->
      <!-- blog -->
      <div  class="blog" id="blog">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Blog</h2>
                     <p>Lorem Ipsum available, but the majority have suffered </p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="blog_box">
                     <div class="blog_img">
                        <figure><img src="images/blog1.jpg" alt="#"/></figure>
                     </div>
                     <div class="blog_room">
                        <h3>Bed Room</h3>
                        <span>Giới thiệu phòng ngủ</span>
<p>Nếu bạn đang tìm kiếm một không gian thư giãn thoải mái và sang trọng, phòng ngủ của chúng tôi chính là sự lựa chọn hoàn hảo. Với thiết kế hiện đại và trang thiết bị đầy đủ, phòng ngủ mang đến cảm giác ấm cúng và dễ chịu. Hãy tận hưởng giấc ngủ ngon trong không gian yên tĩnh và tiện nghi của chúng tôi.</p>
 </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="blog_box">
                     <div class="blog_img">
                        <figure><img src="images/blog2.jpg" alt="#"/></figure>
                     </div>
                     <div class="blog_room">
                        <h3>Bed Room</h3>
                        <span>Giới thiệu phòng ngủ</span>
<p>Nếu bạn đang tìm kiếm một không gian thư giãn thoải mái và sang trọng, phòng ngủ của chúng tôi chính là sự lựa chọn hoàn hảo. Với thiết kế hiện đại và trang thiết bị đầy đủ, phòng ngủ mang đến cảm giác ấm cúng và dễ chịu. Hãy tận hưởng giấc ngủ ngon trong không gian yên tĩnh và tiện nghi của chúng tôi.</p>
</div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="blog_box">
                     <div class="blog_img">
                        <figure><img src="images/blog3.jpg" alt="#"/></figure>
                     </div>
                     <div class="blog_room">
                        <h3>Bed Room</h3>
                        <span>Giới thiệu phòng ngủ</span>
<p>Nếu bạn đang tìm kiếm một không gian thư giãn thoải mái và sang trọng, phòng ngủ của chúng tôi chính là sự lựa chọn hoàn hảo. Với thiết kế hiện đại và trang thiết bị đầy đủ, phòng ngủ mang đến cảm giác ấm cúng và dễ chịu. Hãy tận hưởng giấc ngủ ngon trong không gian yên tĩnh và tiện nghi của chúng tôi.</p>
 </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end blog -->
      <!--  contact -->
      @include('pages.contact')
      <!-- end contact -->
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class=" col-md-4">
                     <h3>Contact US</h3>
                     <ul class="conta">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Address</li>
                        <li><i class="fa fa-mobile" aria-hidden="true"></i> +01 1234569540</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#"> demo@gmail.com</a></li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <h3>Menu Link</h3>
                     <ul class="link_menu">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="about.html"> about</a></li>
                        <li><a href="room.html">Our Room</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <h3>News letter</h3>
                     <form class="bottom_form">
                        <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                        <button class="sub_btn">subscribe</button>
                     </form>
                     <ul class="social_icon">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-10 offset-md-1">
                        
                        <p>
                        © 2019 All Rights Reserved. Design by <a href="https://html.design/"> Free Html Templates</a>
                        <br><br>
                        Distributed by <a href="https://themewagon.com/" target="_blank">Thu Trang - Mỹ Lệ</a>
                        </p>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>

      <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>