<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        .table_deg{
            border: 2px solid white;
            margin:auto;
            width: 80%;
            text-align:center;
            margin-top:40px;
        }
        .th_deg{
            background-color:white;
            padding:15px;
        }
        .tr{
            border:3px solid white;
        }
        .td{
            padding:10px;
        }
        
    </style>
  </head>
  <body>
    @include('admin.adminHeader')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.adminSidebar')
      <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <form action="{{url('view_room')}}" method="post" enctype="multipart/form-data">
                    @csrf 
                        <table class="table_deg">
                            <tr>
                                <th class="th_deg">Room Title</th>
                                <th class="th_deg">Description</th>
                                <th class="th_deg">Price</th>
                                <th class="th_deg">Wifi</th>
                                <th class="th_deg">Room Type</th>
                                <th class="th_deg">Image</th>
                                <th class="th_deg">Delete</th>
                                <th class="th_deg">Update</th>
                            </tr>

                            @foreach($data as $data)
                            <tr class="tr">
                                <td>{{$data->room_title}}</td>
                                <!-- <td>{{$data->description}}</td> -->
                                <td>{{ Str::limit($data->description, 150) }}</td> 
                                <td>{{$data->price}}</td>
                                <td>{{$data->wifi}}</td>
                                <td>{{$data->room_type}}</td>
                                <td>
                                    <img width="100" src="room\{{$data->image}}">
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="{{url('delete_room', $data->id)}}">Delete</a>
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{url('update_room', $data->id)}}">Update</a>
                                </td>
                            </tr>
                            @endforeach

                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.adminFooter')
  </body>
</html>