<?php

namespace guiaceliaca\Http\Controllers;

use guiaceliaca\Blog;
use guiaceliaca\CharacteristicCommerces;
use guiaceliaca\Characteristics;
use guiaceliaca\Commerce;
use guiaceliaca\Payment;
use guiaceliaca\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class HomeController extends Controller
{
    public function index()
    {
        $commercesLastRegister = Commerce::with(['user', 'province'])
            ->where('created_at', '>=', Date::parse('-30 days'))
            ->orderBy('created_at', 'DESC')
            ->paginate(6);


        $commercesListed = Commerce::with(['user', 'province'])
            ->where('created_at', '<=', Date::parse('31 days'))
            ->inRandomOrder()
            ->paginate(9);

        $commercesPro = Commerce::with(['user', 'province'])
            ->where('type', 'PREMIUM')
            ->get();

        $lastNews = Blog::orderBy('created_at', 'DESC')
            ->where('status', 'ACTIVE')
            ->take(3)
            ->get();

        $ratingVote = Commerce::orderBy('votes_positive', 'desc')
            ->whereRaw('votes_positive -  votes_negative')
            ->first();

        $ratingVisit = Commerce::orderBy('visit', 'DESC')
            ->first();

        $provinces = Province::all();

        $characteristics = Characteristics::all();

        $payments = Payment::all();

        return view('web.index', compact('commercesLastRegister', 'lastNews', 'provinces',
            'characteristics', 'payments', 'ratingVisit', 'ratingVote', 'device', 'commercesPro', 'commercesListed'));
    }

}
