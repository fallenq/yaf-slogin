<?php
namespace Modules\Test\Services\Cache;

use Extension\Service\BaseCacheServiceExtend;

class TestCacheService
{
    use BaseCacheServiceExtend;

//    const REDIS_DB = '';
//    const REDIS_INDEX = '';

    public static function test()
    {
        $connection = static::getRedisConnection();
//        dd($connection);
//        return $connection->flushall();
        $connection->set('test', 'helllo', 60);
        return $connection->get('test');
    }
}