<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\CategoryFormRequest;

#class extends class
#CONTROLLER extends MODEL
class CategoryController extends Controller
{
    public function index(Request $request){
        #VIEW category page of index.blade.php in admin/category
        #get all categories
        if ($request->has('trashed')) {
            $category = Category::onlyTrashed()->paginate(3);
        } else {
            $category = Category::paginate(3);
        }
        // $category = Category::all();
        return view('users.admin.category.index', compact('category'));
    }

    public function create(){
        #VIEW category create form
        return view('users.admin.category.create');
    }

    public function store(CategoryFormRequest $request){
        #BACKEND PART...CONTROLLER COMMUNICATING WITH MODEL
        #CategoryFormRequest=FormValidation before inserting data...
        $data = $request->validated();
        $category = new Category;
        $category->name = $data['name'];
        #SEO slug
        $category->slug = Str::slug($data['slug']);
        $category->description = $data['description'];
        
        #image condition...
        #if data has image file...
        if ($request->hasfile('image')) {
            #store image file from data in to $file
            $file = $request->file('image');
            #then get extension of image file 
            #together with the timestamp uploaded 
            #and store it in $filename
            $filename = time().'.'. $file->getClientOriginalExtension();
            #move the $filename in directory
            $file->move('uploads/category/', $filename);
            #store filename as data for image field in db 
            #then in to $category
            $category->image = $filename;
        }
      
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];

        $category->status = $request->status == true ? '1':'0';
        $category->feature = $request->feature == true ? '1':'0';

        #get id of authenticated user who posted the category
        $category->created_by = Auth::user()->id;
        #after everything....
        #save the category
        $category->save();

                //insert to activity logs
                $user_id = Auth::user()->id;
                $name = Auth::user()->name;
                $role_as = Auth::user()->role_as;
                $description = "Created Category";
                $date_time = Carbon::now('Asia/Manila')->format('d-M-Y h:i:s a');

            $data = [
                'user_id'       => $user_id,
                'name'          => $name,
                'description'   => $description,
                'date_time'     => $date_time,
                'role_as'       => $role_as
            ];
                
                DB::table('user_activity_logs')->insert($data);

        #redirect with message;see in index.blade.php
        return redirect('admin/categories')->with('msg','Successfully Added New Category. Thanks!');
    }
    
    #VIEW specific category
    public function edit($category_id){
        $category = Category::find($category_id);
        return view('users.admin.category.edit', compact('category'));
    }
    #UPDATE specific category
    public function update(CategoryFormRequest $request, $category_id){
        $data = $request->validated();

        $category = Category::find($category_id);
        $category->name = $data['name'];
        #SEO slug
        $category->slug = Str::slug($data['slug']);
        $category->description = $data['description'];
        
        #image condition...
        #if data has image file...
        if ($request->hasfile('image')) {
            #delete first the current image
            #before inserting new image
            #check the path if it is right
            $destination = 'uploads/category/'.$category->image;
            if (File::exists($destination)) {
                # code...
                #if the path exists, delete it
                File::delete($destination);
            }

            #store image file from data in to $file
            $file = $request->file('image');
            #then get extension of image file 
            #together with the timestamp uploaded 
            #and store it in $filename
            $filename = time().'.'. $file->getClientOriginalExtension();
            #move the $filename in directory
            $file->move('uploads/category/', $filename);
            #store filename as data for image field in db 
            #then in to $category
            $category->image = $filename;
        }
  
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];

        $category->status = $request->status == true ? '1':'0';
        $category->feature = $request->feature == true ? '1':'0';
        
        #get id of authenticated user who posted the category
        $category->created_by = Auth::user()->id;
        #after everything....
        #save the category
        $category->update();

        //insert to activity logs
        $user_id = Auth::user()->id;
        $name = Auth::user()->name;
        $role_as = Auth::user()->role_as;
        $description = "Update a Category";
        $date_time = Carbon::now('Asia/Manila')->format('d-M-Y h:i:s a');

    $data = [
        'user_id'       => $user_id,
        'name'          => $name,
        'description'   => $description,
        'date_time'     => $date_time,
        'role_as'       => $role_as
    ];
        
        DB::table('user_activity_logs')->insert($data);

        #redirect with message;see in index.blade.php
        return redirect('admin/categories')->with('msg','Successfully Updated Category. Thanks! :D');
    }

    public function destroy($category_id){
        $category = Category::find($category_id);
        if ($category) {
            # code...
            #write condiiton to delete image
            // $destination = 'uploads/category/'.$category->image;
            // if (File::exists($destination)) {
            //     # code...
            //     File::delete($destination);
            // }
            #then delete all data based from id
            $category->delete();
            return redirect('admin/categories')->with('msg','Successfully Deleted Category');
        }else {
            return redirect('admin/categories')->with('msg','No Category ID found');
        }
    }

    /**
     * restore specific post
     *
     * @return void
     */
    public function restore($category_id)
    {
        Category::withTrashed()->find($category_id)->restore();
  
        return redirect('admin/categories')->with('msg','success');
    }  
  
    /**
     * restore all post
     *
     * @return response()
     */
    public function restore_all()
    {
        Category::onlyTrashed()->restore();
  
        return redirect('admin/categories')->with('msg','success');
    }

    #SEARCH
    public function search(Request $request){
        $find_this = $request->get('query');
        $category = Category::where('id', 'LIKE', '%'.$find_this.'%')
            ->orWhere('name', 'LIKE', '%'.$find_this.'%')
            // ->orWhere('email', 'LIKE', '%'.$find_this.'%')
            // ->orWhere('role_as', 'LIKE', '%'.$find_this.'%')
            // ->orWhere('status', 'LIKE', '%'.$find_this.'%')
            ->paginate(2);
        if (count ($category) > 0) {
            return view('users.admin.category.index', compact('category'));
        } else {
            # code...
            return view ('users.admin.category.index', compact('category'))->with( 'No Category Found. 🥺' );
        }
    }
}
