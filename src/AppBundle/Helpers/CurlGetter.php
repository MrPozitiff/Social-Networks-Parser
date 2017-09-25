<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 023 23.09.17
 * Time: 1:32
 */

namespace AppBundle\Helpers;


class CurlGetter
{

    /**
     * The connection
     * @var resource
     */
    private static $connection;

    // try to get token by Curl
    public static function GetByCurl($url, $persistentConnect = false)
    {
        // create curl resource
        //if ($persistentConnect) {
        //    if (!is_resource(static::$connection)) {
        //        static::$connection = curl_init();
        //    }
        //    $ch = static::$connection;
        //} else {
            $ch = curl_init();
        //}
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        // return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // disable SSL verifying
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        // Enable IPv4 chanel
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);

        // $output contains the output string
        $result = curl_exec($ch);
        if (!$result) {
            $errno = curl_errno($ch);
            $error = curl_error($ch);
        }
        if (!$persistentConnect) {
            // close curl resource to free up system resources
            curl_close($ch);
        }
        if (isset($errno) && isset($error)) {
            throw new \Exception($error, $errno);
        }
        return $result;
    }
}