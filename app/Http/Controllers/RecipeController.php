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
        // check if user is a contributor or admin
        if (!auth()->user()->isContributor() && !auth()->user()->isAdmin()) {
            return redirect('/recipes')
                ->with('error', 'You are not authorized to create a recipe.');
        }
        return view('recipes.create');
    }

    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        // Check if the authenticated user is the owner of the recipe and check if the user is an admin
        if ($recipe->user_id !== auth()->id()
            && auth()->user()->role !== 'admin') {
            return redirect('/recipes')
                ->with('error', 'You are not authorized to update this recipe.');
        }

        $validatedData = $request->validate([
            'title' => 'required|max:124',
            'description' => 'nullable|max:500',
            'ingredients' => 'required',
            'steps' => 'required',
        ]);

        $recipe->update($validatedData);

        return redirect('/recipes/' . $recipe->id)
            ->with('success', 'Recipe updated successfully!');
    }

    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);

        // Check if the authenticated user is the owner of the recipe and check if the user is an admin
        if ($recipe->user_id !== auth()->id()
            && auth()->user()->role !== 'admin') {
            return redirect('/recipes')
                ->with('error', 'You are not authorized to delete this recipe.');
        }

        $recipe->delete();

        return redirect('/recipes')
            ->with('success', 'Recipe deleted successfully!');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->isContributor() && !auth()->user()->isAdmin()) {
            return redirect('/recipes')
                ->with('error', 'You are not authorized to create a recipe.');
        }
        
        $validatedData = $request->validate([
            'title' => 'required|max:124',
            'description' => 'nullable|max:500',
            'ingredients' => 'required',
            'steps' => 'required',
        ]);

        Recipe::create([
            'user_id' => auth()->id(),
            ...$validatedData
        ]);

        return redirect('/recipes')
            ->with('success', 'Recipe created successfully!');
    }
}
