<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;


class TimeTableMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $desde = 08; 
        $hasta = 18; 
        $hora = Carbon::now();
        $hora->format('H');

        if ($hora_actual >= $desde && $hora_actual < $hasta) {
            return $next($request);
        } else {
            return response()->json(['message'=>'Debe realizar sus consultas de 8:00 am - 5:00 pm ']);
        }
    }
}
