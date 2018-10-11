@extends('layouts.app')

@section('content')
<div class="is-four-fifths">
    <div class="columns">
        <div class="column">
          @include('form-feed.create')  
        </div>
    </div>
    <div class="columns">
        <div class="column">
            @include('form-feed.index')
        </div>
    </div>
</div>
@endsection
