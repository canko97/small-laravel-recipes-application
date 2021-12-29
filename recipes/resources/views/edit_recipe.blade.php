@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <br />
            <h3>Edit Recipe</h3>
            <br />

            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form method="POST" action="/recipes/{{$recipe->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

                <div class="form_group">
                    <input type="text" name="name" class="form-control" value="{{$recipe->recipe_name}}" placeholder="Name" />
                </div>

                <div class="form_group">
                    <textarea name="content" class="form-control" placeholder="Name">{{$recipe->content}}</textarea>
                </div>

                <div class="form_group">
                <select class="form-control" value="{{$recipe->country}}" name="country" placeholder="Country">
                        <option value="Italian">Italian</option>
                        <option value="Asian">Asian</option>
                        <option value="Mexican">Mexican</option>
                    </select>
                </div>

                <div class="form_group">
                    <select class="form-control" value="{{$recipe->type}}" name="type" placeholder="Type">
                            <option value="Meat">With Meat</option>
                            <option value="Vegetarian">Vegetarian</option>
                            <option value="Vegan">Vegan</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Save"/>
                </div>

        </form>
        </div>
    </div>
@endsection
