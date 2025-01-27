<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        .table_deg{
            border: 2px solid white;
            margin:auto;
            width: 60%;
            text-align:center;
            margin-top:40px;
        }
        .th_deg{
            background-color:white;
            padding:0px;
        }
        .tr{
            border:3px solid white;
        }
        .td{
            padding:0px;
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
                    <form action="{{url('booking')}}" method="post" enctype="multipart/form-data">
                    @csrf 
                        <table class="table_deg">
                            <tr>
                                <th class="th_deg">Room ID</th>
                                <th class="th_deg">Email</th>
                                <th class="th_deg">Customer Name</th>
                                <th class="th_deg">Phone</th>
                                <th class="th_deg">Start Date</th>
                                <th class="th_deg">End Date</th>
                                <th class="th_deg">Status</th>
                                <th class="th_deg">Price</th>
                                <th class="th_deg">Room Title</th>
                                <th class="th_deg">Image</th>
                                <th class="th_deg">Delete</th>
                                <th class="th_deg">Status Update</th>
                                <!-- <th class="th_deg">Update</th> -->
                            </tr>

                            @foreach($data as $data)
                            <tr class="tr">
                                <td>{{$data->room_id}}</td>
                                <!-- <td>{{$data->description}}</td> -->
                                <td>{{ $data->name}}</td> 
                                <td>{{$data->email}}</td>
                                <td>{{$data->phone}}</td>
                                <td>{{$data->start_date}}</td>
                                <td>{{$data->end_date}}</td>
                                <td>
                                    @if($data->status=='approve')
                                    <span style="color:skyblue;">Approve</span>
                                    @endif

                                    @if($data->status=='rejected')
                                    <span style="color:red;">Rejected</span>
                                    @endif

                                    @if($data->status=='waiting')
                                    <span style="color:yellow;">{{$data->status}}</span>
                                    @endif
                                </td>
                                <td>{{$data->total_price}}</td>
                                <td>{{$data->room->room_title}}</td>
                                <td>
                                    <img width="100 !important" src="room\{{$data->room->image}}">
                                </td>
                                <td>
                                    <a onclick ="return confirm('Are you sure to delete this');" class="btn btn-danger" href="{{url('delete_booking', $data->id)}}">Delete</a>
                                </td>
                                <!-- <td>
                                    <a class="btn btn-info" href="{{url('update_room', $data->id)}}">Update</a>
                                </td> -->
                                <td>
                                    <span style="padding-bottom:10px">
                                    <a class="btn btn-success" href="{{url('approve_book', $data->id)}}">Approve</a>
                                    </span>
                                    <a class="btn btn-warning" href="{{url('rejected_book', $data->id)}}">Rejected</a>
                                    
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