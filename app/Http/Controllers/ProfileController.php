<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfileRequest;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function store(CreateProfileRequest $request)
    {
        $name = \Auth::user()->name;

        $profile = new Profile();
        $profile->location = \Auth::user()->location->place . ', ' . \Auth::user()->location->country;
        $profile->name = $name;
        $profile->surname = $request->surname;
        $profile->age = $request->age;
        $profile->gender = $request->gender;
        $profile->skype = $request->skype;
        $profile->discord = $request->discord;
        $profile->about = $request->about;
        $profile->user_id = \Auth::user()->id;
        $profile->save();

        return redirect()->route('profile')->with('slug', $name);
    }

    public function fill()
    {
        // Check if logged in
        if (!(\Auth::check())) {
            return Redirect::to('/login');
        }

        // check if user account is active
        if (! \Auth::user()->isActive()) {
            \Auth::logout();
            return redirect('login')->with('error', trans('auth.deactivated'));
        }

        $user = \Auth::user();

        return view('frontend.user.fill', ['user' => $user]);
    }
}
