@extends('layouts.app')
{{-- @section('title')
    Admisceo
@endsection --}}
@section('content')
    <div style="color: #16181b" class="container">
        <div class="row">
            <div class="col">
                <h1>Welcome</h1>
            </div>
        </div>

        <a href="/italian">
            <div  style=" background-color: #ffd492; text-align: center ;height: 100px; font-size: large; border: 2px solid black; margin-bottom: 5px" class="row">
                <div class="col">
                    Italian cuisine
                </div>
            </div>
        </a>


        <div style=" background-color: #ffd492; text-align: center ;height: 100px; font-size: large; border: 2px solid black; margin-bottom: 5px" class="row">
            <div class="col">
                Asian cuisine
            </div>
        </div>

        <div style=" background-color: #ffd492; text-align: center ;height: 100px; font-size: large; border: 2px solid black; margin-bottom: 5px" class="row">
            <div class="col">
                Mexican cuisine
            </div>
        </div>

    </div>

@endsection
