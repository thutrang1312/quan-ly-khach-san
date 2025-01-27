<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallary;
use App\Models\Contact;
use App\Models\Rating;
use App\Models\Service;
use App\Models\HasFactory;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $rooms = Room::paginate(6);
        $gallary = Gallary::all();
        // Lấy thông tin người dùng hiện tại
        $user = Auth::user();
        $userName = auth()->user()->name;
        $bookings = Booking::where('name', $userName)->get();

        // Trả về view cùng với dữ liệu đặt phòng
        return view('pages.home', compact('rooms', 'gallary','bookings'));
    }
    // public function room_details($id)
    // {
    //     $room_rating = Room::with('ratings.user')->find($id)->paginate(5);

    //     $room = Room::find($id);
    //     return view('pages.room_details', compact('room', 'room_rating'));
    // }

    public function room_details($id)
    {
        $user = Auth::user();
        $userName = auth()->user()->name;
        $bookings = Booking::where('name', $userName)->get();
        $services = Service::all();
        // Lấy thông tin phòng và các đánh giá của phòng với phân trang
        $room = Room::findOrFail($id);
        $room_rating = $room->ratings()->with('user')->orderBy('created_at', 'desc')->paginate(2);

        return view('pages.room_details', compact('room', 'room_rating','services', 'bookings'));
    }


    public function add_booking(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after:startDate',
        ]);
    
        $startDate = $request->startDate;
        $endDate = $request->endDate;
    
        // Check if the room is already booked
        if (Booking::isRoomBooked($id, $startDate, $endDate)) {
            return redirect()->back()->with('message', 'Room is already booked. Please try different dates.');
        }
    
        $room = Room::findOrFail($id);
        $roomPrice = $room->price;
    
    
        // Calculate the number of days of stay
        $days = (new \DateTime($startDate))->diff(new \DateTime($endDate))->days + 1;
    
        // Calculate the total price
        $totalPrice = ($roomPrice) * $days;
    
        // Save the booking
        Booking::create([
            'room_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'total_price' => $totalPrice,
        ]);
    
        $formattedPrice = number_format($totalPrice, 0, ',', '.');
    
        return redirect()->back()->with('message', "Room booked successfully! Total price: {$formattedPrice} VNĐ");
    }
    

    public function contact(Request $request)
    {
        $contact = new Contact;
        $contact -> name = $request -> name;
        $contact -> email = $request -> email;
        $contact -> phone = $request -> phone;
        $contact -> message = $request -> message;
        $contact -> save();
        return redirect()->back()->with('message', 'Message Sent Successfully');
    }

    public function submitRating(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:255',
            'room_id' => 'required|exists:rooms,id',
        ]);

        // Lưu đánh giá vào cơ sở dữ liệu
        Rating::create([
            'rating' => $request->rating,
            'comment' => $request->comment,
            'room_id' => $request->room_id,
            'user_id' => auth()->id(), // Lưu ID người dùng đã đăng nhập
        ]);

        return redirect()->back();
    }

    public function deleteRating($id)
    {
        // Tìm bản ghi rating theo ID
        $rating = Rating::find($id);
        if ($rating->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this rating!');
        }

        // Xóa bản ghi
        $rating->delete();

        // Trả về thông báo thành công
        return redirect()->back()->with('message', 'Rating and comment deleted successfully!');
    }

 
}
?>