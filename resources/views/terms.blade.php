@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left_sidebar')
        </div>
        <div class="col-6">

            <h1>Term</h1>
            <div class="">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste quaerat nam deleniti, cupiditate alias ex doloremque porro incidunt? Cupiditate eius repellendus sed. Impedit repudiandae facilis quos corporis ex doloremque libero illum, eveniet tenetur quibusdam amet ratione earum sint soluta odio provident sunt! Saepe iste quia quae illum laborum delectus autem?
            </div>
        </div>

        <div class="col-3">
            @include('shared.search_bar')
            @include('shared.follow_box')
        </div>
    </div>

@endsection