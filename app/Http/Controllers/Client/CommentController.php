<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Projects;
use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    //
    public function index(){
        $comments = Comments::paginate(4);
        return view('users.admin.comments.index',compact('comments'));
    }
    public function store(Request $request){
        $project = Projects::where('slug',$request->project_slug)
            // ->where('id',$request->project_id)
            ->where('status','1')
            ->first();

        $validator = Validator::make($request->all(),[
            'comment' => 'required|string',
        ]);

        if ($validator->fails()) {
            # code...
            return redirect()->back()->with('msgc','You have to leave a comment here first before submitting.');
        }

        if ($project) {
            # code...
            Comments::create([
                'project_id' => $project->id,
                'name' => $request->name,
                'email' => $request->email,
                'comment' => $request->comment
            ]);
            return redirect()->back()->with('msgc','Your Comment is posted!');
        } else {
            # code...
            return redirect()->back()->with('msgc','No Projects Found.');
        }
    }
    #DELETE
    public function destroy($comment_id){
        $comment = Comments::find($comment_id);
        if ($comment) {
            # code...
            #then delete all data based from id
            $comment->delete();
            return redirect('admin/comments')->with('msg','Successfully Deleted Project');
        }else {
            return redirect('admin/comments')->with('msg','No Project ID found');
        }
    }
    public function search(Request $request){
        $find_this = $request->get('query');
        $comments = Comments::where('id', 'LIKE', '%'.$find_this.'%')
            ->orWhere('name', 'LIKE', '%'.$find_this.'%')
            ->orWhere('email', 'LIKE', '%'.$find_this.'%')
            ->orWhere('comment', 'LIKE', '%'.$find_this.'%')
            ->paginate(4);
        if (count ($comments) > 0) {
            return view('users.admin.comments.index', compact('comments'));
        } else {
            # code...
            return view ('users.admin.comments.index', compact('comments'))->with('msg','No Projects Found.🥺' );
        }
    }
}
