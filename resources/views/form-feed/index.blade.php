@foreach($reviews as $key => $review)
<div class="columns">
    <div class="column">
        <article class="media">
  <figure class="media-left">
    <p class="image is-64x64">
      <img src="https://bulma.io/images/placeholders/128x128.png">
    </p>
  </figure>
  <div class="media-content">
    <div class="content">
      <p>
      <strong>{{ $review->user->name }}</strong> <small><!-- this would be username --></small> <small>{{ $review->created_at->toFormattedDateString() }}</small>
        <br>
        {{ $review->content }}
        @if(Auth::check())
        <a href="{{ route('review.show', $review->slug) }}">
          More..
        </a> 
        @else 
          <a href="{{ route('show-reviews', $review->slug) }}">
          More..
          </a>
        @endif
      </p>
    </div>
    <div class="columns">
      <div class="column is-offset-1 is-1">
        <span class="icon is-small"><strong>{{ $review->kurir->nama }}</strong></span>
      </div>
      <div class="column is-2">
          @for ($i = 0; $i < $review->rate; $i++)
            <span class="icon is-small"><i class="fas fa-star"></i></span>
          @endfor
      </div>
    </div>
    @if(Auth::check())
      @if(auth()->user()->status_register!=0)
        {{-- tag comment start --}}
        @include('comment.create')
        {{-- tag comment end --}}
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
      
    {{-- comment list start --}}
    @include('comment.index')
    {{-- comment list end --}}
  </div>
  <div class="media-right">
  @if($review->user->id==auth()->user()->id)
    <button class="delete"></button>
  @endif
  </div>
    @endif
</article>
    </div>
</div>
@endforeach 