@extends('layouts.app')

{{-- @section('title')
    Italian cuisine
@endsection --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Italian Quisine</h1>
            </div>
        </div>
    </div>

    <div class="container">
        @foreach($recipes as $recipe)
            <div class="row">

                <div class="col">

                </div>

                <div class="col" style=" border: 2px solid black ;background-color: #ffd492; margin-bottom: 5px; text-decoration: none;">
                    <div class="container">
                        <a href="/recipes/{{$recipe->id}}" >
                            <div style=";color: #16181b;">
                                <img src="/uploads/food/{{$recipe->image}}" style="width: 100%;" >
                                <h2>{{$recipe->recipe_name}}</h2>
                                <p></p>
                                <p style="font-size: medium">{{ \Illuminate\Support\Str::limit(strip_tags($recipe->content), 100) }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col">

                </div>
            </div>
        @endforeach
    </div>


@endsection


