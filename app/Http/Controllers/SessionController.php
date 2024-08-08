<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(StoreSessionRequest $request)
    {
        $details = $request->validated();

        if (Auth::attempt($details))
        {
            $request->session()->regenerate();

            return redirect('/admin/products');
        }
        else
        {
            return redirect()->back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'The provided credentials are incorrect.',
                ]);
        }
    }

    public function destroy(Request $request)
    {
        $request->session()->flush();
        Auth::logout();

        return redirect('/login');
    }

}
