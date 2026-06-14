<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::latest()->get();
        return view('recipes.index', compact('recipes'));
    }

    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipes.show', compact('recipe'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:124',
            'description' => 'nullable|max:500',
            'ingredients' => 'required',
            'steps' => 'required',
        ]);

        $recipe = Recipe::findOrFail($id);
        $recipe->update($validatedData);

        return redirect('/recipes/' . $recipe->id)
            ->with('success', 'Recipe updated successfully!');
    }

    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect('/recipes')
            ->with('success', 'Recipe deleted successfully!');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:124',
            'description' => 'nullable|max:500',
            'ingredients' => 'required',
            'steps' => 'required',
        ]);

        Recipe::create($validatedData);

        return redirect('/recipes')
            ->with('success', 'Recipe created successfully!');
    }
}
