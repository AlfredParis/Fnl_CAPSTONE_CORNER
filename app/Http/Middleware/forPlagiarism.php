<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;


class forPlagiarism
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $accT = Session::get('accT');
        if ($accT == 'student') {
            return redirect()->route('studentt.index');
        } elseif ($accT == 'faculty') {
            return redirect()->route('faculty.index');
        } elseif ($accT == 'admin') {
            return redirect()->route('admin.index');
        }
         elseif ($accT == 'superAdmin') {
            return redirect()->route('superAdmin.index');
        }
         elseif ($accT == 'subAdmin') {
            return redirect()->route('subAdmin.index');
        }elseif ($accT == '')  {
            return redirect()->route('root');
        }
        return $next($request);
    }
}
