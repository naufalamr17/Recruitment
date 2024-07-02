<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }

  public function store()
  {
    $attributes = request()->validate([
      'email' => 'required|email',
      'password' => 'required'
    ]);

    if (!auth()->attempt($attributes)) {
      throw ValidationException::withMessages([
        'email' => 'Your provided credentials could not be verified.'
      ]);
    }

    session()->regenerate();

    return redirect('/dashboard');
  }

  public function destroy()
    {
        auth()->logout();

        return redirect('/login');
    }
}
