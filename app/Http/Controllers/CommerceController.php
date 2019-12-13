<?php

namespace guiaceliaca\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use guiaceliaca\CharacteristicCommerce;
use guiaceliaca\Comment;
use guiaceliaca\Commerce;
use guiaceliaca\PaymentCommerce;
use guiaceliaca\Product;
use Illuminate\Support\Facades\Cookie;

class CommerceController extends Controller
{
    public function index($slug)
    {
        $commerce = Commerce::where('slug', $slug)
            ->first();

        Commerce::where('id', $commerce->id)
            ->increment('visit', 1);

        $visit = Commerce::sum('visit');

        $totalVisit = ($commerce->visit + $visit) / 100;

        $characteristics = CharacteristicCommerce::with(['characteristic'])
            ->where('commerce_id', $commerce->id)
            ->get();

        $payments = PaymentCommerce::with(['payment'])
            ->where('commerce_id', $commerce->id)
            ->get();

        $products = Product::where('commerce_id', $commerce->id)
            ->where('AVAILABLE', 'YES')
            ->inRandomOrder()
            ->take(6)
            ->get();

        $comments = Comment::where('commerce_id', $commerce->id)
            ->where('status', 'ACTIVE')
            ->orderBy('created_at', 'DESC')
            ->paginate(5);

        Return view('web.parts.commerce._dataCommerce', compact('commerce', 'totalVisit',
            'characteristics', 'payments', 'products', 'comments'));
    }

    public function positive($slug)
    {
        $commerce = Commerce::where('slug', $slug)
            ->first();

        if (Cookie::get('voto' . $commerce->slug) == $slug) {
            Toastr::info('Ya votaste anteriormente a este comercio', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
            return back();
        }

        $commerce->increment('votes_positive');
        $commerce->save();

        Cookie::queue('voto' . $commerce->slug, $commerce->slug, '2628000');

        Toastr::success('Muchas gracias por tu voto', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return back();
    }


    public function negative($slug)
    {

        $commerce = Commerce::where('slug', $slug)
            ->first();

        if (Cookie::get('voto' . $commerce->slug) == $slug) {
            Toastr::info('Ya votaste anteriormente a este comercio', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
            return back();
        }

        $commerce->increment('votes_negative');
        $commerce->save();

        Cookie::queue('voto', $commerce->slug);

        Toastr::success('Muchas gracias por tu voto', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return back();
    }

    public function listProduct($slug)
    {
        $commerce = Commerce::with(['user'])
            ->where('slug', $slug)
            ->first();

        $products = Product::with(['commerce','category'])
            ->where('commerce_id', $commerce->id)
            ->get();

        return view('web.parts.commerce._productList', compact('products', 'commerce'));
    }
}
