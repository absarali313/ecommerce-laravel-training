<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegisteredUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }

    public function store(StoreRegisteredUserRequest $request)
    {
        $user_details = $request->validated();

        $user = User::create($user_details);
        Auth::login($user);

        return redirect('/');
    }
}
