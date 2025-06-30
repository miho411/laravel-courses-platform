<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class InstructorController extends Controller
{
    public function create1($id)
    {
        $user = User::findOrFail($id);
        return view('instructor-registration-1', compact('user'));
    }
    public function create2()
    {

        return view('instructor-registration-2');
    }

    public function store(Request $request, $id)
    {

        $request->validate([
            'name' => ['required', 'string', 'regex:/^[\p{Arabic}\s]+$/u', 'max:255'],
            'specialization' => ['required', 'string', 'max:255'],
            'qualification' => ['required', 'string', 'max:255'],
            'job' => ['required', 'string', 'max:255'],
            'bio' => ['required', 'string', 'max:5000'],
            'cv_path' => ['required', 'file', 'mimes:pdf,doc,docx,ppt,pptx', 'max:20480'],
            'profile_photo' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'website' => ['nullable', 'url'],
            'facebook' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'x' => ['nullable', 'url'],
            'youtube' => ['nullable', 'url'],
            'linkedin' => ['nullable', 'url'],
        ]);

        $cvpath = $request->file('cv_path')->store('cvs', 'public');
        $photopath = $request->file('profile_photo')->store('photos', 'public');

        $user = User::findOrFail($id);
        $user->update([
            'role' => 'instructor',
            'name' => $request->name,
            'specialization' => $request->specialization,
            'qualification' => $request->qualification,
            'job' => $request->job,
            'bio' => $request->bio,
            'cv_path' => $cvpath,
            'profile_photo' => $photopath,
            'website' => $request->website,
            'facebook' => $request->facebook,
            'instegram' => $request->instegram,
            'x' => $request->x,
            'youtube' => $request->youtube,
            'linkedin' => $request->linkedin,


        ]);
        return redirect('/');
    }


    public function store2(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'regex:/^[\p{Arabic}\s]+$/u', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'specialization' => ['required', 'string', 'max:255'],
            'qualification' => ['required', 'string', 'max:255'],
            'job' => ['required', 'string', 'max:255'],
            'bio' => ['required', 'string', 'max:5000'],
            'cv_path' => ['required', 'file', 'mimes:pdf,doc,docx,ppt,pptx', 'max:20480'],
            'profile_photo' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'website' => ['nullable', 'url'],
            'facebook' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'x' => ['nullable', 'url'],
            'youtube' => ['nullable', 'url'],
            'linkedin' => ['nullable', 'url'],
        ]);

        $cvpath = $request->file('cv_path')->store('cvs', 'public');
        $photopath = $request->file('profile_photo')->store('photos', 'public');

        $user = User::create([
            'role' => 'instructor',
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'specialization' => $request->specialization,
            'qualification' => $request->qualification,
            'job' => $request->job,
            'bio' => $request->bio,
            'cv_path' => $cvpath,
            'profile_photo' => $photopath,
            'website' => $request->website,
            'facebook' => $request->facebook,
            'instegram' => $request->instegram,
            'x' => $request->x,
            'youtube' => $request->youtube,
            'linkedin' => $request->linkedin,


        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/');
    }

    public function dashboard($id)
    {
        $instructor= User::findOrFail($id);
        return view('instructor-dashboard', compact('instructor'));
    }
}
