<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Recipe::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipe = Recipe::create($request->all());
        return response()->json($recipe);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return response()->json([
            "name" => $recipe->name,
            "author" => $recipe->author,
            "publish_date" => $recipe->publish_date,
            "description" => $recipe->description,
            "ingredients" => $recipe->ingredients,
            "steps" => $recipe->steps,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $recipe->update($request->all());
        return response()->json($recipe);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {

        foreach($recipe->ingredients as $ingrediet){
            $ingrediet->delete();
        }
        foreach($recipe->steps as $step){
            $step->delete();
        }
        $recipe->delete();
        return response()->json("Uspesno obrisan: $recipe");
    }
}
