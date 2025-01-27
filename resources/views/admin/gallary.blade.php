<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
        /* Tổng thể của form */
.container-fluid form {
    /* max-width: 600px;
    margin: 40px auto;
    padding: 30px;
    background-color: black;
    border-radius: 10px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    font-family: 'Arial', sans-serif; */
    text-align:center;
}

/* Định dạng từng phần trong form */
.container-fluid form div {
    margin-bottom: 20px;
}

/* Định dạng cho nhãn (label) */
.container-fluid form label {
    display: block;
    font-weight: bold;
    color: #495057;
    margin-bottom: 8px;
    font-size: 16px;
}

/* Định dạng trường input, select, và textarea */
.container-fluid form input[type="text"],
.container-fluid form input[type="number"],
.container-fluid form select,
.container-fluid form textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ced4da;
    border-radius: 5px;
    font-size: 15px;
    color: #495057;
    background-color: #f8f9fa;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

/* Hiệu ứng khi focus vào input */
.container-fluid form input[type="text"]:focus,
.container-fluid form input[type="number"]:focus,
.container-fluid form select:focus,
.container-fluid form textarea:focus {
    border-color: #80bdff;
    outline: none;
}

/* Tùy chỉnh cho textarea */
.container-fluid form textarea {
    height: 120px;
    resize: vertical;
}

/* Định dạng nút "Add Room" */
.container-fluid form .btn-success {
    background-color: #28a745;
    color: #ffffff;
    font-weight: bold;
    border: none;
    padding: 12px 25px;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: 100%;
}

/* Hiệu ứng hover cho nút */
.container-fluid form .btn-success:hover {
    background-color: #218838;
}

/* Định dạng cho input file */
.container-fluid form input[type="file"] {
    padding: 5px;
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
                <form action ="{{url('view_gallary')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <h1 style="font-side:40px; font-weight:bolder; color:white;">Gallary</h1>
                    <div class="row">
                        @foreach($gallary as $gallary)
                        <div class="col-md-4">
                        <img style="height: 200px!important; width:300px!important;" src="/gallary/{{$gallary->image}}">
                        <a class="btn btn-danger" href="{{url('delete_gallary', $gallary->id)}}">Delete Image</a>
                        </div>
                        <td>
                        @endforeach
                    </div>
                </form>
                    <form action ="{{url('upload_gallary')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div style="padding:30px">
                            <label style="color:white; font-weight:bold;">Upload Image</label>
                            <input type="file" name="image">
                            <input type="submit" value="Add Image">
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
     @include('admin.adminFooter')
  </body>
</html>