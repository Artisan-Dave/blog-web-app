<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex(){
        $posts = Post::orderBy('created_at','desc')->limit(5)->get();
        return view('pages.welcome',compact('posts'));
    }

    public function getAbout(){
        $first = "Dave";
        $last = "Almadin";

        $fullname = $first . " " . $last;
        $email = "davealmadin3196@gmail.com";
        $data = [];
        $data['email'] = $email;
        $data['fullname'] = $fullname;        
        return view('pages.about')->with('data', $data);
    }

    public function getContact(){
        return view('pages.contact');
    }

}
