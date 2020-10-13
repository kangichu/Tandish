<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Cookbook;
use App\Bookmark;
use App\Made;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\UrlGenerator;
//use DB;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $posts = Post::orderBy('updated_at', 'desc')->get();
        return view('home.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $cookbooks = Cookbook::orderBy('created_at', 'desc')->get();
        return view('create.create')->with('cookbooks', $cookbooks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'title' => 'required|max:50',
                'body' => 'required|max:140',
                'ingredients' => 'required',
                'htime' => ['required', 'numeric'],
                'mtime' => ['required', 'numeric'],
                'stime' => ['required', 'numeric'],
                'hcook' => ['required', 'numeric'],
                'mcook' => ['required', 'numeric'],
                'scook' => ['required', 'numeric'],
                'serves' => ['required', 'numeric'],
                'method' => 'required',
                'cookbook_id' =>  'nullable|numeric',
                'cover_image' => 'image|nullable|max:10240'
            ], 
            [
                'title.required' => 'This is a required field.',
                'title.max' => 'The character limit is set at 50.',
                'body.required' => 'This is a required field.',
                'body.max' => 'The character limit is set at 140.',
                'ingredients.required' => 'This is a required field.',
                'htime.required' => 'This is a required field.',
                'mtime.required' => 'This is a required field.',
                'stime.required' => 'This is a required field.',
                'hcook.required' => 'This is a required field.',
                'mcook.required' => 'This is a required field.',
                'scook.required' => 'This is a required field.',
                'serves.required' => 'This is a required field.',
                'method.required' => 'This is a required field.'
            ]
        );

         //Handle File Upload
        if($request->hasFile('cover_image')){
            // Get Filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just Filaname
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // create filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
             $fileNameToStore ='noimage.jpg';
        }

         // Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->ingredients = $request->input('ingredients');
        $post->htime = $request->input('htime');
        $post->mtime = $request->input('mtime');
        $post->stime = $request->input('stime');
        $post->hcook = $request->input('hcook');
        $post->mcook = $request->input('mcook');
        $post->scook = $request->input('scook');
        $post->serves = $request->input('serves');
        $post->method = $request->input('method');
        $post->cookbook_id = $request->input('cookbook_id');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

         return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $bookmark = Bookmark::where('post_id', $id)->get();
        $made = Made::where('post_id', $id)->get();
        $count = Made::get()->count();
        $user_id = auth()->user()->id;
        $url = url()->current();
        return view('recipe.recipe')->with(array('post'=>$post, 'url'=>$url, 'bookmark'=>$bookmark, 'made'=>$made, 'count'=>$count));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $cookbooks = Cookbook::orderBy('created_at', 'desc')->get();

        //Check for correct user
        if(auth()->user()->id !== $post->user_id){
            //return redirect('/posts')->with('error', 'Unauthorized Page');
            return redirect('/home');
        }

        return view('recipe.edit')->with(array('post'=> $post, 'cookbooks' => $cookbooks));
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
        $this->validate($request,
            [
                'title' => 'required|max:50',
                'body' => 'required|max:140',
                'ingredients' => 'required',
                'htime' => ['required', 'numeric'],
                'mtime' => ['required', 'numeric'],
                'stime' => ['required', 'numeric'],
                'hcook' => ['required', 'numeric'],
                'mcook' => ['required', 'numeric'],
                'scook' => ['required', 'numeric'],
                'serves' => ['required', 'numeric'],
                'method' => 'required',
                'cookbook_id' =>  'nullable|numeric',
                'cover_image' => 'image|nullable|max:10240'
            ], 
            [
                'title.required' => 'This is a required field.',
                'title.max' => 'The character limit is set at 50.',
                'body.required' => 'This is a required field.',
                'body.max' => 'The character limit is set at 140.',
                'ingredients.required' => 'This is a required field.',
                'htime.required' => 'This is a required field.',
                'mtime.required' => 'This is a required field.',
                'stime.required' => 'This is a required field.',
                'hcook.required' => 'This is a required field.',
                'mcook.required' => 'This is a required field.',
                'serves.required' => 'This is a required field.',
                'method.required' => 'This is a required field.'
            ]
        );
        
        //Handle File Upload
        if($request->hasFile('cover_image')){
           // Get Filename with the extension
           $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
           // Get just Filaname
           $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
           // Get just ext
           $extension = $request->file('cover_image')->getClientOriginalExtension();
           // create filename to store
           $fileNameToStore = $filename.'_'.time().'.'.$extension;
           //Upload Image
           $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } 
        

        // Create Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->ingredients = $request->input('ingredients');
        $post->htime = $request->input('htime');
        $post->mtime = $request->input('mtime');
        $post->stime = $request->input('stime');
        $post->hcook = $request->input('hcook');
        $post->mcook = $request->input('mcook');
        $post->scook = $request->input('scook');
        $post->serves = $request->input('serves');
        $post->method = $request->input('method');
        $post->cookbook_id = $request->input('cookbook_id');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        //Check for correct user
        if(auth()->user()->id !== $post->user_id){
            //return redirect('/posts')->with('error', 'Unauthorized Page');
            return redirect('/home');
        }

        if ($post->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();       
        return redirect('/home');
    }

}
