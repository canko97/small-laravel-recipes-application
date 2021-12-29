<?php

namespace App\Http\Controllers;
use App\Http\Resources\RecipeResource;
use App\Http\Resources\RecipeResourceCollection;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Recipe;

class RecipeApiController extends Controller
{
    /**
     * @param Recipe $recipe
     * @return RecipeResource
     */
    public function show (Recipe $recipe): RecipeResource
    {
        return new RecipeResource($recipe);
    }

    /**
     * @return RecipeResourceCollection
     */
    public function index(): RecipeResourceCollection
    {
        return new RecipeResourceCollection(Recipe::paginate());
    }


    /**
     * @param Request $request
     * @return RecipeResource
     */
    public function store(Request $request)
    {
        //create recipe
        $request->validate([
            'recipe_name'=>'required',
            'content'=>'required',
            'country'=>'required',
            'type'=>'required'
        ]);

        $recipe = Recipe::create($request->all());
        if($recipe->save()){
            return response()->json($recipe,201);
        }
//        return new RecipeResource($recipe);
    }

    /**
     * @param Recipe $recipe
     * @param Request $request
     * @return RecipeResource
     */
    public function update(Recipe $recipe, Request $request): RecipeResource
    {
        $request->validate([
            'recipe_name'=>'required',
            'content'=>'required',
            'country'=>'required',
            'type'=>'required'
        ]);

        $recipe->update($request->all());
        return new RecipeResource($recipe);
    }

    /**
     * @param Recipe $recipe
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return response()->json();
    }
}
