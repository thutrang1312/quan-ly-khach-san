<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
        /* Tổng thể của form */
.container-fluid form {
    max-width: 600px;
    margin: 40px auto;
    padding: 30px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    font-family: 'Arial', sans-serif;
}

/* Định dạng từng phần trong form */
.container-fluid form div {
    margin-bottom: 20px;
}

/* Định dạng cho nhãn (label) */
.container-fluid form lable {
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
                    <form action="{{url('edit_room', $data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf 
                        <div>
                            <label>Room Title</label>
                            <input type="text" name="title" value="{{$data->room_title}}">
                        </div>
                        <div>
                            <lable>Description</lable>
                            <textarea name="description">{{$data->description}}</textarea>
                        </div>
                        <div>
                            <lable>Price</lable>
                            <input type="number" name="price" value="{{$data->price}}">
                        </div>
                        <div>
                            <lable>Room Type</lable>
                            <select name="room_type">
                                <option selected value="{{$data->room_type}}">{{$data->room_type}}</option>
                                <option value="regular">Thông thường</option>
                                <option value="premium">Cao cấp</option>
                                <option value="deluxe">Sang trọng</option>
                            </select>
                        </div>
                        <div>
                            <lable>Free wifi</lable>
                            <select name="wifi">
                                <option selected value="{{$data->wifi}}">{{$data->wifi}}</option>
                                <option selected value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div>
                            <lable>Image</lable>
                            <img type="file" name="image" src="/room/{{$data->image}}">
                            <input type="file" name="image" id="image">
                        </div>
                        <div>
                        <input class="btn btn-info" type="submit" value="Edit Room">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     @include('admin.adminFooter')
  </body>
</html>