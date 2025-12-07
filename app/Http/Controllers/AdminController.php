<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Room;

use App\Models\Booking;

use App\Models\Gallery;

use App\Models\Contact;

use Illuminate\Support\Facades\File;

use App\Notifications\SendEmailNotification;
 
use Illuminate\Support\Facades\Notification;


class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $userType = Auth::user()->usertype;

            if ($userType == 'user') {
                 $room = Room::all();
                 $gallery = Gallery::all();
                return view('home.index', compact('room', 'gallery'));
            } else if ($userType == 'admin') {
                return view('admin.index');
            } else {
                return redirect()->back();
            }
        }
    }
    public function home()
    {
        $room = Room::all();
        $gallery = Gallery::all();
        return view('home.index', compact('room', 'gallery'));
    }
    public function create_room()
    {
        return view('admin.create_room');
    }
    public function add_room(Request $request)
    {
        $data = new Room;
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->type;
        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('roomimage', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect()->back()->with('message', 'Room Added Successfully');
    }

    public function view_room()
    {
        $data = Room::all();
        return view('admin.view_room', compact('data'));
    }

    public function edit_room($id)
    {
        $data = Room::find($id);
        return view('admin.edit_room', compact('data'));
    }

    public function update_room(Request $request, $id)
    {
        $data = Room::find($id);
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->type;
        $image = $request->image;

        if ($image) {
            $old_image = $data->image;
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('roomimage', $imagename);
            $data->image = $imagename;
            $image_path = public_path('roomimage/' . $old_image);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        if ($data->save()) {
            return redirect()->route('view_room')->with('message', 'Room Updated Successfully');
        }
    }

    public function delete_room($id)
    {
        $data = Room::find($id);
        $image_path = public_path('roomimage/' . $data->image);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $data->delete();
        return redirect()->back()->with('message', 'Room Deleted Successfully');
    }
    public function view_booking()
    {
        $data = Booking::all();
        return view('admin.view_booking', compact('data'));
    }
     public function delete_booking($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->delete();
            return redirect()->back()->with('message', 'Booking deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Booking not found.');
        }
    }
    public function update_booking_status( Request $request, $id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            if ($request->status == 'Approved') {
                $booking->status = 'Approved';
            } else if ($request->status == 'Rejected') {
                $booking->status = 'Rejected';
            }
            $booking->save();
            return redirect()->back()->with('message', 'Booking status updated to ' . $request->status . '.');
        } else {
            return redirect()->back()->with('error', 'Booking not found.');
        }
    }
    public function view_gallery()
    {
        $gallery = Gallery::all();
        return view('admin.view_gallery', compact('gallery'));
    }
    public function upload_gallery(Request $request)
    {
        $data = new Gallery;
        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('galleryimage', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect()->back()->with('message', 'Image Uploaded Successfully');
    }
    public function delete_gallery($id)
    {
        $data = Gallery::find($id);
        $image_path = public_path('galleryimage/' . $data->image);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $data->delete();
        return redirect()->back()->with('message', 'Image Deleted Successfully');
    }
    public function view_message()
    {
        $messages = Contact::all();
        return view('admin.view_message', compact('messages'));
    }
    public function send_email($id)
    {
        $data = Contact::find($id);
        return view('admin.send_email', compact('data'));
    }
    public function mail(Request $request, $id)
    {
      
        $contact = Contact::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'end_line' => $request->end_line,
        ];

        Notification::send($contact, new SendEmailNotification($details));
        return redirect()->back()->with('message', 'Email sent successfully.');
    }
}
