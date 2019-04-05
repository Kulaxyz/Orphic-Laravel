@extends(Theme::getLayout())
@include('frontend.user.subheader')

@section('content')
    @yield('user-content')
    
    <div class="filling">
        <form name="account-fill" action="{{URL::to('fill-profile')}}" method="POST">
            {{ csrf_field() }}

            <input type="text" name="first_name" placeholder="Enter your first name">
            <input type="text" name="surname" placeholder="Enter your surname">
            <input type="number" name="age" placeholder="How old are you?">
            <h4>Select your gender:</h4>
            <select name="gender" form="account-fill">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <h4>Add some contact information:</h4>
            <input type="text" placeholder="Enter your Skype login here">
            <input type="text" placeholder="Enter your Discord login here">
            <h4>Tell us something about you:</h4>
            <textarea name="about" cols="60" rows="10" placeholder="Hey, type here something about yourself"></textarea>
            <div>
                <input type="submit" value="Save">
            </div>
        </form>
    </div>
@endsection
