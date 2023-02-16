<?php

namespace App\Http\Controllers\Integra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Integra\Post;
use App\Models\Integra\Tag;
use App\Models\Integra\Like;
use Carbon\Carbon;

class IntegraController extends Controller
{
    public function index()
    {
        $data = Post::whereYear('created_at', date('Y'))->where('status', 1)->orderBy('created_at', 'desc')->get();
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

                $post->rep002s_id = $request->tag_id;
                $post->status = 1;
                $post->save();
            }
        });

        Session::flash('mensagem', 'CADASTRO REALIZADO COM SUCESSO');
        return redirect()->route('integra');
    }

    public function likePost(Request $request)
    {
        DB::transaction(function() use ($request) {
            $likes = Like::where('id', $request->btn_like)->where('id', auth()->user()->id)->get();
            $count = $likes->count();
            dd($count);
            if($request->btn_like == TRUE) {
                if($count == 0) {
                    $like = new Like;

                    $like->rep001s_id = $request->btn_like;
                    $like->users_id = auth()->user()->id;
                    $count++; 
                    $like->save();
                }
            }
        });
    }
}
