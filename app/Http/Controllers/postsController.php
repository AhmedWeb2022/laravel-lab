<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;

class postsController extends Controller
{
   
    public function index(){
    
        $allPosts = Post::paginate(25);
        return view('posts.index', [
          'posts' => $allPosts
        ]);
    }
    public function show($postId){
       $post = Post::find($postId);
        return  view('posts.show',[
            'post' => $post
        ]);
    }
    public function create(){
        $allUsers= User::all();
        // dd($allUsers);
        return view('posts.create',[
            'users' => $allUsers
        ]);
    }
    public function store(){
        $data = request()->all();
        // dd($data);
        Post::create([
            'title' => $data['title'],
            'description' =>$data['description'],
            'user_id' => $data['posted-by']
        ]);
       return redirect()->route('posts.index');
    }
    public function edit($postId) {
        $post = Post::find($postId);
        return view('posts.edit',[
            'post' => $post
        ]);
    }
    public function update( $postId) {
        $data = request()->all();
        // dd($x->all(),$postId);
        Post::find($postId)->update(['title'=>$data['title'],'description' =>$data['description']]);
        return redirect()->route('posts.index');
    }
    public function destroy($postId) {
     
        // dd($postId);
        Post::find($postId)->delete();
        return redirect()->route('posts.index');
    }
}
