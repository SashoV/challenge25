<?php

namespace App\Http\Controllers;

use App\Events\UserDataCheckEvent;
use App\Events\UserRegisteredEvent;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function checkUserData($email, $code)
    {

        $user = User::where('email', $email)->where('code', $code)->first();

        if ($user) {

            if($user->is_active == 1) {
                return redirect(route('login'));
            }

            if ($user->code_exp < Carbon::now() && $user->is_active == 0) {
                abort(402, $user['email']);
                return;
            }
            event(new UserDataCheckEvent($user));
            return redirect(route('login'));
        } else {
            abort(401);
            return;
        }
    }

    public function generateNewLink($email) {
        
        $user = User::where('email', $email)->first();
        $user->code = \Str::random(80);
        $user->code_exp = Carbon::now()->add('24 hours');
        if($user->save()){
            event(new UserRegisteredEvent($user));
            return redirect(route('login'));
        };
    }
}
