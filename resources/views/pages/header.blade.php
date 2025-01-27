<header>
         <!-- header inner -->
         <div class="header fixed-top">
            <div class="container ">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                           <a href="{{ url('/home') }}">
                              <img src="{{ asset('images/logo.png') }}">
                           </a>

                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                 <a class="nav-link" href="{{route('pages.home')}}">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#about">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link"  style="width:90px;" href="#room">Our room</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#gallery">Gallery</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#blog">Blog</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" style="width:100px;" href="#contact">Contact Us</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route('auth.login') }}">Login</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route('auth.login') }}">Register</a>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link" href="#" id="historyIcon">History</a>
                              </li>
                              
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
         <div id="historyForm" class="history-form" style="display: none;">
         <div class="form-container">
            <table>
            <tr>
               <td><h2>Booking History</h2></td>
               <td><button id="closeForm" class="closeForm">X</button></td>
               <form action="{{ route('history') }}" method="GET">
                  <!-- <div class="form-group">
                        <label for="search">Search Booking:</label>
                        <input type="text" id="search" name="search" class="form-control" placeholder="Search by Booking ID or Status">
                  </div> -->
                  
                  <!-- <button type="submit" class="btn btn-primary">Search</button> -->
               </form>
            </tr>
            </table>

            <table class="table mt-4">
               <thead>
                     <tr>
                        <th>Booking ID</th>
                        <th>Room Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Price</th>
                     </tr>
               </thead>
               <tbody>
                     @foreach($bookings as $booking)
                     <tr>
                        <td>{{ $booking->room->room_title }}</td>
                        <td>{{ $booking->room->room_type }}</td>
                        <td>{{ $booking->status}}</td>
                        <td>{{ $booking->start_date}}</td>
                        <td>{{ $booking->end_date }}</td>
                        <td>{{ $booking->total_price}}</td>
                     </tr>
                     @endforeach
                     
               </tbody>
            </table>
        </div>
    </div>
    <style>
        body {
            padding-top: 70px; /* Dùng để tạo không gian cho thanh menu cố định */
        }
        .history-form {
            position: fixed;
            right: 0;
            top: 70px; /* Đặt từ dưới thanh menu */
            width: 500px;
            height: calc(100% - 70px); /* Đặt chiều cao bằng chiều cao của cửa sổ trừ chiều cao của thanh menu */
            background-color: #f8f9fa;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
            padding: 20px;
            z-index: 1000;
            overflow-y: auto; /* Cho phép cuộn tự động */
        }
        .form-container {
            /* Thêm các kiểu cho container của form nếu cần */
        }
    </style>


    <script>
        document.getElementById('historyIcon').onclick = function() {
            document.getElementById('historyForm').style.display = 'block';
        };
        document.getElementById('closeForm').onclick = function() {
            document.getElementById('historyForm').style.display = 'none';
        };
    </script>
</header>