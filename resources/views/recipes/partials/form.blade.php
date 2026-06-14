@csrf

<input name="title"
        value="{{ old('title', $recipe->title ?? '') }}"
        placeholder="Recipe Title"
        class="w-full border p-2 rounded" @error('title') border-red-500 @enderror>

<textarea name="description"
          placeholder="Recipe Description"
          class="w-full border p-2 rounded" @error('description') border-red-500 @enderror>{{ old('description', $recipe->description ?? '') }}</textarea>

<textarea name="ingredients"
          placeholder="Recipe Ingredients"
          class="w-full border p-2 rounded" @error('ingredients') border-red-500 @enderror>{{ old('ingredients', $recipe->ingredients ?? '') }}</textarea>

<textarea name="steps"
          placeholder="Recipe Steps"
          class="w-full border p-2 rounded" @error('steps') border-red-500 @enderror>{{ old('steps', $recipe->steps ?? '') }}</textarea>

<button class="bg-blue-500 px-4 py-2 rounded">
  Save Recipe
</button>