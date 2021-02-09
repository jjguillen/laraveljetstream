<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        $id = Auth::id();
        $user = User::find($id);
        if ($user->role->role == "cliente") {
            return $request->wantsJson()
                        ? response()->json(['two_factor' => false])
                        : redirect()->intended('fooding');
        } else {
        
            return $request->wantsJson()
                        ? response()->json(['two_factor' => false])
                        : redirect()->intended(config('fortify.home'));
        }
    }

}