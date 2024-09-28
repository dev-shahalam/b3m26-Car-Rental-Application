<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Exception;

class UserTokenVerify
{

    public function handle($request, Closure $next)
    {
        try {
            $token = $request->cookie('token');
            $result = JWTToken::VerifyToken($token);
            if ($result == "unauthorized") {
                return redirect('login');
            } else {
                $request->headers->set('email', $result->userEmail);
                $request->headers->set('id', $result->userId);
                return $next($request);
            }
        }catch (Exception $e) {
            return redirect('login');
        }

    }

}
