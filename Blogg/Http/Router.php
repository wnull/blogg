<?php

namespace Blogg\Http;

class Router
{
    private const UNKNOWN_METHOD = 'notFound';

    public static function start(
        array $params = [
            'controller' => 'blogController',
            'action'     => 'home'
        ]
    )
    {
        $pref = "Blogg\Controllers\\" . ucfirst($params['controller']);
        $final = new $pref($_GET);

        try {
            $reflectClass = new \ReflectionClass($final);
            $reflectMethod = new \ReflectionMethod($final, $params['action']);

            call_user_func([
                $final,
                ($reflectClass->hasMethod($params['action']) && $reflectMethod->isPublic()) ? $params['action'] : Router::UNKNOWN_METHOD
            ]);

        }
        catch (\ReflectionException $e) {
            $final->{self::UNKNOWN_METHOD}();
        }
    }
}