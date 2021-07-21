@section('content')
<article class="format-image group">
    <h2 class="post-title pad">
        <a href="/goods/{{ $good->id }}" rel="bookmark"> {{ $good->title }}</a>
    </h2>
    <div class="post-inner">
        <div class="post-content pad">
            <div class="entry custome">
                {{ $good->content }}
            </div>
        </div>
    </div>
</article>
@show
