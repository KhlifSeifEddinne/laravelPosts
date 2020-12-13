<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\post;
//use App\user;
use DB;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = post::all();
        //$posts = post::orderby('id', 'desc')->take(2)->get();  //ELEQUENT
        //$posts = post::orderby('id', 'desc')->get();  //ELEQUENT
        //return post::where('title', 'post two')->get(); //ELEQUENT
        //$posts = DB::select('SELECT * FROM Posts WHERE title="post two"'); //SQL QUERY
        $posts = post::orderby('created_at', 'desc')->paginate(6);
        return view('posts.index')->with('posts', $posts);
    }
    //55
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if ($request->hasFile('cover_image')) {
            //Get Filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just Fileaname
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just Extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename To Store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload The Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //create post
        $post = new post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'post created');
        //$fileImageUpdated = $fileNameToStore;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::find($id);
        //check for correct user byPath
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        //Handle File Upload
        if ($request->hasFile('cover_image')) {
            //Get Filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just Fileaname
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just Extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename To Store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload The Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        // $fileImageUpdated = $fileNameToStore;

        //create post
        $post = post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if ($request->hasFile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }
        /* if ($fileImageUpdated != $post->cover_image) {
            Storage::delete('public/cover_images/' . $post->cover_image);
        }*/
        $post->save();

        return redirect("/posts")->with('success', 'post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::find($id);
        //check for correct user byPath
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        if ($post->cover_image != 'noimage.jpg') {
            //Delete Image
            Storage::delete('public/cover_images/' . $post->cover_image);
        }
        $post->delete();
        return redirect('/posts')->with('success', 'Post deleted');
    }
}
