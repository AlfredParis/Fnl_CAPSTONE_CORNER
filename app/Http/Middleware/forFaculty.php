<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class forFaculty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $accT = Session::get('accT');
        $acc = Session::get('fullNs');
        if ($acc == '') {
            return redirect()->route('root');
        } elseif ($accT == 'admin') {
            return redirect()->route('admin.index');
        } elseif ($accT == 'student') {
            return redirect()->route('studentt.index');
        }
          elseif ($accT == 'superAdmin') {
            return redirect()->route('superAdmin.index');
        }
         elseif ($accT == 'subAdmin') {
            return redirect()->route('subAdmin.index');
        }
        return $next($request);
    }
}
