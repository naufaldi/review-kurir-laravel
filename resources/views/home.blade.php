@extends('layouts.app')

@section('content')
<div class="is-four-fifths">
    <div class="columns">
        <div class="column">
        @if(Auth::check())
            @if(auth()->user()->status_register!=0)
                @include('form-feed.create')  
            @else 
                <article class="message">
                     <div class="message-header">
                        <p>Warning</p>
                        <button class="delete" aria-label="delete"></button>
                     </div>
                    <div class="message-body">
                        Tinggal selangkah lagi untuk mereview, silahkan klik tombol <i><strong>Confirm</strong></i> yang sudah kami kirimkan ke email anda. 
                    </div>
                </article>  
            @endif
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
