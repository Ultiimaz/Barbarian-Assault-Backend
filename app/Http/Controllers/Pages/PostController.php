<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class PostController extends Controller
{
    public function create(Request $request,$pageId) 
    {
    $page = Page::where('url','=',$pageId)->get();
    $page->first()->posts()->createMany([
        [
        "title" => $request->input('title'),
        "url" => $pageId,
        "description" => $request->input('description'),
        "sender" => Auth::user()->id,
        "isRemoved" => false,
        "created_at" => Carbon::now(),
        ]
    ]);
    return back();
    }
    public function update(Request $request) 
    {
        
    }
    public function delete(Request $request) 
    {
        
    }
    public function show()
    {
        // deprecated for now
    }
}
