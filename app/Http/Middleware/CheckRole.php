<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {

        //Sacamos el modelo usuario de Auth
        $id = Auth::id();
        $user = User::find($id);

        //Comprobamos el role del usuario
        //Si no es admin comprobamos que sea el role correspondiente
        if ( $user->role->role != "admin") {
            //Si el role de la ruta no coincide con el del usuario, error 403
            
            if ($role == 'grestaurante' && $user->role->role != "grestaurante") {
                abort(403);
            }

            if ($role == 'cliente' && $user->role->role != "cliente") {
                abort(403);
            }

            if ($role == 'repartidor' && $user->role->role != "repartidor") {
                abort(403);
            }

            return $next($request);
        } 

        //Si es admin se salta el chequeo
        return $next($request);
    }
}
