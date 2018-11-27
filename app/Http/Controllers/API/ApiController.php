<?php

namespace App\Http\Controllers\API;

use App\City;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Webpatser\Uuid\Uuid;

class ApiController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Auth::user()->createToken("test")->accessToken;
        //
    }
    public function login(Request $request)
    {

    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required',

            'email' => 'required|email',

            'password' => 'required',

            'c_password' => 'required|same:password',

        ]);


        $user = new User;
        $user->fill($request->toArray());

        $user->id =UUid::generate()->string;
        $user->password = bcrypt($request->input('password'));

        $city = new City;
        $city->CityName = 'default';
        $city->LoggingCampLevel = 1;
        $city->SilverMineLevel = 1;
        $city->IronMineLevel = 1;
        $city->AcademyLevel = 1;
        $city->Academy = null;
        $city->Garrison_id = null;
        $city->Owner_id = $user->id;
        $city->id = UUid::generate()->string;
        $user->save();
        $city->save();

        return response()->json($user->createToken('API')->accessToken);


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
