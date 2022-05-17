<?php

namespace App\Http\Controllers\Client;

use App\Models\Inquiry;
use App\Models\Category;
use App\Models\Projects;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectInquiryMail;

class ClientController extends Controller
{
    //
    public function index(){
        return view('client.index');
    }
    public function portfolio(){
        $category = Category::where('navbar_status','1')->where('status','1')->get();
        return view('client.portfolio', compact('category'));
    }
    public function specProject($category_id){
        $projects = Projects::where('category_id', $category_id)->where('status','1')->get();
        return view('client.specialization',compact('projects'));
    }
    public function profile(){
        return view('client.profile');
    }
    public function project(){
        return view('client.project');
    }
    public function contact(){
        return view('client.contact');
    }
    public function sendEmail(Request $request){
        //validate form
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'message'=>$request->message

        ];

        $inquiry = new Inquiry;
        $inquiry->name = $data['name'];
        $inquiry->email = $data['email'];
        $inquiry->phone = $data['phone'];
        $inquiry->address = $data['address'];
        $inquiry->message = $data['message'];

        $inquiry->save();

        Mail::to('rbana989e@gmail.com')->send(new ContactMail($data));
        return redirect('/contact')->with('msg','Thanks for reaching out!');
    }
    public function sendProjInquiry(Request $request){
        //validate form
        
        $data = [
            'proj_name' => "QC Proj",
            'proj_id' => "123",
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'message'=>$request->message

        ];

        $inquiry = new Inquiry;
        $inquiry->proj_id = $data['proj_id'];
        $inquiry->proj_name = $data['proj_name']; 
        $inquiry->name = $data['name'];
        $inquiry->email = $data['email'];
        $inquiry->phone = $data['phone'];
        $inquiry->address = $data['address'];
        $inquiry->message = $data['message'];

        $inquiry->save();

        Mail::to('rbana989e@gmail.com')->send(new ProjectInquiryMail($data));
        return redirect('/project')->with('msg','Thanks for reaching out!');
    }
}
