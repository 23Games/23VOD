<?php

namespace AppBundle;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppBundle extends Bundle
{
    public static function regionalLock(Request $request)
    {
        $country = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $request->getClientIp()));

        if ($country['geoplugin_countryCode'] != 'DE' && $country['geoplugin_status'] != 404) {
            return false;
        }
        return true;
    }
}
