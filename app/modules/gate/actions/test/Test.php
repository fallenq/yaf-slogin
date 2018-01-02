<?php
use Yaf\Action_Abstract;

class TestAction extends Action_Abstract
{
    public function execute()
    {
        exit('TestGate');
    }
}