<?php

namespace guiaceliaca\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use guiaceliaca\Commerce;
use guiaceliaca\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function listRecipes()
    {
        $recipes = Recipe::with(['category'])
            ->orderBy('created_at', 'DESC')
            ->paginate(9);

        $commercesPro = Commerce::with(['user', 'province'])
            ->where('type', 'BASIC')
            ->get();

        return view('web.parts.recipe._listRecipes', compact('recipes','commercesPro'));
    }

    public function recipes($slug)
    {
        $recipe = Recipe::where('slug', $slug)
            ->first();

        $commercesPro = Commerce::with(['user', 'province'])
            ->where('type', 'PREMIUM')
            ->get();

        return view('web.parts.recipe._recipe', compact('recipe','commercesPro'));
    }

    public function recipeLike($id)
    {
        Recipe::where('id', $id)
            ->increment('likes',1);

        Toastr::info('Muchas gracias por tu voto', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return back();
    }
}
