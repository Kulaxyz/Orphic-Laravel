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
    <div class="panel">
      <div class="article-picture" style="background-image: url('{{$article->image_large}}') !important;">

      </div>
      <div class="article">
        {{-- Article head --}}
        <div class="panel-heading p-20">
          @if(isset($article->category))<span class="article-category">{{$article->category->name}}</span>@endif
          <span class="article-title block">{{ $article->title }}</span>
        </div>
        {{-- Article body --}}
        <div class="panel-body p-20">
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
            <img src="{{url($popArt->image_large)}}">
          </div>
          <div class="sidebar-news-content">
            <div class="sidebar-news-name">
              <a>{{$popArt->title}}</a>
            </div>
            <div class="sidebar-news-date">
              <a>{{$popArt->date}}</a>
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

