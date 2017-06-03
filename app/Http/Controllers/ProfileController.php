<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Image;
use File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = Auth::user();
        return $userid;
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->birthdate = $request->birthdate;
        $user->gender = $request->gender;
        $user->province = $request->province;
        $user->city = $request->city;
        $user->districts = $request->districts;
        $user->address = $request->address;
        $user->postcode = $request->postcode;
        $user->phone = $request->phone;

        $user->save();

        return "success";
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

    public function showAvatar($value='')
    {
      # code...
    }

    public function avatarupload(Request $request)
    {

          $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

          $useravatar = Auth::user()->avatar;
          File::delete('images/' . $useravatar);

          $imageName = time().'.'.$request->image->getClientOriginalExtension();
          $path = public_path('images');
          $request->image->move($path,$imageName);

          //put image path into database
          $userid = Auth::user()->id;
          $user = User::find($userid);
          $user->avatar = $imageName;
          $user->save();

          return back()
            ->with('success','Image Uploaded successfully.')
            ->with('path',$imageName);
    }



}
