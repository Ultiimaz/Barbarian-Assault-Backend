<?php

namespace App\Http\Controllers;

use App\Page;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = new Post;

        $pages = Page::all();
    return Response()->json($pages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $title = $request->input('title');
        $description = $request->input('description');
        
        $testBoard = new boards;
        $url = str_replace(' ', '_', $title);
        $testBoard->url = $url;
        $testBoard->BoardTitle = $title;
        $testBoard->BoardDescription = $description;
        $testBoard->BoardOwner = Auth::user()->name;
        $testBoard->CreatedAt = Carbon::now();
        $testBoard->isRemoved = false;
        $testBoard->save();
    }


  
    }
  
  
    public function register(Request $request)
    {
  
        $validator = Validator::make($request->all(), [
  
            'name' => 'required',
  
            'email' => 'required|email',
  
            'password' => 'required',
  
            'c_password' => 'required|same:password',
  
        ]);
  
  
  
        if ($validator->fails()) {
  
            return response()->json(['error'=>$validator->errors()], 401);            
  
        }
  
  
  
        $input = $request->all();
  
        $input['password'] = bcrypt($input['password']);
  
        $user = User::create($input);
  
        $success['token'] =  $user->createToken('MyApp')->accessToken;
  
        $success['name'] =  $user->name;
  
  
  
        return response()->json(['success'=>$success]);
  
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($board)
    {
        // dnd($board);
        $url = str_replace(' ', '_', $board);
        return Boards::where('url',$url)->get();
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
