<?php

namespace guiaceliaca\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use guiaceliaca\NewsLetter;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    public function add(Request $request)
    {
        NewsLetter::create([
            'email' => $request['email'],
        ]);

        Toastr::info('Muchas gracias por darte de alta', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return back();
    }
}
