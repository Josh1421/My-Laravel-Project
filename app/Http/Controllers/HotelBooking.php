<?php

namespace App\Http\Controllers;

use App\Models\RoomCategories;
use App\Models\HotelRooms;
use App\Models\CheckInList;
use App\Models\CheckOutList;
use App\Models\BookRequest;
use App\Models\FamilyData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class HotelBooking extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("hotel_booking.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function room_categories()
    {
        $room_categories = RoomCategories::all();
        return view("hotel_booking.room_categories", compact('room_categories'));
    }

    public function store_room_categories(Request $request)
    {
        $data = request()->validate([
            'category' => 'required',
            'price' => 'required',
            'image' => ['required', 'image']
        ]);

        $newImageName = time() . '-' . $request->category . '.' . $request->image->extension();
        $test = $request->image->move(public_path('img'), $newImageName);

        RoomCategories::create([
            'category' => $data['category'],
            'price' => $data['price'],
            'image' => $newImageName
        ]);

        return redirect("/HotelBooking/room_categories");
    }

    public function edit_room_category($id)
    {
      $category_id = RoomCategories::find($id);
      return response()->json([
        'status' => 200,
        'category' => $category_id,
      ]);
    }

    public function update_room_category(Request $request)
    {
      $newImageName = time() . '-' . $request->category_name . '.' . $request->category_image->extension();
      $test = $request->category_image->move(public_path('img'), $newImageName);
      
      $category_id = $request->category_id;
      $category = RoomCategories::find($category_id);
      $category->category = $request->category_name;
      $category->price = $request->category_price;
      $category->image = $newImageName;
      $category->update();

      return redirect("/HotelBooking/room_categories");
    }

    public function delete_room_category(Request $request, $id)
    {
      $delete = RoomCategories::where('id', $id)->delete();
      return redirect("/HotelBooking/room_categories");
    }

    public function rooms()
    {
      $room_categories = RoomCategories::all();
      $rooms = HotelRooms::all();
      return view("hotel_booking.rooms", compact('room_categories', 'rooms'));
    }

    public function store_room(Request $request)
    {
      $data = request()->validate([
        'room_number' => 'required',
      ]);

      $category_id = RoomCategories::find($request->room_category);

      HotelRooms::create([
        'room_number' => $data['room_number'],
        'category_id' => $category_id->id,
        'category' => $category_id->category,
        'price' => $category_id->price,
        'image' => $category_id->image,
        'availability' => $request->availability,
      ]);

      return redirect("/HotelBooking/rooms");
    }

    public function edit_room_availability($id)
    {
      $room_id = HotelRooms::find($id);
      return response()->json([
        'status' => 200,
        'category' => $room_id,
      ]);
    }

    public function update_room(Request $request)
    {
      $category_id = RoomCategories::find($request->category_name);

      $category = HotelRooms::find($request->hotel_room_id);
      $category->room_number = $request->room_number;
      $category->category_id = $category_id->id;
      $category->category = $category_id->category;
      $category->price = $category_id->price;
      $category->image = $category_id->image;
      $category->availability = $request->edit_availability;
      $category->update();

      return redirect("/HotelBooking/rooms");
    }

    public function delete_room(Request $request, $id)
    {
      $delete = HotelRooms::where('id', $id)->delete();
      return redirect("/HotelBooking/rooms");
    }

    public function checkin()
    {
      // $rooms = HotelRooms::all();
      $rooms = HotelRooms::where('availability', 'LIKE', 'Available')->get();
      $checked_in_lists = DB::table('hotel_rooms')->join('check_in_lists', 'check_in_lists.room_id', '=', 'hotel_rooms.id')->get();
      return view("hotel_booking.checkIn", compact('rooms', 'checked_in_lists'));
    }

    public function store_checkIn(Request $request)
    {
      $room = HotelRooms::find($request->hotel_room_id);

      CheckInList::create([
        'room_id' => $request->hotel_room_id,
        'guest_name' => $request->guest_name,
        'guest_contact' => $request->guest_contact,
        'checkin_date' => $request->checkin_date,
        'checkout_date' => $request->guest_checkout_date,
        'days' => $request->days,
        'sub_total' => $request->sub_total,
        'down_payment' => $request->down_payment,
        'total_balance' => $request->total_balance,
      ]);

      $room->availability = "Unavailable";
      $room->update();

      return redirect("/HotelBooking/checkin");
    }

    public function view_details($id)
    {
      $list_id = CheckInList::find($id);
      $room = HotelRooms::find($list_id->room_id);
      return response()->json([
        'list' => $list_id,
        'room' => $room,
      ]);
    }

    public function checkout($id)
    {
      $list_id = CheckInList::find($id);
      $room = HotelRooms::find($list_id->room_id);
      return response()->json([
        'list' => $list_id,
        'room' => $room,
      ]);
    }

    public function checkout_guest(Request $request)
    {
      $checkin_list = CheckInList::find($request->checkinList_id);

      CheckOutList::create([
        'room_id' => $checkin_list->room_id,
        'guest_name' => $checkin_list->guest_name,
        'guest_contact' => $checkin_list->guest_contact,
        'checkin_date' => $checkin_list->checkin_date,
        'checkout_date' => $checkin_list->checkout_date,
        'days' => $checkin_list->days,
        'sub_total' => $checkin_list->sub_total,
        'down_payment' => $checkin_list->down_payment,
        'total_balance' => $checkin_list->total_balance,
        'change' => $request->outchange,
      ]);

      $room_ids = HotelRooms::find($checkin_list->room_id);
      $room_ids->availability = "Available";
      $room_ids->update();

      $delete = CheckInList::where('id', $checkin_list->id)->delete();
      return redirect("/HotelBooking/checkin");
    }

    public function book()
    {
      $categories = RoomCategories::all();
      return view("hotel_booking.book_rooms", compact('categories'));
    }

    public function book_category($category)
    {
      $rooms = HotelRooms::where('category', 'LIKE', $category)->where('availability', 'LIKE', 'Available')->get();
      return view("hotel_booking.guest_bookRoom", compact('rooms'));
    }

    public function store_book_request(Request $request)
    {
      $room_id = HotelRooms::find($request->hotel_room_id);
      
      BookRequest::create([
        'room_id' => $room_id->id,
        'guest_name' => $request->guest_name,
        'guest_contact' => $request->guest_contact,
        'checkin_date' => $request->checkin_date,
        'checkout_date' => $request->checkout_date,
        'days' => $request->days,
        'child' => $request->child,
        'adult' => $request->adult,
      ]);

      return redirect("/HotelBooking/book/room_category/{$room_id->category}");
    }

    public function booked()
    {
      $bookRequest_lists = DB::table('hotel_rooms')->join('book_requests', 'book_requests.room_id', '=', 'hotel_rooms.id')->get();

      return view("hotel_booking.booked_list", compact('bookRequest_lists'));
    }

    public function checkin_request($id)
    {
      $book_request = BookRequest::find($id);
      $room = HotelRooms::find($book_request->room_id);
      return response()->json([
        'book_request' => $book_request,
        'room' => $room,
      ]);
    }

    public function store_book(Request $request)
    {
      $room = HotelRooms::find($request->hotel_room_id);

      CheckInList::create([
        'room_id' => $request->hotel_room_id,
        'guest_name' => $request->guest_name,
        'guest_contact' => $request->guest_contact,
        'checkin_date' => $request->checkin_date,
        'checkout_date' => $request->guest_checkout_date,
        'days' => $request->days,
        'sub_total' => $request->sub_total,
        'down_payment' => $request->down_payment,
        'total_balance' => $request->total_balance,
      ]);

      $room->availability = "Unavailable";
      $room->update();

      $delete = BookRequest::where('id', $request->book_id)->delete();
      return redirect("/HotelBooking/booked");
    }

    public function home()
    {
      return view("hotel_booking.home");
    }

    

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function jquery_add_list()
    {
      return view("jquery_practice.add_list");
    }

    public function jquery_add_list_post(Request $request)
    {
      for($count = 0; $count<count($_POST['hidden_first_name']); $count++)
      {
        $data = array(
          'first_name' => $_POST['hidden_first_name'][$count],
          'middle_name' => $_POST['hidden_middle_name'][$count],
          'last_name' => $_POST['hidden_last_name'][$count],
          'age' => $_POST['hidden_age'][$count],
          'relationship' => $_POST['hidden_relationship'][$count],
          'number' => $_POST['hidden_number'][$count]
        );
        FamilyData::create($data);
      }

    }

    public function boostrap_practice()
    {
      return view("bootstrap_practice.layout_design");
    }

    public function dashboard()
    {
      return view("admin_dashboard.admin");
    }
}
