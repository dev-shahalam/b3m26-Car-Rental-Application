<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken{

    public static function CreateToken($email, $id): string{

        $key = env('JWT_KEY');
        $Payload = [
            'iss' => 'laravel-token',
            'iat' => time(),
            'exp' => time() + 3600,
            'userEmail' => $email,
            'userId' => $id
        ];
        return JWT::encode($Payload, $key, 'HS256');
    }


    public static function VerifyToken($token): string|object{
        try {
            if ($token == null) {
                return 'unauthorized';
            } else {
                $key = env('JWT_KEY');
                $decoded = JWT::decode($token, new Key($key, 'HS256'));
                return $decoded;
            }
        } catch (Exception $e) {
            return 'unauthorized';
        }
    }




}
