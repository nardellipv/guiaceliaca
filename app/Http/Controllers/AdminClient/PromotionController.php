<?php

namespace guiaceliaca\Http\Controllers\AdminClient;

use Brian2694\Toastr\Facades\Toastr;
use guiaceliaca\Commerce;
use guiaceliaca\Http\Controllers\Controller;
use guiaceliaca\Http\Requests\PromotionCreateRequest;
use guiaceliaca\Picture;
use guiaceliaca\Promotion;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Image;

class PromotionController extends Controller
{
    public function listPromotion()
    {
        $commerce = Commerce::where('user_id', Auth::user()->id)
            ->first();

        $promotions = Promotion::where('commerce_id', $commerce->id)
            ->paginate(10);

        return view('web.parts.adminClient.promotion._listPromotion', compact('promotions'));
    }

    public function createPromotion()
    {
        return view('web.parts.adminClient.promotion._createPromotion');
    }

    public function storePromotion(PromotionCreateRequest $request)
    {
        $commerceId = Commerce::where('user_id', Auth::user()->id)
            ->first();

        $img = Image::make('images/ticket.jpg');

        $img->text($request->name, 200, 45, function ($font) {
            $font->file(public_path('style/font/sixty.TTF'));

            $font->size(35);

            $font->color('#fff000');

            $font->align('center');

            $font->angle(0);

        });

        $img->text($request->text, 190, 75, function ($font) {
            $font->file(public_path('style/font/sixty.TTF'));

            $font->size(20);

            $font->color('#fff000');

            $font->align('center');

            $font->angle(0);

        });

        $img->text($request->percentage . '%', 200, 145, function ($font) {
            $font->file(public_path('style/font/stereofidelic.ttf'));

            $font->size(60);

            $font->color('#fff000');

            $font->align('center');

            $font->angle(0);

        });

        $img->text("Válida " . Carbon::parse($request->end_date)->format('d/m/Y'), 150, 175, function ($font) {
            $font->file(public_path('style/font/yellow.otf'));

            $font->size(20);

            $font->color('#fff000');

            $font->align('center');

            $font->angle(0);

        });

        $path = 'users/images/' . $commerceId->user_id;
        $pathSub = 'users/images/' . $commerceId->user_id . '/voucher';

        if (!is_dir($path)) {
            mkdir('users/images/' . $commerceId->user_id . '/voucher');
        }
        if (!is_dir($pathSub)) {
            mkdir('users/images/' . $commerceId->user_id . '/voucher');
        }

        $picture = $request->percentage . '-' . $request->end_date;
        $img->save(public_path($pathSub . '/' . $picture . '.jpg'));

        $imageID = Picture::create([
            'name' => $picture . '.jpg',
            'user_id' => Auth::user()->id,
        ]);

        Promotion::create([
            'name' => $request['name'],
            'text' => $request['text'],
            'percentage' => $request['percentage'],
            'end_date' => $request['end_date'],
            'picture_id' => $imageID->id,
            'commerce_id' => $commerceId->id,
        ]);

        Toastr::success('Promoción creada correctamente', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return back();
    }

    public function deletePromotion($id)
    {
        $promotion = Promotion::find($id);
        $promotion->delete();

//        elimino archivo
        $path = 'users/images/' . Auth::user()->id . '/voucher/' . $promotion->percentage . '-' . $promotion->end_date . '.jpg';
        file::delete($path);

        Toastr::success('Promoción Eliminada', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return back();
    }
}
