<?php

namespace Controllers;

require (__ROOT__.'/public/bootstrap.php');
require (__ROOT__.'/models/Visitors.php');
require (__ROOT__.'/helpers/SystemHelper.php');

use Helpers\SystemHelper;
use Models\Visitors;

class BannerController
{
    public function firstBanner()
    {
        return file_get_contents(__ROOT__.'/view/index1.html');
    }

    public function secondBanner()
    {
        return file_get_contents(__ROOT__.'/view/index2.html');
    }

    public function counter()
    {
        $visitor = Visitors::query()
            ->where('ip_address', SystemHelper::getIp())
            ->where('user_agent', SystemHelper::getUserAgent())
            ->where('page_url', SystemHelper::getPageUrl())
            ->first();

        if ($visitor) {
            $visitor->update(
                [
                    'view_date'     => date('Y-m-d H:i:s'),
                    'views_count'   => ++$visitor->views_count,
                ]
            );
        } else {
            Visitors::query()
                ->insert(
                    [
                        'ip_address'    => SystemHelper::getIp(),
                        'user_agent'    => SystemHelper::getUserAgent(),
                        'view_date'     => date('Y-m-d H:i:s'),
                        'page_url'      => SystemHelper::getPageUrl(),
                        'views_count'   => 1,
                    ]
                );
        }
    }
}


