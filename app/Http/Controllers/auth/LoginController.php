<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\CustomClasses\Alert;

/********************************************************
 *Controller is repsonsible for ensuring a user can login and authorising users to the correct account
 *
 ********************************************************/

class LoginController extends Controller
{
    //constructor ensures that only non-logged in users can use the login controller, therefore if you are already logged in you cannot reach the login page
    public function __construct()
    {
        $this->middleware('guest');
    }

    //display login page
    public function index(Request $request)
    {
        $user = old();
        $alert = null;
        $fail = session("fail");
        $logout = session("logout");

        if ($fail) {
            $alert = new Alert("danger", "Invalid Login details", "Your login attempt has failed, please try again");
        }

        if ($logout) {
            $alert = new Alert("purple", "Logout Successful", "Thank you for visting");
        }

        if (is_null($request->email) && !empty($user)) {
            $alert = new Alert("danger", "Invalid Login details", "Please try again");
            $user = old();
        }
        $title = "Fotheby's Login";

        return view("login.login", [
            "title" => $title,
            "user" => $user,
            "alert" => $alert
        ]);
    }

    //validate user login request, check for authorisation, route as required
    public function authorise(Request $request)
    {
        //from the global request function pull only the specified named inputs
        $loginDetails = $request->only("email", "password");

        //ensure email and password have been entered by user
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        //hash generator while users cannot be created outside of db
        //dd(Hash::make($request->password));
        //$2y$10$PWjENp/nTEJWD8GWPG/2Qug/WIHRqnqQrqb.V/cd8dhndskDJiVQS
        if (Auth::attempt($loginDetails)) {
            //therefore login success

            $adminOrNot = auth()->user()->permissions;

            if ($adminOrNot == "admin") {
                $route = 'admin';
            } else {
                $route = 'home';
            }

            return redirect()->route($route);
        } else {
            //login failed
            return back()->with("fail", true);
        }
        //dd(Hash::make($request->user['password']));
        //auth check returns if a user is currently logged in or not
        //Auth::check();


    }
}
