<?php
use Yaf\Action_Abstract;

class LogincheckAction extends Action_Abstract
{
    use \Modules\Common\Extension\Actions\BaseActionExtend;

    public function execute()
    {
        dd($this->getParams());
        exit('check');
    }
}