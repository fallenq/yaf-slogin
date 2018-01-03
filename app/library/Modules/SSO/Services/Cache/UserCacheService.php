<?php
namespace Modules\SSO\Services\Cache;

use Extension\Service\BaseCacheServiceExtend;
use Helper\StringHelper;
use Tool\Slogan\UserSlogan;

class UserCacheService
{
    use BaseCacheServiceExtend;

//    const REDIS_DB = '';
    const REDIS_INDEX = '1';

    public static function getUserLoginInfo($token)
    {
        $loginTag = StringHelper::combineParams(':', UserSlogan::getValue(UserSlogan::LOGIN_INFO), $token);
        return static::getRedisConnection()->get($loginTag);
    }

}