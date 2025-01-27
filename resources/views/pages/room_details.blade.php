
<!DOCTYPE html>
<html lang="en">
@include('pages.css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style type="text/css">
    label {
        display: inline-block;
        width: 200px;
    }
    input {
        width: 100%;
    }

    .rating {
        display: flex;  /* Sử dụng flexbox để bố trí trên một dòng */
        font-size: 24px; /* Kích thước chữ */
    }

    .rating input {
        display: none; /* Ẩn input radio */
    }

    .rating label {
        color: gray; /* Màu mặc định của sao */
        cursor: pointer; /* Con trỏ tay khi hover */
    }

    .rating input:checked ~ label {
        color: gold; /* Màu khi được chọn */
    }

    .rating label:hover,
    .rating label:hover ~ label {
        color: lightgray; /* Thay đổi màu khi hover */
    }
    .bed_room td{
        float:left;
        text-align:left;
    }
</style>

<!-- body -->
<body class="main-layout">
    <!-- header -->
    @include('pages.header')

    <div class="our_room">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Room</h2>
                        <p>Lorem Ipsum available, but the majority have suffered</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div id="serv_hover" class="room">
                        <div style="padding: 20px" class="room_img">
                            <figure><img style="height:300px; width:800px" src="/room/{{$room->image}}" alt="#"/></figure>
                        </div>
                        <div class="bed_room">
                            <h4 style="padding:12px">{{$room->room_title}}</h4>
                            
                            <table>
                                <tr>
                                    <td style="margin-left:92px"><b>Free wifi: {{$room->wifi}}</b></td>
                                    <td style="margin-left:140px"><b>Loại phòng: {{$room->room_type}}</b></td>
                                </tr>
                                <tr>
                                    <td style="margin-left:92px"><b>Giá phòng: </b>{{ number_format($room->price, 0, ',', '.') }} VNĐ</td>

                                </tr>
                                <td style="margin-left:92px"><b>Giới thiệu:</b> {{$room->description}}</td></tr>   
                                <tr>
                                    <!-- <td colspan="2" style="margin-left:92px">
                                        <b>Dịch vụ:</b>
                                        <ul>
                                            <td>Dịch vụ dọn phòng cơ bản</td>
                                           <td> Dịch vụ phòng 24/7 (Giá: 200000.00 VNĐ)</td>
                                        </ul>
                                    </td> -->
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <h1 style="font-size:40px !important;">Book Room</h1>

                    <div>
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">X</button>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                    </div>

                    @if($errors)
                    @foreach($errors->all() as $error)
                    <li style="color:red">{{ $error }}</li>
                    @endforeach
                    @endif
                    
                    <form action="{{ url('add_booking', $room->id) }}" method="post">
                        @csrf
                        <div>
                            <label for="name">Name</label>
                            <input type="text" name="name" readonly @if(Auth::id()) value="{{ Auth::user()->name }}" @endif>
                        </div>

                        <div>
                            <label for="email">Email</label>
                            <input type="email" name="email" readonly @if(Auth::id()) value="{{ Auth::user()->email }}" @endif>
                        </div>

                        <div>
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" readonly @if(Auth::id()) value="{{ Auth::user()->phone }}" @endif>
                        </div>

                        <div>
                            <label for="startDate">Start Date</label>
                            <input type="date" name="startDate" id="startDate">
                        </div>

                        <div>
                            <label for="endDate">End Date</label>
                            <input type="date" name="endDate" id="endDate">
                        </div>
                        <div>
                            <br><input type="submit" class="btn btn-success" style="background: skyblue" value="Book Room">
                        </div>
                    </form>
                        <form action="{{ route('submitRating', $room->id) }}" method="POST">
                        @csrf
                            <h3>Rate this room:</h3>
                            <div class="rating">
                                <input type="radio" id="star1" name="rating" value="1" onclick="setRating(1)"><label for="star1">★</label>
                                <input type="radio" id="star2" name="rating" value="2" onclick="setRating(2)"><label for="star2">★</label>
                                <input type="radio" id="star3" name="rating" value="3" onclick="setRating(3)"><label for="star3">★</label>
                                <input type="radio" id="star4" name="rating" value="4" onclick="setRating(4)"><label for="star4">★</label>
                                <input type="radio" id="star5" name="rating" value="5" onclick="setRating(5)"><label for="star5">★</label>
                            </div>
                            <div>
                                <label for="comment">Comment:</label>
                                <textarea name="comment" id="comment" rows="4" cols="50"></textarea>
                            </div>
                            <input type="hidden" name="room_id" value="{{ $room->id }}">
                            <button type="submit" class="btn btn-primary">Submit Rating</button>
                        </form>

                   
                </div>
            </div>
            @if ($room_rating->count())
    <h3>User Reviews</h3>
    <div class="list-group">
    @foreach ($room_rating as $rating)
    <div class="list-group-item mb-3">
        <div class="d-flex justify-content-between">
            <p class="mb-1"><strong>{{ $rating->user->name }}</strong></p> <!-- Hiển thị tên người dùng -->
            <form action="{{ route('delete_rating', $rating->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this rating?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </div>
        <div class="rating mb-1">
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $rating->rating)
                    <span style="color: gold;">★</span> <!-- Sao sáng -->
                @else
                    <span style="color: gray;">★</span> <!-- Sao mờ -->
                @endif
            @endfor
        </div>
        <p class="text-secondary">{{ $rating->comment }}</p> <!-- Hiển thị bình luận -->
        <small class="text-muted">Rated on {{ $rating->created_at->format('d M Y, H:i') }}</small>
        <hr>
    </div>
@endforeach

    </div>

    <!-- Phân trang -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $room_rating->links('pagination::bootstrap-4') }} <!-- Sử dụng bootstrap cho phân trang -->
    </div>
@else
    <p>No reviews yet. Be the first to rate this room!</p>
@endif


        </div>
    </div>
    <!-- footer -->
    @include('pages.footer')

    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>

    <script type="text/javascript">
        $(function() {
            var dtToday = new Date();
            var day = dtToday.getDate();
            var month = dtToday.getMonth() + 1;
            var year = dtToday.getFullYear();

            if(month < 10) {
                month = '0' + month.toString();
            }

            if(day < 10) {
                day = '0' + day.toString();
            }

            var maxDate = year + '-' + month + '-' + day;
            $('#startDate').attr('min', maxDate);
            $('#endDate').attr('min', maxDate);
        });
    </script>

    <script>
        let selectedRating = 0;

        function setRating(rating) {
            selectedRating = rating;
            // Cập nhật màu sao
            document.querySelectorAll('.rating input').forEach((input) => {
                if (input.value <= rating) {
                    input.nextElementSibling.style.color = 'gold'; // Đổi màu sao đã chọn
                } else {
                    input.nextElementSibling.style.color = 'gray'; // Đặt lại màu sao chưa chọn
                }
            });
        }

        function submitRating() {
            const comment = document.getElementById('comment').value;

            if (selectedRating > 0) {
                fetch('{{ url('submit_rating') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        rating: selectedRating,
                        comment: comment,
                        room_id: {{ $room->id }} // ID của phòng hiện tại
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    // Reset rating và comment
                    selectedRating = 0;
                    document.getElementById('comment').value = '';
                    document.querySelectorAll('.rating input').forEach(input => {
                        input.checked = false; // Đặt lại trạng thái sao
                        input.nextElementSibling.style.color = 'gray'; // Đặt lại màu sao
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            } else {
                alert('Please select a star rating before submitting.');
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" 
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0TzpX89jwCm2" 
    crossorigin="anonymous"></script>
</body>
</html>
