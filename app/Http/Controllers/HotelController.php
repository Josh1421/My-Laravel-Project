<?php

namespace App\Http\Controllers;

use App\Models\NewGuest;
use App\Models\Discount;
use App\Models\Room;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("hotel.index");
    }

    public function create_guest()
    {
        return view("hotel.createguest");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_guest()
    {
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'status' => 'required'
        ]);

        NewGuest::create($data);

        return redirect("/hotel/newguest");
    }

    public function guest_list()
    {
        $guests = NewGuest::where('status', 'LIKE', 'Active')->orderBy('created_at', 'DESC')->get();

        return view("hotel.guestlist", compact('guests'));
    }

    public function create_discount()
    {
        $discounts = Discount::all();

        return view("hotel.creatediscount", compact('discounts'));
    }

    public function store_discount()
    {
        $data = request()->validate([
            'discount_type' => 'required',
            'discount_rate' => 'required'
        ]);

        Discount::create($data);

        return redirect("/hotel/discount");
    }

    public function create_room()
    {
        $rooms = Room::all();

        return view("hotel.createroom", compact('rooms'));
    }

    public function store_room()
    {
        $data = request()->validate([
            'room_number' => 'required',
            'room_type' => 'required',
            'room_rate' => 'required',
            'number_occupancy' => 'required'
        ]);

        Room::create($data);

        return redirect("/hotel/room");
    }

    public function create_newcheckin()
    {
        $guests = NewGuest::all();
        $rooms = Room::all();
        $discounts = Discount::all();
        
        return view("hotel.createcheckin", compact('guests', 'rooms', 'discounts'));
    }

    public function checkin_check()
    {
        $guest = NewGuest::where('id', 'LIKE', request('guest_name'))->get();
        return redirect("/hotel/newcheckin/{$guest[0]->id}");
    }

    public function selected_checkin($guest_id)
    {
        $guest = NewGuest::where('id', 'LIKE', $guest_id)->get();
        return $guest;
    }

    public function selected_checkin_room($guest_id)
    {
        $room = Room::where('id', 'LIKE', $guest_id)->get();
        return $room;
    }

    public function selected_checkin_discountType($guest_id)
    {
        $discount = Discount::where('id', 'LIKE', $guest_id)->get();
        return $discount;
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
}
