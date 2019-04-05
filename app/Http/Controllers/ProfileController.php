<?php
namespace App\Http\Controllers;
use App\Http\Requests\CreateProfileRequest;
use App\Models\Profile;
class ProfileController extends Controller
{
    public function store(CreateProfileRequest $request)
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

        $profile = new Profile();

        $profile->first_name = $request->first_name;
        $profile->surname = $request->surname;
        $profile->age = $request->age;
        $profile->gender = $request->gender;
        $profile->skype = $request->skype;
        $profile->discord = $request->discord;
        $profile->about = $request->about;
        $profile->user_id = \Auth::user()->id;
        $profile->save();

        return redirect()->route('profile', \Auth::user()->name);
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
        // check if user already has a profile
        if (\Auth::user()->profile)
        {
            return redirect()->route('profile', \Auth::user()->name);
        }

        $user = \Auth::user();

        return view('frontend.user.fill', ['user' => $user]);
    }

    public function update(CreateProfileRequest $request)
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
        // check if user has a profile
        if (!\Auth::user()->profile)
        {
            return redirect()->route('profile', \Auth::user()->name);
        }

        $profile = \Auth::user()->profile;

        $profile->first_name = $request->first_name;
        $profile->surname = $request->surname;
        $profile->age = $request->age;
        $profile->gender = $request->gender;
        $profile->skype = $request->skype;
        $profile->discord = $request->discord;
        $profile->about = $request->about;
        $profile->save();

        return redirect()->route('profile', \Auth::user()->name);
    }
}