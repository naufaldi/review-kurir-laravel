@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    {{ Form::open(['route' =>'review.store', 'method' => 'POST']) }}
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="columns">
                       <textarea class="textarea" placeholder="e.g. Hello world"></textarea>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <select name="kurir">
                                @foreach($kurirs as $key => $kurir)
                                    <option value="{{ $kurir->id }}">{{ $kurir->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="column">
                            <button class="button is-primary">Review</button>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
