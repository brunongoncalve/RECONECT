<?php

namespace App\Http\Controllers\Integra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Integra\Post;
use App\Models\Integra\Tag;
use Carbon\Carbon;

class IntegraController extends Controller
{
    public function index()
    {
        $data = Post::whereDate('created_at', date('Y-m-d'))->where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('Integra.integra')
               ->with('data', $data);
    }

    public function post()
    {
        $dataTag = Tag::all();
        return view('Integra.post_index')
               ->with('dataTag', $dataTag);
    }

    public function savePost(Request $request)
    {
        DB::transaction(function() use ($request) {
            if($request->btn_save_post == 'btn_save_post') {
                $post = new Post;

                $post->users_id = auth()->user()->id;
                if($request->hasFile('message') && $request->file('message')->isValid()) {
                    $photo = $request->message;
                    $photoName = uniqid() . '.jpeg';
                    $photo->move(public_path('img/post'), $photoName);
                    $post->message     = $photoName;
                }

                $post->status = 1;
                $post->save();
            }
        });

        return "SALVO";
    }
}
