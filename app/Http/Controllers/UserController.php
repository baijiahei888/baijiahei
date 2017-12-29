<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
    {
        // $user = Auth::user();
        $userId = Auth::id();
        if ($userId == 1 )
        {
            return redirect("admin");
        } else {
            return view("user");
        }
    }

}
