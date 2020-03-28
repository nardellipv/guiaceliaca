<?php

namespace guiaceliaca\Http\Controllers;

use guiaceliaca\Blog;
use guiaceliaca\Commerce;
use guiaceliaca\Message;
use guiaceliaca\NewsLetter;
use guiaceliaca\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class JobSiteController extends Controller
{
    public function sendNewsLetters()
    {
        $emails = NewsLetter::all();
        $sendPost = Blog::where('send', 0)
            ->orderBy('created_at', 'ASC')
            ->take(3)
            ->get();

        //selecciono los que se envian y los pongo como enviados
        foreach ($sendPost as $post){
            $post->send = '1';
            $post->save();
        }

        if (count($sendPost) > 0) {
            foreach ($emails as $email) {
                Mail::send('emails.mailNews', ['email' => $email, 'sendPost' => $sendPost], function ($msj) use ($email, $sendPost) {
                    $msj->from('no-respond@guiaceliaca.com.ar', 'GuiaCeliaca');
                    $msj->subject('Novedades del mes');
                    $msj->to($email->email, 'Guía Celíaca');
                });
            }

        } else {
            $data = array([
                'name' => 'Pablo Nardelli',
                'email' => 'nardellipv@gmail.com'
            ]);

            Mail::send('emails.job.withoutPost', ['data' => $data], function ($msj) use ($data) {
                $msj->from('no-respond@guiaceliaca.com.ar', 'GuiaCeliaca');
                $msj->subject('Novedades del mes');
                $msj->to('nardellipv@gmail.com', 'Guía Celíaca');
            });
        }
    }

    public function usersCopyNewsLetter()
    {
        $users = User::get();

        foreach ($users as $user) {
            NewsLetter::firstOrCreate([
                'email' => $user->email
            ]);
        }
    }

    public function resumeClient()
    {
        $commerces = Commerce::with(['user'])
            ->get();

        foreach ($commerces as $commerce) {
            Mail::send('emails.resumeClient', ['commerce' => $commerce], function ($msj) use ($commerce) {
                $msj->from('no-respond@guiaceliaca.com.ar', 'GuiaCeliaca');
                $msj->subject('Resumen Mensual');
                $msj->to($commerce->user->email, $commerce->user->name);
            });
        }
    }

    public function topVisitCommerces()
    {
        $commerce = Commerce::orderBy('visit', 'DESC')
            ->first();

        Mail::send('emails.MailTopVisitCommerces', ['commerce' => $commerce], function ($msj) use ($commerce) {
            $msj->from('no-respond@guiaceliaca.com.ar', 'GuiaCeliaca');
            $msj->subject('Top Comercios');
            $msj->to($commerce->user->email, $commerce->user->name);
        });
    }

    public function topVotesCommerces()
    {
        $commerce = Commerce::orderBy('votes_positive', 'DESC')
            ->first();

        Mail::send('emails.MailTopVotesCommerces', ['commerce' => $commerce], function ($msj) use ($commerce) {
            $msj->from('no-respond@guiaceliaca.com.ar', 'GuiaCeliaca');
            $msj->subject('Top Comercios');
            $msj->to($commerce->user->email, $commerce->user->name);
        });
    }

    public function messageNoRead()
    {
        $messages = Message::where('read', 'NO')
            ->get();

        foreach ($messages as $message) {
            $commerce = Commerce::with(['user'])
                ->where('id', $message->commerce_id)
                ->first();


            Mail::send('emails.MessageNoRead', ['commerce' => $commerce], function ($msj) use ($commerce) {
                $msj->from('no-respond@guiaceliaca.com.ar', 'GuiaCeliaca');
                $msj->subject('Mensajes sin leer');
                $msj->to($commerce->user->email, $commerce->user->name);
            });
        }
    }


    public function recommnedMail(Request $request)
    {
        $email = $request->email;

        Mail::send('emails.Recommend', ['email' => $email], function ($msj) use ($email) {
            $msj->from('no-respond@guiaceliaca.com.ar', 'GuiaCeliaca');
            $msj->subject('Te recomendaron');
            $msj->to($email);
        });

        Toastr::info('Muchas Gracias, le estamos enviando la invitación al local', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return redirect('/');
    }
}
