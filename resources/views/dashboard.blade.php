@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left_sidebar')
        </div>
        <div class="col-6">
            @include('shared.success_message')
            @include('shared.submit_idea')
            <hr>
            {{-- @if (count($ideas) > 0)
                
                @foreach ($ideas as $idea )
                    <div class="mt-3">
                        @include('shared.idea_card')
                    </div>
                @endforeach
            @else
                <p>No Results Found.</p>
            @endif --}}

            @forelse ($ideas as $idea )
                <div class="mt-3">
                    @include('shared.idea_card')
                </div>
            @empty
                <p class="text-center my-3">No Results Found.</p>
            @endforeach
            <div class="mt-3">
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search_bar')
            @include('shared.follow_box')
        
        </div>
    </div>


@endsection