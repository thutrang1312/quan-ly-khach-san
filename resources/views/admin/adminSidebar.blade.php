<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
          <h1 class="h5">{{ Auth::user()->name }}</h1>
          <p>{{ Auth::user()->usertype }}</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href="{{url('adminHome')}}"> <i class="icon-home"></i>Home </a></li>
                <!-- <li><a href="tables.html"> <i class="icon-grid"></i>Tables </a></li>
                <li><a href="charts.html"> <i class="fa fa-bar-chart"></i>Charts </a></li>
                <li><a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li> -->
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Hotel Room </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a  href="{{url('create_room')}}">Add Room</a></li>
                    <li><a href="{{url('view_room')}}"></i>View Room </a></li>
                  </ul>
                </li>
                <li class="active"><a href="{{url('booking')}}"> <i class="icon-writing-whiteboard"></i>Booking </a></li>
                <li class="active"><a href="{{url('view_gallary')}}"> <i class="icon-picture"></i>Gallary</a></li>
                <li class="active"><a href="{{url('all_messages')}}"> <i class="icon-email"></i>Messages</a></li>
                
        </ul><span class="heading">Extras</span>
        <!-- <ul class="list-unstyled">
          <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
          <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
          <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
        </ul> -->
        <!-- <ul class="list-unstyled">
          <li> <a href="{{url('create_room')}}"></i>Room </a></li>
          <li> <a href="{{url('view_room')}}"> <i class="icon-writing-whiteboard"></i>View Room</a></li>
          <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
        </ul> -->
      </nav>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>