<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;
class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());
        return back()->withStatus('Profile successfully updated.');
    }

    public function updateimage(Request $request){
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $imageName =  time().'.'.$filename;  
            $request->image->move(public_path('images'), $imageName);
            auth()->user()->update(['image'=>$imageName]);
        }
        return redirect()->back()->withStatus('Profile Image successfully updated.');;
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus('Password successfully updated.');
    }
}
