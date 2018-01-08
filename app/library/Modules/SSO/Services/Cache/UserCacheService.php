<?php
namespace Modules\SSO\Services\Cache;

use Extension\Service\BaseCacheServiceExtend;
use Helper\ArrayHelper;
use Helper\JsonHelper;
use Helper\StringHelper;
use Tool\Slogan\UserSlogan;

class UserCacheService
{
    use BaseCacheServiceExtend;

//    const REDIS_DB = '';
    const REDIS_INDEX = '1';

    private static function getUserLoginInfoTag($userIdentity)
    {
        return StringHelper::combineParams(':', UserSlogan::getValue(UserSlogan::LOGIN_INFO), $userIdentity);
    }

    /**
     * Get user info with login from Redis
     * @param $userIdentity
     * @return mixed
     */
    public static function getUserLoginInfo($userIdentity)
    {
        return JsonHelper::convertToArray(static::getRedisConnection()->get(self::getUserLoginInfoTag($userIdentity)));
    }

    /**
     * Set user info with login into redis
     * @param $loginInfo
     * @return bool
     */
    public static function setUserLoginInfo($loginInfo)
    {
        if (empty($loginInfo) && !is_array($loginInfo)) {
            return false;
        }
        $userId = ArrayHelper::getValue($loginInfo, 'user_id', '');
        if (!empty($userId)) {
            static::getRedisConnection()->set(self::getUserLoginInfoTag($userId), JsonHelper::convertToJson($loginInfo), 1800);
        }
        return false;
    }

}