<?php

namespace App\Http\Controllers\Client;

use Carbon\Carbon;
use App\Models\Comments;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Egulias\EmailValidator\Warning\Comment;

class CommentController extends Controller
{
    //
    public function index(Request $request){
        if ($request->has('trashed')) {
            $comments = Comments::onlyTrashed()->paginate(4);
        } else {
            $comments = Comments::paginate(4);
        }
        return view('users.admin.comments.index',compact('comments'));
    }
    public function store(Request $request){
        $project = Projects::where('slug',$request->project_slug)
            ->where('id',$request->project_id)
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
            return redirect()->back()->with('msgcom','Your Comment is posted!');
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

            //insert to activity logs
            $user_id = Auth::user()->id;
            $name = Auth::user()->name;
            $role_as = Auth::user()->role_as;
            $description = "Successfully Deleted Comment";
            $date_time = Carbon::now();

            $data = [
                'user_id'       => $user_id,
                'name'          => $name,
                'description'   => $description,
                'created_at'     => $date_time,
                'role_as'       => $role_as
            ];
            DB::table('user_activity_logs')->insert($data);
            return redirect('admin/comments')->with('msg','Successfully Deleted Comment');
        }else {
            return redirect('admin/comments')->with('msg','No Comment ID found');
        }
    }

    /**
     * restore specific post
     *
     * @return void
     */
    public function restore($comment_id)
    {
        Comments::withTrashed()->find($comment_id)->restore();
        //insert to activity logs
        $user_id = Auth::user()->id;
        $name = Auth::user()->name;
        $role_as = Auth::user()->role_as;
        $description = "Successfully Restored Comment";
        $date_time = Carbon::now();

        $data = [
            'user_id'       => $user_id,
            'name'          => $name,
            'description'   => $description,
            'created_at'     => $date_time,
            'role_as'       => $role_as
        ];
        DB::table('user_activity_logs')->insert($data);  
        return redirect('admin/comments')->with('msg','Successfully Restored Comment');
    }  
  
    /**
     * restore all post
     *
     * @return response()
     */
    public function restore_all()
    {
        Comments::onlyTrashed()->restore();
        //insert to activity logs
        $user_id = Auth::user()->id;
        $name = Auth::user()->name;
        $role_as = Auth::user()->role_as;
        $description = "Successfully Restored All Comments";
        $date_time = Carbon::now();

        $data = [
            'user_id'       => $user_id,
            'name'          => $name,
            'description'   => $description,
            'created_at'     => $date_time,
            'role_as'       => $role_as
        ];
        DB::table('user_activity_logs')->insert($data);    
        return redirect('admin/comments')->with('msg','Successfully Restored All Comments');
    }

    #SEARCH FUNCTION
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
