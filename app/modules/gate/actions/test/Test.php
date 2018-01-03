<?php
use Yaf\Action_Abstract;
use Tool\Encrypt\EncryptTool;

class TestAction extends Action_Abstract
{
    public function execute()
    {
        var_dump(EncryptTool::getInstance()->encrypt("test"));
        exit('TestGate');
    }
}