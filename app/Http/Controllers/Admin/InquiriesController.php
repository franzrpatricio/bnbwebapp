<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\InquiryFormRequest;

class InquiriesController extends Controller
{
    #VIEW
    public function index(Request $request){
        // $inquiries = Inquiry::get();
        if ($request->has('trashed')) {
            # code...
            $inquiries = Inquiry::onlyTrashed()->paginate(2);
        } else {
            # code...
            $inquiries = Inquiry::paginate(2);
        }
        // $inquiries = Inquiry::all();
        return view('users.admin.inquiry.index', compact('inquiries'));
    }
    #DELETE
    public function destroy($inquiry_id){
        $inquiry = Inquiry::find($inquiry_id);
        if ($inquiry) {
            # code...
            #then delete all data based from id
            $inquiry->delete();

            //insert to activity logs
            $user_id = Auth::user()->id;
            $name = Auth::user()->name;
            $role_as = Auth::user()->role_as;
            $description = "Successfully Deleted Inquiry";
            $date_time = Carbon::now();

            $data = [
                'user_id'       => $user_id,
                'name'          => $name,
                'description'   => $description,
                'created_at'     => $date_time,
                'role_as'       => $role_as
            ];
            DB::table('user_activity_logs')->insert($data);  
            return redirect('admin/inquiries')->with('msg','Successfully Deleted Inquiry');
        }else {
            return redirect('admin/inquiries')->with('msg','No Inquiry ID found');
        }
    }

    /**
     * restore specific post
     *
     * @return void
     */
    public function restore($inquiry_id)
    {
        Inquiry::withTrashed()->find($inquiry_id)->restore();
        //insert to activity logs
        $user_id = Auth::user()->id;
        $name = Auth::user()->name;
        $role_as = Auth::user()->role_as;
        $description = "Successfully Restored Inquiries";
        $date_time = Carbon::now();

        $data = [
            'user_id'       => $user_id,
            'name'          => $name,
            'description'   => $description,
            'created_at'     => $date_time,
            'role_as'       => $role_as
        ];
        DB::table('user_activity_logs')->insert($data);  
        return redirect()->back()->with('msg','Successfully Restored Inquiries');
    }  

    /**
     * restore all post
     *
     * @return response()
     */
    public function restore_all()
    {
        Inquiry::onlyTrashed()->restore();
        //insert to activity logs
        $user_id = Auth::user()->id;
        $name = Auth::user()->name;
        $role_as = Auth::user()->role_as;
        $description = "Successfully Restored All Inquiries";
        $date_time = Carbon::now();

        $data = [
            'user_id'       => $user_id,
            'name'          => $name,
            'description'   => $description,
            'created_at'     => $date_time,
            'role_as'       => $role_as
        ];
        DB::table('user_activity_logs')->insert($data);  
        return redirect()->back()->with('msg','Successfully Restored All Inquiries');
    }

    #SEARCH
    public function search(Request $request){
        $find_this = $request->get('query');
        $inquiries = Inquiry::where('id', 'LIKE', '%'.$find_this.'%')
            ->orWhere('proj_name', 'LIKE', '%'.$find_this.'%')
            ->orWhere('name', 'LIKE', '%'.$find_this.'%')
            ->orWhere('email', 'LIKE', '%'.$find_this.'%')
            ->orWhere('phone', 'LIKE', '%'.$find_this.'%')
            ->orWhere('address', 'LIKE', '%'.$find_this.'%')
            ->orWhere('message', 'LIKE', '%'.$find_this.'%')
            ->orWhere('created_at', 'LIKE', '%'.$find_this.'%')
            ->paginate(2);
        if (count ($inquiries) > 0) {
            return view('users.admin.inquiry.index', compact('inquiries'));
        } else {
            # code...
            return view ('users.admin.inquiry.index', compact('inquiries'))->with( 'No inquiries Found. 🥺' );
        }
    }
}
