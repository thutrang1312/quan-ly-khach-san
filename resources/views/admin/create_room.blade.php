<!DOCTYPE html>
<html lang="vi">
  <head> 
    @include('admin.css')
    <style type="text/css">
        /* Tổng thể của form */
        .container-fluid form {
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            background-color: #f5f5f5;  /* Nền sáng hơn */
            border-radius: 10px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            font-family: 'Arial', sans-serif;
            color: #333; /* Màu chữ đen */
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
            background-color: #fff;
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
            background-color: #007bff;  /* Màu xanh lam */
            color: #ffffff;
            font-weight: bold;
            border: none;
            padding: 12px 25px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-top: 10px;
        }

        /* Hiệu ứng hover cho nút */
        .container-fluid form .btn-success:hover {
            background-color: #0056b3; /* Màu xanh lam đậm hơn khi hover */
        }

        /* Định dạng cho input file */
        .container-fluid form input[type="file"] {
            padding: 5px;
            background-color: #fff;
        }

        /* Định dạng cho text của link */
        .container-fluid form a {
            color: #28a745;
            font-size: 14px;
            text-decoration: none;
            text-align: center;
            display: block;
            margin-top: 10px;
        }

        .container-fluid form a:hover {
            text-decoration: underline;
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
                    <form action="{{url('add_room')}}" method="post" enctype="multipart/form-data">
                    @csrf 
                        <div>
                            <lable>Room Title</lable>
                            <input type="text" name="title" placeholder="Enter room title">
                        </div>
                        <div>
                            <lable>Description</lable>
                            <textarea name="description" placeholder="Enter room description"></textarea>
                        </div>
                        <div>
                            <lable>Price</lable>
                            <input type="number" name="price" placeholder="Enter room price">
                        </div>
                        <div>
                            <lable>Room Type</lable>
                            <select name="room_type">
                                <option selected value="regular">Regular</option>
                                <!-- <option value="premium">Premium</option> -->
                                <option value="deluxe">Deluxe</option>
                            </select>
                        </div>
                        <div>
                            <lable>Free Wifi</lable>
                            <select name="wifi">
                                <option selected value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div>
                            <lable>Image</lable>
                            <input type="file" name="image">
                        </div>
                        <div>
                            <input class="btn btn-success" type="submit" value="Add Room">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     @include('admin.adminFooter')
  </body>
</html>
