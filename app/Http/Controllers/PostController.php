<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index() {

        $search = request('search');
        

        if($search) {

            $posts = Post::where([
                ['title','like','%'.$search.'%']
            ])->get()->sortByDesc('id');
            

        } else {

            $posts = Post::all()->sortByDesc('id');
       
        }
        
        return view('index',['posts' => $posts, 'search' => $search]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {

        $post = new Post;

        $post->title = $request->title;
        $post->description = $request->description;
        

        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')).".".$extension;
            $requestImage->move(public_path('img/posts'),$imageName);
            $post->image = $imageName;
        }

        $user = auth()->user();
        $post->user_id = $user->id;

        $post->save();

        return redirect('/')->with('msg','Postagem criada com sucesso!');
    }

    public function show($id) {
        $post = Post::findOrFail($id);

        $postAuthor = User::where('id',$post->user_id)->first()->toArray();

        return view('posts.show',['post'=>$post, 'postAuthor' => $postAuthor]);
    }

    public function dashboard(){
        $user = auth()->user();
        $posts = $user->posts;

        return view('posts.dashboard',['posts'=>$posts]);
    }

    public function destroy($id){
        Post::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg','Postagem excluída com sucesso!');
    }

    public function edit($id) {

        $user = auth()->user();
        $post = Post::findOrFail($id);
        if($user->id != $post->user->id) {
            return redirect('/dashboard');
        }
        return view('posts.edit',['post' => $post]);
    } 

    public function update(Request $request) {
        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')).".".$extension;
            $requestImage->move(public_path('img/posts'),$imageName);
            $data['image'] = $imageName;
        }
        Post::findOrFail($request->id)->update($data);
        return redirect('/dashboard')->with('msg','Postagem editada com sucesso!');
    }
}
