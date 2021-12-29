@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 pb-5">
                <img src="/uploads/profile/{{Auth::user()->image}}" style="width: 150px; height:150px; float: left; border-radius: 50%; margin-right: 25px;">
                <h2>{{Auth::user()->name}}'s profile </h2>
                <form enctype="multipart/form-data" action="/profile" method="post">
                    <p><label>Update Profile Image</label></p>
                    <input type="file" name="image">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input  type="submit" class="pull-right btn btn-sm btn-primary">
                </form>
            </div>
        </div>
    </div>


    <div class="container">

        <div class="row">
            <div class="col">
                <h3>{{Auth::user()->name}}'s recipes:</h3>
            </div>
            <div class="col">
                <a href="recipes/create">
                    <button>Add new recipe</button>
                </a>
            </div>
        </div>

            @foreach($recipes as $recipe)
                @if($recipe->author == \Illuminate\Support\Facades\Auth::id())

                    <div class="row">
                        <div class="col" style=" border: 2px solid black ;background-color: #ffd492; margin-bottom: 5px; text-decoration: none;">
                            <div class="container">
                                <a href="/recipes/{{$recipe->id}}" >
                                    <div style=";color: #16181b;">
                                        <img src="/uploads/food/{{$recipe->image}}" style="width: 100%;" >
                                        <h2>{{$recipe->recipe_name}}</h2>
                                        <h5 >By {{Auth::user()->name}}</h5>
                                        <p></p>
                                        <p style="font-size: medium">{{ \Illuminate\Support\Str::limit(strip_tags($recipe->content), 100) }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col">

                        </div>
                        <div class="col">

                        </div>
                    </div>
                @endif
            @endforeach

    </div>

@endsection
