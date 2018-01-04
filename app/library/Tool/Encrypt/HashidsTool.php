<?php
namespace Tool\Encrypt;

use Hashids\Hashids;
use Helper\CommonHelper;

class HashidsTool
{
    private $_handle = null;

    public static function getInstance($alphabet = '', $minLength = 4, $salt = '')
    {
        list($alphabet, $salt) = static::initConfig($alphabet, $salt);
        $tool = new static();
        $tool->_handle = new Hashids($salt, $minLength, $alphabet);
        return $tool;
    }

    private static function initConfig($alphabet, $salt)
    {
        $alphabet = trim($alphabet);
        if (empty($alphabet)) {
            $alphabet = CommonHelper::config('common', 'hashids.default.alphabet', '');
        }
        $salt = trim($salt);
        if (empty($salt)) {
            $salt = CommonHelper::config('common', 'hashids.default.salt', '');
        }
        return [$alphabet, $salt];
    }

    public function encode(...$numbers)
    {
        return $this->_handle->encode($numbers);
    }

    public function decode($hashCode)
    {
        return $this->_handle->decode($hashCode);
    }
}