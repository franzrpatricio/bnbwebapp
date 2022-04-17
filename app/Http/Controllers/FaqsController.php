<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\FaqFormRequest;

class FaqsController extends Controller
{
    #VIEW
    public function index( ){
        $faqs = Faq::all();
        
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
        return redirect('admin/faqs')->with('msg','Successfully Created FAQ');
    }
    #VIEW specific project
    public function edit($faq_id){
        $faq = Faq::find($faq_id);
        return view('users.admin.faq.edit', compact('faq'));
    }
    #UPDATE specific project
    public function update(FaqFormRequest $request, $faq_id){
        $data = $request->validated();
        $faq = Faq::find($faq_id);
        $faq->question = $data['question'];
        $faq->answewr = $data['answewr'];
        $faq->posted_by = Auth::user()->id;
        $faq->update();
        return redirect('admin/faqs')->with('msg','Successfully Updated FAQ');
    }
    #DELETE
    public function destroy($faq_id){
        $faq = Faq::find($faq_id);
        if ($faq) {
            # code...
            #then delete all data based from id
            $faq->delete();
            return redirect('admin/faqs')->with('msg','Successfully Deleted FAQ');
        }else {
            return redirect('admin/faqs')->with('msg','No FAQ ID found');
        }
    }

    #RESTORE SINGLE
    public function restore($faq_id){
        Faq::withTrashed()->find($faq_id)->restore();
        return back()->with('msg','FAQ Successfully Restored');
    }

    #RESTORE ALL
    public function restore_all(){
        Faq::onlyTrashed()->restore();
        return back()->with('msg', 'All FAQS Successfuly Restored');
    }
}
