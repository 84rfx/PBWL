<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Redirect path setelah login berhasil.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Buat instance controller.
     *
     * Middleware 'guest' mencegah user yang sudah login 
     * mengakses halaman login dan register.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
