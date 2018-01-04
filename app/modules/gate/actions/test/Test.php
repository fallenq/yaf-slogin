<?php
use Yaf\Action_Abstract;
use Tool\Encrypt\EncryptTool;
use Modules\Test\Services\Cache\TestCacheService;
use Tool\Encrypt\HashidsTool;

class TestAction extends Action_Abstract
{
    public function execute()
    {
         $tool = HashidsTool::getInstance();
         $hashCode = $tool->encode(1,2,3);
         var_dump($hashCode);
         var_dump($tool->decode($hashCode));
//        $encryptTool = EncryptTool::getInstance();
//        $encrypt = $encryptTool->encrypt("test");
//        var_dump($encrypt);
//        var_dump($encryptTool->check($encrypt, "test"));
        exit('TestGate');
    }
}