<?php

namespace guiaceliaca\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use guiaceliaca\Blog;
use guiaceliaca\Commerce;

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
            ->increment('view',1);

        $commercesPro = Commerce::with(['user', 'province'])
            ->where('type', 'CLASIC')
            ->get();

        return view('web.parts.blog._postBlog', compact('post','commercesPro'));
    }

    public function postLike($id)
    {
        Blog::where('id', $id)
            ->increment('like',1);

        Toastr::info('Muchas gracias por tu voto', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return back();
    }
}
