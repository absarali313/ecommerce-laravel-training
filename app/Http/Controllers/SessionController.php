<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(SessionRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            return redirect('/admin/products');
        } else {

            return redirect()
                ->back()
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

        return redirect()->route('admin_products');
    }

}
