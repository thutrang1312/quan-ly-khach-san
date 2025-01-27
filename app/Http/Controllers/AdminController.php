<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use Illuminate\Support\Facades\Hash;
// use App\Http\Controllers\Booking;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

use App\Models\Gallary;
use App\Models\Contact;
use App\Notifications\SendEmailNotification;
use Notification;

class AdminController extends Controller
{
    public function index(){
        
        $totalUsers = DB::table('users')
        ->select('users.id') 
        ->count(); 

        $totalBookings = DB::table('bookings')
        ->select('bookings.id') 
        ->count(); 

        $totalPrices = DB::table('bookings')
        ->where('status', 'approve')
        ->sum('total_price'); 
        $formattedPrice = $totalPrices >= 1000 ? number_format($totalPrices / 1000, 0) . 'K' : $totalPrices;

        return view('admin.adminHome', ['totalUsers' => $totalUsers, 'totalBookings'=>$totalBookings,'totalPrices'=>$formattedPrice]);
    }
    public function backToIndex()
    {
        $room = Room::all();
        $gallary = Gallary::all();
        return view('pages.index', compact('room'));
    }

    public function create_room()
    {
        return view(view: 'admin.create_room');
    }

    public function booking()
    {
        $data = Booking::all();
        return view('admin.booking', compact('data'));
    }

    public function add_room(Request $request){
        $data = new Room();
        $data -> room_title = $request->title;
        $data -> description = $request->description;
        $data -> price = $request->price;
        $data -> wifi = $request->wifi;
        $data -> room_type = $request->room_type;
        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $data->image= $imagename;
        }
        $data ->save();
        return redirect()->back();
    }

    public function view_room(){
        $data = Room::all();
        return view('admin.view_room', compact('data'));
    }

    public function delete_room($id){
        $data = Room::find($id);
        $data ->delete();
        return redirect()->back();
    }

    public function update_room($id)
    {
        $data = Room::find($id);
        $data ->save();
        return view('admin.update_room', compact('data'));
        
    }

    public function edit_room(Request $request, $id)
    {
        $data = Room::find($id);
        $data -> room_title = $request->title;
        $data -> description = $request->description;
        $data -> price = $request->price;
        $data -> wifi = $request->wifi;
        $data -> room_type = $request->room_type;
        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $data->image= $imagename;
        }
        $data ->save();
        return redirect()->back();
    }

    public function delete_booking($id){
        $data = Booking::find($id);
        $data ->delete();
        return redirect()->back();
    }

    public function approve_book($id){
        $booking = Booking::find($id);
        $booking->status='approve';
        $booking->save();
        return redirect()->back();
    }

    public function rejected_book($id){
        $booking = Booking::find($id);
        $booking->status='rejected';
        $booking->save();
        return redirect()->back();
    }

    public function view_gallary(){
        $gallary = Gallary::all();
        return view('admin.gallary', compact('gallary'));
    }
    
    public function upload_gallary( Request $request)
    {
        $data = new Gallary();
        $image= $request ->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('gallary', $imagename);
            $data->image= $imagename;
        }
        $data ->save();
        return redirect()->back();
    }

    public function delete_gallary($id){
        $data = Gallary::find($id);
        $data ->delete();
        return redirect()->back();
    }

    public function all_messages()
    {
        $data = Contact::all();
        return view('admin.all_messages', compact('data'));   
    }

    public function send_mail($id)
    {
        $data = Contact::find($id);
        return view('admin.send_mail', compact('data'));
    }

    public function mail(Request $request, $id)
    {
        $data=Contact::find($id);
        $details =[
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'endline' => $request->endline,
        ];

        Notification::send($data, new SendEmailNotification($details));

        return redirect()->back();
    }

    public function delete_message($id)
    {
        $message = Contact::findOrFail($id);

        // Xóa tin nhắn
        $message->delete();

        // Trả về phản hồi thành công
        return redirect()->back();

    }

    public function getAnnualRevenue()
    {
        $data = DB::table('bookings')
            ->select(DB::raw('YEAR(start_date) as year'), DB::raw('SUM(total_price) as total_revenue'))
            ->where('status', 'approve')
            ->groupBy('year')
            ->orderBy('year')
            ->get();

        $years = $data->pluck('year'); 
        $revenues = $data->pluck('total_revenue'); 

        return response()->json([
            'years' => $years,
            'revenues' => $revenues,
        ]);
    }

    public function getMonthlyRevenue(Request $request)
    {
        $year = $request->input('year'); 
        $data = DB::table('bookings')
            ->select(DB::raw('MONTH(start_date) as month'), DB::raw('SUM(total_price) as total_revenue'))
            ->where('status', 'approve')
            ->whereYear('start_date', $year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        $months = $data->pluck('month'); 
        $revenues = $data->pluck('total_revenue'); 
    
        $totalRevenueByMonth = array_fill(1, 12, 0); 
        foreach ($months as $index => $month) {
            $totalRevenueByMonth[$month] = $revenues[$index]; 
        }
        $filteredMonths = array_keys(array_filter($totalRevenueByMonth, function ($revenue) {
            return $revenue > 0; // Chỉ giữ lại tháng có doanh thu
        }));
    
        return response()->json([
            'months' => $filteredMonths, // Tháng có booking
            'revenues' => array_values(array_filter($totalRevenueByMonth, function ($revenue) {
                return $revenue > 0; // Chỉ giữ lại doanh thu của tháng có booking
            })),
        ]);
    }
    


}
?>

