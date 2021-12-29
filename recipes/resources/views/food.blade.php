@extends('layouts.app')

@section('content')
    <div class="container" >

        <div class="row">
            <div style="border: 2px solid #16181b; background-color: #ffd492" class="col">

                <img src="/uploads/food/{{$recipe->image}}" style="margin-top: 10px; width: 100%;">
                <h1>{{$recipe->recipe_name}}</h1>
                <p style = "font-size: medium">{{$recipe->content}}</p>

            </div>

            <div class="col">

                <div class="row">
                    <div class="col">
                        <a href="/recipes/{{$recipe->id}}/edit"><input type="button" class="btn btn-primary" value="Edit"/></a>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <form action="/recipes/{{$recipe->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-primary" value="Delete"/>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <a href="/foodpdf/{{$recipe->id}}"> <input type="button" class="btn btn-primary" value="Download"> </a>
                    </div>
                </div>

            </div>
        </div>



        @endsection
    </div>

