<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class SettingsController extends Controller
{

    function index()
    {
        return view('settings',['user' => Auth::user()]);
    }

    function store(Request $request)
    {
        $rules = array(
        'password'  => 'required',
        'CPassword' => 'required|same:password'
        );
    
        $user = Auth::user();

        if($request->has("name") && $request->get("name") != null)
        {
            $user->name = $request->get("name");
        }
        if(    $request->has("password")
            && $request->has("CPassword") 
            && $request->get("password") != null 
            && $request->get("CPassword") != null)
        {  
            $validatedData = $request->validate($rules);
            $user->password = Hash::make($request->get("password"));
        
        }
        $user->save();
        $request->session()->flash('alert-success', 'User was successful added!');
        return redirect('home')->with('status','Profile updated!');
    }

}
