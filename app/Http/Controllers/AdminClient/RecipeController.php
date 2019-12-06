<?php

namespace guiaceliaca\Http\Controllers\AdminClient;

use Brian2694\Toastr\Facades\Toastr;
use guiaceliaca\Category;
use guiaceliaca\Commerce;
use guiaceliaca\Http\Requests\RecipesClientCreateRequest;
use guiaceliaca\Recipe;
use guiaceliaca\Http\Controllers\Controller;
use guiaceliaca\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;

class RecipeController extends Controller
{
    public function addRecipes()
    {
        $categories = Category::all();

        return view('web.parts.adminClient.recipe._addRecipe', compact('categories', 'commerce'));
    }

    public function createRecipes(RecipesClientCreateRequest $request)
    {
        $slug = Recipe::where('slug', Str::slug($request['name']))
            ->first();

        if($slug){
            $slug = $request['name'] . RAND('1','1000');
        }else{
            $slug = Str::slug($request['name']);
        }

        $user = User::where('id', Auth::user()->id)
            ->first();

        $recipe = Recipe::create([
            'name' => $request['name'],
            'category_id' => $request['category_id'],
            'ingredients' => $request['ingredients'],
            'steps' => $request['steps'],
            'slug' => $slug,
            'user_id' => $user->id,
            'category_id' => $request['category_id']
        ]);

        $path = 'users/images/' . $user->id;
        $pathSub = 'users/images/' . $user->id . '/receta';

        if (!is_dir($path)) {
            mkdir('users/images/' . $user->id);
        }
        if (!is_dir($pathSub)) {
            mkdir('users/images/' . $user->id . '/receta');
        }

        if ($request->photo) {
            $image = $request->file('photo');
            $input['photo718'] = '718x415-' . $user->id . '-' . $image->getClientOriginalName();
            $input['photo260'] = '260x180-' . $user->id . '-' . $image->getClientOriginalName();

            $img = Image::make($image->getRealPath());
            $img->fit(718, 415)->save($path . '/receta/' . $input['photo718']);
            $img->fit(260, 180)->save($path . '/receta/' . $input['photo260']);

            $recipe->photos = Str::after($input['photo718'], '-');
        }
        $recipe->save();

        Toastr::success('Receta creada correctamente', '', ["positionClass" => "toast-top-right", "progressBar" => "true"]);
        return back();
    }
}
