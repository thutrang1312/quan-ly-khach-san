<!DOCTYPE html>
<html>
  <head> 
  <base href="/public">
    @include('admin.css')
    
        <style type="text/css">
        /* .table_deg{
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
        } */

        .lable{
            display: inline-block;
            width: 200px;
        }
        .div_deg{
            padding-top:30px;
        }
        .div_center{
            padding-top:40px;
            text-align:center;
        }
        form{
            text-align:center;
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
                    <span style="text-align: center">
                        <h1 style="font-size:30px; font-weight:bold;">Mail send to {{$data->name}}</h1>
                        <form action="{{url('mail', $data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf 
                        <div class="div_deg">
                            <lable>Greeting</lable>
                            <input type="text" name="greeting">
                        </div>
                        <div class="div_deg">
                            <lable>Mail Body</lable>
                            <textarea name="body"></textarea>
                        </div>
                        <div class="div_deg">
                            <lable>Action Text</lable>
                            <input type="text" name="action_text">
                        </div>
                        <div class="div_deg">
                            <lable>Action Url</lable>
                            <input type="text" name="action_url">
                        </div>
                        <div class="div_deg">
                            <lable>End Line</lable>
                            <input type="text" name="endline">
                        </div>

                        <input class="btn btn-info" type="submit" value="Send Mail">
                        
                    </form>
                    </span>
                </div>
            </div>
        </div>
    </div>
    @include('admin.adminFooter')
  </body>
</html>