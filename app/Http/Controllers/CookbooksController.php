<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cookbook;

class CookbooksController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

        // Create Post
        $cookbook = new Cookbook;
        $cookbook->title = $request->input('title');
        $cookbook->description = $request->input('description');
        $cookbook->user_id = auth()->user()->id;
        $cookbook->save();

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cookbook = Cookbook::find($id);
        $posts = $cookbook->posts()->orderBy('created_at', 'desc')->get();
        $postCount = $cookbook->posts()->count();
        return view('cookbook.cookbook')->with(array('cookbook'=> $cookbook, 'posts' => $posts, 'postCount' => $postCount));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cookbook = Cookbook::find($id);

        //Check for correct user
        if(auth()->user()->id !== $cookbook->user_id){
            //return redirect('/posts')->with('error', 'Unauthorized Page');
            return redirect('/home');
        }


        $cookbook->delete();       
        return redirect('/home');
    }

    public function posts($id)
    {
        $cookbook = Cookbook::find($id);
        $posts = $cookbook->posts()->orderBy('created_at', 'desc')->get();
        $postCount =$cookbook->posts()->count();
        return view('recipes.cookrecipes')->with(array("posts" => $posts, "postCount" => $postCount, 'cookbook' => $cookbook));
    }
}
