<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredients;
use App\Models\Recipe;
use App\Models\RecipeIngredients;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredients::orderBy('ingredient')->get();
        $recipes = Recipe::orderBy('created_at', 'DESC')->paginate(3);
        return view("recipe.index", compact("ingredients", "recipes"));
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_recipe(Request $request)
    {
        Recipe::create([
            'recipe_name' => $request->recipe_name
        ]);

        foreach($request->recipe_ingredients as $ingredient){
            RecipeIngredients::create([
                'recipe_id' => $request->recipe_name,
                'ingredient_name' => $ingredient,
                'checked' => '0'
            ]);
        }

        return redirect("/Recipe");
    }

    public function delete_recipe(Request $request, $recipe_id, $recipe_name)
    {
        $recipe = Recipe::where('id', $recipe_id)->delete();
        $recipe = RecipeIngredients::where('recipe_id', $recipe_name)->delete();
    
        return redirect("/Recipe");
    }

    public function cook_recipe()
    {
        $recipe_id = $_GET['id'];
        $recipe_ingredients = $_GET['recipe_ingredients'];
        $cook_recipee = Recipe::where('id', 'LIKE', $recipe_id)->first();
        $recipe_ingredientss = RecipeIngredients::where('recipe_id', 'LIKE', $recipe_ingredients)->get();
        return response()->json([
            'id' => $cook_recipee,
            'recipe_ingredients' => $recipe_ingredientss,
        ]);
        
    }

    public function check_ingredient()
    {
        $ingredient_id = $_GET['ingredient_idss'];
        
        $ingredient_ids = RecipeIngredients::where('id', 'LIKE', $ingredient_id)->first();

        $uId = $ingredient_ids->id;
        $checked = $ingredient_ids->checked;

        $uChecked = $checked ? 0 : 1;

        $res = RecipeIngredients::where("id", $uId)->update(["checked" => $uChecked]);

        return response()->json([
            'res' => $uChecked,
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
