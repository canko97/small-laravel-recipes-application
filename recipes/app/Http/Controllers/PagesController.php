<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use Illuminate\Foundation\Auth\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Response;
use Barryvdh\DomPDF\Facade as PDF;
use function GuzzleHttp\Promise\all;

class PagesController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    public function  italian()
    {
        $recipes = Recipe::get();
        return view('italian', compact('recipes'));
    }

    public function food($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('food', compact('recipe'));
    }

    public function foodpdf($id)

    {
        $recipe = Recipe::findOrFail($id);
        $pdf = PDF::loadView('foodpdf', compact('recipe'));
        $filename = date('dmyHis',time()).'.pdf';
        return $pdf->download($filename);
    }

    public function newRecipe()
    {
        return view('new_recipe');
    }

    public function createUser()
    {
        return view('create_user');
    }

    // public function saveUser(Request $request)
    // {
    //     $request->validate([

    //         'name'=>'required',
    //         'password' => 'required',
    //         'repeat_password' => 'required',
    //         'email'=>'required'

    //     ]);

    //     $user = new User;
    //     $user->name = $request->name;
    //     $user->password = $request->password;
    //     $user->email = $request->email;
    //     $user->save();

    //     return redirect()->back()->with('success','User has been added successfully.');
    // }

    // public function saveRecipe(Request $r)
    // {


    //     $data = $r->validate([
    //             'recipe_name'=>'required',
    //             'description'=>'required',
    //             'cuisine'=>'required',
    //             'type'=>'required',
    //             'image'=>''
    //         ]);
    //    // Recipe::create($data);
    //     $recipe = new Recipe();
    //     $recipe->recipe_name = $r->recipe_name;
    //     $recipe->content = $r->description;
    //     $recipe->country = $r->cuisine;
    //     $recipe->type = $r->type;
    //     $recipe->author = Auth::id();

    //     if($r->hasFile('food'))
    //     {
    //        $food = $r->file('food');
    //        $filename = time().'.'.$food->getClientOriginalExtension();
    //        Image::make($food)->insert('Admisceo.jpg', 'bottom-left', 10, 10 )->save(public_path('/uploads/food/'. $filename));
    //        $recipe->image = $filename;
    //     }
    //     $recipe->save();
    //     return redirect('/profile')->with('success','Recipe added');
    // }

    public function profile()
    {
        $recipes = Recipe::get();
        return view('profile', compact('recipes'));
    }

    public function editRecipe($id)
    {

        $recipe = Recipe::findOrFail($id);


        return view ('edit_recipe', compact('recipe'));
    }

//    public function updateRecipe(Request $request,$id)
//    {
//
//        $request->validate([
//
//            'name'=>'required',
//            'content' => 'required',
//            'country' => 'required',
//            'type'=>'required'
//
//        ]);
//
//        $recipe = Recipe::findOrFail($id);
//        $this->authorize('update', $recipe);
//        $recipe->recipe_name = $request->name;
//        $recipe->content = $request->content;
//        $recipe->country = $request->country;
//        $recipe->type = $request->type;
//        $recipe->save();
//
//        return redirect('/profile')->with('success','Recipe has been updated successfully.');
//    }

    public function deleteRecipe($id)
    {
        $recipe = Recipe::findOrFail($id);
        $this->authorize('delete', $recipe);
        $recipe->delete();

        return redirect('/profile');
    }

    public function updateAvatar(Request $request)
    {
        //Handle the user upload of avatar
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save(public_path('/uploads/profile/' . $filename));
            $user = Auth::user();
            $user->image = $filename;
            $user->save();
        }
        $recipes = Recipe::get();

        return view('profile', compact('recipes'));
    }

//    public function validate()
//    {
//        return [
//            'name'=>'required',
//            'content' => 'required',
//            'country' => 'required',
//            'type'=>'required',
//            'image'=>'required|image'
//        ];
//    }
}
