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
      <strong>{{ $review->user->name }}</strong> <small>@johnsmith</small> <small>{{ $review->created_at->toFormattedDateString() }}</small>
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
    <nav class="level is-mobile">
      <div class="level-left">
        <a class="level-item">
          <span class="icon is-small"><i class="fas fa-reply"></i></span>
        </a>
        <a class="level-item">
          <span class="icon is-small"><i class="fas fa-retweet"></i></span>
        </a>
        <a class="level-item">
          <span class="icon is-small"><i class="fas fa-heart"></i></span>
        </a>
         
      </div>
    </nav>
    @if(Auth::check())
    {{-- tag comment start --}}
    @include('comment.create')
    {{-- tag comment end --}}
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