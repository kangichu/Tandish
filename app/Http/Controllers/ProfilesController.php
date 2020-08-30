<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Auth;
use App\User;
use App\Post;
use App\Profile;
use App\Cookbook;

class ProfilesController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $cookbooks = $user->cookbooks()->orderBy('created_at', 'desc')->get();
        $posts = $user->posts()->orderBy('created_at', 'desc')->get();
        $postCount = $user->posts()->count();
        $cookbookCount = $user->cookbooks()->count();
        return view('profile.profile')->with(array("user" => $user, "posts" => $posts, "postCount" => $postCount, 'cookbooks' => $cookbooks, 'cookbookCount' => $cookbookCount));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);

        //Check for correct user
        if(auth()->user()->id !== $profile->user_id){
            //return redirect('/posts')->with('error', 'Unauthorized Page');
            return redirect('/home');
        }

        return view('profile.edit')->with('profile', $profile);
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
            'bio' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'pinterest' => 'required',
            'youtube' => 'required',
            'link' => 'required'
        ]);

        $user = User::find($id);
        $profile = $user->profile()->get();
        dd($profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function posts($id)
    {
        $user = User::find($id);
        $posts = $user->posts()->orderBy('created_at', 'desc')->get();
        $postCount = $user->posts()->count();
        return view('recipes.recipes')->with(array("user" => $user, "posts" => $posts, "postCount" => $postCount));
    }
}
