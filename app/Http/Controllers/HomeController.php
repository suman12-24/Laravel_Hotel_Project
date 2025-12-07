<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallery;

class HomeController extends Controller
{

    public function our_rooms()
    {
        $room = Room::all();
        return view('home.our_rooms', compact('room'));
    }
    public function hotel_gallery()
    {
        $gallery= Gallery::all();
        return view('home.hotel_gallery', compact('gallery'));
    }
    public function about_us()
    {
        return view('home.about_us');
    }
    public function contactus()
    {
        return view('home.contact_us');
    }
    public function room_details($id)
    {
        $room = Room::find($id);
        return view('home.room_details', compact('room'));
    }
    public function add_booking(Request $request, $id)
    {
        $request->validate([

            'start_date' => 'required|date',
            'end_date' => 'required|after:start_date',
        ]);

        $booking = new Booking();

        $booking->room_id = $id;
        $booking->name = $request->input('name');
        $booking->email = $request->input('email');
        $booking->phone = $request->input('phone');

        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $isBooked = Booking::where('room_id', $id)
            ->where('start_date', '<=', $endDate)->where('end_date', '>=', $startDate)
            ->exists();

        if ($isBooked) {
            return redirect()->back()->with('message', 'Room is already booked for the selected date range.');
        } else {
            $booking->start_date = $request->input('start_date');
            $booking->end_date = $request->input('end_date');
            $booking->save();

            return redirect()->back()->with('message', 'Booking successful!');
        }
    }
    public function contact_us(Request $request)
    {
        $contact = new Contact();

        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->message = $request->input('message');

        $contact->save();

        return redirect()->back()->with('message', 'Your message has been sent successfully!');
    }
   
}
