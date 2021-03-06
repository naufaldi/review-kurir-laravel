                <div class="field">
                    {{ Form::open(['route' =>'review.store', 'method' => 'POST']) }}
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="control">
                        <div class="columns">
                            <div class="column">
                               @if(session('report'))
                               <div class="notification is-success">
                                   <button class="delete"></button>
                                   {{ session('report') }}
                               </div> 
                               @endif
                               @if($errors->all())
                               <div class="notification is-danger">
                                   <button class="delete"></button>
                                   <ul>
                                       @foreach($errors->all() as $key => $error)
                                       <li>{{ $error }}</li>
                                       @endforeach
                                   </ul>
                               </div>
                               @endif  
                            </div>
                        </div>
                    </div>
                    <div class="control">
                        <div class="columns">
                            <div class="column">
                                <textarea name="content" class="textarea" placeholder="Tulis review anda disini"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="control">
                        <div class="columns level">
                        <div class="column is-1">
                            <div class="select is-primary">
                            <select name="nama_kurir_id">
                                @foreach($kurirs as $key => $kurir)
                                    <option value="{{ $kurir->id }}">{{ $kurir->nama }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="column">
                            <div class="select is-primary">
                                <select name="rate">
                                    <option value="1">1 star</option>
                                    <option value="2">2 stars</option>
                                    <option value="3">3 stars</option>
                                    <option value="4">4 stars</option>
                                    <option value="5">5 stars</option>
                                </select>
                            </div>
                        </div>
                        <div class="column">
                            <div class="level-right">
                                <button class="button is-primary">Review</button>
                            </div>
                        </div>
                        </div>
                         
                    </div>
                    </div>
                    {{ Form::close() }}
                </div>   
                    