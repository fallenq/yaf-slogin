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

    /**
     * Get user info with login from Redis
     * @param $userIdentity
     * @return mixed
     */
    public static function getUserLoginInfo($userIdentity)
    {
        $loginTag = StringHelper::combineParams(':', UserSlogan::getValue(UserSlogan::LOGIN_INFO), $userIdentity);
        return static::getRedisConnection()->get($loginTag);
    }



}