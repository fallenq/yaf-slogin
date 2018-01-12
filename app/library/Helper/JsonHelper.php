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
     * Convert to array
     * @param $json
     * @return mixed|string
     */
    public static function convertToArray($json)
    {
        if (!empty($json)) {
            $jsonValue = json_decode($json, true);
            return !empty($jsonValue)? $jsonValue: '';
        }
        return '';
    }
}