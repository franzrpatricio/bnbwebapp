<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\FaqFormRequest;


class FaqsController extends Controller
{
    #VIEW
    public function index(Request $request){
        // $faqs = Faq::all();
        if ($request->has('trashed')) {
            # code...
            $faqs = Faq::onlyTrashed()->paginate(3);
        } else {
            # code...
            $faqs = Faq::paginate(3);
        }
        return view('users.admin.faqs.index', compact('faqs'));
    }
    #CREATE
    public function create(){
        #FORM
        return view('users.admin.faqs.create');
    }
    public function store(FaqFormRequest $request){
        #SAVING
        $data = $request->validated();
        $faq = new Faq;
        $faq->question = $data['question'];
        $faq->answewr = $data['answewr'];
        $faq->posted_by = Auth::user()->id;
        $faq->save();

        //insert to activity logs
        $user_id = Auth::user()->id;
        $name = Auth::user()->name;
        $role_as = Auth::user()->role_as;
        $description = "Added a FAQ";
        $date_time = Carbon::now();

        $data = [
            'user_id'       => $user_id,
            'name'          => $name,
            'description'   => $description,
            'created_at'     => $date_time,
            'role_as'       => $role_as
        ];
        DB::table('user_activity_logs')->insert($data);
        return redirect('admin/faqs')->with('msg','Successfully Created FAQ');
    }
    #VIEW specific project
    public function edit($faq_id){
        $faq = Faq::find($faq_id);
        return view('users.admin.faqs.edit', compact('faq'));
    }
    #UPDATE specific project
    public function update(FaqFormRequest $request, $faq_id){
        $data = $request->validated();
        $faq = Faq::find($faq_id);
        $faq->question = $data['question'];
        $faq->answewr = $data['answewr'];
        $faq->posted_by = Auth::user()->id;
        $faq->update();

         //insert to activity logs
         $user_id = Auth::user()->id;
         $name = Auth::user()->name;
         $role_as = Auth::user()->role_as;
         $description = "Update FAQs";
         $date_time = Carbon::now();

     $data = [
         'user_id'       => $user_id,
         'name'          => $name,
         'description'   => $description,
         'created_at'     => $date_time,
         'role_as'       => $role_as
     ];
         
         DB::table('user_activity_logs')->insert($data);

        return redirect('admin/faqs')->with('msg','Successfully Updated FAQ');
    }
    #DELETE
    public function destroy($faq_id){
        $faq = Faq::find($faq_id);
        if ($faq) {
            # code...
            #then delete all data based from id
            $faq->delete();

            //insert to activity logs
            $user_id = Auth::user()->id;
            $name = Auth::user()->name;
            $role_as = Auth::user()->role_as;
            $description = "Successfully Deleted FAQ";
            $date_time = Carbon::now();

            $data = [
                'user_id'       => $user_id,
                'name'          => $name,
                'description'   => $description,
                'created_at'     => $date_time,
                'role_as'       => $role_as
            ];
            DB::table('user_activity_logs')->insert($data);
            return redirect('admin/faqs')->with('msg','Successfully Deleted FAQ');
        }else {
            return redirect('admin/faqs')->with('msg','No FAQ ID found');
        }
    }

    /**
     * restore specific post
     *
     * @return void
     */
    public function restore($faq_id)
    {
        Faq::withTrashed()->find($faq_id)->restore();

        //insert to activity logs
        $user_id = Auth::user()->id;
        $name = Auth::user()->name;
        $role_as = Auth::user()->role_as;
        $description = "Successfully Restored FAQ";
        $date_time = Carbon::now();

        $data = [
            'user_id'       => $user_id,
            'name'          => $name,
            'description'   => $description,
            'created_at'     => $date_time,
            'role_as'       => $role_as
        ];
        DB::table('user_activity_logs')->insert($data);
        return redirect('admin/faqs')->with('msg', 'Successfully Restored FAQ');
    }  

    /**
     * restore all post
     *
     * @return response()
     */
    public function restore_all()
    {
        Faq::onlyTrashed()->restore();

        //insert to activity logs
        $user_id = Auth::user()->id;
        $name = Auth::user()->name;
        $role_as = Auth::user()->role_as;
        $description = "Successfully Restored FAQ";
        $date_time = Carbon::now();

        $data = [
            'user_id'       => $user_id,
            'name'          => $name,
            'description'   => $description,
            'created_at'     => $date_time,
            'role_as'       => $role_as
        ];
        DB::table('user_activity_logs')->insert($data);
        return redirect('admin/faqs')->with('msg', 'Successfully Restored All FAQ');
    }

    #SEARCH
    public function search(Request $request){
        $find_this = $request->get('query');
        $faqs = Faq::where('id', 'LIKE', '%'.$find_this.'%')
            ->orWhere('question', 'LIKE', '%'.$find_this.'%')
            ->orWhere('answewr', 'LIKE', '%'.$find_this.'%')
            // ->orWhere('role_as', 'LIKE', '%'.$find_this.'%')
            // ->orWhere('status', 'LIKE', '%'.$find_this.'%')
            ->paginate(2);
        if (count ($faqs) > 0) {
            return view('users.admin.faqs.index', compact('faqs'));
        } else {
            # code...
            return view ('users.admin.faqs.index', compact('faqs'))->with( 'No FAQ Found. 🥺' );
        }
    }
}
