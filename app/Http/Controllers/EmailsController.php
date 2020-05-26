<?php

namespace guiaceliaca\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use guiaceliaca\Commerce;
use guiaceliaca\Http\Requests\EmailContactSiteRequest;
use guiaceliaca\Http\Requests\MessageClientToCommerceRequest;
use guiaceliaca\Http\Requests\RespondCommerceToClientMessage;
use guiaceliaca\Mail\MailClientContact;
use guiaceliaca\Mail\MailContactPopUp;
use guiaceliaca\Mail\MessageClientToCommerce;
use guiaceliaca\Mail\RespondCommerceToClient;
use guiaceliaca\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailsController extends Controller
{
    public function MessageClientToCommerce(MessageClientToCommerceRequest $request, $id)
    {
        Message::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'messageText' => $request['messageText'],
            'read' => 'NO',
            'commerce_id' => $id
        ]);

        $commerce = Commerce::find($id);

        Mail::to($commerce->user->email)->send(new MessageClientToCommerce($commerce));

        Toastr::success('Se envio correctamente tu mensaje, muchas gracias', 'Mensaje Enviado!', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return back();
    }

    public function MailContactToSite(EmailContactSiteRequest $request)
    {
        Mail::to('info@guiaceliaca.com.ar')->send(new MailClientContact($request));

        Toastr::success('Se envio correctamente tu mensaje, muchas gracias, en breve te contestaremos.', 'Mensaje Enviado!', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return back();
    }

    public function MailContactPopUp(Request $request)
    {
        Mail::to('info@guiaceliaca.com.ar')->send(new MailContactPopUp($request));

        Toastr::success('Se envio correctamente tu mensaje, muchas gracias, en breve te contestaremos.', 'Mensaje Enviado!', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return back();
    }

    public function respondToClient(RespondCommerceToClientMessage $messageCommerce)
    {
        Mail::to($messageCommerce->clientMail)->send(new RespondCommerceToClient($messageCommerce));

        Toastr::success('Se envio correctamente tu mensaje, muchas gracias, en breve te contestaremos.', 'Mensaje Enviado!', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return back();
    }
}
