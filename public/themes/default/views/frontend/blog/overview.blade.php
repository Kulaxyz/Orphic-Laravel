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

  @if(count($articles) <= 0)
    <h1>There are no articles in this category yet...</h1>
    <a class="all-articles" href="{{route('blog')}}">Check all our articles here!</a>
  @endif
  @foreach($articles as $article)
    <div class="panel">
      <a href="{{$article->url_slug}}"><div class="article-picture"
                                            style="background-image: url('{{$article->image_large}}') !important;">
                                      </div>
      </a>

      <div class="article">
        {{-- Article head --}}
        <div class="panel-heading p-20">
          @if(isset($article->category))<span class="article-category">{{$article->category->name}}</span>@endif
          <span class="article-title block"><a href="{{$article->url_slug}}">{{ $article->title }}</a></span>
        </div>
        {{-- Article body --}}
        <div class="panel-body article-body-limit p-20">
          {!! mb_strimwidth(preg_replace('/<[\/\!]*?[^<>]*?>/si', '', $article->content), 0, 800, '...') !!}
        </div>
        {{-- Article footer --}}
        <div class="panel-footer">
          <div class="article-footers p-20">
            {{$article->created_at->diffForHumans()}}
          </div>
          <div class="fa fa-eye">
            {{$article->views}}
          </div>
        </div>
      </div>
    </div>
  @endforeach
  {{--<h1>Browse our news</h1>--}}
    {{--<div class="Cats">--}}
      {{--@foreach($categories as $category)--}}
        {{--<div class="category"><a href="{{url('blog/') . '/cats/' .  $category->slug}}">{{$category->name}}</a></div>--}}
      {{--@endforeach--}}
    {{--</div>--}}
@stop

{{-- Start Breadcrumbs --}}
@section('breadcrumbs')
{!! Breadcrumbs::render('blog') !!}
@endsection
{{-- End Breadcrumbs --}}
