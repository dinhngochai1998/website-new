@if($getComment)
    @foreach ($getComment as $value)    
            <div class="be-comment">
                <div class="be-img-comment">
                    <a href="blog-detail-2.html">
                        <img src="{{ $value->customer->avatar }}" alt="" class="be-ava-comment">
                    </a>
                </div>
                <div class="be-comment-content">

                    <span class="be-comment-name">
                        <a href="blog-detail-2.html">{{ $value->customer->name }}</a>
                    </span>
                    <span class="be-comment-time">
                        <i class="fa fa-clock-o"></i>
                        {{ $value->created_at }}
                    </span>

                    <p class="be-comment-text">
                        {{ $value->content }}
                    </p>
                </div>
            </div>  
    @endforeach   
@endif