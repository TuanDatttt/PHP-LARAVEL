<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;






class BlogController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }
    //
    public function index(Request $request )
    {
        if($request->search){
            $posts = Post::where('title','like','%' . $request->search . '%')
            ->orWhere('body','like','%' . $request->search . '%')->latest()->paginate(4);
            // last Post       search = %ost%
        }elseif($request->category){
            $posts = Category::where('name',$request->category)->firstOrFail()->posts()->paginate(4)->withQueryString();
        }
        else{
            $posts = Post::latest()->paginate(4);
        }
        $categories = Category::all();
        return view('blogPosts.blog',compact('posts','categories'));
    }

    // public function show($slug){
    //     $post = Post::Where('slug',$slug)->first();
    //     return view('blogPosts.single-blog',compact('post'));
    // }

    //Using Route Model
    public function edit(Post $post){
        if(auth()->user()->id !== $post->user->id){
            abort(403);
        }
        return view('blogPosts.edit-blog',compact('post'));
    }

    // Edit
    public function show(Post $post){
        return view('blogPosts.single-blog',compact('post'));
    }
      // Create
      public function create(){
        $categories = Category::all();
        return view('blogPosts.create-blog',compact('categories'));
    }
    // Update
     public function update(Request $request,Post $post){
        if(auth()->user()->id !== $post->user->id){
            abort(403);
        }
        $request->validate([
            'title' =>'required',
            'body' => 'required',
            'image' => 'required | image',
        ]);
        $title = $request->input('title');
        $postId = $post->id;
        $slug = Str::slug($title,'-') . '-' . $postId;
        $body = $request->input('body');
        // file upload
        $imagePath ='storage/' . $request->file('image')->store('postsImage','public');
        //model post
        $post -> title = $title;
        $post -> slug = $slug;
        $post -> body = $body;
        $post -> imagePath = $imagePath;

        $post->save();

        return redirect()->back()->with('status','Post Edited Successfully');
    }
    // Delete blog
    public function destroy(Post $post){
        $post->delete();
        return redirect()->back()->with('status','Post Deleted Successfully');

    }
    
    // Create to DB
    public function store(Request $request){
        
        $request->validate([
            'title' =>'required',
            'body' => 'required',
            'image' => 'required | image',
            'category_id' => 'required'
        ]);
        $title = $request->input('title');
        $category_id = $request->input('category_id');
        if(Post::latest()->first() !== null){
            $postId = Post::latest()->first()->id + 1; 
        }
        else{
            $postId = 1;
        }
        $slug = Str::slug($title,'-') . '-' . $postId;
        $user_id = Auth::user()->id;
        $body = $request->input('body');
        // file upload
        $imagePath ='storage/' . $request->file('image')->store('postsImage','public');
        //model post
        $post = new Post();
        $post -> title = $title;
        $post -> category_id = $category_id;
        $post -> slug = $slug;
        $post -> user_id = $user_id;
        $post -> body = $body;
        $post -> imagePath = $imagePath;

        $post->save();

        return redirect()->back()->with('status','Post create Successfully');


        
    }
    

}
