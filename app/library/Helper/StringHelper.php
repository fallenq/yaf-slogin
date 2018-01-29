<?php
/**
 * 字符串工具
 */
namespace Helper;

class StringHelper
{
    const TRIM_METHOD   = 0;
    const LTRIM_METHOD  = 1;
    const RTRIM_METHOD  = 2;

    /**
     * 获取字符串出现位置
     * @param $source
     * @param $sub
     * @param int $method 0-首次出现 1-(不区分)首次出现 2-最后出现 3-(不区分)最后出现
     */
    public static function locatePos($source, $sub, $method = 0)
    {
        $methods = ['strpos', 'stripos', 'strrpos', 'strripos'];
        if (!isset($source) || !isset($sub) || !in_array($method, array_keys($methods))) {
            return false;
        }
        return call_user_func_array($methods[$method], [$source, $sub]);
    }

    /**
     * 统计子字符串的出现次数
     * @param $source
     * @param $sub
     */
    public static function countSub($source, $sub)
    {
        if (!isset($source) || !isset($sub)) {
            return 0;
        }
        return substr_count($source, $sub);
    }

    public static function combineParams($space = ',', ...$params)
    {
        return implode($space, $params);
    }

    public static function trim($params, $method = 0, $charlist = null)
    {
        $methods = [
            static::TRIM_METHOD     => 'trim',
            static::LTRIM_METHOD    => 'ltrim',
            static::RTRIM_METHOD    => 'rtrim'
        ];
        if (empty($params) || !in_array($method, array_keys($methods))) {
            return $params;
        }
        $callMethod = $methods[$method];
        if (is_array($params)) {
            foreach ($params as &$param) {
                if (!is_null($charlist)) {
                    $param = call_user_func($callMethod, $param, $charlist);
                } else {
                    $param = call_user_func($callMethod, $param);
                }
            }
        } else if (is_string($params)) {
            if (!is_null($charlist)) {
                $params = call_user_func($callMethod, $params, $charlist);
            } else {
                $params = call_user_func($callMethod, $params);
            }

        }
        return $params;
    }

    public static function combineUrl(...$params)
    {
        if (isset($params[0]) && is_array($params[0])) {
            $params = $params[0];
        }
        $params = self::trim($params, static::TRIM_METHOD, "\/");
        array_unshift($params, DIRECTORY_SEPARATOR);
        return call_user_func_array([self::class, 'combineParams'], $params);
    }
}