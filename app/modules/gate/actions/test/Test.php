<?php
use Yaf\Action_Abstract;
use Tool\Encrypt\EncryptTool;
use Modules\Test\Services\Cache\TestCacheService;

class TestAction extends Action_Abstract
{
    public function execute()
    {
        var_dump(TestCacheService::test());
//        $encryptTool = EncryptTool::getInstance();
//        $encrypt = $encryptTool->encrypt("test");
//        var_dump($encrypt);
//        var_dump($encryptTool->check($encrypt, "test"));
        exit('TestGate');
    }
}