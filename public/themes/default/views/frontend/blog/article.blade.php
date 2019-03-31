@extends(Theme::getLayout())

@section('subheader')
  <div class="subheader">

    <div class="background-pattern" style="background-image: url('{{ asset('/img/game_pattern.png') }}') !important;"></div>
    <div class="background-color"></div>

    <div class="content">
      <span class="title"><i class="fa fa-newspaper" aria-hidden="true"></i> {{ trans('general.blog') }}</span>
    </div>

  </div>

@endsection
@section('content')
  <div class="single-article-container">
    <div class="img-and-art">
        {{--<div class="article-picture" style="background-image: url('{{$article->image_large}}') !important;">--}}

        {{--</div>--}}
        <div class="article">
          {{-- Article head --}}
          <div class="panel-heading article-header p-20">
            @if(isset($article->category))<span class="article-category">{{$article->category->name}}</span>@endif
            <span class="article-title block">{{ $article->title }}</span>
          </div>
          {{-- Article body --}}
          <div class="panel-body p-20">
            <div class="picture-of-article">
              <img alt="{{$article->title}}" src="{{ url($article->image_large) }}">
            </div>
            {!! $article->content !!}
          </div>
          {{-- Article footer --}}
          <div class="panel-footer p-20">
            <div class="article-footer">
            {{$article->created_at->diffForHumans()}}
            </div>
            <div class="fa fa-eye">
              {{$article->views}}
            </div>
          </div>
        </div>
        {{--<div class="cat-articles"><a href="#">{{--}}
          {{--//dd($article->category->articles()->get())--}}
        {{--}}</a></div>--}}
      </div>
    <div class="sidebar-news-all">
      <div class="name-of-sidebar">
        <p>Other popular news in this category</p>
      </div>
      @foreach($popArticles as $popArt)
        <div class="sidebar-article">
          <div class="sidebar-news">
            <div class="sidebar-news-image">
              <a href="{{$popArt->url_slug}}"><img src="{{url($popArt->image_large)}}"></a>
            </div>
            <div class="sidebar-news-content">
              <div class="sidebar-news-name">
                <a href="{{$popArt->url_slug}}">{{$popArt->title}}</a>
              </div>
              <div class="sidebar-news-date">
                <a>{{$popArt->created_at->diffForHumans()}}</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>



    {{-- Load comments --}}
    @if(config('settings.comment_article'))
      @php $item_type = 'article'; $item_id = $article->id; @endphp
      @include('frontend.comments.form')
    @endif

  {{-- START POPULAR GAMES --}}
  @if(isset($popular_games) && $popular_games->count() > 0)
    <h1 class="games-art">Popular games in our store:</h1>
    <div class="row">

      @foreach($popular_games as $game)
        @include('frontend.game.inc.card')
      @endforeach

    </div>

    @endif

@endsection

{{-- Start Breadcrumbs --}}
@section('breadcrumbs')
{!! Breadcrumbs::render('article', $article) !!}
@endsection
{{-- End Breadcrumbs --}}

@section('after-scripts')
{{-- Load comment script --}}
  @if(config('settings.comment_article'))
    @yield('comments-script')
  @endif
@endsection

