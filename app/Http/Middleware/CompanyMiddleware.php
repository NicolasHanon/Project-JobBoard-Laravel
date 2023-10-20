<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompanyMiddleware
{
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->user()->roleId == 2) { // Si role de l'utilisateur connécté est une entreprise
            return redirect()->route('newjob');
        }
        return $next($request);
    }
}