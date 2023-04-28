<?php

namespace route;

include (__ROOT__.'/controllers/BannerController.php');

use Controllers\BannerController;

class Router
{
    private static $getRoutesList = [
        '/banner/first' => [BannerController::class, 'firstBanner'],
        '/banner/second' => [BannerController::class, 'secondBanner']
    ];

    private static $postRoutesList = [
        '/banner/counter' => [BannerController::class, 'counter']
    ];
    public static function get($uri)
    {
        if (isset(self::$getRoutesList[$uri])) {
            $class = new self::$getRoutesList[$uri][0]();
            return $class->{self::$getRoutesList[$uri][1]}();
        }

        return '404';
    }

    public static function post($uri)
    {
        if (isset(self::$postRoutesList[$uri])) {
            $class = new self::$postRoutesList[$uri][0]();
            return $class->{self::$postRoutesList[$uri][1]}();
        }

        return '404';
    }

    public static function runRequest($uri)
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                return self::get($uri);
            case 'POST':
                return self::post($uri);
        }



        print_r('wow end');
        die();
//        return '404';
    }
}