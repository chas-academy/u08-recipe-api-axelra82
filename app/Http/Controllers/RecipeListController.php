<?php

namespace App\Http\Controllers;

use App\Models\RecipeList;
use Illuminate\Http\Request;

class RecipeListController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->user
            ->recipesList()
            ->get([
                'id',
                'name',
                'recipes',
            ])
            ->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $recipeList = new RecipeList();
        $recipeList->name = $request->name;
        $recipeList->recipes = json_encode([]);

        if ($this->user->recipesList()->save($recipeList)) {
            return response()->json([
                'success' => true,
                'object' => $recipeList,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'List could not be added',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RecipeList  $recipeList
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipeList = $this->user->recipesList()->find($id);

        if (!$recipeList) {
            return response()->json([
                'success' => false,
                'message' => "Recipes list with id $id can't be found",
            ], 400);
        }

        return $recipeList;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecipeList  $recipeList
     * @return \Illuminate\Http\Response
     */
    public function edit(RecipeList $recipeList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RecipeList  $recipeList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recipeList = $this->user->recipesList()->find($id);

        if (!$recipeList) {
            return response()->json([
                'success' => false,
                'message' => "Recipes list with id $id can't be found",
            ], 400);
        }

        $updated = $recipeList->fill($request->all())
            ->save();

        if ($updated) {
            return response()->json([
                'success' => true,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => "List couldn't be updated",
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecipeList  $recipeList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipeList = $this->user->recipesList()->find($id);

        if (!$recipeList) {
            return response()->json([
                'success' => false,
                'message' => "Recipes list with id $id can't be found",
            ], 400);
        }

        if ($recipeList->delete()) {
            return response()->json([
                'success' => true,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => "List couldn't be deleted",
            ], 500);
        }
    }
}
