<?php
namespace Tool\Slogan;

use Helper\CommonHelper;
use Helper\StringHelper;

trait BaseSloganTrait
{

    private static function getEnvPrefix($customEnv = null)
    {
        if (empty($customEnv)) {
            return CommonHelper::config('common', 'slogan.env.prefix.'.ENV, '');
        } else {
            return CommonHelper::config('common', 'slogan.env.prefix.'.$customEnv, '');
        }
    }

    private static function getConfigModule()
    {
        return defined('static::CONFIG_MODULE')? static::CONFIG_MODULE: 'common';
    }

    public static function getValue($tag, $customEnv = null)
    {
        $sloganTag = $tag;
        $configModule = static::getConfigModule();
        if ($envPrefix = static::getEnvPrefix($customEnv)) {
            $sloganTag = StringHelper::combineParams(':', $envPrefix, $sloganTag);
        }
        return CommonHelper::config($configModule, $sloganTag, '');
    }

}