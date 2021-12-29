@extends('layouts.app')
@section('content')
<div class="container">
    <fieldset>
        <legend>Add new recipe</legend>
                <form method = "post" action="{{route('createrecipe')}}" enctype="multipart/form-data">
                @csrf
                    <div class="col-md-6 form-group">
                        <label for="recipe_name">Recipe name:</label>
                        <input type="text" id="recipe_name" name="recipe_name" required>
                    </div>
                        <label for="description">Description:</label>
                        <textarea name="description" rows="5" cols="20" class="form-control" required></textarea>
                    <div class="col-md-6 form-group">
                        <label for="cuisine">Cuisine: </label>
                        <select id="cuisine" name="cuisine" class="btn btn-light" required>
                            <option value="Italian">Italian</option>
                            <option value="Asian">Asian</option>
                            <option value="Mexican">Mexican</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="type">Type: </label>
                        <select id="type" name="type" class="btn btn-light" required>
                            <option value="Meat">With meat</option>
                            <option value="Vegetarian">Vegetarian</option>
                            <option value="Vegan">Vegan</option>
                        </select>
                    </div>

                    <div>
                        <label for="image">Update recipe image</label>
                            <input type="file" name="food">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>

                    <div>
                        <p> {{$errors->first('recipe_name') }} </p>
                        <p> {{$errors->first('description') }} </p>
                    </div>

                        <button type="submit" class=" btn btn-dark">Add</button>
                </form>
    </fieldset>
</div>

@endsection

