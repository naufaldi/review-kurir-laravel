
@if($errors->all())
    <div class="notification is-danger">
        <ul>
    @foreach($errors->all() as $key => $error)
        <li>{{ $error }}</li>
    @endforeach
        </ul>
    </div>
@endif
{!! Form::open(['route' => 'comment-review.store', 'method' => 'POST']) !!}
<article class="media">
  <figure class="media-left">
    <p class="image is-64x64">
      <img src="https://bulma.io/images/placeholders/128x128.png">
    </p>
  </figure>
  <div class="media-content">
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <input type="hidden" name="review_id" value="{{ $review->id }}">
    <div class="field">
      <p class="control">
        <textarea class="textarea" name="content" placeholder="Add a comment..."></textarea>
      </p>
    </div>
    <nav class="level">
      <div class="level-left">
        <div class="level-item">
          <button class="button is-info">Comment</button>
        </div>
      </div>
      <div class="level-right">
        <div class="level-item">
          <label class="checkbox">
            <input type="checkbox"> Press enter to submit
          </label>
        </div>
      </div>
    </nav>
  </div>
</article>
{!! Form::close() !!}