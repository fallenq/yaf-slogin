<?php
namespace Tool\Slogan;

use Extension\Tool\BaseSloganExtend;
use Helper\StringHelper;

class UserSlogan
{
    use BaseSloganExtend;

//    const CONFIG_MODULE = "common";
    const LOGIN_INFO = "slogan.user.login_info";

    /**
     * Get tag of user's login info
     * @param $userIdentity
     * @return string
     */
    public static function getUserLoginInfoTag($userIdentity)
    {
        return StringHelper::combineParams(':', static::getValue(static::LOGIN_INFO), $userIdentity);
    }
}