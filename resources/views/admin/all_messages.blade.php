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
                    <form action="{{url('all_messages')}}" method="post" enctype="multipart/form-data">
                    @csrf 
                        <table class="table_deg">
                            <tr>
                                <th class="th_deg">Name</th>
                                <th class="th_deg">Email</th>
                                <th class="th_deg">Phone</th>
                                <th class="th_deg">Message</th>
                                <th class="th_deg">Send Email</th>
                                <!-- <th class="th_deg">Update</th> -->
                            </tr>

                            @foreach($data as $data)
                            <tr class="tr">
                                <td>{{ $data->name}}</td> 
                                <td>{{$data->email}}</td>
                                <td>{{$data->phone}}</td>
                                <td>{{$data->message}}</td>
                                <td>
                                <form action="{{route('delete_message', $data->id)}}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-success">Delete</button>
</form>

                                <td>
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