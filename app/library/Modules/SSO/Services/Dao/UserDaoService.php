<?php
namespace Modules\SSO\Services\Dao;

use Extension\Service\BaseDaoServiceExtend;
use Modules\SSO\Models\user\User;

class UserDaoService
{
    use BaseDaoServiceExtend;

//    const STORE_METHOD = 'restore';
//    const PRIME_METHOD = 'primeRecord';

    const DEFAULT_DAO_CLASS = User::class;

}