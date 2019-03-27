@extends(Theme::getLayout())

{{--@section('subheader')--}}
{{--<div class="subheader">--}}

{{--<div class="background-pattern" style="background-image: url('{{ asset('/img/game_pattern.png') }}') !important;"></div>--}}
{{--<div class="background-color"></div>--}}

{{--<div class="content">--}}
{{--<span class="title"><i class="fa fa-newspaper" aria-hidden="true"></i> {{ trans('general.blog') }}</span>--}}
{{--</div>--}}

{{--</div>--}}

{{--@endsection--}}

@section('content')
    <h1>Frequently Asked Questions</h1>
    <p class="flex-row">Read this before you ask, perhaps an answer is already here.</p>
    <div class="container-faq">
        <div class="main-faq">
            @for($i = 1; $i < count($faqs); $i+=2)
                <div class="panel-faq">
                    <div class="panel-heading-faq in">
                        <a href="#"><i class="fas fa-angle-down"></i>{!! $faqs[$i]->question !!}</a>
                    </div>
                    <div class="panel-collapse-faq">
                        <div class="panel-body-faq">

                            <p>{!! $faqs[$i]->answer !!}</p>

                        </div>
                    </div>
                </div>
            @endfor
        </div>

        <div class="main-faq">
            @for($i = 0; $i < count($faqs); $i+=2)
                <div class="panel-faq">
                    <div class="panel-heading-faq in">
                        <a href="#"><i class="fas fa-angle-down"></i>{!! $faqs[$i]->question !!}</a>
                    </div>
                    <div class="panel-collapse-faq">
                        <div class="panel-body-faq">

                            <p>{!! $faqs[$i]->answer !!}</p>

                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
    {{-- Start working with contact form --}}

    <h1>Type your question here:</h1>

        <div class="col-md-12">
            <div class="panel">
                <form id="contact-form" action="{{ url('contact') }}" method="POST" novalidate="novalidate">
                    {{ csrf_field() }}
                    <div class="panel-body-faq-form">
                        <div class="panel-body-left">
                        @if($errors->has('name'))
                            {{-- Name error msg --}}
                            <div class="bg-danger m-b-10 b-r p-10" id="loginfailedFull">
                                <i class="fa fa-times" aria-hidden="true"></i> {{ $errors->first('name') }}
                            </div>
                        @endif
                        <div class="input-wrapper-faq">
                            {{-- Name input --}}
                            <div class="input-group {{$errors->has('name') ? 'has-error' : '' }}">
                              <span class="input-group-addon fixed-width">
                                <i class="fa fa-user" aria-hidden="true"></i>
                              </span>
                                {{ Form::input('name', 'name', null, ['class' => 'form-control rounded inline input', 'placeholder' => trans('general.contact.name')]) }}
                            </div>
                        </div>
                        @if($errors->has('email'))
                            {{-- Email error msg --}}
                            <div class="bg-danger m-b-10 b-r p-10" id="loginfailedFull">
                                <i class="fa fa-times" aria-hidden="true"></i> {{ $errors->first('email') }}
                            </div>
                        @endif
                        <div class="input-wrapper-faq">
                            {{-- Mail input --}}
                            <div class="input-group {{$errors->has('email') ? 'has-error' : '' }}">
                                  <span class="input-group-addon fixed-width">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                  </span>
                                {{ Form::input('email', 'email', null, ['class' => 'form-control rounded inline input', 'placeholder' => trans('general.contact.email')]) }}
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div></div>
                            <div>
                                <a href="javascript:void(0)" class="button send-faq .faq-send-mail" id="send-message">
                                    <i class="fa fa-paper-plane faq-icon" aria-hidden="true"></i> {{ trans('general.contact.send') }}
                                </a>
                            </div>
                        </div>
                        </div>
                        <div class="input-wrapper-faq{{$errors->has('message') ? 'has-error' : '' }}">
                            {{-- Text input --}}
                            {{ Form::textarea('message', null, ['class' => 'form-control-faq rounded inline input', 'placeholder' => trans('general.contact.message'),'rows' => '7', 'cols' => '55']) }}
                            @if($errors->has('message'))
                                {{-- Message error msg --}}
                                <div class="bg-danger m-b-10 b-r p-10" id="loginfailedFull">
                                    <i class="fa fa-times" aria-hidden="true"></i> {{ $errors->first('message') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
@push('scripts')
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}">
    <script type="text/javascript" src="{{asset('js/faq.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            {{-- Contact submit --}}
            $("#send-message").click( function(){
                $('#send-message').html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
                $('#send-message').addClass('loading');
                $('#contact-form').submit();
            });
        });
    </script>
@endpush

{{-- Start Breadcrumbs --}}
{{--@section('breadcrumbs')--}}
{{--{!! Breadcrumbs::render('faqs') !!}--}}
{{--@endsection--}}
{{-- End Breadcrumbs --}}