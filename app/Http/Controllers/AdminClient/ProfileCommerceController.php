<?php

namespace guiaceliaca\Http\Controllers\AdminClient;

use Brian2694\Toastr\Facades\Toastr;
use guiaceliaca\Blog;
use guiaceliaca\CharacteristicCommerce;
use guiaceliaca\Characteristics;
use guiaceliaca\Commerce;
use guiaceliaca\Http\Requests\CreateProfileCommerceRequest;
use guiaceliaca\Http\Requests\ProfileUserRequest;
use guiaceliaca\Message;
use guiaceliaca\Payment;
use guiaceliaca\PaymentCommerce;
use guiaceliaca\Picture;
use guiaceliaca\Province;
use guiaceliaca\User;
use Illuminate\Http\Request;
use guiaceliaca\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Image;

class ProfileCommerceController extends Controller
{
    public function profileCommerce()
    {
        if (Auth::user()->type == 'OWNER') {
            $commerceId = Commerce::where('user_id', Auth::user()->id)
                ->first();

            $lastMessages = Message::where('commerce_id', $commerceId->id)
                ->get();
        }

        $lastBlog = Blog::orderBy('created_at', 'DESC')
            ->take(2)
            ->get();

        $commercesPro = Commerce::with(['user', 'province'])
            ->where('type', 'PREMIUM')
            ->get();

        Cookie::queue('login', 'ingreso', '2628000');

        return view('web.parts.adminClient.profile._accountCommerce', compact('lastMessages', 'lastBlog', 'commercesPro'));
    }

    public function profileEdit($id)
    {
        $user = User::find($id);

        if ($user->type == 'OWNER') {

            $commerce = Commerce::where('user_id', $id)
                ->first();

            $provinces = Province::all();
        }

        return view('web.parts.adminClient.profile._editProfile', compact('user', 'provinces', 'commerce',
            'characteristics', 'payments'));
    }

    public function profileUpdate(ProfileUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request['name'];
        $user->lastname = $request['lastname'];

//        creamos carpeta
        $path = 'users/images/' . $user->id;
        $pathSub = 'users/images/' . $user->id . '/perfil';

        if (!is_dir($path)) {
            mkdir('users/images/' . $user->id);
        }
        if (!is_dir($pathSub)) {
            mkdir('users/images/' . $user->id . '/perfil');
        }

        if ($request->photo) {
            $image = $request->file('photo');
            $input['photo512'] = '512x512-' . $user->id . '-' . $image->getClientOriginalName();
            $input['photo100'] = '100x100-' . $user->id . '-' . $image->getClientOriginalName();

            $img = Image::make($image->getRealPath());
            $img->fit(512, 512)->save($path . '/perfil/' . $input['photo512']);
            $img->fit(100, 100)->save($path . '/perfil/' . $input['photo100']);

            foreach ($input as $key => $value) {
                Picture::create([
                    'name' => $value,
                    'user_id' => $user->id
                ]);
            }
            $user->picture = Str::after($input['photo512'], '-');
        }


        $user->save();

        Toastr::success('Se modificó correctamente su perfil', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return back();
    }

    public function profilePassUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $user->password = Hash::make($request['password']);
        $user->save();

        Toastr::success('Se reseteó correctamente su Contraseña', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return back();
    }

    public function createAccountCommerce()
    {
        $provinces = Province::all();
        $characteristics = Characteristics::all();
        $payments = Payment::all();

        Toastr::info('Por favor complete todos los datos para crear la cuenta', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return view('web.parts.adminClient.profile._createCommerce', compact('provinces', 'characteristics', 'payments'));
    }

    public function storeAccountCommerce(CreateProfileCommerceRequest $request)
    {
        $user = User::where('id', Auth::user()->id)
            ->first();

        $commerce = Commerce::create([
            'name' => $request['name'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'about' => $request['about'],
            'web' => $request['web'],
            'facebook' => $request['facebook'],
            'twitter' => $request['twitter'],
            'instagram' => $request['instagram'],
//            'type' => $request['type'],
            'slug' => Str::slug($request['name']),
            'user_id' => Auth::user()->id,
            'province_id' => $request['province_id'],
        ]);

        $characteristicId = $request->characteristic_id;
        $paymentId = $request->payment_id;

        if ($characteristicId) {
            foreach ($characteristicId as $characteristic) {
                CharacteristicCommerce::create([
                    'commerce_id' => $commerce->id,
                    'characteristic_id' => $characteristic
                ]);
            }
        }

        if ($paymentId) {
            foreach ($paymentId as $payment) {
                PaymentCommerce::create([
                    'commerce_id' => $commerce->id,
                    'payment_id' => $payment
                ]);
            }
        }

        $user->type = 'OWNER';
        $user->save();

        //        creamos carpeta
        $path = 'users/images/' . $user->id;
        $pathSub = 'users/images/' . $user->id . '/comercio';

        if (!is_dir($path)) {
            mkdir('users/images/' . $user->id);
        }
        if (!is_dir($pathSub)) {
            mkdir('users/images/' . $user->id . '/comercio');
        }

        if ($request->photo) {
            $image = $request->file('photo');
            $input['photo358'] = '358x250-' . $user->id . '-' . $image->getClientOriginalName();
            $input['photo260'] = '260x260-' . $user->id . '-' . $image->getClientOriginalName();
            $input['photo260_1'] = '260x160-' . $user->id . '-' . $image->getClientOriginalName();
            $input['photo284'] = '284x386-' . $user->id . '-' . $image->getClientOriginalName();
            $input['photo165'] = '165x165-' . $user->id . '-' . $image->getClientOriginalName();

            $img = Image::make($image->getRealPath());
            $img->fit(358, 250)->save($path . '/comercio/' . $input['photo358']);
            $img->fit(260, 260)->save($path . '/comercio/' . $input['photo260']);
            $img->fit(260, 160)->save($path . '/comercio/' . $input['photo260_1']);
            $img->fit(284, 386)->save($path . '/comercio/' . $input['photo284']);
            $img->fit(165, 165)->save($path . '/comercio/' . $input['photo165']);

            foreach ($input as $key => $value) {
                Picture::create([
                    'name' => $value,
                    'user_id' => $user->id
                ]);
            }
            $commerce->logo = Str::after($input['photo358'], '-');
        }


        $commerce->save();

        Toastr::success('Perfil de la cuenta creada correctamente', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return redirect()->action('AdminClient\ProfileCommerceController@profileCommerce');
    }

    public function editAccountCommerceCommerce($slug)
    {
        $commerce = Commerce::where('slug', $slug)
            ->first();

        $characteristics = Characteristics::all();
        $payments = Payment::all();

        $characteristicsCommerce = CharacteristicCommerce::with(['characteristic'])
            ->where('commerce_id', $commerce->id)
            ->get();

        $paymentsCommerce = PaymentCommerce::with(['payment'])
            ->where('commerce_id', $commerce->id)
            ->get();

        $provinces = Province::all();

        return view('web.parts.adminClient.profile._editCommerce', compact('commerce', 'provinces', 'characteristics',
            'payments', 'characteristicsCommerce', 'paymentsCommerce'));
    }

    public function updateAccountCommerceCommerce(CreateProfileCommerceRequest $request, $id)
    {

        $commerce = Commerce::find($id);

//        verifico si cambio el tipo de cuenta
        if($commerce->type != $request->type){
            $typeCommerce = 1;
        }else{
            $typeCommerce = 0;
        }

        $commerce->type = $request['type'];
        $commerce->fill($request->all())->save();

        $characteristicId = $request->characteristic_id;
        $paymentId = $request->payment_id;

        if ($paymentId) {
            foreach ($paymentId as $payment) {
                $commerceSave = PaymentCommerce::firstOrNew([
                    'commerce_id' => $commerce->id,
                    'payment_id' => $payment,
                ]);
                $commerceSave->save();
            }
        }

        if ($characteristicId) {
            foreach ($characteristicId as $characteristic) {
                $characteristicsSave = CharacteristicCommerce::firstOrNew([
                    'commerce_id' => $commerce->id,
                    'characteristic_id' => $characteristic,
                ]);
                $characteristicsSave->save();
            }
        }

        //        creamos carpeta
        $path = 'users/images/' . $commerce->user_id;
        $pathSub = 'users/images/' . $commerce->user_id . '/comercio';

        if (!is_dir($path)) {
            mkdir('users/images/' . $commerce->user_id);
        }
        if (!is_dir($pathSub)) {
            mkdir('users/images/' . $commerce->user_id . '/comercio');
        }

        if ($request->photo) {
            $image = $request->file('photo');
            $input['photo358'] = '358x250-' . $commerce->user_id . '-' . $image->getClientOriginalName();
            $input['photo260'] = '260x260-' . $commerce->user_id . '-' . $image->getClientOriginalName();
            $input['photo260_1'] = '260x160-' . $commerce->user_id . '-' . $image->getClientOriginalName();
            $input['photo284'] = '284x386-' . $commerce->user_id . '-' . $image->getClientOriginalName();
            $input['photo165'] = '165x165-' . $commerce->user_id . '-' . $image->getClientOriginalName();

            $img = Image::make($image->getRealPath());
            $img->fit(358, 250)->save($path . '/comercio/' . $input['photo358']);
            $img->fit(260, 260)->save($path . '/comercio/' . $input['photo260']);
            $img->fit(260, 160)->save($path . '/comercio/' . $input['photo260_1']);
            $img->fit(284, 386)->save($path . '/comercio/' . $input['photo284']);
            $img->fit(165, 165)->save($path . '/comercio/' . $input['photo165']);

            foreach ($input as $key => $value) {
                Picture::create([
                    'name' => $value,
                    'user_id' => $commerce->user_id
                ]);
            }
            $commerce->logo = Str::after($input['photo358'], '-');
        }


        $commerce->save();

        if($typeCommerce == 0) {
            Toastr::success('Perfil actualizado correctamente.', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
            return back();
        }else {
            Toastr::success('Perfil actualizado correctamente.', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
            Toastr::info('Nos comunicaremos con usted por el cambio de cuenta.', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);

            Mail::send('emails.MailChangeTypeAccount', ['commerce' => $commerce], function ($msj) use ($commerce) {
                $msj->from('no-respond@guiaceliaca.com.ar', 'GuiaCeliaca');
                $msj->subject('Cambio de cuenta');
                $msj->to('nardellipv@gmail.com');
            });

            return back();
        }
    }

    public function deleteCharacteristic($id)
    {
        $characteristic = CharacteristicCommerce::find($id);

        $characteristic->delete();

        Toastr::success('Caracteristica Eliminada', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return back();
    }

    public function deletePayment($id)
    {
        $payment = PaymentCommerce::find($id);

        $payment->delete();

        Toastr::success('Medio de Pago Eliminado', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return back();
    }
}
