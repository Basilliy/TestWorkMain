<?php

namespace Helpers;


class SystemHelper
{
    public static function getIp(): string
    {
        $keys = [
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'REMOTE_ADDR'
        ];
        foreach ($keys as $key) {
            if (!empty($_SERVER[$key])) {
                $array = explode(',', $_SERVER[$key]);
                $ip = trim(end($array));
                if (filter_var($ip, FILTER_VALIDATE_IP)) {
                    return $ip;
                }
            }
        }

        return '';
    }

    public static function getUserAgent(): string
    {
        return $_SERVER['HTTP_USER_AGENT'];
    }

    public static function getPageUrl(): string
    {
        return $_SERVER['HTTP_REFERER'];
    }
}