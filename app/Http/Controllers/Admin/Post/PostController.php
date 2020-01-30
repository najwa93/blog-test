<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Photo;
use App\Models\Post;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->role == 'editor'){
            $sections = Section::where('user_id',$user->id)->get();
            $posts = Post::where('section_id',$sections->first()->id)->get();
        }else{
            $sections = Section::all();
            $posts= Post::all();

        }
       return view('Admin.Post.Index_view',compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if($user->role == 'editor'){
           $sections = Section::where('user_id',$user->id)->get();
       }else{
           $sections = Section::all();
        }

        //dd($temp);
        $photos = Photo::all();

        return view('Admin.Post.Add_view',compact(['sections','photos']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        //dd($user);
        $section = Section::findOrFail($request->input('section_id'));
        if($user->can('control_post',$section)){
            $post = new Post();
            $post->title = $request->title;
            $post->text = $request->text;
            $post->user_id = $user->id;
            $post->section_id = $section->id;
            $post->save();
            $post->photo()->attach($request->input('photos'));
            $post->save();
            return redirect()->back();
        }else{
            dd('Error You Have No Permession');
        }
    }

    /*protected function getFlag()
    {
        $user = Auth::user();
        if ($user->role == 'editor') {
            $sections = Section::where('user_id', $user->id)->get();
        } else {
            $sections = Section::all();
        }
        return $sections;
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $user = Auth::user();
        if($user->can('control_post',$post->section)){
            if($user->role == 'editor'){
                $sections = Section::where('user_id',$user->id)->get();
            }else{
                $sections = Section::all();
            }
        //$temp = $sections->all();
        //dd($temp);
        $photos = Photo::all();
        }else{
            dd('Error You Have No Permession');
        }
        return view('Admin.Post.Update_view',compact('post','sections','photos'));
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
        $post = Post::find($id);
        $user = Auth::user();


            $post->title = $request->title;
            $post->text = $request->text;
            $post->title = $request->title;
            $post->photo()->detach();
            $post->photo()->attach($request->input('photos'));
            $post->save();
            return redirect()->back();

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
