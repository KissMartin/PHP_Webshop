<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use \App\Models\User;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function store(Request $request)
    {
        //
    }

    public function orders(): View
    {
        $orders = auth()->user()->orders;
        return view('profile.orders', compact('orders'));
    }

    public function favorites(): View
    {
        $favorites = auth()->user()->favorites;
        return view('profile.favorites', compact('favorites'));
    }

    public function profile(User $user = null): View
    {
        if ($user === null) {
            $user = auth()->user();
            return redirect()->route('profile.public', $user);
        }

        $statistics = DB::table('user_statistics')->where('user_id', $user->id)->first();
        $products = $user->products()->get();

        return view('profile.profile', compact('user', 'statistics', 'products'));
    }

    public function defaultProfile(){
        $user = auth()->user();
        return redirect()->route('profile.public', ['user' => $user->id]);
    }
}
