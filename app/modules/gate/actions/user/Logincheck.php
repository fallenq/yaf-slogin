<?php
use Yaf\Action_Abstract;

use Tool\Response\ResponseTool;

class LogincheckAction extends Action_Abstract
{
    use \Modules\Common\Extension\Actions\BaseActionExtend;

    public function execute()
    {
//        dd(\Helper\TimeHelper::formatTimestamp());
//        dd(new \Tool\Response\ResponseWorker());
        dd(ResponseTool::getInstance()->output());
//        throw new \Exception\JsonErrorException('test');
        dd($this->getRequestParam('test'));
        exit('check');
    }
}