<?php

namespace App\Http\Controllers\Admin;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\InquiryFormRequest;

class InquiriesController extends Controller
{
    #VIEW
    public function index(Request $request){
        $inquiries = Inquiry::get();
        if ($request->has('trashed')) {
            # code...
            $inquiries = Inquiry::onlyTrashed()->get();
        }
        // $inquiries = Inquiry::all();
        return view('users.admin.inquiry.index', compact('inquiries'));
    }
    #CREATE
    public function create(){
        #FORM
        return view('users.admin.inquiry.create');
    }
    public function store(InquiryFormRequest $request){
        #SAVING
        $data = $request->validated();
        $inquiry = new Inquiry;
        $inquiry->namme = $data['namme'];
        $inquiry->email = $data['email'];
        $inquiry->contact = $data['contact'];
        $inquiry->address = $data['address'];
        $inquiry->posted_by = Auth::user()->id;
        $inquiry->save();
        return redirect('admin/inquiries')->with('msg','Successfully Created Inquiry');
    }
    #VIEW specific project
    public function edit($faq_id){
        $faq = Inquiry::find($faq_id);
        return view('users.admin.inquiry.edit', compact('faq'));
    }
    #UPDATE specific project
    public function update(InquiryFormRequest $request, $inquiry_id){
        $data = $request->validated();
        $inquiry = Inquiry::find($inquiry_id);
        $inquiry->namme = $data['namme'];
        $inquiry->email = $data['email'];
        $inquiry->contact = $data['contact'];
        $inquiry->address = $data['address'];
        $inquiry->posted_by = Auth::user()->id;
        $inquiry->update();
        return redirect('admin/inquiries')->with('msg','Successfully Updated Inquiry');
    }
    #DELETE
    public function destroy($inquiry_id){
        $inquiry = Inquiry::find($inquiry_id);
        if ($inquiry) {
            # code...
            #then delete all data based from id
            $inquiry->delete();
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
        return redirect()->back();
    }  

    /**
     * restore all post
     *
     * @return response()
     */
    public function restoreAll()
    {
        Inquiry::onlyTrashed()->restore();
  
        return redirect()->back();
    }
}
