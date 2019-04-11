@extends(Theme::getLayout())
@include('frontend.user.subheader')

@section('content')
    @yield('user-content')

{{--    --}}
{{--    <div class="filling">--}}
{{--        <form id="account-fill" action="{{URL::to('fill-profile')}}" method="POST">--}}
{{--            {{ csrf_field() }}--}}

{{--            <input type="text" name="first_name" placeholder="Enter your first name">--}}
{{--            <input type="text" name="surname" placeholder="Enter your surname">--}}
{{--            <input type="number" name="age" placeholder="How old are you?">--}}
{{--            <h4>Select your gender:</h4>--}}
{{--            <select name="gender" form="account-fill">--}}
{{--                <option value="Male">Male</option>--}}
{{--                <option value="Female">Female</option>--}}
{{--            </select>--}}
{{--            <h4>Add some contact information:</h4>--}}
{{--            <input type="text" name="skype" placeholder="Enter your Skype login here">--}}
{{--            <input type="text" name="discord" placeholder="Enter your Discord login here">--}}
{{--            <h4>Tell us something about you:</h4>--}}
{{--            <textarea name="about" cols="60" rows="10" placeholder="Hey, type here something about yourself"></textarea>--}}
{{--            <div>--}}
{{--                <input type="submit" value="Save">--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}

    {{-- Profile --}}

    <section class="panel">

        {{-- Panel heading (Profile) --}}
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('users.dash.settings.profile') }}</h3>
        </div>

        {!! Form::open(array('url'=>'dash/edit-profile','id'=>'profile-settings','files' => true)) !!}
        <div class="panel-body">

            <div class="input-wrapper">
                {{-- Change profile image label --}}
                <label>{{ trans('users.dash.settings.change_avatar') }}</label>
                {{-- Error messages for image --}}
                @if($errors->has('avatar'))
                    <div class="bg-danger input-error">
                        @foreach($errors->get('avatar') as $message)
                            {{$message}}
                        @endforeach
                    </div>
                @endif
                <div class="flex-center">
                    <div class="m-r-10">
            <span class="avatar">
              <img src="{{$user->avatar_square_tiny}}" alt="">
            </span>
                    </div>
                    <div>
                        {{-- File browser --}}
                        <div class="input-group">
                            <label class="input-group-btn">
                <span class="btn {{ $errors->has('avatar') ? 'bg-danger' : 'bg-success' }}">
                  <i class="fa fa-file-image" aria-hidden="true"></i> {{ trans('users.dash.settings.browse') }}&hellip; <input type="file" name="avatar" style="display: none;" multiple>
                </span>
                            </label>
                            <input type="text" class="form-control input" readonly>
                        </div>
                    </div>
                </div>
            </div>
            {{-- First name  --}}
            <div class="input-wrapper">
                {{-- First name label --}}
                <label>{{ trans('users.dash.settings.first_name') }}</label>
                {{-- Error messages for first name --}}
                @if($errors->has('first_name'))
                    <div class="bg-danger input-error">
                        @foreach($errors->get('first_name') as $message)
                            {{$message}}
                        @endforeach
                    </div>
                @endif
                {{-- First name input --}}
                <div class="input-group {{$errors->has('first_name') ? 'has-error' : '' }}">
          <span class="input-group-addon fixed-width">
            <i class="fa fa-user" aria-hidden="true"></i>
          </span>
                    <input type="text" class="form-control rounded inline input" name="first_name" autocomplete="off"  placeholder="{{ trans('users.dash.settings.first_name') }}">
                </div>
            </div>

           {{-- Surname  --}}
            <div class="input-wrapper">
{{--                 Surname label--}}
                <label>{{ trans('users.dash.settings.surname') }}</label>
{{--                 Error messages for surname--}}
                @if($errors->has('surname'))
                    <div class="bg-danger input-error">
                        @foreach($errors->get('surname') as $message)
                            {{$message}}
                        @endforeach
                    </div>
                @endif
{{--                 Surname input--}}
                <div class="input-group {{$errors->has('surname') ? 'has-error' : '' }}">
          <span class="input-group-addon fixed-width">
            <i class="fa fa-user" aria-hidden="true"></i>
          </span>
                    <input type="text" class="form-control rounded inline input" name="surname" autocomplete="off" placeholder="{{ trans('users.dash.settings.surname') }}">
                </div>
            </div>

                {{-- Age  --}}
            <div class="input-wrapper">
{{--                 age label --}}
                <label>{{ trans('users.dash.settings.age') }}</label>
{{--                 Error messages for age --}}
                @if($errors->has('age'))
                    <div class="bg-danger input-error">
                        @foreach($errors->get('age') as $message)
                            {{$message}}
                        @endforeach
                    </div>
                @endif
{{--                 age input --}}
                <div class="input-group {{$errors->has('age') ? 'has-error' : '' }}">
          <span class="input-group-addon fixed-width">
            <i class="fa fa-user" aria-hidden="true"></i>
          </span>
                    <input type="number" class="form-control rounded inline input" name="age" autocomplete="off" placeholder="{{ trans('users.dash.settings.age') }}">
                </div>
            </div>

{{--             gender  --}}
            <div class="input-wrapper">
{{--                 gender label --}}
                <label>{{ trans('users.dash.settings.gender') }}</label>
{{--                 Error messages for gender --}}
                @if($errors->has('gender'))
                    <div class="bg-danger input-error">
                        @foreach($errors->get('gender') as $message)
                            {{$message}}
                        @endforeach
                    </div>
                @endif
{{--                 gender input --}}
                <div class="input-group {{$errors->has('gender') ? 'has-error' : '' }}">
          <span class="input-group-addon fixed-width">
            <i class="fa fa-user" aria-hidden="true"></i>
          </span>
                    <select name="gender" form="profile-settings" class="form-control rounded inline input" autocomplete="off">
                        <option  value="Male">Male</option>
                        <option  value="Female">Female</option>
                    </select>
                </div>
            </div>

{{--             skype  --}}
            <div class="input-wrapper">
{{--                 skype label --}}
                <label>{{ trans('users.dash.settings.skype') }}</label>
{{--                 Error messages for skype --}}
                @if($errors->has('skype'))
                    <div class="bg-danger input-error">
                        @foreach($errors->get('skype') as $message)
                            {{$message}}
                        @endforeach
                    </div>
                @endif
{{--                 skype input --}}
                <div class="input-group {{$errors->has('skype') ? 'has-error' : '' }}">
          <span class="input-group-addon fixed-width">
            <i class="fa fa-user" aria-hidden="true"></i>
          </span>
                    <input type="text" class="form-control rounded inline input" name="skype" autocomplete="off" placeholder="{{ trans('users.dash.settings.skype')}}">
                </div>
            </div>

{{--             discord  --}}
            <div class="input-wrapper">
{{--                 discord label --}}
                <label>{{ trans('users.dash.settings.discord') }}</label>
{{--                 Error messages for discord --}}
                @if($errors->has('discord'))
                    <div class="bg-danger input-error">
                        @foreach($errors->get('discord') as $message)
                            {{$message}}
                        @endforeach
                    </div>
                @endif
{{--                 discord input --}}
                <div class="input-group {{$errors->has('discord') ? 'has-error' : '' }}">
          <span class="input-group-addon fixed-width">
            <i class="fa fa-user" aria-hidden="true"></i>
          </span>
                    <input type="text" class="form-control rounded inline input" name="discord" autocomplete="off" placeholder="{{ trans('users.dash.settings.discord')}}">
                </div>
            </div>


{{--            --}}{{-- about  --}}
            <div class="input-wrapper">
{{--                 discord about --}}
                <label>{{ trans('users.dash.settings.about') }}</label>
{{--                 Error messages for about --}}
                @if($errors->has('about'))
                    <div class="bg-danger input-error">
                        @foreach($errors->get('about') as $message)
                            {{$message}}
                        @endforeach
                    </div>
                @endif
{{--                 about input --}}
                <div class="input-group {{$errors->has('about') ? 'has-error' : '' }}">
{{--          <span class="input-group-addon fixed-width">--}}
{{--            <i class="fa fa-user" aria-hidden="true"></i>--}}
{{--          </span>--}}
                    <textarea name="about" cols="60" rows="10" class="form-control rounded inline input" name="about" autocomplete="off" placeholder="Hey, type here something about yourself"></textarea>
                </div>
            </div>

        </div>

        <div class="panel-footer">
            <div>
            </div>
            {{-- Save button --}}
            <div class="button">
                <i class="fa fa-save" aria-hidden="true"></i>
                <input type="submit" value="{{ trans('general.save') }}">
            </div>
        </div>
        </div>
        {!! Form::close() !!}


    </section>

@stop

