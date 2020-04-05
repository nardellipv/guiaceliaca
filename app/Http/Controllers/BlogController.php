<?php

namespace guiaceliaca\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use guiaceliaca\Blog;
use guiaceliaca\CommentBlog;
use guiaceliaca\Commerce;
use guiaceliaca\Http\Requests\CommentPostRequest;
use guiaceliaca\User;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function listBlog()
    {
        $posts = Blog::where('status', 'ACTIVE')
            ->orderBy('created_at', 'DESC')
            ->paginate(5);

        $commercesPro = Commerce::with(['user', 'province'])
            ->where('type', 'CLASIC')
            ->get();

        return view('web.parts.blog._index', compact('posts', 'commercesPro'));
    }

    public function postBlog($slug)
    {
        $post = Blog::where('slug', $slug)
            ->first();

        Blog::where('id', $post->id)
            ->increment('view', 1);

        $commercesPro = Commerce::with(['user', 'province'])
            ->where('type', 'CLASIC')
            ->get();


        $commentsPost = CommentBlog::with(['user'])
            ->where('post_id', $post->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        $countCommentBlog = CommentBlog::with(['user'])
            ->where('post_id', $post->id)
            ->count();

        return view('web.parts.blog._postBlog', compact('post', 'commercesPro', 'commentsPost', 'countCommentBlog'));
    }

    public function commentPost(CommentPostRequest $request, $id)
    {

        $commentPost = Blog::where('id', $id)
            ->first();

        $userId = User::where('email', $request->email)
            ->first();


        CommentBlog::create([
            'message' => $request['text-message'],
            'user_id' => $userId->id,
            'post_id' => $commentPost->id,
        ]);

        Toastr::info('Muchas gracias por comentar', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return back();
    }

    public function postLike($id)
    {
        Blog::where('id', $id)
            ->increment('like', 1);

        Toastr::info('Muchas gracias por tu voto', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return back();
    }
}
