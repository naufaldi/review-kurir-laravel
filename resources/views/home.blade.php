@extends('layouts.app')

@section('content')
<div class="is-four-fifths">
    <div class="columns">
        <div class="column">
        @if(Auth::check())
            @include('form-feed.create')  
        @else
            <i>Silahkan login untuk mereview kurir anda <a href="{{ route('login') }}" class="button is-warning">Login</a></i>
        @endif
        </div>
    </div>
    <div class="columns">
        <div class="column">
            @include('form-feed.index')
        </div>
    </div>
</div>
@endsection
