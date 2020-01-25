<?php

namespace App\Http\Controllers\Admin\Section;

use App\Models\Section;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        return view('Admin.Section.Index_view',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd($user);
        $users = User::where('role','=','user')->select('id','name')->get();
        return view('Admin.Section.Add_view',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $section = new Section();
        $section->name = $request->name;
        if(!empty($request->input('admin'))){
        $section->user_id = Auth::user()->id;
        $user = User::findOrfail($section->user_id);
        $user->role = "editor";
        $user->save();
        }
        $section->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = Section::findOrfail($id);
       //dd($user->section);
        $users = User::where('role','=','user')->select('id','name')->get();
      //  dd($section->admin->id);
        return view('Admin.Section.Update_view',compact(['users','section']));
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
        $section = Section::findOrfail($id);
        $section->name = $request->input('name');
        $section->save();
       // dd($section);
        if(is_null($request->input('admin')) or $section->user_id !=$request->input('admin') ){
            if(!is_null($section->user_id)) {
                $old_admin = User::find($section->user_id);
                $old_admin->role = "user";
                $old_admin->save();
            }
            $section->user_id = $request->input('admin');
            $section->save();
            if(!is_null($request->input('admin'))){
                //$admin = User::findOrfail($request->input('admin'));
                $user = User::findOrfail($section->user_id);
                $user->role = "editor";
                $user->save();
            }
           }

        $section->save();
        return redirect()->back();
    }

    public function delete($id){
        $section = Section::findOrfail($id);
        return view('Admin.Section.Delete_view',compact('section'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
      //*/  return view('Admin.Section.Delete_view');
        //        $section = Section::findOrfail($id);
        //        $section->delete();
        //        //$request->session()->flash('success','This Post Was Successfully Deleted');
        //        //return redirect(route('Section.index'));*/
        $section = Section::findOrfail($id);
        $section->delete();
        return redirect(route('Section.index'));
        /*if($request->isMethod('post')){
            $section->delete();
            return redirect(route('Section.index'));
        }else{
            return view('Admin.Section.Delete_view',compact('section'));
        }*/
    }
}
