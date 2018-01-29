<?php
/**
 * JsonHelper
 */
namespace Helper;

class JsonHelper
{
    /**
     * Convert to json
     * @param $params
     * @param int $jsonp
     * @param string $callback
     */
    public static function convertToJson($params, $jsonp = 0, $callback = '')
    {
        if (empty($params) || !is_array($params)) {
            return '';
        }
        $json = json_encode($params);
        if ($jsonp) {
            if (empty($callback)) {
                return '';
            }
            $json = "$callback($json)";
        }
        return $json;
    }

    /**
     * 获取jsonp
     * @param $params
     * @param string $callBackName
     * @return string
     */
    public static function convertToJsonp($params, $callBackName = '')
    {
        $callBackName = !empty($callBackName)? $callBackName: 'callback';
        return self::convertToJson($params, 1, $_GET[$callBackName]);
    }

    /**
     * Convert to array
     * @param $json
     * @param $assoc
     * @return mixed|string
     */
    public static function convertToArray($json, $assoc = true)
    {
        if (!empty($json)) {
            $jsonValue = json_decode($json, $assoc);
            return !empty($jsonValue)? $jsonValue: '';
        }
        return '';
    }
}