<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecipesController extends Controller
{
    /**
     * Display a listing of the recipes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new recipe.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new_recipe');
    }

    /**
     * Store a newly created recipe in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'recipe_name'=>'required',
            'description'=>'required',
            'cuisine'=>'required',
            'type'=>'required']);

        $recipe = new Recipe();
        $recipe->recipe_name = $request->recipe_name;
        $recipe->content = $request->description;
        $recipe->country = $request->cuisine;
        $recipe->type = $request->type;
        $recipe->author = Auth::id();


        if($request->hasFile('food'))
        {
           $food = $request->file('food');
           $filename = time().'.'.$food->getClientOriginalExtension();
           Image::make($food)->insert('Admisceo.png', 'bottom-left', 10, 10 )->save(public_path('/uploads/food/'. $filename));
           $recipe->image = $filename;
        }
        $recipe->save();

        return redirect('/profile')->with('success','Recipe added');

    }

    /**
     * Display the specified recipe.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::find($id);
        return view('food', ['recipe'=>$recipe]);
    }

    /**
     * Show the form for editing the specified recipe.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::find($id);

        return view ('edit_recipe', compact('recipe'));
    }

    /**
     * Update the specified recipe in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'name'=>'required',
            'content' => 'required',
            'country' => 'required',
            'type'=>'required'

        ]);

        $recipe = Recipe::findOrFail($id);
        $this->authorize('update', $recipe);
        $recipe->recipe_name = $request->name;
        $recipe->content = $request->content;
        $recipe->country = $request->country;
        $recipe->type = $request->type;
        $recipe->save();

        return redirect('/profile')->with('success','Recipe has been updated successfully.');
    }

    /**
     * Remove the specified recipe from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $this->authorize('delete', $recipe);
        $recipe->delete();

        return redirect('/profile');
    }
}
