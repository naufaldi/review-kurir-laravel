@foreach($review->comment as $key => $comment)
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
      <strong>{{ $comment->user->name }}</strong> <small><!-- this would be username --></small> <small>{{ $comment->created_at->toFormattedDateString() }}</small>
        <br>
        {{ $comment->content }}
      </p>
    </div>
  </div>
  <div class="media-right">
    @if(Auth::check())
  @if($comment->user->id==auth()->user()->id)
    <button class="delete"></button>
  @endif
  @endif
  </div>
</article>
    </div>
</div>
@endforeach