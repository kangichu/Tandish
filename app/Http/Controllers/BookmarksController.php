<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookmark;
use App\User;
use Auth;

class BookmarksController extends Controller
{
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
            'post_id' => ['required', 'integer'],
        ]);

        // Create Post
        $bookmark = new Bookmark;
        $bookmark->post_id = $request->input('post_id');
        $bookmark->user_id = auth()->user()->id;
        $bookmark->save();

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
        $posts = Auth::user()->bookmarks;
        $user = User::find($id);
        //$posts = $book->posts()->orderBy('created_at', 'desc')->get();
        $bookmarkcount = $user->bookmarks()->count();
        $bookmark = Bookmark::find($id);
        return view('bookmark.bookmark')->with(array('posts' => $posts, 'bookmark'=>$bookmark, 'bookmarkcount'=>$bookmarkcount, 'user'=>$user));
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
        //
    }
}
