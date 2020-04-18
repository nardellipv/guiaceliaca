<?php

namespace guiaceliaca\Http\Controllers\Admin;

use guiaceliaca\Commerce;
use guiaceliaca\NewsLetter;
use guiaceliaca\User;
use Illuminate\Http\Request;
use guiaceliaca\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function userRegister()
    {
        $users = User::orderBy('created_at', 'DESC')
            ->get();

        $userCount = User::count();

        Mail::send('emails.job._registerUser', ['users' => $users, 'userCount' => $userCount], function ($msj) {

            $msj->from('no-responder@guiaceliaca.com.ar', 'GuiaCeliaca');

            $msj->subject('Usuario registrados');

            $msj->to('nardellipv@gmail.com', 'Pablo');

        });
    }

    public function userRegisterNewsLetter()
    {
        $newsLetters = NewsLetter::all();

        $newsLettersCount = NewsLetter::count();

        Mail::send('emails.job._registerNewsLetter', ['newsLetters' => $newsLetters, 'newsLettersCount' => $newsLettersCount], function ($msj) {

            $msj->from('no-responder@guiaceliaca.com.ar', 'GuiaCeliaca');

            $msj->subject('Usuario registrados');

            $msj->to('nardellipv@gmail.com', 'Pablo');

        });
    }

    public function commercesIncrement()
    {
        $commerces = Commerce::get();

        foreach ($commerces as $commerce) {
            $visitRand = $commerce->visit + rand('20', '50');
            $votePositve = $commerce->votes_positive + rand('6', '15');
            $voteNegative = $commerce->votes_negative + rand('1', '5');
            $commerce->visit = $visitRand;
            $commerce->votes_positive = $votePositve;
            $commerce->votes_negative = $voteNegative;
            $commerce->save();
        }
    }
}
