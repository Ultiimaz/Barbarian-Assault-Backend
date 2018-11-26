<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Page;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index() //shows all pages!
    {
       $pages = Page::all()->toArray();

        return view('Pages.index',['pages' => $pages]);
    }

    public function create(Request $request) //creates a new page!
    {
        $page = new Page();
        if(!$request->validate([
            'title' => 'required|max:255',
            'description' => 'required',

        ]))
        {
            return redirect('addpage',['status' =>"please fill in the forms before submitting!"]); // no frontend handling yet!
        }
        $page->fill($request->toArray());
        $page->owner = Auth::user()->id;
        $page->url = str_replace(" ","_",$request->input('title'));
        $page->CreatedAt = Carbon::now();
        $page->isRemoved = false;


        $page->save();
        // return response()->json($page);
        return Redirect('pages');
    }

  
    public function delete()
    {
        
    }
    public function show($PageId) // shows content from a certain page
    {
        $page = Page::where('url','=',$PageId)->get()->first();
        if(!$page)
        {
            $this->index();
        }
        return view('Pages.specific', [
                                        'info' => $page,
                                        'comments' => $page->posts()->get()
                                      ]);
    }
}
