<?php

namespace guiaceliaca\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use guiaceliaca\Comment;
use guiaceliaca\Commerce;
use guiaceliaca\Http\Requests\CommentToCommerceRequest;

class CommentController extends Controller
{
    public function addComment(CommentToCommerceRequest $request, $slug)
    {
        $commerce = Commerce::where('slug', $slug)
            ->first();

        Comment::create([
           'name' =>  $request['name'],
           'email' =>  $request['email'],
           'message' =>  $request['text-message'],
            'commerce_id' => $commerce->id
        ]);

        Toastr::success('Comentario ingresado correctamente', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return back();
    }
}
