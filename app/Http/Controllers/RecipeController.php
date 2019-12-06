<?php

namespace guiaceliaca\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use guiaceliaca\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function listRecipes()
    {
        $recipes = Recipe::with(['category'])
            ->orderBy('created_at', 'DESC')
            ->paginate(9);

        return view('web.parts.recipe._listRecipes', compact('recipes'));
    }

    public function recipes($slug)
    {
        $recipe = Recipe::where('slug', $slug)
            ->first();

        return view('web.parts.recipe._recipe', compact('recipe'));
    }

    public function recipeLike($id)
    {
        Recipe::where('id', $id)
            ->increment('likes',1);

        Toastr::info('Muchas gracias por tu voto', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return back();
    }
}
