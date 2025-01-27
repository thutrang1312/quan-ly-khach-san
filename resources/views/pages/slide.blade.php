<section class="banner_main">
   <!-- Thêm Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <div id="myCarousel" class="carousel slide banner" data-ride="carousel" data-interval="3000">
      <ol class="carousel-indicators">
         <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
         <li data-target="#myCarousel" data-slide-to="1"></li>
         <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
         <div class="carousel-item active">
            <img class="first-slide d-block w-100" src="../images/banner1.jpg" alt="First slide">
         </div>
         <div class="carousel-item">
            <img class="second-slide d-block w-100" src="images/banner2.jpg" alt="Second slide">
         </div>
         <div class="carousel-item">
            <img class="third-slide d-block w-100" src="images/banner3.jpg" alt="Third slide">
         </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
      </a>
   </div>
   <div class="booking_ocline">
      <div class="container">
         <div class="row">
            <div class="col-md-5">
               <div class="book_room">
                  <h1>Book a Room Online</h1>
                  <form class="book_now">
                     <div class="row">
                        <div class="col-md-12">
                           <span>Arrival</span>
                           <img class="date_cua" src="images/date.png">
                           <input class="online_book" placeholder="dd/mm/yyyy" type="date" name="dd/mm/yyyy">
                        </div>
                        <div class="col-md-12">
                           <span>Departure</span>
                           <img class="date_cua" src="images/date.png">
                           <input class="online_book" placeholder="dd/mm/yyyy" type="date" name="dd/mm/yyyy">
                        </div>
                        <div class="col-md-12">
                           <button class="book_btn">Book Now</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Thêm Bootstrap JS, Popper.js, và jQuery -->
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</section>