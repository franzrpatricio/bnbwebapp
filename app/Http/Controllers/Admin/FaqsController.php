<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
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

    /**
     * restore specific post
     *
     * @return void
     */
    public function restore($faq_id)
    {
        Faq::withTrashed()->find($faq_id)->restore();
        return redirect('admin/faqs')->with('msg', 'success');
    }  

    /**
     * restore all post
     *
     * @return response()
     */
    public function restore_all()
    {
        Faq::onlyTrashed()->restore();
        return redirect('admin/faqs')->with('msg', 'success');
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
