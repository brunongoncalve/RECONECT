<?php

namespace App\Http\Controllers\Integra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Integra\Post;
use App\Models\Integra\Tag;
use App\Models\Integra\Like;
use App\Models\Integra\Comment;
use Carbon\Carbon;

class IntegraController extends Controller
{
    public function index()
    {
        $data = Post::whereYear('created_at', date('Y'))->where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('Integra.integra')
               ->with('data', $data);
    }

    public function dataPost()
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
                    $post->message = $photoName;
                }

                $post->rep002s_id = $request->tag_id;
                $post->status = 1;
                $post->save();
            }
        });

        Session::flash('mensagem', 'POSTAGEM REALIZADA COM SUCESSO');
        return redirect()->route('integra');
    }

    public function likePost(Request $request)
    {
        DB::transaction(function() use ($request) {
            $likess = Like::where('rep001s_id', $request->param1)->where('users_id', auth()->user()->id)->get();
            $count = $likess->count();
                if($request->param1 == TRUE) {
                    if($count == 0) {
                        $like = new Like;
                        $like->users_id      = auth()->user()->id;
                        $like->rep001s_id    = $request->param1;
                        $like->save();
                    } elseif($count == 1) {
                        DB::table('rep003s')
                            ->where('rep001s_id', $request->param1)
                            ->where('users_id', auth()->user()->id)
                            ->delete();
                    }
                }
        });
    
        $likes = Like::where('rep001s_id', $request->param1)->get();
        $count = $likes->count();
        return response()->json($count);
    }

    public function deletePost(Request $request)
    {
        DB::transaction(function() use ($request) {
            if($request->param1 == TRUE) {
                DB::table('rep001s')
                    ->where('id', $request->param1)
                    ->delete();
            }   
        });

        Session::flash('mensagem', 'POSTAGEM DELETADA COM SUCESSO');
        return redirect()->route('integra'); 
    }

    public function comment($id_post)
    {
        $comments = Comment::where('ID_POST', $id_post)->orderBy('DT_COMENTARIO')->get();
        return view('Integra.comment')
               ->with('comments', $comments)
               ->with('id_post', $id_post);
    }

    
    public function saveComment(Request $request)
    {
      DB::transaction(function() use ($request) {
        if($request->param1 == TRUE) {
          $comment = new Comment;
          $comment->rep001s_id       = $request->param1;
          $comment->users_id         = auth()->user()->id;
          $comment->comment          = $request->param2;
          $comment->create_at        = date('Y-m-d H:i:s');
          $comment->save();
        }
      });

      $id_post = $request->param1;
      $comments = Comment::whereDate('create_at', date('Y-m-d'))
                                 ->where('rep001s_id', $id_post)
                                 ->where('users_id', auth()->user()->id)
                                 ->get();
		  return view('Intranet.integra.comentario')
             ->with('comments', $comments)
             ->with('id_post', $id_post);
    }
}

