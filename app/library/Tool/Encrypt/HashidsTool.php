<?php
namespace Tool\Encrypt;

use Hashids\Hashids;
use Helper\ArrayHelper;
use Helper\CommonHelper;
use Helper\StringHelper;

class HashidsTool
{
    const BASIC_PREFIX  = 'hashids.default.basic';
    const BASIC_NUMBER  = 'number';
    const BASIC_CAPITAL = 'capital';
    const BASIC_SMALL   = 'small';

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

    public static function getBasicAlphabet(...$types)
    {
        $types = array_unique($types);
        if (empty($types)) {
            return '';
        }
        $alphabet = '';
        foreach ($types as $type) {
            if (in_array($type, [static::BASIC_NUMBER, static::BASIC_CAPITAL, static::BASIC_SMALL])) {
                $temp = CommonHelper::config('common', StringHelper::combineParams('.', static::BASIC_PREFIX, $type), '');
                if (!empty($temp)) {
                    $alphabet .= $temp;
                }
            }
        }
        return $alphabet;
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