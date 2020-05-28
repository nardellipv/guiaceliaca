<?php

namespace guiaceliaca\Http\Controllers;

use guiaceliaca\Commerce;
use guiaceliaca\Province;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function filterProvince($slug)
    {
        $province = Province::where('slug', $slug)
            ->first();

        $searching = Commerce::with(['user','province'])
            ->where('province_id', $province->id)
            ->get();

        $provinces = Province::all();

        return view('web.parts.searching._searchCommerce', compact('searching','provinces'));
    }

    public function filterCommerce(Request $request)
    {
        $provinces = Province::all();

        if ($request->keywords) {
            $searching = Commerce::with(['user','province'])
                ->where('name', 'LIKE', "%$request->keywords%")
                ->get();

            return view('web.parts.searching._searchCommerce', compact('searching', 'provinces'));
        }

        if ($request->provinces) {
            $searching = Commerce::with(['user','province'])
                ->orWhere('province_id', $request->provinces)
                ->get();

            return view('web.parts.searching._searchCommerce', compact('searching','provinces'));
        }

        if($request->has('keywords') && $request->has('provinces')){
            return back();
        }
    }
}
