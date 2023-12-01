<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;


class AdminBookingController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = \DB::table('bookings')
                ->join('properties', 'bookings.property_id', 'properties.id')
                ->join('users', 'bookings.customer_id', 'users.id')
                ->select('bookings.*', \DB::raw("DATE_FORMAT(bookings.check_in, '%d-%m-%y') as formatted_check_in"), \DB::raw("DATE_FORMAT(bookings.check_out, '%d-%m-%y') as formatted_check_out"), 'properties.name as property_name', 'users.name as username')
                ->where('bookings.status', '1')
                ->get();

                return \DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('Actions', function ($data) {
                        $btn = '<a href="'. url('admin/view_booking', $data->id ) .'" class="btn btn-sm btn-success">View</a>';
                        // $btn .= '<a href="javascript:void(0)" data-id="' . $data->id . '" class="delete-queries btn btn-sm btn-danger">Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['Actions'])
                    ->make(true);
            } else {
                return view('admin.booking.booking');
            }
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect('/');
        }
    }
    
    public function veiw_booking($id){
        $booking =  \DB::table('bookings')
        ->join('properties', 'bookings.property_id', 'properties.id')
        ->join('users','bookings.customer_id','users.id')
        ->select('bookings.*', 'properties.name as property_name','users.name as user_name','users.email as user_email','users.phone as user_phone')
        ->where('bookings.id', $id)
        ->first();
    //   dd($booking);
        return view('admin.booking.view',compact('booking'));
    }
    
    public function AdminPayment(Request $request){
        try {
            if ($request->ajax()) {
                $data = \DB::table('bookings')
                ->join('properties', 'bookings.property_id', 'properties.id')
                ->join('users', 'bookings.customer_id', 'users.id')
                ->select('bookings.*', \DB::raw('properties.name as property_name'), \DB::raw('users.name as username'))
                ->where('users.user_type', '1')
                ->where('bookings.status', '1')
                ->get();

                return \DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('Actions', function ($data) {
                        $btn = '<a href="'. url('admin/view_booking', $data->id ) .'" class="btn btn-sm btn-success">View</a>';
                        $btn .= ' <a href="'. url('admin/view_booking', $data->id ) .'" class="btn btn-sm btn-success">PayNow</a>';
                        // $btn .= '<a href="javascript:void(0)" data-id="' . $data->id . '" class="delete-queries btn btn-sm btn-danger">Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['Actions'])
                    ->make(true);
            } else {
                return view('admin.payment.payment');
            }
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect('/');
        }
    }
}
